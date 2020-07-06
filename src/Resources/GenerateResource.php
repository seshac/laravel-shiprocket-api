<?php
namespace Seshac\Shiprocket\Resources;

use Seshac\Shiprocket\Clients\Client;

class GenerateResource
{
    protected $client;

    protected $token;
    
    public function __construct(Client $client, string $token)
    {
        $this->client = $client;
        $this->token = $token;
    }

    /**
     *  Generate the manifest of orders using shipment Id's
     *
     * @param array $shipmentIds
     * @return mixed
     */
    public function manifest(array $shipmentIds)
    {
        $endpoint = 'external/manifests/generate';

        return  $this->client->setEndpoint($endpoint)
                        ->setHeaders($this->token)
                        ->post($shipmentIds);
    }

    /**
     * Mnaifest needs to be generated first in order for this API to print it. Use the 'Generate Manifest' API to do the same
     *
     * @param array $orderIds
     * @return mixed
     */
    public function printManifest(array $orderIds)
    {
        $endpoint = 'external/manifests/print';

        return $this->client->setEndpoint($endpoint)
            ->setHeaders($this->token)
            ->post($orderIds);
    }

    /**
     * Generate the label of an order by passing the shipment id in the form of an array
     *
     * @param array $shipmentIds
     * @return mixed
     */
    public function label(array $shipmentIds)
    {
        $endpoint = 'external/courier/generate/label';

        return  $this->client->setEndpoint($endpoint)
                        ->setHeaders($this->token)
                        ->post($shipmentIds);
    }
    
    /**
     * Generate the invoice for you're order.
     *
     * @param array $orderIds
     * @return void
     */
    public function invoice(array $orderIds)
    {
        $endpoint = 'external/orders/print/invoice';

        return  $this->client->setEndpoint($endpoint)
                        ->setHeaders($this->token)
                        ->post($orderIds);
    }
}
