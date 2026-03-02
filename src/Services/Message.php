<?php

namespace Accurate\Shipping\Services;

use Accurate\Shipping\Enums\Fields\Core\Field;
use Accurate\Shipping\Enums\Fields\MessageField;
use Accurate\Shipping\Models\Inputs\Message as MessageInput;
use Accurate\Shipping\Services\Core\Service;
use GraphQL\Mutation;
use GraphQL\Variable;

class Message extends Service
{
    public function createMessage(MessageInput $input, $output)
    {
        $field = new Field(MessageField::class, $output);

        $mutation = (new Mutation('createConversationMessage'))
            ->setVariables([new Variable('input', 'MessageInput', true)])
            ->setArguments(['input' => '$input'])
            ->setSelectionSet(
                $field->toArray()
            );

        return $this->runOperation($mutation, ['input' => $input]);
    }
}
