<?php
/**
 * GeSHi - Generic Syntax Highlighter
 * <pre>
 *   File:   geshi/languages/php/common.php
 *   Author: Nigel McNie
 *   E-mail: nigel@geshi.org
 * </pre>
 * 
 * For information on how to use GeSHi, please consult the documentation
 * found in the docs/ directory, or online at http://geshi.org/docs/
 * 
 * This program is part of GeSHi.
 *
 *  This program is free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 * 
 *  You should have received a copy of the GNU General Public License
 *  along with this program; if not, write to the Free Software
 *  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301 USA
 *
 * @package    geshi
 * @subpackage lang
 * @author     Nigel McNie <nigel@geshi.org>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright  (C) 2004 - 2006 Nigel McNie
 * @version    $Id$
 * 
 */

function geshi_php_common (&$context)
{
    // Delimiters for PHP
    $context->addDelimiters(array('<?php', '<?'), '?>');
    $context->addDelimiters('<%', '%>');

    // Children for PHP
    $context->addChild('single_string', 'string');
    $context->addChild('double_string', 'phpdoublestring', 'php');
    $context->addChild('heredoc', 'phpdoublestring', 'php');
    $context->addChild('single_comment');
    $context->addChild('multi_comment');
    // Parse PHPDoc comments with doxygen
    $context->addChildLanguage('doxygen/doxygen', '/**', '*/');
    
    // Keywords that have php.net manual entries
    $context->addKeywordGroup(array(
            'echo', 'print', 'array', 'isset', 'unset', 'int', 'integer',
            'bool', 'boolean', 'float', 'string'
    ), 'keyword', false, 'http://www.php.net/{FNAME}');
    
    $context->setCharactersDisallowedBeforeKeywords('$', '_');
    $context->setCharactersDisallowedAfterKeywords("'", '_');

    // PHP symbols
    $context->addSymbolGroup(array(
        '(', ')', ',', ';', ':', '[', ']',
        '+', '-', '*', '/', '&', '|', '!', '<', '>',
        '{', '}', '=', '@', '?', '.'
    ), 'symbol');
    
    // PHP Variables
    // @todo [blocking 1.1.1] maybe later let the test string be a regex or something
    $context->addRegexGroup('#(\$\$?[a-zA-Z_][a-zA-Z0-9_]*)#', '$',
        // This is the special bit ;)
        // For each bracket pair in the regex above, you can specify a name and optionally,
        // whether the matched part should be checked for being code first
        array(
            // index 1 is for the first bracket pair
            // so for PHP it's everything within the (...)
            // of course we could have specified the regex
            // as #$([a-zA-Z_][a-zA-Z0-9_]*)# (note the change
            // in place for the first open bracket), then the
            // name and style for this part would not include
            // the beginning $
            // Note:NEW AFTER 1.1.0a5: if second index of this array is true,
            // then you are saying: "Try to highlight as code first, if
            // it isn't code then use the styles in the second index".
            // This is really aimed at the OO support. For example, this
            // is some javascript code:
            //    foo.bar.toLowerCase();
            // The "bar" will be highlighted as an oo method, while the
            // "toLowerCase" will be highlighted as a keyword even though
            // it matches the oo method.
            1 => array('var', false)
        )
    );
    
    // Number support
    $context->useStandardIntegers();
    $context->useStandardDoubles();
    
    // PHP Objects
    $context->addObjectSplitter('->', 'oodynamic', 'symbol');
    $context->addObjectSplitter('::', 'oostatic', 'symbol');

    $context->setComplexFlag(GESHI_COMPLEX_TOKENISE);
}

function geshi_php_single_string (&$context)
{
    $context->addDelimiters("'", "'");
    $context->setEscapeCharacters('\\');
    $context->setCharactersToEscape(array('\\', "'"));
    //$this->_contextStyleType = GESHI_STYLE_STRINGS;
}

function geshi_php_double_string (&$context)
{
    $context->addDelimiters('"', '"');
    $context->setEscapeCharacters('\\');
    $context->setCharactersToEscape(array('n', 'r', 't', 'REGEX#[0-7]{1,3}#', 'REGEX#x[0-9a-f]{1,2}#i', '\\', '"', '$'));
    //$this->_contextStyleType = GESHI_STYLE_STRINGS;
}

function geshi_php_heredoc (&$context)
{
    $context->addDelimiters("REGEX#<<<\s*([a-z][a-z0-9]*)\n#i", "REGEX#\n!!!1;?\n#i");
    $context->setEscapeCharacters('\\');
    $context->setCharactersToEscape(array('n', 'r', 't', 'REGEX#[0-7]{1,3}#', 'REGEX#x[0-9a-f]{1,2}#i', '\\', '"', '$'));
    //$this->_contextStyleType = GESHI_STYLE_STRINGS;
}

function geshi_php_single_comment (&$context)
{
    $context->addDelimiters(array('//', '#'), array("\n", '?>'));
    $context->parseDelimiters(GESHI_CHILD_PARSE_LEFT);
    //$this->_contextStyleType = GESHI_STYLE_COMMENTS;
}

function geshi_php_multi_comment (&$context)
{
    $context->addDelimiters('/*', '*/');
    //$this->_contextStyleType = GESHI_STYLE_COMMENTS;
}

?>
