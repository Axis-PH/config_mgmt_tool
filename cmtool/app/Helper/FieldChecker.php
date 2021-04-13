<?php

namespace App\Helper;

class FieldChecker
{
    public function isValidSiteName($name)
    {
        if (preg_match('/[^a-z ]+/i', $name) or (is_null($name)))
            return false;

        return true;
    }
}