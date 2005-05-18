<?php
/**
 * GeSHi - Generic Syntax Highlighter
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * You can view a copy of the GNU GPL in the LICENSE file that comes
 * with GeSHi, in the docs/ directory.
 *
 * @package   scripts
 * @author    Nigel McNie <nigel@geshi.org>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright (C) 2005 Nigel McNie
 * @version   $Id$
 * 
 */


/**
 * Script to get keywords for languages from katepart kde package
 * 
 * Usage:
 * get-keywords.php css properties
 * get-keywords.php css attributes
 * get-keywords.php php statements
 * get-keywords.php php keywords
 * get-keywords.php list-langs
 * ...
 * 
 * @todo support list-langs, version options
 * @todo customise output format options (one per line, formatted for pasting into lang file, HTML)
 * @todo Move needed PEAR files inside here
 * @todo Example of getting keywords from somewhere non-XML
 */
  
// As always...
error_reporting(E_ALL);

/** Get standard functions */
require_once 'lib/functions.get-keywords.php';
/** Get the KeywordGetter class */
require_once 'lib/class.keywordgetter.php';
//@todo blocking 1.1.0beta1 Add pear classes required into lib and require them from there

// Do the easy options first
if (in_array('-h', $argv) || in_array('--help', $argv)) {
    show_help();
    exit;
}

if (in_array('-v', $argv) || in_array('--version', $argv)) {
    show_version();
    exit;
}

// If we don't have a language and a keyword type, show the help and exit
if (!isset($argv[1]) || !isset($argv[2])) {
    show_help();
    exit;
}

// Create a new keyword getter. If this language is not supported, exit
$kwgetter =& KeywordGetter::factory($argv[1]);
if (KeywordGetter::isError($kwgetter)) {
    die($kwgetter->lastError());
}

// Get the keywords based on the required keyword group. If there
// is an error getting the keywords, print it and exit
$keywords = $kwgetter->getKeywords($argv[2]);
if (KeywordGetter::isError($keywords)) {
    die($keywords->lastError());
}

// Simply echo to standard out, although a todo would be to make this customisable
// @todo Customise the output of keywords (to a file perhaps?)
foreach ($keywords as $keyword) {
    echo $keyword . "\n";
}

?>
