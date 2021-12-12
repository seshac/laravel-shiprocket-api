<?php

namespace Seshac\Shiprocket\Resources;

class TrackingResource extends Resource
{
    /**
     * Get the tracking details of shipment by using the single AWB code
     * @param string $awb
     * @return mixed
     */
    public function throughAwb(string $awb)
    {
        $endpoint = 'courier/track/awb/'. $awb;

        return $this->getRequest($endpoint);
    }

    /**
     * Get the tracking details of multiple shipments by using AWB codes together as an array.
     *
     * @param array $data
     * @return mixed
     */
    public function throwMultipleAwb(array $awbs)
    {
        $endpoint = 'courier/track/awbs';

        return $this->postRequest($endpoint, $awbs);
    }

    /**
     * Get the tracking details of shipment by using the ShipmentId
     *
     * @param string $shipmentId
     * @return mixed
     */
    public function throwShipmentId(string $shipmentId)
    {
        $endpoint = 'courier/track/shipment/' . $shipmentId;

        return $this->getRequest($endpoint);
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
        $endpoint = 'courier/track?order_id='. $orderId;
        if ($channelId) {
            $endpoint = $endpoint . '&channel_id=' . $channelId;
        }

        return $this->getRequest($endpoint);
    }
}
