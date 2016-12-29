<?php

namespace App\Libraries\Helper;

class Helper
{
    public static function retrieveNameFromFilePath($path) {
        $pieces = explode('/', $path);
        $name = array_pop($pieces);

        return $name;
    }
}
