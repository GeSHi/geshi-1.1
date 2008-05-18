<?php
/**
 * GeSHi - Generic Syntax Highlighter
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * You can view a copy of the GNU GPL in the LICENSE file that comes
 * with GeSHi, in the docs/ directory.
 *
 * @package   lang
 * @author    Nigel McNie <nigel@geshi.org>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright (C) 2005 Nigel McNie
 * @version   $Id$
 * 
 */

class GeSHiCSSInlineMediaContext extends GeSHiContext
{
    /**
     * Overrides {@link GeSHiContext::_addParseDataStart()} to
     * highlight the start of the inline media context correctly
     */
    function _addParseDataStart ($code)
    {
        $this->_styler->addParseData('@media', $this->_styleName . '/starter');
        $this->_styler->addParseDataStart(substr($code, 6), $this->_styleName);
    }
}

?>
