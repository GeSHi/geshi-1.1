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

/** Get the GeSHiRenderer class */
require_once GESHI_CLASSES_ROOT . 'class.geshirenderer.php';

/**
 * The GeSHiRendererHTML class
 * 
 * @package core
 * @author  Nigel McNie <nigel@geshi.org>
 * @since   1.1.1
 * @version $Revision$
 */
class GeSHiRendererHTML extends GeSHiRenderer {
    
    /**
     * Implements parseToken to put HTML tags around
     * the tokens
     */
    function parseToken ($token, $context_name, $data)
    {
        // ignore blank tokens
        if ('' == $token || is_whitespace($token)) {
            return $token;
        }
        //echo $context_name; exit;
        $result = '';
        if (isset($data['url'])) {
            $result .= '<a href="' . $data['url'] . '">';
        }
        $result .= '<span style="' . $this->_styler->getStyle($context_name) . '" ';
        $result .= 'title="' . $context_name . '">' . htmlspecialchars($token) . '</span>';
        if (isset($data['url'])) {
            // there's a URL associated with this token
            $result .= '</a>';
        }
        return $result;
    }
    
    /**
     * Boring preset header at this time
     */
    function getHeader ()
    {
        return '<pre style="background-color:#ffc;border:1px solid #cc9;">';
    }
    
    /**
     * And preset footer
     */
    function getFooter ()
    {
        return '</pre>';
    }
}

?>
