<?php

namespace Ideup\PhplistBundle\Entity;

/**
 * Ideup\PhplistBundle\Entity\PhplistUserUser
 *
 * @orm:Table(name="phplist_user_user")
 * @orm:Entity
 */
class PhplistUserUser
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
     * @var string $email
     *
     * @orm:Column(name="email", type="string", length=255, nullable=false)
     */
    private $email;

    /**
     * @var boolean $confirmed
     *
     * @orm:Column(name="confirmed", type="boolean", nullable=true)
     */
    private $confirmed;

    /**
     * @var boolean $blacklisted
     *
     * @orm:Column(name="blacklisted", type="boolean", nullable=true)
     */
    private $blacklisted;

    /**
     * @var integer $bouncecount
     *
     * @orm:Column(name="bouncecount", type="integer", nullable=true)
     */
    private $bouncecount;

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

    /**
     * @var string $uniqid
     *
     * @orm:Column(name="uniqid", type="string", length=255, nullable=true)
     */
    private $uniqid;

    /**
     * @var boolean $htmlemail
     *
     * @orm:Column(name="htmlemail", type="boolean", nullable=true)
     */
    private $htmlemail;

    /**
     * @var integer $subscribepage
     *
     * @orm:Column(name="subscribepage", type="integer", nullable=true)
     */
    private $subscribepage;

    /**
     * @var string $rssfrequency
     *
     * @orm:Column(name="rssfrequency", type="string", length=100, nullable=true)
     */
    private $rssfrequency;

    /**
     * @var string $password
     *
     * @orm:Column(name="password", type="string", length=255, nullable=true)
     */
    private $password;

    /**
     * @var date $passwordchanged
     *
     * @orm:Column(name="passwordchanged", type="date", nullable=true)
     */
    private $passwordchanged;

    /**
     * @var boolean $disabled
     *
     * @orm:Column(name="disabled", type="boolean", nullable=true)
     */
    private $disabled;

    /**
     * @var text $extradata
     *
     * @orm:Column(name="extradata", type="text", nullable=true)
     */
    private $extradata;

    /**
     * @var string $foreignkey
     *
     * @orm:Column(name="foreignkey", type="string", length=100, nullable=true)
     */
    private $foreignkey;
}