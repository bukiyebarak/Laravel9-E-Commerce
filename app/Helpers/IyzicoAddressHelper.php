<?php

namespace App\Helpers;

use App\Models\Order;
use Iyzipay\Model\Address;

class IyzicoAddressHelper
{
    public static function getAddress(Order $order): Address
    {
        $shippingAddress = new Address();
        $shippingAddress->setContactName($order->name . ' ' . $order->surname);
        $shippingAddress->setCity($order->city);
        $shippingAddress->setCountry("Türkiye");
        $shippingAddress->setAddress($order->address);
        $shippingAddress->setZipCode($order->zipcode);

       return $shippingAddress;
    }
}
