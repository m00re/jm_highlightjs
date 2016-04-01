<?php

namespace JensMittag\JmHighlightjs\Hooks;

/**
 * Highlight.js based rendering of preformatted code. To use this user function, it has to be registered as a post-processor
 * for PRE Tags in Typo3 RTE. This is done via TypoScript, e.g. by adding the following code snipped to a TS template:
 *
 *    lib.parseFunc_RTE {
 *        externalBlocks := addToList(pre)
 *        externalBlocks.pre {
 *            stdWrap.postUserFunc = JensMittag\JmHighlightjs\Hooks\HighlightingUserFunc->highlight
 *            stdWrap.postUserFunc.enablev8js = {$plugin.tx_jmhighlightjs.enablev8js}
 *            stdWarp.postUserFunc.stylesheet = {$plugin.tx_jmhighlightjs.stylesheet}
 *            stdWrap.postUserFunc.library = {$plugin.tx_jmhighlightjs.library}
 *        }
 *    }
 *
 * Simply add the provided Typoescript Template 'Highlight.js based Syntax Highlighting' to save yourself fro writing this code
 * manually.
 *
 * What does it do:
 * 
 *     1. If the provided configuration option 'enablev8js' is true and the PHP module 'v8js' is loaded, the content of the
 *        PRE tag will be rendered Server-side using the highlight.js Javascript library. This is an experimental way of
 *        doing the syntax highlighting, and should only be used with care. 
 *     2. If the provided configuration option 'enablev8js' is false, or if the PHP modle 'v8js' is not available, the given
 *        PRE tag is not altered, the highlight.js Javascript library is inserted as a script resource on the current webpage,
 *        and the content of the PRE tag will be syntax highlighted in the browser (if the visitor has Javascript enabled).
 *     3. In both cases, the configured Syntax Highlighting Stylesheet will be added to the webpage.
 *
 */
class HighlightingUserFunc {

	/**
   	 * Reference to the parent (calling) cObject set from TypoScript
   	 */
  	public $cObj;

  	/**
   	 * Performs the syntax highlighting based on the configuration provided in TypoScript.
   	 *
   	 * @param string          The content of the PRE tag.
   	 * @param array           An array with the Typoscript configuration options (only 'stylesheet' and 'enablev8js' are read)
   	 * @return        string  The syntax highlighted PRE tag or an unaltered copy of the input
   	 */
  	public function highlight($content, $conf) {

		$renderer = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Page\PageRenderer::class);
		$highlightjs = \TYPO3\CMS\Core\Utility\GeneralUtility::getFileAbsFileName($conf['library']);

		// Case 1: server-side syntax highlighting
    	if (isset($conf['enablev8js']) && ($conf['enablev8js'] == 1 || $conf['enablev8js'] == "true") && extension_loaded('v8js')) {

			$v8 = new \V8Js();
			// Remove the surrounding <pre></pre> Tag, and extract the language from its class attribute
			preg_match("/^<pre class=\"(.*)\">(.*)<\/pre>$/im", $content, $out);
			// Escape all double quote characters and all line breaks
			$language = $out[1];
			$source = html_entity_decode($out[2], ENT_HTML5);
			$source = str_replace("<br />", "\\n", $source);
			$source = str_replace("\"", "\\\"", $source);
			$jscode = array();
			$jscode[] = 'var global = global || this, self = self || this, window = window || this;';
			$jscode[] = file_get_contents($highlightjs);
			$jscode[] = 'var hljs = global.hljs;';
			$jscode[] = 'var sourceCode = "' . $source . '";';
			$jscode[] = "var result = hljs.highlight('" . $language . "', sourceCode, true).value;";
			$jscode[] = 'result;';
			// This is a dirty fix as RteHtmlArea escapes the & and I haven't found a way to avoid this
			$content = str_replace("&amp;", "&", $v8->executeString(implode("\n", $jscode)));
			$content = '<pre class="hljs ' . $language . '">' . $content . '</pre>';

    	} else { // Case 2: client-side syntax highlighting
			$renderer->loadJquery();
			$renderer->addJsFooterFile(\TYPO3\CMS\Core\Utility\PathUtility::getAbsoluteWebPath($highlightjs),
		  		'text/javascript', /* compress? */ false, false, '',
				/* excludeFromConcatenation? */ true, '|', /* async? */ false);//, /* integrity? */ 'sha256-b07457d8f5ce2d11be2d0b53a6f44416c5a1315bb60099e6cf1a66a2099d76d3');
			$renderer->addJsFooterInlineCode('jm_highlightjs',
		  		"jQuery(document).ready(function() {
  					jQuery('pre').each(function(i, block) {
    					hljs.highlightBlock(block);
  					});
				});");
			// Fix markup that comes from RteHtmlArea
			$content = str_replace("&amp;", "&", $content);
			$content = str_replace("<br />", "\n", $content);
    	}

		// Finally add CSS stylesheet as configured
		$url = \TYPO3\CMS\Core\Utility\GeneralUtility::getFileAbsFileName('EXT:jm_highlightjs/Resources/Public/CSS/default.css');
		if (isset($conf['stylesheet'])) {
			$url = \TYPO3\CMS\Core\Utility\GeneralUtility::getFileAbsFileName($conf['stylesheet']);
		}
		$renderer->addCssFile(\TYPO3\CMS\Core\Utility\PathUtility::getAbsoluteWebPath($url),
			'stylesheet', 'all', '', false, false, '', true);
		// And configure tab-width to 4 characters
		$renderer->addCssInlineBlock('JensMittag\JmHighlightjs\Hooks\HighlightingUserFunc', '.hljs { tab-size: 4; -moz-tab-size: 4; }', true);

    	return $content;
  	}

}
