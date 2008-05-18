<?php
/**
 * GeSHi - Generic Syntax Highlighter
 * ----------------------------------
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
        0 => array('@import', '@charset'),
        1 => array(';'),
        2 => false
    )
);

$this->_childContexts = array(
    new GeSHiStringContext('css/string')
);

$this->_styler->setStartStyle($this->_contextName, 'color:#c9c;font-weight:bold;');
$this->_styler->setEndStyle($this->_contextName, 'color:#008000;');
$this->_contextStyleType = GESHI_STYLE_NONE;
// irrelevant if no delimiters...
$this->_delimiterParseData = GESHI_CHILD_PARSE_BOTH;

$this->_contextKeywords = array(
    0 => array(
        0 => array(
            'url'
        ),
        1 => $this->_contextName . '/blah',
        2 => 'color:#933;',
        3 => false,
        4 => ''
    )
);
$this->_contextCharactersDisallowedBeforeKeywords = array();
$this->_contextCharactersDisallowedAfterKeywords  = array();

$this->_contextSymbols  = array(
    0 => array(
        0 => array(
            ':', ';', '(', ')'
            ),
        // name (should names have / in them like normal contexts? YES
        1 => $this->_contextName . '/sym',
        // style
        2 => 'color:#008000;'
        )
);

?>
