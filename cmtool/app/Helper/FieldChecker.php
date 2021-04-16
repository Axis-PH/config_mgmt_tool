<?php

namespace App\Helper;

class FieldChecker
{
    public function isValidSiteName($name)
    {
        if (preg_match('~[0-9]+~', $name) or (is_null($name)))
            return false;

        return true;
    }
}