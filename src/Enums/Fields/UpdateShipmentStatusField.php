<?php

namespace Accurate\Shipping\Enums\Fields;

/**
 * Shipment type fields.
 * That will be the fields you can return.
 */
enum UpdateShipmentStatusField: string
{
    case ID = "id";
    case STATUS_CODE = "statusCode";
    case NOTE = "note";
    case CANCELLATION_REASON_ID = "cancellationReasonId";
    case DELIVERY_TYPE_CODE = "deliveryTypeCode";
    case DELIVERED_AMOUNT = "deliveredAmount";
    case DELIVERY_DATE = "deliveryDate";
    case FEES = "fees";
    case RETURN_TYPE_CODE = "returnTypeCode";
}
