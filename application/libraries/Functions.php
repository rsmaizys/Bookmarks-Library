<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Functions {

    function catToadress($string)
    {
        $string = strtolower($string);
        $search = array("ą", "č", "ę", "ė", "į", "š", "ų", "ū");
        $replace = array("a", "c", "e", "e", "i", "s", "u", "u");
        $new_string = str_replace($search, $replace, $string);
        return $new_string;
    }
}

?>
