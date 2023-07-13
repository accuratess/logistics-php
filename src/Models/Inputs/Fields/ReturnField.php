<?php

namespace Accurate\Shipping\Models\Inputs\Fields;

use Accurate\Shipping\Models\Inputs\Fields\Return\Core\ReturnType;
use Accurate\Shipping\Models\Inputs\Fields\Return\FeesCollectedPartialyReturnField;
use Accurate\Shipping\Models\Inputs\Fields\Return\FullyDueField;
use Accurate\Shipping\Models\Inputs\Fields\Return\PartialyDueField;
use Accurate\Shipping\Models\Inputs\Fields\Return\WithoutDueField;


class ReturnField
{
    /**
     * The returnField is FeesCollectedPartialyReturnField | FullyDueField | PartialyDueField | WithoutDueField
     *
     * @param FeesCollectedPartialyReturnField|FullyDueField|PartialyDueField|WithoutDueField  $returnField
     */
    public function __construct(public ReturnType $returnField)
    {
        $this->returnField = $returnField;
    }
}
