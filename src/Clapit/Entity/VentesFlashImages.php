<?php

namespace Clapit\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VentesFlashImages
 *
 * @ORM\Table(name="ventes_flash_images", indexes={@ORM\Index(name="vente_flash_id", columns={"vente_flash_id"})})
 * @ORM\Entity
 */
class VentesFlashImages
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
     * @ORM\Column(name="url", type="text", nullable=false)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="text", nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="color", type="text", nullable=false)
     */
    private $color;

    /**
     * @var string
     *
     * @ORM\Column(name="size", type="text", nullable=false)
     */
    private $size;

    /**
     * @var integer
     *
     * @ORM\Column(name="visible", type="integer", nullable=false)
     */
    private $visible;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="uploaded_at", type="datetime", nullable=false)
     */
    private $uploadedAt;

    /**
     * @var \Clapit\Entity\VentesFlash
     *
     * @ORM\ManyToOne(targetEntity="Clapit\Entity\VentesFlash")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="vente_flash_id", referencedColumnName="id")
     * })
     */
    private $venteFlash;



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
     * Set url
     *
     * @param string $url
     * @return VentesFlashImages
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return VentesFlashImages
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set color
     *
     * @param string $color
     * @return VentesFlashImages
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string 
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set size
     *
     * @param string $size
     * @return VentesFlashImages
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Get size
     *
     * @return string 
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set visible
     *
     * @param integer $visible
     * @return VentesFlashImages
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
     * Set uploadedAt
     *
     * @param \DateTime $uploadedAt
     * @return VentesFlashImages
     */
    public function setUploadedAt($uploadedAt)
    {
        $this->uploadedAt = $uploadedAt;

        return $this;
    }

    /**
     * Get uploadedAt
     *
     * @return \DateTime 
     */
    public function getUploadedAt()
    {
        return $this->uploadedAt;
    }

    /**
     * Set venteFlash
     *
     * @param \Clapit\Entity\VentesFlash $venteFlash
     * @return VentesFlashImages
     */
    public function setVenteFlash(\Clapit\Entity\VentesFlash $venteFlash = null)
    {
        $this->venteFlash = $venteFlash;

        return $this;
    }

    /**
     * Get venteFlash
     *
     * @return \Clapit\Entity\VentesFlash 
     */
    public function getVenteFlash()
    {
        return $this->venteFlash;
    }
}
