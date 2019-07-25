<?php

require dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR."vendor".DIRECTORY_SEPARATOR."autoload.php";

use Src\Entity\StarCorpianos;

use Src\Entity\StarCorp;

use Src\Entity\IT;

use Src\EntityManager;

$entities = [
    new StarCorp,
    new IT,
    new StarCorpianos
];

$size=100;

$entity = new EntityManager($size);
$entity->mergeEntitiesIntoNumbers($entities, $size);    
$entity->printFormattedNumbers(1, $size);
