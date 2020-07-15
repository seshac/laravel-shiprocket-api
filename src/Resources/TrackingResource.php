<?php
namespace Seshac\Shiprocket\Resources;

use Seshac\Shiprocket\Clients\Client;

class TrackingResource
{
    protected $client;

    protected $token;
  
    public function __construct(Client $client, string $token)
    {
        $this->client = $client;
        $this->token = $token;
    }

    /**
     * Get the tracking details of shipment by using the single AWB code
     * @param string $awb
     * @return mixed
     */
    public function throughAwb(string $awb)
    {
        $endpoint = 'external/courier/track/awb/'. $awb;

        return $this->client->setEndpoint($endpoint)
                ->setHeaders($this->token)
                ->get();
    }


    /**
     * Get the tracking details of multiple shipments by using AWB codes together as an array.
     *
     * @param array $data
     * @return mixed
     */
    public function throwMultipleAwb(array $awbs)
    {
        $endpoint = 'external/courier/track/awbs';

        return $this->client->setEndpoint($endpoint)
            ->setHeaders($this->token)
            ->post($awbs);
    }
    
    /**
     * Get the tracking details of shipment by using the ShipmentId
     *
     * @param string $shipmentId
     * @return mixed
     */
    public function throwShipmentId(string $shipmentId)
    {
        $endpoint = 'external/courier/track/shipment/' . $shipmentId;

        return $this->client->setEndpoint($endpoint)
            ->setHeaders($this->token)
            ->get();
    }

    /**
     * Get the tracking details of shipment by using the OrderId
     *
     * @param string $orderId
     * @param string $channelId
     * @return mixed
     */
    public function throwOrderId(string $orderId, string $channelId = null)
    {
        $endpoint = 'external/courier/track?order_id='. $orderId;
        if ($channelId) {
            $endpoint = $endpoint . '&channel_id=' . $channelId;
        }

        return $this->client->setEndpoint($endpoint)
            ->setHeaders($this->token)
            ->get();
    }
}
