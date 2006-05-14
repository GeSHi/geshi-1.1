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
 * @author    
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright (C) 2006
 * @version   $Id$
 *
 */

function geshi_c_c (&$context)
{
    $context->addChild('multi_comment');
    $context->addChild('single_comment');
    $context->addChild('string_literal', 'string');
    $context->addChild('character_constant', 'singlechar');
    $context->addChild('preprocessor', 'code');
    
    $context->addKeywordGroup(array(
        'break', 'case', 'continue', 'default', 'do', 'else', 'for', 'goto',
        'if', 'return', 'switch', 'while'
    ), 'ctlflow-keyword', true, 'http://clc-wiki.net/wiki/{FNAME}');

    $context->addKeywordGroup(array(
        'enum', 'struct', 'typedef', 'union'
    ), 'declarator-keyword', true, 'http://clc-wiki.net/wiki/{FNAME}');
    
    $context->addKeywordGroup(array(
        'auto', '_Bool', 'char', 'clock_t', '_Complex', 'const', 'div_t',
        'double', 'extern', 'FILE', 'float', 'fpos_t', '_Imaginary', 'inline',
        'int', 'jmp_buf', 'ldiv_t', 'long', 'ptrdiff_t', 'register',
        'restrict', 'short', 'signal', 'signed', 'size_t', 'static', 'string',
        'time_t', 'tm'/*a struct*/, 'unsigned', 'va_list', 'void', 'volatile',
        'wchar_t'
    ), 'typeorqualifier', true, 'http://clc-wiki.net/wiki/{FNAME}');
    
    $context->addKeywordGroup(array(
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
    ), 'stdfunction', true, 'http://clc-wiki.net/wiki/{FNAME}');
    
    $context->addKeywordGroup(array(
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
    ), 'stdmacroorobject', true, 'http://clc-wiki.net/wiki/{FNAME}');
    
    $context->addSymbolGroup(array(
        ',', '.', '?', ':', '>', '<', '~', '!', '=', '%', '^', '+', '-', '/', '*',
        '&', '(', ')', '{', '}', '[', ']', ';', '\\'/*line continuation character*/
    ), 'symbol');
    
    $context->useStandardIntegers();
    $context->useStandardDoubles(array('chars_after_number' => array('f', 'l')));
    
    $context->addObjectSplitter(array('.', '->'), 'member', 'symbol');
    $context->setComplexFlag(GESHI_COMPLEX_TOKENISE);
    
}

function geshi_c_c_multi_comment (&$context)
{
    $context->addDelimiters('/*', '*/');
    //$this->_contextStyleType = GESHI_STYLE_COMMENTS;
}

function geshi_c_c_single_comment (&$context)
{
    $context->addDelimiters('//', 'REGEX#(?<!\\\)\n#');
    //$this->_contextStyleType = GESHI_STYLE_COMMENTS;
    $context->setComplexFlag(GESHI_COMPLEX_PASSALL);
    // without this, detection of a following preprocessor directive is inhibited
    $context->parseDelimiters(GESHI_CHILD_PARSE_LEFT);
}

function geshi_c_c_string_literal (&$context)
{
    /*
     * A string literal may be continued to the next line with a trailing \ but
     * otherwise multiline strings are illegal; we don't attempt to mark that
     * error here though.
     */
    $context->addDelimiters('"', '"');
    //$this->_contextStyleType = GESHI_STYLE_STRINGS;

    $context->setEscapeCharacters('\\');
    /** @todo string literals and character constants may be immediately preceded
      * by a capital L to indicate a wide-character constant and it would be nice to
      * include that in the highlighting.
      */
    $context->setCharactersToEscape(array("'", '?', 'a', 'b', 'f',
        'v', 'n', 'r', 't', 'REGEX#[0-7]{1,3}#',
        'REGEX#x[0-9a-f]{1,}#i', '\\', '"'));
}

function geshi_c_c_character_constant (&$context)
{
    $context->addDelimiters("'", "'");
    //$this->_contextStyleType = GESHI_STYLE_STRINGS;

    $context->setEscapeCharacters('\\');

    /** @note string literals and character constants may be immediately preceded
      * by a capital L to indicate a wide-character constant and it would be nice to
      * include that in the highlighting.
      */
    $context->setCharactersToEscape(array("'", '?', 'a', 'b', 'f',
        'v', 'n', 'r', 't', 'REGEX#[0-7]{1,3}#',
        'REGEX#x[0-9a-f]{1,}#i', '\\', '"'));
}

/**
 * Duplicate these functions for the preprocessor simply so that they can have
 * a different highlighting context.
 */
function geshi_c_c_preprocessor_multi_comment (&$context)
{
    geshi_c_c_multi_comment ($context);
}
function geshi_c_c_preprocessor_single_comment (&$context)
{
    geshi_c_c_single_comment ($context);
}
function geshi_c_c_preprocessor_string_literal (&$context)
{
    geshi_c_c_string_literal($context);
}
function geshi_c_c_preprocessor_character_constant (&$context)
{
    geshi_c_c_character_constant ($context);
}

