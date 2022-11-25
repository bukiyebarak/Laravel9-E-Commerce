<?php

namespace App\Helpers;

use Iyzipay\Model\Currency;
use Iyzipay\Model\Locale;
use Iyzipay\Model\PaymentChannel;
use Iyzipay\Model\PaymentGroup;
use Iyzipay\Request\CreatePaymentRequest;

class IyzicoRequestHelper
{


    public static function createRequest(float $total): \Iyzipay\Request\CreateCheckoutFormInitializeRequest
    {
        $requestIyzico = new \Iyzipay\Request\CreateCheckoutFormInitializeRequest();
        $requestIyzico->setLocale(\Iyzipay\Model\Locale::TR);
        $requestIyzico->setConversationId(rand());
        $requestIyzico->setPrice(number_format($total, '2', '.', ''));
        $requestIyzico->setPaidPrice(number_format($total + 30, '2', '.', ''));//kargo indirim dahil fiyatı
        $requestIyzico->setCurrency(Currency::TL);
        $requestIyzico->setBasketId("B67832");
        $requestIyzico->setPaymentGroup(PaymentGroup::PRODUCT);
        $requestIyzico->setCallbackUrl(route('iyzico_callback'));
        //session.cookie_samesite=”None”;

        $requestIyzico->setEnabledInstallments(array(2, 3, 6, 9));


        return $requestIyzico;
    }
}
