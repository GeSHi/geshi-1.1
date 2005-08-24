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

$this->_contextDelimiters = array(
    0 => array(
        0 => array('@', '<%'),
        1 => array('@', '%>'),
        2 => false
    )
);

$this->_childContexts = array(
    // Normally you'd use $DIALECT for the second parameter, but we want this
    // context to be as much like codeworker/codeworker as possible
    new GeSHiContext('codeworker',  'codeworker', 'common/multi_comment'),
    new GeSHiContext('codeworker', 'codeworker', 'common/single_comment'),
    new GeSHiStringContext('codeworker', 'codeworker', 'common/single_string'),
    new GeSHiStringContext('codeworker', 'codeworker', 'common/double_string')
);

//Skip styling since should already be done in codeworker/codeworker
//$this->_styler->setStyle($CONTEXT, 'color:#000;');

$this->_contextKeywords = array(
    0 => array(
        0 => array(
            'foreach', 'forfile', 'in', 'if', 'else', 'while', 'do', 'local', 'ref', 'localref',
			'value', 'node', 'function', 'return', 'insert', 'pushItem', 'break'
        ),
        // Again, we're faking being like codeworker
        1 => 'codeworker/codeworker/keywords',
        2 => 'color:#000;font-weight:bold;',
        3 => false,
        4 => ''
    ),
    1 => array(
        0 => array(
            'traceLine', 'removeElement', 'clearVariable', 'incrementIndentLevel',
			'decrementIndentLevel', 'setInputLocation', 'readChars', 'getShortFilename',
			'getInputFilename', 'getOutputFilename', 'replaceString', 'subString', 'rsubString',
			'findLastString', 'leftString', 'midString', 'startString', 'toLowerString',
			'toUpperString', 'composeCLikeString', 'composeHTMLLikeString', 'loadFile', 'size',
			'empty', 'key', 'first', 'last'
         ),
         1 => 'codeworker/codeworker/functions',
         2 => 'color:#006;',
         3 => false,
         4 => ''
     ),
    2 => array(
        0 => array(
            'project', 'this', '_ARGS', '_REQUEST', 'true', 'false'
        ),
        1 => 'codeworker/codeworker/constants',
        2 => 'color:#900;font-weight:bold;',
        3 => false,
        4 => ''
    ),
    3 => array(
        0 => array(
            'parseAsBNF', 'parseStringAsBNF', 'translate', 'translateString'
        ),
        1 => 'codeworker/codeworker/sfunctions',
        2 => 'color:#006;font-weight:bold;',
        3 => false,
        4 => ''
    )
);

$this->_contextSymbols  = array(
    0 => array(
        0 => array(
                '|', '=', '!', ':', '(', ')', ',', '<', '>', '&', '$', '+', '-', '*', '/',
                '{', '}', ';', '[', ']', '~', '?'
            ),
        1 => 'codeworker/codeworker/sym',
        2 => 'color:#008000;'
        )
);

$this->_contextRegexps  = array(
    0 => array(
        0 => array(
            '/(#[a-zA-Z][a-zA-Z0-9\-_]*)/'
        ),
        1 => '#',
        2 => array(
            1 => array('codeworker/codeworker/preprocessor', 'color:#933;', false)
        )
    ),
    1 => geshi_use_doubles('codeworker/codeworker'),
    2 => geshi_use_integers('codeworker/codeworker')
);

$this->_objectSplitters = array(
    0 => array(
        0 => array('.'),
        1 => 'codeworker/codeworker/oodynamic',
        2 => 'color:#559;',
        3 => true // Check that matched method isn't a keyword first
    )
);

?>
