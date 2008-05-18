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
 * Class that is overridden to provide an implementation of getting keywords
 * for a particular language
 * 
 * @author Nigel McNie <nigel@geshi.org>
 * @since  0.1.0
 * @abstract
 */
class KeywordGetterStrategy
{
    
    /**#@+
     * @access private
     */
     
    /**
     * The language that this getter is getting keywords for
     * @var string
     */
    var $_language;
    
    /**
     * The keyword group within the language that this getter is
     * getting keywords for
     * @var string
     */
    var $_keywordGroup;
    
    /**
     * The keyword groups that are valid (supported) by this strategy
     * @var array
     */
    var $_validKeywordGroups;
    
    /**
     * used?
     */
    var $_keywords = array();
    
    /**#@-*/
        
    /**
     * @abstract
     */
    function getKeywords ($keyword_group)
    {
        return new KeywordGetterError(LANG_NOT_SUPPORTED, $this->_language);
    }
    
    /**
     * @return array
     */
    function getValidKeywordGroups ()
    {
        return $this->_validKeywordGroups;
    }
    
    /**
     * Checks whether the keyword group asked for is valid
     */
    function keywordGroupIsValid ($keyword_group) {
        if (in_array($keyword_group, $this->_validKeywordGroups)) {
            return true;
        }
        return new KeywordGetterError(INVALID_KEYWORD_GROUP, $this->_language,
            array('{KEYWORD_GROUP}' => $keyword_group));
    }
}

?>
