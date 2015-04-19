<?php

namespace Clapit\Service;

use Silex\Application;

use Doctrine\DBAL\Connection;
use Doctrine\ORM\EntityManager;

class BaseService
{
    protected $db;
    protected $api;
    protected $serializer;

    public function __construct(Connection $db, $api, EntityManager $em)
    {
        $this->db = $db;
        $this->api = $api;
        $this->em = $em;
    }

}