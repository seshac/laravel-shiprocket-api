# Shiprocket API (V1) Laravel SDK
## Laravel SDK (module) for [Shiprocket API Version 1](https://apidocs.shiprocket.in/?version=latest#intro). The integration of Shiprocket API in your laravel application is made easy.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/seshac/laravel-shiprocket-api.svg?style=flat-square)](https://packagist.org/packages/sesha/laravel-shiprocket-api)
![Psalm](https://github.com/seshac/laravel-shiprocket-api/workflows/Psalm/badge.svg?branch=master)
[![Total Downloads](https://img.shields.io/packagist/dt/seshac/laravel-shiprocket-api.svg?style=flat-square)](https://packagist.org/packages/seshac/laravel-shiprocket-api)
![Tests](https://github.com/seshac/laravel-shiprocket-api/workflows/Tests/badge.svg?branch=master)

## Index
1. [Installation](https://github.com/seshac/laravel-shiprocket-api#installation)
2. [Usage](https://github.com/seshac/laravel-shiprocket-api#installation)
    1. [Authentication](https://github.com/seshac/laravel-shiprocket-api#Authentication)
    2. [Orders](https://github.com/seshac/laravel-shiprocket-api#Orders)
    3. [Couriers](https://github.com/seshac/laravel-shiprocket-api#Couriers)
    4. [Tracking](https://github.com/seshac/laravel-shiprocket-api#Tracking)
    5. [Shipments](https://github.com/seshac/laravel-shiprocket-api#Shipments)
    6. [Pickup Addresses](https://github.com/seshac/laravel-shiprocket-api#Pickup-Addresses)
    7. [Channels](https://github.com/seshac/laravel-shiprocket-api#Channels)
    8. [Manifest/Generate-Labels/Print-Invoice](https://github.com/seshac/laravel-shiprocket-api#Generate)  
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

## This is the contents of the published config file:
```php
return [
    /*
    |--------------------------------------------------------------------------
    | Default Shiprocket Credentilas
    |--------------------------------------------------------------------------
    |
    | Here you can set the default shiprocket credentilas. However, you can pass the credentials while connecting to shiprocket client
    | 
    */

    'credentials' => [
        'email' => env('SHIPROCKET_EMAIL', 'example@email.com'),
        'password' => env('SHIPROCKET_PASSWORD', 'password'),
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
```


## Authentication
    https://apidocs.shiprocket.in/?version=latest#8a56b4d6-b418-43cf-be25-ead62532aa18

##### Get the login details
```php
$loginDetails =  Shiprocket::login([
    'email' => 'yourAPiMail@example.com', 
    'password' => 'example'
])
// if you added credentials at shiprocket.php config file no need to pass credentials
```
 Or 
 ##### Get the Token directly
```php
$token =  Shiprocket::token();//  if you added credentials at shiprocket.php config
``` 


## Orders 
#### Create Custom Order
https://apidocs.shiprocket.in/?version=latest#247e58f3-37f3-4dfb-a4bb-b8f6ab6d41ec
```php
$orderDetails = [
    // refer above url for required parameters 
];
$token =  Shiprocket::token();
$response =  Shiprocket::order($token)->create($orderDetails);
```

#### Create Channel Specific Order
https://apidocs.shiprocket.in/?version=latest#45126d19-74ed-4cf5-9447-8ac1041bbb3c
```php
$orderDetails = [
    // refer above url for required parameters
];

$channelSpecificOrder = true;

$response =  Shiprocket::order($token)->create($orderDetails,$channelSpecificOrder);
```

#### Create quick order ( Wrapper API )
This is an all in one API to create an order, ship the order, add a new pickup location and generate label along with the manifest for the same.
 Create, Ship and Generate Label and Manifest for Order

https://apidocs.shiprocket.in/?version=latest#7bd788f4-63ba-49c3-889e-960a379d090f
 ```php
$orderDetails = [
    // refer aboce url for required parameters 
];
$response =  Shiprocket::order($token)->quickCreate($orderDetails);
```

 #### Cancel an order
https://apidocs.shiprocket.in/?version=latest#5c0e41ca-d868-44c4-8ddb-73a8de239401
```php
$ids = [12345,12346]; 
$response =  Shiprocket::order($token)->cancel($ids);
```

### Update pickup location
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
 https://apidocs.shiprocket.in/?version=latest#b267ca9a-f7aa-4edc-8477-7dc15e46e08a
```php
$data = [
    'shipment_id' => '',
    'courier_id' => ''
];
$response =  Shiprocket::courier($token)->generateAWB($data);
// for more details visit above url
```
#### Check Courier Serviceability
https://apidocs.shiprocket.in/?version=latest#29ff5116-0917-41ba-8c82-638412604916
```php
$pincodeDetails = [
    // for paramets refer obove url.
];
$response =  Shiprocket::courier($token)->checkServiceability($pincodeDetails);
```

#### Check International Courier Serviceability
https://apidocs.shiprocket.in/?version=latest#6d1f2fb0-43c1-434f-8c93-50674a0b59ef
```php
$pincodeDetails = [
    // for paramets refer obove url.
];
$response =  Shiprocket::courier($token)->checkInterNationalServiceability($pincodeDetails);
```
#### Request for Shipments Pickup
https://apidocs.shiprocket.in/?version=latest#9f42cdfd-a055-4934-a0f4-86764f87c80d
```php
$pickupDetails = [
    // for paramets refer obove url.
];
$response =  Shiprocket::courier($token)->requestPickup($pickupDetails);
```


## Shipments
https://apidocs.shiprocket.in/?version=latest#0f9a75fd-6d23-453c-a3d7-85857e8c8759

#### Get the all shipment details
https://apidocs.shiprocket.in/?version=latest#a9913eaf-94ba-4012-a105-9687fddc7221
```php
 $filterParam = [];  // you can use sort, sort_by, filter,filter_by
 $shipments = Shiprocket::shipment($token)->get();
```
#### Get the details of a specific Shipment
https://apidocs.shiprocket.in/?version=latest#5f9bced5-4f16-4868-be55-a8c0215d0711
```php
$shipemntId = 1232122;
$shipments = Shiprocket::shipment($token)->getSpecific($shipemntId);
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
$shipment =  Shiprocket::track($token)->throwOrderId($orderId,$channelID);
```


## Pickup-Addresses
https://apidocs.shiprocket.in/?version=latest#6949d954-d0ba-4749-99aa-2435ab7aaf4f

#### Add a New Pickup Location
https://apidocs.shiprocket.in/?version=latest#6fbe81f5-c3d5-462e-b18f-d6316dde7779
```php
$newLocation = []; //Refer the above url for required parameteres
$location = Shiprocket::pickup($token)->addLocation($newLocation);
```

#### Get All Pickup Locations
https://apidocs.shiprocket.in/?version=latest#3bd67de6-8f00-435f-a708-c0c3ab252fee
```php
$location = Shiprocket::pickup($token)->getLocations();
```


## Channels
https://apidocs.shiprocket.in/?version=latest#6233e207-6de3-4960-a59c-b34ebe3fe33d

####  To get details about all the integrated channels
https://apidocs.shiprocket.in/?version=latest#b9b9bcbe-923c-4ccd-a46e-d9f089622a80
```php
$channels = Shiprocket::channel($token)->get();
```

## Manifest/Generate-Labels/Print-Invoice
https://apidocs.shiprocket.in/?version=latest#a9f708ec-5861-43b9-a510-8c1bba074cb5

#### Generate the manifest of orders using shipment Id's
https://apidocs.shiprocket.in/?version=latest#dc281151-33e6-485f-a76a-015d8d36b49f
```php
$shipmentIds = [ 'shipment_id' => [121221,122112] ];
$manifestDetails = Shiprocket::generate($token)->manifest(shipmentIds);
```

#### Print the Manifest (Mnaifest needs to be generated first in order for this API to print it. Use the 'Generate Manifest' API to do the same)
https://apidocs.shiprocket.in/?version=latest#dd1e168b-6bb2-45b9-a930-68cae3cbe97c
```php
$orderIds = [ 'order_ids' => [121221,122112] ];
$response = Shiprocket::generate($token)->printManifest(orderIds);
```
#### Generate the label of an order by passing the shipment id in the form of an array
https://apidocs.shiprocket.in/?version=latest#4dfcbd78-4789-4680-82bf-9ff07f56d34e
```php
$shipmentIds = [ 'shipment_id' => [121221,122112] ];
$response = Shiprocket::generate($token)->label(shipmentIds);
```

#### Generate the invoice for you're order.
https://apidocs.shiprocket.in/?version=latest#421f997f-1216-41e0-8c9b-433ddb666ad4
```php
$orderIds = [ 'ids' => [121221,122112] ];
$response = Shiprocket::generate($token)->invoice(orderIds);
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [Sesha](https://github.com/seshac)
- [All Contributors](../../contributors)

## Please feel free to contact me if you find any bug or create an issue for that!.

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
