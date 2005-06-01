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
        0 => array('{'),
        1 => array('}'),
        2 => false
    )
);

$this->_childContexts = array(
    // HTML strings have no escape characters, so the don't need to be GeSHiStringContexts
    new GeSHiContext('common/single_string', 'single_string'),
    new GeSHiContext('common/multi_comment', 'multi_comment')
);

$this->_styler->setStyle($this->_styleName, '');
$this->_styler->setStartStyle($this->_styleName, 'font-weight:bold;color:#000;');
$this->_styler->setEndStyle($this->_styleName, 'font-weight:bold;color:#000;');
$this->_contextStyleType = GESHI_STYLE_NONE;
$this->_delimiterParseData = GESHI_CHILD_PARSE_BOTH;


$this->_contextKeywords = array(
    0 => array(
        // keywords
        0 => array(
            'azimuth', 'background', 'background-attachment', 'background-color', 'background-image',
            'background-position', 'background-repeat', 'border', 'border-bottom', 'border-bottom-color',
            'border-bottom-style', 'border-bottom-width', 'border-collapse', 'border-color', 'border-left',
            'border-left-color', 'border-left-style', 'border-left-width', 'border-right', 'border-right-color',
            'border-right-style', 'border-right-width', 'border-spacing', 'border-style', 'border-top',
            'border-top-color', 'border-top-style', 'border-top-width',
            'border-width',
            'bottom',
            'caption-side',
            'clear',
            'clip',
            'color',
            'content',
            'counter-increment',
            'counter-reset',
            'cue',
            'cue-after',
            'cue-before',
            'cursor',
            'direction',
            'display',
            'elevation',
            'empty-cells',
            'float',
            'font',
            'font-family',
            'font-size',
            'font-size-adjust',
            'font-stretch',
            'font-style',
            'font-variant',
            'font-weight',
            'height',
            'left',
            'letter-spacing',
            'line-height',
            'list-style',
            'list-style-image',
            'list-style-keyword',
            'list-style-position',
            'list-style-type',
            'margin',
            'margin-bottom',
            'margin-left',
            'margin-right',
            'margin-top',
            'marker-offset',
            'max-height',
            'max-width',
            'min-height',
            'min-width',
            'orphans',
            'outline',
            'outline-color',
            'outline-style',
            'outline-width',
            'overflow',
            'padding',
            'padding-bottom',
            'padding-left',
            'padding-right',
            'padding-top',
            'page',
            'page-break-after',
            'page-break-before',
            'page-break-inside',
            'pause',
            'pause-after',
            'pause-before',
            'pitch',
            'pitch-range',
            'play-during',
            'position',
            'quotes',
            'richness',
            'right',
            'size',
            'speak',
            'speak-header',
            'speak-numeral',
            'speak-punctuation',
            'speech-rate',
            'stress',
            'table-layout',
            'text-align',
            'text-decoration',
            'text-decoration-color',
            'text-indent',
            'text-shadow',
            'text-transform',
            'top',
            'unicode-bidi',
            'vertical-align',
            'visibility',
            'voice-family',
            'volume',
            'white-space',
            'widows',
            'width',
            'word-spacing',
            'z-index',
            'konq_bgpos_x',
            'konq_bgpos_y',
            'font-family',
            'font-size',
            'font-stretch',
            'font-style',
            'font-variant',
            'font-weight',
            'unicode-range',
            'units-per-em',
            'src',
            'panose-1',
            'stemv',
            'stemh',
            'slope',
            'cap-height',
            'x-height',
            'ascent',
            'descent',
            'widths',
            'bbox',
            'definition-src',
            'baseline',
            'centerline',
            'mathline',
            'topline'
            ),
        // name
        1 => $this->_styleName . '/attrs',
        // style
        2 => 'color:#000;font-weight:bold;',
        // case sensitive
        3 => false,
        // url
        4 => ''
        ),
    1 => array(
        0 => array('url'),
        1 => $this->_styleName . '/values',
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
            ':', ';', '(', ')', '%'
            ),
        // name (should names have / in them like normal contexts? YES
        1 => $this->_styleName . '/sym',
        // style
        2 => 'color:#008000;'
        )
);

$this->_contextRegexps  = array(
    /*0 => array(
        0 => array(
            '/(#[0-9a-fA-F]{3,6})/'
        ),
        1 => '#',
        2 => array(
            1 => array($this->_styleName . '/color', 'color:#933;')
        )
    ),*/
    0 => array(
        0 => array(
            '#([-+]?[0-9]((em)|(ex)|(px)|(in)|(cm)|(mm)|(pt)|(pc)))#',
            '/(#[0-9a-fA-F]{3,6})/',
            '/([0-9]+)/'
        ),
        1 => '',
        2 => array(
            1 => array($this->_styleName . '/value', 'color: #933;')
        )
    )
);

?>
