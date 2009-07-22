<?php
/**
 * GeSHi - Generic Syntax Highlighter
 */

//Console_Color package from PEAR
require_once 'Console/Color.php';

/**
 * The GeSHiRendererANSI class.
 * Highlights code by generating appropriate
 * ANSI terminal codes.
 *
 * @package    geshi
 * @subpackage renderer
 * @author     Christian Weiske <cweiske@php.net>
 * @since      1.1.1
 * @version    $Revision: 910 $
 * @see        GeSHiRenderer
 */
class GeSHiRendererANSI extends GeSHiRenderer
{
    /**
     * Color name to rgb value mapping
     *
     * @var array
     */
    static $colors = array(
        'black'   => array(0, 0, 0),
        'red'     => array(255, 0, 0),
        'green'   => array(0, 255, 0),
        'yellow'  => array(255, 255, 0),
        'blue'    => array(0, 0, 255),
        'magenta' => array(255, 0, 255),
        'purple'  => array(160, 32, 240),
        'cyan'    => array(0, 255, 255),
        'white'   => array(255, 255, 255)
    );

    /**
     * Cache for rgb to color name mappings.
     * Key is $r<<16 + $g<<8 + $b, value the color name.
     *
     * @var array
     */
    protected $colorCache = array();

    /**
     * Cache mapping geshi context names to ansi color codes.
     *
     * @var array
     */
    protected $ansiCache = array();

    /**
     * Ansi reset code (%n)
     *
     * @var string
     */
    protected $resetCode = '';

    /**
     * Ansi color names to Console_Color value mapping.
     *
     * normal, bold, background
     *
     * @var array
     */
    static $ansi = array(
        'black'   => array('%k', '%K', '%0'),
        'red'     => array('%r', '%R', '%1'),
        'green'   => array('%g', '%G', '%2'),
        'yellow'  => array('%y', '%Y', '%3'),
        'blue'    => array('%b', '%B', '%4'),
        'magenta' => array('%m', '%M', '%5'),
        'purple'  => array('%p', '%P', ''),
        'cyan'    => array('%c', '%C', '%6'),
        'white'   => array('%w', '%W', '%7'),
        ''        => array('', '', '')
    );



    public function __construct()
    {
        parent::__construct();
        $this->resetCode = Console_Color::convert('%n');
    }



    /**
     * Returns the color name from the given rgb values.
     *
     * @param integer $r Red value, 0-255
     * @param integer $g Green value, 0-255
     * @param integer $b Blue value, 0-255
     *
     * @return string Color name. NULL if no color found.
     */
    protected function getColorName($r, $g, $b)
    {
        $col = $r<<16 + $g<<8 + $b;
        if (isset($this->colorCache[$col])) {
            return $this->colorCache[$col];
        }

        $found = false;
        for ($bits = 4; $bits <= 7; $bits++) {
            foreach (self::$colors as $name => $arColor) {
                list($cr, $cg, $cb) = $arColor;
                if ($r >> $bits == $cr >> $bits
                    && $g >> $bits == $cg >> $bits
                    && $b >> $bits == $cb >> $bits
                ) {
                    $found = true;
                    break;
                }
            }
        }
        if (!$found) {
            echo "color name not found from ($r,$g,$b)\n";
            $name = null;
        }
        $this->colorCache[$col] = $name;
        return $name;
    }

    /**
     * Calculates the ANSI code from the given context name
     *
     * @param string $context_name Name of context, from parseToken
     *
     * @return string ANSI color code to output, null if no color shall be used.
     */
    protected function getAnsiCode($context_name)
    {
        if (isset($this->ansiCache[$context_name])) {
            return $this->ansiCache[$context_name];
        }

        $style   = $this->_styler->getStyle($context_name);
        $color   = $style['font']['color'];
        $bold    = $style['font']['style']['bold'];

        $colorname = $this->getColorName(
	    255*$color['R'], 255*$color['G'], 255*$color['B']
        );

        if ($colorname === 'black') {
            return null;
        }

        $index    = 0 + (int)$bold;
        $ansicode = Console_Color::convert(self::$ansi[$colorname][$index]);

        $this->ansiCache[$context_name] = $ansicode;
        return $ansicode;
    }

    // {{{ parseToken()

    /**
     * Implements parseToken to put ANSI codes around the tokens
     *
     * @param string $token        The token to highlight
     * @param string $context_name The name of the context that the tag is in
     * @param array  $data         Miscellaneous data about the context
     *
     * @return string The token wrapped in ANSI codes
     */
    public function parseToken($token, $context_name, $data)
    {
        // ignore blank tokens
        if ('' == $token || geshi_is_whitespace($token)) {
            return $token;
        }

        $code = $this->getAnsiCode($context_name);
        if ($code !== null) {
            return $code . $token . $this->resetCode;
        } else {
            return $token;
        }
    }

    // }}}
    // {{{ getHeader()

    /**
     * Returns the header for the code. Currently just a boring preset.
     *
     * @return string
     */
    public function getHeader()
    {
        return '';
    }

    // }}}
    // {{{ getFooter()

    /**
     * Returns the footer for the code. Currently just a boring preset.
     *
     * @return string
     */
    public function getFooter()
    {
        return '';
    }

    // }}}

}

?>
