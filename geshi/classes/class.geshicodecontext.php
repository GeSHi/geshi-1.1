<?php
/**
 * GeSHi - Generic Syntax Highlighter
 * <pre>
 *   File:   geshi/classes/class.geshicodecontext.php
 *   Author: Nigel McNie
 *   E-mail: nigel@geshi.org
 * </pre>
 *
 * For information on how to use GeSHi, please consult the documentation
 * found in the docs/ directory, or online at http://geshi.org/docs/
 *
 * This program is part of GeSHi.
 *
 *  This program is free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program; if not, write to the Free Software
 *  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301 USA
 *
 * @package    geshi
 * @subpackage core
 * @author     Nigel McNie <nigel@geshi.org>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright  (C) 2004 - 2006 Nigel McNie
 * @version    $Id$
 *
 */

/**
 * This class represents a "Code" context - one where keywords,
 * regular expressions and other things can be used to highlight
 * part of the context.
 *
 * If the context you are in requires keyword or regular expression
 * support, then GeSHiCodeContext is the context type that you need.
 *
 * @package    geshi
 * @subpackage core
 * @author     Nigel McNie <nigel@geshi.org>
 * @since      1.1.0
 * @version    $Revision$
 * @see        GeSHiContext
 * @todo       [blocking 1.1.9] Document better
 */
class GeSHiCodeContext extends GeSHiContext
{

    // {{{ properties

    /**#@+
     * @var array
     * @access private
     */

    /**
     * Keywords for this code context
     *
     * @var array
     */
    private $_contextKeywords = array();

    /**
     * Characters that cannot appear before a keyword
     *
     * @var array
     */
    private $_contextCharactersDisallowedBeforeKeywords = array();

    /**
     * Characters that cannot appear after a keyword
     *
     * @var array
     */
    private $_contextCharactersDisallowedAfterKeywords = array();

    /**
     * A lookup table for use with regex matched starters/enders
     * @todo initialise to array?
     *
     * @var array
     */
    private $_contextKeywordLookup = array();

    /**
     * A symbol array
     *
     * @var array
     */
    private $_contextSymbols = array();

    /**
     * A regex array
     *
     * @var array
     */
    private $_contextRegexps = array();

    /**
     * Whether standard integer support will be used for this context
     *
     * @var boolean
     */
    private $_useStandardIntegers = false;

    /**
     * Options for standard integer support
     *
     * @var array
     */
    private $_integerOptions = array();

    /**
     * Whether standard double support will be used for this context
     *
     * @var boolean
     */
    private $_useStandardDoubles = false;

    /**
     * Options for standard double support
     *
     * @var array
     */
    private $_doubleOptions = array();

     /**#@-*/

     // }}}

    function addKeywordGroup (array $keywords, $context_name, $case_sensitive = false, $url_data = '') {
        $this->_contextKeywords[] = array($keywords, $this->_makeContextName($context_name), $case_sensitive, $url_data);
    }
    function setCharactersDisallowedBeforeKeywords(array $chars) {
        $this->_contextCharactersDisallowedBeforeKeywords = $chars;
    }
    function setCharactersDisallowedAfterKeywords(array $chars) {
        $this->_contextCharactersDisallowedAfterKeywords = $chars;
    }

    function addSymbolGroup(array $symbols, $context_name) {
        $this->_contextSymbols[] = array($symbols, $this->_makeContextName($context_name));
    }

    function addRegexGroup(array $regexes, $test_char, array $handler_info) {
        // Add context name to the beginning of entries
        foreach (array_keys($handler_info) as $key) {
            if (is_array($handler_info[$key])) {
                $handler_info[$key][0] = $this->_makeContextName($handler_info[$key][0]);
            }
        }
        $this->_contextRegexps[] = array($regexes, $test_char, $handler_info);
    }

