<?php

namespace Accurate\Shipping\Enums\Fields;

enum SizeField :string
{
    case LENGTH    = "length";        // Size length
    case WIDTH     = "width";         // Size width
    case HEIGHT    = "height";        // Size height
}
