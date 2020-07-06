<?php
namespace Seshac\Shiprocket\Tests\Traits;

use Illuminate\Foundation\Testing\WithFaker;

trait SampleData
{
    use WithFaker;
    public function sampleOrder($pickupLocation)
    {
        return  [
            'order_id' => $this->faker->numberBetween(100, 100000),
            'order_date' => $this->faker->date('Y-m-d',  'now'),
            'pickup_location' => $pickupLocation,
            'channel_id' => '',
            'comment' => '',
            'reseller_name' => '',
            'company_name' => '',
            'billing_customer_name' => $this->faker->name,
            'billing_last_name' => '',
            'billing_address' => $this->faker->streetName . ',' .$this->faker->streetAddress,
            'billing_address_2' => $this->faker->secondaryAddress,
            'billing_isd_code' => '',
            'billing_city' => $this->faker->city,
            'billing_pincode' => 110002,
            'billing_state' => 'Delhi',
            'billing_country' => 'India',
            'billing_email' => 'naruto@uzumaki.com',
            'billing_phone' => '9856321472',
            'billing_alternate_phone' => 8604690454,
            'shipping_is_billing' => true,
            'shipping_customer_name' => 'Vegeta',
            'shipping_last_name' => '',
            'shipping_address' => 'Planet Vegeta',
            'shipping_address_2' => '',
            'shipping_city' => 'Mumbai',
            'shipping_pincode' => 200912,
            'shipping_country' => 'India',
            'shipping_state' => 'Maharashtra',
            'shipping_email' => 'vegeta@saiyyan.com',
            'shipping_phone' => '9887655432',
            'order_items' => [  0 =>
               [
                'name' => 'Kunai',
                'sku' => 'chakra123',
                'units' => 1,
                'selling_price' => 200,
                'discount' => '',
                'tax' => '',
                'hsn' => '',
               ],
            ],
            'payment_method' => 'COD',
            'shipping_charges' => '',
            'giftwrap_charges' => '',
            'transaction_charges' => '',
            'total_discount' => '',
            'sub_total' => 200,
            'length' => 10,
            'breadth' => 10,
            'height' => 10,
            'weight' => 20,
            'ewaybill_no' => '',
            'customer_gstin' => '',
        ];
    }

    public function sampleQuickOrder($pickupLocation) 
    {
        $extraDetails = [
            'print_label'        => false,
            'generate_manifest'  => false,
            'pickup_location' => $pickupLocation,
        ];
        $sampleOrder = $this->sampleOrder($pickupLocation);

        return array_merge($sampleOrder, $extraDetails);
    }

    public function sampleLocation()
    {
        return [
            'pickup_location' => 'home',
            'name' => 'Deadpool',
            'email' => 'deadpool@chimichanga.com',
            'phone' => '9777777779',
            'address' => 'no 89, Mutant Facility, Sector',
            'address_2' => 'House number 34',
            'city' => 'Pune',
            'state' => 'Maharashtra',
            'country' => 'India',
            'pin_code' => '110022',
        ];
    }

    public function sampleCourierServiceable()
    {
        return [
            'pickup_postcode' => 110030,
            'delivery_postcode' => 122002,
            'cod' => 1,
            'weight' => '1',
        ];
    }
}
