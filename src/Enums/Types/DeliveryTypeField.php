<?php

namespace Accurate\Shipping\Enums\Types;

enum DeliveryTypeField: string
{
    case FD = "FD";        // Fully Delivered
    case PD = "PD";        // Partially Delivered
}
