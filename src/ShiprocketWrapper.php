<?php
namespace Seshac\Shiprocket;

class ShiprocketWrapper implements Wrapper
{
    protected $endpoint;

    public $token;

    public function __construct()
    {
        $config = (object) config('shiprocket');

        $this->endpoint = $config->url . $config->version .'/';
    }

    public function setToken(array $credentials)
    {
        $url = $this->endpoint . 'external/auth/login';
        // $authDetails = $this->post($url, $credentials);
        // $this->token = $authDetails->token;
    }

    public function post(string $url, array $data)
    {
        $headers = [ "Content-Type: application/json" ];
        if ($this->token) {
            array_merge($headers, ["Authorization: Bearer {$this->token}"]);
        }
        
        $curl = curl_init();
      
        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => $headers,
        ]);
        $response = curl_exec($curl);
        
        curl_close($curl);

        return json_decode($response);
    }
}