    function useStandardIntegers (array $options = array())
    {//echo "using standard ints: $this->_contextName<br />";
        $this->_useStandardIntegers = true;
        $this->_integerOptions = $options;
    }

    /**
     * @param array $options An array of options to configure double number
     *                       highlighting
     */
    function useStandardDoubles (array $options = array())
    {
        $this->_useStandardDoubles = true;
        $this->_doubleOptions = $options;
    }

    function addObjectSplitter (array $splitters, $ootoken_name, $splitter_name, $check_is_code = false)
    {
        $splitter_match = '';
        foreach ($splitters as $splitter) {
            $splitter_match .= preg_quote($splitter) . '|';
        }

        $this->addRegexGroup(
            array(
                "#(" . substr($splitter_match, 0, -1) . ")(\s*)([a-zA-Z_][a-zA-Z0-9_]*)#"
            ), '',
            array(
                // If array, first index is name and second index is whether to let code have a go
                // If not array and set, the whole thing is passed to code to have a go
                // If not set, then nothing
                1 => array($splitter_name, false), // highlight splitter with its name
                3 => array($ootoken_name, $check_is_code)
            )
        );
    }

    /**
     * Overrides {@link GeSHiContext::_addParseData()} to highlight a code context, including
     * keywords, symbols and regular expression matches
     *
     * @param string The code to add as parse data
     * @param string The first character of the context after this
     */
    function _addParseData ($code, $first_char_of_next_context = '')
    {//geshi_dbg_on();
        //$first_char_of_next_context = '';
        geshi_dbg('GeSHiCodeContext::_addParseData(' . substr($code, 0, 15) . ', ' . $first_char_of_next_context . ')');

        $regex_matches = array();
        foreach ($this->_contextRegexps as $regex_group_key => $regex_data) {
            //geshi_dbg('  Regex group: ' . $regex_group_key);
            // Set style of this group
            // $regex_data = array(
            //    0 => regex (with brackets to signify groupings
            //    1 => a string that if not matched, this part ain't done (speeds stuff up)
            //    2 => array(
            //       1 => array(name of first group, default style of first group)
            //       2 => array(name of second group, ...
            //   ...
            if (!$regex_data[1] || false !== strpos($code, $regex_data[1])) {
                foreach ($regex_data[0] as $regex) {
                    //geshi_dbg('    Trying regex ' . $regex . '... ', false);
                    $matches = array();
                    preg_match_all($regex, $code, $matches);
                    //geshi_dbg('found ' . count($matches[0]) . ' matches');

                    // If there are matches...
                    if (count($matches[0])) {
                        foreach ($matches[0] as $key => $match) {
                            // $match is the full match of the regex. We need to get it out of the string,
                            // although we also need its position in the string
                            $pos = strpos($code, $match);
                            // neat splicey jobbie to get rid of the keyword (can't do str_replace...)
                            // ADDED SPACE FILLERS
                            $code = substr($code, 0, $pos) . str_repeat("\0", strlen($match)) . substr($code, $pos + strlen($match));

                            // make an array of data for this regex
                            $data = array();
                            foreach ($matches as $match_data) {
                                $data[] = $match_data[$key];
                            }
                            $regex_matches[] = array(0 => $pos, 1 => $regex_group_key, 2 => $data);
                        }
                    }
                }
            }
        }
        //geshi_dbg('    Regex matches: ' . str_replace("\n", "\r", print_r($regex_matches, true)));

        $regex_replacements = array();
        foreach ($regex_matches as $data) {
            // $data[0] is the pos
            // $data[1] is the key
            // $data[2][0] contains the full match
            // $data[2][1] contains what is in the first brackets
            // $data[2][2] contains what is in the second brackets...
            foreach ($data[2] as $key => $match) {
                // skip the full match which is in $data[2][0]
                if ($key) {
                    // If there is a name for this bracket group ($key) in this regex group ($data[1])...
                    if (isset($this->_contextRegexps[$data[1]][2][$key]) && is_array($this->_contextRegexps[$data[1]][2][$key])) {
                        // If we should be attempting to have a go at code highlighting first...
                        if (true === $this->_contextRegexps[$data[1]][2][$key][1]) {
                            // Highlight the match, and put the code into the result
                            $highlighted_matches = $this->_codeContextHighlight($match);
                            foreach ($highlighted_matches as $stuff) {
                                if ($stuff[1] == $this->_contextName) {
                                    $regex_replacements[$data[0]][] = array($stuff[0], $this->_contextRegexps[$data[1]][2][$key][0]);
                                } else {
                                    $regex_replacements[$data[0]][] = $stuff;
                                }
                            }
                        } else {
                            $regex_replacements[$data[0]][] = array($match,
                                $this->_contextRegexps[$data[1]][2][$key][0]); //name in [0]
                        }
                    // Else, perhaps it is simply set. If so, we highlight it as if it were
                    // part of the code context
                    } elseif (isset($this->_contextRegexps[$data[1]][2][$key])) {
                        // this may end up as array(array(match,name),array(match,name),array..)
                        //@todo [blocking 1.1.3] may need to pass the first char of next context here if it's at the end...
                        $parse_data = $this->_codeContextHighlight($match);
                        foreach ($parse_data as $pdata) {
                            $regex_replacements[$data[0]][] = $pdata;
                        }
                    }
                    // Else, don't add it at all...
                }
            }
        }
        //geshi_dbg('  Regex replacements: ' . str_replace("\n", "\r", print_r($regex_replacements, true)));
        //geshi_dbg_off();
        // Now what we do is make an array that looks like this:
        // array(
        //    [position] => [replacement for regex]
        //    [position] => [replacement for regex]
        //    ...
        //  )
        // so we can put them back in as we build the result


        // The aim is to end up with an array(
        //   0 => array(code, contextname)
        //   1 => array(code, contextname)
        //   2 => ...
        //
        // $regex_replacements is an array(
        //   pos => array of arrays like the above, in order
        //   pos => ...
        //
        // codeContextHighlight should return something similar

        $parse_data = $this->_codeContextHighlight($code, $regex_replacements, $first_char_of_next_context);

        foreach ($parse_data as $data) {
            if (!(isset($data[2]) && $data[2])) {
                $this->_styler->addParseData($data[0], $data[1], $this->_getExtraParseData(),
                    $this->_complexFlag);
            } else {
                // $data[2] is the URL
                $this->_styler->addParseData($data[0], $data[1],
                    $this->_getExtraParseData(array('url' => $data[2])), $this->_complexFlag);
            }
        }
    }


