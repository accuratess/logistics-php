<?php

namespace Accurate\Shipping\Client;

class Variable
{
    protected string $name;
    protected string $type;
    protected bool $required;

    public function __construct(string $name, string $type, bool $required = false)
    {
        $this->name = $name;
        $this->type = $type;
        $this->required = $required;
    }

    public function __toString(): string
    {
        return '$' . $this->name . ': ' . $this->type . ($this->required ? '!' : '');
    }
}
