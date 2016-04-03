.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../Includes.txt


.. _admin-manual:

Administrator Manual
====================

Manage set of supported Languages
---------------------------------

By default, only the common languages are supported (to reduce the size of the highlight.js
library file). In order to enable support for all 150 languages, change the Typoscript
constant ``plugin.tx_jmhighlightjs.library`` to ``EXT:jm_highlightjs/Resources/Public/Javascript/highlight.all.min.js``.
If you only require a specific subset of languages, you can create a custom Javascript
resource for these languages at https://highlightjs.org/download/, save it somewhere on
your webserver (e.g. below fileadmin/) and configure ``plugin.tx_jmhighlightjs.library``
such that it points to that file.

Change Styling
--------------

Highlight.js comes with a collection of 74 different code highlighting styles. You can configure
a different style through the Typoscript constant ``plugin.tx_jmhighlightjs.stylesheet``, e.g
you can change the style from ``default.css`` to ``androidstudio.css`` by setting the constant
``plugin.tx_jmhighlightjs.stylesheet = EXT:jm_highlightjs/Resources/Public/CSS/androidstudio.css``.
Visit https://highlightjs.org/static/demo/ to try out available styles.

Enable Server-Side Rendering
----------------------------

By default, this extension is configured to perform syntax highlighting client-side.
If you installed the PHP extension `v8js <http://php.net/manual/en/book.v8js.php>`_
you can change this mode to server-side rendering. Simply set the Typoscript constant
``plugin.tx_jmhighlightjs.enablev8js = 1``.
