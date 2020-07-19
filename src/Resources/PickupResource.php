<?php
namespace Seshac\Shiprocket\Resources;

use Seshac\Shiprocket\Resources\Resource;

class PickupResource extends Resource
{
    /**
     * Add a New Pickup Location
     *
     * @param array $location
     * @return mixed
     */
    public function addLocation(array $location)
    {
        $endpoint = 'settings/company/addpickup';

        return $this->postRequest($endpoint, $location);
    }

    /**
     * Get All Pickup Locations
     *
     * @return mixed
     */
    public function getLocations()
    {
        $endpoint = 'settings/company/pickup';

        return $this->getRequest($endpoint);
    }
}
