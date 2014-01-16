<?php
/**
 * GeSHi - Generic Syntax Highlighter
 * <pre>
 *   File:   geshi/classes/class.geshicodecontext.php
 *   Author: Nigel McNie
 *   E-mail: nigel@geshi.org
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
 * @subpackage core
 * @author     Nigel McNie <nigel@geshi.org>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright  (C) 2004 - 2006 Nigel McNie
 * @version    $Id$
 *
 */

/**
 * The GeSHiStyler class
 *
 * @package    geshi
 * @subpackage core
 * @author     Nigel McNie <nigel@geshi.org>
 * @since      1.1.0
 * @version    $Revision$
 */
class GeSHiStyler
{

    // {{{ properties

    /**
     * @var string
     */
    private $charset;

    /**
     * Array of themes to attempt to use for highlighting, in
     * preference order
     *
     * @var array
     */
    private $themes = array('default');

    /**
     * @var string
     * Note: only set once language name is determined to be valid
     */
    private $language = '';

    /**
     * @var boolean
     */
    private $reloadThemeData = true;

    /**#@+
     * @access private
     */
    /**
     * @var array
     */
    private $_styleData = array();

    /**
     * @var array
     */
    private $_wildcardStyleData = array();

    /**
     * @var array
     */
    private $_contextCacheData = array();

    /**
     * @var GeSHiCodeParser
     */
    private $_codeParser = null;

    /**
     * @var GeSHiRenderer
     */
    private $_renderer = null;

    /**
     * @var string
     */
    private $_parsedCode = '';

    /**#@-*/

    // }}}
    // {{{ setLanguage()

    /**
     * Sets the language of this styler.
     */
    function setLanguage ($language_name)
    {
        $this->language = $language_name;
    }

    // }}}
    // {{{ setStyle()

    /**
     * Sets the style of a specific context. Language name is prefixed,
     * to make theme files shorter and easier
     */
    function setStyle ($context_name, $style, $start_name = 'start', $end_name = 'end')
    {
        geshi_dbg('GeSHiStyler::setStyle(' . $context_name . ', ' . $style . ')');
        if ($context_name) {
            $context_name = "/$context_name";
        }
        $this->setRawStyle($this->language . $context_name, $style);
    }

    // }}}
    // {{{ setRawStyle()

    /**
     * Sets styles with explicit control over style name
     */
    function setRawStyle ($context_name, $style)
    {
        $style = GeSHiStyler::_parseCSS($style);

        if (substr($context_name, -1) != '*') {
            $this->_styleData[$context_name] = $style;
        } else {
            $this->_wildcardStyleData[substr($context_name, 0, -2)] = $style;
        }
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
        geshi_dbg('  removed style data for ' . $context_name);
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
            $this->_styleData[$context_name] = $this->getStyle(substr($context_name, 0, -4));
            return $this->_styleData[$context_name];
        }
        if ('/start' == substr($context_name, -6)) {
            $this->_styleData[$context_name] = $this->getStyle(substr($context_name, 0, -6));
            return $this->_styleData[$context_name];
        }

        // Check for a one-level wildcard match
        $wildcard_idx = substr($context_name, 0, strrpos($context_name, '/'));
        if (isset($this->_wildcardStyleData[$wildcard_idx])) {
            $this->_styleData[$context_name] = $this->_wildcardStyleData[$wildcard_idx];
            return $this->_wildcardStyleData[$wildcard_idx];
        }

        // Maybe a deeper match?
        foreach ($this->_wildcardStyleData as $context => $style) {
            if (substr($context_name, 0, strlen($context)) == $context) {
                $this->_styleData[$context_name] = $style;
                return $style;
            }
        }

