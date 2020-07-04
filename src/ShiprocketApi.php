<?php

namespace Seshac\Shiprocket;

use Seshac\Shiprocket\Traits\Authenticate;
use Seshac\Shiprocket\Resources\OrderResource;
use Seshac\Shiprocket\Clients\ShiprocketClient;
use Seshac\Shiprocket\Resources\PickupResource;

class ShiprocketApi
{

    use Authenticate;
    
    public $client;
  
    public function __construct(ShiprocketClient $client)
    {
        $this->client = $client;
    } 

    public function getToken(array $credentials) {
        return $this->login($this->client, $credentials);
    }

    public function order(string $token) :object
    {
        return new OrderResource($this->client, $token);
    }

    public function pickup(string $token) :object
    {
        return new PickupResource($this->client, $token);
    }

}
