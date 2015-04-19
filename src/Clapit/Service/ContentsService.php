<?php

namespace Clapit\Service;

use Silex\Application;

use Symfony\Component\HttpFoundation\Request;


class ContentsService extends BaseService
{

    /**
    * @var string
    */
    private static $tableName = 'content';


    public function getContentFromId($cid){
        $query = "
            SELECT c.content
            FROM ". self::$tableName ." as c
            WHERE c.id=?";

        $statement = $this->db->executeQuery($query, array($cid));

        $result = $statement->fetch();

        array_walk_recursive($result, function (&$val){
            if("UTF-8" == mb_detect_encoding($val)){
                $val = utf8_encode($val);
            }
        });

        return $result['content'] ;
    }

}
