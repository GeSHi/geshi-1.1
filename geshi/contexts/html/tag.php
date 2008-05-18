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
        0 => array('REGEX#<[/a-z_0-6]+#i'),
        1 => array('>'),
        2 => false
    )
);

$this->_childContexts = array(
    // HTML strings have no escape characters, so the don't need to be GeSHiStringContexts
    new GeSHiContext('html/string', 'string')
);

$this->_styler->setStyle($this->_contextName, 'color:#008000;');
$this->_styler->setStartStyle($this->_contextName, 'font-weight:bold;color:#000;');
$this->_styler->setEndStyle($this->_contextName, 'font-weight:bold;color:#000;');
$this->_contextStyleType = GESHI_STYLE_NONE;
$this->_delimiterParseData = GESHI_CHILD_PARSE_BOTH;


$this->_contextKeywords = array(
    0 => array(
        // keywords
        0 => array(
            'lang', 'cellspacing', 'cellpadding', 'http-equiv', 'content', 'type', 'border',
            'class', 'id', 'href', 'width', 'align', 'height', 'colspan', 'nowrap', 'alt',
            'valign', 'name', 'size', 'value', 'maxlength', 'clear', 'rowspan', 'src', 'method',
            'action', 'bgcolor', 'background', 'onload', 'onsubmit', 'onmouseup', 'onmousedown',
            'onfocus', 'onblur', 'rows', 'cols', 'selected', 'checked', 'enctype', 'language'
            ),
        // name
        1 => $this->_contextName . '/attrs',
        // style
        2 => 'color:#006;',
        // case sensitive
        3 => false,
        // url
        4 => ''
        )
);

$this->_contextCharactersDisallowedBeforeKeywords = array();
$this->_contextCharactersDisallowedAfterKeywords  = array();

$this->_contextSymbols  = array(
    0 => array(
        0 => array(
            '='
            ),
        // name (should names have / in them like normal contexts? YES
        1 => $this->_contextName . '/sym',
        // style
        2 => 'color:#008000;'
        )
);

$this->_contextRegexps  = array(
);


?>
