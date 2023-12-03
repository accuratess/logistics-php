<?php

namespace App\Enums\Types;

/**
 *
 *
 */
enum  WebHookTypeCode
{
    const SHP_STATUS_UPDATE      = 'SHP_STATUS_UPDATE';         // shipment status update
    const SHP_CREATE             = 'SHP_CREATE';                // shipment create
    const SHP_UPDATE             = 'SHP_UPDATE';                // shipment update
    const SHP_DELETE             = 'SHP_DELETE';                // shipment delete
}
