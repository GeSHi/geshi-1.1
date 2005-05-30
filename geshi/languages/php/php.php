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
 * @author    Nigel McNie <oracle.shinoda@gmail.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright (C) 2005 Nigel McNie
 * @version   $Id$
 *
 */

/** Get the GeSHiCodeContext class */ 
require_once GESHI_CLASSES_ROOT . 'class.geshicodecontext.php';

/**
 * PHP Language file for GeSHi
 */ 
$this->_humanLanguageName = 'PHP';
$this->_rootContext =& new GeSHiCodeContext('html/html', '', array());
$this->_rootContext->addInfectiousContext(new GeSHiCodeContext('php'));

?>