function geshi_c_c_preprocessor (&$context)
{
    $context->addChild('ifelif', 'code');
    $context->addChild('include', 'code');
    $context->addChild('general', 'code');

    /**
     * A preprocessing directive beginning with a # must occur at the start
     * of a line, but may optionally be preceded by whitespace, and any line
     * may be continued by appending a trailing \ character. So we account
     * for a hash preceded by a continued line of whitespace.  The hash may
     * optionally be followed by whitespace in the same manner, after which
     * the actual directive keyword is specified.  Finally though, a hash
     * without a following directive is allowed as a 'null directive'.
     *
     * There is also a single preprocessing directive (_Pragma) that follows
     * the same rules but is not preceded by a hash
     *
     * Be CAREFUL with the slashes below - the escaping is not intuitive
     *
     * The list of non-newline whitespace characters recognised by C and
     * used in the r.e. below is: [ \t\f\v]
     *
     * Technically a C source file must end in a newline, but the regexp
     * below allows for the possibility that C code passed into GeSHi is
     * missing the newline and implicitly terminated.
     */
    $context->addDelimiters(array(
        'REGEX#(((^|\n)([ \t\f\v]*)\\\)*(^|\n)([ \t\f\v]*)\#'.
        '([ \t\f\v]*)((([ \t\f\v]*)\\\\(\n|$))*([ \t\f\v]*)'.
        '(?=(([^ \t\f\v]*?([ \t\f\v]*))*[^\n\\\\](\n|$)|(\n|$)))))#',
        'REGEX#(((^|\n)([ \t\f\v]*)\\\)*(^|\n)([ \t\f\v]*)(?=_Pragma))#',
    ), 'REGEX#(?<!\\\)\n#',  true);
    
    /**
     * We use child contexts partly to avoid any of the directive tokens in the
     * array below from being highlighted/linked-to a second time after their
     * initial appearance. i.e. for the contrived:
     * <code>
     * #define AMACRO(X) (X = my->define)
     * </code>
     * the first "define" - in #define - is linked and highlighted in the
     * 'preprocessor/directive' context and immediately afterwards the child
     * 'preprocessor/general' context kicks in so that the "define" of my->define
     * is no longer in the current 'preprocessor' context and won't be linked.
     *
     * This doesn't work for non-standard directives since they don't match a child
     * context: for those we instead return null for $data['url'] in
     * GeSHiCCodeParser->parseToken().
     */
    $context->addKeywordGroup(array(
        'define', 'endif', 'elif', 'else', 'error', 'if', 'ifdef', 'ifndef',
        'include', 'line', 'pragma', 'undef'
    ), 'directive', true, 'http://clc-wiki.net/wiki/hash_{FNAME}');
    $context->addKeywordGroup('_Pragma', 'directive', true,
        'http://clc-wiki.net/wiki/underscore{FNAME}');
    
    //$context->parseDelimiters(GESHI_CHILD_PARSE_BOTH);
    $context->setComplexFlag(GESHI_COMPLEX_TOKENISE);
    
}

function geshi_c_c_preprocessor_ifelif (&$context)
{
    $context->addChild('c/c/preprocessor/multi_comment');
    $context->addChild('c/c/preprocessor/single_comment');
    $context->addChild('c/c/preprocessor/string_literal', 'string');
    $context->addChild('c/c/preprocessor/character_constant', 'singlechar');
    
    $context->addDelimiters(array(
        'REGEX#(?<=\bif\b)#', 'REGEX#(?<=\belif\b)#'
    ), 'REGEX#(?<!\\\)\n#', true);
    
    $context->addKeywordGroup('defined', 'c/c/preprocessor/directive', true,
        'http://clc-wiki.net/wiki/{FNAME}');
    $context->addKeywordGroup(array(
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
    ), 'c/c/preprocessor/stdmacroorobject', true,
    'http://clc-wiki.net/wiki/{FNAME}');

    /** @note not all of these symbols have meaning in this context - e.g. I can't
      * see how to use & or [] in a preprocessor constant, and a semicolon has no
      * use at all - but it's probably not harmful to highlight them as symbols
      * anyway, and they shouldn't occur in error-free code.
      */
    $context->addSymbolGroup(array(
        ',', '.', '?', ':', '>', '<', '~', '!', '=', '%', '^', '+', '-', '/', '*',
        '&', '(', ')', '{', '}', '[', ']', ';', '\\'/*line continuation character*/
    ), 'c/c/preprocessor/symbol');
    
    $context->useStandardIntegers();
    $context->useStandardDoubles(array('chars_after_number' => array('f', 'l')));
    
    $context->parseDelimiters(GESHI_CHILD_PARSE_LEFT);
    $context->setComplexFlag(GESHI_COMPLEX_TOKENISE);
}

