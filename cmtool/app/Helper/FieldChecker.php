<?php

namespace App\Helper;

class FieldChecker
{
    public function isValidName($name)
    {
        if (preg_match('~[0-9]+~', $name) or (is_null($name)))
            return false;

        return true;
    }

    public function isValidTel($tel)
    {
        if (!is_numeric($tel))
            return false;

        return true;
    }

    public function isValidEmail($mail) {
        if (!preg_match('[@]', $mail)) 
           return false;
        
        return true;
    }
}