<?php

namespace Clapit\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Paiement
 *
 * @ORM\Table(name="paiement")
 * @ORM\Entity
 */
class Paiement
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
     * @ORM\Column(name="cid", type="string", length=15, nullable=false)
     */
    private $cid = '';

    /**
     * @var string
     *
     * @ORM\Column(name="merchant_id", type="string", length=20, nullable=false)
     */
    private $merchantId = '';

    /**
     * @var string
     *
     * @ORM\Column(name="merchant_country", type="string", length=20, nullable=false)
     */
    private $merchantCountry = '';

    /**
     * @var integer
     *
     * @ORM\Column(name="amount", type="integer", nullable=false)
     */
    private $amount = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="transaction_id", type="string", length=20, nullable=false)
     */
    private $transactionId = '';

    /**
     * @var string
     *
     * @ORM\Column(name="transmission_date", type="string", length=20, nullable=false)
     */
    private $transmissionDate = '';

    /**
     * @var string
     *
     * @ORM\Column(name="payment_means", type="string", length=10, nullable=false)
     */
    private $paymentMeans = '';

    /**
     * @var integer
     *
     * @ORM\Column(name="payment_time", type="integer", nullable=false)
     */
    private $paymentTime = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="payment_date", type="integer", nullable=false)
     */
    private $paymentDate = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="response_code", type="string", length=10, nullable=false)
     */
    private $responseCode = '';

    /**
     * @var string
     *
     * @ORM\Column(name="payment_certificate", type="string", length=20, nullable=false)
     */
    private $paymentCertificate = '';

    /**
     * @var string
     *
     * @ORM\Column(name="authorisation_id", type="string", length=20, nullable=false)
     */
    private $authorisationId = '';

    /**
     * @var string
     *
     * @ORM\Column(name="currency_code", type="string", length=4, nullable=false)
     */
    private $currencyCode = '';

    /**
     * @var string
     *
     * @ORM\Column(name="card_number", type="string", length=16, nullable=false)
     */
    private $cardNumber = '';

    /**
     * @var string
     *
     * @ORM\Column(name="cvv_flag", type="string", length=10, nullable=false)
     */
    private $cvvFlag = '';

    /**
     * @var string
     *
     * @ORM\Column(name="cvv_response_code", type="string", length=10, nullable=false)
     */
    private $cvvResponseCode = '';

    /**
     * @var string
     *
     * @ORM\Column(name="bank_response_code", type="string", length=10, nullable=false)
     */
    private $bankResponseCode = '';

    /**
     * @var string
     *
     * @ORM\Column(name="complementary_code", type="string", length=10, nullable=false)
     */
    private $complementaryCode = '';

    /**
     * @var string
     *
     * @ORM\Column(name="complementary_info", type="text", nullable=false)
     */
    private $complementaryInfo;

    /**
     * @var string
     *
     * @ORM\Column(name="return_context", type="string", length=250, nullable=false)
     */
    private $returnContext = '';

    /**
     * @var string
     *
     * @ORM\Column(name="caddie", type="text", nullable=false)
     */
    private $caddie;

    /**
     * @var string
     *
     * @ORM\Column(name="receipt_complement", type="text", nullable=false)
     */
    private $receiptComplement;

    /**
     * @var string
     *
     * @ORM\Column(name="merchant_language", type="string", length=4, nullable=false)
     */
    private $merchantLanguage = '';

    /**
     * @var string
     *
     * @ORM\Column(name="language", type="string", length=4, nullable=false)
     */
    private $language = '';

    /**
     * @var string
     *
     * @ORM\Column(name="customer_id", type="string", length=10, nullable=false)
     */
    private $customerId = '';

    /**
     * @var string
     *
     * @ORM\Column(name="order_id", type="string", length=20, nullable=false)
     */
    private $orderId = '';

    /**
     * @var string
     *
     * @ORM\Column(name="customer_email", type="string", length=30, nullable=false)
     */
    private $customerEmail = '';

    /**
     * @var string
     *
     * @ORM\Column(name="customer_ip_address", type="string", length=20, nullable=false)
     */
    private $customerIpAddress = '';

    /**
     * @var string
     *
     * @ORM\Column(name="capture_day", type="string", length=20, nullable=false)
     */
    private $captureDay = '';

    /**
     * @var string
     *
     * @ORM\Column(name="capture_mode", type="string", length=20, nullable=false)
     */
    private $captureMode = '';

    /**
     * @var string
     *
     * @ORM\Column(name="data", type="text", nullable=false)
     */
    private $data;



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
     * Set cid
     *
     * @param string $cid
     * @return Paiement
     */
    public function setCid($cid)
    {
        $this->cid = $cid;

        return $this;
    }

    /**
     * Get cid
     *
     * @return string 
     */
    public function getCid()
    {
        return $this->cid;
    }

    /**
     * Set merchantId
     *
     * @param string $merchantId
     * @return Paiement
     */
    public function setMerchantId($merchantId)
    {
        $this->merchantId = $merchantId;

        return $this;
    }

    /**
     * Get merchantId
     *
     * @return string 
     */
    public function getMerchantId()
    {
        return $this->merchantId;
    }

    /**
     * Set merchantCountry
     *
     * @param string $merchantCountry
     * @return Paiement
     */
    public function setMerchantCountry($merchantCountry)
    {
        $this->merchantCountry = $merchantCountry;

        return $this;
    }

    /**
     * Get merchantCountry
     *
     * @return string 
     */
    public function getMerchantCountry()
    {
        return $this->merchantCountry;
    }

    /**
     * Set amount
     *
     * @param integer $amount
     * @return Paiement
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return integer 
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set transactionId
     *
     * @param string $transactionId
     * @return Paiement
     */
    public function setTransactionId($transactionId)
    {
        $this->transactionId = $transactionId;

        return $this;
    }

    /**
     * Get transactionId
     *
     * @return string 
     */
    public function getTransactionId()
    {
        return $this->transactionId;
    }

    /**
     * Set transmissionDate
     *
     * @param string $transmissionDate
     * @return Paiement
     */
    public function setTransmissionDate($transmissionDate)
    {
        $this->transmissionDate = $transmissionDate;

        return $this;
    }

    /**
     * Get transmissionDate
     *
     * @return string 
     */
    public function getTransmissionDate()
    {
        return $this->transmissionDate;
    }

    /**
     * Set paymentMeans
     *
     * @param string $paymentMeans
     * @return Paiement
     */
    public function setPaymentMeans($paymentMeans)
    {
        $this->paymentMeans = $paymentMeans;

        return $this;
    }

    /**
     * Get paymentMeans
     *
     * @return string 
     */
    public function getPaymentMeans()
    {
        return $this->paymentMeans;
    }

    /**
     * Set paymentTime
     *
     * @param integer $paymentTime
     * @return Paiement
     */
    public function setPaymentTime($paymentTime)
    {
        $this->paymentTime = $paymentTime;

        return $this;
    }

    /**
     * Get paymentTime
     *
     * @return integer 
     */
    public function getPaymentTime()
    {
        return $this->paymentTime;
    }

    /**
     * Set paymentDate
     *
     * @param integer $paymentDate
     * @return Paiement
     */
    public function setPaymentDate($paymentDate)
    {
        $this->paymentDate = $paymentDate;

        return $this;
    }

    /**
     * Get paymentDate
     *
     * @return integer 
     */
    public function getPaymentDate()
    {
        return $this->paymentDate;
    }

    /**
     * Set responseCode
     *
     * @param string $responseCode
     * @return Paiement
     */
    public function setResponseCode($responseCode)
    {
        $this->responseCode = $responseCode;

        return $this;
    }

    /**
     * Get responseCode
     *
     * @return string 
     */
    public function getResponseCode()
    {
        return $this->responseCode;
    }

    /**
     * Set paymentCertificate
     *
     * @param string $paymentCertificate
     * @return Paiement
     */
    public function setPaymentCertificate($paymentCertificate)
    {
        $this->paymentCertificate = $paymentCertificate;

        return $this;
    }

    /**
     * Get paymentCertificate
     *
     * @return string 
     */
    public function getPaymentCertificate()
    {
        return $this->paymentCertificate;
    }

    /**
     * Set authorisationId
     *
     * @param string $authorisationId
     * @return Paiement
     */
    public function setAuthorisationId($authorisationId)
    {
        $this->authorisationId = $authorisationId;

        return $this;
    }

    /**
     * Get authorisationId
     *
     * @return string 
     */
    public function getAuthorisationId()
    {
        return $this->authorisationId;
    }

    /**
     * Set currencyCode
     *
     * @param string $currencyCode
     * @return Paiement
     */
    public function setCurrencyCode($currencyCode)
    {
        $this->currencyCode = $currencyCode;

        return $this;
    }

    /**
     * Get currencyCode
     *
     * @return string 
     */
    public function getCurrencyCode()
    {
        return $this->currencyCode;
    }

    /**
     * Set cardNumber
     *
     * @param string $cardNumber
     * @return Paiement
     */
    public function setCardNumber($cardNumber)
    {
        $this->cardNumber = $cardNumber;

        return $this;
    }

    /**
     * Get cardNumber
     *
     * @return string 
     */
    public function getCardNumber()
    {
        return $this->cardNumber;
    }

    /**
     * Set cvvFlag
     *
     * @param string $cvvFlag
     * @return Paiement
     */
    public function setCvvFlag($cvvFlag)
    {
        $this->cvvFlag = $cvvFlag;

        return $this;
    }

    /**
     * Get cvvFlag
     *
     * @return string 
     */
    public function getCvvFlag()
    {
        return $this->cvvFlag;
    }

    /**
     * Set cvvResponseCode
     *
     * @param string $cvvResponseCode
     * @return Paiement
     */
    public function setCvvResponseCode($cvvResponseCode)
    {
        $this->cvvResponseCode = $cvvResponseCode;

        return $this;
    }

    /**
     * Get cvvResponseCode
     *
     * @return string 
     */
    public function getCvvResponseCode()
    {
        return $this->cvvResponseCode;
    }

    /**
     * Set bankResponseCode
     *
     * @param string $bankResponseCode
     * @return Paiement
     */
    public function setBankResponseCode($bankResponseCode)
    {
        $this->bankResponseCode = $bankResponseCode;

        return $this;
    }

    /**
     * Get bankResponseCode
     *
     * @return string 
     */
    public function getBankResponseCode()
    {
        return $this->bankResponseCode;
    }

    /**
     * Set complementaryCode
     *
     * @param string $complementaryCode
     * @return Paiement
     */
    public function setComplementaryCode($complementaryCode)
    {
        $this->complementaryCode = $complementaryCode;

        return $this;
    }

    /**
     * Get complementaryCode
     *
     * @return string 
     */
    public function getComplementaryCode()
    {
        return $this->complementaryCode;
    }

    /**
     * Set complementaryInfo
     *
     * @param string $complementaryInfo
     * @return Paiement
     */
    public function setComplementaryInfo($complementaryInfo)
    {
        $this->complementaryInfo = $complementaryInfo;

        return $this;
    }

    /**
     * Get complementaryInfo
     *
     * @return string 
     */
    public function getComplementaryInfo()
    {
        return $this->complementaryInfo;
    }

    /**
     * Set returnContext
     *
     * @param string $returnContext
     * @return Paiement
     */
    public function setReturnContext($returnContext)
    {
        $this->returnContext = $returnContext;

        return $this;
    }

    /**
     * Get returnContext
     *
     * @return string 
     */
    public function getReturnContext()
    {
        return $this->returnContext;
    }

    /**
     * Set caddie
     *
     * @param string $caddie
     * @return Paiement
     */
    public function setCaddie($caddie)
    {
        $this->caddie = $caddie;

        return $this;
    }

    /**
     * Get caddie
     *
     * @return string 
     */
    public function getCaddie()
    {
        return $this->caddie;
    }

    /**
     * Set receiptComplement
     *
     * @param string $receiptComplement
     * @return Paiement
     */
    public function setReceiptComplement($receiptComplement)
    {
        $this->receiptComplement = $receiptComplement;

        return $this;
    }

    /**
     * Get receiptComplement
     *
     * @return string 
     */
    public function getReceiptComplement()
    {
        return $this->receiptComplement;
    }

    /**
     * Set merchantLanguage
     *
     * @param string $merchantLanguage
     * @return Paiement
     */
    public function setMerchantLanguage($merchantLanguage)
    {
        $this->merchantLanguage = $merchantLanguage;

        return $this;
    }

    /**
     * Get merchantLanguage
     *
     * @return string 
     */
    public function getMerchantLanguage()
    {
        return $this->merchantLanguage;
    }

    /**
     * Set language
     *
     * @param string $language
     * @return Paiement
     */
    public function setLanguage($language)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language
     *
     * @return string 
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Set customerId
     *
     * @param string $customerId
     * @return Paiement
     */
    public function setCustomerId($customerId)
    {
        $this->customerId = $customerId;

        return $this;
    }

    /**
     * Get customerId
     *
     * @return string 
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * Set orderId
     *
     * @param string $orderId
     * @return Paiement
     */
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;

        return $this;
    }

    /**
     * Get orderId
     *
     * @return string 
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * Set customerEmail
     *
     * @param string $customerEmail
     * @return Paiement
     */
    public function setCustomerEmail($customerEmail)
    {
        $this->customerEmail = $customerEmail;

        return $this;
    }

    /**
     * Get customerEmail
     *
     * @return string 
     */
    public function getCustomerEmail()
    {
        return $this->customerEmail;
    }

    /**
     * Set customerIpAddress
     *
     * @param string $customerIpAddress
     * @return Paiement
     */
    public function setCustomerIpAddress($customerIpAddress)
    {
        $this->customerIpAddress = $customerIpAddress;

        return $this;
    }

    /**
     * Get customerIpAddress
     *
     * @return string 
     */
    public function getCustomerIpAddress()
    {
        return $this->customerIpAddress;
    }

    /**
     * Set captureDay
     *
     * @param string $captureDay
     * @return Paiement
     */
    public function setCaptureDay($captureDay)
    {
        $this->captureDay = $captureDay;

        return $this;
    }

    /**
     * Get captureDay
     *
     * @return string 
     */
    public function getCaptureDay()
    {
        return $this->captureDay;
    }

    /**
     * Set captureMode
     *
     * @param string $captureMode
     * @return Paiement
     */
    public function setCaptureMode($captureMode)
    {
        $this->captureMode = $captureMode;

        return $this;
    }

    /**
     * Get captureMode
     *
     * @return string 
     */
    public function getCaptureMode()
    {
        return $this->captureMode;
    }

    /**
     * Set data
     *
     * @param string $data
     * @return Paiement
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get data
     *
     * @return string 
     */
    public function getData()
    {
        return $this->data;
    }
}
