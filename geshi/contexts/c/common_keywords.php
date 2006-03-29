<?php
/**
 * GeSHi - Generic Syntax Highlighter
 *
 * For information on how to use GeSHi, please consult the documentation
 * found in the docs/ directory, or online at http://geshi.org/docs/
 *
 *
 * Most of the keyword lists in this file are used in multiple contexts; this
 * file avoids redundancy and keeps all lists in one spot.
 *
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
 * @author    
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright (C) 2006
 * @version   $Id$
 *
 */

/**
 * Control-flow keywords (complete list)
 */
$this->_CcontrolFlowKeywords = array(
    array(
        'break', 'case', 'continue', 'default', 'do', 'else', 'for', 'goto',
        'if', 'return', 'switch', 'while'
    ),
    'http://clc-wiki.net/wiki/{FNAME}'
);

/**
 * Declaration and type-related keywords (complete list)
 */
$this->_CdeclaratorKeywords = array(
    array(
        'enum', 'struct', 'typedef', 'union'
    ),
    'http://clc-wiki.net/wiki/{FNAME}'
);

/**
 * Types and qualifiers (need to verify as complete list but probably not)
 */
$this->_CtypesAndQualifiers = array(
    array(
        'auto', '_Bool', 'char', 'clock_t', '_Complex', 'const', 'div_t',
        'double', 'extern', 'FILE', 'float', 'fpos_t', '_Imaginary', 'inline',
        'int', 'jmp_buf', 'ldiv_t', 'long', 'ptrdiff_t', 'register',
        'restrict', 'short', 'signal', 'signed', 'size_t', 'static', 'string',
        'time_t', 'tm'/*a struct*/, 'unsigned', 'va_list', 'void', 'volatile',
        'wchar_t'
    ),
    'http://clc-wiki.net/wiki/{FNAME}'
);

/**
 * Standard library functions (need to verify whether comprehensive)
 */
$this->_CstandardFunctions = array(
    array(
        'abort', 'abs', 'acos', 'asctime', 'asin', 'assert', 'atan',
        'atan2', 'atexit', 'atof', 'atoi', 'atol', 'bsearch', 'calloc',
        'ceil', 'clearerr', 'clock', 'cos', 'cosh', 'ctime', 'difftime',
        'div', 'exit', 'exp', 'fabs', 'fclose', 'feof', 'ferror',
        'fflush', 'fgetc', 'fgetpos', 'fgets', 'floor', 'fmod', 'fopen',
        'fprintf', 'fputc', 'fputs', 'fread', 'free', 'freopen', 'frexp',
        'fscanf', 'fseek', 'fsetpos', 'ftell', 'fwrite', 'getc',
        'getchar', 'getenv', 'gets', 'gmtime', 'isalnum', 'isalpha',
        'iscntrl', 'isdigit', 'isgraph', 'islower', 'isprint', 'ispunct',
        'isspace', 'isupper', 'isxdigit', 'labs', 'ldexp', 'ldiv',
        'localtime', 'log', 'log10', 'longjmp', 'main'/*user-supplied but
        fits best in this grouping*/, 'malloc', 'memchr',
        'memcmp', 'memcpy', 'memmove', 'memset', 'mktime', 'modf',
        'offsetof', 'perror', 'pow', 'printf', 'putc', 'putchar', 'puts',
        'qsort', 'raise', 'rand', 'realloc', 'remove', 'rename', 'rewind',
        'scanf', 'setbuf', 'setjmp', 'setvbuf', 'sin', 'sinh',
        'sizeof'/*actually an operator rather than a function (except for
         C99 VLAs) but fits best here*/, 'snprintf', 'sprintf', 'sqrt',
        'srand', 'sscanf', 'strcat', 'strchr', 'strcmp', 'strcoll',
        'strcpy', 'strcspn', 'strerror', 'strftime', 'strlen', 'strncat',
        'strncmp', 'strncpy', 'strpbrk', 'strrchr', 'strspn', 'strstr',
        'strtod', 'strtok', 'strtol', 'strtoul', 'strxfrm', 'system',
        'tan', 'tanh', 'time', 'tmpfile', 'tmpname', 'tolower', 'toupper',
        'ungetc', 'va_arg', 'va_end', 'va_start', 'vfprintf', 'vprintf',
        'vsprintf'
    ),
    'http://clc-wiki.net/wiki/{FNAME}'
);

/**
 * Standard macros and objects (not comprehensive - many missing; NB in
 * particular the macros in 7.8.1 and 7.18 in N1124 e.g. INT8_C)
 */
