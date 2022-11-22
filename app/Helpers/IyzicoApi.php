<?php


namespace App\Helpers;

class IyzicoApi
{
    public static function options() {
        $options = new \Iyzipay\Options();
        $options->setApiKey("sandbox-GobrO1E1DPMPyXz3BPy2zPjZyChj5eSo");
        $options->setSecretKey("sandbox-hYah8X9e0vKPu4MPu5ewuYPsZawHpfls");
        $options->setBaseUrl("https://sandbox-api.iyzipay.com");
        return $options;
    }
}
