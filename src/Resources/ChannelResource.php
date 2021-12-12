<?php

namespace Seshac\Shiprocket\Resources;

class ChannelResource extends Resource
{
    /**
     * To get details about all the integrated channels
     *
     * @return mixed
     */
    public function get()
    {
        $endpoint = 'channels';

        return  $this->getRequest($endpoint);
    }
}
