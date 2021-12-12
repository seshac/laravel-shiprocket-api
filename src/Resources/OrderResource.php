<?php

namespace Seshac\Shiprocket\Resources;

class OrderResource extends Resource
{
    /**
     * Use this API to do multiple tasks in one go, namely creating a quick order,
     * requesting for its shipment and finally generating the label and manifest for the same order.
     *
     * @param array $order
     * @return mixed
     */
    public function quickCreate(array $order)
    {
        $endpoint = 'shipments/create/forward-shipment';

        return $this->postRequest($endpoint, $order);
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
            $endpoint = 'orders/create';
        } else {
            $endpoint = 'orders/create/adhoc';
        }

        return $this->postRequest($endpoint, $order);
    }

    /**
     * Cancel an Order
     *
     * @param array $ids
     * @return mixed
     */
    public function cancel(array $ids)
    {
        $endpoint = 'orders/cancel';

        return $this->postRequest($endpoint, $ids);
    }

    /**
     * Update the pickup location
     *
     * @param array $data
     * @return mixed
     */
    public function updatePickupLocation(array $data)
    {
        $endpoint = 'orders/address/pickup';

        return $this->patchRequest($endpoint, $data);
    }

    /**
     * Use this API to do multiple tasks in one go, namely getting order,
     * just pass parameter and u will get result
     * https://apidocs.shiprocket.in/#d4f48023-b0b2-40af-8072-1adf97227d21
     * @param array $param
     * @return mixed
     */
    public function getOrders(array $param)
    {
        $endpoint = 'orders';
        if ($param) {
            $endpoint = $endpoint . '?' .  http_build_query($param);
        }

        return $this->getRequest($endpoint, $param);
    }
}
