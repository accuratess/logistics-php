<?php

namespace Accurate\Shipping\Enums\Fields;

use Accurate\Shipping\Enums\Fields\Core\Field;


enum ShippingSettingsField: string
{
    // ==========================================
    // TOP level scalars (shippingSettings.*)
    // ==========================================
    case WAYBILL_CODE = "waybillCode";
    case FORCE_POSTAL_CODE = "forcePostalCode";
    case PAY_ZERO_SHIPMENTS = "payZeroShipments";
    case RETURN_UNPAID = "returnUnpaid";
    case CLIENT_MINIMUM_VERSION = "clientMinimumVersion";
    case AGENT_MINIMUM_VERSION = "agentMinimumVersion";
    case CREATE_CUSTOMER_GL_ACCOUNT = "createCustomerGLAccount";
    case CREATE_DELIVERY_AGENT_GL_ACCOUNT = "createDeliveryAgentGLAccount";
    case CREATE_CUSTODY_GL_ACCOUNT = "createCustodyGLAccount";
    case CREATE_CONSIGNEE_GL_ACCOUNT = "createConsigneeGLAccount";
    case CREATE_SHIPMENT_IN_PAST = "createShipmentInPast";
    case UPDATE_SHIPMENT_SEQUENCE = "updateShipmentSequence";
    case CREATE_MANIFEST_IN_PAST = "createManifestInPast";
    case UPDATE_MANIFEST_SEQUENCE = "updateManifestSequence";
    case AUTO_VERIFY_CUSTOMERS = "autoVerifyCustomers";
    case CUSTODY_CUSTOMER_TEXT = "custodyCustomerText";
    case CUSTODY_DELIVERY_AGENT_TEXT = "custodyDeliveryAgentText";
    case TAX_RATE = "taxRate";
    case POST_AMOUNT_UP_TO = "postAmountUpTo";
    case POST_FEES = "postFees";
    case COUNTRY_CODE = "countryCode";
    case MULTI_COUNTRIES = "multiCountries";
    case ALLOW_PHONE_KEY = "allowPhoneKey";
    case TEST_MODE = "testMode";
    case PICKUP_ACCEPTANCE = "pickupAcceptance";
    case PICKUP_COMMISSION = "pickupCommission";
    case CUSTOM_RETURN_STATUS = "customReturnStatus";
    case HIDE_AGENT_FROM_CUSTOMER = "hideAgentFromCustomer";
    case ALLOWED_CUSTOMER_TYPES = "allowedCustomerTypes";
    case AGENT_REVIEW = "agentReview";
    case PICK_LOCATION = "pickLocation";
    case SEPARATED_BRANCHES = "separatedBranches";
    case CUSTOMER_PENDING_ADJUSTMENTS_HIDE_TOTAL = "customerPendingAdjustmentsHideTotal";
    case SYNC_INTEGRATION_SHIPMENT_MESSAGES = "syncIntegrationShipmentMessages";
    case DIM_FACTOR = "dimFactor";
    case ALLOW_ANONYMOUS_SHIPMENTS = "allowAnonymousShipments";
    case TERMS_AND_CONDITIONS = "termsAndConditions";
    case EINVOICE_CONFIGURED = "eInvoiceConfigured";
    case PHONE_EXISTS_PERIOD = "phoneExistsPeriod";
    case RENEWAL_DATE = "renewalDate";
    case WAREHOUSING = "warehousing";
    case SUPPORT = "support";
    case LANDING_PAGE = "landingPage";
    case EPAYMENT_PROVIDERS = "ePaymentProviders";

