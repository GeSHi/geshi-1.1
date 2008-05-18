<?php
/**
 * GeSHi - Generic Syntax Highlighter
 * 
 * For information on how to use GeSHi, please consult the documentation
 * found in the docs/ directory, or online at http://geshi.org/docs/
 * 
 *  This file is part of GeSHi.
 *
 *  GeSHi is free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  GeSHi is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with GeSHi; if not, write to the Free Software
 *  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * You can view a copy of the GNU GPL in the COPYING file that comes
 * with GeSHi, in the docs/ directory.
 *
 * @package   scripts
 * @author    Nigel McNie <nigel@geshi.org>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright (C) 2005 Nigel McNie
 * @version   $Id$
 * 
 */

define('GESHI_GET_KEYWORDS_VERSION', '0.1.2');

/**
 * Script to get keywords for languages from katepart kde package
 * 
 * Usage:
 * get-keywords.php css properties
 * get-keywords.php css attributes
 * get-keywords.php php statements
 * get-keywords.php php keywords
 * get-keywords.php --list-langs
 * get-keywords.php --list-groups css
 * ...
 * 
 * @todo [blocking 1.1.1] customise output format options (one per line, formatted for pasting into lang file, HTML)
 */
  
// As always...
error_reporting(E_ALL);

/** Get standard functions */
require_once 'lib/functions.get-keywords.php';
/** Get the KeywordGetter class */
require_once 'lib/class.keywordgetter.php';
/** Get the console options reader class */
require_once 'lib/pear/Console/Getopt.php';

// Parse command line options
$opt_parser =& new Console_Getopt;
$args = $opt_parser->getopt($argv, 'hv', array('help', 'version', 'list-groups=', 'list-langs'));

// Print error if there was an argument not recognised
if (PEAR::isError($args)) {
    echo str_replace('Console_Getopt', $argv[0], $args->getMessage()) . '
Try `' . $argv[0] . " --help' for more information.\n";
    exit(1);
}


//
// Do the easy options first
//

// Check for help
if (get_option(array('h', 'help'), $args)) {
    show_help();
    exit;
}

// Check for version
if (get_option(array('v', 'version'), $args)) {
    show_version();
    exit;
}

// Check for --list-langs
if (get_option('list-langs', $args)) {
    $languages = KeywordGetter::getSupportedLanguages();
    print_r($languages);
    exit;
}

// Check for --list-groups
if (false !== ($language = get_option('list-groups', $args))) {
    $kwgetter =& KeywordGetter::factory($language);
    if (KeywordGetter::isError($kwgetter)) {
        die($kwgetter->lastError());
    }
    print_r($kwgetter->getValidKeywordGroups());
    exit;
}


//
// Simple options are not being used - time to actually
// get keywords if we can
//

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
// @todo [blocking 1.1.1] Customise the output of keywords (to a file perhaps?)
$result = '';
$spaces = '            ';
foreach ($keywords as $keyword) {
    $result .= "'".$keyword . "', ";
}
$result = wordwrap($result, 75);
$result = $spaces . str_replace("\n", "\n$spaces", $result);
echo substr($result, 0, -2) . "\n";

?>
