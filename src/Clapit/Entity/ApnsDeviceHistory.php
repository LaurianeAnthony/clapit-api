<?php

namespace Clapit\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ApnsDeviceHistory
 *
 * @ORM\Table(name="apns_device_history", indexes={@ORM\Index(name="clientid", columns={"clientid"}), @ORM\Index(name="devicetoken", columns={"devicetoken"}), @ORM\Index(name="devicename", columns={"devicename"}), @ORM\Index(name="devicemodel", columns={"devicemodel"}), @ORM\Index(name="deviceversion", columns={"deviceversion"}), @ORM\Index(name="pushbadge", columns={"pushbadge"}), @ORM\Index(name="pushalert", columns={"pushalert"}), @ORM\Index(name="pushsound", columns={"pushsound"}), @ORM\Index(name="development", columns={"development"}), @ORM\Index(name="status", columns={"status"}), @ORM\Index(name="appname", columns={"appname"}), @ORM\Index(name="appversion", columns={"appversion"}), @ORM\Index(name="deviceuid", columns={"deviceuid"}), @ORM\Index(name="archived", columns={"archived"})})
 * @ORM\Entity
 */
class ApnsDeviceHistory
{
    /**
     * @var integer
     *
     * @ORM\Column(name="pid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $pid;

    /**
     * @var string
     *
     * @ORM\Column(name="clientid", type="string", length=64, nullable=false)
     */
    private $clientid;

    /**
     * @var string
     *
     * @ORM\Column(name="appname", type="string", length=255, nullable=false)
     */
    private $appname;

    /**
     * @var string
     *
     * @ORM\Column(name="appversion", type="string", length=25, nullable=true)
     */
    private $appversion;

    /**
     * @var string
     *
     * @ORM\Column(name="deviceuid", type="string", length=40, nullable=false)
     */
    private $deviceuid;

    /**
     * @var string
     *
     * @ORM\Column(name="devicetoken", type="string", length=64, nullable=false)
     */
    private $devicetoken;

    /**
     * @var string
     *
     * @ORM\Column(name="devicename", type="string", length=255, nullable=false)
     */
    private $devicename;

    /**
     * @var string
     *
     * @ORM\Column(name="devicemodel", type="string", length=100, nullable=false)
     */
    private $devicemodel;

    /**
     * @var string
     *
     * @ORM\Column(name="deviceversion", type="string", length=25, nullable=false)
     */
    private $deviceversion;

    /**
     * @var string
     *
     * @ORM\Column(name="pushbadge", type="string", nullable=true)
     */
    private $pushbadge = 'disabled';

    /**
     * @var string
     *
     * @ORM\Column(name="pushalert", type="string", nullable=true)
     */
    private $pushalert = 'disabled';

    /**
     * @var string
     *
     * @ORM\Column(name="pushsound", type="string", nullable=true)
     */
    private $pushsound = 'disabled';

