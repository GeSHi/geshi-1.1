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
    new GeSHiContext('codeworker',  'codeworker', 'multi_comment'),
    new GeSHiContext('codeworker', 'codeworker', 'single_comment'),
    new GeSHiStringContext('codeworker', 'codeworker', 'single_string'),
    new GeSHiStringContext('codeworker', 'codeworker', 'double_string')
);

$this->_startName = 'roughtext';
$this->_endName   = 'roughtext';


$this->_contextKeywords = array(
    array(
        array(
            'foreach', 'forfile', 'in', 'if', 'else', 'while', 'do', 'local', 'ref', 'localref',
			'value', 'node', 'function', 'return', 'insert', 'pushItem', 'break'
        ),
        $CONTEXT . '/keyword',
        false,
        ''
    ),
    array(
        array(
            'traceLine', 'removeElement', 'clearVariable', 'incrementIndentLevel',
			'decrementIndentLevel', 'setInputLocation', 'readChars', 'getShortFilename',
			'getInputFilename', 'getOutputFilename', 'replaceString', 'subString', 'rsubString',
			'findLastString', 'leftString', 'midString', 'startString', 'toLowerString',
			'toUpperString', 'composeCLikeString', 'composeHTMLLikeString', 'loadFile', 'size',
			'empty', 'key', 'first', 'last'
        ),
        $CONTEXT . '/function',
        false,
        ''
    ),
    array(
        array(
            'project', 'this', '_ARGS', '_REQUEST', 'true', 'false'
        ),
        $CONTEXT . '/constant',
        false,
        ''
    ),
    array(
        array(
            'parseAsBNF', 'parseStringAsBNF', 'translate', 'translateString'
        ),
        $CONTEXT . '/sfunction',
        false,
        ''
    )
);

$this->_contextSymbols  = array(
    array(
        array(
            '|', '=', '!', ':', '(', ')', ',', '<', '>', '&', '$', '+', '-', '*', '/',
            '{', '}', ';', '[', ']', '~', '?'
        ),
        $CONTEXT . '/symbol'
    )
);

$this->_contextRegexps  = array(
    array(
        array(
            '/(#[a-zA-Z][a-zA-Z0-9\-_]*)/'
        ),
        '#',
        array(
            1 => array($CONTEXT . '/preprocessor', false)
        )
    ),
    geshi_use_doubles($CONTEXT),
    geshi_use_integers($CONTEXT)
);

$this->_objectSplitters = array(
    array(
        array('.'),
        $CONTEXT . '/oodynamic',
        true
    )
);

?>
