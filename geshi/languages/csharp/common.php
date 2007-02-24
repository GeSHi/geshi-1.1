<?php
/**
 * GeSHi - Generic Syntax Highlighter
 * <pre>
 *    File:   geshi/languages/csharp/common.php
 *    Author: Knut A. Wikstr�m
 *    E-mail: knut@wikstrom.dk
 * </pre>
 *
 * For information on how to use GeSHi, please consult the documentation
 * found in the docs/ directory, or online at http://geshi.org/docs/
 *
 * This program is part of GeSHi.
 *
 *   This program is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation; either version 2 of the License, or
 *   (at your option) any later version.
 *
 *   This program is distributed in the hope that it will be useful,
 *   but WITHOUT ANY WARRANTY; without even the implied warranty of
 *   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *   GNU General Public License for more details.
 *
 *   You should have received a copy of the GNU General Public License
 *   along with this program; if not, write to the Free Software
 *   Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301 USA
 *
 * @package geshi
 * @subpackage lang
 * @author Knut A. Wikstr�m <knut@wikstrom.dk>
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright (C) 2006 Knut A. Wikstr�m
 * @version $Id$
 * @link http://gh00gle.com
 * @todo Add preprocessor arguments, as well as adding all keywords.
 */

/**#@+
 * @access private
 */

/// Require the {@see GeSHiSinglecharContext} class.
require_once GESHI_CLASSES_ROOT . 'class.geshisinglecharcontext.php';

/// Require the {@see GeSHiStringContext} class.
require_once GESHI_CLASSES_ROOT . 'class.geshistringcontext.php';
 
function geshi_csharp_common (&$context)
{
	// Add children like comments
	$context->addChild('doc_comment'); // Doc  comment before single, so that it is recognized separately.
	$context->addChild('single_comment');
	$context->addChild('multi_comment');
	$context->addChild('single_string', 'singlechar');
	$context->addChild('double_string', 'string');
    $context->addChild('double_string_verbatim', 'string');
	$context->addChild('using'); // Temporary solution, implementing in code parser. That'll be better.
	
	// Types
	$context->addKeywordGroup(array(
		'bool', 'byte', 'char', 'decimal',
		'double', 'enum', 'float', 'int',
		'long', 'sbyte', 'short', 'struct',
		'uint', 'ulong', 'ushort', 'void'
	), 'type', true, 'geshi_csharp_get_url()' /*'http://msdn.microsoft.com/library/default.asp?url=/library/en-us/csref/html/vcrefreferencetypes.asp'*/);
	
	// Full types (System.*)
	$context->addKeywordGroup(array(
		'System.Boolean', 'System.Byte', 'System.SByte', 'System.Char',
		'System.Decimal', 'System.Double', 'System.Single', 'System.Int32',
		'System.UInt32', 'System.Int64', 'System.UInt64', 'System.Object',
		'System.Int16', 'System.UInt16', 'System.String'
	), 'type', true, 'geshi_csharp_get_url()');
    
    // Full types without prefix.
	$context->addKeywordGroup(array(
		'Boolean', 'Byte', 'SByte', 'Char',
		'Decimal', 'Double', 'Single', 'Int32',
		'UInt32', 'Int64', 'UInt64', 'Object',
		'Int16', 'UInt16', 'String'
	), 'type', true, 'geshi_csharp_get_url()');
	
	// Reference types (OOP types)
	$context->addKeywordGroup(array(
			'class', 'interface', 'delegate',
			'object', 'string'
			), 'type', true, 'geshi_csharp_get_url()');
	
	// TODO: Pointer types
	// I am working out this by studying the C file :D
	// It will come soon

	// Modifiers
	$context->addKeywordGroup(array(
		'public', 'private', 'internal', 'protected', // Access modifiers
		'abstract', 'const', 'event', 'extern', 'friend',
		'override', 'readonly', 'sealed', 'static', 
		'unsafe', 'virtual', 'volatile'
	), 'modifier', true);
	
	// Selection statements
	$context->addKeywordGroup(array(
			'if', 'else', 'switch', 'case'
			), 'statement', true);
	
	// Iteration statements
	$context->addKeywordGroup(array(
			'do', 'for', 'foreach', 'in',
			'while'
			), 'statement', true);
	
	// Jump statements
	$context->addKeywordGroup(array(
			'break', 'continue', 'default', 'goto',
			'return'
			), 'keyword', true);
	
	// Exception handling statements
	$context->addKeywordGroup(array(
			'try', 'throw', 'catch', 'finally'
			), 'statement', true);
	
	// Checked and Unchecked
	$context->addKeywordGroup(array(
			'checked', 'unchecked'
			), 'modifier', true);
	
	// Other statements (that don't fit in anywhere else)
	$context->addKeywordGroup(array(
			'fixed', // Fixed statement
			'lock' // Lock expression statement
			), 'statement', true);
	
	// Method parameter keywords
	$context->addKeywordGroup(array(
			'params', 'ref', 'out'
			), 'keyword', true);
	
	// Namespace-oriented keywords
	$context->addKeywordGroup(array(
			'namespace'/*, 'using'*/ // I add this as a child - as I don't want them to be parsed as dynamic objects.
			), 'keyword', true);
	
	// Operators (literal)
	$context->addKeywordGroup(array(
			'as', 'is', 'new', 'sizeof',
			'typeof', 'true', 'false', 'stackalloc'
			), 'keyword', true);
	
	// Conversion keywords
	$context->addKeywordGroup(array(
			'explicit', 'implicit', 'operator'
			), 'modifier', true); // Added as modifier, that's where I think they fit in
	
	// Access keywords
	$context->addKeywordGroup(array(
			'base', 'this'
			), 'access', true);
	
	// Literal keywords (or keyword :D)
	$context->addKeywordGroup(array(
			'null'
			), 'keyword', true);
	
	// Symbols
	$context->addSymbolGroup(array(
			'+', '-', '*', '/', '%', // Arithmetic
			'&', '|', '^', '!', '~', '=', // Logical
			'{', '(', '[', ']', ')', '}', // Brackets
			'?', ':', // Conditional
			'\\' // Line continuation & escape
			// TODO: Make sure all symbols are here.
			), 'symbol');
	
	// Object separators
	$context->addObjectSplitter('.', 'oodynamic', 'symbol'); // Standard dynamic
	// I moved those to unmanaged file, as they are not present in managed code.
	//$context->addObjectSplitter('->', 'oodynamic', 'symbol'); // Pointer separator
	//$context->addObjectSplitter('::', 'oostatic', 'symbol'); // Static separator
}

