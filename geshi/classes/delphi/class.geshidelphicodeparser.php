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

/** Get the GeSHiCodeParser class */
require_once GESHI_CLASSES_ROOT . 'class.geshicodeparser.php';

/**
 * The GeSHiDelphiCodeParser class
 * 
 * @package core
 * @author  Nigel McNie <nigel@geshi.org>
 * @since   1.1.1
 * @version $Revision$
 */
class GeSHiDelphiCodeParser extends GeSHiCodeParser
{
    // {{{ properties
    
    /**
     * A flag that can be used for the "state" of parsing
     * @var string
     * @access private
     */
    var $_state = '';
    
    /**
     * A store for a token that we can use for remembering tokens
     * across calls to parseToken().
     * 
     * @todo [blocking 1.1.1] Change to a stack and move to parent
     */
    var $_store = null;
    
    // }}}
    // {{{ parseToken()
    
    /**
     * This method can either return an array like
     * this one is doing, or nothing (false), or an
     * array of arrays. This way, it can hold onto
     * data it needs for parsing
     * 
     * @todo [blocking 1.1.5] delphi fixes:
     *   - highlight default keyword if after ; in property context
     *   - don't highlight functions if not before "(" brackets (alpha)
     * @todo [blocking 1.1.1] add cleanup method to flush any stored tokens
     */
    function parseToken ($token, $context_name, $data)
    {
        // If we have detected a keyword, instead of passing it back we will make sure it has a bracket
        // after it, so we know for sure that it is a keyword. So we save it to "_store" and return false
        if (substr($context_name, 0, strlen($this->_language . '/stdprocs')) == $this->_language . '/stdprocs') {
            $this->_store = array($token, $context_name, $data);
            return false;
        }
        
        // If we have a store we can check now to see if the current token is a bracket
        if ($this->_store && $context_name == $this->_language . '/brksym' && substr(trim($token), 0, 1) == '(') {
            // The keyword was correctly used
            $store = $this->_store;
            $this->_store = null;
            return array(
                $store,
                array($token, $context_name, $data)
            );
        } elseif ($this->_store) {
            // Keyword was *not* correctly put in keywords, maybe it's a variable instead
            $store = $this->_store;
            $this->_store = null;
            // Modify context to say that the keyword is actually just a bareword
            $store[1] = $this->_language;
            return array(
                $store,
                array($token, $context_name, $data)
            );
        }
        
        // Default action: just return the token
        return array($token, $context_name, $data);
    }
    
    // }}}
}

?>
