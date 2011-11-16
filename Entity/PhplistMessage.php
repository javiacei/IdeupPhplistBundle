<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */

namespace Ideup\PhplistBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PhplistMessage Model
 *
 * @ORM\Entity()
 * @ORM\Table(name="phplist_message")
 * @ORM\HasLifecycleCallbacks()
 */
class PhplistMessage
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", name="id", nullable=false)
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var string $subject
     *
     * @ORM\Column(name="subject", type="string", nullable=false)
     */
    protected $subject;

    /**
     * @var string $fromField
     *
     * @ORM\Column(name="fromfield", type="string", nullable=false)
     */
    protected $fromField;

    /**
     * @var string $toField
     *
     * @ORM\Column(name="tofield", type="string", nullable=false)
     */
    protected $toField;

    /**
     * @var string $replyTo
     *
     * @ORM\Column(name="replyto", type="string", nullable=false)
     */
    protected $replyTo;

    /**
     * @var string $message
     *
     * @ORM\Column(name="message", type="text", nullable=true)
     */
    protected $message;

    /**
     * @var string $textMessage
     *
     * @ORM\Column(name="textmessage", type="string", nullable=true)
     */
    protected $textMessage;

    /**
     * @var string $footer
     *
     * @ORM\Column(name="footer", type="text", nullable=true)
     */
    protected $footer;

    /**
     * @var \DateTime $entered
     *
     * @ORM\Column(name="entered", type="datetime", nullable=false)
     */
    protected $entered;

    /**
     * @var \DateTime $modified
     *
     * @ORM\Column(name="modified", type="datetime", nullable=false)
     */
    protected $modified;

    /**
     * @var \DateTime $embargo
     *
     * @ORM\Column(name="embargo", type="datetime", nullable=false)
     */
    protected $embargo;

    /**
     * @var integer $repeatInterval
     *
     * @ORM\Column(name="repeatinterval", type="integer", nullable=true)
     */
    protected $repeatInterval;

    /**
     * @var \DateTime $repeatUntil
     *
     * @ORM\Column(name="repeatuntil", type="datetime", nullable=true)
     */
    protected $repeatUntil;

    /**
     * @var string $status
     *
     * @ORM\Column(name="status", type="string", nullable=true)
     */
    protected $status;

    /**
     * @var string $userSelection
     *
     * @ORM\Column(name="userselection", type="text", nullable=true)
     */
    protected $userSelection;

    /**
     * @var \DateTime $sent
     *
     * @ORM\Column(name="sent", type="datetime", nullable=true)
     */
    protected $sent;

    /**
     * @var bool $htmlFormatted
     *
     * @ORM\Column(name="htmlformatted", type="boolean", nullable=false)
     */
    protected $htmlFormatted;

    /**
     * @var string $sendFormat
     *
     * @ORM\Column(name="sendformat", type="string", nullable=true)
     */
    protected $sendFormat;

    /**
     * @var integer $template
     *
     * @ORM\Column(name="template", type="integer", nullable=true)
     */
    protected $template;

    /**
     * @var bool $processed
     *
     * @ORM\Column(name="processed", type="string", nullable=false)
     */
    protected $processed;

    /**
     * @var bool $asText
     *
     * @ORM\Column(name="astext", type="boolean", nullable=false)
     */
    protected $asText;

    /**
     * @var bool $asHtml
     *
     * @ORM\Column(name="ashtml", type="boolean", nullable=false)
     */
    protected $asHtml;

    /**
     * @var bool $astextandhtml
     *
     * @ORM\Column(name="astextandhtml", type="boolean", nullable=false)
     */
    protected $asTextAndHtml;

    /**
     * @var integer $viewed
     *
     * @ORM\Column(name="viewed", type="integer", nullable=true)
     */
    protected $viewed;

    /**
     * @var integer $bounceCount
     *
     * @ORM\Column(name="bouncecount", type="integer", nullable=true)
     */
    protected $bounceCount;

    /**
     * @var \DateTime $sendStart
     *
     * @ORM\Column(name="sendstart", type="datetime", nullable=true)
     */
    protected $sendStart;

    /**
     * @var string $rssTemplate
     *
     * @ORM\Column(name="rsstemplate", type="string", nullable=true)
     */
    protected $rssTemplate;

    /**
     * @var integer $owner
     *
     * @ORM\Column(name="owner", type="integer", nullable=true)
     */
    protected $owner;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set subject
     *
     * @param string $subject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    /**
     * Get subject
     *
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set fromField
     *
     * @param string $fromField
     */
    public function setFromField($fromField)
    {
        $this->fromField = $fromField;
    }

    /**
     * Get fromField
     *
     * @return string
     */
    public function getFromField()
    {
        return $this->fromField;
    }

    /**
     * Set toField
     *
     * @param string $toField
     */
    public function setToField($toField)
    {
        $this->toField = $toField;
    }

    /**
     * Get toField
     *
     * @return string
     */
    public function getToField()
    {
        return $this->toField;
    }

    /**
     * Set replyTo
     *
     * @param string $replyTo
     */
    public function setReplyTo($replyTo)
    {
        $this->replyTo = $replyTo;
    }

    /**
     * Get replyTo
     *
     * @return string
     */
    public function getReplyTo()
    {
        return $this->replyTo;
    }

    /**
     * Set message
     *
     * @param text $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * Get message
     *
     * @return text
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set textMessage
     *
     * @param string $textMessage
     */
    public function setTextMessage($textMessage)
    {
        $this->textMessage = $textMessage;
    }

    /**
     * Get textMessage
     *
     * @return string
     */
    public function getTextMessage()
    {
        return $this->textMessage;
    }

    /**
     * Set footer
     *
     * @param text $footer
     */
    public function setFooter($footer)
    {
        $this->footer = $footer;
    }

    /**
     * Get footer
     *
     * @return text
     */
    public function getFooter()
    {
        return $this->footer;
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
     * @return datetime
     */
    public function getModified()
    {
        return $this->modified;
    }

    /**
     * Set embargo
     *
     * @param datetime $embargo
     */
    public function setEmbargo($embargo)
    {
        $this->embargo = $embargo;
    }

    /**
     * Get embargo
     *
     * @return datetime
     */
    public function getEmbargo()
    {
        return $this->embargo;
    }

    /**
     * Set repeatInterval
     *
     * @param integer $repeatInterval
     */
    public function setRepeatInterval($repeatInterval)
    {
        $this->repeatInterval = $repeatInterval;
    }

    /**
     * Get repeatInterval
     *
     * @return integer
     */
    public function getRepeatInterval()
    {
        return $this->repeatInterval;
    }

    /**
     * Set repeatUntil
     *
     * @param datetime $repeatUntil
     */
    public function setRepeatUntil($repeatUntil)
    {
        $this->repeatUntil = $repeatUntil;
    }

    /**
     * Get repeatUntil
     *
     * @return datetime
     */
    public function getRepeatUntil()
    {
        return $this->repeatUntil;
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

    /**
     * Set userSelection
     *
     * @param text $userSelection
     */
    public function setUserSelection($userSelection)
    {
        $this->userSelection = $userSelection;
    }

    /**
     * Get userSelection
     *
     * @return text
     */
    public function getUserSelection()
    {
        return $this->userSelection;
    }

    /**
     * Set sent
     *
     * @param datetime $sent
     */
    public function setSent($sent)
    {
        $this->sent = $sent;
    }

    /**
     * Get sent
     *
     * @return datetime
     */
    public function getSent()
    {
        return $this->sent;
    }

    /**
     * Set htmlFormatted
     *
     * @param boolean $htmlFormatted
     */
    public function setHtmlFormatted($htmlFormatted)
    {
        $this->htmlFormatted = $htmlFormatted;
    }

    /**
     * Get htmlFormatted
     *
     * @return boolean
     */
    public function getHtmlFormatted()
    {
        return $this->htmlFormatted;
    }

    /**
     * Set sendFormat
     *
     * @param string $sendFormat
     */
    public function setSendFormat($sendFormat)
    {
        $this->sendFormat = $sendFormat;
    }

    /**
     * Get sendFormat
     *
     * @return string
     */
    public function getSendFormat()
    {
        return $this->sendFormat;
    }

    /**
     * Set template
     *
     * @param integer $template
     */
    public function setTemplate($template)
    {
        $this->template = $template;
    }

    /**
     * Get template
     *
     * @return integer
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * Set processed
     *
     * @param string $processed
     */
    public function setProcessed($processed)
    {
        $this->processed = $processed;
    }

    /**
     * Get processed
     *
     * @return string
     */
    public function getProcessed()
    {
        return $this->processed;
    }

    /**
     * Set asText
     *
     * @param boolean $asText
     */
    public function setAsText($asText)
    {
        $this->asText = $asText;
    }

    /**
     * Get asText
     *
     * @return boolean
     */
    public function getAsText()
    {
        return $this->asText;
    }

    /**
     * Set asHtml
     *
     * @param boolean $asHtml
     */
    public function setAsHtml($asHtml)
    {
        $this->asHtml = $asHtml;
    }

    /**
     * Get asHtml
     *
     * @return boolean
     */
    public function getAsHtml()
    {
        return $this->asHtml;
    }

    /**
     * Set asTextAndHtml
     *
     * @param boolean $asTextAndHtml
     */
    public function setAsTextAndHtml($asTextAndHtml)
    {
        $this->asTextAndHtml = $asTextAndHtml;
    }

    /**
     * Get asTextAndHtml
     *
     * @return boolean
     */
    public function getAsTextAndHtml()
    {
        return $this->asTextAndHtml;
    }

    /**
     * Set viewed
     *
     * @param integer $viewed
     */
    public function setViewed($viewed)
    {
        $this->viewed = $viewed;
    }

    /**
     * Get viewed
     *
     * @return integer
     */
    public function getViewed()
    {
        return $this->viewed;
    }

    /**
     * Set bounceCount
     *
     * @param integer $bounceCount
     */
    public function setBounceCount($bounceCount)
    {
        $this->bounceCount = $bounceCount;
    }

    /**
     * Get bounceCount
     *
     * @return integer
     */
    public function getBounceCount()
    {
        return $this->bounceCount;
    }

    /**
     * Set sendStart
     *
     * @param datetime $sendStart
     */
    public function setSendStart($sendStart)
    {
        $this->sendStart = $sendStart;
    }

    /**
     * Get sendStart
     *
     * @return datetime
     */
    public function getSendStart()
    {
        return $this->sendStart;
    }

    /**
     * Set rssTemplate
     *
     * @param string $rssTemplate
     */
    public function setRssTemplate($rssTemplate)
    {
        $this->rssTemplate = $rssTemplate;
    }

    /**
     * Get rssTemplate
     *
     * @return string
     */
    public function getRssTemplate()
    {
        return $this->rssTemplate;
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
     * @return integer
     */
    public function getOwner()
    {
        return $this->owner;
    }
}
