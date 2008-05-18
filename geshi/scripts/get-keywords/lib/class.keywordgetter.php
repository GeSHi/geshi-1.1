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

/** The language to get keywords for is not supported by this tool */
define('LANG_NOT_SUPPORTED', -1);
/** The keyword group asked for is not supported by the language */
define('INVALID_KEYWORD_GROUP', -2);
/** There was a parse error parsing an XML document for keywords */
define('PARSE_ERROR', -3);

/**#@+
 * @access private
 */
/** The strategy object used to get keywords is invalid */
define('INVALID_STRATEGY', -4);
/**#@-*/

/** Class that handles errors */
require_once 'class.keywordgettererror.php';

/** Class that is the root of the keyword getting strategy */
require_once 'class.keywordgetterstrategy.php';

/**
 * The KeywordGetter class. The get-keywords program is a
 * frontend to this class.
 * 
 * @author Nigel McNie
 * @since  0.1.0
 */
class KeywordGetter
{
    /**#@+
     * @access private
     */
    /**
     * The language being used
     * @var string
     */
    var $_language;
    
    /**
     * The keyword strategy to use
     * @var KeywordGetterStrategy
     */
    var $_keywordStrategy;
    /**#@-*/
    
    /**
     * Constructor
     * 
     * @param KeywordGetterStrategy The strategy to use to get keywords
     * @private
     * {@internal Yes, that's right, PRIVATE. Use KeywordGetter::factory
     * to create new KeywordGetters}}
     * @todo [blocking 1.1.9] @internal format?
     */
    function KeywordGetter ($kwstrategy)
    {
        if (!is_a($kwstrategy, 'KeywordGetterStrategy')) {
            return new KeywordGetterError(INVALID_STRATEGY, $this->_language);
        }
        $this->_keywordStrategy = $kwstrategy;
    }
    
    /**
     * Creates a new keyword getter based on the incoming language
     * 
     * @param string The language to get keywords for
     * @static
     */
    function &factory ($language)
    {
        if (!file_exists('languages/' . $language . '/class.' . $language . 'keywordgetter.php')) {
            return new KeywordGetterError(LANG_NOT_SUPPORTED, $language);
        }
        $this->_language = $language;
        
        /** Get the requested language */
        require_once 'languages/' . $language . '/class.' . $language . 'keywordgetter.php';
        
        $class = $language . 'KeywordGetterStrategy';
        if (!class_exists($class)) {
            return new KeywordGetterError(LANG_NOT_SUPPORTED, $language);
        }
        
        return new KeywordGetter(new $class);
    }
    
    /**
     * Returns whether the passed object is an error object
     * 
     * @param  mixed   The variable that may be an error object
     * @return boolean Whether the variable is an error object
     * @static
     */
    function isError ($possible_err_object)
    {
        return is_a($possible_err_object, 'KeywordGetterError');
    }
    
    /**
     * Gets the keywords for a language
     * 
     * @param  The keyword group to get keywords for
     * @return array An array of the keywords for this language/keyword group
     */
    function &getKeywords ($keyword_group)
    {
        return $this->_keywordStrategy->getKeywords($keyword_group);
    }
    
    /**
     * Gets valid keyword groups for a language
     * 
     * @return array An array of valid keyword groups for the language
     *               that this KeywordGetter is representing
     */
    function &getValidKeywordGroups ()
    {
        return $this->_keywordStrategy->getValidKeywordGroups();
    }
    
    /**
     * Gets a list of all supported languages
     * 
     * @return array
     * @static
     */
    function &getSupportedLanguages ()
    {
        $files_to_ignore = array('.', '..', 'CVS');
        $supported_languages = array();
        
        $dh = @opendir('languages');
        if (false === $dh) {
            return false;
        }
        
        while (false !== ($file = @readdir($dh))) {
            if (in_array($file, $files_to_ignore)) {
                continue;
            }
            if (file_exists('languages/' . $file . '/class.' . $file . 'keywordgetter.php')) {
                array_push($supported_languages, $file);
            }
        }
        
        return $supported_languages;
    }
}
    
?>
