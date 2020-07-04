<?php

namespace Seshac\Shiprocket\Tests;


use Seshac\Shiprocket\Shiprocket;
use Seshac\Shiprocket\Tests\Traits\SampleData;

class ShiprocketTest extends TestCase
{
    use SampleData;
    /** @test */
    public function can_able_to_get_token()
    {
        $token = Shiprocket::getToken(['email' => 'seshadriece009@gmail.com', 'password' => '@5KYH7QgBLKeLN8']);
        $this->assertNotNull($token);
        $this->addPickupLocation($token);
    } 

    public function addPickupLocation($token) {
        $location =  $this->sampleLocation();
        $details = Shiprocket::pickup($token)->addLocation($location);
        dd( $details);
    }


}
