<?php

namespace Clapit\Entity;

use Doctrine\ORM\Mapping as ORM;
use DoctrineCommonCollectionsArrayCollection;
 
use JMS\Serializer\Annotation;
use JMS\Serializer\Annotation\Groups;


/**
 * Deal
 *
 * @ORM\Table(name="deal", indexes={@ORM\Index(name="url", columns={"url"}), @ORM\Index(name="uid", columns={"uid"}), @ORM\Index(name="promocode", columns={"promocode"})})
 * @ORM\Entity(repositoryClass="DealRepository")
 */
class Deal
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="uid", type="integer", nullable=false)
     */
    private $uid = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=250, nullable=false)
     * @Groups({"public"})
     */
    private $nom = '';

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="categorie", type="string", length=50, nullable=false)
     */
    private $categorie = '';

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=250, nullable=false)
     */
    private $image = '';

    /**
     * @var ArrayCollection
     * @Groups({"public"})
     */
    private $images = '';

    /**
     * @var string
     *
     * @ORM\Column(name="savoir", type="string", length=250, nullable=false)
     */
    private $savoir = '';

    /**
     * @var integer
     *
     * @ORM\Column(name="quantite", type="integer", nullable=false)
     * @Groups({"public"})
     */
    private $quantite = '1';

    /**
     * @var float
     *
     * @ORM\Column(name="valeur", type="float", precision=10, scale=0, nullable=false)
     * @Groups({"public"})
     */
    private $valeur = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="localite", type="string", length=50, nullable=false)
     */
    private $localite = '';

    /**
     * @var string
     *
     * @ORM\Column(name="options", type="string", length=250, nullable=false)
     */
    private $options = '';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_creation", type="datetime", nullable=false)
     * @Groups({"public"})
     */
    private $dateCreation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_lancement", type="datetime", nullable=false)
     * @Groups({"public"})
     */
    private $dateLancement;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_fin", type="datetime", nullable=false)
     * @Groups({"public"})
     */
    private $dateFin;

    /**
     * @var integer
     *
     * @ORM\Column(name="level", type="integer", nullable=false)
     */
    private $level = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="caution", type="integer", nullable=false)
     */
    private $caution = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="paiement", type="integer", nullable=false)
     */
    private $paiement = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="societe", type="string", length=250, nullable=false)
     * @Groups({"public"})
     */
    private $societe;

    /**
     * @var string
     *
     * @ORM\Column(name="description_societe", type="text", nullable=false)
     * @Groups({"public"})
     */
    private $descriptionSociete;

    /**
     * @var string
     *
     * @ORM\Column(name="website", type="string", length=100, nullable=false)
     * @Groups({"public"})
     */
    private $website;

    /**
     * @var string
     *
     * @ORM\Column(name="eshop", type="string", length=100, nullable=false)
     * @Groups({"public"})
     */
    private $eshop;

    /**
     * @var string
     *
     * @ORM\Column(name="facebook", type="string", length=100, nullable=false)
     * @Groups({"public"})
     */
    private $facebook;

    /**
     * @var string
     *
     * @ORM\Column(name="twitter", type="string", length=100, nullable=false)
     * @Groups({"public"})
     */
    private $twitter;

    /**
     * @var string
     *
     * @ORM\Column(name="pinterest", type="string", length=250, nullable=false)
     * @Groups({"public"})
     */
    private $pinterest;

    /**
     * @var string
     *
     * @ORM\Column(name="app_store", type="string", length=255, nullable=false)
     */
    private $appStore;

    /**
     * @var string
     *
     * @ORM\Column(name="play_store", type="string", length=255, nullable=false)
     * @Groups({"public"})
     */
    private $playStore;

    /**
     * @var string
     *
     * @ORM\Column(name="localisation", type="text", nullable=false)
     */
    private $localisation;

    /**
     * @var integer
     *
     * @ORM\Column(name="duree", type="integer", nullable=false)
     */
    private $duree = '1';

    /**
     * @var integer
     *
     * @ORM\Column(name="vues", type="integer", nullable=false)
     */
    private $vues = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="players", type="integer", nullable=false)
     */
    private $players = '0';

    /**
     * @var integer
     *
     * @ORM\OneToOne(targetEntity="Clapit\Entity\Url")
     * @ORM\JoinColumn(name="url", referencedColumnName="id", nullable=false)
     * @Groups({"public"})
     */
    private $url;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_desiree", type="datetime", nullable=false)
     */
    private $dateDesiree = '0000-00-00 00:00:00';

    /**
     * @var string
     *
     * @ORM\Column(name="bg_special", type="string", length=128, nullable=true)
     */
    private $bgSpecial;

    /**
     * @var string
     *
     * @ORM\Column(name="couleur_special", type="string", length=10, nullable=true)
     */
    private $couleurSpecial;

    /**
     * @var string
     *
     * @ORM\Column(name="motif_special", type="string", length=18, nullable=true)
     */
    private $motifSpecial;

    /**
     * @var string
     *
     * @ORM\Column(name="logo", type="string", length=128, nullable=true)
     * @Groups({"public"})
     */
    private $logo;

    /**
     * @var string
     *
     * @ORM\Column(name="img_produit", type="string", length=128, nullable=true)
     * @Groups({"public"})
     */
    private $imgProduit;

    /**
     * @var string
     *
     * @ORM\Column(name="fb_app_id", type="string", length=20, nullable=true)
     * @Groups({"public"})
     */
    private $fbAppId;

    /**
     * @var string
     *
     * @ORM\Column(name="fb", type="string", length=100, nullable=true)
     * @Groups({"public"})
     */
    private $fb;

    /**
     * @var integer
     *
     * @ORM\Column(name="type_offre", type="smallint", nullable=false)
     */
    private $typeOffre = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="push", type="string", length=255, nullable=true)
     */
    private $push;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_produit", type="string", length=255, nullable=true)
     * @Groups({"public"})
     */
    private $nomProduit;

    /**
     * @var string
     *
     * @ORM\Column(name="description_breve", type="string", length=255, nullable=true)
     * @Groups({"public"})
     */
    private $descriptionBreve;

    /**
     * @var integer
     *
     * @ORM\Column(name="age_limit", type="integer", nullable=false)
     * @Groups({"public"})
     */
    private $ageLimit;

    /**
     * @var boolean
     *
     * @ORM\Column(name="boutique", type="boolean", nullable=false)
     */
    private $boutique = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="promocode", type="string", length=255, nullable=false)
     */
    private $promocode;

    /**
     * @var ArrayCollection $pdvs
     *
     * @ORM\OneToMany(targetEntity="Clapit\Entity\Pdv", mappedBy="deal")
     * @Groups({"public"})
     */
    private $pdvs;

    /**
     * @var ArrayCollection $winners
     * 
     * @ORM\OneToMany(targetEntity="Clapit\Entity\Gagnants", mappedBy="deal")
     * @Groups({"public"})
     */
    private $winners;

    /**
     * @var integer
     *
     * @Groups({"public"})
     */
    private $pdvsCount;


    /**
     * Image url prefix on midipile.com
     * 
     * @var string
     */
    public static $imagePrefix = "images/deals_pics/";

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
     * Set uid
     *
     * @param integer $uid
     * @return Deal
     */
    public function setUid($uid)
    {
        $this->uid = $uid;

        return $this;
    }

    /**
     * Get uid
     *
     * @return integer 
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Deal
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
     * Set description
     *
     * @param string $description
     * @return Deal
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set categorie
     *
     * @param string $categorie
     * @return Deal
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return string 
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set image
     *
     * @param string $image
     * @return Deal
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage()
    {
        return $this->image;
    }


    /**
     * Set image
     *
     * @param string $images
     * @return Deal
     */
    public function setImages($images)
    {
        $this->images = $images;

        return $this;
    }

    /**
     * Get images
     *
     * @return ArrayCollection 
     */
    public function getImages()
    {
        return $this->images;
    }


    /**
     * Set savoir
     *
     * @param string $savoir
     * @return Deal
     */
    public function setSavoir($savoir)
    {
        $this->savoir = $savoir;

        return $this;
    }

    /**
     * Get savoir
     *
     * @return string 
     */
    public function getSavoir()
    {
        return $this->savoir;
    }

    /**
     * Set quantite
     *
     * @param integer $quantite
     * @return Deal
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get quantite
     *
     * @return integer 
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * Set valeur
     *
     * @param float $valeur
     * @return Deal
     */
    public function setValeur($valeur)
    {
        $this->valeur = $valeur;

        return $this;
    }

    /**
     * Get valeur
     *
     * @return float 
     */
    public function getValeur()
    {
        return $this->valeur;
    }

    /**
     * Set localite
     *
     * @param string $localite
     * @return Deal
     */
    public function setLocalite($localite)
    {
        $this->localite = $localite;

        return $this;
    }

    /**
     * Get localite
     *
     * @return string 
     */
    public function getLocalite()
    {
        return $this->localite;
    }

    /**
     * Set options
     *
     * @param string $options
     * @return Deal
     */
    public function setOptions($options)
    {
        $this->options = $options;

        return $this;
    }

    /**
     * Get options
     *
     * @return string 
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     * @return Deal
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * Get dateCreation
     *
     * @return \DateTime 
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * Set dateLancement
     *
     * @param \DateTime $dateLancement
     * @return Deal
     */
    public function setDateLancement($dateLancement)
    {
        $this->dateLancement = $dateLancement;

        return $this;
    }

    /**
     * Get dateLancement
     *
     * @return \DateTime 
     */
    public function getDateLancement()
    {
        return $this->dateLancement;
    }

    /**
     * Set dateFin
     *
     * @param \DateTime $dateFin
     * @return Deal
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * Get dateFin
     *
     * @return \DateTime 
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * Set level
     *
     * @param integer $level
     * @return Deal
     */
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * Get level
     *
     * @return integer 
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Set caution
     *
     * @param integer $caution
     * @return Deal
     */
    public function setCaution($caution)
    {
        $this->caution = $caution;

        return $this;
    }

    /**
     * Get caution
     *
     * @return integer 
     */
    public function getCaution()
    {
        return $this->caution;
    }

    /**
     * Set paiement
     *
     * @param integer $paiement
     * @return Deal
     */
    public function setPaiement($paiement)
    {
        $this->paiement = $paiement;

        return $this;
    }

    /**
     * Get paiement
     *
     * @return integer 
     */
    public function getPaiement()
    {
        return $this->paiement;
    }

    /**
     * Set societe
     *
     * @param string $societe
     * @return Deal
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
     * Set descriptionSociete
     *
     * @param string $descriptionSociete
     * @return Deal
     */
    public function setDescriptionSociete($descriptionSociete)
    {
        $this->descriptionSociete = $descriptionSociete;

        return $this;
    }

    /**
     * Get descriptionSociete
     *
     * @return string 
     */
    public function getDescriptionSociete()
    {
        return $this->descriptionSociete;
    }

    /**
     * Set website
     *
     * @param string $website
     * @return Deal
     */
    public function setWebsite($website)
    {
        $this->website = $website;

        return $this;
    }

    /**
     * Get website
     *
     * @return string 
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * Set eshop
     *
     * @param string $eshop
     * @return Deal
     */
    public function setEshop($eshop)
    {
        $this->eshop = $eshop;

        return $this;
    }

    /**
     * Get eshop
     *
     * @return string 
     */
    public function getEshop()
    {
        return $this->eshop;
    }

    /**
     * Set facebook
     *
     * @param string $facebook
     * @return Deal
     */
    public function setFacebook($facebook)
    {
        $this->facebook = $facebook;

        return $this;
    }

    /**
     * Get facebook
     *
     * @return string 
     */
    public function getFacebook()
    {
        return $this->facebook;
    }

    /**
     * Set twitter
     *
     * @param string $twitter
     * @return Deal
     */
    public function setTwitter($twitter)
    {
        $this->twitter = $twitter;

        return $this;
    }

    /**
     * Get twitter
     *
     * @return string 
     */
    public function getTwitter()
    {
        return $this->twitter;
    }

    /**
     * Set pinterest
     *
     * @param string $pinterest
     * @return Deal
     */
    public function setPinterest($pinterest)
    {
        $this->pinterest = $pinterest;

        return $this;
    }

    /**
     * Get pinterest
     *
     * @return string 
     */
    public function getPinterest()
    {
        return $this->pinterest;
    }

    /**
     * Set appStore
     *
     * @param string $appStore
     * @return Deal
     */
    public function setAppStore($appStore)
    {
        $this->appStore = $appStore;

        return $this;
    }

    /**
     * Get appStore
     *
     * @return string 
     */
    public function getAppStore()
    {
        return $this->appStore;
    }

    /**
     * Set playStore
     *
     * @param string $playStore
     * @return Deal
     */
    public function setPlayStore($playStore)
    {
        $this->playStore = $playStore;

        return $this;
    }

    /**
     * Get playStore
     *
     * @return string 
     */
    public function getPlayStore()
    {
        return $this->playStore;
    }

    /**
     * Set localisation
     *
     * @param string $localisation
     * @return Deal
     */
    public function setLocalisation($localisation)
    {
        $this->localisation = $localisation;

        return $this;
    }

    /**
     * Get localisation
     *
     * @return string 
     */
    public function getLocalisation()
    {
        return $this->localisation;
    }

    /**
     * Set duree
     *
     * @param integer $duree
     * @return Deal
     */
    public function setDuree($duree)
    {
        $this->duree = $duree;

        return $this;
    }

    /**
     * Get duree
     *
     * @return integer 
     */
    public function getDuree()
    {
        return $this->duree;
    }

    /**
     * Set vues
     *
     * @param integer $vues
     * @return Deal
     */
    public function setVues($vues)
    {
        $this->vues = $vues;

        return $this;
    }

    /**
     * Get vues
     *
     * @return integer 
     */
    public function getVues()
    {
        return $this->vues;
    }

    /**
     * Set players
     *
     * @param integer $players
     * @return Deal
     */
    public function setPlayers($players)
    {
        $this->players = $players;

        return $this;
    }

    /**
     * Get players
     *
     * @return integer 
     */
    public function getPlayers()
    {
        return $this->players;
    }

    /**
     * Set url
     *
     * @param integer $url
     * @return Deal
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return \Clapit\Entity\Url 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set dateDesiree
     *
     * @param \DateTime $dateDesiree
     * @return Deal
     */
    public function setDateDesiree($dateDesiree)
    {
        $this->dateDesiree = $dateDesiree;

        return $this;
    }

    /**
     * Get dateDesiree
     *
     * @return \DateTime 
     */
    public function getDateDesiree()
    {
        return $this->dateDesiree;
    }

    /**
     * Set bgSpecial
     *
     * @param string $bgSpecial
     * @return Deal
     */
    public function setBgSpecial($bgSpecial)
    {
        $this->bgSpecial = $bgSpecial;

        return $this;
    }

    /**
     * Get bgSpecial
     *
     * @return string 
     */
    public function getBgSpecial()
    {
        return $this->bgSpecial;
    }

    /**
     * Set couleurSpecial
     *
     * @param string $couleurSpecial
     * @return Deal
     */
    public function setCouleurSpecial($couleurSpecial)
    {
        $this->couleurSpecial = $couleurSpecial;

        return $this;
    }

    /**
     * Get couleurSpecial
     *
     * @return string 
     */
    public function getCouleurSpecial()
    {
        return $this->couleurSpecial;
    }

    /**
     * Set motifSpecial
     *
     * @param string $motifSpecial
     * @return Deal
     */
    public function setMotifSpecial($motifSpecial)
    {
        $this->motifSpecial = $motifSpecial;

        return $this;
    }

    /**
     * Get motifSpecial
     *
     * @return string 
     */
    public function getMotifSpecial()
    {
        return $this->motifSpecial;
    }

    /**
     * Set logo
     *
     * @param string $logo
     * @return Deal
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * Get logo
     *
     * @return string 
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Set imgProduit
     *
     * @param string $imgProduit
     * @return Deal
     */
    public function setImgProduit($imgProduit)
    {
        $this->imgProduit = $imgProduit;

        return $this;
    }

    /**
     * Get imgProduit
     *
     * @return string 
     */
    public function getImgProduit()
    {
        return $this->imgProduit;
    }

    /**
     * Set fbAppId
     *
     * @param string $fbAppId
     * @return Deal
     */
    public function setFbAppId($fbAppId)
    {
        $this->fbAppId = $fbAppId;

        return $this;
    }

    /**
     * Get fbAppId
     *
     * @return string 
     */
    public function getFbAppId()
    {
        return $this->fbAppId;
    }

    /**
     * Set fb
     *
     * @param string $fb
     * @return Deal
     */
    public function setFb($fb)
    {
        $this->fb = $fb;

        return $this;
    }

    /**
     * Get fb
     *
     * @return string 
     */
    public function getFb()
    {
        return $this->fb;
    }

    /**
     * Set typeOffre
     *
     * @param integer $typeOffre
     * @return Deal
     */
    public function setTypeOffre($typeOffre)
    {
        $this->typeOffre = $typeOffre;

        return $this;
    }

    /**
     * Get typeOffre
     *
     * @return integer 
     */
    public function getTypeOffre()
    {
        return $this->typeOffre;
    }

    /**
     * Set push
     *
     * @param string $push
     * @return Deal
     */
    public function setPush($push)
    {
        $this->push = $push;

        return $this;
    }

    /**
     * Get push
     *
     * @return string 
     */
    public function getPush()
    {
        return $this->push;
    }

    /**
     * Set nomProduit
     *
     * @param string $nomProduit
     * @return Deal
     */
    public function setNomProduit($nomProduit)
    {
        $this->nomProduit = $nomProduit;

        return $this;
    }

    /**
     * Get nomProduit
     *
     * @return string 
     */
    public function getNomProduit()
    {
        return $this->nomProduit;
    }

    /**
     * Set descriptionBreve
     *
     * @param string $descriptionBreve
     * @return Deal
     */
    public function setDescriptionBreve($descriptionBreve)
    {
        $this->descriptionBreve = $descriptionBreve;

        return $this;
    }

    /**
     * Get descriptionBreve
     *
     * @return string 
     */
    public function getDescriptionBreve()
    {
        return $this->descriptionBreve;
    }

    /**
     * Set ageLimit
     *
     * @param integer $ageLimit
     * @return Deal
     */
    public function setAgeLimit($ageLimit)
    {
        $this->ageLimit = $ageLimit;

        return $this;
    }

    /**
     * Get ageLimit
     *
     * @return integer 
     */
    public function getAgeLimit()
    {
        return $this->ageLimit;
    }

    /**
     * Set boutique
     *
     * @param boolean $boutique
     * @return Deal
     */
    public function setBoutique($boutique)
    {
        $this->boutique = $boutique;

        return $this;
    }

    /**
     * Get boutique
     *
     * @return boolean 
     */
    public function getBoutique()
    {
        return $this->boutique;
    }

    /**
     * Set promocode
     *
     * @param string $promocode
     * @return Deal
     */
    public function setPromocode($promocode)
    {
        $this->promocode = $promocode;

        return $this;
    }

    /**
     * Get promocode
     *
     * @return string 
     */
    public function getPromocode()
    {
        return $this->promocode;
    }

    /**
     * @param Pdv $pdv
     */
    public function addPdv(Pdv $pdv) {
        $pdv->setDeal($this);
 
        // Si l'objet fait déjà partie de la collection on ne l'ajoute pas
        if (!$this->pdvs->contains($pdv)) {
            $this->pdvs->add($pdv);
        }
    }
 
    /**
     * @return ArrayCollection $pdvs
     */
    public function getPdvs() {
        return $this->pdvs;
    }

    /**
     * Set number of PDV
     *
     * @param string $pdvsCount
     * @return Deal
     */
    public function setPdvsCount($pdvsCount){
        $this->pdvsCount = $pdvsCount;
        return $this;
    }

    /**
     * @return integer number of point of vente/sell
     */
    public function getPdvsCount(){
        return $this->pdvsCount;
    }

    /**
     * Set winners
     * @param Array $winners user
     */
    public function setWinners($winners){
        $this->winners = $winners;

        return $this;
    }

    /**
     * Get winners list
     * @return Array users
     */
    public function getWinners(){
        return $this->winners;
    }
 
    public function __construct() {
        $this->pdvs = new ArrayCollection();
    }
}