function geshi_csharp_single_comment (&$context)
{
	$context->addDelimiters('//', "\n"); // Add the delimiters
	$context->setComplexFlag(GESHI_COMPLEX_PASSALL); // Set complex flag
	$context->parseDelimiters(GESHI_CHILD_PARSE_LEFT); // Parse out the comments
    //$this->_contextStyleType = GESHI_STYLE_COMMENTS;
}

function geshi_csharp_multi_comment (&$context)
{
	$context->addDelimiters('/*', '*/'); // Add the delimiters
	$context->setComplexFlag(GESHI_COMPLEX_PASSALL); // Set complex flag
    //$this->_contextStyleType = GESHI_STYLE_COMMENTS;
}

function geshi_csharp_doc_comment (&$context)
{
	$context->addDelimiters('///', "\n");
    //$context->setComplexFlag(GESHI_COMPLEX_TOKENISE);
    //$this->_contextStyleType = GESHI_STYLE_COMMENTS;
	
	// Add XML
	//$context->addChildLanguage('xml/xml');
}

function geshi_csharp_single_string (&$context)
{
	$context->addDelimiters("'", "'");
	
	// Add escape groups
	//$context->addEscapeGroup('\\', array('\'', 'n', 'r', 't', '\\', '0'));
    $context->setEscapeCharacters('\\');
    $context->setCharactersToEscape(array('\'', '\\', '\n', '\t', '\0'));
}

function geshi_csharp_double_string (&$context)
{
    $context->addDelimiters('"', '"');
	
	// Add escape groups
	$context->addEscapeGroup('\\', array('"', 'n', 'r', 't', '\\', '0', "\n"));
}

