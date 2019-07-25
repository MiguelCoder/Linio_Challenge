<?php

namespace Src\Entity;

class StarCorp implements Entity 
{
    const NAME = 'StarCorp';
    const SPECIAL_NUMBER = 3;
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
