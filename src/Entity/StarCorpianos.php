<?php

namespace Src\Entity;

class StarCorpianos implements Entity
{
    const NAME = 'StarCorpianos';
    const SPECIAL_NUMBER = 15;
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
