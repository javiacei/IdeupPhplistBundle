<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */

namespace Ideup\PhplistBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ideup\PhplistBundle\Entity\PhplistList
 *
 * @ORM\Entity()
 * @ORM\Table(name="phplist_list")
 * @ORM\HasLifecycleCallbacks()
 */
class PhplistList
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false, unique=true)
     */
    private $name;

    /**
     * @var text $description
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var datetime $entered
     *
     * @ORM\Column(name="entered", type="datetime", nullable=true)
     */
    private $entered;

    /**
     * @var integer $listorder
     *
     * @ORM\Column(name="listorder", type="integer", nullable=true)
     */
    private $listorder;

    /**
     * @var string $prefix
     *
     * @ORM\Column(name="prefix", type="string", length=10, nullable=true)
     */
    private $prefix;

    /**
     * @var string $rssfeed
     *
     * @ORM\Column(name="rssfeed", type="string", length=255, nullable=true)
     */
    private $rssFeed;

    /**
     * @var datetime $modified
     *
     * @ORM\Column(name="modified", type="datetime", nullable=false)
     */
    private $modified;

    /**
     * @var boolean $active
     *
     * @ORM\Column(name="active", type="boolean", nullable=true)
     */
    private $active;

    /**
     * @var integer $owner
     *
     * @ORM\Column(name="owner", type="integer", nullable=true)
     */
    private $owner;

    /**
     * @ORM\ManyToMany(targetEntity="PhplistUserUser", inversedBy="lists")
     * @ORM\JoinTable(name="phplist_listuser",
     *      joinColumns={@ORM\JoinColumn(name="listid", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="userid", referencedColumnName="id")}
     *      )
     */
    private $users;

    /**
     * @ORM\PrePersist
     */
    public function doPrePersist()
    {
        $this->modified = new DateTime();
    }

    public function __construct()
    {
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param text $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get description
     *
     * @return text $description
     */
    public function getDescription()
    {
        return $this->description;
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
     * @return datetime $entered
     */
    public function getEntered()
    {
        return $this->entered;
    }

    /**
     * Set listorder
     *
     * @param integer $listorder
     */
    public function setListorder($listorder)
    {
        $this->listorder = $listorder;
    }

    /**
     * Get listorder
     *
     * @return integer $listorder
     */
    public function getListorder()
    {
        return $this->listorder;
    }

    /**
     * Set prefix
     *
     * @param string $prefix
     */
    public function setPrefix($prefix)
    {
        $this->prefix = $prefix;
    }

    /**
     * Get prefix
     *
     * @return string $prefix
     */
    public function getPrefix()
    {
        return $this->prefix;
    }

    /**
     * Set rssFeed
     *
     * @param string $rssFeed
     */
    public function setRssFeed($rssFeed)
    {
        $this->rssFeed = $rssFeed;
    }

    /**
     * Get rssFeed
     *
     * @return string $rssFeed
     */
    public function getRssFeed()
    {
        return $this->rssFeed;
    }

    /**
     * Set modified
     *
     * @param datetime $modified
     */
    public function setModified($modified)
    {
        $this->modified = $modified;
    }

    /**
     * Get modified
     *
     * @return datetime $modified
     */
    public function getModified()
    {
        return $this->modified;
    }

    /**
     * Set active
     *
     * @param boolean $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }

    /**
     * Get active
     *
     * @return boolean $active
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set owner
     *
     * @param integer $owner
     */
    public function setOwner($owner)
    {
        $this->owner = $owner;
    }

    /**
     * Get owner
     *
     * @return integer $owner
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Add users
     *
     * @param Ideup\PhplistBundle\Entity\PhplistUserUser $users
     */
    public function addUsers(\Ideup\PhplistBundle\Entity\PhplistUserUser $users)
    {
        $this->users[] = $users;
    }

    /**
     * Get users
     *
     * @return Doctrine\Common\Collections\Collection $users
     */
    public function getUsers()
    {
        return $this->users;
    }

    public function fromArray(array $data) {
        foreach ($data as $key => $value) {
            $this->{'set' . $key}($value);
        }
    }
}
