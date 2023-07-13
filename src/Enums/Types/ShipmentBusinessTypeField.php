<?php

namespace Accurate\Shipping\Enums\Types;

enum ShipmentBusinessTypeField: string
{
    case B2C = "B2C";      // Business to client
    case C2C = "C2C";      // Client to client
}
