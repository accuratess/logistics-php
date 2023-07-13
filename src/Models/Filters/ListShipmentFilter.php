<?php

namespace Accurate\Shipping\Models\Filters;

use Accurate\Shipping\Enums\BooleanTypeCode;
use Accurate\Shipping\Enums\ShipmentPaymentTypeCode;
use Accurate\Shipping\Enums\ShipmentTypeCode;
use Accurate\Shipping\Models\Inputs\Core\Size;
use DateTime;

class ListShipmentFilter
{
    /**
     * 
     *
     * @var DateTime $date
     */
    public $date;

    /**
     *
     *
     * @var int $branchId
     */
    public $branchId;

    /**
     * 
     *
     * @var int $originBranchId
     */
    public $originBranchId;

    /**
     * 
     *
     * @var float $weight
     */
    public $weight;

    /**
     * 
     *
     * @var int $piecesCount
     */
    public $piecesCount;

    /**
     * 
     *
     * @var BooleanTypeCode $openableCode
     */
    public  $openableCode;

    /**
     * 
     *
     * @var Service $serviceId
     */
    public  $serviceId;

    /**
     * 
     *
     * @var string $notes
     */
    public $notes;

    /**
     * 
     *
     * @var string $description
     */
    public $description;

    /**
     * 
     *
     * @var string $receiveInWarehouse
     */
    public $receiveInWarehouse;

    /**
     * 
     * refrence number
     * @var array $refNumber
     */
    public $refNumber;

    /**
     * paymentTypeCode
     * 
     * @var ShipmentPaymentTypeCode $paymentTypeCode
     */
    public $paymentTypeCode;

    /**
     * packageTypeCode
     * 
     * @var ShipmentTypeCode $typeCode
     */
    public $typeCode;

    /**
     * package price
     * 
     * @var $price
     */
    public $price;

    /**
     * 
     *
     * @var Size $size
     */
    public  $size;

    /**
     * 
     *
     * @var int $recipientZoneId
     */
    public  $recipientZoneId;

    /**
     * 
     *
     * @var int $recipientSubzoneId
     */
    public $recipientSubzoneId;

    /**
     * 
     *
     * @var string $recipientPhone
     */
    public $recipientPhone;

    /**
     * 
     *
     * @var string $recipientMobile
     */
    public $recipientMobile;

    /**
     * 
     *
     * @var string $recipientAddress
     */
    public $recipientAddress;

    /**
     * 
     *
     * @var string $recipientName
     */
    public $recipientName;

    /**
     * 
     *
     * @var string $senderName
     */
    public $senderName;

    /**
     * 
     *
     * @var string $senderPhone
     */
    public $senderPhone;

    /**
     * 
     *
     * @var string $senderMobile
     */
    public $senderMobile;

    /**
     * 
     *
     * @var int $senderSubzoneId
     */
    public $senderSubzoneId;

    /**
     * 
     *
     * @var int $senderZoneId
     */
    public $senderZoneId;

    /**
     * 
     *
     * @var array $id
     */
    public $id;

    /**
     * 
     *
     * @var array $code
     */
    public $code;

    /**
     * 
     *
     * @var array $code
     */
    public $statusCode;

    /**
     * 
     *
     * @var array $search
     */
    public $search;

    /**
     * 
     *
     * @var string $senderAddress
     */
    public $senderAddress;

    /**
     * 
     *
     * @var string $senderAddress
     */
    public $fromDate;

    /**
     * 
     *
     * @var string $senderAddress
     */
    public $toDate;

    /**
     * 
     *
     * @var string $senderAddress
     */
    public $lastTransactionFromDate;

    /**
     * 
     *
     * @var string $senderAddress
     */
    public $lastTransactionToDate;

    /**
     * 
     *
     * @var string $senderAddress
     */
    public $returnTypeCode;

    /**
     * 
     *
     * @var string $senderAddress
     */
    public $deliveryTypeCode;

    /**
     * 
     *
     * @var string $senderAddress
     */
    public $paid;

    /**
     * 
     *
     * @var string $senderAddress
     */
    public $collected;

    /**
     * 
     *
     * @var string $senderAddress
     */
    public $new;

    public function __construct(
        array $id = null,
        array $code = null,
        array $search = null,
        array $refNumber = null,
        int $recipientZoneId = null,
        int $recipientSubzoneId = null,
        int $serviceId = null,
        bool $collected = null,
        bool $paid = null,
        bool $new = null,
        $fromDate = null,
        $toDate = null,
        $lastTransactionFromDate = null,
        $lastTransactionToDate = null,
        $statusCode = null,
        $paymentTypeCode = null,
        $typeCode = null,
        $returnTypeCode = null,
        $deliveryTypeCode = null,
    ) {
        $this->id = $id;
        $this->code = $code;
        $this->search = $search;
        $this->refNumber = $refNumber;
        $this->fromDate = $fromDate;
        $this->toDate = $toDate;
        $this->lastTransactionFromDate = $lastTransactionFromDate;
        $this->lastTransactionToDate = $lastTransactionToDate;
        $this->statusCode = $statusCode;
        $this->typeCode = $typeCode;
        $this->paymentTypeCode = $paymentTypeCode;
        $this->returnTypeCode = $returnTypeCode;
        $this->deliveryTypeCode = $deliveryTypeCode;
        $this->serviceId = $serviceId;
        $this->recipientZoneId = $recipientZoneId;
        $this->recipientSubzoneId = $recipientSubzoneId;
        $this->collected = $collected;
        $this->paid = $paid;
        $this->new = $new;
    }
}
