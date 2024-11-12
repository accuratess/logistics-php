<?php

namespace Accurate\Shipping\Models\Filters;

class ListShipmentFilter
{
    /**
     * Undocumented function
     *
     * @param array|null $id
     * @param array|null $code
     * @param array|null $search
     * @param array|null $refNumber
     * @param integer|null $recipientZoneId
     * @param integer|null $recipientSubzoneId
     * @param integer|null $serviceId
     * @param boolean|null $collected
     * @param boolean|null $paid
     * @param boolean|null $new
     * @param [type] $fromDate
     * @param [type] $toDate
     * @param [type] $lastTransactionFromDate
     * @param [type] $lastTransactionToDate
     * @param [type] $statusCode
     * @param [type] $paymentTypeCode
     * @param [type] $typeCode
     * @param [type] $returnTypeCode
     * @param [type] $deliveryTypeCode
     */
    public function __construct(
        public ?array $id = null,
        public ?array $code = null,
        public ?array $search = null,
        public ?array $refNumber = null,
        public ?int $recipientZoneId = null,
        public ?int $recipientSubzoneId = null,
        public ?int $serviceId = null,
        public ?bool $collected = null,
        public ?bool $paid = null,
        public ?bool $new = null,
        public $fromDate = null,
        public $toDate = null,
        public $lastTransactionFromDate = null,
        public $lastTransactionToDate = null,
        public $statusCode = null,
        public $paymentTypeCode = null,
        public $typeCode = null,
        public $returnTypeCode = null,
        public $deliveryTypeCode = null,
    ) {
    }
}
