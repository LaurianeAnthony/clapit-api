<?php

namespace Clapit\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bonus
 *
 * @ORM\Table(name="bonus", indexes={@ORM\Index(name="uid", columns={"uid"})})
 * @ORM\Entity
 */
class Bonus
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
     * @var integer
     *
     * @ORM\Column(name="uid", type="integer", nullable=false)
     */
    private $uid = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=50, nullable=false)
     */
    private $nom = '';

    /**
     * @var integer
     *
     * @ORM\Column(name="utilisation", type="integer", nullable=false)
     */
    private $utilisation = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_creation", type="datetime", nullable=false)
     */
    private $dateCreation = 'CURRENT_TIMESTAMP';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_utilisation", type="datetime", nullable=false)
     */
    private $dateUtilisation = '0000-00-00 00:00:00';

    /**
     * @var integer
     *
     * @ORM\Column(name="id_filleul", type="integer", nullable=true)
     */
    private $idFilleul;



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
     * @return Bonus
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
     * @return Bonus
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
     * Set utilisation
     *
     * @param integer $utilisation
     * @return Bonus
     */
    public function setUtilisation($utilisation)
    {
        $this->utilisation = $utilisation;

        return $this;
    }

    /**
     * Get utilisation
     *
     * @return integer 
     */
    public function getUtilisation()
    {
        return $this->utilisation;
    }

    /**
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     * @return Bonus
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
     * Set dateUtilisation
     *
     * @param \DateTime $dateUtilisation
     * @return Bonus
     */
    public function setDateUtilisation($dateUtilisation)
    {
        $this->dateUtilisation = $dateUtilisation;

        return $this;
    }

    /**
     * Get dateUtilisation
     *
     * @return \DateTime 
     */
    public function getDateUtilisation()
    {
        return $this->dateUtilisation;
    }

    /**
     * Set idFilleul
     *
     * @param integer $idFilleul
     * @return Bonus
     */
    public function setIdFilleul($idFilleul)
    {
        $this->idFilleul = $idFilleul;

        return $this;
    }

    /**
     * Get idFilleul
     *
     * @return integer 
     */
    public function getIdFilleul()
    {
        return $this->idFilleul;
    }
}
