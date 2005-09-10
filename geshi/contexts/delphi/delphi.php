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
 * @package   lang
 * @author    Nigel McNie <nigel@geshi.org>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright (C) 2005 Nigel McNie
 * @version   $Id$
 * 
 */

// @todo [blocking 1.1.1] Rename OCCs with parent's name in front for theming
$this->_childContexts = array(
    new GeSHiContext('delphi',  $DIALECT, 'multi_comment'),
    new GeSHiContext('delphi', $DIALECT, 'common/single_comment'),
    new GeSHiContext('delphi', $DIALECT, 'common/single_string_eol'),
    new GeSHiContext('delphi', $DIALECT, 'preprocessor'),
    new GeSHiCodeContext('delphi', $DIALECT, 'asm')
);

$this->_styler->setStyle($CONTEXT, 'color:#000;');

$this->_contextKeywords = array(
    0 => array(
        0 => array(
            //@todo get keywords normal way
            'function', 'begin', 'end', 'if', 'then', 'else', 'div', 'var', 'string', 'type', 'record',
            'array', 'of', 'const', 'case', 'in', 'and', 'nil', 'try', 'finally', 'shr', 'while',
            'do', 'asm', 'for', 'to', 'procedure', 'shl', 'with', 'repeat', 'until', 'unit',
            'interface', 'uses', 'implementation', 'or' 
        ),
        1 => $CONTEXT . '/keywords',
        2 => 'color:#ca8;font-weight:bold;',
        3 => false,
        4 => ''
    )
);

$this->_contextSymbols  = array(
    0 => array(
        0 => array(
            '+', '-', '*', '/'
            ),
        1 => $CONTEXT . '/mathsym',
        2 => 'color:#008000;'
        ),
    1 => array(
        0 => array(
            ':', ';', '@'
            ),
        1 => $CONTEXT . '/ctrlsym',
        2 => 'color:#008000;'
        ),
    2 => array(
        0 => array(
            '<', '=', '>'
            ),
        1 => $CONTEXT . '/cmpsym',
        2 => 'color:#008000;'
        ),
    3 => array(
        0 => array(
            '(', ')', '[', ']'
            ),
        1 => $CONTEXT . '/brksym',
        2 => 'color:#008000;'
        ),
    4 => array(
        0 => array(
            '.', '^'
            ),
        1 => $CONTEXT . '/oopsym',
        2 => 'color:#008000;'
        )
//                        '|', '=', '!', ':', '(', ')', ',', '<', '>', '&', '$', '+', '-', '*', '/',
//                '{', '}', ';', '[', ']', '~', '?'
);

$this->_contextRegexps  = array(
    0 => array(
        0 => array(
            '/(#\$[0-9]+)/'
        ),
        1 => '#',
        2 => array(
            1 => array($CONTEXT . '/char', 'color:#db9;', false)
        )
    ),
    1 => array(
        0 => array(
            '/(\$[0-9a-fA-F_]+)/'
        ),
        1 => '$',
        2 => array(
            1 => array($CONTEXT . '/hex', 'color: #2bf;', false)
        )
    ),
    2 => geshi_use_doubles($CONTEXT),
    3 => geshi_use_integers($CONTEXT)
);

$this->_objectSplitters = array(
    0 => array(
        0 => array('.'),
        1 => $CONTEXT . '/oodynamic',
        2 => 'color:#559;',
        3 => false // If true, check that matched method isn't a keyword first
    )
);

?>
