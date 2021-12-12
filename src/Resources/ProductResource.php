<?php

namespace Seshac\Shiprocket\Resources;

class ProductResource extends Resource
{
    /**
     *  Get the all shipment details
     *
     * @param array $extraParam
     * @return mixed
     */
    public function get(array $extraParam = null)
    {
        $endpoint = 'products';

        if ($extraParam) {
            $endpoint = $endpoint . '?' .  http_build_query($extraParam);
        }

        return $this->getRequest($endpoint);
    }

    /**
     * Get the details of a specific Product
     *
     * @param string $productId
     * @return mixed
     */
    public function getSpecific(string $productId)
    {
        $endpoint = 'products/show/' . $productId;

        return $this->getRequest($endpoint);
    }

    /**
     * Add New Products
     *
     * @param array $productDetails
     * @return mixed
     */
    public function create(array $productDetails)
    {
        $endpoint = "products";

        return $this->postRequest($endpoint, $productDetails);
    }
}
