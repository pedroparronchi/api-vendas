<?php

if (!function_exists('onlyNumbers')) {
    /**
     * Return only numbers in string
     *
     * @param string $string
     * @return string
     */
    function onlyNumbers(string $string): string
    {
        return preg_replace('/[^0-9]/', '', $string);
    }
}

if (!function_exists('mask')) {
    /**
     * Set mask in string
     *
     * @param string $mask
     * @param string $str
     * @return string
     */
    function mask(string $mask, string $str): string
    {
        $str = str_replace(" ", "", $str);

        for ($i = 0; $i < strlen($str); $i++) {
            $mask[strpos($mask, "#")] = $str[$i];
        }
        
        return $mask;
    }
}
