<?php 
namespace Seshac\Shiprocket\Tests\Traits;

use Seshac\Shiprocket\Shiprocket;


trait Authenticate {

    public function getToken() {
        return Shiprocket::getToken(['email' => 'seshadriece009@gmail.com', 'password' => '@5KYH7QgBLKeLN8']);
    }
}