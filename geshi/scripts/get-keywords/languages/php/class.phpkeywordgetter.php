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

/** Get the PHP XML parser used for getting PHP keywords */
require_once 'class.phpxmlparser.php';

/**
 * Implementation of KeywordGetterStrategy for the PHP language.
 * 
 * @author Nigel McNie <nigel@geshi.org>
 * @since  0.1.1
 * @see    KeywordGetterStrategy
 */
class phpKeywordGetterStrategy extends KeywordGetterStrategy
{
    /**
     * Creates a new PHP Keyword Getter Strategy. Defines allowed
     * keyword groups for PHP.
     */
    function phpKeywordGetterStrategy ()
    {
        $this->_language = 'PHP';
        $this->_validKeywordGroups = array(
            'controlstructures', 'keywords', 'functions'
        );
    }
        
    /**
     * Implementation of abstract method {@link KeywordGetterStrategy::getKeywords()}
     * to get keywords for PHP
     * 
     * @param  string The keyword group to get keywords for. If not a valid keyword
     *                 group an error is returned
     * @return array  The keywords for PHP for the specified keyword group
     * @throws KeywordGetterError
     */
    function getKeywords ($keyword_group)
    {
        // Check that keyword group listed is valid
        $group_valid = $this->keywordGroupIsValid($keyword_group);
        if (KeywordGetter::isError($group_valid)) {
            return $group_valid;
        }
        
        // Convert keyword group to correct name
        // for XML parser if needed
        if ('controlstructures' == $keyword_group) {
            $keyword_group = 'control structures';
        }
        
        $xml_parser =& new PHP_XML_Parser;
        $xml_parser->setKeywordGroup($keyword_group);
        
        // Set the file to parse to Nigel's local PHP syntax file.
        $result =& $xml_parser->setInputFile('/usr/share/apps/katepart/syntax/php.xml');
        if (PEAR::isError($result)) {
            return new KeywordGetterError(FILE_UNAVAILABLE, $this->_language,
                array('{FILENAME}' => '/usr/share/apps/katepart/syntax/php.xml'));
        }        

        $result =& $xml_parser->parse();
        if (PEAR::isError($result)) {
            return new KeywordGetterError(PARSE_ERROR, $this->_language,
                array('{PARSE_ERROR}' => $result->getMessage()));
        }
        
        $keywords =& $xml_parser->getKeywords();
        
        // Add some keywords that don't seem to be in the XML file
        if ('control structures' == $keyword_group) {
            array_push($keywords, 'endwhile', 'endif', 'endswitch', 'endforeach');
        } elseif ('keywords' == $keyword_group) {
            array_push($keywords, '__FUNCTION__', '__CLASS__', '__METHOD__',
            'DEFAULT_INCLUDE_PATH', 'PEAR_INSTALL_DIR', 'PEAR_EXTENSION_DIR',
            'PHP_EXTENSION_DIR', 'PHP_BINDIR', 'PHP_LIBDIR', 'PHP_DATADIR',
            'PHP_SYSCONFDIR', 'PHP_LOCALSTATEDIR', 'PHP_CONFIG_FILE_PATH',
            'PHP_OUTPUT_HANDLER_START', 'PHP_OUTPUT_HANDLER_CONT',
            'PHP_OUTPUT_HANDLER_END', 'E_STRICT', 'E_CORE_ERROR', 'E_CORE_WARNING',
            'E_COMPILE_ERROR', 'E_COMPILE_WARNING');
        }
        sort($keywords);

        return array_unique($keywords);
    }
}

?>
