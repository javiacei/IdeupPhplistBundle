<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */

namespace Ideup\PhplistBundle\Model;

use Ideup\PhplistBundle\Entity\PhplistList;
use Ideup\PhplistBundle\Entity\PhplistUserUser;
use Ideup\PhplistBundle\Entity\PhplistUserMessage;
use Ideup\PhplistBundle\Entity\PhplistMessage;

class PhplistManager
{
    protected $phplistPath;

    protected $serverFrom;

    /**
     * @var \Doctrine\ORM\EntityManager $em
     */
    protected $em;

    protected $tmp;

    /**
     * @param \Doctrine\ORM\EntityManager $em
     */
    public function __construct(\Doctrine\ORM\EntityManager $em)
    {
        $this->setEntityManager($em);
    }

    public function setTmp($tmp)
    {
        $this->tmp = $tmp;
    }

    public function getTmp()
    {
        return $this->tmp;
    }

    public function setPhplistPath($pp)
    {
        $this->phplistPath = $pp;
    }

    public function getPhplistPath()
    {
        return $this->phplistPath;
    }

    public function setServerFrom($sf)
    {
        $this->serverFrom = $sf;
    }

    public function getServerFrom()
    {
        return $this->serverFrom;
    }

    public function setEntityManager($em)
    {
        $this->em = $em;
    }

    public function getEntityManager()
    {
        return $this->em;
    }

    public function getListRepository()
    {
        return $this->getEntityManager()->getRepository('IdeupPhplistBundle:PhplistList');
    }

    public function getUserRepository()
    {
        return $this->getEntityManager()->getRepository('IdeupPhplistBundle:PhplistUserUser');
    }

    protected function getUserExtraData()
    {
        return array(
            'confirmed'   => true,
            'htmlemail'   => true,
            'disabled'    => false,
            'blacklisted' => false,
            'bouncecount' => 0,
        );
    }

    public function createPhplistUser($userData, PhplistList $list)
    {
        if (!is_array($userData)) {
            throw new \Exception('User data must be an array');
        }

        if (!array_key_exists('email', $userData) || is_null($userData['email'])) {
            throw new \Exception("Key 'email' is required");
        }

        $phplistUser = new PhplistUserUser();

        // Extra data.
        $extraData = $this->getUserExtraData();
        $intersects = array_intersect_key($userData, $extraData);
        foreach ($intersects as $paramName => $paramValue) {
            unset($extraData[$paramName]);
        }
        $userData = array_merge($userData, $extraData);

        $phplistUser->fromArray($userData);

        $phplistUser->addLists($list);

        $this->getEntityManager()->persist($phplistUser);
        $this->getEntityManager()->flush();

        return $phplistUser;
    }

    public function getOnePhplistUserById($id)
    {
        return $this->getUserRepository()->findOneById($id);
    }

    public function getOnePhplistUserByEmail($email)
    {
        return $this->getUserRepository()->findOneByEmail($email);
    }

    public function createPhplistList($listData)
    {
        if (!is_array($listData)) {
            throw new \Exception('List data must be an array');
        }

        if (!array_key_exists('name', $listData) || is_null($listData['name'])) {
            throw new \Exception("Key 'name' is required");
        }

        if (!is_null($this->getListRepository()->findOneByName($listData['name']))) {
            throw new \Exception("List '{$listData['name']}' already exists.");
        }

        $phplistList = new PhplistList();
        $phplistList->fromArray($listData);

        $this->getEntityManager()->persist($phplistList);
        $this->getEntityManager()->flush();

        return $phplistList;
    }

    public function getOnePhplistListById($id)
    {
        return $this->getListRepository()->findOneById($id);
    }

    public function getOnePhplistListByName($name)
    {
        return $this->getListRepository()->findOneByName($name);
    }

    public function send(PhplistList $list, $subject, $content)
    {
        $filename = $this->getTmp() . "/ideup_phplist_{$list->getName()}" . uniqid();

        // Write message content into a file to associate with -psend command
        $handle = fopen($filename, 'w+');
        fwrite($handle, $content);
        fclose($handle);

        $output = null;
        echo "php {$this->getPhplistPath()} -psend -s $subject -l {$list->getName()} -f {$this->getServerFrom()} < $filename" . "\n";
        $resultExec = exec("php {$this->getPhplistPath()} -psend -s $subject -l {$list->getName()} -f {$this->getServerFrom()} < $filename", $output);
        return $output;
    }

    public function processQueue()
    {
        $output = null;
        $resultExec = exec("php {$this->getPhplistPath()} -pprocessqueue", $output);

        return $output;
    }

    /**
     * Get some mailing metrics (views, bounced, etc.)
     */
    public function getMailingStatistics()
    {
        $query = $this->em->createQuery('SELECT m.id AS messageId, COUNT(u.viewed) AS views, COUNT(u.status) AS total,
            m.subject, m.sent, m.bounceCount AS bounceCount, (COUNT(u.viewed) / COUNT(u.status) * 100) AS rate
            FROM IdeupPhplistBundle:PhplistUserMessage u JOIN u.message m
            GROUP BY m.id
            ORDER BY m.entered');
        return $query->getResult();
    }
}
