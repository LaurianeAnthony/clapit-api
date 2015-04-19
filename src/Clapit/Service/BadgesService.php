<?php

namespace Clapit\Service;

use Silex\Application;

use Symfony\Component\HttpFoundation\Request;

use Doctrine\DBAL\Connection;
use Doctrine\ORM\EntityManager;

class BadgesService extends BaseService
{

    /**
     * @var chancesService
     */
    private $chancesService;

    /**
    * @var string
    */
    private static $tableName = 'badges';
    private static $tableNameJoin = 'badges_users';

    private static $fanBadgeId = 4;
    private static $mobileBadgeId = 5;
    
    private static $parrainageBadgeIds = array(
        10 => array('id' => 1, 'chances' => 5),
        30 => array('id' => 2, 'chances' => 10),
        50 => array('id' => 3, 'chances' => 20),
        );

    public function __construct(Connection $db, $api, EntityManager $em, ChancesService $chancesService)
    {
        parent::__construct($db, $api, $em);
        $this->chancesService = $chancesService;
    }

    public function getUserBadges($uid){
        $query = "
            SELECT b.id, b.nom, b.description, b.credit
            FROM ". self::$tableName ." as b
            LEFT JOIN ". self::$tableNameJoin ." as bu ON b.id=bu.bid
            WHERE bu.uid=?";

        $statement = $this->db->executeQuery($query, array($uid));

        $badges = $statement->fetchAll();

        array_walk_recursive($badges, function (&$val) {
            if("UTF-8" == mb_detect_encoding($val) || empty(mb_detect_encoding($val)) ){
                $val = utf8_encode($val);
            }
        });

        return $badges;
    }

    public function getAll(){
        $query = "
            SELECT b.id, b.nom, b.description, b.credit
            FROM ". self::$tableName ." as b";

        $badges = $this->db->fetchAll($query);

        array_walk_recursive($badges, function (&$val) {
            if("UTF-8" == mb_detect_encoding($val) || empty(mb_detect_encoding($val)) ){
                $val = utf8_encode($val);
            }
        });

        return $badges;
    }

    public function hasBadge($user, $bid){
        foreach ($user['badges'] as $key => $badge) {
            if($badge['id'] == $bid){
                return true;
            }
        }
        return false;
    }

    public function addMobileBadge($user){
        $haveMobileBadge = false;

        if(empty($user['id_device'])){
            return;
        }

        $haveMobileBadge = $this->hasBadge($user , self::$mobileBadgeId);

        if(!$haveMobileBadge){
            $insertResult = $this->db->executeUpdate('
                INSERT INTO ' . self::$tableNameJoin . ' SET
                    bid=?,
                    uid=?,
                    date=NOW()',
                array(
                    self::$mobileBadgeId,
                    $user['id']
                )
            );

            $this->chancesService->addChances($user, 2, "Badge ".self::$mobileBadgeId);
        }
    }

    public function addParrainageBadge($user){

        if(empty($user['filleuls'])){
            return;
        }

        $numberOfFilleul = count($user['filleuls']);

        foreach (self::$parrainageBadgeIds as $priceBadge => $badge) {
            // if user filleuls is more then given badge fileuls required numbers
            if( $numberOfFilleul >= $priceBadge){
                // if user didn't have already this badge
                if(!$this->hasBadge($user, $badge['id'])){
                    // add badge to the user
                    $insertResult = $this->db->executeUpdate('
                        INSERT INTO ' . self::$tableNameJoin . ' SET
                            bid=?,
                            uid=?,
                            date=NOW()',
                        array(
                            $badge['id'],
                            $user['id']
                        )
                    );

                    $this->chancesService->addChances($user, $badge['chances'], "Badge ".$badge['id']);
                }
            }
        }
    }

    public function addFacebookLikeBadge($user){
        $hasFacebookBadge = false;

        $hasFacebookBadge = $this->hasBadge($user , self::$fanBadgeId);

        if(!$hasFacebookBadge){
            $insertResult = $this->db->executeUpdate('
                INSERT INTO ' . self::$tableNameJoin . ' SET
                    bid=?,
                    uid=?,
                    date=NOW()',
                array(
                    self::$fanBadgeId,
                    $user['id']
                )
            );

            $this->chancesService->addChances($user, 2, "Badge ".self::$fanBadgeId);
        }
    }
}
