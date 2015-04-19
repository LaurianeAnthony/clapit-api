<?php

namespace Clapit\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Users
 *
 * @ORM\Table(name="users", uniqueConstraints={@ORM\UniqueConstraint(name="email", columns={"email"})}, indexes={@ORM\Index(name="parrain", columns={"parrain"}), @ORM\Index(name="parrain_blog", columns={"parrain_blog"})})
 * @ORM\Entity
 */
class Users
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="fid", type="string", length=30, nullable=true)
     */
    private $fid;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=50, nullable=false)
     */
    private $email = '';

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=100, nullable=false)
     */
    private $password = '';

    /**
     * @var string
     *
     * @ORM\Column(name="usertype", type="string", length=20, nullable=true)
     */
    private $usertype;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_inscription", type="datetime", nullable=false)
     */
    private $dateInscription = 'CURRENT_TIMESTAMP';

    /**
     * @var integer
     *
     * @ORM\Column(name="banque", type="integer", nullable=false)
     */
    private $banque = '1';

    /**
     * @var integer
     *
     * @ORM\Column(name="active", type="integer", nullable=false)
     */
    private $active = '1';

    /**
     * @var string
     *
     * @ORM\Column(name="civilite", type="string", length=5, nullable=true)
     */
    private $civilite;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=40, nullable=false)
     */
    private $nom = '';

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=30, nullable=false)
     */
    private $prenom = '';

    /**
     * @var string
     *
     * @ORM\Column(name="rue", type="string", length=100, nullable=true)
     */
    private $rue;

    /**
     * @var string
     *
     * @ORM\Column(name="rue_bis", type="string", length=100, nullable=true)
     */
    private $rueBis;

    /**
     * @var string
     *
     * @ORM\Column(name="code_postal", type="string", length=10, nullable=true)
     */
    private $codePostal;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=50, nullable=true)
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="pays", type="string", length=30, nullable=true)
     */
    private $pays;

    /**
     * @var string
     *
     * @ORM\Column(name="mobile", type="string", length=20, nullable=false)
     */
    private $mobile = '';

    /**
     * @var string
     *
     * @ORM\Column(name="fixe", type="string", length=20, nullable=true)
     */
    private $fixe;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="anniversaire", type="date", nullable=false)
     */
    private $anniversaire = '0000-00-00';

    /**
     * @var integer
     *
     * @ORM\Column(name="parrain", type="integer", nullable=true)
     */
    private $parrain;

    /**
     * @var integer
     *
     * @ORM\Column(name="parrain_blog", type="integer", nullable=true)
     */
    private $parrainBlog;

    /**
     * @var integer
     *
     * @ORM\Column(name="cgv", type="integer", nullable=false)
     */
    private $cgv = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="newsletter", type="integer", nullable=false)
     */
    private $newsletter = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="annonceur", type="smallint", nullable=false)
     */
    private $annonceur = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="societe", type="string", length=100, nullable=true)
     */
    private $societe;

    /**
     * @var integer
     *
     * @ORM\Column(name="activite", type="integer", nullable=false)
     */
    private $activite = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="referer", type="string", length=256, nullable=true)
     */
    private $referer;

    /**
     * @var string
     *
     * @ORM\Column(name="ip_inscription", type="string", length=24, nullable=true)
     */
    private $ipInscription = '';

    /**
     * @var string
     *
     * @ORM\Column(name="id_device", type="text", nullable=true)
     */
    private $idDevice;



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
     * Set fid
     *
     * @param string $fid
     * @return Users
     */
    public function setFid($fid)
    {
        $this->fid = $fid;

        return $this;
    }

    /**
     * Get fid
     *
     * @return string 
     */
    public function getFid()
    {
        return $this->fid;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Users
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return Users
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set usertype
     *
     * @param string $usertype
     * @return Users
     */
    public function setUsertype($usertype)
    {
        $this->usertype = $usertype;

        return $this;
    }

    /**
     * Get usertype
     *
     * @return string 
     */
    public function getUsertype()
    {
        return $this->usertype;
    }

    /**
     * Set dateInscription
     *
     * @param \DateTime $dateInscription
     * @return Users
     */
    public function setDateInscription($dateInscription)
    {
        $this->dateInscription = $dateInscription;

        return $this;
    }

    /**
     * Get dateInscription
     *
     * @return \DateTime 
     */
    public function getDateInscription()
    {
        return $this->dateInscription;
    }

    /**
     * Set banque
     *
     * @param integer $banque
     * @return Users
     */
    public function setBanque($banque)
    {
        $this->banque = $banque;

        return $this;
    }

    /**
     * Get banque
     *
     * @return integer 
     */
    public function getBanque()
    {
        return $this->banque;
    }

    /**
     * Set active
     *
     * @param integer $active
     * @return Users
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return integer 
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set civilite
     *
     * @param string $civilite
     * @return Users
     */
    public function setCivilite($civilite)
    {
        $this->civilite = $civilite;

        return $this;
    }

    /**
     * Get civilite
     *
     * @return string 
     */
    public function getCivilite()
    {
        return $this->civilite;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Users
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     * @return Users
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set rue
     *
     * @param string $rue
     * @return Users
     */
    public function setRue($rue)
    {
        $this->rue = $rue;

        return $this;
    }

    /**
     * Get rue
     *
     * @return string 
     */
    public function getRue()
    {
        return $this->rue;
    }

    /**
     * Set rueBis
     *
     * @param string $rueBis
     * @return Users
     */
    public function setRueBis($rueBis)
    {
        $this->rueBis = $rueBis;

        return $this;
    }

    /**
     * Get rueBis
     *
     * @return string 
     */
    public function getRueBis()
    {
        return $this->rueBis;
    }

    /**
     * Set codePostal
     *
     * @param string $codePostal
     * @return Users
     */
    public function setCodePostal($codePostal)
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    /**
     * Get codePostal
     *
     * @return string 
     */
    public function getCodePostal()
    {
        return $this->codePostal;
    }

    /**
     * Set ville
     *
     * @param string $ville
     * @return Users
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string 
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set pays
     *
     * @param string $pays
     * @return Users
     */
    public function setPays($pays)
    {
        $this->pays = $pays;

        return $this;
    }

    /**
     * Get pays
     *
     * @return string 
     */
    public function getPays()
    {
        return $this->pays;
    }

    /**
     * Set mobile
     *
     * @param string $mobile
     * @return Users
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;

        return $this;
    }

    /**
     * Get mobile
     *
     * @return string 
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * Set fixe
     *
     * @param string $fixe
     * @return Users
     */
    public function setFixe($fixe)
    {
        $this->fixe = $fixe;

        return $this;
    }

    /**
     * Get fixe
     *
     * @return string 
     */
    public function getFixe()
    {
        return $this->fixe;
    }

    /**
     * Set anniversaire
     *
     * @param \DateTime $anniversaire
     * @return Users
     */
    public function setAnniversaire($anniversaire)
    {
        $this->anniversaire = $anniversaire;

        return $this;
    }

    /**
     * Get anniversaire
     *
     * @return \DateTime 
     */
    public function getAnniversaire()
    {
        return $this->anniversaire;
    }

    /**
     * Set parrain
     *
     * @param integer $parrain
     * @return Users
     */
    public function setParrain($parrain)
    {
        $this->parrain = $parrain;

        return $this;
    }

    /**
     * Get parrain
     *
     * @return integer 
     */
    public function getParrain()
    {
        return $this->parrain;
    }

    /**
     * Set parrainBlog
     *
     * @param integer $parrainBlog
     * @return Users
     */
    public function setParrainBlog($parrainBlog)
    {
        $this->parrainBlog = $parrainBlog;

        return $this;
    }

    /**
     * Get parrainBlog
     *
     * @return integer 
     */
    public function getParrainBlog()
    {
        return $this->parrainBlog;
    }

    /**
     * Set cgv
     *
     * @param integer $cgv
     * @return Users
     */
    public function setCgv($cgv)
    {
        $this->cgv = $cgv;

        return $this;
    }

    /**
     * Get cgv
     *
     * @return integer 
     */
    public function getCgv()
    {
        return $this->cgv;
    }

    /**
     * Set newsletter
     *
     * @param integer $newsletter
     * @return Users
     */
    public function setNewsletter($newsletter)
    {
        $this->newsletter = $newsletter;

        return $this;
    }

    /**
     * Get newsletter
     *
     * @return integer 
     */
    public function getNewsletter()
    {
        return $this->newsletter;
    }

    /**
     * Set annonceur
     *
     * @param integer $annonceur
     * @return Users
     */
    public function setAnnonceur($annonceur)
    {
        $this->annonceur = $annonceur;

        return $this;
    }

    /**
     * Get annonceur
     *
     * @return integer 
     */
    public function getAnnonceur()
    {
        return $this->annonceur;
    }

    /**
     * Set societe
     *
     * @param string $societe
     * @return Users
     */
    public function setSociete($societe)
    {
        $this->societe = $societe;

        return $this;
    }

    /**
     * Get societe
     *
     * @return string 
     */
    public function getSociete()
    {
        return $this->societe;
    }

    /**
     * Set activite
     *
     * @param integer $activite
     * @return Users
     */
    public function setActivite($activite)
    {
        $this->activite = $activite;

        return $this;
    }

    /**
     * Get activite
     *
     * @return integer 
     */
    public function getActivite()
    {
        return $this->activite;
    }

    /**
     * Set referer
     *
     * @param string $referer
     * @return Users
     */
    public function setReferer($referer)
    {
        $this->referer = $referer;

        return $this;
    }

    /**
     * Get referer
     *
     * @return string 
     */
    public function getReferer()
    {
        return $this->referer;
    }

    /**
     * Set ipInscription
     *
     * @param string $ipInscription
     * @return Users
     */
    public function setIpInscription($ipInscription)
    {
        $this->ipInscription = $ipInscription;

        return $this;
    }

    /**
     * Get ipInscription
     *
     * @return string 
     */
    public function getIpInscription()
    {
        return $this->ipInscription;
    }

    /**
     * Set idDevice
     *
     * @param string $idDevice
     * @return Users
     */
    public function setIdDevice($idDevice)
    {
        $this->idDevice = $idDevice;

        return $this;
    }

    /**
     * Get idDevice
     *
     * @return string 
     */
    public function getIdDevice()
    {
        return $this->idDevice;
    }
}
