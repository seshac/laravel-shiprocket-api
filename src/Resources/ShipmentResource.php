<?php

namespace Seshac\Shiprocket\Resources;

class ShipmentResource extends Resource
{
    /**
     *  Get the all shipment details
     *
     * @param array $extraParam
     * @return mixed
     */
    public function get(array $extraParam = null)
    {
        $endpoint = 'shipments';

        if ($extraParam) {
            $endpoint = $endpoint . '?' .  http_build_query($extraParam);
        }

        return $this->getRequest($endpoint);
    }

    /**
     * Get the details of a specific Shipment
     *
     * @param string $shipmentId
     * @return mixed
     */
    public function getSpecific(string $shipmentId)
    {
        $endpoint = 'shipments/' . $shipmentId;

        return $this->getRequest($endpoint);
    }
}
