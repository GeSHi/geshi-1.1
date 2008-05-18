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
 * @author    Nigel McNie <oracle.shinoda@gmail.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright (C) 2005 Nigel McNie
 * @version   $Id$
 * 
 */

/**
 * @abstract
 */
class KeywordGetterStrategy
{
    
    var $_language;
    
    var $_keywordGroup;
    
    var $_keywords = array();
    
    /**
     * Creates a new KeywordGetterStrategy
     */
    function KeywordGetterStrategy ($language)
    {
        $this->_language = $language;
    }
    
    /**
     * @abstract
     */
    function getKeywords ($keyword_group)
    {
        return new KeywordGetterError(LANG_NOT_SUPPORTED, $this->_language);
    }
    
    /**
     * Checks whether the keyword group asked for is valid
     */
    function keywordGroupIsValid ($keyword_group, $valid_keyword_groups) {
        if (in_array($keyword_group, $valid_keyword_groups)) {
            return true;
        }
        return new KeywordGetterError(INVALID_KEYWORD_GROUP, $this->_language,
            array('{KEYWORD_GROUP}' => $keyword_group));
    }
}

?>
