<?php

namespace Accurate\Shipping\Enums\Types;

enum ShipmentStatusField: string
{
    case BMR   = "BMR";        // Branch Manifest - Receive
    case BMT   = "BMT";        // Branch Manifest - Transfer
    case DEX   = "DEX";        // Delivery Exception
    case DTR   = "DTR";        // Delivered To Consignee
    case HTR   = "HTR";        // Hold To Redeliver
    case OTD   = "OTD";        // Out To Deliver
    case OTR   = "OTR";        // Out To Return
    case PKD   = "PKD";        // Picked Up
    case PKH   = "PKH";        // Pickup rescheduled
    case PKM   = "PKM";        // Picking Up
    case PKR   = "PKR";        // Shipping Request
    case RITS  = "RITS";       // Received In The Store
    case RJCT  = "RJCT";       // Rejected
    case RTRN  = "RTRN";       // Returned To Shipper
    case RTS   = "RTS";        // Returning To Shipper
}
