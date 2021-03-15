<?php

namespace Seshac\Shiprocket\Tests\Feature;

use Seshac\Shiprocket\Shiprocket;
use Seshac\Shiprocket\Tests\TestCase;
use Seshac\Shiprocket\Tests\Traits\Authenticate;
use Seshac\Shiprocket\Tests\Traits\SampleData;

class NdrShipmentsTest extends TestCase
{
    use SampleData, Authenticate;

    protected $token;

    protected $locations;

    public function setUp(): void
    {
        parent::setUp();
        $this->token = $this->getToken();
        $this->locations = Shiprocket::pickup($this->token)->getLocations();
    }

    /** @test */
    public function can_able_to_get_all_ndr_shipments()
    {
        $response = Shiprocket::ndr($this->token)->getShipments();
        $this->assertNotEmpty($response->all());
    }

    /** @test */
    public function can_able_to_get_specific_ndr_shipment()
    {
        $response = Shiprocket::ndr($this->token)->getShipments();
        $awb_code = $response->first()[0]['awb_code'];

        $response = Shiprocket::ndr($this->token)->getSpecificShipment($awb_code);
        $this->assertNotEmpty($response->get('data'));
    }
}
