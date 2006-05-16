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
 * @author    http://clc-wiki.net/wiki/User:Netocrat
 * @link      http://clc-wiki.net/wiki/Development:GeSHi_C Bug reports
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright (C) 2006 Netocrat
 * @version   $Id$
 *
 */

/** A single include file for all data including keyword listings; accessed. */
require_once GESHI_LANGUAGES_ROOT.'c'.GESHI_DIR_SEP.'common.php';

function geshi_c_c (&$context)
{
    $context->addChild('multi_comment');
    $context->addChild('single_comment');
    $context->addChild('string_literal', 'string');
    $context->addChild('character_constant', 'singlechar');
    $context->addChild('preprocessor', 'code');
    
    $context->addKeywordGroup(geshi_c_get_ctlflow_keywords(),
      'ctlflow-keyword', true, geshi_c_get_ctlflow_keywords_url());

    $context->addKeywordGroup(geshi_c_get_declarator_keywords(),
      'declarator-keyword', true, geshi_c_get_declarator_keywords_url());
    
    $context->addKeywordGroup(geshi_c_get_types_and_qualifiers(),
      'typeorqualifier', true, geshi_c_get_types_and_qualifiers_url());
    
    $context->addKeywordGroup(geshi_c_get_standard_functions(),
      'stdfunction', true, geshi_c_get_standard_functions_url());
    
    $context->addKeywordGroup(geshi_c_get_standard_macros_and_objects(),
      'stdmacroorobject', true, geshi_c_get_standard_macros_and_objects_url());
    
    $context->addSymbolGroup(geshi_c_get_standard_symbols(), 'symbol');
    
    $context->useStandardIntegers();
    $context->useStandardDoubles(array('chars_after_number' => array('f','l')));
    
    $context->addObjectSplitter(geshi_c_get_structure_access_symbols(),
      'member', 'symbol');
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
    // without this, detection of a following preprocessor directive is
    // inhibited
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
    /** @todo string literals and character constants may be immediately
      * preceded by a capital L to indicate a wide-character constant and it
      * would be nice to include that in the highlighting.
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

    /** @todo same todo as for geshi_c_c_string_literal(). */
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
    // these two temporarily disabled because the general context is disabled
    // so there's now potential for problems like an ordinary 'if' within a
    // #define to incorrectly trigger the start of a 'c/c/preprocessor/ifelif'
    // context
//    $context->addChild('ifelif', 'code');
//    $context->addChild('include', 'code');
    // without this, '<' and '>' don't get passed to parseToken()
    // ...bug or by design?
    $context->addSymbolGroup(array('<', '>'), 'c/c/preprocessor/symbol');
    // this is a big performance-loss culprit - it's disabled now but it would
    // be handy to have a way to enter the context via the parser instead
//    $context->addChild('general', 'code');

    /**
     * A preprocessing directive beginning with a # must occur at the start
     * of a line, but may optionally be preceded by whitespace.  The hash may
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
     * The rule that lines may be continued by appending a trailing \
     * character is no longer handled here as it added too much of a
     * performance penalty and because after disabling the child contexts above,
     * if we assume well-formed code it's unnecessary.  Its handling was in any
     * case incomplete - it didn't deal with e.g. a preprocessor directive
     * split in the middle.  The parseToken() member function of
     * GeSHiCCodeParser would need adjustment to handle that properly but
     * before implementing it specifically for C highlighting there may be some
     * generic functionality that we can implement to allow parseToken() to
     * change contexts as an alternative to the regex's specified below.
     */
    $context->addDelimiters(array(
        'REGEX#((^|\n)([ \t\f\v]*)(?=(\#|_Pragma(\b))))#',
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
     * 'preprocessor/general' context kicks in so that the "define" of
     * my->define is no longer in the current 'preprocessor' context and won't
     * be linked.
     *
     * This doesn't work for non-standard directives since they don't match a
     * child context: for those we instead return null for $data['url'] in
     * GeSHiCCodeParser->parseToken().
     */
    // Now that the general context is disabled, these keywords are once again
    // subject to a false highlighting a second time, so they are disabled here
//    $context->addKeywordGroup(geshi_c_get_start_of_line_PP_directives_hashsym(),
//      'directive', true, geshi_c_get_start_of_line_PP_directives_hashsym_url());
//    $context->addKeywordGroup(
//      geshi_c_get_start_of_line_PP_directives_nohashsym(), 'directive', true,
//      geshi_c_get_start_of_line_PP_directives_nohashsym_url());
    
    //$context->parseDelimiters(GESHI_CHILD_PARSE_BOTH);
    $context->setComplexFlag(GESHI_COMPLEX_TOKENISE);
    
}

/**
 * Returns an array of regexps for starting child preprocessor contexts based
 * on the string array of directives in the $directives parameter.
 */
function geshi_c_make_ppdir_regexps($directives)
{
    $regexps = array();
    foreach ($directives as $directive) {
        $regexps[] = 'REGEX#(?<=\b'.$directive.'\b)#';
    }
    return $regexps;
}

function geshi_c_c_preprocessor_ifelif (&$context)
{
    $context->addChild('c/c/preprocessor/multi_comment');
    $context->addChild('c/c/preprocessor/single_comment');
    $context->addChild('c/c/preprocessor/string_literal', 'string');
    $context->addChild('c/c/preprocessor/character_constant', 'singlechar');
    
    $context->addDelimiters(geshi_c_make_ppdir_regexps(
      geshi_c_get_if_elif_PP_directives()), 'REGEX#(?<!\\\)\n#', true);
    
    $context->addKeywordGroup(geshi_c_get_non_start_of_line_PP_directives(),
      'c/c/preprocessor/directive', true,
      geshi_c_get_non_start_of_line_PP_directives_url());
    $context->addKeywordGroup(geshi_c_get_standard_macros_and_objects(),
      'c/c/preprocessor/stdmacroorobject', true,
      geshi_c_get_standard_macros_and_objects_url());

    /** @note not all of these symbols have meaning in this context -
      * e.g. I can't see how to use & or [] in a preprocessor constant, and a
      * semicolon has no use at all - but it's probably not harmful to
      * highlight them as symbols anyway, and they shouldn't occur in
      * error-free code.
      */
    $context->addSymbolGroup(geshi_c_get_standard_symbols(),
      'c/c/preprocessor/symbol');
    
    $context->useStandardIntegers();
    $context->useStandardDoubles(array('chars_after_number' => array('f','l')));
    
    $context->parseDelimiters(GESHI_CHILD_PARSE_LEFT);
    $context->setComplexFlag(GESHI_COMPLEX_TOKENISE);
}

function geshi_c_c_preprocessor_include (&$context)
{
    $context->addChild('c/c/preprocessor/multi_comment');
    $context->addChild('c/c/preprocessor/single_comment');

    $context->addDelimiters(geshi_c_make_ppdir_regexps(
      geshi_c_get_include_PP_directive()),
      array(/*"\n", */'REGEX#(?<!\\\)\n#'), true);

    /**
     * @note A header file need not be specified directly as <file> or "file" -
     * it could be specified indirectly as a macro expanding to one of those
     * two forms.
     */
    $context->addKeywordGroup(geshi_c_get_standard_headers(),
      'c/c/preprocessor/include/stdheader', true,
      geshi_c_get_standard_headers_url());
    
    $context->addKeywordGroup(geshi_c_get_standard_macros_and_objects(),
      'c/c/preprocessor/stdmacroorobject', true,
      geshi_c_get_standard_macros_and_objects_url());

    $context->addSymbolGroup(array('<', '>'),
      'c/c/preprocessor/symbol/std_include');
    $context->addSymbolGroup('"', 'c/c/preprocessor/symbol/impl_include');

    $context->parseDelimiters(GESHI_CHILD_PARSE_LEFT);
    $context->setComplexFlag(GESHI_COMPLEX_TOKENISE);
}

function geshi_c_c_preprocessor_general (&$context)
{
    $context->addChild('c/c/preprocessor/multi_comment');
    $context->addChild('c/c/preprocessor/single_comment');
    $context->addChild('c/c/preprocessor/string_literal', 'string');
    $context->addChild('c/c/preprocessor/character_constant', 'singlechar');
    
    $context->addDelimiters(geshi_c_make_ppdir_regexps(
      geshi_c_get_general_PP_directives()), 'REGEX#(?<!\\\)\n#', true);
    
    $context->addKeywordGroup(geshi_c_get_ctlflow_keywords(),
      'c/c/preprocessor/ctlflow-keyword', true,
      geshi_c_get_ctlflow_keywords_url());
    
    $context->addKeywordGroup(geshi_c_get_declarator_keywords(),
      'c/c/preprocessor/declarator-keyword', true,
      geshi_c_get_declarator_keywords_url());
    
    $context->addKeywordGroup(geshi_c_get_types_and_qualifiers(),
      'c/c/preprocessor/typeorqualifier', true,
      geshi_c_get_types_and_qualifiers_url());
    
    $context->addKeywordGroup(geshi_c_get_standard_functions_url(),
      'c/c/preprocessor/stdfunction', true,
      geshi_c_get_standard_functions_url());
    
    $context->addKeywordGroup(geshi_c_get_standard_macros_and_objects(),
      'c/c/preprocessor/stdmacroorobject', true,
      geshi_c_get_standard_macros_and_objects_url());
    
    $context->addSymbolGroup(geshi_c_get_standard_symbols(),
      'c/c/preprocessor/symbol');
    
    $context->useStandardIntegers();
    $context->useStandardDoubles(array('chars_after_number' => array('f','l')));
    
    $context->addObjectSplitter(geshi_c_get_structure_access_symbols(),
      'c/c/preprocessor/member', 'symbol');
    
    
    $context->parseDelimiters(GESHI_CHILD_PARSE_LEFT);
    $context->setComplexFlag(GESHI_COMPLEX_TOKENISE);
    
}

?>