function geshi_c_c_preprocessor_include (&$context)
{
    $context->addChild('c/c/preprocessor/multi_comment');
    $context->addChild('c/c/preprocessor/single_comment');

    $context->addDelimiters('REGEX#(?<=\binclude\b)#',
        array(/*"\n", */'REGEX#(?<!\\\)\n#'), true);
    
    /**
     * @note A header file need not be specified directly as <file> or "file" - it
     * could be specified indirectly as a macro expanding to one of those two forms.
     */
    $context->addKeywordGroup(array(
        'assert.h', 'complex.h', 'ctype.h', 'errno.h', 'fenv.h', 'float.h',
        'inttypes.h', 'iso646.h', 'locale.h', 'limits.h', 'math.h',
        'setjmp.h', 'signal.h', 'stdarg.h', 'stdbool.h', 'stddef.h',
        'stdint.h', 'stdio.h', 'stdlib.h', 'string.h', 'tgmath.h',
        'time.h', 'wchar.h', 'wctype.h'
    ), 'c/c/preprocessor/include/stdheader', true,
    'http://clc-wiki.net/wiki/{FNAME}');
    
    $context->addKeywordGroup(array(
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
    ), 'c/c/preprocessor/stdmacroorobject', true,
    'http://clc-wiki.net/wiki/{FNAME}');

    $context->addSymbolGroup(array('<', '>'),
      'c/c/preprocessor/symbol/std_include');
    $context->addSymbolGroup('"', 'c/c/preprocessor/symbol/impl_include');

    $context->parseDelimiters(GESHI_CHILD_PARSE_LEFT);
    $context->setComplexFlag(GESHI_COMPLEX_TOKENISE);
}

/** Get some helper functions all prefixed by geshic_ bar geshi_parent_context*/
require_once GESHI_CONTEXTS_ROOT.'c'.GESHI_DIR_SEP.'helper_functions.php';

function geshi_c_c_preprocessor_general (&$context)
{
    $context->addChild('c/c/preprocessor/multi_comment');
    $context->addChild('c/c/preprocessor/single_comment');
    $context->addChild('c/c/preprocessor/string_literal', 'string');
    $context->addChild('c/c/preprocessor/character_constant', 'singlechar');
    
    $context->addDelimiters(geshic_make_ppdir_regexps(array(
        // $this->_CgeneralPPdirectives comes from common_keywords.php
        /** @todo a common include file that constructs these array members
          * dynamically as the comment above indicates they were previously */
        'define', 'endif', 'else', 'error', 'ifdef', 'ifndef',
        'line', 'pragma', 'undef', '_Pragma'
        )), 'REGEX#(?<!\\\)\n#', true);
    
    $context->addKeywordGroup(array(
        'break', 'case', 'continue', 'default', 'do', 'else', 'for', 'goto',
        'if', 'return', 'switch', 'while'
    ), 'c/c/preprocessor/ctlflow-keyword', true,
    'http://clc-wiki.net/wiki/{FNAME}');
    
    $context->addKeywordGroup(array(
        'enum', 'struct', 'typedef', 'union'
    ), 'c/c/preprocessor/declarator-keyword', true,
    'http://clc-wiki.net/wiki/{FNAME}');
    
    $context->addKeywordGroup(array(
        'auto', '_Bool', 'char', 'clock_t', '_Complex', 'const', 'div_t',
        'double', 'extern', 'FILE', 'float', 'fpos_t', '_Imaginary', 'inline',
        'int', 'jmp_buf', 'ldiv_t', 'long', 'ptrdiff_t', 'register',
        'restrict', 'short', 'signal', 'signed', 'size_t', 'static', 'string',
        'time_t', 'tm'/*a struct*/, 'unsigned', 'va_list', 'void', 'volatile',
        'wchar_t'
    ), 'c/c/preprocessor/typeorqualifier', true,
    'http://clc-wiki.net/wiki/{FNAME}');
    
    $context->addKeywordGroup(array(
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
    ), 'c/c/preprocessor/stdfunction', true,
    'http://clc-wiki.net/wiki/{FNAME}');
    
    $context->addKeywordGroup(array(
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
    ), 'c/c/preprocessor/stdmacroorobject', true,
    'http://clc-wiki.net/wiki/{FNAME}');
    
    $context->addSymbolGroup(array(
        ',', '.', '?', ':', '>', '<', '~', '!', '=', '%', '^', '+', '-', '/', '*',
        '&', '(', ')', '{', '}', '[', ']', ';', '\\'/*line continuation character*/
    ), 'c/c/preprocessor/symbol');
    
    $context->useStandardIntegers();
    $context->useStandardDoubles(array('chars_after_number' => array('f', 'l')));
    
    $context->addObjectSplitter(array(
        '.', '->'
    ), 'c/c/preprocessor/member', 'symbol');
    
    
    $context->parseDelimiters(GESHI_CHILD_PARSE_LEFT);
    $context->setComplexFlag(GESHI_COMPLEX_TOKENISE);
    
}

?>