<?php

namespace Accurate\Shipping\Client;

use GraphQL\Client as GraphQLClient;

class Client extends GraphQLClient
{
    public static self $shared;

    public static function init(string $endpoint, array $headers = [])
    {
        $headers['x-integation'] = 'true';
        self::$shared = new self($endpoint, $headers);
    }
}
