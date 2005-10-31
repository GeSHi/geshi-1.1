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
 * Implementation of KeywordGetterStrategy for the CodeWorker language.
 * 
 * @package scripts
 * @author  Nigel McNie <nigel@geshi.org>
 * @since   0.1.2
 * @version $Revision$
 * @see     KeywordGetterStrategy
 */
class codeworkerKeywordGetterStrategy extends KeywordGetterStrategy
{
    /**
     * Creates a new CodeWorker Keyword Getter Strategy. Defines allowed
     * keyword groups for CodeWorker.
     */
    function codeworkerKeywordGetterStrategy ()
    {
        $this->_language = 'CodeWorker';
        $this->_validKeywordGroups = array(
	       'keywords', 'functions', 'constants', 'sfunctions'
        );
        $this->_missedKeywords = array(
            'keywords' => array(
                'break', 'do', 'else', 'foreach', 'forfile', 'function', 'if', 'in',
                'insert', 'local', 'localref', 'node', 'pushItem', 'ref', 'return',
                'value', 'while'
            ),
            'functions' => array(
                'clearVariable', 'composeCLikeString', 'composeHTMLLikeString',
                'decrementIndentLevel', 'empty', 'findLastString', 'first',
                'getInputFilename', 'getOutputFilename', 'getShortFilename',
                'incrementIndentLevel', 'key', 'last', 'leftString', 'loadFile',
                'midString', 'readChars', 'removeElement', 'replaceString', 'rsubString',
                'setInputLocation', 'size', 'startString', 'subString', 'toLowerString',
                'toUpperString', 'traceLine'
            ),
            'constants' => array(
                'false', 'project', 'this', 'true', '_ARGS', '_REQUEST'
            ),
            'sfunctions' => array(
                'parseAsBNF', 'parseStringAsBNF', 'translate', 'translateString'
            )
        );
    }
        
    /**
     * Implementation of abstract method {@link KeywordGetterStrategy::getKeywords()}
     * to get keywords for CodeWorker
     * 
     * @param  string The keyword group to get keywords for. If not a valid keyword
     *                 group an error is returned
     * @return array  The keywords for CodeWorker for the specified keyword group
     * @throws KeywordGetterError
     */
    function &getKeywords ($keyword_group)
    {
        // Check that keyword group listed is valid
        $group_valid = $this->keywordGroupIsValid($keyword_group);
        if (KeywordGetter::isError($group_valid)) {
            return $group_valid;
        }
        
        $keywords =& $this->tidy(array(), $keyword_group);
        return $keywords;
    }
}

?>
