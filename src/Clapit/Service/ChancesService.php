<?php

namespace Clapit\Service;

use Silex\Application;

use Symfony\Component\HttpFoundation\Request;


class ChancesService extends BaseService
{

    /**
    * @var string
    */
    private static $tableName = 'bonus';

    /**
     * Get user chance
     * @param  integer $uid             the user id
     * @param  integer $used            Restraint to only used bonus (default not used)
     * @param  integer $userBanque      The user banque amount (which is chance stored in user)
     * @return integer                  the user available bonus
     */
    public function getSumByUserId($uid, $used=0, $userBanque = 0){
        $query = "
            SELECT COUNT(b.id) as chance
            FROM ". self::$tableName ." as b
            WHERE b.uid=? AND b.utilisation=$used
            GROUP BY b.uid";

        $statement = $this->db->executeQuery($query, array($uid));
        $bonus = $statement->fetch();

        return (string) ($bonus['chance'] + $userBanque);
    }

    /**
     * Add chances to the users
     * @param int $uid             user id
     * @param int $numberOfChances number of chances to add
     * @param string $name         name of the chance
     */
    public function addChances($user, $numberOfChances, $name){

        for($i = 0; $i<$numberOfChances; $i++){
            $insertResult = $this->db->executeUpdate('
                INSERT INTO ' . self::$tableName . ' SET
                    uid=?,
                    nom=?',
                array(
                    $user['id'],
                    $name
                )
            );
        }
    }

}
