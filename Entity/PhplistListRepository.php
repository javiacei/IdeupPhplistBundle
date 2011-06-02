<?php

namespace Ideup\PhpListBundle\Entity;

use Doctrine\ORM\EntityRepository;

class PhplistListRepository extends EntityRepository
{    
    public function findOneByName($name)
    {
        return $this->findOneBy(array('name' => $name));
    }
}