    /**
     * @var string
     *
     * @ORM\Column(name="development", type="string", nullable=false)
     */
    private $development = 'production';

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", nullable=false)
     */
    private $status = 'active';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="archived", type="datetime", nullable=false)
     */
    private $archived;



    /**
     * Get pid
     *
     * @return integer 
     */
    public function getPid()
    {
        return $this->pid;
    }

    /**
     * Set clientid
     *
     * @param string $clientid
     * @return ApnsDeviceHistory
     */
    public function setClientid($clientid)
    {
        $this->clientid = $clientid;

        return $this;
    }

    /**
     * Get clientid
     *
     * @return string 
     */
    public function getClientid()
    {
        return $this->clientid;
    }

    /**
     * Set appname
     *
     * @param string $appname
     * @return ApnsDeviceHistory
     */
    public function setAppname($appname)
    {
        $this->appname = $appname;

        return $this;
    }

    /**
     * Get appname
     *
     * @return string 
     */
    public function getAppname()
    {
        return $this->appname;
    }

    /**
     * Set appversion
     *
     * @param string $appversion
     * @return ApnsDeviceHistory
     */
    public function setAppversion($appversion)
    {
        $this->appversion = $appversion;

        return $this;
    }

    /**
     * Get appversion
     *
     * @return string 
     */
    public function getAppversion()
    {
        return $this->appversion;
    }

    /**
     * Set deviceuid
     *
     * @param string $deviceuid
     * @return ApnsDeviceHistory
     */
    public function setDeviceuid($deviceuid)
    {
        $this->deviceuid = $deviceuid;

        return $this;
    }

    /**
     * Get deviceuid
     *
     * @return string 
     */
    public function getDeviceuid()
    {
        return $this->deviceuid;
    }

    /**
     * Set devicetoken
     *
     * @param string $devicetoken
     * @return ApnsDeviceHistory
     */
    public function setDevicetoken($devicetoken)
    {
        $this->devicetoken = $devicetoken;

        return $this;
    }

    /**
     * Get devicetoken
     *
     * @return string 
     */
    public function getDevicetoken()
    {
        return $this->devicetoken;
    }

    /**
     * Set devicename
     *
     * @param string $devicename
     * @return ApnsDeviceHistory
     */
    public function setDevicename($devicename)
    {
        $this->devicename = $devicename;

        return $this;
    }

    /**
     * Get devicename
     *
     * @return string 
     */
    public function getDevicename()
    {
        return $this->devicename;
    }

    /**
     * Set devicemodel
     *
     * @param string $devicemodel
     * @return ApnsDeviceHistory
     */
    public function setDevicemodel($devicemodel)
    {
        $this->devicemodel = $devicemodel;

        return $this;
    }

    /**
     * Get devicemodel
     *
     * @return string 
     */
    public function getDevicemodel()
    {
        return $this->devicemodel;
    }

    /**
     * Set deviceversion
     *
     * @param string $deviceversion
     * @return ApnsDeviceHistory
     */
    public function setDeviceversion($deviceversion)
    {
        $this->deviceversion = $deviceversion;

        return $this;
    }

    /**
     * Get deviceversion
     *
     * @return string 
     */
    public function getDeviceversion()
    {
        return $this->deviceversion;
    }

    /**
     * Set pushbadge
     *
     * @param string $pushbadge
     * @return ApnsDeviceHistory
     */
    public function setPushbadge($pushbadge)
    {
        $this->pushbadge = $pushbadge;

        return $this;
    }

    /**
     * Get pushbadge
     *
     * @return string 
     */
    public function getPushbadge()
    {
        return $this->pushbadge;
    }

    /**
     * Set pushalert
     *
     * @param string $pushalert
     * @return ApnsDeviceHistory
     */
    public function setPushalert($pushalert)
    {
        $this->pushalert = $pushalert;

        return $this;
    }

    /**
     * Get pushalert
     *
     * @return string 
     */
    public function getPushalert()
    {
        return $this->pushalert;
    }

    /**
     * Set pushsound
     *
     * @param string $pushsound
     * @return ApnsDeviceHistory
     */
    public function setPushsound($pushsound)
    {
        $this->pushsound = $pushsound;

        return $this;
    }

    /**
     * Get pushsound
     *
     * @return string 
     */
    public function getPushsound()
    {
        return $this->pushsound;
    }

    /**
     * Set development
     *
     * @param string $development
     * @return ApnsDeviceHistory
     */
    public function setDevelopment($development)
    {
        $this->development = $development;

        return $this;
    }

    /**
     * Get development
     *
     * @return string 
     */
    public function getDevelopment()
    {
        return $this->development;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return ApnsDeviceHistory
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set archived
     *
     * @param \DateTime $archived
     * @return ApnsDeviceHistory
     */
    public function setArchived($archived)
    {
        $this->archived = $archived;

        return $this;
    }

    /**
     * Get archived
     *
     * @return \DateTime 
     */
    public function getArchived()
    {
        return $this->archived;
    }
}
