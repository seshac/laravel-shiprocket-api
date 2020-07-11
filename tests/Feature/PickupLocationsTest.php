<?php
namespace Seshac\Shiprocket\Tests\Feature;

use Seshac\Shiprocket\Shiprocket;
use Seshac\Shiprocket\Tests\TestCase;
use Seshac\Shiprocket\Tests\Traits\Authenticate;
use Seshac\Shiprocket\Tests\Traits\SampleData;

class PickupLocationsTest extends TestCase
{
    use SampleData, Authenticate;

    /** @test */
    public function can_able_to_get_the_pickup_locations()
    {
        
        $token = $this->getToken();

        // $this->addPickupLocation($token);

        $locations = Shiprocket::pickup($token)->getLocations();

        $this->assertArrayHasKey('shipping_address', $locations->get('data'));

        $this->assertArrayHasKey('pickup_location', $locations->pull('data.shipping_address.0'));
    }
  
    private function addPickupLocation(string $token)
    {
        $location = $this->sampleLocation();

        Shiprocket::pickup($token)->addLocation($location);
    }
}
