<?php

return [


   /*
    |--------------------------------------------------------------------------
    | Shiprocket API URL 
    |--------------------------------------------------------------------------
    |
    | It will be useful, if shiprocket changes the endpoint
    | 
    */

    'url' => 'https://apiv2.shiprocket.in/',



   /*
    |--------------------------------------------------------------------------
    | Shiprocket API  Version 
    |--------------------------------------------------------------------------
    |
    | It will be useful while upgrading to another version.
    | 
    */
    'version' => 'v1',


    /*
    |--------------------------------------------------------------------------
    | Default Shiprocket Credentilas
    |--------------------------------------------------------------------------
    |
    | Here you can set the default shiprocket credentilas. However, you can pass the credentials while connecting to shiprocket client
    | 
    */

    'credentials' => [
        'email' => env('SHIPROCKET_EMAIL', 'seshadriece009@gmail.com'),
        'password' => env('SHIPROCKET_PASSWORD', '@5KYH7QgBLKeLN8'),
    ],
  

   /*
    |--------------------------------------------------------------------------
    | Default output response type
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the output response you need.
    | 
    | Supported: "collection" , "object", "array"
    | 
    */

    'responseType' => 'collection',
    
];
