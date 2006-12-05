<?php
/**
 * GeSHi - Generic Syntax Highlighter
 * <pre>
 *   File:   geshi/languages/eiffel/class.geshieiffelcodeparser.php
 *   Author: Julian Tschannen
 *   E-mail: julian@tschannen.net
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
 * @subpackage lang
 * @author     Julian Tschannen <julian@tschannen.net>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright  (C) 2004 - 2006 Julian Tschannen, Nigel McNie
 * @version    $Id$
 * 
 */

/**
 * The GeSHiEiffelCodeParser class.
 * 
 * 
 * @package    geshi
 * @subpackage lang
 * @author     Julian Tschannen <julian@tschannen.net>
 * @since      1.1.1
 * @version    $Revision$
 */
class GeSHiEiffelCodeParser extends GeSHiCodeParser
{
    
    // {{{ properties
    
    /**#@+
     * @access private
     */
    
    /**#@-*/
    
    // }}}
    // {{{ sourcePreProcess()
    
    /**
     * Is given the entire source code before parsing begins so that various information
     * about the source can be stored.
     * 
     * This method is completely optional. Note that there is no postprocess method - the
     * information gathered by this method should be exploited by {@link parseToken()}
     * 
     * @param  string The source code
     * @return string The source code modified as necessary
     */
    function sourcePreProcess ($code)
    {
        // todo: maybe preprocess text to look for feature, class and 
        // generic names for better highlighting
        return $code;
    }
    
    // }}}
    // {{{ parseToken()
    
    function parseToken ($token, $context_name, $data)
    {
        // todo: implement a parser with a state to improve output
        
        if (geshi_is_whitespace ($token)) {
            return array ($token, $context_name, $data);
        }
        
        if ($context_name=='eiffel/eiffel') {
            // token has no specific context. we need to figure out one
            if (preg_match('#^[A-Z_]+$#', $token)) {
                // maybe its a class name
                // this works as long as the highlighted code follows standard naming conventions
                // but it could also be a generic parameter which would be nice
                // to format differently (this needs a stateful parser)
                $context_name = $context_name.'/classname';
            } else {
                // the possibilitys that we have here are:
                // attribute name
                // feature name
                // tagname of note/indexing clause
                // tagname of contract (pre, post, invariant)
                
                // just use featurename as a default
                // needs a stateful parser to distinguish better
                $context_name = $context_name.'/featurename';
            }
        } elseif ($context_name=='eiffel/eiffel/comment/classname') {
            // we have a classname in a comment. maybe we can provide a link
            // todo: check against default class names and add link data
        }
        return array ($token, $context_name, $data);
    }
    
    // }}}
    
    /**#@+
     * @access private
     */
    
    
    /**#@-*/
    
}

?>