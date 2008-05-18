<?php
/**
 * GeSHi - Generic Syntax Highlighter
 * <pre>
 *   File:   geshi/languages/eiffel/common.php
 *   Author: Julian Tschannen
 *   E-mail: julian@tschannen.net
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
 * @author     Julian Tschannen <julian@tschannen.net>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright  (C) 2004 - 2006 Julian Tschannen, Nigel McNie
 * @version    $Id$
 *
 */

/**#@+
 * @access private
 */

function geshi_eiffel_common (&$context)
{
    // Children of eiffel context
    $context->addChild('character', 'string');
    $context->addChild('string', 'string');
    $context->addChild('comment', 'code');

    // keywords of ECMA standard (without special variables and TUPLE)
    $context->addKeywordGroup(array(
        'agent', 'alias', 'all', 'and', 'as', 'assign', 'attribute',
        'check', 'class', 'convert', 'create',
        'debug', 'deferred', 'do',
        'else', 'elseif', 'end', 'ensure', 'expanded,', 'export', 'external',
        'feature', 'from', 'frozen',
        'if', 'implies', 'inherit', 'inspect', 'invariant',
        'like', 'local', 'loop',
        'not', 'note',
        'obsolete', 'old', 'once', 'only', 'or',
        'prefix',
        'redefine', 'rename', 'require', 'rescue', 'retry',
        'select', 'seperate',
        'then',
        'undefine', 'until',
        'variant',
        'when',
        'xor'
    ), 'keyword', false);

    // keywords for pre-ECMA compatibility
    $context->addKeywordGroup(array(
        'bit',
        'indexing', 'infix', 'is',
        'prefix'
    ), 'keyword', false);

    // special variables
    $context->addKeywordGroup(array(
        'Current', 'False', 'Precursor', 'Result', 'True', 'Void'
    ), 'special', false);

    // special classes
    $context->addKeywordGroup(array(
        'ANY',
        'TUPLE'      // keyword in ECMA
    ), 'classname', false);
    // todo: add more classes, add classes link

    // available symbols
    $context->addSymbolGroup(array(
             '.', ',', ';', ':', '?', '!', '%', '$', '^', '@', '&', '~',
             '+', '-', '*', '/', '\\', '|', '<', '>', '=',
             '(', ')', '[', ']', '{', '}'
    ), 'symbol');

    // integers (hexadecimal, decimal, octal, binary)
    $context->addRegexGroup(array(
            '#([^a-zA-Z_0-9\.]|^)([0-9][0-9_]*)(?=[^a-zA-Z_0-9\.]|$)#',
            '#([^a-zA-Z_0-9\.]|^)(0[bcxBCX][0-9a-fA-F][0-9a-fA-F_]*)(?=[^a-zA-Z_0-9\.]|$)#'
        ), 
        '',
        array(
            1 => true,
            2 => array('integer', false),
            3 => true
        )
    );

    // reals
    $context->addRegexGroup(array(
            // -----1-----------  -----2------  -3-  ----4-------   --*6*---****7***--5-  -----8-------------
            '#([^a-zA-Z_0-9\.]|^)([0-9][0-9_]*)?(\.)([0-9][0-9_]*)?(([eE])([0-9][0-9_]*))?(?=[^a-zA-Z_0-9\.]|$)#'
    ), '.', array(
        1 => true,
        2 => array('integer', false),
        3 => array('symbol', false),
        4 => array('integer', false),
        6 => array('symbol', false),
        7 => array('integer', false),
        8 => true
    ));

    $context->addObjectSplitter('.', 'featurecall', 'symbol');

    // use provided eiffelcode parser
    $context->setComplexFlag(GESHI_COMPLEX_TOKENIZE);
}

function geshi_eiffel_eiffel_character (&$context)
{
    $context->addDelimiters("'", "'");
    $context->addEscapeGroup('%', array(
        'A', 'B', 'C', 'D', 'F', 'H', 'L', 'N', 'Q',
        'R', 'S', 'T', 'U', 'V', '%', "'", '"', '(',
        ')', '<', '>',
        )
    );
    // manifest characters specified with integer constants
    $context->addEscapeGroup('%', array(
        'REGEX#/[0-9][0-9_]*/#',
        'REGEX#/0[bcxBCX][0-9a-fA-F][0-9a-fA-F_]*/#'
        )
    );

    $context->setComplexFlag(GESHI_COMPLEX_PASSALL);
}

function geshi_eiffel_eiffel_string(&$context)
{
    $context->addDelimiters('"', array('"', "\n"));
    $context->addDelimiters(array('"[','"{'), array(']"','}"'));
    $context->addEscapeGroup('%', array(
        'A', 'B', 'C', 'D', 'F', 'H', 'L', 'N', 'Q',
        'R', 'S', 'T', 'U', 'V', '%', "'", '"', '(',
        ')', '<', '>')
    );
    $context->setComplexFlag(GESHI_COMPLEX_PASSALL);
}

function geshi_eiffel_eiffel_comment(&$context)
{
    $context->addDelimiters('--', "\n");
    $context->setComplexFlag(GESHI_COMPLEX_PASSALL);
    // comment notation {CLASSNAME}.featurename
    $context->addRegexGroup(array(
            "#({[A-Z_]+})(\.)([A-Za-z0-9_]+)#"), '',
            array(
              1 => array('classname', false),
              2 => false,
              3 => array('featurename', false)
            )
        );
    // comment notation `featurename'
    $context->addRegexGroup(array(
            "#(`[^']+')#"), '',
            array(
              1 => array('featurename', false)
            )
        );
    // comment notation {CLASSNAME}
    $context->addRegexGroup(array(
            "#({[A-Z0-9_]+})#"), '',
            array(
              1 => array('classname', false)
            )
        );
}

/**#@-*/

?>