<?php

namespace Clapit\Service;

use Symfony\Component\HttpFoundation\JsonResponse;

use Doctrine\DBAL\Connection;
use Doctrine\ORM\EntityManager;

use Clapit\Helper\ClapitHelpers;
use Clapit\Entity;
use Clapit\Entity\Deal;

class DealsService extends BaseService
{

    /**
    * @var string
    */
    private static $tableName = 'deal';

    /**
    * @var string
    */
    private static $tableNamePlay = 'play';

    /**
    * @var string
    */
    private static $tableNameUser = 'users';

    /**
    * @var string
    */
    private static $tableNamePdv = 'pdv';

    /**
    * @var string
    */
    private static $tableNameWinner = 'gagnants';

    /**
    * @var string
    */
    private static $tableNameUrl = 'url';

    /**
     * @var UsersService
     */
    private $usersService;

    /**
     * @var ClapitHelpers
     */
    private $helpers;

    private static $imagePrefix = 'images/deals_pics/';

    public function __construct(Connection $db, $api, EntityManager $em, UsersService $usersService, ClapitHelpers $helpers)
    {
        parent::__construct($db, $api, $em);
        $this->usersService = $usersService;
        $this->helpers = $helpers;
    }

    /**
     * Get all active deal (deal you can participate on)
     * if active false get last 40 deals with winners
     * @param  boolean $active the active deal
     * @return array           deals
     */
    public function getAll($active = true)
    {
        
        $repo = $this->em->getRepository('Clapit\Entity\Deal');

        if($active){
            $deals = $repo->findActive();
        } else {

            $deals = $repo->findNotActive();
            // deals ended with winners
            // $query = "
            //     SELECT d.* 
            //     FROM " . self::$tableNameWinner . " g, " . self::$tableName . " d
            //     WHERE g.did=d.id 
            //     GROUP BY g.did 
            //     ORDER BY g.date DESC
            //     LIMIT 0, 40";
        }

        // formate image url
        foreach($deals as $key => $deal){
            $deal->setImages($this->helpers->convertImageToArray($deal->getImage(), Deal::$imagePrefix));
            $deal->setLogo($this->helpers->formateAdditionalImageUrl($deal->getLogo(), Deal::$imagePrefix));
            $deal->setImgProduit($this->helpers->formateAdditionalImageUrl($deal->getImgProduit(), Deal::$imagePrefix));

            $deal->setPdvsCount(count($deal->getPdvs()));

            $deal->setUrl($this->helpers->formateDealUrl($deal->getUrl()));
        }

        return $deals;
    }

    /**
     * Get deal data whitout other informations
     * @param  integer $did deal id
     * @return array        deal array
     */
    public function getBasicDealFromId($did){
        $query = "
            SELECT d.*
            FROM " . self::$tableName . " as d
            WHERE d.id=?";
        $statement = $this->db->executeQuery($query, array($did));
        $result = $statement->fetch();

        if(empty($result)){
            return $result;
        }

        array_walk_recursive($result, function (&$val) {
            if("UTF-8" == mb_detect_encoding($val)){
                // $val = mb_convert_encoding($val, "UTF-8", "ASCII");
                $val = utf8_encode($val);
            }
        });

        return $result;
    }


    /**
     * Get deal with winners, players and pdv from deal id
     * @param  integer $did deal id
     * @return array        deal/players/winners/pdv
     */
    public function getDealsFromId($did){
        $query = "
            SELECT
                COUNT(p.id) as numberOfParticipation,
                d.*
            FROM " . self::$tableName . " as d
            LEFT JOIN " . self::$tableNamePlay . " as p ON p.did=d.id
            WHERE d.id=?
            GROUP BY d.id";
        $statement = $this->db->executeQuery($query, array($did));
        $result = $statement->fetch();

        if(empty($result)){
            return $result;
        }

        array_walk_recursive($result, function (&$val) {
            if("UTF-8" == mb_detect_encoding($val)){
                // $val = mb_convert_encoding($val, "UTF-8", "ASCII");
                $val = utf8_encode($val);
            }
        });

        $result['players'] = $this->getPlayersFromDealsId($did);
        $result['pdv'] = $this->getPdvFromDealsId($did);
        $result['numberOfPdv'] = count($result['pdv']);

        // get winners if deals have ended
        if(strtotime($result['date_fin']) < time()){
            $result['winners'] = $this->getWinnerForDealsId($did);
        }

        return $result;
    }

    /**
     * Return the list of players who have participated to the deal
     * @param  integer $did the deal id
     * @return array        players
     */
    public function getPlayersFromDealsId($did){
        $query = "
            SELECT
                u.nom,
                u.prenom,
                u.email,
                u.civilite,
                COUNT(u.id) as playerParticipated
            FROM " . self::$tableNamePlay . " as p
            LEFT JOIN " . self::$tableNameUser . " as u ON p.uid=u.id
            WHERE p.did=?
            GROUP BY u.id
            ";
        $statement = $this->db->executeQuery($query, array($did));
        $result = $statement->fetchAll();

        return $result;
    }

