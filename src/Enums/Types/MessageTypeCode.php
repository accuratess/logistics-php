<?php

namespace Accurate\Shipping\Enums\Types;

enum MessageTypeCode: string
{
    case TEXT     = 'TEXT';     // text message
    case LOCATION = 'LOCATION'; // location message
}
