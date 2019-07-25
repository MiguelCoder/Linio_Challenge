<?php

namespace Src\Entity;

interface Entity
{
    public static function getName();

    public static function getSpecialNumber();

    public function getEntityNumbers();

    public function addEntityNumber($num);

}
