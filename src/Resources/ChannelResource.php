<?php

namespace Seshac\Shiprocket\Resources;

use Seshac\Shiprocket\Clients\Client;

class ChannelResource
{
    protected $client;

    protected $token;

    public function __construct(Client $client, string $token)
    {
        $this->client = $client;
        $this->token = $token;
    }

    /**
     * To get details about all the integrated channels
     *
     * @return mixed
     */
    public function get()
    {
        $endpoint = 'external/channels';

        return  $this->client->setEndpoint($endpoint)
            ->setHeaders($this->token)
            ->get();
    }
    

    public function first()
    {
        $channels = $this->get();
        dd(collect($channels));
    }
}
