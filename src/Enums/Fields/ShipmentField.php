<?php

namespace Accurate\Shipping\Enums\Fields;

use Accurate\Shipping\Enums\Fields\Core\DropDownField;
use Accurate\Shipping\Enums\Fields\Core\Field;

/**
 * Shipment type fields.
 * That will be the fields you can return.
 */
enum ShipmentField: string
{
    case ID = "id";
    case CODE = "code";
    case TRACKING_URL = "trackingUrl";
    case CREATEDAT = "createdAt";
    case UPDATEDAT = "updatedAt";
    case DESCRIPTION = "description";
    case DELIVERYDATE = "deliveryDate";
    case DELIVEREDCANCELEDDATE = "deliveredCanceledDate";
    case WEIGHT = "weight";
    case PIECESCOUNT = "piecesCount";
    case DATE = "date";
    case RECIPIENTLATITUDE = "recipientLatitude";
    case RECIPIENTLONGITUDE = "recipientLongitude";
    case SENDERLATITUDE = "senderLatitude";
    case SENDERLONGITUDE = "senderLongitude";
    case REFNUMBER = "refNumber";
    case NOTES = "notes";
    case RETURNPIECESCOUNT = "returnPiecesCount";
    case ATTEMPTS = "attempts";
    case AMOUNT = "amount";
    case DELIVERYFEES = "deliveryFees";
    case EXTRAWEIGHTFEES = "extraWeightFees";
    case COLLECTIONFEES = "collectionFees";
    case PRICE = "price";
    case TOTALAMOUNT = "totalAmount";
    case DELIVEREDAMOUNT = "deliveredAmount";
    case RETURNINGDUEFEES = "returningDueFees";
    case RETURNEDVALUE = "returnedValue";
    case ALLDUEFEES = "allDueFees";
    case COLLECTEDFEES = "collectedFees";
    case CUSTOMERDUE = "customerDue";
    case COLLECTEDAMOUNT = "collectedAmount";
    case PENDINGCOLLECTIONAMOUNT = "pendingCollectionAmount";
    case RETURNFEES = "returnFees";
    case RETURNDELIVERYFEES = "returnDeliveryFees";
    case RETURNCOLLECTIONFEES = "returnCollectionFees";
    case POSTFEES = "postFees";
    case TAX = "tax";
    case RECIPIENTNAME = "recipientName";
    case RECIPIENTPHONE = "recipientPhone";
    case RECIPIENTMOBILE = "recipientMobile";
    case RECIPIENTADDRESS = "recipientAddress";
    case RECIPIENTPOSTALCODE = "recipientPostalCode";
    case SENDERNAME = "senderName";
    case SENDERPHONE = "senderPhone";
    case SENDERMOBILE = "senderMobile";
    case SENDERADDRESS = "senderAddress";
    case SENDERPOSTALCODE = "senderPostalCode";
    const TYPE = "type";
    case SIGNATURE = "signature";
        // -- Subselections attributs
    case OPENABLE = "openable";
    case PAYMENT_TYPE = "paymentType";
    case PRICE_TYPE = "priceType";
    case DELIVERY_TYPE = "deliveryType";
    case RETURN_TYPE = "returnType";
    case TRANSACTION_TYPE = "transactionType";
    case SERVICE = "service";
    case BRANCH = "branch";
    case ORIGIN_BRANCH = "originBranch";
    case CUSTOMER = "customer";
    case SIZE = "size";
    case STATUS = "status";
    case RETURN_STATUS = "returnStatus";
    case CANCELLATION_REASON = "cancellationReason";
    case TRANSACTIONS = "transactions";
    case MESSAGES = "messages";
    case RECIPIENT_ZONE = "recipientZone";
    case RECIPIENT_SUBZONE = "recipientSubzone";
    case SENDER_ZONE = "senderZone";
    case SENDER_SUBZONE = "senderSubzone";

    static function customer(array $fields): Field
    {
        return new Field(CustomerField::class, $fields, $scopeName = __FUNCTION__);
    }

    static function size(array $fields): Field
    {
        return new Field(sizefield::class, $fields, $scopeName = __FUNCTION__);
    }

    static function service(array $fields): Field
    {
        return new Field(ServiceField::class, $fields, $scopeName = __FUNCTION__);
    }

    static function branch(array $fields): Field
    {
        return new Field(BranchField::class, $fields, $scopeName = __FUNCTION__);
    }

    static function originBranch(array $fields): Field
    {
        return new Field(BranchField::class, $fields, $scopeName = __FUNCTION__);
    }

    static function transactionType(array $fields): Field
    {
        return new Field(TransactionField::class, $fields, $scopeName = __FUNCTION__);
    }

    static function messages(array $fields): Field
    {
        return new Field(MessageField::class, $fields, $scopeName = __FUNCTION__);
    }

    static function senderZone(array $fields): Field
    {
        return new Field(ZoneField::class, $fields, $scopeName = __FUNCTION__);
    }

    static function senderSubzone(array $fields): Field
    {
        return new Field(ZoneField::class, $fields, $scopeName = __FUNCTION__);
    }

    static function recipientZone(array $fields): Field
    {
        return new Field(ZoneField::class, $fields, $scopeName = __FUNCTION__);
    }

    static function recipientSubzone(array $fields): Field
    {
        return new Field(ZoneField::class, $fields, $scopeName = __FUNCTION__);
    }

    static function cancellationReason(array $fields): Field
    {
        return new Field(CancellationReasonField::class, $fields, $scopeName = __FUNCTION__);
    }

    static function transactions(array $fields): Field
    {
        return new Field(DropDownField::class, $fields, $scopeName = __FUNCTION__);
    }

    static function type(array $fields): Field
    {
        return new Field(DropDownField::class, $fields, $scopeName = __FUNCTION__);
    }

    static function openable(array $fields): Field
    {
        return new Field(DropDownField::class, $fields, $scopeName = __FUNCTION__);
    }

    static function paymentType(array $fields): Field
    {
        return new Field(DropDownField::class, $fields, $scopeName = __FUNCTION__);
    }

    static function priceType(array $fields): Field
    {
        return new Field(DropDownField::class, $fields, $scopeName = __FUNCTION__);
    }

    static function deliveryType(array $fields): Field
    {
        return new Field(DropDownField::class, $fields, $scopeName = __FUNCTION__);
    }

    static function returnType(array $fields): Field
    {
        return new Field(DropDownField::class, $fields, $scopeName = __FUNCTION__);
    }

    static function returnStatus(array $fields): Field
    {
        return new Field(DropDownField::class, $fields, $scopeName = __FUNCTION__);
    }

    static function status(array $fields): Field
    {
        return new Field(DropDownField::class, $fields, $scopeName = __FUNCTION__);
    }
}
