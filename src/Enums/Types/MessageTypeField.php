<?php

namespace Accurate\Shipping\Enums\Types;

enum MessageTypeField: string
{
    case TEXT     = 'TEXT';     // text message
    case LOCATION = 'LOCATION'; // location message
}
