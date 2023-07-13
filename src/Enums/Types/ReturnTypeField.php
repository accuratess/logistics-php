<?php

namespace Accurate\Shipping\Enums\Types;

enum ReturnTypeField: string
{
    case WFDF = "WFDF";    // With Fully Due Fess استحقاق كامل المصروفات من الراسل 
    case WODF = "WODF";    // Without Due Fees بدون تحمل اي مصروفات 
    case WPDF = "WPDF";    // With Partially Due Fees   من الراسل تحمل جزء من المصروفات 
    case FPC = "FPC";      // Fees Partially Collected تم تحصيل جزء من مصاريف الشحن من المستلم 

    case FFC = "FFC";      // Fees Fully Collected تم تحصيل مصاريف الشحن من المستلم 
    case PRTS = "PRTS";    // Partially Returning
}
