<?php

namespace Seshac\Shiprocket\Resources;

class CourierResource extends Resource
{
    /**
     * Generate AWB for specific order
     *
     * @param array $data
     * @return mixed
     */
    public function generateAWB(array $data)
    {
        $endpoint = 'courier/assign/awb';

        return $this->postRequest($endpoint, $data);
    }

    /**
     * Check the Serviceability for local pincode
     *
     * @param array $data
     * @return mixed
     */
    public function checkServiceability(array $data)
    {
        $endpoint = 'courier/serviceability/?' . http_build_query($data);

        return $this->getRequest($endpoint);
    }

    /**
     * Check International Courier Serviceability
     *
     * @param array $params
     * @return mixed
     */
    public function checkInterNationalServiceability(array $params)
    {
        $endpoint = 'courier/international/serviceability/?' . http_build_query($params);

        return $this->getRequest($endpoint);
    }

    /**
     * Request for Shipments Pickup
     *
     * @param array $data
     * @return mixed
     */
    public function requestPickup(array $pickupDetails)
    {
        $endpoint = 'courier/generate/pickup';

        return $this->postRequest($endpoint, $pickupDetails);
    }
}
