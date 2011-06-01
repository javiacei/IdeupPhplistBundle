<?php

namespace Ideup\PhplistBundle\Model;

use Ideup\PhplistBundle\Entity\PhplistList as PhplistList;
use Ideup\PhplistBundle\Entity\PhplistUserUser as PhplistUserUser;

class PhplistManager
{
    protected $phplistPath;

    protected $serverFrom;

    protected $em;

    public function  __construct(\Doctrine\ORM\EntityManager $em)
    {
        $this->setEntityManager($em);
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
        return array('confirmed' => true, 'htmlemail' => true, 'disabled' => false);
    }

    public function createPhplistUser($userData, PhplistList $list)
    {
        if (!is_array($userData)){
            throw new \Exception("User data must be an array");
        }

        if(!array_key_exists('email', $userData) || is_null($userData['email'])){
            throw new \Exception("Key 'email' is required");
        }

        $phplistUser = new PhplistUserUser();

        // Extra data.
        // If parameter has this 'param', from $userData
        $extraData = $this->getUserExtraData();
        $intersects = array_intersect_key($userData, $extraData);
        foreach ($intersects as $paramName => $paramValue){
            unset($extraData[$paramName]);
        }                
        $userData = array_merge($userData, $extraData);
        
        $phplistUser->fromArray($userData);
        
        $phplistUser->addLists($list);

        $this->getEntityManager()->persist($phplistUser);
        $this->getEntityManager()->flush();

        return $phplistUser;
    }

    public function createPhplistList($listData)
    {
        if (!is_array($listData)){
            throw new \Exception("List data must be an array");
        }

        if(!array_key_exists('name', $listData) || is_null($listData['name'])){
            throw new \Exception("Key 'name' is required");
        }

        if(count($this->getListRepository()->getListsByName($listData['name'])) > 0){
            throw new \Exception("List '{$listData['name']}' already exists.");
        }

        $phplistList = new PhplistList();        
        $phplistList->fromArray($listData);
        
        $this->getEntityManager()->persist($phplistList);
        $this->getEntityManager()->flush();

        return $phplistList;
    }

    protected function send($list, $subject, $content)
    {
        $filename = "/tmp/ideup_phplist_$list" . uniqid();

        // Write message content into a file to associate with -psend command
        $handle = fopen($filename, "w+");
        fwrite($handle, $content);
        fclose($handle);

        $output = null;
        $resultExec = exec("php {$this->getPhplistPath()} -psend -s $subject -l $list -f {$this->getServerFrom()} < $filename", &$output);
        return $output;
    }
}
