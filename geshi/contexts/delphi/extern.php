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
        array('exports'),
        array(';'),
        false
    ),
    array(
        array('external'),
        array(';'),
        false
    )
);

$this->_childContexts = array(
    new GeSHiContext('delphi', $DIALECT, 'preprocessor'),
    new GeSHiContext('delphi', $DIALECT, 'multi_comment'),
    new GeSHiContext('delphi', $DIALECT, 'single_comment'),
    new GeSHiContext('delphi', $DIALECT, 'single_string'),
    new GeSHiCodeContext('delphi', $DIALECT, 'exports_brackets', 'delphi/' . $DIALECT)
);

$this->_startName = 'keyword';
$this->_endName   = 'ctrlsym';

$this->_contextKeywords = array(
    array(
        array(
            'name','index','resident'
        ),
        $CONTEXT . '/keyword',
        false,
        ''
    )
);

$this->_contextSymbols  = array(
    array(
        array(
            // @todo [blocking 1.1.5] [for ben]  the [ and ] symbols are repeated in both these arrays...
            // in addition . is already in oopsym, perhaps this array is meant to go?
            ',', '[', ']', '.'
        ),
        $CONTEXT . '/symbol'
    ),
    array(
        array(
            '(', ')', '[', ']'
        ),
        $CONTEXT . '/brksym',
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
            1 => array($CONTEXT . '/hex', false)
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
