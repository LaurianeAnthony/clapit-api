<?php

namespace Clapit\Service;

use Silex\Application;

use Symfony\Component\HttpFoundation\Request;


class CreditsService extends BaseService
{

    /**
    * @var string
    */
    private static $tableName = 'credit';

    /**
     * Get user credit
     * @param  integer $uid             the user id
     * @param  string  $userTableName   user db table
     * @param  integer $used            Restraint to only used credit (default not used)
     * @return integer                  the user available credit
     */
    public function getSumByUserId($uid, $userTableName = "users", $used=0){
        $query = "
            SELECT SUM(c.credit) as totalCredit
            FROM ". self::$tableName ." as c
            LEFT JOIN $userTableName as u ON c.uid=u.id
            WHERE c.uid=? AND c.utilisation=$used
            GROUP BY c.uid";

        $statement = $this->db->executeQuery($query, array($uid));

        $credit = $statement->fetch();

        return $credit['totalCredit'];
    }

}
