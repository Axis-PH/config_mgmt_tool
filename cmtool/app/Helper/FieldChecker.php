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

    public function isNotBlankField($field) {
        if (is_null($field))
           return false;
        
        return true;
    }

    public function isValidIpAdd($field) {

        $regex ="/[0-9.-]/";

        if (!preg_match($regex, $field)) 
           return false;

        return true;
    }

    public function isNumericAndString($field) {
        if (!preg_match('/[A-Za-z0-9]+/',$field))
            return false;
        
        return true;
    }

    public function isSpecialCharacter($name) {

        $pattern = '/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/';

        if (preg_match($pattern, $name))
            return false;

        return true; 
    }
}