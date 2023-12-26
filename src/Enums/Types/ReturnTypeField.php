<?php

namespace Accurate\Shipping\Enums\Types;

enum ReturnTypeField: string
{
    case WFDF = "WFDF";    // With Fully Due Fess
    case WODF = "WODF";    // Without Due Fees
    case WPDF = "WPDF";    // With Partially Due Fees
    case FPC = "FPC";      // Fees Partially Collected 
    case FFC = "FFC";      // Fees Fully Collected 
    case PRTS = "PRTS";    // Partially Returning
}
