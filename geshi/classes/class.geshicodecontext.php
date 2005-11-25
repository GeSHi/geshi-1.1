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
 * @package   core
 * @author    Nigel McNie <nigel@geshi.org>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright (C) 2005 Nigel McNie
 * @version   $Id$
 * 
 */

/**
 * This class represents a "Code" context - one where keywords and
 * regular expressions can be used to highlight part of the context.
 *
 * If the context you are in requires keyword or regular expression
 * support, then GeSHiCodeContext is the context type that you need.
 *
 * <b>Usage:</b>
 *
 * Use this class in a context or language file, to define a code
 * context:
 *
 * <pre> 'CHILD_CONTEXTS' => array(
 *   ...
 *   new GeSHiCodeContext([params])
 *   ...
 * ),</pre>
 *
 * <pre> 'CONTEXTS' => array(
 *   ...
 *   new GeSHiCodeContext([params])
 *   ...
 * ),</pre>
 *
 * @package core
 * @author  Nigel McNie <nigel@geshi.org>
 * @since   1.1.0
 * @version $Revision$
 * @see     GeSHiContext
 * 
 */
class GeSHiCodeContext extends GeSHiContext
{
    /**#@+
     * @var array
     * @access private
     */

    /**
     * Keywords for this code context
     * @var array
     */
    var $_contextKeywords = array();

    /**
     * Characters that cannot appear before a keyword
     * @var array
     */
    var $_contextCharactersDisallowedBeforeKeywords = array();

    /**
     * Characters that cannot appear after a keyword
     * @var array
     */
    var $_contextCharactersDisallowedAfterKeywords = array();

    /**
     * A lookup table for use with regex matched starters/enders
     * @var array
     */
    var $_contextKeywordLookup;

    /**
     * A symbol array
     * @var array
     */
    var $_contextSymbols = array();

    /**
     * A regex array
     * @var array
     */
    var $_contextRegexps = array();
    
    /**
     * An array of object "splitters"
     */
    var $_objectSplitters = array();
    
    /**
     * Whether this code context has finished loading yet
	 * @todo [blocking 1.1.1] Do this by static variable?
     */
    var $_codeContextLoaded = false;
     
     /**#@-*/


    /**
     * Redefinition of {@link GeSHiContext::load()} in order to also
     * load keywords, regular expressions etc.
     *
     */
    function load (&$styler)
    {
        parent::load($styler);

        if ($this->_codeContextLoaded) {
            return;
        }
        $this->_codeContextLoaded = true;
        
        // Add regex for methods
        foreach ($this->_objectSplitters as $data) {
            $splitter_match = '';
            foreach ($data[0] as $splitter) {
                    $splitter_match .= preg_quote($splitter) . '|';
            }
            
            $this->_contextRegexps[] = array(
                0 => array(
                    "#(" . substr($splitter_match, 0, -1) . ")(\s*)([a-zA-Z\*\(_][a-zA-Z0-9_\*]*)#"
                ),
                1 => '', // char to check for
                2 => array(
                    1 => true,
                    2 => true, // highlight splitter
                    3 => array($data[1], $data[2], $data[3]) // $data[3] says whether to give code a go at the match first
                )
            );
        }
    }
    
    /**
     * Overrides GeSHiContext::loadStyleData to load style data
     */
     function loadStyleData ()
     {
        // @todo [blocking 1.1.1] Skip if already loaded???
        // Set styles for keywords
        //geshi_dbg('Loading style data for context ' . $this->getName(), GESHI_DBG_PARSE);
        // @todo [blocking 1.1.1] Style data for infectious context loaded many times, could be reduced to one?
        //@todo [blocking 1.1.1] array_keys loop construct if possible
        foreach ($this->_contextKeywords as $keyword_group_array) {
            geshi_dbg($keyword_group_array[1] . ' ' . $keyword_group_array[2], GESHI_DBG_PARSE);
            $this->_styler->setStyle($keyword_group_array[1], $keyword_group_array[2]);
        }
         
        // Set styles for regex groups
        foreach ($this->_contextRegexps as $data) {
            foreach ($data[2] as $group) {
               $this->_styler->setStyle($group[0], $group[1]);
            }
        }
        
        // Set styles for symbols
        foreach ($this->_contextSymbols as $data) {
            $this->_styler->setStyle($data[1], $data[2]);
        }
        
        parent::loadStyleData();
     }

