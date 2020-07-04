<?php 
namespace Seshac\Shiprocket\Resources;

use Seshac\Shiprocket\Clients\Client;

class OrderResource  {


  public function __construct(Client $client)
  {
    $this->client = $client;
  }
  
  public function create(array $data) {
    
  }
  
}