<?php

namespace Ideup\PhplistBundle\Entity;

/**
 * Ideup\PhplistBundle\Entity\PhplistList
 *
 * @orm:Table(name="phplist_list")
 * @orm:Entity
 */
class PhplistList
{
    /**
     * @var integer $id
     *
     * @orm:Column(name="id", type="integer", nullable=false)
     * @orm:Id
     * @orm:GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string $name
     *
     * @orm:Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var text $description
     *
     * @orm:Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var datetime $entered
     *
     * @orm:Column(name="entered", type="datetime", nullable=true)
     */
    private $entered;

    /**
     * @var integer $listorder
     *
     * @orm:Column(name="listorder", type="integer", nullable=true)
     */
    private $listorder;

    /**
     * @var string $prefix
     *
     * @orm:Column(name="prefix", type="string", length=10, nullable=true)
     */
    private $prefix;

    /**
     * @var string $rssfeed
     *
     * @orm:Column(name="rssfeed", type="string", length=255, nullable=true)
     */
    private $rssfeed;

    /**
     * @var datetime $modified
     *
     * @orm:Column(name="modified", type="datetime", nullable=false)
     */
    private $modified;

    /**
     * @var boolean $active
     *
     * @orm:Column(name="active", type="boolean", nullable=true)
     */
    private $active;

    /**
     * @var integer $owner
     *
     * @orm:Column(name="owner", type="integer", nullable=true)
     */
    private $owner;
}