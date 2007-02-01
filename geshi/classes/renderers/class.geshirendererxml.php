<?php
/**
 * GeSHi - Generic Syntax Highlighter
 * <pre>
 *   File:   geshi/classes/renderers/class.geshirendererxml.php
 *   Author: Knut A. Wikström
 *   E-mail: knut@wikstrom.dk
 * </pre>
 * 
 * For information on how to use GeSHi, please consult the documentation
 * found in the docs/ directory, or online at http://geshi.org/docs/
 * 
 * This program is part of GeSHi.
 *
 *  This program is free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 * 
 *  You should have received a copy of the GNU General Public License
 *  along with this program; if not, write to the Free Software
 *  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301 USA
 *
 * @package    geshi
 * @subpackage renderer
 * @author     Knut A. Wikström <knut@wikstrom.dk>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright  (C) 2006 Knut A. Wikstr&ouml;m
 * @version    $Id$
 * 
 */

/**
 * The GeSHiRendererXML class.
 * Parses the code into a tokenized XML format.
 * 
 * @package    geshi
 * @subpackage renderer
 * @since      1.1.1
 * @version    $Revision$
 * @see        GeSHiRenderer
 */
class GeSHiRendererXML extends GeSHiRenderer
{
	// {{{ properties
	
	/**
	 * Are we going to add the CSS to the output?
	 *
	 * @access private
	 * @var bool
	 */
	var $_addCSS = true;
	
	// }}}
    // {{{ parseToken()
        
    /**
     * Implements parseToken to format the XML tags.
     * It uses the syntax <token type="TYPE" link="URL">.
     * The URL is only there if specified.
     * 
     * @param string $token         The token to put tags around
     * @param string $context_name  The name of the context that the tag is in
     * @param array  $data          Miscellaneous data about the context
     * @return string               The token wrapped in XML
     * @todo [blocking 1.2.2] Make it so that CSS is optional
     */
    function parseToken ($token, $context_name, $data)
    {
        // Ignore blank tokens
        if ('' == $token || geshi_is_whitespace($token)) {
            return $token;
        }

		// Initialize the result variable
        $result = '';
		
		// Add the basic tag
		$result .= '<token type="' . $context_name . '"';
		
		// Check if we should use an URL
		if (isset($data['url']))
		{
			// Hey, we got an URL! Yayy~
			$result .= ' url="' . htmlspecialchars($data['url']) . '"';
		}
		
		// Are we gonna add in CSS?
		if ($this->_addCSS)
		{
			// Heh...
			$result .= ' css="' . $this->_styler->getStyle($context_name) . '"';
		}
			
		// Finish the opening tag
		$result .= '>';
		
		// Now add in the token
		$result .= '<![CDATA[' . $token . ']]>';
		
		// Add the closing tag
		$result .= '</token>\n';
		
		// Return the result
        return $result;
    }
    
    // }}}
    // {{{ getHeader()
    
    /**
     * Returns the header for the code. A very basic opening wrapper.
     * 
     * @return string
     * @todo Add the correct doctype (as soon as I make a DTD)
     */
    function getHeader ()
    {
	    // TODO: Add doctype (if needed)
        return '<?xml version="1.0"?>' . "\n" . 
		'<!DOCTYPE GESHI SYSTEM "HERE_GOES_URL_TO_DTD">' . "\n" . 
		"\n" . 
		'<geshi language="' . $this->_styler->language . '" theme="' . $this->_styler->themes[0] . '">' . "\n";
    }
    
    // }}}
    // {{{ getFooter()
    
    /**
     * Returns the footer for the code. A very basic closing wrapper.
     * 
     * @return string
     */
    function getFooter ()
    {
        return '</geshi>';
    }
    
    // }}}
    
}

?>