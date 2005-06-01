<?php
/**
 * GeSHi - Generic Syntax Highlighter
 * ----------------------------------
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
