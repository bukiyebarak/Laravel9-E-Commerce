<?php

namespace App\Helpers;

use App\Models\Shopcart;
use Illuminate\Support\Facades\Auth;
use Iyzipay\Model\BasketItem;
use Iyzipay\Model\BasketItemType;

class IyzicoBasketItemsHelper
{
    public static function getBasketItems(): array
    {
        $basketItems = array();
        $cart = Shopcart::with('product')->where('user_id', Auth::id())->get();
        foreach ($cart as $detail) {

            $item = new BasketItem();
            $item->setId($detail->product->id);
            $item->setName($detail->product->title);
            $item->setCategory1($detail->product->category->title);
            // $item->setCategory2("Usb / Cable");
            $item->setItemType(BasketItemType::PHYSICAL);
            $item->setPrice(number_format($detail->product->price, '2', '.', ''));

            for ($i = 0; $i < $detail->quantity; $i++) {
                array_push($basketItems, $item);
            }
        }
        //dd($basketItems);
        return $basketItems;
    }
}
