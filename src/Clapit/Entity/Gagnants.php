<?php

namespace Clapit\Entity;

use Doctrine\ORM\Mapping as ORM;

use JMS\Serializer\Annotation;
use JMS\Serializer\Annotation\Groups;

/**
 * Gagnants
 *
 * @ORM\Table(name="gagnants", uniqueConstraints={@ORM\UniqueConstraint(name="did_2", columns={"did", "uid"})}, indexes={@ORM\Index(name="did", columns={"did"}), @ORM\Index(name="uid", columns={"uid"})})
 * @ORM\Entity
 */
class Gagnants
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
     * @ORM\OneToOne(targetEntity="Clapit\Entity\User")
     * @ORM\Column(name="uid", type="integer", nullable=false)
     * @Groups({"public"})
     */
    private $uid;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false)
     * @Groups({"public"})
     */
    private $date = 'CURRENT_TIMESTAMP';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="mail_sended", type="datetime", nullable=false)
     */
    private $mailSended;

    /**
     * @var \Clapit\Entity\Deal
     *
     * @ORM\ManyToOne(targetEntity="Clapit\Entity\Deal", inversedBy="winners")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="did", referencedColumnName="id")
     * })
     */
    private $deal;



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
     * @return Gagnants
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
     * Set date
     *
     * @param \DateTime $date
     * @return Gagnants
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set mailSended
     *
     * @param \DateTime $mailSended
     * @return Gagnants
     */
    public function setMailSended($mailSended)
    {
        $this->mailSended = $mailSended;

        return $this;
    }

    /**
     * Get mailSended
     *
     * @return \DateTime 
     */
    public function getMailSended()
    {
        return $this->mailSended;
    }

    /**
     * Set deal
     *
     * @param \Clapit\Entity\Deal $deal
     * @return Gagnants
     */
    public function setDeal(\Clapit\Entity\Deal $deal)
    {
        $this->deal = $deal;

        return $this;
    }

    /**
     * Get deal
     *
     * @return \Clapit\Entity\Deal 
     */
    public function getDeal()
    {
        return $this->deal;
    }
}