        //@todo [blocking 1.1.5] Make the default style for otherwise unstyled elements configurable
        $this->_styleData[$context_name] = GeSHiStyler::_parseCSS('color:#000;');
        return $this->_styleData[$context_name];
    }

    // }}}
    // {{{ loadStyles()

    function loadStyles ($language = '', $load_theme = false)
    {
        if (!$language) {
            $language = $this->language;
        }
        geshi_dbg('GeSHiStyler::loadStyles(' . $language . ')');
        if ($this->reloadThemeData) {
            geshi_dbg('  Loading theme data');
            // Trash old data
            if ($load_theme) {
                geshi_dbg('  Old data trashed');
                $this->_styleData = array();
            }

            // Lie for a short while, to get extra style names to behave
            $tmp = $this->language;
            $this->language = $language;
            foreach ($this->themes as $theme) {
                $theme_file = GESHI_THEMES_ROOT . $theme . GESHI_DIR_SEP . $language . '.php';
                if (is_readable($theme_file)) {
                    require $theme_file;
                    break;
                }
            }

            if ($load_theme) {
                $this->reloadThemeData = false;
            }
            $this->language = $tmp;
        }
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
            /** Get the GeSHiCodeParser class */
            require_once GESHI_CLASSES_ROOT . 'class.geshicodeparser.php';
            /** Get the default code parser class */
            require_once GESHI_CLASSES_ROOT . 'class.geshidefaultcodeparser.php';
            $this->_codeParser = new GeSHiDefaultCodeParser($this, $this->language);
        }

        // It the user did not explicitly set a renderer with GeSHi::accept(), then
        // use the default renderer (HTML)
        if (is_null($this->_renderer)) {
            /** Get the GeSHiRenderer class */
            require_once GESHI_CLASSES_ROOT . 'class.geshirenderer.php';
            /** Get the renderer class */
            require_once GESHI_RENDERERS_ROOT . 'class.geshirendererhtml.php';
            $this->_renderer = new GeSHiRendererHTML;
        }

        //Allow the code renderer to preprocess the code
        $this->_renderer->renderPreview();

        // Load theme data now
        $this->loadStyles('', true);
    }

    // }}}
    // {{{ setCodeParser()

    /**
     * Sets the code parser that will be used. This is used by language
     * files in the geshi/languages directory to set their code parser
     *
     * @param GeSHiCodeParser The code parser to use
     */
    function setCodeParser (GeSHiCodeParser $codeparser)
    {
        $this->_codeParser = $codeparser;
    }

    // }}}
    // {{{ setRenderer()

    /**
     * Sets the renderer that will be used.
     *
     * @param GeSHiRenderer $renderer The renderer to use
     */
    function setRenderer (GeSHiRenderer $renderer)
    {
        $this->_renderer = $renderer;
    }

    // }}}
    // {{{ useThemes()

    /**
     * Sets the themes to use
     */
    function useThemes (array $themes)
    {
        $this->themes = array_merge($themes, $this->themes);
        $this->themes = array_unique($this->themes);
        // Could check here: get first element of orig. $this->themes, if different now then reload
        $this->reloadThemeData = true;
    }

    // }}}
    // {{{ addParseData()

    /**
     * Recieves parse data from the context tree. Sends the
     * data on to the code parser, then to the renderer for
     * building the result string
     */
    function addParseData ($code, $context_name, array $data = array(), $complex = false)
    {
        // @todo [blocking 1.1.5] test this, esp. not passing back anything and passing back multiple
        // can use PHP code parser for this
        // @todo [blocking 1.1.9] since we are only looking for whitespace at start and end this can
        // be optimised
        if (GESHI_COMPLEX_NO == $complex) {
            $this->_addToParsedCode(array($code, $context_name, $data));
        } elseif (GESHI_COMPLEX_PASSALL == $complex) {
            // Parse all at once
            $this->_addToParsedCode($this->_codeParser->parseToken($code, $context_name, $data));
        } elseif (GESHI_COMPLEX_TOKENISE == $complex) {
            $matches = array();
            preg_match_all('/^(\s*)(.*?)(\s*)$/si', $code, $matches);
            //echo 'START<br />';
            //print_r($matches);
            if ($matches[1][0]) {
                $this->_addToParsedCode($this->_codeParser->parseToken($matches[1][0],
                    $context_name, $data));
            }
            if ('' != $matches[2][0]) {
                while ('' != $matches[2][0]) {
                    $pos = geshi_get_position($matches[2][0], 'REGEX#(\s+)#');
                    if (false !== $pos['pos']) {
                        // Parse the token up to the whitespace
                        //echo 'code: |' . substr($matches[2][0], 0, $pos['pos']) . '|<br />';
                        $this->_addToParsedCode(
                            $this->_codeParser->parseToken(substr($matches[2][0], 0, $pos['pos']),
                            $context_name, $data)
                        );
                        // Parse the whitespace
                        //echo 'ws: |' . substr($matches[2][0], $pos['pos'], $pos['len']) . '|<br />';
                        $this->_addToParsedCode(
                            $this->_codeParser->parseToken(substr($matches[2][0], $pos['pos'], $pos['len']),
                            $context_name, $data)
                        );
                        // Trim what we just parsed
                        $matches[2][0] = substr($matches[2][0], $pos['pos'] + $pos['len']);
                    } else {
                        // No more whitespace
                        //echo 'no more whitespace: |' . $matches[2][0] . '<br />';
                        $this->_addToParsedCode($this->_codeParser->parseToken($matches[2][0],
                            $context_name, $data));
                        break;
                    }
                }
            }
            if ($matches[3][0]) {
                $this->_addToParsedCode($this->_codeParser->parseToken($matches[3][0],
                    $context_name, $data));
            }
        } // else wtf???
    }

    // }}}
    // {{{ _addToParsedCode()

    /**
     * Adds data from the renderer to the parsed code
     */
    function _addToParsedCode (array $data)
    {
        //todo: Rework parser so this function always gets an array of tokens
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

    function addParseDataStart ($code, $context_name, $start_name = 'start', $complex = false)
    {
    	$this->addParseData($code, "$context_name/$start_name", array(), $complex);
    }

    // }}}
    // {{{ addParseDataEnd()

    function addParseDataEnd ($code, $context_name, $end_name = 'end', $complex = false)
    {
    	$this->addParseData($code, "$context_name/$end_name", array(), $complex);
    }

    // }}}
    // {{{ getParsedCode()

    function getParsedCode ()
    {
        // Flush the last of the code
        $this->_addToParsedCode($this->_codeParser->flush());

        //Allow the code renderer to postprocess the code
        $this->_renderer->renderPostview();

        $result = $this->_renderer->getHeader() . $this->_parsedCode . $this->_renderer->getFooter();
        $this->_parsedCode = '';
        return $result;
    }

    // }}}
    // {{{ getRendererOption()

    /**
     * Retrieves renderer specific data controlling
     * how the renderer outputs source
     *
     * @abstract
     * @param string The name of the Renderer specific option to retrieve
     * @param mixed The default value for this property
     */
    function getRendererOption ($name, $default) {}

    // }}}
    // {{{ setRendererOption()

    /**
     * Sets up renderer specific data controlling
     * how the renderer works
     *
     * @abstract
     * @param string The name of the Renderer specific option to modify
     * @param mixed The new value for the renderer specific value of the option to modify
     */
    function setRendererOption ($name, $value) {}

    // }}}
    // {{{ _parseCSS

    /**
     * Parse a CSS string into our internal data format
     *
     * @param mixed The input format information to convert
     * @return array
     */
    function _parseCSS ($style) {
        $result = array(
            "font" => array(
                "color" => false,       //false means renderers should use the default
                "style" => array(
                    "bold" => false,    //Bold font
                    "italic" => false,  //Italic / Emphasized font
                    "underline" => 0,   //Boolean interpretation allowed
                    "strike" => false   //Strike out text, optional
                    ),
                "special" => array(     //Optional, additional font settings
                    "rotate" => 0
                    )
                ),
            "border" => array(
                "l" => false,           //The left border, see comment below
                "r" => false,           //The right border, see comment below
                "t" => false,           //The top border, see comment below
                "b" => false            //The bottom border, see comment below
                /*
                 * If a border is present it contains a color attribute (as for font)
                 * and a style attribute telling the kind of line to use.
                 * Additional attributes like padding and margins can be supplied.
                 */
                ),
            "back" => array(
                "color" => array(
                    "R" => 1.0,         //Red channel
                    "G" => 1.0,         //Green channel
                    "B" => 1.0,         //Blue channel
                    "A" => 0.0          //Opacity, default to transparent
                    /*
                     * Renderers with optional background color support should
                     * check opacity to know if they need to render it or not.
                     * If BG is mandatory and opacity is 0.0, the renderer
                     * should use the default instead.
                     */
                    )
                )
            );

        if(is_array($style)) {
            return GeSHiStyler::array_merge_recursive_unique($style, $result);
        }

        //No array, so we have to parse CSS ...

        //First of the color:
        if(preg_match('/\b(?<!-)color\s*:\s*(#(?i:[\da-f]{3}(?:[\da-f]{3})?)|(?i:rgba?)\([^\);]+\)|\w+)/', $style, $match)) {
            //We got a text color, let's analyze it:
            $color = GeSHiStyler::_parseColor($match[1]);
            if($color) {
                $result['font']['color'] = $color;
            }
        }

        if(preg_match('/\b(?<!-)background(?:-color)?\s*:\s*(#(?i:[\da-f]{3}(?:[\da-f]{3})?)|(?i:rgba?)\([^\);]+\)|\w+)/', $style, $match)) {
            //We got a background color, let's analyze it:
            $color = GeSHiStyler::_parseColor($match[1]);
            if($color) {
                $result['back']['color'] = $color;
            }
        }

        if(preg_match('/\b(?<!-)font-style\s*:\s*(\w+)/', $style, $match)) {
            //We got an italics setting
            $result['font']['style']['italic'] = 'italic' == strtolower($match[1]);
        }

        if(preg_match('/\b(?<!-)font-weight\s*:\s*(\w+)/', $style, $match)) {
            //We got a bold setting
            $result['font']['style']['bold'] = 'bold' == strtolower($match[1]);
        }

        if(preg_match('/\b(?<!-)text-decoration\s*:\s*(\w+)/', $style, $match)) {
            //We got an underline setting
            $result['font']['style']['underline'] = 'underline' == strtolower($match[1]);
        }

        return $result;
    }

    // }}}

    private static function array_merge_recursive_unique()
    {
        $arrays = func_get_args();
        $remains = $arrays;

        // We walk through each arrays and put value in the results (without
        // considering previous value).
        $result = array();

        // loop available array
        foreach($arrays as $array) {

            // The first remaining array is $array. We are processing it. So
            // we remove it from remaing arrays.
            array_shift($remains);

            // We don't care non array param, like array_merge since PHP 5.0.
            if(is_array($array)) {
                // Loop values
                foreach($array as $key => $value) {
                    if(is_array($value)) {
                        // we gather all remaining arrays that have such key available
                        $args = array();
                        foreach($remains as $remain) {
                            if(array_key_exists($key, $remain)) {
                                array_push($args, $remain[$key]);
                            }
                        }

                        if(count($args) > 2) {
                            // put the recursion
                            $result[$key] = call_user_func_array(array(__CLASS__, __FUNCTION__), $args);
                        } else {
                            foreach($value as $vkey => $vval) {
                                $result[$key][$vkey] = $vval;
                            }
                        }
                    } else {
                        // simply put the value
                        $result[$key] = $value;
                    }
                }
            }
        }

        return $result;
    }

    /**
     * Parses the input string as a CSS color, returning an array in the
     * internal RGBA format, or false in case of parse error.
     *
     * @param string $color
     * @return array|false
     */
    private static function _parseColor($color)
    {
        if('' == $color) {
            return false;
        }

        if('#' == $color[0]) {

            $result = array();

            if(4 == strlen($color)) {
                $result['R'] = intval($color[1], 16) / 15.0;
                $result['G'] = intval($color[2], 16) / 15.0;
                $result['B'] = intval($color[3], 16) / 15.0;
            } else {
                $result['R'] = intval($color[1].$color[2], 16) / 255.0;
                $result['G'] = intval($color[3].$color[4], 16) / 255.0;
                $result['B'] = intval($color[5].$color[6], 16) / 255.0;
            }
            $result['A'] = 1.0;

            return $result;
        }

        $color = strtolower($color);

        static $htmlColors = array(
            "black" =>      array("R"=>0.0, "G"=>0.0, "B"=>0.0, "A"=>1.0),
            "white" =>      array("R"=>1.0, "G"=>1.0, "B"=>1.0, "A"=>1.0),

            "red" =>        array("R"=>1.0, "G"=>0.0, "B"=>0.0, "A"=>1.0),
            "yellow" =>     array("R"=>1.0, "G"=>1.0, "B"=>0.0, "A"=>1.0),
            "lime" =>       array("R"=>0.0, "G"=>1.0, "B"=>0.0, "A"=>1.0),
            "cyan" =>       array("R"=>0.0, "G"=>1.0, "B"=>1.0, "A"=>1.0),
            "blue" =>       array("R"=>0.0, "G"=>0.0, "B"=>1.0, "A"=>1.0),
            "magenta" =>    array("R"=>1.0, "G"=>0.0, "B"=>1.0, "A"=>1.0),

            "darkgrey" =>   array("R"=>0.4, "G"=>0.4, "B"=>0.4, "A"=>1.0),
            "lightgrey" =>  array("R"=>0.8, "G"=>0.8, "B"=>0.8, "A"=>1.0),

            // This is actually a keyword in CSS but works the same in CSS3
            "transparent" =>array("R"=>0.0, "G"=>0.0, "B"=>0.0, "A"=>0.0),

            );

        if(isset($htmlColors[$color])) {
            return $htmlColors[$color];
        }

        /*
         * The _parseCSS parser for rgb()/rgba() colors is quite elementary,
         * to avoid cluttering the RE too much. This code deals with parsing
         * it properly, and returns false when invalid.
         */
        if(substr($color, 0, 5) == 'rgba(' || substr($color, 0, 4) == 'rgb(') {
            $has_alpha = $color[3] == 'a' ? 1 : 0;

            //Remove leading rgb( or rgba( and trailing ), split params
            $colors = explode(',', substr($color, 4 + $has_alpha, -1));

            //Validate arg count (needs to be 3 for rgb, 4 for rgba)
            if(count($colors) != 3 + $has_alpha) {
                return false;
            }

            //This array maps parameter positions to channel names
            static $idx_to_color = array('R', 'G', 'B', 'A');

            //Default alpha is 1, if not overriden
            $result = array();

            foreach($colors as $key => $value) {
                //Lexical analysis of each number
                if(!preg_match('/^\s*([-+]?(?:[0-9]+|[0-9]*\.[0-9]+))(%?)\s*$/', $value, $match)) {
                    return false;
                }

                $value = 0.0 + $match[1]; //transform to float
                $value /= $match[2] ? 100.0 : 255.0; //if % symbol present, use 100, otherwise 255
                $value = max(0.0, min(1.0, $value)); //clip to 0..1 as per CSS spec
                $result[$idx_to_color[$key]] = $value;
            }
            if(!$has_alpha)
                $result['A'] = 1.0;

            return $result;
        }

        //Not #rrggbb, color name, rgb(), rgba() - return parse error
        return false;

    }
}

?>