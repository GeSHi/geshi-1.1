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

/** @todo move Parser.php... */
require_once '../../../../geshi/inc/pear/XML/Parser.php';

/**
 * @todo comment
 */
class Keyword_XML_Parser extends XML_Parser
{
    var $_keywordGroup;
    var $_keywords = array();
    
    function setKeywordGroup ($keyword_group)
    {
        $this->_keywordGroup = $keyword_group;
    }
    
    function &getKeywords ()
    {
        return $this->_keywords;
    }
}

?>
