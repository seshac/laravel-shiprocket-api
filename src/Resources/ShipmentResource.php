<?php
namespace Seshac\Shiprocket\Resources;

use Seshac\Shiprocket\Clients\Client;

class ShipmentResource
{
    protected $client;

    protected $token;
    
    public function __construct(Client $client, string $token)
    {
        $this->client = $client;
        $this->token = $token;
    }

    /**
     *  Get the shipment details of all the shipments
     *
     * @param array $extraParam
     * @return mixed
     */
    public function get(array $extraParam = null)
    {
        $endpoint = 'external/shipments';

        if ($extraParam) {
            $endpoint = $endpoint . '?' .  http_build_query($extraParam);
        }

        return  $this->client->setEndpoint($endpoint)
            ->setHeaders($this->token)
            ->get();
    }

    /**
     * Get the details of a specific Shipment
     *
     * @param string $shipmentId
     * @return mixed
     */
    public function getSpecific(string $shipmentId)
    {
        $endpoint = 'external/shipments/' . $shipmentId;

        return $this->client->setEndpoint($endpoint)
            ->setHeaders($this->token)
            ->get();
    }
}
