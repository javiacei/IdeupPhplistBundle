<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */

namespace Ideup\PhplistBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ideup\PhplistBundle\Entity\PhplistUserUser
 *
 * @ORM\Entity()
 * @ORM\Table(name="phplist_user_user")
 * @ORM\HasLifecycleCallbacks()
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
     * @var string $uniqId
     *
     * @ORM\Column(name="uniqid", type="string", length=255, nullable=true)
     */
    private $uniqId;

    /**
     * @var boolean $htmlEmail
     *
     * @ORM\Column(name="htmlemail", type="boolean", nullable=true)
     */
    private $htmlEmail;

    /**
     * @var integer $subscribePage
     *
     * @ORM\Column(name="subscribepage", type="integer", nullable=true)
     */
    private $subscribePage;

    /**
     * @var string $rssFrequency
     *
     * @ORM\Column(name="rssfrequency", type="string", length=100, nullable=true)
     */
    private $rssFrequency;

    /**
     * @var string $password
     *
     * @ORM\Column(name="password", type="string", length=255, nullable=true)
     */
    private $password;

    /**
     * @var date $passwordChanged
     *
     * @ORM\Column(name="passwordchanged", type="date", nullable=true)
     */
    private $passwordChanged;

    /**
     * @var boolean $disabled
     *
     * @ORM\Column(name="disabled", type="boolean", nullable=true)
     */
    private $disabled;

    /**
     * @var text $extraData
     *
     * @ORM\Column(name="extradata", type="text", nullable=true)
     */
    private $extraData;

    /**
     * @var string $foreignKey
     *
     * @ORM\Column(name="foreignkey", type="string", length=100, nullable=true)
     */
    private $foreignKey;

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
        $this->uniqId = uniqId();
        $this->passwordChanged = new \DateTime();
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
     * Set uniqId
     *
     * @param string $uniqid
     */
    public function setUniqId($uniqId)
    {
        $this->uniqId = $uniqId;
    }

    /**
     * Get uniqId
     *
     * @return string $uniqId
     */
    public function getUniqId()
    {
        return $this->uniqId;
    }

    /**
     * Set htmlEmail
     *
     * @param boolean $htmlEmail
     */
    public function setHtmlEmail($htmlEmail)
    {
        $this->htmlEmail = $htmlEmail;
    }

    /**
     * Get htmlEmail
     *
     * @return boolean $htmlEmail
     */
    public function getHtmlEmail()
    {
        return $this->htmlEmail;
    }

    /**
     * Set subscribePage
     *
     * @param integer $subscribePage
     */
    public function setSubscribePage($subscribePage)
    {
        $this->subscribePage = $subscribePage;
    }

    /**
     * Get subscribePage
     *
     * @return integer $subscribePage
     */
    public function getSubscribePage()
    {
        return $this->subscribePage;
    }

    /**
     * Set rssFrequency
     *
     * @param string $rssFrequency
     */
    public function setRssFrequency($rssFrequency)
    {
        $this->rssFrequency = $rssFrequency;
    }

    /**
     * Get rssFrequency
     *
     * @return string $rssFrequency
     */
    public function getRssFrequency()
    {
        return $this->rssFrequency;
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
     * Set passwordChanged
     *
     * @param date $passwordChanged
     */
    public function setPasswordChanged($passwordChanged)
    {
        $this->passwordChanged = $passwordChanged;
    }

    /**
     * Get passwordChanged
     *
     * @return date $passwordChanged
     */
    public function getPasswordChanged()
    {
        return $this->passwordChanged;
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
     * Set extraData
     *
     * @param text $extraData
     */
    public function setExtraData($extraData)
    {
        $this->extraData = $extraData;
    }

    /**
     * Get extraData
     *
     * @return text $extraData
     */
    public function getExtraData()
    {
        return $this->extraData;
    }

    /**
     * Set foreignKey
     *
     * @param string $foreignKey
     */
    public function setForeignKey($foreignKey)
    {
        $this->foreignKey = $foreignKey;
    }

    /**
     * Get foreignKey
     *
     * @return string $foreignKey
     */
    public function getForeignKey()
    {
        return $this->foreignKey;
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
