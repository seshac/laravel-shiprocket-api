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

        return  $this->client->setEndpoint($endpoint)
                        ->setHeaders($this->token)
                        ->post($location);
    }

    public function getLocations()
    {
        $endpoint = 'external/settings/company/pickup';

        return $this->client->setEndpoint($endpoint)
            ->setHeaders($this->token)
            ->get();
    }
}
