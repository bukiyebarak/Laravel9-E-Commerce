<?php

namespace App\Helpers;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Iyzipay\Model\Buyer;

class IyzicoBuyerHelper
{
    public static function getBuyer( Order $order, $date): Buyer
    {
        $buyer = new Buyer();
        $user = Auth::user();
        $buyer->setId($user->id);
        $buyer->setName($order['name']);
        $buyer->setSurname($order['surname']);
        $buyer->setGsmNumber($order['phone']);
        $buyer->setEmail($order['email']);
        $buyer->setIdentityNumber(rand());
        $buyer->setLastLoginDate((string)$date->created_at);
        $buyer->setRegistrationDate((string)$user->created_at);
        $buyer->setRegistrationAddress($order['address']);
        $buyer->setIp(\request()->ip());
        $buyer->setCity((string)$order['city']);
        $buyer->setCountry("Türkiye");
        $buyer->setZipCode($order['zipcode']);

        return $buyer;
    }
}
