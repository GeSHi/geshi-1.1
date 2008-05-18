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
    new GeSHiContext('javascript',  $DIALECT, 'multi_comment'),
    new GeSHiContext('javascript',  $DIALECT, 'single_comment'),
    new GeSHiStringContext('javascript',  $DIALECT, 'single_string'),
    new GeSHiStringContext('javascript',  $DIALECT, 'double_string')
);

$this->_contextKeywords = array(
    // Keywords
    array(
        array(
            'break', 'case', 'catch', 'const', 'continue', 'default', 'delete', 'do',
            'else', 'false', 'finally', 'for', 'function', 'if', 'in', 'new', 'null',
            'return', 'switch', 'throw', 'true', 'try', 'typeof', 'var', 'void',
            'while', 'with'
        ),
        $CONTEXT . '/keyword',
        true,
        ''
    ),
    
    // Functions
    array(
        array(
            'escape', 'isFinite', 'isNaN', 'Number', 'parseFloat', 'parseInt',
            'reload', 'taint', 'unescape', 'untaint', 'write'
        ),
        $CONTEXT . '/function',
        true,
        ''
    ),
    
    // Objects
    array(
        array(
            'Anchor', 'Applet', 'Area', 'Array', 'Boolean', 'Button', 'Checkbox',
            'Date', 'document', 'window', 'Image', 'FileUpload', 'Form', 'Frame',
            'Function', 'Hidden', 'Link', 'MimeType', 'Math', 'Max', 'Min', 'Layer',
            'navigator', 'Object', 'Password', 'Plugin', 'Radio', 'RegExp', 'Reset',
            'Screen', 'Select', 'String', 'Text', 'Textarea', 'this', 'Window'
        ),
        $CONTEXT . '/object',
        true,
        ''
    ),
    
    // Math constants/methods
    array(
        array(
            'abs', 'acos', 'asin', 'atan', 'atan2', 'ceil', 'cos', 'ctg', 'E', 'exp',
            'floor', 'LN2', 'LN10', 'log', 'LOG2E', 'LOG10E', 'PI', 'pow', 'round',
            'sin', 'sqrt', 'SQRT1_2', 'SQRT2', 'tan'
        ),
        $CONTEXT . '/math',
        true,
        ''
    ),
    
    // Events
    array(
        array(
            'onAbort', 'onBlur', 'onChange', 'onClick', 'onError', 'onFocus', 'onLoad',
            'onMouseOut', 'onMouseOver', 'onReset', 'onSelect', 'onSubmit', 'onUnload'
        ),
        $CONTEXT . '/event',
        true,
        ''
    ),
    
    // Methods
    array(
        array(
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
        $CONTEXT . '/method',
        true,
        ''
    )
);

$this->_contextCharactersDisallowedBeforeKeywords = array('$');
$this->_contextCharactersDisallowedAfterKeywords = array();

$this->_contextSymbols  = array(
    array(
        array(
            '(', ')', ',', ';', ':', '[', ']',
            '+', '-', '*', '/', '&', '|', '!', '<', '>',
            '{', '}', '='
        ),
        $CONTEXT . '/symbol'
    )
);

$this->_contextRegexps  = array(
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
