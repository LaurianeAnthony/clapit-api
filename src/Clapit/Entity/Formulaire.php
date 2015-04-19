<?php

namespace Clapit\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Formulaire
 *
 * @ORM\Table(name="formulaire", indexes={@ORM\Index(name="did", columns={"did"})})
 * @ORM\Entity
 */
class Formulaire
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
     * @ORM\Column(name="nom", type="string", length=250, nullable=false)
     */
    private $nom = '';

    /**
     * @var string
     *
     * @ORM\Column(name="bdd", type="string", length=20, nullable=false)
     */
    private $bdd = '';

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=30, nullable=false)
     */
    private $type = '';

    /**
     * @var integer
     *
     * @ORM\Column(name="visible", type="integer", nullable=false)
     */
    private $visible = '1';

    /**
     * @var integer
     *
     * @ORM\Column(name="needed", type="integer", nullable=false)
     */
    private $needed = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="length", type="integer", nullable=false)
     */
    private $length = '50';

    /**
     * @var string
     *
     * @ORM\Column(name="options", type="text", nullable=false)
     */
    private $options;

    /**
     * @var integer
     *
     * @ORM\Column(name="position", type="integer", nullable=false)
     */
    private $position = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="fieldset", type="integer", nullable=false)
     */
    private $fieldset = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="col", type="string", length=10, nullable=false)
     */
    private $col = '';

    /**
     * @var integer
     *
     * @ORM\Column(name="did", type="integer", nullable=true)
     */
    private $did = '0';



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
     * @return Formulaire
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
     * Set bdd
     *
     * @param string $bdd
     * @return Formulaire
     */
    public function setBdd($bdd)
    {
        $this->bdd = $bdd;

        return $this;
    }

    /**
     * Get bdd
     *
     * @return string 
     */
    public function getBdd()
    {
        return $this->bdd;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Formulaire
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set visible
     *
     * @param integer $visible
     * @return Formulaire
     */
    public function setVisible($visible)
    {
        $this->visible = $visible;

        return $this;
    }

    /**
     * Get visible
     *
     * @return integer 
     */
    public function getVisible()
    {
        return $this->visible;
    }

    /**
     * Set needed
     *
     * @param integer $needed
     * @return Formulaire
     */
    public function setNeeded($needed)
    {
        $this->needed = $needed;

        return $this;
    }

    /**
     * Get needed
     *
     * @return integer 
     */
    public function getNeeded()
    {
        return $this->needed;
    }

    /**
     * Set length
     *
     * @param integer $length
     * @return Formulaire
     */
    public function setLength($length)
    {
        $this->length = $length;

        return $this;
    }

    /**
     * Get length
     *
     * @return integer 
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * Set options
     *
     * @param string $options
     * @return Formulaire
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
     * Set position
     *
     * @param integer $position
     * @return Formulaire
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return integer 
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set fieldset
     *
     * @param integer $fieldset
     * @return Formulaire
     */
    public function setFieldset($fieldset)
    {
        $this->fieldset = $fieldset;

        return $this;
    }

    /**
     * Get fieldset
     *
     * @return integer 
     */
    public function getFieldset()
    {
        return $this->fieldset;
    }

    /**
     * Set col
     *
     * @param string $col
     * @return Formulaire
     */
    public function setCol($col)
    {
        $this->col = $col;

        return $this;
    }

    /**
     * Get col
     *
     * @return string 
     */
    public function getCol()
    {
        return $this->col;
    }

    /**
     * Set did
     *
     * @param integer $did
     * @return Formulaire
     */
    public function setDid($did)
    {
        $this->did = $did;

        return $this;
    }

    /**
     * Get did
     *
     * @return integer 
     */
    public function getDid()
    {
        return $this->did;
    }
}
