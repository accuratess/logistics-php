<?php

namespace Accurate\Shipping\Enums\Types;

enum PaymentField: string
{
    case COLC = "COLC";        // Due Collection
    case PAID = "PAID";        // Prepaid
    case PTP  = "PTP";         // Package To Package
    case MAIL = "MAIL";        // Mail
    case CASH = "CASH";        // Cash
    case CRDT = "CRDT";        // Credit
    case VISA = "VISA";        // Credit card
}
