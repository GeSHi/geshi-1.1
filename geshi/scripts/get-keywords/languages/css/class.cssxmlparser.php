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

/** Get the Keyword XML Parser class for use by CSS_XML_Parser */
require_once 'lib/class.keywordxmlparser.php';

/**
 * Extends Keyword_XML_Parser as a class to get CSS keywords from
 * a katepart syntax XML file
 * 
 * @package scripts
 * @author  Nigel McNie <nigel@geshi.org>
 * @since   0.1.0
 * @version $Revision$
 * @see     Keyword_XML_Parser
 */
class CSS_XML_Parser extends Keyword_XML_Parser
{
    /**#@+
     * @var boolean
     * @access private
     */
    /**
     * Whether we are currently in the block of the XML file
     * with items of the correct type
     */
    var $_valid;
    
    /**
     * Whether we should add the next CDATA we encounter. This
     * is made true when we encounter an ITEM node
     */
    var $_addKeyword;
    
    /**
     * A list of keywords to ignore
     * @var array
     */
    var $_keywordsToIgnore = array('100', '200', '300', '400', '500', '600', '700', '800', '900');
    /**#@-*/
    
    /**
     * Called when the start tag of a node of the
     * XML document is encountered
     * 
     * @param resource XML Parser Resource
     * @param string   The name of the node encountered
     * @param array    Any attributes the node has
     */
    function startHandler ($xp, $name, $attributes)
    {
        if ('LIST' == $name) {
            if ($attributes['NAME'] == $this->_keywordGroup) {
               $this->_valid = true;
            } else {
                $this->_valid = false;
            }
        }        
        if ($this->_valid && 'ITEM' == $name) {
            $this->_addKeyword = true;
        } else {
            $this->_addKeyword = false;
        }
    }

    /**
     * Called when CDATA is encountered
     * 
     * @param resource XML Parser resource
     * @param string   The CDATA encountered
     */    
    function cdataHandler ($xp, $cdata)
    {
        if ($this->_addKeyword && !in_array(trim($cdata), $this->_keywordsToIgnore)) {
            array_push($this->_keywords, trim($cdata));
        }
       $this->_addKeyword = false;
    }
}

?>
