<?php

namespace Accurate\Shipping\Client;

/**
 * Typed response wrapper for GraphQL operations.
 *
 * Replaces the anonymous class previously returned by Client::runQuery().
 */
class GraphQLResponse
{
    private mixed $data;

    public function __construct(mixed $data)
    {
        $this->data = $data;
    }

    /**
     * Returns the `data` portion of the GraphQL response.
     */
    public function getResults(): mixed
    {
        return is_array($this->data)
            ? ($this->data['data'] ?? [])
            : ($this->data->data ?? []);
    }

    /**
     * Returns true when the response contains GraphQL-level errors.
     */
    public function hasErrors(): bool
    {
        return is_array($this->data)
            ? !empty($this->data['errors'])
            : !empty($this->data->errors ?? null);
    }

    /**
     * Returns the GraphQL errors array, or an empty array if none.
     */
    public function getErrors(): array
    {
        if (is_array($this->data)) {
            return $this->data['errors'] ?? [];
        }
        return (array) ($this->data->errors ?? []);
    }

    /**
     * Returns the full decoded response body.
     */
    public function getData(): mixed
    {
        return $this->data;
    }
}
