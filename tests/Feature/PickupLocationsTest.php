<?php 
namespace Seshac\Shiprocket\Tests\Feature;

use Seshac\Shiprocket\Shiprocket;
use Seshac\Shiprocket\Tests\TestCase;
use Seshac\Shiprocket\Tests\Traits\SampleData;
use Seshac\Shiprocket\Tests\Traits\Authenticate;


class PickupLocationsTest  extends TestCase
{
    use SampleData;
    use Authenticate;

      /** @test */
      public function can_able_to_get_the_pickup_locations() 
      {
          $token = $this->getToken();
          $locations = Shiprocket::pickup($token)->getLocations();
          $this->assertArrayHasKey('shipping_address', $locations->data);
          $this->assertArrayHasKey('pickup_location', (array) $locations->data->shipping_address[0]);
      }
  
      private function addPickupLocation($token) {
          $location =  $this->sampleLocation();
          $details = Shiprocket::pickup($token)->addLocation($location);
      }
}