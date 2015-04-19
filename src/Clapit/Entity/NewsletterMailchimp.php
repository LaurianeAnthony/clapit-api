<?php

namespace Clapit\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NewsletterMailchimp
 *
 * @ORM\Table(name="newsletter_mailchimp", uniqueConstraints={@ORM\UniqueConstraint(name="id_campaign", columns={"id_campaign"})}, indexes={@ORM\Index(name="id_newsletter", columns={"id_newsletter"})})
 * @ORM\Entity
 */
class NewsletterMailchimp
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
     * @ORM\Column(name="id_campaign", type="string", length=25, nullable=false)
     */
    private $idCampaign;

    /**
     * @var integer
     *
     * @ORM\Column(name="send", type="smallint", nullable=false)
     */
    private $send = '0';

    /**
     * @var \Clapit\Entity\NewsletterPatron
     *
     * @ORM\ManyToOne(targetEntity="Clapit\Entity\NewsletterPatron")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_newsletter", referencedColumnName="id")
     * })
     */
    private $idNewsletter;



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
     * Set idCampaign
     *
     * @param string $idCampaign
     * @return NewsletterMailchimp
     */
    public function setIdCampaign($idCampaign)
    {
        $this->idCampaign = $idCampaign;

        return $this;
    }

    /**
     * Get idCampaign
     *
     * @return string 
     */
    public function getIdCampaign()
    {
        return $this->idCampaign;
    }

    /**
     * Set send
     *
     * @param integer $send
     * @return NewsletterMailchimp
     */
    public function setSend($send)
    {
        $this->send = $send;

        return $this;
    }

    /**
     * Get send
     *
     * @return integer 
     */
    public function getSend()
    {
        return $this->send;
    }

    /**
     * Set idNewsletter
     *
     * @param \Clapit\Entity\NewsletterPatron $idNewsletter
     * @return NewsletterMailchimp
     */
    public function setIdNewsletter(\Clapit\Entity\NewsletterPatron $idNewsletter = null)
    {
        $this->idNewsletter = $idNewsletter;

        return $this;
    }

    /**
     * Get idNewsletter
     *
     * @return \Clapit\Entity\NewsletterPatron 
     */
    public function getIdNewsletter()
    {
        return $this->idNewsletter;
    }
}
