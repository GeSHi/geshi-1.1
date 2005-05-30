<?php
/**
 * GeSHi - Generic Syntax Highlighter
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * You can view a copy of the GNU GPL in the LICENSE file that comes
 * with GeSHi, in the docs/ directory.
 *
 * @package   core
 * @author    Nigel McNie <oracle.shinoda@gmail.com>
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
 * <pre>'CHILD_CONTEXTS' => array(
 *   ...
 *   new GeSHiCodeContext([params])
 *   ...
 * ),</pre>
 *
 * <pre>'CONTEXTS' => array(
 *   ...
 *   new GeSHiCodeContext([params])
 *   ...
 * ),</pre>
 *
 * @package   core
 * @author    Nigel McNie <oracle.shinoda@gmail.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright (C) 2004, 2005 Nigel McNie
 * @version   $Id$
 * @see GeSHiContext
 * 
 */
class GeSHiCodeContext extends GeSHiContext
{

    /**#@+
     * @var array
     * @access private
     */

    /**
     * 
     */
    var $_contextKeywords;

    /**
     * 
     */
    var $_contextCharactersDisallowedBeforeKeywords;

    /**
     * 
     */
    var $_contextCharactersDisallowedAfterKeywords;

    /**
     *
     */
    var $_contextKeywordLookup;

    /**
     * 
     */
    var $_contextSymbols;

    /**
     * 
     */
    var $_contextRegexps;
    
    /**
     * An array of object "splitters"
     */
    var $_objectSplitters;
     
     /**#@-*/


    /**
     * Redefinition of {@link GeSHiContext::load()} in order to also
     * load keywords, regular expressions etc.
     *
     */
    function load (&$styler)
    {
        parent::load($styler);

        // Add regex for methods (???)
        if ($this->_objectSplitters) {
            foreach ($this->_objectSplitters as $data) {
                $splitter_match = '';
                foreach ($data[0] as $splitter) {
                        $splitter_match .= preg_quote($splitter) . '|';
                }

                // If we are using namespaces, give the object stuff the correct name
                if ($this->_styler->useNamespaces) {
                    $data[1] = $this->_styleName . '/' . $data[1];
                }
                        
                $this->_contextRegexps[] = array(
                    0 => array(
                        "#(" . substr($splitter_match, 0, -1) . ")(\s*)([a-zA-Z\*\(_][a-zA-Z0-9_\*]*)#"
                    ),
                    1 => '', // char to check for
                    2 => array(
                        1 => true,
                        2 => true, // highlight splitter
                        3 => array($data[1], $data[2])
                    )
                );
            }
        }
    }
    
