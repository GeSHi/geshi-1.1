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
    // {{{ properties
    
    /**
     * @var string
     */
    var $charset;

    /**
     * @var string
     */    
    var $fileExtension;
    
    /**#@+
     * @access private
     */
    /**
     * @var array
     */
    var $_styleData = array();
    
    /**
     * @var array
     */
    var $_contextCacheData = array();
    
    /**
     * @var GeSHiCodeParser
     */
    var $_codeParser = null;
    
    /**
     * @var GeSHiRenderer
     */
    var $_renderer = null;
    
    /**
     * @var string
     */
    var $_parsedCode = '';
    /**#@-*/
    
    // }}}
    // {{{ setStyle()
    
    /**
     * Sets the style of a specific context
     */
    function setStyle ($context_name, $style, $start_name = 'start', $end_name = 'end')
    {
        // @todo [blocking 1.1.1] Why is this called sometimes with blank data?
        geshi_dbg('GeSHiStyler::setStyle(' . $context_name . ', ' . $style . ')', GESHI_DBG_PARSE);
        $this->_styleData[$context_name] = $style;
    }
    
    // }}}
    // {{{ removeStyleData()
    
    /**
     * Removes any style data for the related context, including
     * data for the start and end of the context
     */
    function removeStyleData ($context_name, $context_start_name = 'start', $context_end_name = 'end')
    {
        unset($this->_styleData[$context_name]);
        unset($this->_styleData["$context_name/$context_start_name"]);
        unset($this->_styleData["$context_name/$context_end_name"]);
        geshi_dbg('  removed style data for ' . $context_name, GESHI_DBG_PARSE);
    }

    // }}}
    // {{{ getStyle()
    
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
    
    // }}}
    // {{{ resetParseData()

    /**
     * Sets up GeSHiStyler for assisting with parsing.
     * Makes sure that GeSHiStyler has a code parser and
     * renderer associated with it.
     */
    function resetParseData ()
    {
        // Set result to empty
        $this->_parsedCode = '';
        
        // If the language we are using does not have a code
        // parser associated with it, use the default one
        if (is_null($this->_codeParser)) {
            /** Get the default code parser class */
            require_once GESHI_CLASSES_ROOT . 'class.geshidefaultcodeparser.php';
            $this->_codeParser =& new GeSHiDefaultCodeParser($this);
        }

        // It the user did not explicitly set a renderer with GeSHi::accept(), then
        // use the default renderer (HTML)
        if (is_null($this->_renderer)) {
            /** Get the renderer class */
            require_once GESHI_RENDERERS_ROOT . 'class.geshirendererhtml.php';
            $this->_renderer =& new GeSHiRendererHTML($this);
        }
    }

    // }}}
    // {{{ setCodeParser()
    
    /**
     * Sets the code parser that will be used. This is used by language
     * files in the geshi/languages directory to set their code parser
     * 
     * @param GeSHiCodeParser The code parser to use
     */
    function setCodeParser (&$codeparser)
    {
        // @todo [blocking 1.1.1] codeparser should be instanceof but a child of GeSHiCodeParser
        // handle case when not so (which should never happen)
        if (is_a($codeparser, 'GeSHiCodeParser')) {
            $this->_codeParser =& $codeparser;
        }
    }
    
    // }}}
    // {{{ addParseData()
    
    /**
     * Recieves parse data from the context tree. Sends the
     * data on to the code parser, then to the renderer for
     * building the result string
     */    
    function addParseData ($code, $context_name, $url = '')
    {
        // @todo [blocking 1.1.5] test this, esp. not passing back anything and passing back multiple
        // can use PHP code parser for this
        $data = $this->_codeParser->parseToken($code, $context_name, $url);
        if ($data) {
            if (!is_array($data[0])) {
                $this->_parsedCode .= $this->_renderer->parseToken($data[0], $data[1], $data[2]);
            } else {
                foreach ($data as $dat) {
                    $this->_parsedCode .= $this->_renderer->parseToken($dat[0], $dat[1], $dat[2]);
                }
            }
        }
    }
    
    // }}}
    // {{{ addParseDataStart()
    
    function addParseDataStart ($code, $context_name, $start_name = 'start')
    {
    	$this->addParseData($code, "$context_name/$start_name");
    }
    
    // }}}
    // {{{ addParseDataEnd()
    
    function addParseDataEnd ($code, $context_name, $end_name = 'end')
    {
    	$this->addParseData($code, "$context_name/$end_name");
    }
    
    // }}}
    // {{{ getParsedCode()
    
    function getParsedCode ()
    {
        $result = $this->_renderer->getHeader() . $this->_parsedCode . $this->_renderer->getFooter();
        $this->_parsedCode = '';
        return $result;
    }
    
    // }}}
    // {{{ setCacheData()
    
    /**
     * Sets cache data
     */
    function setCacheData ($cached_file_name, $cache_str)
    {
        $this->_contextCacheData[$cached_file_name] = $cache_str;
    }
    
    // }}}
    // {{{ getCacheData()
    
    /**
     * Gets cache data
     */
    function getCacheData ($cached_file_name)
    {
        return isset($this->_contextCacheData[$cached_file_name]) ?
            $this->_contextCacheData[$cached_file_name] : null;
    }
    
    // }}}
}

?>
