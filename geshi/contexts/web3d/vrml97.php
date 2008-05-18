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
 * @package   lang
 * @author    Nigel McNie <nigel@geshi.org>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright (C) 2005 Nigel McNie
 * @version   1.1.0alpha4
 * 
 */

$this->_contextDelimiters = array();

$this->_childContexts = array(
    new GeSHiContext('web3d', $DIALECT, 'comment'),
    new GeSHiContext('web3d',  $DIALECT, 'string')
);

$this->_contextKeywords = array(
        0 => array(
            // nodes
            0 => array(
            	// sensors
                'CylinderSensor', 'PlaneSensor', 'ProximitySensor', 'SphereSensor',  
                'TimeSensor', 'TouchSensor', 'VisibilitySensor',
                // interpolators 
                'ColorInterpolator', 'CoordinateInterpolator', 'NormalInterpolator',
                'OrientationInterpolator', 'PositionInterpolator', 'ScalarInterpolator',
                // grouping nodes
                'Anchor', 'Billboard', 'Collision', 'Group', 'LOD', 'Switch', 'Transform',
                // bindables
                'Background', 'Fog', 'NavigationInfo', 'Viewpoint',
                // lights
                'DirectionalLight', 'PointLight', 'SpotLight',
                // shape and geometry 
                'Box', 'Cone', 'Coordinate', 'Cylinder', 'ElevationGrid', 'Extrusion',
                'IndexedFaceSet', 'IndexedLineSet', 'PointSet', 'Shape', 'Sphere', 'Text', 
                // appearance 
                'Appearance', 'Color', 'FontStyle', 'Material', 
                'Normal', 'TextureCoordinate', 'TextureTransform',
                // textures 
                'ImageTexture', 'MovieTexture', 'PixelTexture', 
                // sound
                'AudioClip', 'Sound', 
                // other
                'Inline', 'Script', 'WorldInfo'
                ),
            // name
            1 => $CONTEXT . '/node',
            // style
            2 => 'color:#b1b100;',
            // case sensitive
            3 => true,
            // url
            4 => 'http://www.web3d.org/x3d/specifications/vrml/ISO-IEC-14772-IS-VRML97WithAmendment1/part1/nodesRef.html#{FNAME}'
            ),
        1 => array(
        	// fields of nodes
            0 => array(
            	// A
            	'addChildren', 'ambientIntensity', 'appearance', 'attenuation', 'autoOffset', 
            	'avatarSize', 'axisOfRotation',
            	// B 
            	'backUrl', 'bboxCenter', 'bboxSize', 'beamWidth', 'beginCap', 
            	'bindTime', 'bottom', 'bottomRadius', 'bottomUrl',
            	// C
            	'ccw', 'center', 'children', 'choice', 'collide', 
            	'collideTime', 'color', 'colorIndex', 'colorPerVertex', 'convex', 
            	'coord', 'coordIndex', 'creaseAngle', 'crossSection', 'cutOffAngle', 
            	'cycleInterval', 'cycleTime', 
            	// D
            	'description', 'diffuseColor', 'direction', 'directOutput', 
            	'diskAngle', 'duration_changed', 
            	// E
            	'emissiveColor', 'enabled', 'endCap', 'enterTime', 'exitTime', 
            	// F
            	'family', 'fieldOfView', 'fogType', 'fontStyle', 'fraction_changed', 
            	'frontUrl', 
            	// G
            	'geometry', 'groundAngle', 'groundColor',
            	// H 
            	'headlight', 'height', 'hitNormal_changed', 'hitPoint_changed', 'horizontal',
            	// I
            	'image', 'info', 'intensity', 'isActive', 'isBound', 'isOver',
            	// J
            	'jump', 'justify', 
            	// K
            	'key', 'keyValue', 
            	// L  
            	'language', 'leftUrl', 'leftToRight','length', 'level', 
            	'location', 'loop', 
            	// M
            	'material', 'maxAngle', 'maxBack', 'maxExtent', 'maxFront', 
            	'maxPosition', 'minAngle', 'minBack', 'minFront', 'minPosition', 
            	'mustEvaluate', 
            	// N
            	'normal', 'normalIndex', 'normalPerVertex', 
            	// O
            	'offset', 'on', 'orientation', 'orientation_changed', 
            	// P
            	'parameter', 'pitch', 'point', 'position', 'position_changed', 
            	'priority', 'proxy', 
            	// Q
            	
            	// R
            	'radius', 'range', 'removeChildren', 'repeatS', 'repeatT', 
            	'rightUrl', 'rotation', 'rotation_changed',
            	// S
            	'scale', 'scaleOrientation', 'set_bind', 'set_colorIndex', 'set_coordIndex', 
            	'set_crossSection', 'set_fraction', 'set_height', 'set_normalIndex', 'set_orientation', 
            	'set_spine', 'set_scale', 'set_texCoordIndex', 'shininess', 'side', 
            	'size', 'skyAngle', 'skyColor', 'solid', 'source', 
            	'spacing', 'spatialization', 'specularColor', 'speed', 'spine', 
            	'startTime', 'stopTime', 'string', 'style', 
            	// T
            	'texCoord', 'texCoordIndex', 'texture', 'textureTransform', 'time', 
            	'title', 'top', 'topUrl', 'topToBottom', 'touchTime', 
            	'trackPoint_changed', 'translation', 'translation_changed', 'transparency', 'type',
            	// U
            	'url', 
            	// V
            	'value_changed', 'vector', 'visibilityLimit', 'visibilityRange', 
            	// W
            	'whichChoice', 
            	// X
            	'xDimension', 'xSpacing', 
            	// Y
            	
            	// Z
            	'zDimension', 'zSpacing' 
                ),
            1 => $CONTEXT . '/field',
            2 => 'font-weight:bold;color:red;',
            3 => true,
            4 => ''
            ),
        2 => array(
            // keywords
        	0 => array(
            	'DEF', 'USE', 'IS', 'PROTO', 'EXTERNPROTO', 'TO', 'ROUTE',
            	'TRUE', 'FALSE', 'NULL',
                ),
            1 => $CONTEXT . '/keyword',
            2 => 'font-weight:bold;color:blue;',
            3 => true,
            4 => ''
            ),
        3 => array(
            // field access types
        	0 => array(
            	'eventIn', 'eventOut', 'exposedField', 'field', 
                ),
            1 => $CONTEXT . '/fieldaccess',
            2 => 'font-weight:bold;color:purple;',
            3 => true,
            4 => ''
			),
        4 => array(
        	// field data types 
            0 => array(
            	'SFBool', 'SFColor', 'SFFloat', 'SFImage', 'SFInt32', 'SFNode',
            	'SFRotation', 'SFString', 'SFTime', 'SFVec2f', 'SFVec3f',
            	'MFColor', 'MFFloat', 'MFInt32', 'MFNode',
            	'MFRotation', 'MFString', 'MFTime', 'MFVec2f', 'MFVec3f',
                ),
            1 => $CONTEXT . '/fieldtype',
            2 => 'color:green;',
            3 => true,
            4 => ''
			)
);

$this->_contextSymbols  = array(
    0 => array(
        0 => array(
            '{', '}'
            ),
        1 => $CONTEXT . '/nodesymbol',
        2 => 'color:#008000;'
    ),
    1 => array(
        0 => array(
            '[', ']'
            ),
        1 => $CONTEXT . '/arraysymbol',
        2 => 'color:#008000;'
    )
);

$this->_contextRegexps = array(
    0 => geshi_use_doubles($CONTEXT),
    1 => geshi_use_integers($CONTEXT)
);

?>