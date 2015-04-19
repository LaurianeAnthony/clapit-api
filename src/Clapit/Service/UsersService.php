<?php

namespace Clapit\Service;

use Silex\Application;

use Symfony\Component\HttpFoundation\Request;

use Doctrine\DBAL\Connection;
use Doctrine\ORM\EntityManager;

use Clapit\Entity\User;

class UsersService extends BaseService
{

    /**
    * @var string
    */
    private static $tableName = 'users';

    /**
    * @var string
    */
    private static $tableNameChance = 'bonus';

    /**
     * @var CreditsService
     */
    private $creditService;

    /**
     * @var BadgesService
     */
    private $badgesService;

    /**
     * @var ChancesService
     */
    private $chancesService;

    private static $prefixParrainage = 'bfrxv';

    public function __construct(Connection $db, $api, EntityManager $em, CreditsService $creditService, BadgesService $badgesService, ChancesService $chancesService)
    {
        parent::__construct($db, $api, $em);
        $this->creditsService = $creditService;
        $this->badgesService = $badgesService;
        $this->chancesService = $chancesService;
    }

    public function hashPwd($pwd){
        return base64_encode("bsx466" .  $pwd . "bsx466");
    }
    public function unHashPwd($pwd){
        return str_replace('bsx466', '', base64_decode($pwd));
    }

    /**
     * Register the user
     * @param  Users $user the user
     * @param  string $ip  client IP adresses
     * @return
     */
    public function registerUser($data, User $user, $ip = ''){

        if(!empty($data['fid'])){
            $fid = $data['fid'];
            $password = $this->hashPwd($data['fid']);
        } else {
            $fid = null;
            $password = $this->hashPwd($data['password']);
        }

        $parrain = (empty($data['parrain'])) ? null : $this->decodeParrainageCode($data['parrain']);
        $newsletter = (empty($data['newsletter'])) ? 0 : $data['newsletter'];
        $referer = (empty($data['referer'])) ? null : $data['referer'];
        $id_device = (empty($data['id_device'])) ? null : $data['id_device'];


        $user->setNom($data['lastname']);
        $user->setPrenom($data['firstname']);
        $user->setEmail($data['email']);
        $user->setCgv($data['cgv']);

        $user->setFid($fid);
        $user->setPassword($password);
        $user->setParrain($parrain);
        $user->setParrain($parrain);
        $user->setNewsletter($newsletter);
        $user->setReferer($referer);
        $user->setIdDevice($id_device);
        $user->setIp($ip);

        return $user;
    }

    /**
     * Generate header for the given user
     * @param  Users $user [description]
     * @return [type]       [description]
     */
    public function generateHeader(Users $user){
        $nonce = base64_encode( substr(md5(uniqid('nonce_', true)), 0, 16) );
        $created = date('c');
        $digest = base64_encode( sha1( $this->api['secret'] . $user->getId() . $user->getEmail() . $nonce ) );

        $headers = array(
            "Authorization" => 'WSSE profile="UsernameToken"',
            'x-wsse'        => "UsernameToken Username=\"{$user['email']}\", PasswordDigest=\"{$digest}\", Nonce=\"{$nonce}\", Created=\"{$created}\""
        );

        return $headers;
    }

    /**
     * Authentificate the user based on the HTTP header x-wsse
     * @param  Request $request the request
     * @return mixed            the user infos (in an array) or false if cannot be logged
     */
    public function authentificate(Request $request){
        $wsseRegex = '/UsernameToken Username="([^"]+)", PasswordDigest="([^"]+)", Nonce="([^"]+)", Created="([^"]+)"/';
        if (!$request->headers->has('x-wsse') || 1 !== preg_match($wsseRegex, $request->headers->get('x-wsse'), $matches)) {
            throw new \Exception('WSSE Header wrong');
        }

        $user = $this->getUserByEmail($matches[1]);

        $digest   = $matches[2];
        $nonce    = $matches[3];
        $created  = $matches[4];

        // Pas de validation du nonce

        // Valide le Secret
        $expected = base64_encode( sha1( $this->api['secret'] . $user['id'] . $user['email'] . ($nonce) ) );

        return ( $digest === $expected) ? $user : false;
    }

    /**
     * update user data (whitout pasword)
     * @param  int $userId 
     * @param  array $data   form data
     * @return int           request result
     */
    public function updateUser($userId, $data){

        $newsletter = (empty($data['newsletter'])) ? 0 : $data['newsletter'];
        $mobile = (empty($data['mobile'])) ? '' : $data['mobile'];

        $this->db->executeUpdate('
            UPDATE ' . self::$tableName . '
            SET
               nom=?,
               prenom=?,
               email=?,
               newsletter=?,
               mobile=?,
               rue=?,
               rue_bis=?,
               code_postal=?,
               ville=?,
               pays=?
            WHERE id=?',
            array(
               $data['lastname'],
               $data['firstname'],
               $data['email'],
               $newsletter,
               $mobile,
               $data['rue'],
               $data['rue_bis'],
               $data['code_postal'],
               $data['ville'],
               $data['pays'],
               $userId
            ));

        return $this->db->lastInsertId();
    }

    /**
     * update user data (whitout pasword)
     * @param  int $userId
     * @return int           request result
     */
    public function updateUserPassword($userId, $password){

        $password = $this->hashPwd($password);

        $this->db->executeUpdate('
            UPDATE ' . self::$tableName . '
            SET
               password=?
            WHERE id=?',
            array(
               $password,
               $userId
            ));

        return $this->db->lastInsertId();
    }


