<?php

if (!defined ('TYPO3_MODE')) {
    die ('Access denied.');
}

# Provide PageTS Template that enables Syntax Highlighting in RTE
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerPageTSConfigFile(
        $_EXTKEY,
        'Configuration/TSconfig/Page/config.ts',
        'EXT:jm_highlightjs - Enable Syntax Highlighting Features in RTE');

# Provide Typoscript Frontend Template to enable rendering of Syntax Highlightings
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
		$_EXTKEY,
		'Configuration/TypoScript/',
		'Highlight.js based Syntax Highlighting');

?>
