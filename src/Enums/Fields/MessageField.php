<?php

namespace Accurate\Shipping\Enums\Fields;

use Accurate\Shipping\Enums\Fields\ConversationField;
use Accurate\Shipping\Enums\Fields\Core\Field;
use Accurate\Shipping\Enums\Fields\Core\ImageField;
use Accurate\Shipping\Enums\Fields\Core\UserField;

enum MessageField: string
{
    case ID = "id";
    case BODY = "body";
    case TYPE_CODE = "typeCode";
    case READ_AT = "readAt";
    case CREATED_AT = "createdAt";

    static function images(array $fields): Field
    {
        return new Field(ImageField::class, $fields, $scopeName = __FUNCTION__);
    }

    static function conversation(array $fields): Field
    {
        return new Field(ConversationField::class, $fields, $scopeName = __FUNCTION__);
    }

    static function user(array $fields): Field
    {
        return new Field(UserField::class, $fields, $scopeName = __FUNCTION__);
    }
}
