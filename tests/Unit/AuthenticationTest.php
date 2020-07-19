<?php
namespace Seshac\Shiprocket\Tests\Unit;

use Seshac\Shiprocket\Tests\TestCase;
use Seshac\Shiprocket\Tests\Traits\Authenticate;
use Seshac\Shiprocket\Exceptions\ShiprocketException;

class AuthenticationTest extends TestCase
{
  use Authenticate;
    
  /** @test */
  public function it_could_not_be_instantiated_without_api_credentials()
  {

    config([
      'shiprocket.credentials.email' => '', 
      'shiprocket.credentials.password' => ''
    ]);
    
    try {
      $this->getToken();
    } catch (ShiprocketException $exception) {
      $this->assertInstanceOf(ShiprocketException::class, $exception);
      $this->assertEquals($exception->getMessage(), 'Invalid Credentials');
    }
   
  }

}
