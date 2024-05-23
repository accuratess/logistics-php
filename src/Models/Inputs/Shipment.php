<?php

namespace Accurate\Shipping\Models\Inputs;

use Accurate\Shipping\Enums\Types\BooleanField;
use Accurate\Shipping\Enums\Types\BooleanTypeCode;
use Accurate\Shipping\Enums\Types\PaymentField;
use Accurate\Shipping\Enums\Types\PaymentTypeCode;
use Accurate\Shipping\Enums\Types\PriceField;
use Accurate\Shipping\Enums\Types\PriceTypeCode;
use Accurate\Shipping\Enums\Types\TypeCode;
use Accurate\Shipping\Enums\Types\TypeField;
use Accurate\Shipping\Models\Inputs\Size;
use DateTime;

class Shipment
{
    /**
     * 
     *
     * @var string|null $id
     */
    public ?int $id;

    /**
     * 
     *
     * @var string|null $code
     */
    public ?string $code;

    /**
     * 
     *
     * @var DateTime $date
     */
    public string $date;

    /**
     *
     *
     * @var int $branchId
     */
    public int $branchId;

    /**
     * 
     *
     * @var int $originBranchId
     */
    public int $originBranchId;

    /**
     * 
     *
     * @var float $weight
     */
    public float $weight;

    /**
     * 
     *
     * @var int $piecesCount
     */
    public int $piecesCount;

    /**
     * 
     *
     * @var $returnPiecesCount
     */
    public $returnPiecesCount;

    /**
     * 
     *
     * @var BooleanTypeCode $openableCode
     */
    public $openableCode;

    /**
     * 
     *
     * @var Service $serviceId
     */
    public int $serviceId;

    /**
     * 
     *
     * @var string $notes
     */
    public string $notes;

    /**
     * 
     *
     * @var string $description
     */
    public string $description;

    /**
     * 
     *
     * @var string $receiveInWarehouse
     */
    public string $receiveInWarehouse;

    /**
     * 
     * refrence number
     * @var string $refNumber
     */
    public string $refNumber;

    /**
     * packageTypeCode
     * 
     * @var PriceTypeCode $priceTypeCode
     */
    public $priceTypeCode;

    /**
     * paymentTypeCode
     * 
     * @var PaymentTypeCode $paymentTypeCode
     */
    public $paymentTypeCode;

    /**
     * packageTypeCode
     * 
     * @var TypeCode $typeCode
     */
    public $typeCode;

    /**
     * package price
     * 
     * @var float $price
     */
    public float $price;

    /**
     * 
     *
     * @var Size $size
     */
    public Size $size;

    /**
     * 
     *
     * @var int $recipientZoneId
     */
    public int $recipientZoneId;

    /**
     * 
     *
     * @var int $recipientSubzoneId
     */
    public int $recipientSubzoneId;

    /**
     * 
     *
     * @var string $recipientPhone
     */
    public string $recipientPhone;

    /**
     * 
     *
     * @var string $recipientMobile
     */
    public string $recipientMobile;

    /**
     * 
     *
     * @var string $recipientAddress
     */
    public string $recipientAddress;

    /**
     * 
     *
     * @var string $recipientName
     */
    public ?string $recipientName;

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
     * @var string $senderAddress
     */
    public $senderAddress;

    public function __construct(
        float $weight,
        float $price,
        string $recipientPhone,
        string $recipientMobile,
        string $recipientAddress,
        int $recipientSubzoneId,
        int $recipientZoneId,
        string $recipientName = null,

        string $senderName = null,
        string $senderPhone = null,
        string $senderMobile = null,
        string $senderAddress = null,
        int $senderSubzoneId = null,
        int $senderZoneId = null,
        $id = null,
        string $code = null,
        int $piecesCount = 1,
        $returnPiecesCount = null,
        int $serviceId = 1,
        string $notes = '',
        string $description = '',
        string $refNumber = '',
        PriceField $priceTypeCode = PriceField::INCLD,
        PaymentField $paymentTypeCode = PaymentField::COLC,
        BooleanField $openableCode = BooleanField::Y,
        TypeField $typeCode = TypeField::FDP,
        Size $size = new Size(0, 0, 0),
    ) {
        $this->recipientPhone = $recipientPhone;
        $this->recipientMobile = $recipientMobile;
        $this->recipientAddress = $recipientAddress;
        $this->recipientZoneId = $recipientZoneId;
        $this->recipientSubzoneId = $recipientSubzoneId;
        $this->recipientName = $recipientName;
        $this->senderName = $senderName;
        $this->senderPhone = $senderPhone;
        $this->senderMobile = $senderMobile;
        $this->senderMobile = $senderMobile;
        $this->senderSubzoneId = $senderSubzoneId;
        $this->senderZoneId = $senderZoneId;
        $this->senderAddress = $senderAddress;

        $this->id = $id;
        $this->code = $code;
        $this->weight = $weight;
        $this->piecesCount = $piecesCount;
        $this->returnPiecesCount = $returnPiecesCount;
        $this->openableCode = $openableCode;
        $this->serviceId = $serviceId;
        $this->notes = $notes;
        $this->description = $description;
        $this->refNumber = $refNumber;
        $this->priceTypeCode = $priceTypeCode;
        $this->paymentTypeCode = $paymentTypeCode;
        $this->typeCode = $typeCode;
        $this->size = $size;
        $this->price = $price;
        $this->prepareForInput();
    }

    public function prepareForInput(): void
    {
        if (is_null($this->returnPiecesCount)) unset($this->returnPiecesCount);
    }
}
