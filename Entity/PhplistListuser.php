<?php

namespace Ideup\PhplistBundle\Entity;

/**
 * Ideup\PhplistBundle\Entity\PhplistListuser
 *
 * @orm:Table(name="phplist_listuser")
 * @orm:Entity
 */
class PhplistListuser
{
    /**
     * @var integer $userid
     *
     * @orm:Column(name="userid", type="integer", nullable=false)
     * @orm:Id
     * @orm:GeneratedValue(strategy="NONE")
     */
    private $userid;

    /**
     * @var integer $listid
     *
     * @orm:Column(name="listid", type="integer", nullable=false)
     * @orm:Id
     * @orm:GeneratedValue(strategy="NONE")
     */
    private $listid;

    /**
     * @var datetime $entered
     *
     * @orm:Column(name="entered", type="datetime", nullable=true)
     */
    private $entered;

    /**
     * @var datetime $modified
     *
     * @orm:Column(name="modified", type="datetime", nullable=false)
     */
    private $modified;
}