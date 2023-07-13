<?php

namespace Accurate\Shipping\Enums\Types;

enum PriceField: string
{
    case EXCLD = "EXCLD";      // Expenses Excluded
    case INCLD = "INCLD";      // Expenses Included
}
