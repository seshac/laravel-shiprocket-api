<?php
namespace Seshac\Shiprocket\Resources;

use Seshac\Shiprocket\Resources\Resource;


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

        return $this->postRequest($endpoint,$order);
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

        return $this->postRequest($endpoint,$order);
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

        return $this->postRequest($endpoint,$ids);
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

        return $this->patchRequest($endpoint,$data);
    }
}
