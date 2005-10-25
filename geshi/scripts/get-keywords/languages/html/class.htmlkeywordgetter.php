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

/**
 * Implementation of KeywordGetterStrategy for the HTML language.
 * 
 * @package scripts
 * @author  Nigel McNie <nigel@geshi.org>
 * @since   0.1.1
 * @version $Revision$
 * @see     KeywordGetterStrategy
 */
class htmlKeywordGetterStrategy extends KeywordGetterStrategy
{
    /**
     * The file from which the attribute names will be raided
     * @var string
     * @access private
     */
    var $_fileName = '/usr/share/doc/w3-recs/RECS/html4/index/attributes.html';
    
    /**
     * Creates a new HTML Keyword Getter Strategy. Defines allowed
     * keyword groups for HTML.
     */
    function htmlKeywordGetterStrategy ()
    {
        $this->_language = 'HTML';
        $this->_validKeywordGroups = array(
            'attributes'
        );
    }
        
    /**
     * Implementation of abstract method {@link KeywordGetterStrategy::getKeywords()}
     * to get keywords for HTML
     * 
     * @param  string The keyword group to get keywords for. If not a valid keyword
     *                 group an error is returned
     * @return array  The keywords for HTML for the specified keyword group
     * @throws KeywordGetterError
     */
    function &getKeywords ($keyword_group)
    {
        // Check that keyword group listed is valid
        $group_valid = $this->keywordGroupIsValid($keyword_group);
        if (KeywordGetter::isError($group_valid)) {
            return $group_valid;
        }
        
        if (!is_readable($this->_fileName)) {
            $tmp =& new KeywordGetterError(FILE_UNAVAILABLE, $this->_language,
                array('{FILENAME}' => $this->_fileName));
            return $tmp;
        }
        
        $file_contents = implode('', file($this->_fileName));
        $matches = array();
        preg_match_all('#<td title="Name"><a[^>]+>\s*([a-z\-]+)#', $file_contents, $matches);
        $keywords = $matches[1];
        
        $keywords = $this->tidy($keywords, $keyword_group);
        return $keywords;
    }
}

?>
