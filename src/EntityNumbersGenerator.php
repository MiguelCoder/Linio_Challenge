<?php

namespace Src;

use Src\Entity\Entity;

class EntityNumbersGenerator 
{
    public function populateEntity(Entity $entity, $max)
    {
        $this->populate($entity, $max); 
    }

    private function populate(Entity $entity, $max)
    {  
        for ($i = $entity->getSpecialNumber(); $i <= $max; $i += $entity->getSpecialNumber()) {
            $entity->addEntityNumber($i);
        }
    }
}
