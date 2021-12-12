<?php

namespace Seshac\Shiprocket\Resources;

class NdrResource extends Resource
{
    /**
     * Get the all shipments that are in NDR
     *
     * @return mixed
     */
    public function getShipments()
    {
        $endpoint = 'ndr/all';

        return $this->getRequest($endpoint);
    }

    /**
     * Get the information about specific AWB which is in NDR
     *
     * @param string $awb
     * @return mixed
     */
    public function getSpecificShipment(string $awb)
    {
        $endpoint = "ndr/$awb";

        return $this->getRequest($endpoint);
    }

    /**
     * For open NDR where you can take action such as Reattempt, RTO.
     * @example https://apiv2.shiprocket.in/v1/external/ndr/reattempt?awb=190729394&address1=Dr Nageshwar&address2=opposite Ashok Nagar&phone=9534952626&deferred_date=2020-08-27
     *
     * @param array $shipmentDetails
     * @return mixed
     */
    public function reattempt(array $shipmentDetails)
    {
        $endpoint = 'ndr/reattempt';

        return $this->postRequest($endpoint, $shipmentDetails);
    }
}
