<?php

namespace Seshac\Shiprocket\Tests;

use Seshac\Shiprocket\Tests\Traits\Authenticate;
use Seshac\Shiprocket\Tests\Traits\SampleData;

class AuthenticateTest extends TestCase
{
    use SampleData, Authenticate;
    
    /** @test */
    public function can_able_to_get_a_token_with_default_credentials()
    {
        $token = $this->getToken();
        $this->assertNotNull($token);
    }

    public function can_able_to_get_a_token_without_default_credentials()
    {
        $token = $this->getToken(['email' => 'seshadriece009@gmail.com', 'password' => '@5KYH7QgBLKeLN8']);
        $this->assertNotNull($token);

    }
}
