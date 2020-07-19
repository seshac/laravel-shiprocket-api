<?php
namespace Seshac\Shiprocket\Tests\Feature;

use Seshac\Shiprocket\Shiprocket;
use Seshac\Shiprocket\Tests\TestCase;
use Seshac\Shiprocket\Tests\Traits\Authenticate;
use Seshac\Shiprocket\Tests\Traits\SampleData;

class OrdersTest extends TestCase
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
    public function it_can_able_to_create_an_order()
    {
        $sampleOrder = $this->sampleOrder($this->locations->pull('data.shipping_address.0.pickup_location'));
       
        $order = Shiprocket::order($this->token)->create($sampleOrder);

        $this->assertArrayHasKey('shipment_id', $order);

        $this->assertEquals($order->get('status'), 'NEW');
    }

    /** @test */
    public function it_could_able_to_create_the_quick_order()
    {
        $sampleQuickOrder = $this->sampleQuickOrder($this->locations->pull('data.shipping_address.0.pickup_location'));
       
        $order = Shiprocket::order($this->token)->quickCreate($sampleQuickOrder);
        
        // This needs to complete KYC verification

        $this->assertNotEmpty($order);
    }

    /** @test */
    public function it_can_able_to_cancel_an_order()
    {
        $sampleOrder = $this->sampleOrder($this->locations->pull('data.shipping_address.0.pickup_location'));
        
        $order = Shiprocket::order($this->token)->create($sampleOrder);
       
        $cancelOrder = Shiprocket::order($this->token)->cancel([ 'ids' => [$order->get('order_id')] ]);
       
        $this->assertEquals('Order cancelled successfully.', $cancelOrder->get('message'));
    }
     
    /** Todo */
    public function it_can_able_to_change_the_pickup_location()
    {
    }
}
