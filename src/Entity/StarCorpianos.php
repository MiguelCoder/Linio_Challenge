<?php

namespace Src\Entity;

class StarCorpianos implements Entity
{
    const NAME = 'StarCorpianos';
    const SPECIAL_NUMBER = 15;

    public static function getSpecialNumber()
    {
        return self::SPECIAL_NUMBER;
    }

    public static function getName()
    {
        return self::NAME;
    }
}
