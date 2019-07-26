<?php

namespace Src\Entity;

class IT implements Entity 
{
    const NAME = 'IT';
    const SPECIAL_NUMBER = 5;
    
    public static function getSpecialNumber()
    {
        return self::SPECIAL_NUMBER;
    }

    public static function getName()
    {
        return self::NAME;
    }
}
