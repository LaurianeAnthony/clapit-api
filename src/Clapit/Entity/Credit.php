<?php

namespace Clapit\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Credit
 *
 * @ORM\Table(name="credit", indexes={@ORM\Index(name="uid", columns={"uid"})})
 * @ORM\Entity
 */
class Credit
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
     * @ORM\Column(name="nom", type="string", length=50, nullable=false)
     */
    private $nom = '';

    /**
     * @var integer
     *
     * @ORM\Column(name="credit", type="integer", nullable=false)
     */
    private $credit = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="utilisation", type="integer", nullable=false)
     */
    private $utilisation = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="parrain", type="integer", nullable=true)
     */
    private $parrain;

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
     * @var \Clapit\Entity\Users
     *
     * @ORM\ManyToOne(targetEntity="Clapit\Entity\Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="uid", referencedColumnName="id")
     * })
     */
    private $uid;



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
     * Set nom
     *
     * @param string $nom
     * @return Credit
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
     * Set credit
     *
     * @param integer $credit
     * @return Credit
     */
    public function setCredit($credit)
    {
        $this->credit = $credit;

        return $this;
    }

    /**
     * Get credit
     *
     * @return integer 
     */
    public function getCredit()
    {
        return $this->credit;
    }

    /**
     * Set utilisation
     *
     * @param integer $utilisation
     * @return Credit
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
     * Set parrain
     *
     * @param integer $parrain
     * @return Credit
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
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     * @return Credit
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
     * @return Credit
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
     * Set uid
     *
     * @param \Clapit\Entity\Users $uid
     * @return Credit
     */
    public function setUid(\Clapit\Entity\Users $uid = null)
    {
        $this->uid = $uid;

        return $this;
    }

    /**
     * Get uid
     *
     * @return \Clapit\Entity\Users 
     */
    public function getUid()
    {
        return $this->uid;
    }
}
