<?php
namespace Seshac\Shiprocket\Clients;

interface Client
{

    public function setEndpoint(string $endpoint);

    public function setHeaders(string $token);
    
    public function post(array $data);

}
