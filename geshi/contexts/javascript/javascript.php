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
            'break', 'case', 'catch', 'const', 'continue', 'default', 'delete', 'do',
            'else', 'false', 'finally', 'for', 'function', 'if', 'in', 'new', 'null',
            'return', 'switch', 'throw', 'true', 'try', 'typeof', 'var', 'void',
            'while', 'with'
        ),
        1 => $CONTEXT . '/keywords',
        2 => 'color:#000;font-weight:bold;',
        3 => true,
        4 => ''
    ),
    1 => array(
        0 => array(
            'escape', 'isFinite', 'isNaN', 'Number', 'parseFloat', 'parseInt',
            'reload', 'taint', 'unescape', 'untaint', 'write'
        ),
        1 => $CONTEXT . '/functions',
        2 => 'color:#006;',
        3 => true,
        4 => ''
    ),
    2 => array(
        0 => array(
            'Anchor', 'Applet', 'Area', 'Array', 'Boolean', 'Button', 'Checkbox',
            'Date', 'document', 'window', 'Image', 'FileUpload', 'Form', 'Frame',
            'Function', 'Hidden', 'Link', 'MimeType', 'Math', 'Max', 'Min', 'Layer',
            'navigator', 'Object', 'Password', 'Plugin', 'Radio', 'RegExp', 'Reset',
            'Screen', 'Select', 'String', 'Text', 'Textarea', 'this', 'Window'
        ),
        1 => $CONTEXT . '/objects',
        2 => 'color:#393;font-weight:bold;',
        3 => true,
        4 => ''
    ),
    3 => array(
        0 => array(
            'abs', 'acos', 'asin', 'atan', 'atan2', 'ceil', 'cos', 'ctg', 'E', 'exp',
            'floor', 'LN2', 'LN10', 'log', 'LOG2E', 'LOG10E', 'PI', 'pow', 'round',
            'sin', 'sqrt', 'SQRT1_2', 'SQRT2', 'tan'
        ),
        1 => $CONTEXT . '/math',
        2 => 'color:#fd0;',
        3 => true,
        4 => ''
    ),
    4 => array(
        0 => array(
            'onAbort', 'onBlur', 'onChange', 'onClick', 'onError', 'onFocus', 'onLoad',
            'onMouseOut', 'onMouseOver', 'onReset', 'onSelect', 'onSubmit', 'onUnload'
        ),
        1 => $CONTEXT . '/events',
        2 => 'color:#fdb;',
        3 => true,
        4 => ''
    ),
    5 => array(
        0 => array(
            'MAX_VALUE', 'MIN_VALUE', 'NEGATIVE_INFINITY', 'NaN', 'POSITIVE_INFINITY',
            'URL', 'UTC', 'above', 'action', 'alert', 'alinkColor', 'anchor',
            'anchors', 'appCodeNam', 'appName', 'appVersion', 'applets', 'apply',
            'argument', 'arguments', 'arity', 'availHeight', 'availWidth', 'back',
            'background', 'below', 'bgColor', 'big', 'blink', 'blur', 'bold',
            'border', 'call', 'caller', 'charAt', 'charCodeAt', 'checked',
            'clearInterval', 'clearTimeout', 'click', 'clip', 'close', 'closed',
            'colorDepth', 'compile', 'complete', 'confirm', 'constructor', 'cookie',
            'current', 'cursor', 'data', 'defaultChecked', 'defaultSelected',
            'defaultStatus', 'defaultValue', 'description', 'disableExternalCapture',
            'domain', 'elements', 'embeds', 'enableExternalCapture', 'enabledPlugin',
            'encoding', 'eval', 'exec', 'fgColor', 'filename', 'find', 'fixed',
            'focus', 'fontcolor', 'fontsize', 'form', 'formName', 'forms', 'forward',
            'frames', 'fromCharCode', 'getDate', 'getDay', 'getElementById',
            'getHours', 'getMiliseconds', 'getMinutes', 'getMonth', 'getSeconds',
            'getSelection', 'getTime', 'getTimezoneOffset', 'getUTCDate', 'getUTCDay',
            'getUTCFullYear', 'getUTCHours', 'getUTCMilliseconds', 'getUTCMinutes',
            'getUTCMonth', 'getUTCSeconds', 'getYear', 'global', 'go', 'hash',
            'height', 'history', 'home', 'host', 'hostname', 'href', 'hspace',
            'ignoreCase', 'images', 'index', 'indexOf', 'innerHeight', 'innerWidth',
            'input', 'italics', 'javaEnabled', 'join', 'language', 'lastIndex',
            'lastIndexOf', 'lastModified', 'lastParen', 'layerX', 'layerY', 'layers',
            'left', 'leftContext', 'length', 'link', 'linkColor', 'links', 'load',
            'location', 'locationbar', 'lowsrc', 'match', 'menubar', 'method',
            'mimeTypes', 'modifiers', 'moveAbove', 'moveBelow', 'moveBy', 'moveTo',
            'moveToAbsolute', 'multiline', 'name', 'negative_infinity', 'next',
            'open', 'opener', 'options', 'outerHeight', 'outerWidth', 'pageX',
            'pageXoffset', 'pageY', 'pageYoffset', 'parent', 'parse', 'pathname',
            'personalbar', 'pixelDepth', 'platform', 'plugins', 'pop', 'port',
            'positive_infinity', 'preference', 'previous', 'print', 'prompt',
            'protocol', 'prototype', 'push', 'referrer', 'refresh', 'releaseEvents',
            'reload', 'replace', 'reset', 'resizeBy', 'resizeTo', 'reverse',
            'rightContext', 'screenX', 'screenY', 'scroll', 'scrollBy', 'scrollTo',
            'scrollbar', 'search', 'select', 'selected', 'selectedIndex', 'self',
            'setDate', 'setHours', 'setMinutes', 'setMonth', 'setSeconds', 'setTime',
            'setTimeout', 'setUTCDate', 'setUTCDay', 'setUTCFullYear', 'setUTCHours',
            'setUTCMilliseconds', 'setUTCMinutes', 'setUTCMonth', 'setUTCSeconds',
            'setYear', 'shift', 'siblingAbove', 'siblingBelow', 'small', 'sort',
            'source', 'splice', 'split', 'src', 'status', 'statusbar', 'strike',
            'sub', 'submit', 'substr', 'substring', 'suffixes', 'sup', 'taintEnabled',
            'target', 'test', 'text', 'title', 'toGMTString', 'toLocaleString',
            'toLowerCase', 'toSource', 'toString', 'toUTCString', 'toUpperCase',
            'toolbar', 'top', 'type', 'unshift', 'unwatch', 'userAgent', 'value',
            'valueOf', 'visibility', 'vlinkColor', 'vspace', 'watch', 'which',
            'width', 'write', 'writeln', 'x', 'y', 'zIndex'
            //@todo [blocking 1.1.5] Some important and recent DOM additions for js seem to be ommited...
        ),
        1 => $CONTEXT . '/methods',
        2 => 'color:#933;',
        3 => true,
        4 => ''
    )
);

$this->_contextCharactersDisallowedBeforeKeywords = array('_');
$this->_contextCharactersDisallowedAfterKeywords = array('_');

$this->_contextSymbols  = array(
    0 => array(
        0 => array(
            '(', ')', ',', ';', ':', '[', ']',
            '+', '-', '*', '/', '&', '|', '!', '<', '>',
            '{', '}', '='
            ),
        // name (should names have / in them like normal contexts? YES
        1 => $CONTEXT . '/symbols',
        // style
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
        2 => 'color:#559;',
        3 => true // Check that matched method isn't a keyword first
    )
);
?>
