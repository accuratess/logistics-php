<?php

namespace Accurate\Shipping\Services;

use Accurate\Shipping\Enums\Fields\Core\Field;
use Accurate\Shipping\Services\Core\Service;
use Accurate\Shipping\Client\Mutation;
use Accurate\Shipping\Client\Variable;
use Accurate\Shipping\Enums\Fields\ConversationField;
use Accurate\Shipping\Models\Inputs\StartConversation as StartConversationInput;

class Conversation extends Service
{
    public function startConversation(StartConversationInput $input, $output)
    {
        $field = new Field(ConversationField::class, $output);

        $mutation = (new Mutation('startConversation'))
            ->setVariables([
                new Variable('input', 'StartConversationInput', true),
            ])
            ->setArguments([
                'input' => '$input',
            ])
            ->setSelectionSet(
                $field->toArray()
            );

        return $this->runOperation($mutation, [
            'input' => $input,
        ]);
    }
}