    /**
     * Get all winners for the deals
     * @param  integer $did the deals id
     * @return array        winners
     */
    public function getWinnerForDealsId($did){
        $query = "
            SELECT
                u.nom,
                u.prenom,
                u.email,
                u.civilite
            FROM " . self::$tableNameWinner . " as w
            LEFT JOIN " . self::$tableNameUser . " as u ON w.uid=u.id
            WHERE w.did=?
            ";
        $statement = $this->db->executeQuery($query, array($did));
        $result = $statement->fetchAll();

        array_walk_recursive($result, function (&$val) {
            if("UTF-8" == mb_detect_encoding($val)){
                $val = utf8_encode($val);
            }
        });

        return $result;
    }

    /**
     * Get all deals where user have participated
     * @param  integer $uid     the user id
     * @param  integer $from    the index to from from
     * @param  integer $length  number of deals to get
     * @return array            deals
     */
    public function getDealsFromUserId($uid, $from = 0, $length = 15)
    {

        $query = "
            SELECT
                COUNT(p.id) as numberOfParticipation,
                d.*
            FROM " . self::$tableName . " as d
            LEFT JOIN " . self::$tableNamePlay . " as p ON p.did=d.id
            WHERE p.uid=$uid
            GROUP BY d.id
            ORDER BY date_fin DESC
            LIMIT $from,$length ";
        $result = $this->db->fetchAll($query);

        array_walk_recursive($result, function (&$val) {
            if("UTF-8" == mb_detect_encoding($val)){
                // $val = mb_convert_encoding($val, "UTF-8", "ASCII");
                $val = utf8_encode($val);
            }
        });

        foreach($result as $key => $deal){
            $result[$key]['images'] = $this->helpers->convertImageToArray($deal['image'], "images/deals_pics/");
            $result[$key]['logo'] = $this->helpers->formateAdditionalImageUrl($deal['logo'], 'images/deals_pics/');
            $result[$key]['img_produit'] = $this->helpers->formateAdditionalImageUrl($deal['img_produit'], 'images/deals_pics/');
            $result[$key]['pdv'] = $this->getPdvFromDealsId($deal['id']);
            $result[$key]['numberOfPdv'] = count($result[$key]['pdv']);
            $result[$key]['url'] =  $this->getUrl($deal['url']);
        }
        unset($result['image']);

        return $result;
    }

    /**
     * Check if the given deal is still open for participation
     * @param  integer  $did the deal id
     * @return boolean       true if deals open for participation, false otherweise
     */
    public function isDealOpen($did)
    {
        $query = "
            SELECT d.id
            FROM " . self::$tableName . " as d
            WHERE d.id= ?  AND date_lancement <= NOW() AND date_fin >= NOW()
            ";
        $statement = $this->db->executeQuery($query, array($did));
        $result = $statement->fetchAll();

        if(empty($result)){
            return false;
        } else {
            return true;
        }
    }

    /**
     * Make user participation, add one player to the deal, remove one chance to the user
     * @param  integer $did  the deal id
     * @param  array $user   user data
     * @param  string $ip    client ip adress
     * @return integer       row affected by the query
     */
    public function play($did, $user, $ip){

        $adresses =   $user['nom'] . ' ' . $user['prenom'] . " \n " .
                    $user['rue'] . $user['rue_bis'] . " \n " .
                    $user['code_postal'] . $user['ville'] . " \n " .
                    $user['pays'];


        $resultChance = $this->usersService->removeOneChance($user);

        if(1 !== $resultChance){
            throw new \Exception("L'utilisateur n'a pas de chance.", 1);
        }

        $insertResult = $this->db->executeUpdate('
            INSERT INTO ' . self::$tableNamePlay . ' SET
                uid=?,
                did=?,
                ip=?,
                adresse=?,
                date=NOW()',
            array(
                $user['id'],
                $did,
                $ip,
                $adresses
            ));

        // Add players to the deal
        $this->db->executeUpdate('
            UPDATE ' . self::$tableName . '
            SET players = players+1
            WHERE id=?',
            array(
                $did
            ));

        return $insertResult;
    }

    /**
     * Get list of winners for given deal
     * @param  integer $did  the deal id
     * @return array         list of deals
     */
    public function getWinners($did){
        $query = "
            SELECT
                u.nom, u.prenom, u.email 
            FROM " . self::$tableNameWinner . " as g
            LEFT JOIN " . self::$tableNameUser . " as u ON u.id=g.uid
            WHERE g.did=$did";

        return $this->db->fetchAll($query);
    }

}
