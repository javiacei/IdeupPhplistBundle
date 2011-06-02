<?php

namespace Ideup\PhpListBundle\Entity;

use Doctrine\ORM\EntityRepository;

class PhplistUserUsertRepository extends EntityRepository
{
    public function findOneByEmail($email)
    {
        return $this->findOneBy(array('email' => $email));
    }
}