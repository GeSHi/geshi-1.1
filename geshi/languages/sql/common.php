<?php
/**
 * GeSHi - Generic Syntax Highlighter
 * <pre>
 *   File:   geshi/languages/sql/common.php
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
 * @author     Nigel McNie
 * @copyright  (C) 2006 Nigel McNie
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @version    $Id$
 */

function geshi_sql_common(&$context) {
    $context->addChild('quoted_identifier', 'string');
    $context->addChild('string', 'string');
    $context->addChild('bitstring');
    $context->addChild('hexstring');
    $context->addChild('single_comment');
    $context->addChild('multi_comment');

    $context->useStandardIntegers();
    $context->useStandardDoubles();

    $context->addSymbolGroup(array(
        ';', ':', '(', ')', '[', ']', ',', '.'
    ), 'symbol');

    $context->addSymbolGroup(array(
        '+', '-', '*', '/', '<', '>', '=', '~', '!', '@', '#', '%', '^', '&',
        '|', '`', '?'
    ), 'operator');

    $context->addRegexGroup(array('#(\$\d+)#'), '$', array(
        1 => array('positional_parameter', false)
    ));


    $context->setComplexFlag(GESHI_COMPLEX_PASSALL);
}

function geshi_sql_quoted_identifier (&$context)
{
    $context->addDelimiters('"', '"');
    $context->addEscapeGroup(array('"'));
}

function geshi_sql_string (&$context)
{
    // This context starts with a ' and ends with one too
    $context->addDelimiters(array("'", '"'), array("'", '"'));

    // If a ' occurs it can escape. There's nothing else listed as escape
    // characters so it only escapes itself.
    $context->addEscapeGroup(array("'"));

    // The backslash escape is not SQL standard but is used in many databases
    // regardless (e.g. mysql, postgresql)
    // This rule means that the backslash escapes the array given (inc. the regex)
    // As such, the definitions given here are perfectly in line with the new feature
    // The only other feature is that the escape char could actually be an array of them
    $context->addEscapeGroup(array('\\'), array('b', 'f', 'n', 'r', 't', "'",
        'REGEX#[0-7]{3}#'));
}

function geshi_sql_bitstring (&$context)
{
    // @todo [blocking 1.2.0] use parser to detect that only 0 and 1 are in
    // the string
    $context->addDelimiters("B'", "'");
}

function geshi_sql_hexstring (&$context)
{
    // @todo [blocking 1.2.0] use parser to detect that only 0 - F are in
    // the string
    $context->addDelimiters("X'", "'");
}


function geshi_sql_single_comment (&$context)
{
    $context->addDelimiters('--', "\n");
}

function geshi_sql_multi_comment (&$context)
{
    // @todo [blocking 1.1.5] sql multiline comments can be nested
    $context->addDelimiters('/*', '*/');
}

?>