<?php

namespace Seshac\Shiprocket;

use Seshac\Shiprocket\Traits\Authenticate;
use Seshac\Shiprocket\Resources\OrderResource;
use Seshac\Shiprocket\Clients\ShiprocketClient;
use Seshac\Shiprocket\Resources\PickupResource;
use Seshac\Shiprocket\Resources\ChannelResource;
use Seshac\Shiprocket\Resources\CourierResource;
use Seshac\Shiprocket\Resources\ShipmentResource;
use Seshac\Shiprocket\Resources\TrackingResource;

class ShiprocketApi
{
    use Authenticate;
    
    public $client;
  
    public function __construct(ShiprocketClient $client)
    {
        $this->client = $client;
    }

    /**
     * Get the login details including token (valid for 24 hours)
     *
     * @param array $credentials
     * @return void
     */
    public function login($credentials = null)
    {
        return $this->auth($this->client, $credentials);
    }

    /**
     * Get the auth token (valid for 24 hours)
     *
     * @param array $credentials
     * @return void
     */
    public function getToken($credentials = null)
    {
        return $this->auth($this->client, $credentials)
            ->get('token');
    }

    /**
     * Order related wrapper class
     *
     * @param string $token
     * @return object
     */
    public function order(string $token) :object
    {
        return new OrderResource($this->client, $token);
    }

    /**
     * Pickup related wrapper class
     *
     * @param string $token
     * @return object
     */
    public function pickup(string $token) :object
    {
        return new PickupResource($this->client, $token);
    }
    
    /**
     * Courier related wrapper class
     *
     * @param string $token
     * @return object
     */
    public function courier(string $token) :object
    {
        return new CourierResource($this->client, $token);
    }

    /**
     * Tracking related wrapper class
     *
     * @param string $token
     * @return object
     */
    public function track(string $token) :object
    {
        return new TrackingResource($this->client, $token);
    }

    /**
     * Channel related wrapper class
     *
     * @param string $token
     * @return object
     */
    public function channel(string $token) :object
    {
        return new ChannelResource($this->client, $token);
    }

    
    /**
     * Shipment related wrapper class
     *
     * @param string $token
     * @return object
     */
    public function shipment(string $token) :object
    {
        return new ShipmentResource($this->client, $token);
    }
    
}
