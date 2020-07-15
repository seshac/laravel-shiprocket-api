# ( Work In Progress )

# Integration of Shiprocket API in your laravel application is made easy.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/seshac/laravel-shiprocket-api.svg?style=flat-square)](https://packagist.org/packages/sesha/laravel-shiprocket-api)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/seshac/laravel-shiprocket-api/run-tests?label=tests)](https://github.com/sesha/laravel-shiprocket-api/actions?query=workflow%3Arun-tests+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/sesha/laravel-shiprocket-api.svg?style=flat-square)](https://packagist.org/packages/seshac/laravel-shiprocket-api)


## Index
1. [Installation](https://github.com/seshac/laravel-shiprocket-api#installation)
2. [Usage](https://github.com/seshac/laravel-shiprocket-api#installation)
    1. [Authentication](https://github.com/seshac/laravel-shiprocket-api#Authentication)
    2. [Orders](https://github.com/seshac/laravel-shiprocket-api#Orders)
    3. [Couriers](https://github.com/seshac/laravel-shiprocket-api#Couriers)
    4. [Shipments](https://github.com/seshac/laravel-shiprocket-api#Shipments)
    5. [Pickup](https://github.com/seshac/laravel-shiprocket-api#Pickup)
    6. [Tracking](https://github.com/seshac/laravel-shiprocket-api#Tracking)
    7. [Channels](https://github.com/seshac/laravel-shiprocket-api#Channels)
    7. [Manifest/Generate-Labels/Print-Invoice](https://github.com/seshac/laravel-shiprocket-api#Generate)  
3. [Contributors](https://github.com/seshac/laravel-shiprocket-api#contributors)


## Installation

You can install the package via composer:

```bash
composer require seshac/laravel-shiprocket-api
```

You can publish config file with:

```bash
php artisan vendor:publish --provider="Seshac\Shiprocket\ShiprocketServiceProvider" --tag="config"
```

## Authentication
    https://apidocs.shiprocket.in/?version=latest#8a56b4d6-b418-43cf-be25-ead62532aa18

##### Get the login details
```php
   $loginDetails =  Shiprocket::login([
       'email' => 'yourAPiMail@example.com',  //  if you added credentials at shiprocket.php config  file no need to pass
       'password' => 'example'
    ])
```
 Or 
 ##### Get the Token directly
```php
    $token =  Shiprocket::token([
    'email' => 'yourAPiMail@example.com',  
    'password' => 'example'
])
or 
    $token =  Shiprocket::token();//  if you added credentials at shiprocket.php config
``` 
## Orders 
#### Create Custom Order
```php
    $orderDetails = [
        // refer this url for required parameters https://apidocs.shiprocket.in/?version=latest#247e58f3-37f3-4dfb-a4bb-b8f6ab6d41ec
    ];
    $token =  Shiprocket::token();
    $response =  Shiprocket::order($token)->create($orderDetails);
```

#### Create Channel Specific Order
```php
    $orderDetails = [
        // refer this url for required parameters https://apidocs.shiprocket.in/?version=latest#45126d19-74ed-4cf5-9447-8ac1041bbb3c
    ];
    
    $channelSpecificOrder = true;

    $response =  Shiprocket::order($token)->create($orderDetails,$channelSpecificOrder);

```

#### Create quick order ( Wrapper API )
This is an all in one API to create an order, ship the order, add a new pickup location and generate label along with the manifest for the same.
 Create, Ship and Generate Label and Manifest for Order

 ```php
    $orderDetails = [
        // refer this url for required parameters https://apidocs.shiprocket.in/?version=latest#7bd788f4-63ba-49c3-889e-960a379d090f
    ];
    $response =  Shiprocket::order($token)->quickCreate($orderDetails);
 ```

 #### Cancel an order
    https://apidocs.shiprocket.in/?version=latest#5c0e41ca-d868-44c4-8ddb-73a8de239401
```php
    $ids = [12345,12346]; 
    $response =  Shiprocket::order($token)->cancel($ids);
```

### updatePickupLocation
   https://apidocs.shiprocket.in/?version=latest#4ba045ab-e25b-4bb1-adbd-37bbd07b354e
 ```php   
    $orderDetails = [
        'order_id' => [12345,123456 ]
        'pickup_location' => 'location name'
    ];
    $response =  Shiprocket::order($token)->updatePickupLocation($orderDetails);
```

## Couriers
    Use these API's to assign AWB to your order, check for courier serviceability, and request for the pickup of your order.
    https://apidocs.shiprocket.in/?version=latest#a091dfc1-f882-466a-96a1-e245d3c80c5b
#### Generate AWB for Shipment
```php
    $data = [
        'shipment_id' => '',
        'courier_id' => ''
    ];
    $response =  Shiprocket::courier($token)->generateAWB($data);
    // for more details https://apidocs.shiprocket.in/?version=latest#b267ca9a-f7aa-4edc-8477-7dc15e46e08a
```
#### Check Courier Serviceability

```php
    $pincodeDetails = [
        // for paramets refer here, https://apidocs.shiprocket.in/?version=latest#29ff5116-0917-41ba-8c82-638412604916
    ];
    $response =  Shiprocket::courier($token)->checkServiceability($data);
```

## Tracking 
Use these API's to get the tracking details of your shipments through the AWB code or the Shipment ID.
https://apidocs.shiprocket.in/?version=latest#62304450-5d27-4a28-929f-6c68d08040aa

####  Get Tracking through AWB
 https://apidocs.shiprocket.in/?version=latest#f2ac0962-4c34-4fe4-8266-50f8a1e8eab0
```php
    $awb = 1234444222; 
    $response =  Shiprocket::track($token)->throughAwb($awb);
 ```

 #### Get Tracking Data for Multiple AWBS
https://apidocs.shiprocket.in/?version=latest#cf273e6a-08d0-4624-bf7a-7510c28292e0
 ``` php
  $awbs = ["788830567028","788829354408"];
  $response =  Shiprocket::track($token)->throwMultipleAwb($awb);
```

#### Get Tracking through Shipment ID
https://apidocs.shiprocket.in/?version=latest#89005f4f-2b2f-473d-95b0-f54665a16b42
```php
    $shipmentId = 123213;
     $response =  Shiprocket::track($token)->throwShipmentId($shipmentId);
```

#### Get Tracking Data through Order iD
https://apidocs.shiprocket.in/?version=latest#bfcf3357-4e39-4134-831a-1ff33f67205e

```php
    $orderId = 123213;
    $channelID = 121; //optional
    $response =  Shiprocket::track($token)->throwOrderId($orderId,$channelID);
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [Sesha](https://github.com/seshac)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