function geshi_csharp_double_string_verbatim (&$context) // I can't remember the name... Too tired...
{
    $context->addDelimiters('@"', '"');
	
	// Add escape groups
	$context->addEscapeGroup('"', '"');
}

function geshi_csharp_using (&$context)
{
	// Add standard delimiters
	$context->addDelimiters('using ', ';');
}

/**
 * Function to return the appropiate URL.
 * Microsoft made a great language, but forgot to document it well...
 * The docu is a spider's web, so...
 */
function geshi_csharp_get_url ($fname = '{FNAME}')
{
	// Make $fname lower case
	$fname = strtolower($fname);

	// System.* replacements for types
	$fname = str_ireplace(
		array(
			'System.Boolean', 'System.Byte', 'System.SByte', 'System.Char',
			'System.Decimal', 'System.Double', 'System.Single', 'System.Int32',
			'System.UInt32', 'System.Int64', 'System.UInt64', 'System.Object',
			'System.Int16', 'System.UInt16', 'System.String'
			),
		array(
			'bool', 'byte', 'sbyte', 'char',
			'decimal', 'double', 'float', 'int',
			'uint', 'long', 'ulong', 'object',
			'short', 'ushort', 'string'
			), $fname
		);

	$urls = array(
		'bool' => 'http://msdn.microsoft.com/library/en-us/csref/html/vcrefthebooltype.asp',
		'byte' => 'http://msdn.microsoft.com/library/en-us/csref/html/vclrfbyte_pg.asp',
		'sbyte' => 'http://msdn.microsoft.com/library/en-us/csref/html/vclrfsbyte.asp',
		'char' => 'http://msdn.microsoft.com/library/en-us/csref/html/vclrfchar_pg.asp',
		'decimal' => 'http://msdn.microsoft.com/library/en-us/csref/html/vcrefthedecimaltype.asp',
		'double' => 'http://msdn.microsoft.com/library/en-us/csref/html/vclrfdouble_pg.asp',
		'float' => 'http://msdn.microsoft.com/library/en-us/csref/html/vclrffloat_pg.asp',
		'int' => 'http://msdn.microsoft.com/library/en-us/csref/html/vclrfint_pg.asp',
		'uint' => 'http://msdn.microsoft.com/library/en-us/csref/html/vclrfuintpg.asp',
		'long' => 'http://msdn.microsoft.com/library/en-us/csref/html/vclrflong_pg.asp',
		'ulong' => 'http://msdn.microsoft.com/library/en-us/csref/html/vclrfulongpg.asp',
		'object' => 'http://msdn.microsoft.com/library/en-us/csref/html/vcgrfobject.asp',
		'short' => 'http://msdn.microsoft.com/library/en-us/csref/html/vclrfshort.asp',
		'ushort' => 'http://msdn.microsoft.com/library/en-us/csref/html/vclrfushortpg.asp',
		'string' => 'http://msdn.microsoft.com/library/en-us/csref/html/vclrfstring.asp',
		'class' => 'http://msdn.microsoft.com/library/en-us/csref/html/vcreftheclasstype.asp',
		'interface' => 'http://msdn.microsoft.com/library/en-us/csref/html/vcreftheinterfacetype.asp',
		'delegate' => 'http://msdn.microsoft.com/library/en-us/csref/html/vcrefthedelegatetype.asp',
		/* Only types are listed...
		'abstract' => 'http://msdn.microsoft.com/library/en-us/csref/html/vclrfabstract.asp';
		'as' => 'http://msdn.microsoft.com/library/en-us/csref/html/vclrfas.asp';
		'base' => 'http://msdn.microsoft.com/library/en-us/csref/html/vclrfbasepg.asp';
		'bool' => 'http://msdn.microsoft.com/library/en-us/csref/html/vcrefthebooltype.asp';
		'break'	=> 'http://msdn.microsoft.com/library/en-us/csref/html/vclrfthebreakstatement.asp';
		*/
		);

	// Switch on fname; return the URL needed
	if (isset($urls[$fname])) {
		return $urls[$fname];
	} else {
		// We have no match, so just return a search URL.
		return 'http://search.msdn.microsoft.com/search/default.aspx?siteId=0&tab=0&query=' . urlencode($fname);
	}
}
/**#@-*/
?>
