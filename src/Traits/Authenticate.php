<?php
namespace Seshac\Shiprocket\Traits;

use Seshac\Shiprocket\Clients\Client;

trait Authenticate
{
    public function auth(Client $client, $credentials = null)
    {
        if (! $credentials) {
            $credentials = config('shiprocket.credentials');
        }

        $endpoint = 'external/auth/login';

        $authDetails =  $client->setEndpoint($endpoint)
            ->setHeaders('login')
            ->post($credentials);

        return $authDetails;
    }
}