    /**
     * Given code, returns an array of context data about it
     */
     function _codeContextHighlight ($code, array $regex_replacements = array(), $first_char_of_next_context = '')
     {
        geshi_dbg('GeSHiCodeContext::_codeContextHighlight(' . substr($code, 0, 15) . ', ' .
            (($regex_replacements) ? 'array(...)' : 'null') . ', ' . $first_char_of_next_context . ')');
        //$first_char_of_next_context = '';

        if (empty($this->_contextKeywordLookup)) {
            $this->_createContextKeywordLookup();
        }

        $result = array(0 => array('', ''));

        // If no code, don't bother
        if ('' == $code) {
            // Set context name
            $result[0][1] = $this->_contextName;
            return $result;
        }

        $result_pointer = 0;
        $length = strlen($code);
        $keyword_match_allowed  = true;

        $keyword_cache = array();
        $next_keyword_pos = -1;
        $next_keyword_group = '';
        $next_keyword = '';
        // For each character
        for ($i = 0; $i < $length; $i++) {
            if (isset($regex_replacements[$i])) {
                geshi_dbg('  Regex replacements available at position ' . $i . ': ' . $regex_replacements[$i][0][0] . '...');
                // There's regular expressions expected to go here
                foreach ($regex_replacements[$i] as $replacement) {
                    // should be .= ?????
                    $result[++$result_pointer] = $replacement;
                }
                // Allow keyword matching immediately after regular expressions
                $keyword_match_allowed = true;
            }

            $char = $code[$i];
            if ("\0" == $char) {
                // Not interested in null characters inserted by regex replacements
                continue;
            }

            // Take symbols into account before doing this
            if (!$this->_contextKeywordLookup) {
                $this->_checkForSymbol($char, $result, $result_pointer);
                continue;
            }

            geshi_dbg('@b  Current char is: ' . str_replace("\n", '\n', $char));

            // check keywords
            $matched_keyword = false;
            if ($keyword_match_allowed) {
                if ($next_keyword_pos < $i) {
                    geshi_dbg('  check for new keyword position');
                    $next_keyword_pos = $length;
                    foreach ($this->_contextKeywordLookup as $group_key => $arr) {
                        $min_len = $arr[1];
                        if ($length - $i < $min_len) {
                            continue;
                        }
                        foreach ($arr[0] as $regex_key => $regexp) {
                            $match_i = false;
                            if (isset($keyword_cache[$regex_key][$group_key]) &&
                                ($keyword_cache[$regex_key][$group_key]['pos'] >= $i ||
                                  $keyword_cache[$regex_key][$group_key]['pos'] === false)) {
                                // we have already matched something
                                if ($keyword_cache[$regex_key][$group_key]['pos'] === false) {
                                    // this comment is never matched
                                    continue;
                                }
                                $match_i = $keyword_cache[$regex_key][$group_key]['pos'];
                                $keyword = $keyword_cache[$regex_key][$group_key]['keyword'];
                            } else if (preg_match($regexp, $code, $match, PREG_OFFSET_CAPTURE, $i)) {
                                $match_i = $match[0][1];
                                $keyword = $match[0][0];
                                $keyword_cache[$regex_key][$group_key] = array(
                                    'pos' => $match_i,
                                    'keyword' => $keyword
                                );
                                geshi_dbg("    found match for keyword group $group_key at $match_i");
                            } else {
                                $keyword_cache[$regex_key][$group_key]['pos'] = false;
                                geshi_dbg("    keywordgroup $group_key is never again matched");
                                continue;
                            }
                            if ($match_i !== false && $match_i < $next_keyword_pos) {
                                $next_keyword_pos = $match_i;
                                $next_keyword_group = $group_key;
                                $next_keyword = $keyword;
                                geshi_dbg("    next keyword: $next_keyword (group $group_key) at pos $match_i");
                                if ($match_i === $i) {
                                    break;
                                }
                            }
                        }
                    }
                }
                if ($i == $next_keyword_pos) {
                    // there's a keyword match!
                    geshi_dbg('Keyword matched:' . $next_keyword);

                    $result[++$result_pointer] = array(
                        $next_keyword,
                        $this->_contextKeywords[$next_keyword_group][1],
                        $this->_getURL($next_keyword, $next_keyword_group)
                    );
                    $matched_keyword = true;
                    if (!$next_keyword) {
                        var_dump($i, $next_keyword_pos);
                    }
                    $i += strlen($next_keyword) - 1;
                    geshi_dbg("strlen of keyword is " . strlen($next_keyword) . " (pos is $i)");
                    $next_keyword_pos = false;
                }
            }
            if (!$matched_keyword) {
                // Check for a symbol instead
                $this->_checkForSymbol($char, $result, $result_pointer);
                /*foreach ($this->_contextSymbols as $symbol_data) {
                    if (in_array($char, $symbol_data[0])) {
                        $result[++$result_pointer] = array($char, $symbol_data[1], '');
                        continue;
                    }
                }*/
                //$result[++$result_pointer] = array($char, $this->_contextName);
            }

            /// If we move this to the end we might be able to get rid of the last one [DONE]
            /// The second test on the first line is a little contentious  - allows functions that don't
            /// start with an alpha character to be within other words, e.g abc<?php, where <?php is a kw
            if (!isset($code[$i + 1])) {
                break;
            }
            $before_char = $code[$i + 1];
            $before_char_is_alnum = ctype_alnum($before_char);
            $keyword_match_allowed = (!$before_char_is_alnum || ($before_char_is_alnum && !ctype_alnum($char)));
            $keyword_match_allowed = ($keyword_match_allowed && !in_array($before_char,
                $this->_contextCharactersDisallowedBeforeKeywords));
            // Disallow underscores before keywords
            $keyword_match_allowed = ($keyword_match_allowed && ('_' != $before_char));
            geshi_dbg('  Keyword matching allowed: ' . $keyword_match_allowed);
            geshi_dbg('    [checked ' . substr($code, $i, 1) . ' against ' . print_r($this->_contextCharactersDisallowedBeforeKeywords, true));
        }

        unset($result[0]);
        //geshi_dbg('@b  Resultant Parse Data:');
        //geshi_dbg(str_replace("\n", "\r", print_r($result, true)));
        //return array(array($code, $this->_contextName));
        return $result;
     }


