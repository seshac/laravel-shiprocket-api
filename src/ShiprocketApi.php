<?php

namespace Seshac\Shiprocket;

use Seshac\Shiprocket\Clients\ShiprocketClient;
use Seshac\Shiprocket\Resources\ChannelResource;
use Seshac\Shiprocket\Resources\CourierResource;
use Seshac\Shiprocket\Resources\GenerateResource;
use Seshac\Shiprocket\Resources\NdrResource;
use Seshac\Shiprocket\Resources\OrderResource;
use Seshac\Shiprocket\Resources\PickupResource;
use Seshac\Shiprocket\Resources\ProductResource;
use Seshac\Shiprocket\Resources\ShipmentResource;
use Seshac\Shiprocket\Resources\TrackingResource;
use Seshac\Shiprocket\Resources\WarehouseResource;
use Seshac\Shiprocket\Traits\Authenticate;

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
     * @return mixed
     */
    public function login($credentials = null)
    {
        return $this->auth($this->client, $credentials);
    }

    /**
     * Get the auth token (valid for 24 hours)
     *
     * @param array $credentials
     * @return string
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
     * @return mixed
     */
    public function order(string $token)
    {
        return new OrderResource($this->client, $token);
    }

    /**
     * Pickup related wrapper class
     *
     * @param string $token
     * @return mixed
     */
    public function pickup(string $token)
    {
        return new PickupResource($this->client, $token);
    }

    /**
     * Courier related wrapper class
     *
     * @param string $token
     * @return mixed
     */
    public function courier(string $token)
    {
        return new CourierResource($this->client, $token);
    }

    /**
     * Tracking related wrapper class
     *
     * @param string $token
     * @return mixed
     */
    public function track(string $token)
    {
        return new TrackingResource($this->client, $token);
    }

    /**
     * Channel related wrapper class
     *
     * @param string $token
     * @return mixed
     */
    public function channel(string $token)
    {
        return new ChannelResource($this->client, $token);
    }

    /**
     * Shipment related wrapper class
     *
     * @param string $token
     * @return mixed
     */
    public function shipment(string $token)
    {
        return new ShipmentResource($this->client, $token);
    }

    /**
     * Print manifest/labels related wrapper class
     *
     * @param string $token
     * @return mixed
     */
    public function generate(string $token)
    {
        return new GenerateResource($this->client, $token);
    }

    /**
     * Product related wrapper class
     *
     * @param string $token
     * @return mixed
     */
    public function product(string $token)
    {
        return new ProductResource($this->client, $token);
    }

    /**
     * Courier related wrapper class
     *
     * @param string $token
     * @return mixed
     */
    public function warehouse(string $token)
    {
        return new WarehouseResource($this->client, $token);
    }

    /**
     *  NDR related wrapper class
     *
     * @param string $token
     * @return mixed
     */
    public function ndr(string $token)
    {
        return new NdrResource($this->client, $token);
    }
}
