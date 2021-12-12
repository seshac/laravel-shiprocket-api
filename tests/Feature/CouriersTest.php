<?php

namespace Seshac\Shiprocket\Tests\Feature;

use Seshac\Shiprocket\Shiprocket;
use Seshac\Shiprocket\Tests\TestCase;
use Seshac\Shiprocket\Tests\Traits\Authenticate;
use Seshac\Shiprocket\Tests\Traits\SampleData;

class CouriersTest extends TestCase
{
    use SampleData;
    use Authenticate;

    protected $token;

    protected $locations;

    public function setUp(): void
    {
        parent::setUp();
        $this->token = $this->getToken();
        $this->locations = Shiprocket::pickup($this->token)->getLocations();
    }

    /** @test */
    public function can_able_check_a_serviceable_pincode()
    {
        $data = $this->sampleCourierServiceable();

        $response = Shiprocket::courier($this->token)->checkServiceability($data);

        $this->assertEquals(200, $response->get('status'));

        $this->assertGreaterThanOrEqual(1, count($response->pluck('data.available_courier_companies')));
    }

    /** @test */
    public function can_able_to_generate_a_awb_number()
    {
        $sampleOrder = $this->sampleOrder($this->locations->pull('data.shipping_address.0.pickup_location'));

        $order = Shiprocket::order($this->token)->create($sampleOrder);

        $response = Shiprocket::courier($this->token)->generateAWB(['shipment_id' => $order->get('shipment_id')]);

        // This needs to complete KYC verification
        $this->assertNotEmpty($response);
    }
}
