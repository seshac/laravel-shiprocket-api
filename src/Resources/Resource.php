<?php

namespace Seshac\Shiprocket\Resources;

use Seshac\Shiprocket\Clients\Client;

abstract class Resource implements ResourceInterface
{
    protected $client;

    protected $token;

    public function __construct(Client $client, string $token)
    {
        $this->client = $client;
        $this->token = $token;
    }

    public function getRequest(string $endpoint)
    {
        return  $this->client->setEndpoint($endpoint)
                    ->setHeaders($this->token)
                    ->get();
    }

    public function postRequest(string $endpoint, array $params)
    {
        return $this->client->setEndpoint($endpoint)
                    ->setHeaders($this->token)
                    ->post($params);
    }

    public function patchRequest(string $endpoint, array $params)
    {
        return $this->client->setEndpoint($endpoint)
                    ->setHeaders($this->token)
                    ->patch($params);
    }
}
