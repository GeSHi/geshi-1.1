<?php
/**
 * GeSHi - Generic Syntax Highlighter
 * <pre>
 *   File:   geshi/classes/renderers/class.geshirendererxml.php
 *   Author: Michael Maclean
 *   E-mail: mgdm@php.net
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
 * @author     Michael Maclean <mgdm@php.net>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright  (C) 2009 Michael Maclean
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
class GeSHiRendererPango extends GeSHiRenderer
{

    private static function _colorToCSSColor($color)
    {
        $a = unpack('H*',
            chr(round($color['R'] * 255)) .
            chr(round($color['G'] * 255)) .
            chr(round($color['B'] * 255))
            );
        return '#' . $a[1];
    }

    private static function _styleToAttributes($style) {
        //Add the color
        $attributes = 'color="' . self::_colorToCSSColor($style['font']['color']) . '" ';

        //Add font styles
        if ($style['font']['style']['bold']) {
            $attributes .= 'font-weight="bold" ';
        }
        if ($style['font']['style']['italic']) {
            $attributes .= 'font_style="italic" ';
        }
        if ($style['font']['style']['underline']) {
            $attributes .= 'underline="single" ';
        }

        return $attributes;
    }

    // {{{ parseToken()

    /**
     * Implements parseToken to format the XML tags.
     *
     * @param string $token         The token to put tags around
     * @param string $context_name  The name of the context that the tag is in
     * @param array  $data          Miscellaneous data about the context
     * @return string               The token wrapped in Pango markup
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

        $style = $this->_styler->getStyle($context_name);

        // Add the basic tag
        $result .= '<span ';

        $result .= self::_styleToAttributes($style);

        // Finish the opening tag
        $result .= '>';

        // Now add in the token
        $result .= GeSHi::hsc($token);

        // Add the closing tag
        $result .= '</span>';

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
        return '';
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
        return '';
    }

    // }}}

}

?>
