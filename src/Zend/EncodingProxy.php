<?php

/**
 * The purpose of this class is to solve the BC breaks introduced in PHP 5.6 after
 * deprecating iconv and mbstring configuration options related to encoding.
 *
 * @see http://de1.php.net/manual/en/migration56.deprecated.php#migration56.deprecated.iconv-mbstring-encoding
 *
 * Class Zend_EncodingHandler
 */
class Zend_EncodingProxy
{
    /**
     * Returns whether the current php version is affected by the BC break.
     *
     * @return bool
     */
    private static function versionGreaterOrEquals56()
    {
        return (PHP_VERSION_ID >= 50600);
    }

    /**
     * @param string $encoding
     *
     * @return bool|string
     */
    public static function setInternalEncoding($encoding)
    {
        if (self::versionGreaterOrEquals56()) {
            return ini_set('default_charset', $encoding);
        }

        return iconv_set_encoding('internal_encoding', $encoding);
    }

    /**
     * @return string
     */
    public static function getInternalEncoding()
    {
        if (self::versionGreaterOrEquals56()) {
            return ini_get('default_charset');
        }

        return iconv_get_encoding('internal_encoding');
    }

    /**
     * @param string $encoding
     *
     * @return bool|string
     */
    public static function setInputEncoding($encoding)
    {
        if (self::versionGreaterOrEquals56()) {
            return ini_set('input_encoding', $encoding);
        }

        return iconv_set_encoding('input_encoding', $encoding);
    }

    /**
     * @return string
     */
    public static function getInputEncoding()
    {
        if (self::versionGreaterOrEquals56()) {
            return ini_get('input_encoding');
        }

        return iconv_get_encoding('input_encoding');
    }

    /**
     * @param string $encoding
     *
     * @return bool|string
     */
    public static function setOutputEncoding($encoding)
    {
        if (self::versionGreaterOrEquals56()) {
            return ini_set('output_encoding', $encoding);
        }

        return iconv_set_encoding('output_encoding', $encoding);
    }

    /**
     * @return string
     */
    public static function getOutputEncoding()
    {
        if (self::versionGreaterOrEquals56()) {
            return ini_get('output_encoding');
        }

        return iconv_get_encoding('output_encoding');
    }
}
