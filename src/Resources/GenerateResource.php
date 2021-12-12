<?php

namespace Seshac\Shiprocket\Resources;

class GenerateResource extends Resource
{
    /**
     *  Generate the manifest of orders using shipment Id's
     *
     * @param array $shipmentIds
     * @return mixed
     */
    public function manifest(array $shipmentIds)
    {
        $endpoint = 'manifests/generate';

        return $this->postRequest($endpoint, $shipmentIds);
    }

    /**
     * Print the Manifest (Mnaifest needs to be generated first in order for this API to print it. Use the 'Generate Manifest' API to do the same)
     *
     * @param array $orderIds
     * @return mixed
     */
    public function printManifest(array $orderIds)
    {
        $endpoint = 'manifests/print';

        return $this->postRequest($endpoint, $orderIds);
    }

    /**
     * Generate the label of an order by passing the shipment id in the form of an array
     *
     * @param array $shipmentIds
     * @return mixed
     */
    public function label(array $shipmentIds)
    {
        $endpoint = 'courier/generate/label';

        return $this->postRequest($endpoint, $shipmentIds);
    }

    /**
     * Generate the invoice for you're order.
     *
     * @param array $orderIds
     * @return mixed
     */
    public function invoice(array $orderIds)
    {
        $endpoint = 'orders/print/invoice';

        return $this->postRequest($endpoint, $orderIds);
    }
}
