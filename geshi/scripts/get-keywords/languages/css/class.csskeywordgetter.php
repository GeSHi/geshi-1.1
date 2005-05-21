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
 * @package   scripts
 * @author    Nigel McNie <nigel@geshi.org>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright (C) 2005 Nigel McNie
 * @version   $Id$
 * 
 */

/** Get the CSS XML parser used for getting CSS keywords */
require_once 'class.cssxmlparser.php';

/**
 * Implementation of KeywordGetterStrategy for the CSS language.
 * 
 * @author Nigel McNie <nigel@geshi.org>
 * @since  0.1.0
 * @see    KeywordGetterStrategy
 */
class cssKeywordGetterStrategy extends KeywordGetterStrategy
{

    /**
     * Creates a new CSS Keyword Getter Strategy. Defines allowed
     * keyword groups for CSS.
     */
    function cssKeywordGetterStrategy ()
    {
        $this->_language = 'CSS';
        $this->_validKeywordGroups = array(
            'properties', 'types', 'colors', 'paren', 'mediatypes', 'pseudoclasses'
        );
    }
        
    /**
     * Implementation of abstract method {@link KeywordGetterStrategy::getKeywords()}
     * to get keywords for CSS
     * 
     * @param  string The keyword group to get keywords for. If not a valid keyword
     *                 group an error is returned
     * @return array  The keywords for CSS for the specified keyword group
     * @throws KeywordGetterError
     */
    function getKeywords ($keyword_group)
    {
        // Check that keyword group listed is valid
        $group_valid = $this->keywordGroupIsValid($keyword_group);
        if (KeywordGetter::isError($group_valid)) {
            return $group_valid;
        }
        
        $xml_parser =& new CSS_XML_Parser;
        $xml_parser->setKeywordGroup($keyword_group);
        
        // Set the file to parse to Nigel's local CSS syntax file.
        // @todo Find online if possible (check kde.org) and link to that
        // @todo Make configurable the file? Have at least hardcoded ones for me and for the web
        $xml_parser->setInputFile('/usr/share/apps/katepart/syntax/css.xml');
        
        if (!$xml_parser->parse()) {
            return new KeywordGetterError(PARSE_ERROR, $this->_language);
        }
        
        $keywords =& $xml_parser->getKeywords();
        return $keywords;
    }
        
}

?>
