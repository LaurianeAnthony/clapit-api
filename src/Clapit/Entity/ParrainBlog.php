<?php

namespace Clapit\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ParrainBlog
 *
 * @ORM\Table(name="parrain_blog")
 * @ORM\Entity
 */
class ParrainBlog
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
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="url_blog", type="string", length=255, nullable=false)
     */
    private $urlBlog;

    /**
     * @var string
     *
     * @ORM\Column(name="url_parrain", type="string", length=255, nullable=false)
     */
    private $urlParrain;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbr_credit", type="integer", nullable=false)
     */
    private $nbrCredit;

    /**
     * @var boolean
     *
     * @ORM\Column(name="actif", type="boolean", nullable=false)
     */
    private $actif = '0';



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
     * @return ParrainBlog
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
     * Set urlBlog
     *
     * @param string $urlBlog
     * @return ParrainBlog
     */
    public function setUrlBlog($urlBlog)
    {
        $this->urlBlog = $urlBlog;

        return $this;
    }

    /**
     * Get urlBlog
     *
     * @return string 
     */
    public function getUrlBlog()
    {
        return $this->urlBlog;
    }

    /**
     * Set urlParrain
     *
     * @param string $urlParrain
     * @return ParrainBlog
     */
    public function setUrlParrain($urlParrain)
    {
        $this->urlParrain = $urlParrain;

        return $this;
    }

    /**
     * Get urlParrain
     *
     * @return string 
     */
    public function getUrlParrain()
    {
        return $this->urlParrain;
    }

    /**
     * Set nbrCredit
     *
     * @param integer $nbrCredit
     * @return ParrainBlog
     */
    public function setNbrCredit($nbrCredit)
    {
        $this->nbrCredit = $nbrCredit;

        return $this;
    }

    /**
     * Get nbrCredit
     *
     * @return integer 
     */
    public function getNbrCredit()
    {
        return $this->nbrCredit;
    }

    /**
     * Set actif
     *
     * @param boolean $actif
     * @return ParrainBlog
     */
    public function setActif($actif)
    {
        $this->actif = $actif;

        return $this;
    }

    /**
     * Get actif
     *
     * @return boolean 
     */
    public function getActif()
    {
        return $this->actif;
    }
}
