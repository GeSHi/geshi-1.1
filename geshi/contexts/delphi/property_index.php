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

$this->_contextDelimiters = array(
    0 => array(
        0 => array('['),
        1 => array(']'),
        2 => false
    )
);


$this->_childContexts = array(
    new GeSHiContext('delphi', $DIALECT, 'preprocessor'),
    new GeSHiContext('delphi', $DIALECT, 'common/single_comment'),
    new GeSHiContext('delphi', $DIALECT, 'multi_comment')
);


//$this->_styler->setStyle($CONTEXT, 'color:#000;');
//$this->_styler->setStartStyle($CONTEXT, 'color:#f00;font-weight:bold;');
//$this->_styler->setEndStyle($CONTEXT, 'color:#00f;');
$this->_startName = 'brksym'; // highlight starter as if it was a keyword
$this->_endName   = 'brksym';  // highlight ender as if it was a ctrlsym

$this->_contextKeywords = array(
    0  => array(
        0 => array(
            'Boolean', 'ByteBool', 'LongBool', 'WordBool', 'Bool',

            'Byte',  'SmallInt',
            'ShortInt', 'Word',
            'Integer', 'Cardinal',
            'LongInt', 'DWORD',
            'Int64',

            'Single', 'Double', 'Extended',
            'Real48', 'Real', 'Comp', 'Currency',

            'Pointer',

            'Char', 'AnsiChar', 'WideChar',
            'PChar', 'PAnsiChar', 'PWideChar',
            'String', 'AnsiString', 'WideString',

            'THandle'
        ),
        1 => $CONTEXT . '/keytypes',
        2 => 'color:#000; font-weight:bold;',
        3 => false,
        4 => ''
    )
);

$this->_contextSymbols  = array(
    0 => array(
        0 => array(
            ':', ';', ','
            ),
        1 => $CONTEXT . '/ctrlsym',
        2 => 'color:#008000;'
    ),
    1 => array(
        0 => array(
            '.'
            ),
        1 => $CONTEXT . '/oopsym',
        2 => 'color:#008000;'
    )
);

$this->_contextRegexps  = array(
    0 => array(
        0 => array(
            '/(#[0-9]+)/'
        ),
        1 => '#',
        2 => array(
            1 => array($CONTEXT . '/char', 'color:#db9;', false)
        )
    ),
    1 => array(
        0 => array(
            '/(#\$[0-9a-fA-F]+)/'
        ),
        1 => '#',
        2 => array(
            1 => array($CONTEXT . '/charhex', 'color:#db9;', false)
        )
    ),
    2 => array(
        0 => array(
            '/(\$[0-9a-fA-F]+)/'
        ),
        1 => '$',
        2 => array(
            1 => array($CONTEXT . '/hex', 'color: #2bf;', false)
        )
    ),
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