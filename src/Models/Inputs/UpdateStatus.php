<?php

namespace Accurate\Shipping\Models\Inputs;

use Accurate\Shipping\Models\Inputs\Fields\DeliveredField;
use Accurate\Shipping\Models\Inputs\Fields\ExceptionField;
use Accurate\Shipping\Models\Inputs\Fields\HoldedField;
use Accurate\Shipping\Models\Inputs\Fields\ReturnField;

/**
 * 
 */
class UpdateStatus
{

    public function __construct(
        public int $id,
        public ?string $notes = '',
        public ?DeliveredField $deliveredField = null,
        public ?ExceptionField $deliveryException = null,
        public ?HoldedField $holdToRedeliver = null,
        public ?ReturnField $returnField = null,
    ) {
        $this->id = $id;
        $this->notes = $notes;
        $this->deliveredField = $deliveredField;
        $this->deliveryException = $deliveryException;
        $this->holdToRedeliver = $holdToRedeliver;
        $this->returnField = $returnField;
    }
}
