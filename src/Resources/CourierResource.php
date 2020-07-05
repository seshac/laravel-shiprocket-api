<?php
namespace Seshac\Shiprocket\Resources;

use Seshac\Shiprocket\Clients\Client;

class CourierResource
{
    protected $client;

    protected $token;
  
    public function __construct(Client $client, string $token)
    {
        $this->client = $client;
        $this->token = $token;
    }

    /**
     * Generate AWB for specific order
     *
     * @param array $data
     * @return void
     */
    public function generateAWB(array $data)
    {
        $endpoint = 'external/courier/assign/awb';

        return $this->client->setEndpoint($endpoint)
                    ->setHeaders($this->token)
                    ->post($data);
    }

    /**
     * Check the serviability for local pincode
     *
     * @param array $data
     * @return mixed
     */
    public function checkServiceability(array $data)
    {
        $endpoint = 'external/courier/serviceability/?' . http_build_query($data);

        return $this->client->setEndpoint($endpoint)
                            ->setHeaders($this->token)
                            ->get();
    }

    /** Todo */
    public function checkInterNationalServiceability()
    {
    }

    /** Todo */
    public function requestPickup()
    {
    }
}
