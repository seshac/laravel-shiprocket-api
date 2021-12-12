<?php

namespace Seshac\Shiprocket\Tests\Feature;

use Seshac\Shiprocket\Shiprocket;
use Seshac\Shiprocket\Tests\TestCase;
use Seshac\Shiprocket\Tests\Traits\Authenticate;
use Seshac\Shiprocket\Tests\Traits\SampleData;

class WarehouseTest extends TestCase
{
    use SampleData;
    use Authenticate;

    protected $token;

    protected $locations;

    public function setUp(): void
    {
        parent::setUp();
        $this->token = $this->getToken();
    }

    /** @test */
    public function can_able_check_a_serviceable_pincode_by_warehouse()
    {
        $data = $this->sampleWarehouseCourierServiceable();

        $response = Shiprocket::warehouse($this->token)->checkServiceability($data);

        $this->assertNotNull($response->pluck('data.serviceability'));
    }
}
