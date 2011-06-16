<?php

namespace Ideup\PhplistBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ideup\PhplistBundle\Entity\PhplistUserUser
 *
 * @ORM\Table(name="phplist_user_user")
 * @ORM\Entity(repositoryClass="Ideup\PhplistBundle\Entity\PhplistUserUserRepository")
 */
class PhplistUserUser
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
     * @var string $email
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     */
    private $email;

    /**
     * @var boolean $confirmed
     *
     * @ORM\Column(name="confirmed", type="boolean", nullable=true)
     */
    private $confirmed;

    /**
     * @var boolean $blacklisted
     *
     * @ORM\Column(name="blacklisted", type="boolean", nullable=true)
     */
    private $blacklisted;

    /**
     * @var integer $bouncecount
     *
     * @ORM\Column(name="bouncecount", type="integer", nullable=true)
     */
    private $bouncecount;

    /**
     * @var datetime $entered
     *
     * @ORM\Column(name="entered", type="datetime", nullable=true)
     */
    private $entered;

    /**
     * @var datetime $modified
     *
     * @ORM\Column(name="modified", type="datetime", nullable=false)
     */
    private $modified;

    /**
     * @var string $uniqid
     *
     * @ORM\Column(name="uniqid", type="string", length=255, nullable=true)
     */
    private $uniqid;

    /**
     * @var boolean $htmlemail
     *
     * @ORM\Column(name="htmlemail", type="boolean", nullable=true)
     */
    private $htmlemail;

    /**
     * @var integer $subscribepage
     *
     * @ORM\Column(name="subscribepage", type="integer", nullable=true)
     */
    private $subscribepage;

    /**
     * @var string $rssfrequency
     *
     * @ORM\Column(name="rssfrequency", type="string", length=100, nullable=true)
     */
    private $rssfrequency;

    /**
     * @var string $password
     *
     * @ORM\Column(name="password", type="string", length=255, nullable=true)
     */
    private $password;

    /**
     * @var date $passwordchanged
     *
     * @ORM\Column(name="passwordchanged", type="date", nullable=true)
     */
    private $passwordchanged;

    /**
     * @var boolean $disabled
     *
     * @ORM\Column(name="disabled", type="boolean", nullable=true)
     */
    private $disabled;

    /**
     * @var text $extradata
     *
     * @ORM\Column(name="extradata", type="text", nullable=true)
     */
    private $extradata;

    /**
     * @var string $foreignkey
     *
     * @ORM\Column(name="foreignkey", type="string", length=100, nullable=true)
     */
    private $foreignkey;

    /**
     * @ORM\ManyToMany(targetEntity="PhplistList", inversedBy="users")
     * @ORM\JoinTable(name="phplist_listuser",
     *      joinColumns={@ORM\JoinColumn(name="userid", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="listid", referencedColumnName="id")}
     *      )
     */
    private $lists;

    /**
     * @ORM\PrePersist
     */
    public function doPrePersist()
    {
        $this->modified = new \DateTime();
        $this->entered = new \DateTime();
        $this->uniqid = uniqid();
        $this->passwordchanged = new \DateTime();
    }


    public function __construct()
    {
        $this->lists = new \Doctrine\Common\Collections\ArrayCollection();        
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
     * Set email
     *
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Get email
     *
     * @return string $email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set confirmed
     *
     * @param boolean $confirmed
     */
    public function setConfirmed($confirmed)
    {
        $this->confirmed = $confirmed;
    }

    /**
     * Get confirmed
     *
     * @return boolean $confirmed
     */
    public function getConfirmed()
    {
        return $this->confirmed;
    }

    /**
     * Set blacklisted
     *
     * @param boolean $blacklisted
     */
    public function setBlacklisted($blacklisted)
    {
        $this->blacklisted = $blacklisted;
    }

    /**
     * Get blacklisted
     *
     * @return boolean $blacklisted
     */
    public function getBlacklisted()
    {
        return $this->blacklisted;
    }

    /**
     * Set bouncecount
     *
     * @param integer $bouncecount
     */
    public function setBouncecount($bouncecount)
    {
        $this->bouncecount = $bouncecount;
    }

    /**
     * Get bouncecount
     *
     * @return integer $bouncecount
     */
    public function getBouncecount()
    {
        return $this->bouncecount;
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
     * Set uniqid
     *
     * @param string $uniqid
     */
    public function setUniqid($uniqid)
    {
        $this->uniqid = $uniqid;
    }

    /**
     * Get uniqid
     *
     * @return string $uniqid
     */
    public function getUniqid()
    {
        return $this->uniqid;
    }

    /**
     * Set htmlemail
     *
     * @param boolean $htmlemail
     */
    public function setHtmlemail($htmlemail)
    {
        $this->htmlemail = $htmlemail;
    }

    /**
     * Get htmlemail
     *
     * @return boolean $htmlemail
     */
    public function getHtmlemail()
    {
        return $this->htmlemail;
    }

    /**
     * Set subscribepage
     *
     * @param integer $subscribepage
     */
    public function setSubscribepage($subscribepage)
    {
        $this->subscribepage = $subscribepage;
    }

    /**
     * Get subscribepage
     *
     * @return integer $subscribepage
     */
    public function getSubscribepage()
    {
        return $this->subscribepage;
    }

    /**
     * Set rssfrequency
     *
     * @param string $rssfrequency
     */
    public function setRssfrequency($rssfrequency)
    {
        $this->rssfrequency = $rssfrequency;
    }

    /**
     * Get rssfrequency
     *
     * @return string $rssfrequency
     */
    public function getRssfrequency()
    {
        return $this->rssfrequency;
    }

    /**
     * Set password
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * Get password
     *
     * @return string $password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set passwordchanged
     *
     * @param date $passwordchanged
     */
    public function setPasswordchanged($passwordchanged)
    {
        $this->passwordchanged = $passwordchanged;
    }

    /**
     * Get passwordchanged
     *
     * @return date $passwordchanged
     */
    public function getPasswordchanged()
    {
        return $this->passwordchanged;
    }

    /**
     * Set disabled
     *
     * @param boolean $disabled
     */
    public function setDisabled($disabled)
    {
        $this->disabled = $disabled;
    }

    /**
     * Get disabled
     *
     * @return boolean $disabled
     */
    public function getDisabled()
    {
        return $this->disabled;
    }

    /**
     * Set extradata
     *
     * @param text $extradata
     */
    public function setExtradata($extradata)
    {
        $this->extradata = $extradata;
    }

    /**
     * Get extradata
     *
     * @return text $extradata
     */
    public function getExtradata()
    {
        return $this->extradata;
    }

    /**
     * Set foreignkey
     *
     * @param string $foreignkey
     */
    public function setForeignkey($foreignkey)
    {
        $this->foreignkey = $foreignkey;
    }

    /**
     * Get foreignkey
     *
     * @return string $foreignkey
     */
    public function getForeignkey()
    {
        return $this->foreignkey;
    }

    /**
     * Add lists
     *
     * @param Ideup\PhplistBundle\Entity\PhplistList $lists
     */
    public function addLists(\Ideup\PhplistBundle\Entity\PhplistList $lists)
    {
        $this->lists[] = $lists;
    }

    /**
     * Get lists
     *
     * @return Doctrine\Common\Collections\Collection $lists
     */
    public function getLists()
    {
        return $this->lists;
    }

    public function fromArray(array $data) {
        foreach ($data as $key => $value) {
            $this->{'set' . $key}($value);
        }
    }
}