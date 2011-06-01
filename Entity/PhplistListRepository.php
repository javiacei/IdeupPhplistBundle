<?php

namespace Ideup\PhpListBundle\Entity;

use Doctrine\ORM\EntityRepository;

class PhplistListRepository extends EntityRepository
{
    public function getListsByName($name)
    {
        return $this->findBy(array('name' => $name));
    }
}