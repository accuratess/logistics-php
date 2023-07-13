<?php

namespace Accurate\Shipping\Enums\Types;

enum TypeField: string
{
    case FDP = "FDP";      // Fully deliver package
    case PDP = "PDP";      // Partially deliver package
    case PTP = "PTP";      // Package to package
    case RTS = "RTS";      // Return to shipper
    case CLC = "CLC";      // Money collection
}
