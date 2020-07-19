<?php

namespace Seshac\Shiprocket\Tests\Feature;

use Seshac\Shiprocket\Shiprocket;
use Seshac\Shiprocket\Tests\TestCase;
use Seshac\Shiprocket\Tests\Traits\Authenticate;
use Seshac\Shiprocket\Tests\Traits\SampleData;

class ChannelTest extends TestCase
{
    use SampleData, Authenticate;

    /** @test */
    public function it_can_able_to_get_the_integrated_channels()
    {
        $token = $this->getToken();

        $channels = Shiprocket::channel($token)->get();

        $this->assertGreaterThanOrEqual(1, count($channels->get('data')));
    }
}
