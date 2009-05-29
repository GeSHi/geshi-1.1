<?php
/**
 * GeSHi - Generic Syntax Highlighter
 */

/**
 * The GeSHiRendererDebug class.
 * Outputs format codes; useful for debugging
 *
 * @package    geshi
 * @subpackage renderer
 * @author     Christian Weiske <cweiske@php.net>
 * @since      1.1.1
 * @version    $Revision: 910 $
 * @see        GeSHiRenderer
 */
class GeSHiRendererDebug extends GeSHiRenderer
{
    // {{{ parseToken()

    /**
     * Implements parseToken to output tokens
     *
     * @param string $token        The token to output
     * @param string $context_name The name of the context that the tag is in
     * @param array  $data         Miscellaneous data about the context
     *
     * @return string Debug string
     */
    function parseToken($token, $context_name, $data)
    {
        static $counter = 0;
        return $counter++ . ' ' . $context_name . "\n";
        // ignore blank tokens
        if ('' == $token || geshi_is_whitespace($token)) {
            return $token;
        }

        return $this->getAnsiCode($context_name)
            . $token
            . $this->resetCode;
    }

    // }}}
    // {{{ getHeader()

    /**
     * Returns the header for the code. Currently just a boring preset.
     *
     * @return string
     */
    function getHeader()
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
    function getFooter()
    {
        return '';
    }

    // }}}

}

?>
