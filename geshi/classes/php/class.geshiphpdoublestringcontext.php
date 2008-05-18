<?php
/**
 * GeSHi - Generic Syntax Highlighter
 * ----------------------------------
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
 * @package   lang
 * @author    Nigel McNie <nigel@geshi.org>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright (C) 2005 Nigel McNie
 * @version   $Id$
 * 
 */

/**
 * The GeSHiPHPDoubleStrincContext class represents a PHP double string
 * 
 * @package lang
 */
class GeSHiPHPDoubleStringContext extends GeSHiStringContext
{
    /**
     * A cached copy of the parent name
     * @var string
     * @access private
     */
    var $_parentName;
    
    /**
     * Loads data for a PHP Double String Context.
     * 
     * @var GeSHiStyler The styler to be used for this context 
     */
    function load (&$styler)
    {
        parent::load($styler);
        $this->_parentName = parent::getName();
        //echo $this->_parentName;
    }
    
    
    function _addParseData ($code, $first_char_of_next_context = '')
    {
        geshi_dbg('GeSHiPHPDoubleStringContext::_addParseData(' . substr($code, 0, 15) . ')', GESHI_DBG_PARSE);
        $regexes = array(
            //'REGEX#(\$this->[a-zA-Z_][a-zA-Z0-9_\[\]\'\$]*)#',
            //'REGEX#(\$\$?[a-zA-Z_][a-zA-Z0-9_\[\]\'\$]*)#',
            //'REGEX#(\$\$?[a-zA-Z_][a-zA-Z0-9_]*)#'
            //'REGEX#([\{]?\$this[\s]*\-&gt;[\s]*)([a-zA-Z_][\[\]\\\'\\\$a-zA-Z0-9_]*[\}]?)#',
            //'REGEX#(^|[^\\\\])([\{]?[\$]{1,2}[a-zA-Z_][\[\]\\\'\\\$a-zA-Z0-9_]*[\}]?)#'
            'REGEX#(\{?\$\$?[a-zA-Z_][a-zA-Z0-9_\'\[\]]*\}?)#',
            'REGEX#(\{?)(\$this)(\s*->\s*)([a-zA-Z_][a-zA-Z0-9_]*)(\}?)#'
        );
        
        while (true) {
            $earliest_data = array('pos' => false, 'len' => 0);
            foreach ($regexes as $regex) {
                $data = geshi_get_position($code, $regex, 0);
                //print_r($data);
                if ((false != $data['pos'] && false === $earliest_data['pos']) ||
                    (false !== $data['pos']) &&
                    (($data['pos'] < $earliest_data['pos']) ||
                    ($data['pos'] == $earliest_data['pos'] && $data['len'] > $earliest_data['len']))) {
                    $earliest_data = $data;
                }
            }
            //'edata:' . print_r($earliest_data);
            if (false === $earliest_data['pos']) {
                // No more variables in this string
                break;
            }
            //print_r($earliest_data['tab']);
            // Bug fix: if pos was 0 then last param was -1 so we duplicated all but the last char in
            // the string!
            //if ($earliest_data['pos'] > 0) {
                parent::_addParseData(substr($code, 0, $earliest_data['pos']/* - 1*/));
            //}
            
            // Now the entire possible var is in:
            $possible_var = substr($code, $earliest_data['pos'], $earliest_data['len']);
            geshi_dbg('Found variable at position ' . $earliest_data['pos'] . '(' . $possible_var . ')', GESHI_DBG_PARSE);
            
            // Check that the dollar sign that started this variable was not escaped
            $first_part = str_replace('\\\\', '', substr($code, 0, $earliest_data['pos']));
            if ('\\' == substr($first_part, -1)) {
                // This variable has been escaped, so add the escaped dollar sign
                // as the correct context, and the rest of the variable (recurse to catch
                // other variables inside this possible variable)
                geshi_dbg('Variable was escaped', GESHI_DBG_PARSE);
                $this->_styler->addParseData('\\$', $this->_parentName . '/esc');
                $this->_addParseData(substr($possible_var, 1));
            } else {
                if ($earliest_data['pos']) {
                    //geshi_dbg('Variable valid, parsing stuff before it', GESHI_DBG_PARSE);
                    //$this->_addParseData(substr($code, 0, $earliest_data['pos']));
                    //$code = substr($code, 0, $earliest_data['pos']);
                }
                // Many checks could go in here...
                
                if (isset($earliest_data['tab'][5])) {
                    $start_brace = '{';
                } else {
                    $start_brace = '';
                }
                if ('{' == substr($possible_var, 0, 1)) {
                    if ('}' != substr($possible_var, -1)) {
                        // Open { without closer
                        parent::_addParseData('{');
                        $possible_var = substr($possible_var, 1);
                        $start_brace = '';
                    }
                }
                
                if (isset($earliest_data['tab'][5])) {
                    // Then we matched off the second regex - the one that does objects
                    // The first { if there is one, and $this (which is in index 2
                    $this->_styler->addParseData($start_brace . $earliest_data['tab'][2], $this->_parentName . '/var');
                    // The -> with any whitespace around it
                    $this->_styler->addParseData($earliest_data['tab'][3], $this->_parentName . '/sym0');
                    // The method name
                    $this->_styler->addParseData($earliest_data['tab'][4], $this->_parentName . '/oodynamic');
                    // The closing }, if any
                    if ($earliest_data['tab'][5]) {
                        $this->_styler->addParseData($earliest_data['tab'][5], $this->_parentName . '/var');
                    } 

                    //print_r($earliest_data['tab']);
                } else {
                    $this->_styler->addParseData($possible_var, $this->_parentName . '/var');
                }//print_r($this->_styler->_styleData);
                
            }
            
            //$this->_styler->addParseData(, 'php/double_string/var');
            // Chop off what we have done
            $code = substr($code, $earliest_data['pos'] + $earliest_data['len']);
        }
        // Add the rest
        parent::_addParseData($code, $first_char_of_next_context); 
    }
}
   
?>
