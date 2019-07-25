<?php

namespace Src;

use Src\Entity\Entity;

use Src\EntityNumbersGenerator;

class EntityManager
{
    private $numbers;
    private $entityNumbersGenerator;

    public function __construct($size)
    {
        $this->entityNumbersGenerator = new EntityNumbersGenerator();
        $this->numbers = range(0, $size);
    }

    public function mergeEntitiesIntoNumbers(array $entities, $size)
    {
        foreach ($entities as $entity) {
            if (isset($entity)){ 
                $this->getEntityNumbersGenerator()->populateEntity($entity, $size);
                $this->merge($entity, $size);
            }
        }
    }

    private function merge(Entity $entity, $size)
    {
        for ($i = $entity->getSpecialNumber(); $i <= $size; $i += $entity->getSpecialNumber()) {
            $this->setNumber($i, $entity->getName());
        }
    }

    public function printFormattedNumbers($begin, $end)
    {
        for ($i = $begin; $i <= $end; $i++) {
            echo $this->getNumber($i) . "<br>";
        }
    }

    public function getNumber($key)
    {
        return $this->numbers[$key];
    }

    public function setNumber($key, $value)
    {
        return $this->numbers[$key] = $value;
    }

    public function getEntityNumbersGenerator()
    {
        return $this->entityNumbersGenerator;
    }
}