$this->_CstandardMacrosAndObjects = array(
    array(
        'BUFSIZ', 'CHAR_BIT', 'CHAR_MAX', 'CHAR_MIN', 'CLOCKS_PER_SEC',
        '__DATE__', 'DBL_DIG', 'DBL_EPSILON', 'DBL_MANT_DIG', 'DBL_MAX',
        'DBL_MAX_EXP', 'DBL_MIN', 'DBL_MIN_EXP', 'EDOM', 'EOF', 'ERANGE',
        'errno', 'EXIT_FAILURE', 'EXIT_SUCCESS', 'false', '__FILE__',
        'FILENAME_MAX', 'FLT_DIG', 'FLT_EPSILON', 'FLT_MANT_DIG',
        'FLT_MAX', 'FLT_MAX_EXP', 'FLT_MIN', 'FLT_MIN_EXP', 'FLT_RADIX',
        'FLT_ROUNDS', 'FOPEN_MAX', 'HUGE_VAL', 'INT_MAX', 'INT_MIN',
        'LDBL_DIG', 'LDBL_EPSILON', 'LDBL_MANT_DIG', 'LDBL_MAX',
        'LDBL_MAX_EXP', 'LDBL_MIN', 'LDBL_MIN_EXP', '__LINE__', 'LONG_MAX',
        'LONG_MIN', 'L_tmpnam', 'NULL', 'RAND_MAX', 'SCHAR_MAX',
        'SCHAR_MIN', 'SEEK_CUR', 'SEEK_END', 'SEEK_SET', 'SHRT_MAX',
        'SHRT_MIN', 'SIGABRT', 'SIG_DFL', 'SIG_ERR', 'SIGFPE', 'SIG_IGN',
        'SIGILL', 'SIGINT', 'SIGSEGV', 'SIGTERM', '__STDC__',
        '__STDC_HOSTED__', '__STDC_IEC_559__', '__STDC_IEC_559_COMPLEX__',
        '__STDC_VERSION__', '__STDC_ISO_10646__', 'stderr', 'stdin',
        'stdout', '__TIME__', 'TMP_MAX', 'true', 'UCHAR_MAX', 'UINT_MAX',
        'ULONG_MAX', 'USHRT_MAX'
    ),
    'http://clc-wiki.net/wiki/{FNAME}'
);

/**
 * Standard C headers (comprehensive list from N1124)
 */
$this->_CstandardHeaders = array(
    array(
        'assert.h', 'complex.h', 'ctype.h', 'errno.h', 'fenv.h', 'float.h',
        'inttypes.h', 'iso646.h', 'locale.h', 'limits.h', 'math.h',
        'setjmp.h', 'signal.h', 'stdarg.h', 'stdbool.h', 'stddef.h',
        'stdint.h', 'stdio.h', 'stdlib.h', 'string.h', 'tgmath.h',
        'time.h', 'wchar.h', 'wctype.h'
    ),
    'http://clc-wiki.net/wiki/{FNAME}'
);

/**
 * Start-of-line preprocessor directives preceded by a hash (comprehensive list)
 */
$this->_CstartoflinePPdirectives_Hash = array(
    array(
        'define', 'endif', 'elif', 'else', 'error', 'if', 'ifdef', 'ifndef',
        'include', 'line', 'pragma', 'undef'
    ),
    'http://clc-wiki.net/wiki/hash_{FNAME}'
);

/**
 * Start-of-line preprocessor directives not preceded by a hash (comprehensive
 * list)
 */
$this->_CstartoflinePPdirectives_NoHash = array(
    array(
        '_Pragma',
    ),
    'http://clc-wiki.net/wiki/underscore{FNAME}'
);

/**
 * Start-of-line preprocessor directives that should be matched to start the
 * preprocessor/ifelif context.
 * N.B. single-dimensional array
 */
$this->_CifelifPPdirectives = array(
    'if', 'elif'
);

/**
 * Start-of-line preprocessor directives that should be matched to start the
 * preprocessor/include context.
 * N.B. single-dimensional array
 */
$this->_CincludePPdirectives = array(
    'include'
);

/**
 * Start-of-line preprocessor directives that should be matched to start the
 * preprocessor/general context.
 * N.B. single-dimensional array
 */
$this->_CgeneralPPdirectives = array_diff(
    array_merge(
        $this->_CstartoflinePPdirectives_Hash[0],
        $this->_CstartoflinePPdirectives_NoHash[0]
    ),
    $this->_CifelifPPdirectives,
    $this->_CincludePPdirectives
);

/**
 * Non-start-of-line preprocessor directives - only one; used in #if or #elsif
 * directives
 */
$this->_CnonStartOfLinePPdirectives = array(
    array(
        'defined'
    ),
    'http://clc-wiki.net/wiki/{FNAME}'
);

/**
 * Standard C symbols (need to verify whether this list is complete)
 * N.B. single-dimensional array
 */
$this->_CstandardSymbols = array(
    ',', '.', '?', ':', '>', '<', '~', '!', '=', '%', '^', '+', '-', '/', '*',
    '&', '(', ')', '{', '}', '[', ']', ';', '\\'/*line continuation character*/
);

/**
 * C tokens that access structure members
 * N.B. single-dimensional array
 */
$this->_CobjectSplitters = array(
    '.', '->'
);

?>
