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
 * @package   scripts
 * @author    Nigel McNie <nigel@geshi.org>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright (C) 2005 Nigel McNie
 * @version   $Id$
 * 
 */

/** Get the Javascript XML parser used for getting Javascript keywords */
require_once 'class.javascriptxmlparser.php';

/**
 * Implementation of KeywordGetterStrategy for the Javascript language.
 * 
 * @package scripts
 * @author  Nigel McNie <nigel@geshi.org>
 * @since   0.1.1
 * @version $Revision$
 * @see     KeywordGetterStrategy
 */
class javascriptKeywordGetterStrategy extends KeywordGetterStrategy
{
    
    /**
     * Creates a new Javascript Keyword Getter Strategy. Defines allowed
     * keyword groups for Javascript.
     */
    function javascriptKeywordGetterStrategy ()
    {
        $this->_language = 'Javascript';
        $this->_validKeywordGroups = array(
            'keywords', 'functions', 'objects', 'math', 'events', 'methods'
        );
        
        $this->_missedKeywords = array(
            'keywords' => array(
                'null'
            ),
            'methods' => array(
                'getElementById'
            )
        );    
    }
        
    /**
     * Implementation of abstract method {@link KeywordGetterStrategy::getKeywords()}
     * to get keywords for Javascript
     * 
     * @param  string The keyword group to get keywords for. If not a valid keyword
     *                 group an error is returned
     * @return array  The keywords for Javascript for the specified keyword group
     * @throws KeywordGetterError
     */
    function &getKeywords ($keyword_group)
    {
        // Check that keyword group listed is valid
        $group_valid = $this->keywordGroupIsValid($keyword_group);
        if (KeywordGetter::isError($group_valid)) {
            return $group_valid;
        }
        
        $xml_parser =& new Javascript_XML_Parser;
        $xml_parser->setKeywordGroup($keyword_group);
        
        // Set the file to parse to Nigel's local Javascript syntax file.
        $result = $xml_parser->setInputFile('/usr/share/apps/katepart/syntax/javascript.xml');
        if (PEAR::isError($result)) {
            return new KeywordGetterError(FILE_UNAVAILABLE, $this->_language,
                array('{FILENAME}' => '/usr/share/apps/katepart/syntax/javascript.xml'));
        }
        
        $result = $xml_parser->parse();
        if (PEAR::isError($result)) {
            return new KeywordGetterError(PARSE_ERROR, $this->_language,
                array('{PARSE_ERROR}' => $result->getMessage()));
        }
        
        $keywords =& $xml_parser->getKeywords();

        $keywords =& $this->tidy($keywords, $keyword_group);
        return $keywords;
    }
}

?>
