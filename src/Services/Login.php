<?php

namespace Accurate\Shipping\Services;

use Accurate\Shipping\Enums\Fields\Core\Field;
use Accurate\Shipping\Enums\Fields\LoginField;
use Accurate\Shipping\Models\Inputs\Login as LoginInput;
use Accurate\Shipping\Services\Core\Service;
use GraphQL\Mutation;
use GraphQL\Variable;

class Login extends Service
{
    public function login(LoginInput $input, array $output)
    {
        $field = new Field(LoginField::class, $output);
        $mutation = (new Mutation('login'))
            ->setVariables([new Variable('input', 'LoginInput', true)])
            ->setArguments(['input' => '$input'])
            ->setSelectionSet(
                $field->toArray()
            );

        return $this->runOperation($mutation, ['input' => $input]);
    }
}
