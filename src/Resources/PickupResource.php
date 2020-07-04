<?php
namespace Seshac\Shiprocket\Resources;

use Seshac\Shiprocket\Clients\Client;

class PickupResource
{
    protected $client;

    protected $token;
    
    public function __construct(Client $client, string $token)
    {
        $this->client = $client;
        $this->token = $token;
    }

    public function addLocation(array $location)
    {
        $endpoint = 'external/settings/company/addpickup';
        $location = $this->client->setEndpoint($endpoint)
                        ->setHeaders($this->token)
                        ->post($location);
        return $location;
    }

    public function getLocations()
    {

    }
}
