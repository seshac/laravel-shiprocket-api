<?php
namespace Seshac\Shiprocket\Tests\Traits;

use Seshac\Shiprocket\Shiprocket;

trait Authenticate
{
    public function getToken()
    {
        $authdetails = Shiprocket::login($credentials = null);

        return $authdetails->get('token');
    }
}
