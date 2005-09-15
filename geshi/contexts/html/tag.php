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
        0 => array('REGEX#<[/a-z_0-6]+#i'),
        1 => array('>'),
        2 => false
    )
);

$this->_childContexts = array(
    // HTML strings have no escape characters, so the don't need to be GeSHiStringContexts
    new GeSHiContext('html',  $DIALECT, 'string')
);

$this->_styler->setStyle($CONTEXT, 'color:#008000;');
$this->_styler->setStyle($CONTEXT_START, 'font-weight:bold;color:#000;');
$this->_styler->setStyle($CONTEXT_END, 'font-weight:bold;color:#000;');

$this->_contextKeywords = array(
    0 => array(
        // keywords
        0 => array(
            'abbr', 'accept-charset', 'accept', 'accesskey', 'action', 'align',
            'alink', 'alt', 'archive', 'axis', 'background', 'bgcolor', 'border',
            'cellpadding', 'cellspacing', 'char', 'charoff', 'charset', 'checked',
            'cite', 'class', 'classid', 'clear', 'code', 'codebase', 'codetype',
            'color', 'cols', 'colspan', 'compact', 'content', 'coords', 'data',
            'datetime', 'declare', 'defer', 'dir', 'disabled', 'enctype', 'face',
            'for', 'frame', 'frameborder', 'headers', 'height', 'href', 'hreflang',
            'hspace', 'http-equiv', 'id', 'ismap', 'label', 'lang', 'language',
            'link', 'longdesc', 'marginheight', 'marginwidth', 'maxlength', 'media',
            'method', 'multiple', 'name', 'nohref', 'noresize', 'noshade', 'nowrap',
            'object', 'onblur', 'onchange', 'onclick', 'ondblclick', 'onfocus',
            'onkeydown', 'onkeypress', 'onkeyup', 'onload', 'onmousedown',
            'onmousemove', 'onmouseout', 'onmouseover', 'onmouseup', 'onreset',
            'onselect', 'onsubmit', 'onunload', 'profile', 'prompt', 'readonly',
            'rel', 'rev', 'rows', 'rowspan', 'rules', 'scheme', 'scope', 'scrolling',
            'selected', 'shape', 'size', 'span', 'src', 'standby', 'start', 'style',
            'summary', 'tabindex', 'target', 'text', 'title', 'type', 'usemap',
            'valign', 'value', 'valuetype', 'version', 'vlink', 'vspace', 'width'
        ),
        // name
        1 => $CONTEXT . '/attrs',
        // style
        2 => 'color:#006;',
        // case sensitive
        3 => false,
        // url
        4 => ''
        )
);

$this->_contextSymbols  = array(
    0 => array(
        0 => array(
            '='
            ),
        // name (should names have / in them like normal contexts? YES
        1 => $CONTEXT . '/sym',
        // style
        2 => 'color:#008000;'
        )
);

?>
