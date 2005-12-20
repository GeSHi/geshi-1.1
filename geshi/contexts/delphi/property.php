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
 * @author    Benny Baumann <BenBE@benbe.omorphia.de>, Nigel McNie <nigel@geshi.org>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright (C) 2005 Nigel McNie
 * @version   $Id$
 *
 */

$this->_contextDelimiters = array(
    array(
        array('property'),
        array(';'),
        false
    )
);


$this->_childContexts = array(
    new GeSHiContext('delphi', $DIALECT, 'preprocessor'),
    new GeSHiContext('delphi', $DIALECT, 'single_comment'),
    new GeSHiContext('delphi', $DIALECT, 'multi_comment'),
    new GeSHiCodeContext('delphi', $DIALECT, 'property_index', 'delphi/' . $DIALECT)
);

$this->_startName = 'keyword'; // highlight starter as if it was a keyword
$this->_endName   = 'ctrlsym';  // highlight ender as if it was a ctrlsym

$this->_contextKeywords = array(
    array(
        array(
            'read','write','index','stored','default','nodefault','implements',
            'dispid','readonly','writeonly'
        ),
        $CONTEXT . '/keyword',
        false,
        ''
    ),
    array(
        array(
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
        $CONTEXT . '/keytype',
        false,
        ''
    ),
    array(
        array(
            //@todo get keywords normal way
            'nil',
            'false', 'true'
        ),
        $CONTEXT . '/keyident',
        false,
        ''
    )
);

$this->_contextSymbols  = array(
    array(
        array(
            ':'
        ),
        $CONTEXT . '/ctrlsym'
     )
);

$this->_contextRegexps  = array(
    array(
        array(
            '/(#[0-9]+)/'
        ),
        '#',
        array(
            1 => array($CONTEXT . '/char', false)
        )
    ),
    array(
        array(
            '/(#\$[0-9a-fA-F]+)/'
        ),
        '#',
        array(
            1 => array($CONTEXT . '/charhex', false)
        )
    ),
    array(
        array(
            '/(\$[0-9a-fA-F]+)/'
        ),
        '$',
        array(
            1 => array($CONTEXT . '/hex', 'color: #2bf;', false)
        )
    ),
    geshi_use_integers($CONTEXT)
);

$this->_objectSplitters = array(
    array(
        array('.'),
        $CONTEXT . '/oodynamic',
        false
    )
);

?>
