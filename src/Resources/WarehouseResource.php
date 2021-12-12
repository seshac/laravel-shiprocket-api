<?php

namespace Seshac\Shiprocket\Resources;

class WarehouseResource extends Resource
{
    /**
     * Check the serviability for local pincode by warehouse
     *
     * @param array $data
     * @return mixed
     */
    public function checkServiceability(array $data)
    {
        $endpoint = 'warehouse/srf-serviceability/?' . http_build_query($data);

        return $this->getRequest($endpoint);
    }
}
