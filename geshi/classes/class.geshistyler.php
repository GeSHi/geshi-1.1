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
 * @package   core
 * @author    Nigel McNie <nigel@geshi.org>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright (C) 2005 Nigel McNie
 * @version   $Id$
 * 
 */

/**
 * The GeSHiStyler class
 * 
 * @package core
 * @author  Nigel McNie <nigel@geshi.org>
 * @since   1.1.0
 * @version $Revision$
 */
class GeSHiStyler
{
    /**
     * @var string
     */
    var $charset;

    /**
     * @var string
     */    
    var $fileExtension;
    
    /**
     * @var array
     */
    var $_styleData = array();
    
    /**
     * @var array
     */
    var $_parseData;
           
    /**
     * @var int
     */
    var $_parseDataPointer = 0;
    
    /**
     * @var array
     */
    var $_contextCacheData = array();
        
    function setStyle ($context_name, $style, $start_name = 'start', $end_name = 'end')
    {
        // @todo [blocking 1.1.1] Why is this called sometimes with blank data?
        geshi_dbg('GeSHiStyler::setStyle(' . $context_name . ', ' . $style . ')', GESHI_DBG_PARSE);
        $this->_styleData[$context_name] = $style;
        /*if (!isset($this->_styleData["$context_name/$start_name"])) {
           $this->_styleData["$context_name/$start_name"] = $style;
        }
        if (!isset($this->_styleData["$context_name/$end_name"])) {
           $this->_styleData["$context_name/$end_name"] = $style;
        }*/
    }
    
    /*function setStartStyle ($context_name, $style)
    {
        $this->_styleData["$context_name/$this->_startName"] = $style;
    }
    
    function setStartName ($name)
    {
        $this->_startName = $name;
    }*/
    
    function removeStyleData ($context_name, $context_start_name = 'start', $context_end_name = 'end')
    {
        unset($this->_styleData[$context_name]);
        unset($this->_styleData["$context_name/$context_start_name"]);
        unset($this->_styleData["$context_name/$context_end_name"]);
        geshi_dbg('  removed style data for ' . $context_name, GESHI_DBG_PARSE);
    }
    
    /*function setEndStyle ($context_name, $style)
    {
        $this->_styleData["$context_name/$this->_endName"] = $style;
    }
    
    function setEndName ($name)
    {
        $this->_endName = $name;
    }*/
    
    function getStyle ($context_name)
    {
        if (isset($this->_styleData[$context_name])) {
            return $this->_styleData[$context_name];
        }
        // If style for starter/ender requested and we got here, use the default
        if ('/end' == substr($context_name, -4)) {
            $this->_styleData[$context_name] = $this->_styleData[substr($context_name, 0, -4)];
            return $this->_styleData[$context_name]; 
        }
        if ('/start' == substr($context_name, -6)) {
            $this->_styleData[$context_name] = $this->_styleData[substr($context_name, 0, -6)];
            return $this->_styleData[$context_name]; 
        }
         
        //@todo [blocking 1.1.5] Make the default style for otherwise unstyled elements configurable
        $this->_styleData[$context_name] = 'color:#000;';
        return 'color:#000;';
    }
    /*
    function getStyleStart ($context_name)
    {
        if (isset($this->_styleData["$context_name/$this->_startName"])) {
            return $this->_styleData["$context_name/$this->_startName"];
        }
        $this->_styleData["$context_name/$this->_startName"] = $this->getStyle($context_name);
        return $this->_styleData["$context_name/$this->_startName"];
    }
    
    function getStyleEnd ($context_name) 
    {
        if (isset($this->_styleData["$context_name/$this->_endName"])) {
            return $this->_styleData["$context_name/$this->_endName"];
        }
        $this->_styleData["$context_name/$this->_endName"] = $this->getStyle($context_name);
        return $this->_styleData["$context_name/$this->_endName"];
    }*/
    /*
    function startIsUnique ($context_name)
    {
        return (isset($this->_styleData["$context_name/$this->_startName"])
            && '' != $this->_styleData["$context_name/$this->_startName"]
            && $this->_styleData["$context_name/$this->_startName"] != $this->_styleData[$context_name]);
    } 

    function endIsUnique ($context_name)
    {
        $r = (isset($this->_styleData["$context_name/$this->_endName"])
            && '' != $this->_styleData["$context_name/$this->_endName"]
            && $this->_styleData["$context_name/$this->_endName"] != $this->_styleData[$context_name]);
        geshi_dbg('GeSHiStyler::endIsUnique(' . $context_name . ') = ' . $r, GESHI_DBG_PARSE);
        return $r;
    } 
    */
    function resetParseData ()
    {
        $this->_parseData        = null;
        $this->_parseDataPointer = 0;
    }

    /**
     * This method adds parse data. It tries to merge it also if two
     * consecutive contexts with the same name add parse data (which is
     * very possible).
     */    
    function addParseData ($code, $context_name, $url = '')
    {
        if ($context_name == $this->_parseData[$this->_parseDataPointer][1]) {
            // same context, same URL
            $this->_parseData[$this->_parseDataPointer][0] .= $code;
        } else {
            $this->_parseData[++$this->_parseDataPointer] = array($code, $context_name, $url);
        }
    }
    
    function addParseDataStart ($code, $context_name, $start_name = 'start')
    {
    	$this->addParseData($code, "$context_name/$start_name");
    }
    
    function addParseDataEnd ($code, $context_name, $end_name = 'end')
    {
    	$this->addParseData($code, "$context_name/$end_name");
    }
    
    function getParseData ()
    {
        return $this->_parseData;
    }
    
    /**
     * Sets cache data
     */
    function setCacheData ($cached_file_name, $cache_str)
    {
        $this->_contextCacheData[$cached_file_name] = $cache_str;
    }
    
    /**
     * Gets cache data
     */
    function getCacheData ($cached_file_name)
    {
        return isset($this->_contextCacheData[$cached_file_name]) ?
            $this->_contextCacheData[$cached_file_name] : null;
    }
}

?>
