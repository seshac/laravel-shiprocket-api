<?php
namespace Seshac\Shiprocket\Tests\Feature;

use Seshac\Shiprocket\Shiprocket;
use Seshac\Shiprocket\Tests\TestCase;
use Seshac\Shiprocket\Tests\Traits\Authenticate;
use Seshac\Shiprocket\Tests\Traits\SampleData;

class OrdersTest extends TestCase
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
    public function can_able_to_create_an_order()
    {
        $sampleOrder = $this->sampleOrder($this->locations->data->shipping_address[0]->pickup_location);
        $order = Shiprocket::order($this->token)->create($sampleOrder);
        $this->assertArrayHasKey('shipment_id', (array) $order);
        $this->assertEquals($order->status, 'NEW');
    }

    /** @test */
    public function can_able_to_create_the_quick_order()
    {
        $sampleQuickOrder = $this->sampleQuickOrder($this->locations->data->shipping_address[0]->pickup_location);
        $order = Shiprocket::quickOrder($this->token)->create($sampleQuickOrder);
        dd(order);
    }

    public function can_able_to_cancel_an_order()
    {
        // $sampleOrder = $this->sampleOrder($this->locations->data->shipping_address[0]->pickup_location);
        // $order = Shiprocket::order($this->token)->create($sampleOrder);
        $cancelOrder = Shiprocket::order($this->token)->cancel([ 'ids' => [34306] ]);
    }
     
    /** @test */
    public function can_able_to_change_the_pickup_location()
    {
    }
}
