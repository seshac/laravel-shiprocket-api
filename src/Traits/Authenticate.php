<?php
namespace Seshac\Shiprocket\Traits;

use Seshac\Shiprocket\Clients\Client;

trait Authenticate
{
    public function login(Client $client, array $credentials)
    {
        $endpoint = 'external/auth/login';
        $authDetails = $client->setEndpoint($endpoint)
                        ->setHeaders('login')
                        ->post($credentials);

        return $authDetails->token;
    }
}
