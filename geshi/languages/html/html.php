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

function geshi_html_html (&$context)
{
    $context->addChild('doctype');
    $context->addChild('tag', 'code');
    $context->addChild('comment');
    //@todo [blocking 1.1.9] The <![CDATA[ was added to stop CSS jumping into attribute selector context
    //the moment it was encountered, but this only really applies to XML
    $context->addChildLanguage('css/css', 'REGEX#<style[^>]+>\s*(<!\[CDATA\[)?#i', '</style>',
        false, GESHI_CHILD_PARSE_NONE);
    $context->addChildLanguage('javascript/javascript', 'REGEX#<script[^>]+>#i', '</script>',
        false, GESHI_CHILD_PARSE_NONE);

    $context->addRegexGroup('#(&(([a-z0-9]{2,5})|(\#[0-9]{2,4}));)#', '&',
        array(
            1 => array('entity', false)
        )
    );
}

function geshi_html_html_doctype (&$context)
{
    $context->addDelimiters('<!DOCTYPE ', '>');
    $context->addChild('string');
}

function geshi_html_html_tag (&$context)
{
    $context->addDelimiters('REGEX#<[/a-z_0-6]+#i', '>');
    $context->addChild('string');

    // Attributes
    $context->addKeywordGroup(array(
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
        ), 'attribute'
    );
    
    $context->addSymbolGroup(array('=', '/'), 'symbol');
}

function geshi_html_html_tag_string (&$context)
{
    $context->addDelimiters("'", "'");
    $context->addDelimiters('"', '"');
    $context->alias('string');
    // NOTE: need to support parsing left delimiter only and _neverTrim
    $context->addChildLanguage('javascript/javascript', array('javascript:', 'return'), array('"', "'"),
        false, GESHI_CHILD_PARSE_LEFT);
    //$this->_contextStyleType = GESHI_STYLE_STRINGS;
}

function geshi_html_html_doctype_string (&$context)
{
    geshi_html_html_tag_string($context);
}

function geshi_html_html_comment (&$context)
{
    $context->addDelimiters('<!--', '-->');
    //$this->_contextStyleType = GESHI_STYLE_COMMENTS;
}

?>
