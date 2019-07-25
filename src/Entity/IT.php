<?php

namespace Src\Entity;

class IT implements Entity 
{
    const NAME = 'IT';
    const SPECIAL_NUMBER = 5;
    private $entityNumbers;

    public function getEntityNumbers()
    {
        return $this->entityNumbers;
    }

    public static function getSpecialNumber()
    {
        return self::SPECIAL_NUMBER;
    }

    public static function getName()
    {
        return self::NAME;
    }

    public function addEntityNumber($num)
    {
        $this->entityNumbers[$num] = $this->getName();
    }
}
