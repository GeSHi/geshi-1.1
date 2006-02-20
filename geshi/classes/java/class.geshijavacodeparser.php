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
 * @author    Tim Wright <tim.w@clear.net.nz>, Nigel McNie <nigel@geshi.org>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright (C) 2005, 2006 Tim Wright, Nigel McNie
 * @version   $Id$
 * 
 */
 
/** Get the GeSHiCodeParser class */
require_once GESHI_CLASSES_ROOT . 'class.geshicodeparser.php';
 
class GeSHiJavaCodeParser extends GeSHiCodeParser
{ 
 
  /**
     * A flag that can be used for the "state" of parsing
     * 
     * @var string
     * @access private
     */
    var $_state = '';
    
    /**
     * A stack for storing tokens within parseToken().
     * 
     * @var array
     * @access private
     */
    var $_store = array();
    
    /**
     * A variable used to store the previous token
     * encountered during parsing.
     * 
     * @var string
     * @access private
     */
    
    var $_prev_token = '';
    
    /**
     * A variable used to store the previous context
     * of the previous token encountered during parsing.
     * 
     * @var string
     * @access private
     */
    var $_prev_context = '';

    /**
     * A variable used to store the previous data
     * of the previous token encountered during parsing.
     * 
     * @var string
     * @access private
     */    
    var $_prev_data = array();
    
    /**
     * A variable used to store the token previous to 
     * the previous token encountered during parsing.
     * 
     * @var string
     * @access private
     */    
     
    var $_prev_prev_token = '';
    
    /**
     * A variable used to store the context
     * of the token previous to the previous token 
     * encountered during parsing.
     * 
     * @var string
     * @access private
     */    
     
    var $_prev_prev_context = '';
    
    /**
     * A variable used to store the data previous to the 
     * previous data during parsing.
     * 
     * @var array
     * @access private
     */    
     
    var $_prev_prev_data = array();
      
 	/**
     * A list of abstract classes/methods detected in the source
     * 
     * @var array
     * @access private
     */
    var $_abstractNames = array(); 
    
    /**
     * A list of static classes/methods detected in the source
     * 
     * @var array
     * @access private
     */
    var $_staticNames = array(); 
    
    /**
     * A list of class names detected in the source
     * 
     * @var array
     * @access private
     */
    var $_classNames = array(); 
    
    /**
     * A list of interface names detected in the source
     * 
     * @var array
     * @access private
     */
    var $_interfaceNames = array();
    
    /**
     * A list of variable names detected in the source
     * 
     * @var array
     * @access private
     */
    var $_variableNames = array(); 
   
    /**
     * A list of method names detected in the source
     * 
     * @var array
     * @access private
     */
    var $_methodNames = array(); 
    
    /**
     * A list of generic type parameter names detected in the source
     * 
     * @var array
     * @access private
     */
    var $_genericNames = array();    
   
   /**
     * A list of enum values detected in the source
     * 
     * @var array
     * @access private
     */
    var $_enumValueNames = array(); 
    
   /**
     * A list of annotation names detected in the source
     * 
     * @var array
     * @access private
     */
    var $_annotationNames = array(); 
    
   
    /**
     * This will probably disappear from here as theming support
     * arrives
     */
    function GeSHiJavaCodeParser (&$styler, $language)
    {
        $this->GeSHiCodeParser($styler, $language);
    }
 
