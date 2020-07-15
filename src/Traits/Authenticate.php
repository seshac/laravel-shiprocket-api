<?php
namespace Seshac\Shiprocket\Traits;

use Seshac\Shiprocket\Clients\Client;
use Seshac\Shiprocket\Exceptions\ShiprocketException;

trait Authenticate
{
    public function auth(Client $client, $credentials = null)
    {
        if (! $credentials) {
            $credentials = config('shiprocket.credentials');
        }

        if (is_null($credentials) || ! is_array($credentials)) {
            throw new ShiprocketException('Invalid Credentials');
        }

        $endpoint = 'external/auth/login';

        $authDetails = $client->setEndpoint($endpoint)
            ->setHeaders('login')
            ->post($credentials);

        return $authDetails;
    }
}
