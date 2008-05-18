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
        0 => array('{'),
        1 => array('}'),
        2 => false
    )
);

$this->_childContexts = array(
    new GeSHiStringContext('css',  $DIALECT, 'string'),
    new GeSHiContext('css',  $DIALECT, 'common/multi_comment')
);

$this->_styler->setStartStyle($CONTEXT, 'font-weight:bold;color:#000;');
$this->_styler->setEndStyle($CONTEXT, 'font-weight:bold;color:#000;');

$this->_contextKeywords = array(
    0 => array(
        // keywords
        0 => array(
            'azimuth', 'background', 'background-attachment', 'background-color', 'background-image',
            'background-position', 'background-repeat', 'border', 'border-bottom', 'border-bottom-color',
            'border-bottom-style', 'border-bottom-width', 'border-collapse', 'border-color', 'border-left',
            'border-left-color', 'border-left-style', 'border-left-width', 'border-right', 'border-right-color',
            'border-right-style', 'border-right-width', 'border-spacing', 'border-style', 'border-top',
            'border-top-color', 'border-top-style', 'border-top-width', 'border-width', 'bottom',
            'caption-side', 'clear', 'clip', 'color', 'content', 'counter-increment', 'counter-reset', 'cue',
            'cue-after', 'cue-before', 'cursor', 'direction', 'display', 'elevation', 'empty-cells', 'float',
            'font', 'font-family', 'font-size', 'font-size-adjust', 'font-stretch', 'font-style',
            'font-variant', 'font-weight', 'height', 'left', 'letter-spacing', 'line-height', 'list-style',
            'list-style-image', 'list-style-keyword', 'list-style-position', 'list-style-type', 'margin',
            'margin-bottom', 'margin-left', 'margin-right', 'margin-top', 'marker-offset', 'max-height',
            'max-width', 'min-height', 'min-width', 'orphans', 'outline', 'outline-color', 'outline-style',
            'outline-width', 'overflow', 'padding', 'padding-bottom', 'padding-left', 'padding-right',
            'padding-top', 'page', 'page-break-after', 'page-break-before', 'page-break-inside', 'pause',
            'pause-after', 'pause-before', 'pitch', 'pitch-range', 'play-during', 'position', 'quotes',
            'richness', 'right', 'size', 'speak', 'speak-header', 'speak-numeral', 'speak-punctuation',
            'speech-rate', 'stress', 'table-layout', 'text-align', 'text-decoration', 'text-decoration-color',
            'text-indent', 'text-shadow', 'text-transform', 'top', 'unicode-bidi', 'vertical-align',
            'visibility', 'voice-family', 'volume', 'white-space', 'widows', 'width', 'word-spacing',
            'z-index', 'konq_bgpos_x', 'konq_bgpos_y', 'unicode-range', 'units-per-em', 'src', 'panose-1',
            'stemv', 'stemh', 'slope', 'cap-height', 'x-height', 'ascent', 'descent', 'widths', 'bbox',
            'definition-src', 'baseline', 'centerline', 'mathline', 'topline', '!important'
            ),
        // name
        1 => $CONTEXT . '/attrs',
        // style
        2 => 'color:#000;font-weight:bold;',
        // case sensitive
        3 => false,
        // url
        4 => ''
        ),
    1 => array(
        0 => array(
            'url', 'attr', 'rect', 'rgb', 'counter', 'counters', 'local', 'format'
        ),
        1 => $CONTEXT . '/paren',
        2 => 'color:#933;',
        3 => false,
        4 => ''
        ),
    2 => array(
        0 => array(
            'aqua', 'black', 'blue', 'fuchsia', 'gray', 'green', 'lime', 'maroon', 'navy', 'olive',
            'purple', 'red', 'silver', 'teal', 'white', 'yellow', 'ActiveBorder', 'ActiveCaption',
            'AppWorkspace', 'Background', 'ButtonFace', 'ButtonHighlight', 'ButtonShadow', 'ButtonText',
            'CaptionText', 'GrayText', 'Highlight', 'HighlightText', 'InactiveBorder', 'InactiveCaption',
            'InactiveCaptionText', 'InfoBackground', 'InfoText', 'Menu', 'MenuText', 'Scrollbar',
            'ThreeDDarkShadow', 'ThreeDFace', 'ThreeDHighlight', 'ThreeDLightShadow', 'ThreeDShadow',
            'Window', 'WindowFrame', 'WindowText'
        ),
        1 => $CONTEXT . '/colors',
        2 => 'color:#339;',
        3 => false,
        4 => ''
    ),
    3 => array(
        0 => array(
            'inherit', 'none', 'hidden', 'dotted', 'dashed', 'solid', 'double', 'groove', 'ridge', 'inset',
            'outset', 'xx-small', 'x-small', 'small', 'medium', 'large', 'x-large', 'xx-large', 'smaller',
            'larger', 'italic',
            'oblique',
            'small-caps',
            'normal',
            'bold',
            'bolder',
            'lighter',
            'light',
            'transparent',
            'repeat',
            'repeat-x',
            'repeat-y',
            'no-repeat',
            'baseline',
            'sub',
            'super',
            'top',
            'text-top',
            'middle',
            'bottom',
            'text-bottom',
            'left',
            'right',
            'center',
            'justify',
            'konq-center',
            'disc',
            'circle',
            'square',
            'decimal',
            'decimal-leading-zero',
            'lower-roman',
            'upper-roman',
            'lower-greek',
            'lower-alpha',
            'lower-latin',
            'upper-alpha',
            'upper-latin',
            'hebrew',
            'armenian',
            'georgian',
            'cjk-ideographic',
            'hiragana',
            'katakana',
            'hiragana-iroha',
            'katakana-iroha',
            'inline',
            'block',
            'list-item',
            'run-in',
            'compact',
            'marker',
            'table',
            'inline-table',
            'table-row-group',
            'table-header-group',
            'table-footer-group',
            'table-row',
            'table-column-group',
            'table-column',
            'table-cell',
            'table-caption',
            'auto',
            'crosshair',
            'default',
            'pointer',
            'move',
            'e-resize',
            'ne-resize',
            'nw-resize',
            'n-resize',
            'se-resize',
            'sw-resize',
            's-resize',
            'w-resize',
            'text',
            'wait',
            'help',
            'above',
            'absolute',
            'always',
            'avoid',
            'below',
            'bidi-override',
            'blink',
            'both',
            'capitalize',
            'caption',
            'close-quote',
            'collapse',
            'condensed',
            'crop',
            'cross',
            'embed',
            'expanded',
            'extra-condensed',
            'extra-expanded',
            'fixed',
            'hand',
            'hide',
            'higher',
            'icon',
            'inside',
            'invert',
            'landscape',
            'level',
            'line-through',
            'loud',
            'lower',
            'lowercase',
            'ltr',
            'menu',
            'message-box',
            'mix',
            'narrower',
            'no-close-quote',
            'no-open-quote',
            'nowrap',
            'open-quote',
            'outside',
            'overline',
            'portrait',
            'pre',
            'relative',
            'rtl',
            'scroll',
            'semi-condensed',
            'semi-expanded',
            'separate',
            'show',
            'small-caption',
            'static',
            'static-position',
            'status-bar',
            'thick',
            'thin',
            'ultra-condensed',
            'ultra-expanded',
            'underline',
            'uppercase',
            'visible',
            'wider',
            'break',
            'serif',
            'sans-serif',
            'cursive',
            'fantasy',
            'monospace'
        ),
        1 => $CONTEXT . '/types',
        2 => 'color:#393;',
        3 => false,
        4 => ''
    )
);

$this->_contextSymbols  = array(
    0 => array(
        0 => array(
            ':', ';', '(', ')', ','
            ),
        // name (should names have / in them like normal contexts? YES
        1 => $CONTEXT . '/sym',
        // style
        2 => 'color:#008000;'
        )
);

$this->_contextRegexps  = array(
    0 => array(
        0 => array(
            '#([-+]?[0-9]((em)|(ex)|(px)|(in)|(cm)|(mm)|(pt)|(pc)|%))#',
            '/(#(([0-9a-fA-F]){3}){1,2})/',
            '/([0-9]+)/'
        ),
        1 => '',
        2 => array(
            1 => array($CONTEXT . '/value', 'color: #933;', false)
        )
    )
);

?>
