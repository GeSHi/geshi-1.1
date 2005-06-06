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

/** Get the GeSHiStringContext class */
require_once GESHI_CLASSES_ROOT . 'class.geshistringcontext.php';

$this->_childContexts = array(
    new GeSHiContext('javascript',  $DIALECT, 'common/multi_comment'),
    new GeSHiContext('javascript',  $DIALECT, 'common/single_comment'),
    new GeSHiStringContext('javascript',  $DIALECT, 'common/single_string'),
    new GeSHiStringContext('javascript',  $DIALECT, 'common/double_string')
);

$this->_contextKeywords = array(
    0 => array(
        0 => array(
            'function', 'new', 'this', 'return', 'true', 'false', 'var', 'for', 'if', 'else', 'null'
        ),
        1 => $CONTEXT . '/kw1',
        2 => 'color:#000;font-weight:bold;',
        3 => true,
        4 => ''
    ),
    1 => array(
        0 => array(
            'document', 'window', 'alert', 'navigator', 'typeof'
        ),
        1 => $CONTEXT . '/kw2',
        2 => 'color:#933;',
        3 => true,
        4 => ''
    )
);

$this->_contextCharactersDisallowedBeforeKeywords = array('_');

$this->_contextSymbols  = array(
        0 => array(
            0 => array(
                '(', ')', ',', ';', ':', '[', ']'
                ),
            // name (should names have / in them like normal contexts? YES
            1 => $CONTEXT . '/sym0',
            // style
            2 => 'color:#008000;'
            ),
        1 => array(
            0 => array(
                '+', '-', '*', '/', '&', '|', '!', '<', '>'
                ),
            1 => $CONTEXT . '/sym1',
            2 => 'color:#008000;'
            ),
        2 => array(
            0 => array(
                '{', '}', '=', '@'
                ),
            1 => $CONTEXT . '/sym2',
            2 => 'color:#008000;'
            )
);
$this->_contextRegexps  = array(
    0 => geshi_use_doubles($CONTEXT),
    1 => geshi_use_integers($CONTEXT)
);
$this->_objectSplitters = array(
    0 => array(
        0 => array('.'),
        1 => $CONTEXT . '/oodynamic',
        2 => 'color:green;'
    )
);
?>
