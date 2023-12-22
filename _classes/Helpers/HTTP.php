<?php

namespace Helpers;

class HTTP
{

    static $basic = "http://localhost/project";

    static function redirect($path, $q = "")
    {
        $url = static::$basic . $path;
        if ($q) {
            $url .= "?$q";
        }
        header("location: $url");
        exit();
    }
}
