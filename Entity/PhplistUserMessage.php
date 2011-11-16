<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */

namespace Ideup\PhplistBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PhplistUserMessage Model
 *
 * @ORM\Entity()
 * @ORM\Table(name="phplist_usermessage")
 * @ORM\HasLifecycleCallbacks()
 */
class PhplistUserMessage
{
    /**
     * @ORM\ManyToOne(targetEntity="Ideup\PhplistBundle\Entity\PhplistMessage")
     * @ORM\JoinColumn(name="messageid", referencedColumnName="id")
     */
    protected $message;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer", name="userid")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $userid;

    /**
     * @var \DateTime $entered
     *
     * @ORM\Column(type="datetime", name="entered", nullable=false)
     */
    protected $entered;

    /**
     * @var \DateTime $viewed
     *
     * @ORM\Column(type="datetime", name="viewed", nullable=true)
     */
    protected $viewed;

    /**
     * @var string $status
     *
     * @ORM\Column(type="string", name="status", nullable=true)
     */
    protected $status;

    /**
     * Get message
     *
     * @return Ideup\PhplistBundle\Entity\PhplistMessage
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Get userid
     *
     * @return integer
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * Set entered
     *
     * @param datetime $entered
     */
    public function setEntered($entered)
    {
        $this->entered = $entered;
    }

    /**
     * Get entered
     *
     * @return datetime
     */
    public function getEntered()
    {
        return $this->entered;
    }

    /**
     * Set viewed
     *
     * @param datetime $viewed
     */
    public function setViewed($viewed)
    {
        $this->viewed = $viewed;
    }

    /**
     * Get viewed
     *
     * @return datetime
     */
    public function getViewed()
    {
        return $this->viewed;
    }

    /**
     * Set status
     *
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }
}
