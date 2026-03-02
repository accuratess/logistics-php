<?php

namespace Accurate\Shipping\Services;

use Accurate\Shipping\Enums\Fields\Core\Field;
use Accurate\Shipping\Enums\Fields\MessageField;
use Accurate\Shipping\Models\Inputs\Message as MessageInput;
use Accurate\Shipping\Services\Core\Service;
use Accurate\Shipping\Client\Mutation;
use Accurate\Shipping\Client\Variable;

class Message extends Service
{
    public function createMessage(MessageInput $input, array $images, $output)
    {
        $field = new Field(MessageField::class, $output);

        $mutation = (new Mutation('createConversationMessage'))
            ->setVariables([
                new Variable('input', 'MessageInput', true),
                new Variable('images', '[ImageInput!]', true)
            ])
            ->setArguments([
                'input' => '$input',
                'images' => '$images'
            ])
            ->setSelectionSet(
                $field->toArray()
            );

        return $this->runOperation($mutation, [
            'input' => $input,
            'images' => $images
        ]);
    }
}
