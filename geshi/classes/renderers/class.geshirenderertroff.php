<?php
/**
 * GeSHi - Generic Syntax Highlighter
 */


/**
 * The GeSHiRendererTroff class.
 * Highlights code by generating troff (manpage) output.
 *
 * Maps all colors to the known 10 shell colors, and supports bold font style.
 *
 * @package    geshi
 * @subpackage renderer
 * @author     Christian Weiske <cweiske@php.net>
 * @since      1.1.1
 * @version    $Revision: 910 $
 * @see        GeSHiRenderer
 */
class GeSHiRendererTroff extends GeSHiRenderer
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
     * Returns the color name from the given rgb values.
     *
     * @param integer $r Red value, 0-255
     * @param integer $g Green value, 0-255
     * @param integer $b Blue value, 0-255
     *
     * @return string Color name. Empty if no color found.
     */
    protected function getColorName($r, $g, $b)
    {
        $col = $r<<16 + $g<<8 + $b;
        if (isset($this->colorCache[$col])) {
            return $this->colorCache[$col];
        }

        $found = false;
        for ($bits = 3; $bits <= 7; $bits++) {
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
            $name = '';
        }
        $this->colorCache[$col] = $name;
        return $name;
    }

    /**
     * Calculates the color name from the given context name
     *
     * @param string $context_name Name of context, from parseToken
     *
     * @return array array(Color name to output, boolean bold flag)
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
            $color['R']*255, $color['G']*255, $color['B']*255
        );

        $this->ansiCache[$context_name] = array($colorname, $bold);
        return $this->ansiCache[$context_name];
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
            $num = ord(strpos($token, -1));
            if ($num == 10) {
                return $token;
            }
            return $token . "\\c\n";
        }
        
        list($color, $bold) = $this->getAnsiCode($context_name);
        $text  = str_replace('\\', '\\e', $token);

        $prefix = '';
        if ($bold) {
            $prefix .= '.B ';
        } else if ($token{0} == '.' || $token{0} == '\'') {
            //zero-width space
            $prefix .= '\\&';
        }

        if ($color == 'black') {
            $retval = $prefix . $text . "\\c\n";
        } else {
            $retval = '.gcolor ' . $color . "\n"
                . $prefix . $text . "\\c\n"
                . ".gcolor\n";
        }

        return $retval;
    }

    // }}}
    // {{{ getHeader()
    
    /**
     * Returns the header for the code. Starts no-fill mode.
     * To get a working man page, you should at least add:
     * .TH My man page title
     * .SH EXAMPLE
     *
     * @return string
     */
    public function getHeader()
    {
        return "\n.nf\n";
    }

    // }}}
    // {{{ getFooter()

    /**
     * Returns the footer for the code. Ends no-fill mode.
     *
     * @return string
     */
    public function getFooter()
    {
        return "\n.fi\n";
    }

    // }}}

}

?>
