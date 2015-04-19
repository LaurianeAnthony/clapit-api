<?php

namespace Clapit\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ApnsDevices
 *
 * @ORM\Table(name="apns_devices", uniqueConstraints={@ORM\UniqueConstraint(name="appname", columns={"appname", "deviceuid"})}, indexes={@ORM\Index(name="clientid", columns={"clientid"}), @ORM\Index(name="devicetoken", columns={"devicetoken"}), @ORM\Index(name="devicename", columns={"devicename"}), @ORM\Index(name="devicemodel", columns={"devicemodel"}), @ORM\Index(name="deviceversion", columns={"deviceversion"}), @ORM\Index(name="pushbadge", columns={"pushbadge"}), @ORM\Index(name="pushalert", columns={"pushalert"}), @ORM\Index(name="pushsound", columns={"pushsound"}), @ORM\Index(name="development", columns={"development"}), @ORM\Index(name="status", columns={"status"}), @ORM\Index(name="created", columns={"created"}), @ORM\Index(name="modified", columns={"modified"})})
 * @ORM\Entity
 */
class ApnsDevices
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
     * @ORM\Column(name="created", type="datetime", nullable=false)
     */
    private $created;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="modified", type="datetime", nullable=false)
     */
    private $modified = '0000-00-00 00:00:00';



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
     * @return ApnsDevices
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
     * @return ApnsDevices
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
     * @return ApnsDevices
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
     * @return ApnsDevices
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
     * @return ApnsDevices
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
     * @return ApnsDevices
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
     * @return ApnsDevices
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
     * @return ApnsDevices
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
     * @return ApnsDevices
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
     * @return ApnsDevices
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
     * @return ApnsDevices
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
     * @return ApnsDevices
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
     * @return ApnsDevices
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
     * Set created
     *
     * @param \DateTime $created
     * @return ApnsDevices
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set modified
     *
     * @param \DateTime $modified
     * @return ApnsDevices
     */
    public function setModified($modified)
    {
        $this->modified = $modified;

        return $this;
    }

    /**
     * Get modified
     *
     * @return \DateTime 
     */
    public function getModified()
    {
        return $this->modified;
    }
}
