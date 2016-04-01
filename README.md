# Typo3 Syntax Highlighting using highlight.js

This is a Typo3-Extension that integrates the Javascript-based syntax highlighting
library [highlight.js](https://highlightjs.org/) into Typo3's RTE. With this
extension, editors can easily add code snippets into any RTE content element or
field, using up to 150 supported languages and multiple styles. 

Rendering is done either in browser or, if desired, server-side by means of
the PHP extension [v8js](http://php.net/manual/en/book.v8js.php).

## Dependencies

- Typo3 v7.x
- PHP extension [v8js](http://php.net/manual/en/book.v8js.php) (optional)

## Installation & Configuration

1. Install the extension from TER.
2. Add the provided PageTS Typoscript template `EXT:jm_highlightjs - Enable Syntax Highlighting Features in RTE`
   to your root page in order to enable the `pre` tag inside of RTE and add CSS classes
   for all supported languages.
3. Add the Typoscript template `Highlight.js based Syntax Highlighting` to your frontend
   Typoscript template.
4. Add a new `pre` block (i.e. preformatted text) in the content element of your choice
   and paste your source code into the block (recommendation: use tabs instead of spaces
   to format your code and paste only clean code to avoid additional formatting steps in RTE)
5. Reload the page with that content element in the frontend.

### Manage set of supported Languages

By default, only the common languages are supported (to reduce the size of the highlight.js
library file). In order to enable support for all 150 languages, change the Typoscript
constant `plugin.tx_jmhighlightjs.library` to `EXT:jm_highlightjs/Resources/Public/Javascript/highlight.all.min.js`.
If you only require a specific subset of languages, you can create a custom Javascript
resource for these languages at https://highlightjs.org/download/, save it somewhere on
your webserver (e.g. below fileadmin/) and configure `plugin.tx_jmhighlightjs.library`
such that it points to that file.

### Change Styling

Highlight.js comes with a collection of 74 different code highlighting styles. You can configure
a different style through the Typoscript constant `plugin.tx_jmhighlightjs.stylesheet`, e.g
you can change the style from `default.css` to `androidstudio.css` by setting the constant
`plugin.tx_jmhighlightjs.stylesheet = EXT:jm_highlightjs/Resources/Public/CSS/androidstudio.css`.
Visit https://highlightjs.org/static/demo/ to try out available styles.

### Enable Server-Side Rendering

By default, this extension is configured to perform syntax highlighting client-side.
If you installed the PHP extension [v8js](http://php.net/manual/en/book.v8js.php)
you can change this mode to server-side rendering. Simply set the Typoscript constant
`plugin.tx_jmhighlightjs.enablev8js = 1`.

## Known Issues

- Formatting using whitespaces (instead of tabs) does not work properly as RTE eliminates all
  whitespace sequences with more than one whitespace.
- One can assign multiple language types to a single code block, which can confuse highlight.js
  (especially in server-side rendering mode).

## TODOs

- Add support for Typoscript syntax highlighting

## License

Copyright (c) 2016, Jens Mittag
All rights reserved.

Redistribution and use of the Typo3 extension 'jm_highlightjs' in source
and binary forms, with or without modification, are permitted provided
that the following conditions are met:

* Redistributions of source code must retain the above copyright
      notice, this list of conditions and the following disclaimer.
    * Redistributions in binary form must reproduce the above copyright
      notice, this list of conditions and the following disclaimer in the
      documentation and/or other materials provided with the distribution.
    * Neither the name of highlight.js nor the names of its contributors 
      may be used to endorse or promote products derived from this software 
      without specific prior written permission.

THIS SOFTWARE IS PROVIDED BY THE REGENTS AND CONTRIBUTORS ``AS IS'' AND ANY
EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
DISCLAIMED. IN NO EVENT SHALL THE REGENTS AND CONTRIBUTORS BE LIABLE FOR ANY
DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
(INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND
ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
(INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.

The Typo3 extension 'jm_highlightjs' uses the Javascript library 'highlight.js'
Version 9.2.0 by Ivan Sagalaev. Please read 'Resources/Public/Javascript/LICENSE'
for licensing details of 'highlight.js'.