    // ==========================================
    // Nested references (TOP level uses these as selection names)
    // ==========================================
    case DEFAULT_SHIPPING_SERVICE = "defaultShippingService";
    case LOCAL_CURRENCY = "localCurrency";
    case MAIN_BRANCH = "mainBranch";
    case MAIN_CUSTOMER_GL_ACCOUNT = "mainCustomerGLAccount";
    case MAIN_DELIVERY_AGENT_GL_ACCOUNT = "mainDeliveryAgentGLAccount";
    case MAIN_CUSTODY_GL_ACCOUNT = "mainCustodyGLAccount";
    case MAIN_CONSIGNEE_GL_ACCOUNT = "mainConsigneeGLAccount";
    case MAIN_CASH_GL_ACCOUNT = "mainCashGLAccount";
    case DEFAULT_LANGUAGE = "defaultLanguage";
    case PAID_SHIPMENTS_GL_ACCOUNT = "paidShipmentsGLAccount";
    case TAX_GL_ACCOUNT = "taxGLAccount";
    case MAIL_GL_ACCOUNT = "mailGLAccount";
    case DEFAULT_TRANSACTION_TYPE = "defaultTransactionType";
    case DEFAULT_PKBK_TRANSACTION_TYPE = "defaultPKBKTransactionType";
    case DEFAULT_DEX_TRANSACTION_TYPE = "defaultDEXTransactionType";
    case DEFAULT_PKD_TRANSACTION_TYPE = "defaultPKDTransactionType";
    case DEFAULT_RTS_TRANSACTION_TYPE = "defaultRTSTransactionType";
    case DEFAULT_RJCT_TRANSACTION_TYPE = "defaultRJCTTransactionType";
    case DEFAULT_RTRN_TRANSACTION_TYPE = "defaultRTRNTransactionType";
    case DEFAULT_DTR_TRANSACTION_TYPE = "defaultDTRTransactionType";
    case DEFAULT_HTR_TRANSACTION_TYPE = "defaultHTRTransactionType";
    case SHIPMENT_UPDATE_BRANCH = "shipmentUpdateBranch";
    case POST_PAYMENT_TYPES = "postPaymentTypes";
    case OTD_ACCEPTANCE = "otdAcceptance";
    case HIDE_SENDER_MOBILE_FROM = "hideSenderMobileFrom";
    case NOTIFY_CUSTOMER_SHIPMENT_STATUS = "notifyCustomerShipmentStatus";
    case NOTIFICATIONS_MESSAGES = "notificationsMessages";
    case WHATSAPP = "whatsapp";
    case SMS = "sms";
    case EMAIL = "email";
    case ANONYMOUS_CUSTOMER = "anonymousCustomer";
    case SHIPMENT_FORM_TYPE_CODE = "shipmentFormTypeCode";
    case EINVOICE_GATE = "eInvoiceGate";
    case EINVOICE_ENVIRONMENT = "eInvoiceEnvironment";
    case MOBILE_APPS = "mobileApps";


    static function defaultShippingService(array $fields): Field
    {
        return new Field(ShippingSettingsField::class, $fields, 'defaultShippingService');
    }

    static function localCurrency(array $fields): Field
    {
        return new Field(ShippingSettingsField::class, $fields, 'localCurrency');
    }

    static function mainBranch(array $fields): Field
    {
        return new Field(ShippingSettingsField::class, $fields, 'mainBranch');
    }

    static function glAccount(string $scopeName, array $fields): Field
    {
        return new Field(ShippingSettingsField::class, $fields, $scopeName);
    }

    static function defaultLanguage(array $fields): Field
    {
        return new Field(ShippingSettingsField::class, $fields, 'defaultLanguage');
    }

    static function transactionType(string $scopeName, array $fields): Field
    {
        return new Field(ShippingSettingsField::class, $fields, $scopeName);
    }

    static function shipmentUpdateBranch(array $fields): Field
    {
        return new Field(ShippingSettingsField::class, $fields, 'shipmentUpdateBranch');
    }

    static function lookupEntry(string $scopeName, array $fields): Field
    {
        return new Field(ShippingSettingsField::class, $fields, $scopeName);
    }

    static function notificationsMessages(array $fields): Field
    {
        return new Field(ShippingSettingsField::class, $fields, 'notificationsMessages');
    }

    static function whatsapp(array $fields): Field
    {
        return new Field(ShippingSettingsField::class, $fields, 'whatsapp');
    }

    static function sms(array $fields): Field
    {
        return new Field(ShippingSettingsField::class, $fields, 'sms');
    }

    static function email(array $fields): Field
    {
        return new Field(ShippingSettingsField::class, $fields, 'email');
    }

    static function anonymousCustomer(array $fields): Field
    {
        return new Field(ShippingSettingsField::class, $fields, 'anonymousCustomer');
    }

    static function mobileApps(array $fields): Field
    {
        return new Field(ShippingSettingsField::class, $fields, 'mobileApps');
    }
}
