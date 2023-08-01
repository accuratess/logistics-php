<?php

namespace Accurate\Shipping\Enums\Types;

enum IntegrationTopicField: string
{
    case SHP_STATUS_UPDATE      = 'SHP_STATUS_UPDATE';      // shipment status update
    case SHP_CREATE             = 'SHP_CREATE';             // shipment create
    case SHP_UPDATE             = 'SHP_UPDATE';             // shipment update
    case SHP_DELETE             = 'SHP_DELETE';             // shipment delete
    case MANIFEST_APPROVED      = 'MANIFEST_APPROVED';      // manifest approved
}
