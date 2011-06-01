<?php

namespace Ideup\PhplistBundle\Entity;

/**
 * Ideup\PhplistBundle\Entity\PhplistUserUser
 *
 * @orm:Table(name="phplist_user_user")
 * @orm:Entity(repositoryClass="Ideup\PhplistBundle\Entity\PhplistUserUserRepository")
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

    /**
     * @orm:ManyToMany(targetEntity="PhplistList", inversedBy="users")
     * @orm:JoinTable(name="phplist_listuser",
     *      joinColumns={@orm:JoinColumn(name="userid", referencedColumnName="id")},
     *      inverseJoinColumns={@orm:JoinColumn(name="listid", referencedColumnName="id")}
     *      )
     */
    private $lists;

    /**
     * @orm:PrePersist
     */
    public function doPrePersist()
    {
        $this->modified = new DateTime();
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