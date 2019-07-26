<?php

namespace Src\Entity;

class StarCorp implements Entity 
{
    const NAME = 'StarCorp';
    const SPECIAL_NUMBER = 3;

    public static function getSpecialNumber()
    {
        return self::SPECIAL_NUMBER;
    }

    public static function getName()
    {
        return self::NAME;
    }
}