   /**
     * This method can either return an array like
     * this one is doing, or nothing (false), or an
     * array of arrays. This way, it can hold onto
     * data it needs for parsing
     * 
     * @todo [blocking 1.1.1] Use this to put class names into a
     * different context, and highlight them where they occur differently.
     * 
     * @todo [blocking 1.1.5] Use this to highlight function
     * names, e.g. function Foo means that Foo is php/php/function_names
     * and anywhere else Foo is encountered it is converted. This
     * will have to take into account:
     * 
     * - the name and dialect of the language currently being used (may
     *   have to alter GeSHiStyler for this
     * - the & symbol that might be before the function
     * - the function token is actually in the right context (e.g. java/$DIALECT)
     * - the function isn't actually a method (can highlight those too, of course)
     */
    function parseToken ($token, $context_name, $data)	
    {
        // Ignore whitespace. We put it on the store for flushing later
		if (geshi_is_whitespace($token)) {
            $this->_store[] = array($token, $context_name, $data);
            return false;
		}
        $flush = false;

        //echo htmlspecialchars("$token: $context_name") . ": $this->_state<br />\n";
        
        // Easy things first
        if ($this->_language == $context_name) {
            // Variables
            if (in_array($token, $this->_variableNames)) {
                $context_name = $this->_language . '/variable';
                $flush = true;
            }
            // Class Names
            if (in_array($token, $this->_classNames)) {
                $context_name = $this->_language . '/class_name';
                $flush = true;
            }
            // Interfaces
            if (in_array($token, $this->_interfaceNames)) {
                $context_name = $this->_language . '/interface';
                $flush = true;
            }
            // Enum Values
            if (in_array($token, $this->_enumValueNames)) {
                $context_name = $this->_language . '/enum_value';
                $flush = true;
            }
        }
        
        //Check for Import Statements & Package names
        if('import' == $this->_prev_token || 'package' == $this->_prev_token) {
        	$this->_state = $this->_prev_token;
        	if(substr($context_name, -5) == '/java') {
        		$context_name .= '/' . $this->_prev_token;
        	}
        } elseif('import' == $this->_state || 'package' == $this->_state) {
        	if(substr($context_name, -8) == '/ootoken') {
        		$context_name = 'java/java/' . $this->_state;		
        	}
        	if($token == ';') {
        		$this->_state = '';	
        	} elseif($context_name == $this->_language) {
        		$context_name .= '/' . $this->_state;
        	}
        }
        
        //Check for static class names
        if($token == '.' && $this->_prev_prev_token != '.' 
        && $this->_state != 'import' && $this->_state != 'package') {
        	echo "Entering static check<br>";
        	echo $this->_prev_token . "<br>";
        	$this->_prev_context .= '/static_class';
        }
        
        
        
        //Check for Abstract Classes / Methods
        if($context_name == $this->_language) {
        	if($this->_prev_prev_token == 'abstract') {
        		$context_name .= '/abstract';
        		$this->_abstractNames[] = $token;  		
        	}
        	if($this->_prev_prev_token == 'static') { 
        		$context_name .= '/static';
        		$this->_staticNames[] = $token;
        	}	
        }
    
        
		// Classes Check
        // If we are in the class state, keep making barewords into class names
        if ('class' == $this->_state || 'interface' == $this->_state) {
            if ('{' == $token) {
                $this->_state = '';
            } elseif ($this->_language == $context_name) {
                if ('class' == $this->_state) {
                    $context_name .= '/class_name';
                    $this->_classNames[] = $token;
                } else {
                    // State will be "implements"
                    $context_name .= '/interface';
                    $this->_interfaceNames[] = $token;
                }
            } elseif ('implements' == $token) {
                // We've done the "class Foo extends ....." bit
                $this->_state = 'interface';
            }
        } elseif (!$this->_state && 'class' == $token && $this->_language . '/keyword' == $context_name) {
            $this->_state = 'class';
        } elseif (!$this->_state && 'interface' == $token && $this->_language . '/keyword' == $context_name) {
            $this->_state = 'interface';
        }
        
        
        //Check for Exceptions
        if ('throws' == $token) {
           	//Look for Exceptions, these are classes
           	$this->_state = 'throws';	
        } elseif('throws' == $this->_state && substr($context_name, -5) == '/java') {
           	$context_name .= '/exception';
            $this->_classNames[] = $token;
        } elseif('throws' == $this->_state && $token == '{') {
        	$this->_state = '';	
        }
        
        
        // Check for keywords new and instanceof
        if (($this->_prev_token == 'new' || $this->_prev_token == 'instanceof') && $this->_language == $context_name) {
            $context_name .= '/class_name';
            $this->_classNames[] = $token;  
        }
        
        //Check for enums
        if($this->_prev_token == 'enum') {
        	$this->_varableNames[] = $token;
        	$context_name .= '/variable';
        	$this->_state = 'enum';	
        } elseif($this->_state == 'enum') {
        	if($context_name == 'java/java') {
        		$this->_enumValueNames[] = $token;
        		$context_name .= '/enum_value';
        	} elseif($token == '}') {
        		$this->_state = '';	
        	}
        }
        
        
        /*if ('class' == $this->_state || 'wait' == $this->_state) {// We just read the keyword "class", so this token 
            if ($this->_state != 'wait') { $this->_state = ''; }
            if ($token != ',' && $token != '{') {
            	$context_name .= '/class_name';
            	$this->_classNames[] = $token;  
            }
            if ($token == '{') {
                $this->_state = '';
                $flush = true;
            }//end the checking for interfaces   
            
        } elseif (($this->_state != '<') && ('class' == $token || 'extends' == $token || 'super' == $token || 
			'implements' == $token) && ($this->_language . '/keyword' == $context_name)) {
            
            if($token == 'super' && ($this->_prev_token == ';' || $this->_prev_token == '{')) { }	
           	// We may implement multiple interfaces so we wait until we have read all
           	else if($token == 'implements') { $this->state = 'wait'; }
           	else {// We are about to read a class name
            	$this->_state = 'class';
            }
		} elseif (in_array($token, $this->_classNames) && $this->_language == $context_name) {
            // Detected use of class name we have already detected
            $context_name .= '/class_name';
        }
        // Check for keyword new
        if($this->_prev_token == 'new' && (substr($context_name, -5) == '/java')) {
        	$context_name .= '/class_name';
            $this->_classNames[] = $token;  
        }*/
        
        // Variables Check
        //echo htmlspecialchars("lastc=$this->_prev_context  thist=$token") . '<br />';
        if (
            // Last token (the possible variable) is a bareword?
            ($this->_language == $this->_prev_context) &&
            // This token is one of these symbols that typically appear after a variable 
            ($token == '=' || $token == ';' || $token == ':' ||
            $token == ',' || substr($token, 0, 1) == ')') &&
            // The token before the supposed variable wasn't a keyword (e.g. package foo;)
            $this->_prev_prev_context != "$this->_language/keyword") {
            	
            
            
            // NOTE: I remove the [] and ] checks, should ask tim about them
            if ($this->_prev_prev_token != '(') {
                // Set last token to be a variable
            	$this->_variableNames[] = $this->_prev_token;
                $this->_prev_context = $this->_language . '/variable';

                // Handle cases like Foo foo = new Foo();
                if ($this->_prev_prev_context == $this->_language) {
                    $this->_classNames[] = $this->_prev_prev_token;
                    $this->_prev_prev_context .= '/class_name';
                }       
                       
                
                //echo "FOUND VAR: $this->_prev_token (prev_prev_token=$this->_prev_prev_token $this->_prev_prev_context)<br />\n";
                //print_r($this->_store);
            } else {
                // We found ( [something] ), which is a cast
                $this->_classNames[] = $this->_prev_token;
                $this->_prev_context .= '/class_name';
            }
            $flush = true;
        }     
        //Handle cases like Foo foo;
        if($token == ';' && substr($this->_prev_context, -11) == '/class_name') {	
			//foo cannot be a class type
			//add foo to the variables array
			$this->_prev_context = 'java/java/variable';
			$this->_variableNames[] = $this->_prev_token;
			//Find the token that was in the classnames array and remove it
			foreach ($this->_classNames as $key => $name) {
  				if ($this->_prev_token == $name) {
    			unset($this->_classNames[$key]);
 				}
			}
			$flush = true;
        }
        
        
        
        //Methods Check
        if (
            (($this->_language == $this->_prev_context) || (substr($this->_prev_context, -8) == '/ootoken'))
            && ($token == '()' || $token == '(' || $token == '();')
           ) {
        	//$this->methodNames[] = $this->_prev_token;
            $this->_prev_context = $this->_language . '/method';
            //echo "FOUND METHOD: $this->_prev_token<br />\n";
            //$flush = true;
        } 
        
        // Generic Types Check
        if (
        (
            (substr($context_name, -11) == '/class_name')
            || (
            // This one has been removed, because this if statement is trying to assert
            // that the token is a class name. But it doesn't matter if it's also a bareword
            // because that might be a case like "Sack<G> s = "... where Sack is an as-yet
            // undetected class name. Even if the < is part of a less-than statement it doesn't
            // matter because this token will be a variable or number anyway
            //(!(substr($context_name, -5) == '/java'))
        	/*&&*/ (!(substr($context_name, -8) == '/keyword'))
            && (!(substr($context_name, -6) == '/dtype')) 
        	&& (!(substr($context_name, -6) == '/const'))
            && (!(substr($context_name, -7) == '/symbol'))
            && (!(substr($context_name, -7) == '/method'))
            && (!(substr($context_name, -14) == '/double_string'))
            && (!(substr($context_name, -8) == '/doxygen'))
            && (false === strpos($context_name, '/multi_comment'))
            && (false === strpos($context_name, '/single_comment'))
            && (!(substr($context_name, -14) == '/single_string'))
            )
        )
            && !$this->_state
            ) {
        	//$context_name is a built in class
            $this->_state = 'found';
        } else if ($this->_state == 'found') {
            if (($token == '<' || $token == '<?') && $context_name == $this->_language . '/symbol') {
                // Start of a generic block
                $this->_state = '<';
                if ($this->_language == $this->_prev_context) {
                    // This is the case mentioned above, where it's a bareword
                    $this->_classNames[] = $this->_prev_token;
                    $this->_prev_context .= '/class_name';
                }
            } else {
                $this->_state = '';
            }
        } else if ($this->_state == '<' && $context_name == $this->_language) { 	
           	$this->_genericNames[] = $token;
           	$context_name .= '/generic_type';
        } else if ($this->_state == '<' && (substr($token, -1) == ';' || substr($token, -1) == '>') && $context_name == $this->_language . '/symbol') {
            $this->_state = '';
        }
     
        //Annotation Check 
        if('@' == $token) { 
        	$this->_state = '@';
        } elseif($this->_state == '@' && $token == 'interface') {
			$this->_state = 'annotation'; 	
        } elseif($this->_state == 'annotation') {   
        	$context_name .= '/annotation';
        	$this->_annotationNames[] = $token;   
        	$this->_state = null;   
        } elseif (in_array($token, $this->_annotationNames) && $this->_language == $context_name) {
            // Detected use of annotation name we have already detected
            $context_name .= '/annotation';
        }

        $this->_store[] = array($token, $context_name, $data);

        // Keep references to the previous data
        $i = count($this->_store) - 1;
        $this->_prev_token   =& $this->_store[$i][0];
        $this->_prev_context =& $this->_store[$i][1];
        $this->_prev_data    =& $this->_store[$i][2];
        
        // And data just before that
        // If $i, i.e. if count($this->_store) - 1, which if > 0 means there is still one more element
        // at least at position 0
        for ($j = $i - 1; $j > 0; $j--) {
            if (!geshi_is_whitespace($this->_store[$j][0])) {
                $this->_prev_prev_token   =& $this->_store[$j][0];
                $this->_prev_prev_context =& $this->_store[$j][1];
                $this->_prev_prev_data    =& $this->_store[$j][2];
                break;
            }
        }
                
        if ($flush) {
            return $this->flush();
        }
        return false;
    }
    
    function flush() {
        $data = $this->_store;
        $this->_store = array();
        return $data;
    }
}       

?>