    /**
     * Checks the specified character to see if it is a symbol, and
     * adds it to the result array according to its findings.
     *
     * @param string The possible symbol to check
     * @param array  The current result data that will be appended to
     * @param int    The pointer to the current result record
     */
    function _checkForSymbol($possible_symbol, array &$result, &$result_pointer)
    {
        $skip = false;
        geshi_dbg('Checking ' . $possible_symbol . ' for symbol match');
        foreach ($this->_contextSymbols as $symbol_data) {
            if (in_array($possible_symbol, $symbol_data[0])) {
                // we've matched the symbol in $symbol_group
                $result[++$result_pointer] = array($possible_symbol, $symbol_data[1]);
                $skip = true;
                break;
            }
        }
        if (!$skip) {
            // Multiple chars in same context should be concatenated
            if ($result[$result_pointer][1] == $this->_contextName) {
                $result[$result_pointer][0] .= $possible_symbol;
            } else {
                $result[++$result_pointer] = array($possible_symbol, $this->_contextName);
            }
        }
    }

    /// THIS FUNCTION NEEDS TO DIE!!!
    /// When language files are able to be compiled, they should list their keywords
    /// in this form already.
    function _createContextKeywordLookup ()
    {
        geshi_dbg('GeSHiCodeContext::_createContextKeywordLookup()');

        $this->_contextKeywordLookup = array();
        foreach ($this->_contextKeywords as $keyword_group_key => $keyword_group_array) {
            geshi_dbg("  keyword group key: $keyword_group_key");

            $regexps = geshi_optimize_regexp_list($keyword_group_array[0]);

            $before = '/';
            if (!empty($this->_contextCharactersDisallowedBeforeKeywords)) {
                $before .= '(?<!['. implode($this->_contextCharactersDisallowedBeforeKeywords) .'])';
            } else {
                $before .= '(?<![a-zA-Z0-9_])';
            }

            $append = '';
            if (!empty($this->_contextCharactersDisallowedAfterKeywords)) {
                $append .= '(?!['. implode($this->_contextCharactersDisallowedAfterKeywords) .'])';
            } else {
                $append .= '(?![a-zA-Z0-9_])';
            }
            $append .= '/';

            // handle case-insensitivity
            if (!$keyword_group_array[2]) {
              $append .= 'i';
            }

            foreach ($regexps as &$regexp) {
                $regexp = $before . '(?:'. $regexp .')'. $append;
            }

            // get min length
            $min_len = strlen(current($keyword_group_array[0])); // anything as a start value
            foreach ($keyword_group_array[0] as $keyword) {
                // if $min_len = 12 we are only interested in keywords which are
                // less then 12 chars long, i.e. character @ index 11 is not set
                if (!isset($keyword[$min_len - 1])) {
                    $len = strlen($keyword);
                    if ($len < $min_len) {
                        $min_len = $len;
                    }
                }
            }
            $this->_contextKeywordLookup[$keyword_group_key] = array(
                0 => $regexps,
                1 => $min_len
            );
        }
        if (isset($keyword_group_key)) {
            geshi_dbg('  Lookup created, first entry: ' .
                    print_r($this->_contextKeywordLookup[$keyword_group_key], true));
        } else {
            geshi_dbg('  Lookup created with no entries');
        }
    }


