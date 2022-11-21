<?php

namespace App\Helpers;

use Iyzipay\Model\Currency;
use Iyzipay\Model\Locale;
use Iyzipay\Model\PaymentChannel;
use Iyzipay\Model\PaymentGroup;
use Iyzipay\Request\CreatePaymentRequest;

class IyzicoRequestHelper
{

    public static function createRequest(float $total): CreatePaymentRequest
    {
        $request = new CreatePaymentRequest();
        $request->setLocale(Locale::TR);
        $request->setConversationId(rand());
        $request->setPrice(number_format($total,'2','.',''));
        $request->setPaidPrice(number_format($total+30,'2','.',''));//kargo indirim dahil fiyatı
        $request->setCurrency(Currency::TL);
        $request->setInstallment(1);
        $request->setBasketId("B67832");
        $request->setPaymentChannel(PaymentChannel::WEB);
        $request->setPaymentGroup(PaymentGroup::PRODUCT);

        return $request;
    }
}
