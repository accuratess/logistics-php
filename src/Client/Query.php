<?php

namespace Accurate\Shipping\Client;

class Query
{
    protected string $operation;
    protected array $arguments = [];
    protected array $selectionSet = [];
    protected array $variables = [];

    public function __construct(string $operation)
    {
        $this->operation = $operation;
    }

    public function setArguments(array $arguments): self
    {
        $this->arguments = $arguments;
        return $this;
    }

    public function setSelectionSet(array $selectionSet): self
    {
        $this->selectionSet = $selectionSet;
        return $this;
    }

    public function setVariables(array $variables): self
    {
        $this->variables = $variables;
        return $this;
    }

    public function __toString(): string
    {
        $args = $this->formatArguments($this->arguments);
        $selection = $this->formatSelectionSet($this->selectionSet);
        $vars = $this->formatVariables($this->variables);

        $queryType = $this instanceof Mutation ? 'mutation' : 'query';
        
        if ($vars) {
            return "$queryType$vars { {$this->operation}$args { $selection } }";
        }

        return "{$queryType} { {$this->operation}$args { $selection } }";
    }

    protected function formatArguments(array $args): string
    {
        if (empty($args)) return '';
        $formatted = [];
        foreach ($args as $key => $value) {
            $formatted[] = "$key: " . $this->formatValue($value);
        }
        return '(' . implode(', ', $formatted) . ')';
    }

    protected function formatSelectionSet(array $selection): string
    {
        $formatted = [];
        foreach ($selection as $item) {
            $formatted[] = (string) $item;
        }
        return implode(' ', $formatted);
    }

    protected function formatVariables(array $vars): string
    {
        if (empty($vars)) return '';
        $formatted = [];
        foreach ($vars as $var) {
            $formatted[] = (string) $var;
        }
        return '(' . implode(', ', $formatted) . ')';
    }

    protected function formatValue($value): string
    {
        if (is_string($value) && str_starts_with($value, '$')) return $value;
        if (is_string($value)) return '"' . addslashes($value) . '"';
        if (is_bool($value)) return $value ? 'true' : 'false';
        if (is_null($value)) return 'null';
        if (is_array($value)) {
            $formatted = [];
            foreach ($value as $k => $v) {
                $formatted[] = is_int($k) ? $this->formatValue($v) : "$k: " . $this->formatValue($v);
            }
            return is_int(array_key_first($value)) ? '[' . implode(', ', $formatted) . ']' : '{' . implode(', ', $formatted) . '}';
        }
        return (string) $value;
    }
}
