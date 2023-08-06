<?php

namespace Accurate\Shipping\Models\Inputs;

class Login
{
    public function __construct(public string $username, public string $password, public bool $rememberMe = true)
    {
    }
}