    /**
     * Turns keywords into <a href="url">>keyword<</a> if needed
     *
     * @todo [blocking 1.1.5] This method still needs to listen to set_link_target, set_link_styles etc
     */
    function _getURL ($keyword, $earliest_keyword_group)
    {
        if ($this->_contextKeywords[$earliest_keyword_group][3] != '') {
            // Remove function_exists() call? Valid language files will define functions required...
            if (substr($this->_contextKeywords[$earliest_keyword_group][3], -2) == '()' &&
                function_exists(substr($this->_contextKeywords[$earliest_keyword_group][3], 0, -2))) {
                $href = call_user_func(substr($this->_contextKeywords[$earliest_keyword_group][3], 0, -2), $keyword);
            } else {
                $href = str_replace('{FNAME}', $keyword, $this->_contextKeywords[$earliest_keyword_group][3]);
            }
            return $href;
        }
        return '';
    }

    function _initPostProcess ()
    {
        if ($this->_useStandardDoubles) {
            $banned = '[^a-zA-Z_0-9]';
            $plus_minus = '[\-\+]?';
            $context_name = (isset($this->_doubleOptions['context_name'])) ?
                $this->_doubleOptions['context_name'] : 'num/dbl';
            $leading_number_symbol = (isset($this->_doubleOptions['require_leading_number'])
                && $this->_doubleOptions['require_leading_number']) ? '+' : '*';
            $chars_after_number = (isset($this->_doubleOptions['chars_after_number'])) ?
                '[' . implode('', (array)$this->_doubleOptions['chars_after_number']) . ']?'
                : '';

            $this->addRegexGroup(array(
                 // double precision with e, e.g. 3.5e7 or -.45e2
                "#(^|$banned)?([0-9]$leading_number_symbol\.[0-9]+[eE]{$plus_minus}[0-9]+$chars_after_number)($banned|\$)?#",
                // double precision with e and no decimal place, e.g. 5e2
                "#(^|$banned)?([0-9]+[eE]{$plus_minus}[0-9]+$chars_after_number)($banned|\$)?#",
                // double precision (.123 or 34.342 for example)
                // There are some cases where the - sign will not be highlighted for various reasons,
                // but I'm happy that it's done where it can be. Maybe it might be worth looking at
                // later if there are any real problems, else I'll ignore it
                "#(^|$banned)?([0-9]$leading_number_symbol\.[0-9]+$chars_after_number)($banned|\$)?#"
            ), '.', array(
                1 => true, // as above, catch for normal stuff
                2 => array($context_name, false), // Don't attempt to highlight numbers as code
                3 => true
            ));
        }

        if ($this->_useStandardIntegers) {
            $context_name = (isset($this->_integerOptions['context_name'])) ?
                $this->_integerOptions['context_name'] : 'num/int';
            // NOTE: changed from having a \. in the last banned group, so that in perl -5..-1 would work for the 5
            $this->addRegexGroup(
                array(
                    '#([^a-zA-Z_0-9\.]|^)([0-9]+)(?=[^a-zA-Z_0-9]|$)#'
                ),
                '',
                array(
                    1 => true, // catch banned stuff for highlighting by the code context that it is in
                    2 => array($context_name, false),
                    3 => true
                )
            );
        }
    }

}

?>