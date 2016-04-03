.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../Includes.txt


.. _users-manual:

Users manual
============

Installation and initial configuration takes less than 2 minutes:

1. Install the extension from TER.
2. Add the provided PageTS Typoscript template ``EXT:jm_highlightjs - Enable Syntax Highlighting Features in RTE``
   to your root page in order to enable the `pre` tag inside of RTE and add CSS classes
   for all supported languages.
3. Add the Typoscript template ``Highlight.js based Syntax Highlighting`` to your frontend
   Typoscript template.
4. Add a new ``pre`` block (i.e. preformatted text) in a RTE-based content element of your choice
   and paste your source code into the block (recommendation: use tabs instead of spaces
   to format your code and paste only clean code to avoid additional formatting steps in RTE)
5. Reload the page with that content element in the frontend.

Known Issues
------------

- Formatting using whitespaces (instead of tabs) does not work properly as RTE eliminates all
  whitespace sequences with more than one whitespace.
- One can assign multiple language types to a single code block, which can confuse highlight.js
  (especially in server-side rendering mode).
