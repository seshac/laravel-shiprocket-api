<?php
namespace Seshac\Shiprocket\Resources;

use Seshac\Shiprocket\Clients\Client;

class OrderResource
{
    protected $client;

    protected $token;
  
    public function __construct(Client $client, string $token)
    {
        $this->client = $client;
        $this->token = $token;
    }


    /**
     * Use this API to do multiple tasks in one go, namely creating a quick order,
     * requesting for its shipment and finally generating the label and manifest for the same order.
     *
     * @param array $order
     * @return mixed
     */
    public function quickCreate(array $order)
    {
        $endpoint = 'external/shipments/create/forward-shipment';

        return $this->client->setEndpoint($endpoint)
                ->setHeaders($this->token)
                ->post($order);
    }

    /**
     * Create a custom or channel specific order
     *
     * @param array $order
     * @param bool $channelSpecificOrder
     * @return mixed
     */
    public function create(array $order, bool $channelSpecificOrder = false)
    {
        if ($channelSpecificOrder) {
            $endpoint = 'external/orders/create';
        } else {
            $endpoint = 'external/orders/create/adhoc';
        }

        return $this->client->setEndpoint($endpoint)
                    ->setHeaders($this->token)
                    ->post($order);
    }

    /**
     * Cancel an Order
     *
     * @param array $ids
     * @return mixed
     */
    public function cancel(array $ids)
    {
        $endpoint = 'external/orders/cancel';

        return $this->client->setEndpoint($endpoint)
                ->setHeaders($this->token)
                ->post($ids);
    }


    public function updatePickupLocation(array $data)
    {
        $endpoint = 'external/orders/address/pickup';

        return $this->client->setEndpoint($endpoint)
                    ->setHeaders($this->token)
                    ->patch($data);
    }
}