    /**
     * Return user data from email adresse
     * @param  string $email email adresses of the user
     * @return array         user data
     */
    public function getUserByEmail($email)
    {
        $query = "SELECT id FROM " . self::$tableName . " WHERE email=? ";
        $statement = $this->db->executeQuery($query, array($email));

        $user = $statement->fetch();

        return $this->getUserById($user['id'], 'u.password, u.fid,');
    }

    /**
     * Return user data from user id
     * @param  string $uid              id of the user
     * @param  string $additionalField  additional selectfield
     * @return array                    user data
     */
    public function getUserById($uid, $additionalField = '')
    {
        $query = "
            SELECT
                u.id,
                u.email,
                u.date_inscription,
                u.active,
                u.civilite,
                u.nom,
                u.prenom,
                u.rue,
                u.rue_bis,
                u.code_postal,
                u.ville,
                u.pays,
                u.mobile,
                u.anniversaire,
                u.parrain,
                u.parrain_blog,
                u.cgv,
                u.newsletter,
                u.banque,
                u.id_device,
                $additionalField
                COUNT(bonus.id) as chance
            FROM " . self::$tableName . " as u
            LEFT JOIN bonus ON bonus.uid=u.id
            WHERE u.id=? AND bonus.utilisation=0";

        $statement = $this->db->executeQuery($query, array($uid));

        $user = $statement->fetch();

        $user['chance'] = $this->chancesService->getSumByUserId($uid, 0, $user['banque']);
        $user['credit'] = $this->creditsService->getSumByUserId($uid, self::$tableName);
        $user['badges'] = $this->badgesService->getUserBadges($uid);
        $user['filleuls'] = $this->getFilleuls($uid);
        $user['parrainage_code'] = $this->getParrainageCode($user['id']);


        // array_walk_recursive($user, function (&$val) {
        //     if(is_null($val)){
        //         $val = "";
        //     }
        // });

        return $user;
    }

    /**
     * Return user data for logged user (in session)
     * @param  application $app silex app
     * @return array      user data
     */
    public function getLoggedUser(Application $app)
    {
        $userSession = $app['session']->get('user');

        $header = $this->generateHeader($userSession);

        return array($this->getUserById($userSession['id']), $header );
    }

    /**
     * CHeck if user with $fid exist
     * @param  string  $fid   user fid
     * @return array            user data
     */
    public function existFbUser($fid)
    {
        $queryUserExist = "SELECT * FROM users WHERE fid='$fid' LIMIT 0,1 ";
        $result = $this->db->fetchAll($queryUserExist, array());

        if( empty( $result ) ){
            return false;
        }

        return true;
    }
    /**
     * CHeck if user with $email exist
     * @param  string  $email   user email
     * @return array            user data
     */
    public function existEmailUser($email)
    {
        $queryUserExist = "SELECT * FROM users WHERE email='$email' LIMIT 0,1 ";
        $result = $this->db->fetchAll($queryUserExist, array());

        if( empty( $result ) ){
            return false;
        }

        return true;
    }

    /**
     * Remove one chance to the user
     * @param  array $user user data
     * @return integer     number of request executed
     */
    public function removeOneChance($user)
    {
        // Remove one chance to the user
        if($user['banque'] > 0) {
            // Use banque
            $resultChance = $this->db->executeUpdate('
                UPDATE ' . self::$tableName . '
                SET banque = banque-1
                WHERE id=?',
                array(
                    $user['id']
                ));
        } else {

            $query = "
                SELECT b.id
                FROM " . self::$tableNameChance . " as b
                WHERE b.uid= ?  AND utilisation=0 ORDER BY id ASC
                ";
            $statement = $this->db->executeQuery($query, array($user['id']));
            $result = $statement->fetch();

            // use chance in Bonus
            $resultChance = $this->db->executeUpdate('
                UPDATE ' . self::$tableNameChance . '
                SET utilisation = 1
                WHERE id = ? AND uid=? AND utilisation=0',
                array(
                    $result['id'],
                    $user['id']
                ));
        }

        return $resultChance;
    }

    /**
     * Return the parrainage code to be user by filleuls
     * @param  int $userId 
     * @return string         
     */
    private function getParrainageCode($userId){
        return base64_encode(self::$prefixParrainage . $userId . self::$prefixParrainage);
    }

    /**
     * Decode given parrainage code
     * @param  string $code the parrainage code
     * @return int          user id
     */
    public function decodeParrainageCode($code){
        return str_replace(self::$prefixParrainage, '', base64_decode($code));
    }

    /**
     * Return the list of filleuls for given user id
     * @param  int $uid user id
     * @return array    the filleuls users
     */
    public function getFilleuls($uid){
        $query = "
            SELECT
                u.email,
                u.nom,
                u.prenom
            FROM " . self::$tableName . " as u
            WHERE u.parrain=?";

        $statement = $this->db->executeQuery($query, array($uid));

        return $statement->fetchAll();
    }


    public function setIdDevice($user, $idDevice){
        $result = $this->db->executeUpdate('
            UPDATE ' . self::$tableName . '
            SET id_device = ?
            WHERE id=?',
            array(
                $idDevice,
                $user['id']
            ));

        $user['id_device'] = $idDevice;
        return $user;
    }
}