    /**
     * Overrides {@link GeSHiContext::_addParseData()} to highlight a code context, including
     * keywords, symbols and regular expression matches
     * 
     * @param string The code to add as parse data
     * @param string The first character of the context after this
     */
    function _addParseData ($code, $first_char_of_next_context = '')
    {
        //$first_char_of_next_context = '';
        geshi_dbg('GeSHiCodeContext::_addParseData(' . substr($code, 0, 15) . ', ' . $first_char_of_next_context . ')', GESHI_DBG_PARSE);
        
        $regex_matches = array();
        foreach ($this->_contextRegexps as $regex_group_key => $regex_data) {
            geshi_dbg('  Regex group: ' . $regex_group_key, GESHI_DBG_PARSE);
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
                    geshi_dbg('    Trying regex ' . $regex . '... ', GESHI_DBG_PARSE, false);
                    $matches = array();
                    preg_match_all($regex, $code, $matches);
                    geshi_dbg('found ' . count($matches[0]) . ' matches', GESHI_DBG_PARSE);
                    
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
        geshi_dbg('    Regex matches: ' . str_replace("\n", "\r", print_r($regex_matches, true)), GESHI_DBG_PARSE);    

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
                        if (/*isset($this->_contextRegexps[$data[1]][2][$key][2]) && */
                            true === $this->_contextRegexps[$data[1]][2][$key][2]) {
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
                                $this->_contextRegexps[$data[1]][2][$key][0]); //name in [0], s in [1]
                        }
                    // Else, perhaps it is simply set. If so, we highlight it as if it were
                    // part of the code context 
                    } elseif (isset($this->_contextRegexps[$data[1]][2][$key])) {
                        // this may end up as array(array(match,name),array(match,name),array..)
                        //@todo [blocking 1.1.1] may need to pass the first char of next context here if it's at the end...
                        $parse_data = $this->_codeContextHighlight($match);
                        foreach ($parse_data as $pdata) { 
                            $regex_replacements[$data[0]][] = $pdata;
                        }
                    }
                    // Else, don't add it at all...
                }
            }
        }
        geshi_dbg('  Regex replacements: ' . str_replace("\n", "\r", print_r($regex_replacements, true)), GESHI_DBG_PARSE);
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
        $data_array = ($this->_isAlias ? array('alias_name' => $this->_aliasForContext) : array());

        foreach ($parse_data as $data) {
            if (!(isset($data[2]) && $data[2])) {
                $this->_styler->addParseData($data[0], $data[1], $data_array);
            } else {
                // $data[2] is the URL
                $this->_styler->addParseData($data[0], $data[1], array_merge($data_array, array('url' => $data[2])));
            }
        }
    }


    /**
     * Given code, returns an array of context data about it
     */
     function _codeContextHighlight ($code, $regex_replacements = array(), $first_char_of_next_context = '')
     {
        geshi_dbg('GeSHiCodeContext::_codeContextHighlight(' . substr($code, 0, 15) . ', ' .
            (($regex_replacements) ? 'array(...)' : 'null') . ', ' . $first_char_of_next_context . ')', GESHI_DBG_PARSE);
        //$first_char_of_next_context = '';
        
        if (!is_array($this->_contextKeywordLookup)) {
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
        $earliest_pos           = false;
        $earliest_keyword       = '';
        $earliest_keyword_group = 0;
        
        // For each character
        for ($i = 0; $i < $length; $i++) {
            if (isset($regex_replacements[$i])) {
                geshi_dbg('  Regex replacements available at position ' . $i . ': ' . $regex_replacements[$i][0][0] . '...', GESHI_DBG_PARSE);
                // There's regular expressions expected to go here
                foreach ($regex_replacements[$i] as $replacement) {
                    $result[++$result_pointer] = $replacement;
                }
                // Allow keyword matching immediately after regular expressions
                $keyword_match_allowed = true;
            }
            
            $char = substr($code, $i, 1);
            if ("\0" == $char) {
                // Not interested in null characters inserted by regex replacements
                continue;
            }
            
            // Take symbols into account before doing this
            if (!$this->_contextKeywordLookup) {
                $this->_checkForSymbol($char, $result, $result_pointer);
                continue;
            }
            
            geshi_dbg('@b  Current char is: ' . str_replace("\n", '\n', $char), GESHI_DBG_PARSE);
            
            if ($keyword_match_allowed && isset($this->_contextKeywordLookup[$char])) {
                foreach ($this->_contextKeywordLookup[$char] as $keyword_array) {
                    // keyword array is 0 => keyword, 1 => kwgroup
                    if (strlen($keyword_array[0]) < $earliest_keyword) {
                        // We can skip keywords that are shorter than the best
                        // earliest we can currently do
                        geshi_dbg('  [skipping ' . $keyword_array[0], GESHI_DBG_PARSE);
                        continue;
                    }
                    geshi_dbg('    Checking code for ' . $keyword_array[0], GESHI_DBG_PARSE);
                    // If case sensitive
                    if ($this->_contextKeywords[$keyword_array[1]][3]) {
                        $next_part_is_keyword = ($keyword_array[0] == substr($code, $i, strlen($keyword_array[0])));
                    } else {
                        $next_part_is_keyword = (strtolower($keyword_array[0]) == strtolower(substr($code, $i, strlen($keyword_array[0]))));
                    }

                    geshi_dbg("  next part is keyword: $next_part_is_keyword", GESHI_DBG_PARSE);
                    // OPTIMIZE (use lookup to remember for length $foo(1 => false, 2 => false) so if kw is length 1 or 2 then don't need to check
                    //$after_allowed = ( !in_array(substr($code, $i + strlen($keyword_array[0]), 1), array_diff($this->_context_characters_disallowed_after_keywords, $this->_context_keywords[$keyword_array[1]][4])) );
                    // the first char of the keyword is always $char???
                    $after_char = substr($code, $i + strlen($keyword_array[0]), 1);
                    // if '' == $after_char, it's at the end of the context so we need
                    // the first char from the next context...
                    if ( '' == $after_char ) $after_char = $first_char_of_next_context;

                    geshi_dbg("  after char to check: |$after_char|", GESHI_DBG_PARSE);
                    $after_allowed = ('' == $after_char || !ctype_alnum($after_char) ||
                        (ctype_alnum($after_char) &&
                        !ctype_alnum($char)) );
                    $after_allowed = ($after_allowed &&
                        !in_array($after_char, $this->_contextCharactersDisallowedAfterKeywords));
                    // Disallow underscores after keywords
                    $after_allowed = ($after_allowed && ($after_char != '_'));

                    // If where we are up to is a keyword, and it's allowed to be here (before was already
                    // tested by $keyword_match_allowed)
                    if ($next_part_is_keyword && $after_allowed) {
                        //if ( false === $earliest_pos || $pos < $earliest_pos || ($pos == $earliest_pos && strlen($keyword_array[0]) > strlen($earliest_keyword)) )
                        if (strlen($keyword_array[0]) > strlen($earliest_keyword)) {
                            geshi_dbg('@bfound', GESHI_DBG_PARSE);
                            // what is _pos for?
                            // What are any of them for??
                            $earliest_pos           = true;//$pos;
                            // BUGFIX: just in case case sensitive matching used, get data from string
                            // instead of from data array
                            $earliest_keyword       = substr($code, $i, strlen($keyword_array[0]));
                            $earliest_keyword_group = $keyword_array[1];
                        }
                    }
                }
            }
            
            // reset matching of keywords
            //$keyword_match_allowed = false;

            //echo "Current pos = $i, earliest keyword is " . htmlspecialchars($earliest_keyword) . ' at ' . $earliest_pos . "\n";
            //echo "Symbol string is |$current_symbols|\n";

            if (false !== $earliest_pos) {
                geshi_dbg('Keyword matched: ' . $earliest_keyword, GESHI_DBG_PARSE);
                // there's a keyword match!

                $result[++$result_pointer] = array($earliest_keyword,
                                                   $this->_contextKeywords[$earliest_keyword_group][1],
                                                   $this->_getURL($earliest_keyword, $earliest_keyword_group));
                $i += strlen($earliest_keyword) - 1;
                geshi_dbg("strlen of earliest keyword is " . strlen($earliest_keyword) . " (pos is $i)", GESHI_DBG_PARSE);
                // doesn't help
                $earliest_pos = false;
                $earliest_keyword = '';
            } else {
                // Check for a symbol instead
                $this->_checkForSymbol($char, $result, $result_pointer);
            }

            /// If we move this to the end we might be able to get rid of the last one [DONE]
            /// The second test on the first line is a little contentious  - allows functions that don't
            /// start with an alpha character to be within other words, e.g abc<?php, where <?php is a kw
            $before_char = substr($code, $i, 1);
            $before_char_is_alnum = ctype_alnum($before_char);
            $keyword_match_allowed = (!$before_char_is_alnum || ($before_char_is_alnum && !ctype_alnum($char)));
            $keyword_match_allowed = ($keyword_match_allowed && !in_array($before_char,
                $this->_contextCharactersDisallowedBeforeKeywords));
            // Disallow underscores before keywords
            $keyword_match_allowed = ($keyword_match_allowed && ('_' != $before_char));
            geshi_dbg('  Keyword matching allowed: ' . $keyword_match_allowed, GESHI_DBG_PARSE);
            geshi_dbg('    [checked ' . substr($code, $i, 1) . ' against ' . print_r($this->_contextCharactersDisallowedBeforeKeywords, true), GESHI_DBG_PARSE);
        }

        unset($result[0]);        
        //geshi_dbg('@b  Resultant Parse Data:', GESHI_DBG_PARSE);
        //geshi_dbg(str_replace("\n", "\r", print_r($result, true)), GESHI_DBG_PARSE);
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
    function _checkForSymbol($possible_symbol, &$result,&$result_pointer)
    {
        $skip = false;
        geshi_dbg('Checking ' . $possible_symbol . ' for symbol match', GESHI_DBG_PARSE); 
        foreach ($this->_contextSymbols as $symbol_data) {
            if (in_array($possible_symbol, $symbol_data[0])) {
                // we've matched the symbol in $symbol_group
                // start the current symbols string
                if ($result[$result_pointer][1] == $symbol_data[1]) {
                    $result[$result_pointer][0] .= $possible_symbol;
                } else {
                    $result[++$result_pointer] = array($possible_symbol, $symbol_data[1]);
                }
                $skip = true;
                break;
            }
        }
        if (!$skip) {
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
        geshi_dbg('GeSHiCodeContext::_createContextKeywordLookup()', GESHI_DBG_PARSE);

        $this->_contextKeywordLookup = array();
        foreach ($this->_contextKeywords as $keyword_group_key => $keyword_group_array) {
            geshi_dbg("  keyword group key: $keyword_group_key", GESHI_DBG_PARSE);

            foreach ($keyword_group_array[0] as $keyword) {
                // If keywords are case sensitive, add them straight in.
                // Otherwise, if they're not and the first char of the lookup is alphabetical,
                // add it to both parts of the lookup (a and A for example).
                $key = substr($keyword, 0, 1);
                if (ctype_alpha($key) && !$keyword_group_array[3]) {
                    $this->_contextKeywordLookup[strtoupper(substr($keyword, 0, 1))][] =
                        array(0 => $keyword, 1 => $keyword_group_key /*$keyword_group_array[1]*/);
                    $this->_contextKeywordLookup[strtolower(substr($keyword, 0, 1))][] =
                        array(0 => $keyword, 1 => $keyword_group_key /*$keyword_group_array[1]*/);
                } else {
                    $this->_contextKeywordLookup[$key][] =
                        array(0 => $keyword, 1 => $keyword_group_key /*$keyword_group_array[1]*/);
                }
            }
        }
        if (isset($key)) {
            geshi_dbg('  Lookup created, first entry: ' . print_r($this->_contextKeywordLookup[$key][0], true), GESHI_DBG_PARSE);
        } else {
            geshi_dbg('  Lookup created with no entries', GESHI_DBG_PARSE);
        }
    }


    /**
     * Turns keywords into <a href="url">>keyword<</a> if needed
     *
     * @todo [blocking 1.1.5] This method still needs to listen to set_link_target, set_link_styles etc
     */
    function _getURL ($keyword, $earliest_keyword_group)
    {
        if ($this->_contextKeywords[$earliest_keyword_group][4] != '') {
            // Remove function_exists() call? Valid language files will define functions required...
            if (substr($this->_contextKeywords[$earliest_keyword_group][4], -2) == '()' &&
                function_exists(substr($this->_contextKeywords[$earliest_keyword_group][4], 0, -2))) {
                $href = call_user_func(substr($this->_contextKeywords[$earliest_keyword_group][4], 0, -2), $keyword);
            } else {
                $href = str_replace('{FNAME}', $keyword, $this->_contextKeywords[$earliest_keyword_group][4]);
            }
            return $href;
        }
        return '';
    }
}

?>