    /**
     * Overrides GeSHiContext::loadStyleData to load style data
     */
     function loadStyleData ()
     {
        // Set styles for keywords
        //geshi_dbg('Loading style data for context ' . $this->getName(), GESHI_DBG_PARSE);
        // @todo Style data for infectious context loaded many times, could be reduced to one?
        //@todo array_keys loop construct if possible
        foreach ($this->_contextKeywords as $keyword_group_array) {
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
     * @todo [blocking 1.1.1] Each character parsed is added individually to the $result array, and it shouldn't
     * @todo [blocking 1.1.1] Optimise by not checking for keywords if there are none
     */
    function _addParseData ($code, $first_char_of_next_context = ''/*, $inherit_styles = false */)
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
                        $regex_replacements[$data[0]][] = array($match, $this->_contextRegexps[$data[1]][2][$key][0]); //name in [0], s in [1]
                    // Else, perhaps it is simply set. If so, we highlight it as if it were
                    // part of the code context 
                    } elseif (isset($this->_contextRegexps[$data[1]][2][$key])) {
                        // this may end up as array(array(match,name),array(match,name),array..)
                        //@todo may need to pass the first char of next context here if it's at the end...
                        $parse_data = $this->_codeContextHighlight($match);
                        foreach ($parse_data as $pdata) { 
                            $regex_replacements[$data[0]][] = $pdata;
                        }
                    }
                    // Else, don't add it at all...
                    // SO: for regular expression, if you want a bracket group highlighted, you
                    // set a name and style for it. If you want to catch a group simply to output
                    // it as code, set its value to true in the style array. Otherwise, the bracket
                    // group won't be counted in output. This is a good thing for nested brackets -
                    // simply set a name/style for the outer brackets and nothing for the inner brackets.
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
        foreach ($parse_data as $data) {
            if (!isset($data[2])) {
                $this->_styler->addParseData($data[0], $data[1]);
            } else {
                $this->_styler->addParseData($data[0], $data[1], $data[2]);
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
        
        $result = array();
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
                    $result[] = $replacement;
                }
            }
            
            $char = substr($code, $i, 1);
            if ("\0" == $char) {
                // Not interested in null characters inserted by regex replacements
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

                    // OPTIMIZE (use lookup to remember for length $foo(1 => false, 2 => false) so if kw is length 1 or 2 then don't need to check
                    //$after_allowed = ( !in_array(substr($code, $i + strlen($keyword_array[0]), 1), array_diff($this->_context_characters_disallowed_after_keywords, $this->_context_keywords[$keyword_array[1]][4])) );
                    // the first char of the keyword is always $char???
                    $after_char = substr($code, $i + strlen($keyword_array[0]), 1);
                    // if '' == $after_char, it's at the end of the context so we need
                    // the first char from the next context...
                    if ( '' == $after_char ) $after_char = $first_char_of_next_context;

                    geshi_dbg("  after char to check: |$after_char|", GESHI_DBG_PARSE);
                    $after_allowed = (!ctype_alpha(substr($code, $i + strlen($keyword_array[0]), 1)) ||
                        (ctype_alpha(substr($code, $i + strlen($keyword_array[0]), 1)) &&
                        !ctype_alpha($char)) );
                    $after_allowed = ($after_allowed &&
                        !in_array($after_char, $this->_contextCharactersDisallowedAfterKeywords));

                    // If where we are up to is a keyword, and it's allowed to be here (before was already
                    // tested by $keyword_match_allowed)
                    if ($next_part_is_keyword && $after_allowed) {
                        //if ( false === $earliest_pos || $pos < $earliest_pos || ($pos == $earliest_pos && strlen($keyword_array[0]) > strlen($earliest_keyword)) )
                        if (strlen($keyword_array[0]) > strlen($earliest_keyword)) {
                            geshi_dbg('@bfound', GESHI_DBG_PARSE);
                            // what is _pos for?
                            // What are any of them for??
                            $earliest_pos           = true;//$pos;
                            $earliest_keyword       = $keyword_array[0];
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

                $result[] = array($earliest_keyword, $this->_contextKeywords[$earliest_keyword_group][1],
                    $this->_getURL($earliest_keyword, $earliest_keyword_group));
                $i += strlen($earliest_keyword) - 1;
                geshi_dbg("strlen of earliest keyword is " . strlen($earliest_keyword) . " (pos is $i)", GESHI_DBG_PARSE);
                // doesn't help
                $earliest_pos = false;
                $earliest_keyword = '';
            } else {
                // Check for a symbol instead
                $skip = false;
                foreach ($this->_contextSymbols as $symbol_data) {
                    if (in_array($char, $symbol_data[0])) {
                        // we've matched the symbol in $symbol_group
                        // start the current symbols string
                        $result[] = array($char, $symbol_data[1]);
                        $skip = true;
                        break;
                    }
                }
                if (!$skip) {
                    $result[] = array($char, $this->_styleName);
                }   
            }
            //else
           // {
            //    if ( defined('DEBUG') || defined('DEBUG_CODE_PARSER') ) echo "Checking for symbol... ";

            /// If we move this to the end we might be able to get rid of the last one [DONE]
            /// The second test on the first line is a little contentious  - allows functions that don't
            /// start with an alpha character to be within other words, e.g abc<?php, where <?php is a kw
            $last_char_is_alpha = ctype_alpha(substr($code, $i, 1));
            $keyword_match_allowed = (!$last_char_is_alpha || ($last_char_is_alpha && !ctype_alpha($char)));
            $keyword_match_allowed = ($keyword_match_allowed && !in_array(substr($code, $i, 1),
                $this->_contextCharactersDisallowedBeforeKeywords));
            geshi_dbg('  Keyword matching allowed: ' . $keyword_match_allowed, GESHI_DBG_PARSE);
            geshi_dbg('    [checked ' . substr($code, $i, 1) . ' against ' . print_r($this->_contextCharactersDisallowedBeforeKeywords, true), GESHI_DBG_PARSE);
        }
        
        geshi_dbg('@b  Resultant Parse Data:', GESHI_DBG_PARSE);
        geshi_dbg(str_replace("\n", "\r", print_r($result, true)), GESHI_DBG_PARSE);
        //return array(array($code, $this->_styleName));
        return $result;
     }


    /*function _doHighlightingMain ($code, $regex_replacements = array(), $first_char_of_next_context = '')
    {
        // What's the isset($regex_replacements[$i] gonna turn into?
        // if (isset()) {
        //    foreach($rr[$i] as $data) {
        //      $this->_styler->addParseData($data[0], $data[1]);
        //    }
        // }
        $result = '';
        $length = strlen($code);
        $current_symbol_group = false;
        $current_symbols = '';
        $keyword_match_allowed = true;

        if ( defined('DEBUG') || defined('DEBUG_CODE_PARSER') ) echo "<b>Checking code:</b>\n";
        if ( defined('DEBUG') || defined('DEBUG_CODE_PARSER') ) echo htmlspecialchars($code) . "\n";

        for ( $i = 0; $i < $length; $i++ )
        {
            // add regexes if there aren't any symbols in the buffer
            if ( isset($regex_replacements[$i]) )
            {
                // if there's a symbol string, we'll have to finish it so we can put the regex in
                if ( $current_symbols )
                {
                    // ADDED HTMLSPECIALCHARS
                    $result .= $current_symbols;
                    $current_symbols = '';
                    $current_symbol_group = false;
                }
                $result .= $regex_replacements[$i];
                //$i += 3;
            }

            $char = substr($code, $i, 1);
            if ( "\0" == $char ) continue; // not interested in the nulls created by regexes
            if ( defined('DEBUG') || defined('DEBUG_CODE_PARSER') ) echo "\n<b>Char is $char</b>\n";

            $earliest_pos = false;
            $earliest_keyword = '';
            $pos = 0;

            if ( defined('DEBUG') || defined('DEBUG_CODE_PARSER') ) echo "current char is " . htmlspecialchars($char) . "\n";
            //echo htmlspecialchars(print_r($this->_context_keyword_lookup[$char], true));
            /// If we move this to the end we might be able to get rid of the last one
            /// The second test on the first line is a little contentious  - allows functions that don't
            /// start with an alpha character to be within other words.
            $last_char_alpha = ctype_alpha(substr($code, $i - 1, 1));
            $keyword_match_allowed = ( !$last_char_alpha || ($last_char_alpha && !ctype_alpha($char)) );
            $keyword_match_allowed = ( $keyword_match_allowed && !in_array(substr($code, $i - 1, 1), $this->_contextCharactersDisallowedBeforeKeywords) );
            $keyword_match_allowed = ( $keyword_match_allowed || (0 == $i) );

            if ( $keyword_match_allowed && /*array_key_exists($char, $this->_context_keyword_lookup)*//* isset($this->_contextKeywordLookup[$char]) )
            {
                foreach ( $this->_contextKeywordLookup[$char] as $keyword_array )
                {
                    // keyword array is 0 => keyword, 1 => kwgroup
                    // WRONG!!!!
                    //$pos = stripos($code, $keyword_array[0], $i);

                    if ( defined('DEBUG') || defined('DEBUG_CODE_PARSER') ) echo "Checking code for " . htmlspecialchars($keyword_array[0]) . "\n";
                    //if ( defined('DEBUG') || defined('DEBUG_CODE_PARSER') ) echo htmlspecialchars($code) . "\n";

                    if ( $this->_contextKeywords[$keyword_array[1]][3] )
                    {
                        $next_part_is_keyword = ( $keyword_array[0] == substr($code, $i, strlen($keyword_array[0])) );
                    }
                    else
                    {
                        $next_part_is_keyword = ( strtolower($keyword_array[0]) == strtolower(substr($code, $i, strlen($keyword_array[0]))) );
                    }

                    // OPTIMIZE (use lookup to remember for length $foo(1 => false, 2 => false) so if kw is length 1 or 2 then don't need to check
                    //$after_allowed = ( !in_array(substr($code, $i + strlen($keyword_array[0]), 1), array_diff($this->_context_characters_disallowed_after_keywords, $this->_context_keywords[$keyword_array[1]][4])) );
                    // the first char of the keyword is always $char???
                    $after_char = substr($code, $i + strlen($keyword_array[0]), 1);
                    // if '' == $after_char, it's at the end of the context so we need
                    // the first char from the next context...
                    if ( '' == $after_char ) $after_char = $first_char_of_next_context;

                    if ( defined('DEBUG') || defined('DEBUG_CODE_PARSER') ) echo "  after char to check: |$after_char|\n";
                    $after_allowed = ( !ctype_alpha(substr($code, $i + strlen($keyword_array[0]), 1)) || (ctype_alpha(substr($code, $i + strlen($keyword_array[0]), 1)) && !ctype_alpha($char)) );
                    $after_allowed = ( $after_allowed && !in_array($after_char, $this->_contextCharactersDisallowedAfterKeywords) );
                    //
                    // Try this: before_allowed is true if the last character is not alpha, or if it is but the first char
                    // of the matched keyword is not
                    //$before_allowed = ( !ctype_alpha(substr($code, $i - 1, 1)) || (ctype_alpha(substr($code, $i - 1, 1)) && !ctype_alpha(substr($keyword_array[0], 0, 1))) );//true; //( !in_array(substr($code, $i - 1, 1), array_diff($this->_context_characters_disallowed_before_keywords, $this->_context_keywords[$keyword_array[1]][5])) );
                    if ( $next_part_is_keyword && $after_allowed /*&& $before_allowed*//* )
                    {
                        //if ( false === $earliest_pos || $pos < $earliest_pos || ($pos == $earliest_pos && strlen($keyword_array[0]) > strlen($earliest_keyword)) )
                        if ( strlen($keyword_array[0]) > strlen($earliest_keyword) )
                        {
                            if ( defined('DEBUG') || defined('DEBUG_CODE_PARSER') ) echo " <b>found</b>\n";
                            $earliest_pos = true;//$pos;
                            $earliest_keyword = $keyword_array[0];
                            $earliest_keyword_group = $keyword_array[1];
                        }
                    }
                }
            }

            // reset matching of keywords
            //$keyword_match_allowed = false;

            //echo "Current pos = $i, earliest keyword is " . htmlspecialchars($earliest_keyword) . ' at ' . $earliest_pos . "\n";
            //echo "Symbol string is |$current_symbols|\n";

            if ( false !== $earliest_pos )
            {
                if ( defined('DEBUG') || defined('DEBUG_CODE_PARSER') ) echo "Keyword matched: " . htmlspecialchars($earliest_keyword) . "\n";
                // there's a keyword match!

                // firstly, if there are symbols we should add those
                if ( $current_symbols )
                {
                    // ADDED HTMLSPECIALCHARS
                    $result .= /*$this->_addMarkers(htmlspecialchars(*//*$current_symbols/*), true, $this->_contextSymbols[$current_symbol_group][1], $this->_contextSymbols[$current_symbol_group][2])*//*;
                    $current_symbols = '';
                    $current_symbol_group = false;
                }


                // ADDED HTMLSPECIALCHARS
                $result .= $this->_linkify(substr($code, $i, strlen($earliest_keyword))/*, true, $this->_contextKeywords[$earliest_keyword_group][1], $this->_contextKeywords[$earliest_keyword_group][2])*//*, $earliest_keyword, $earliest_keyword_group);
                //echo "strlen of earliest keyword is " . strlen($earliest_keyword) . " (pos is $i)\n";
                $i += strlen($earliest_keyword) - 1;
                if ( defined('DEBUG') || defined('DEBUG_CODE_PARSER') ) echo "    $i\n";
                // doesn't help
                //$earliest_pos = false;
            }
            else
            {
                if ( defined('DEBUG') || defined('DEBUG_CODE_PARSER') ) echo "Checking for symbol... ";
                // Now ask: Is this character a symbol?
                if ( false === $current_symbol_group )
                {
                    foreach ( $this->_contextSymbols as $symbol_group => $symbol_data )
                    {
                        if ( in_array($char, $symbol_data[0]) )
                        {
                            // we've matched the symbol in $symbol_group
                            // start the current symbols string
                            $current_symbols = $char;
                            $current_symbol_group = $symbol_group;
                            if ( defined('DEBUG') || defined('DEBUG_CODE_PARSER') ) echo "found!\n";
                            break;
                        }
                    }
                    if ( !$current_symbols )
                    {
                        // if we got here, we went through all the arrays and couldn't find
                        // a symbol, so add it and break
                        // ADDED HTMLSPECIALCHARS
                        $result .= htmlspecialchars($char);
                    }
                    //
                    // IMPORTANT - this is the array that decides what characters are allowed
                    // before a keyword. This may need to be configurable for each language
                    //
                    // Commented out, as we now check this above when we check the character after
                    // this allows more flexible handling of disallowed characters
                    /*
                    if ( !in_array(strtolower($char), $this->_context_characters_disallowed_before_keywords) )
                    {
                        // we haven't matched a keyword or symbol, but this char
                        // is a whitespace character so on the next character we can
                        // match a keyword safely
                        $keyword_match_allowed = true;
                    }*//*
                    $keyword_match_allowed = true;
                }
                else
                {

                    // check as for above, just in case the symbol group ends (?)
                    /*
                    if ( !in_array(strtolower($char), $this->_context_characters_disallowed_before_keywords) )
                    {
                        // we haven't matched a keyword or symbol, but this char
                        // is a whitespace character so on the next character we can
                        // match a keyword safely
                        $keyword_match_allowed = true;
                    }*//*
                    $keyword_match_allowed = true;


                    // we already have a current symbol group
                    if ( in_array($char, $this->_contextSymbols[$current_symbol_group][0]) )
                    {
                        // the current char is part of the current symbol group
                        // this is good, as we can save on <span>s
                        if ( defined('DEBUG') || defined('DEBUG_CODE_PARSER') ) echo "found2!\n";
                        $current_symbols .= $char;
                    }
                    else
                    {
                        // no symbol match... if it's whitespace though, we can
                        // add it to the symbols string in the hope that the next
                        // symbol to come along is in this group, thus saving on
                        // <span[symbol]>{symbols...}</span>{whitespace}<span[symbol]>...
                        if ( in_array($char, array(' ', "\n", "\t")) )
                        {
                            if ( defined('DEBUG') || defined('DEBUG_CODE_PARSER') ) echo "found3!\n";
                            $current_symbols .= $char;
                        }
                        else
                        {
                            // nothing more we can do...
                            /// NO!!! this may well always be true...
                            if ( $current_symbols )
                            {
                                // if we have a symbols string, we can add
                                // it to the result
                                if ( defined('DEBUG') || defined('DEBUG_CODE_PARSER') ) echo "Adding symbols to result\n";
                                // ADDED HTMLSPECIALCHARS
                                $result .= $current_symbols;

                                $current_symbols = ''; // yes needed really!!!
                                // why needed?
                                // because of check above [if ( $current_symbols )]

                                /// Here, check to see if the current character is a symbol. If it
                                /// is, we can start a new group.
                                foreach ( $this->_contextSymbols as $symbol_group => $symbol_data )
                                {
                                    if ( in_array($char, $symbol_data[0]) )
                                    {
                                        // we've matched the symbol in $symbol_group
                                        // start the current symbols string
                                        $current_symbols = $char;
                                        $current_symbol_group = $symbol_group;
                                        if ( defined('DEBUG') || defined('DEBUG_CODE_PARSER') ) echo "next char is a symbols, so starting a group\n";
                                        break;
                                    }
                                }
                            }
                            /*else
                            {
                                echo "Nothing found - add char to result\n";*//*
                                // absolutely nothing to do at all.....
                            // ADDED HTMLSPECIALCHARS
                            if ( !$current_symbols )
                            {
                                // then the test for a new symbol group above failed
                                $result .= htmlspecialchars($char);
                                $current_symbol_group = false;
                            }

                            //}
                        }
                    }
                }
            }
            //$i+= $pos;

            if ( defined('DEBUG') || defined('DEBUG_CODE_PARSER') ) echo "<i>At end: pos is now $i</i>\n";
        }


        // if there's any symbols left, add them now
        if ( $current_symbols )
        {
            $result .= $current_symbols;
        }

        // get rid of null characters used for padding
        $result = str_replace("\0", '', $result);

        return $result;
    }*/



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
     * Turns keywords into <<a href="url">>keyword<</a>> if needed
     *
     * @todo This method still needs to listen to set_link_target, set_link_styles etc
     */
    function _getURL ($keyword, $earliest_keyword_group)
    {
        // I want to remove the isset test - this can be done if every keyword group context defines the URL (4th) key
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
