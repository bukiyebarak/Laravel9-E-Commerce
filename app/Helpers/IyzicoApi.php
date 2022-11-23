<?php


namespace App\Helpers;

class IyzicoApi
{
    public static function options() {
        $options = new \Iyzipay\Options();
        $options->setApiKey("sandbox-GobrO1E1DPMPyXz3BPy2zPjZyChj5eSo");
        $options->setSecretKey("rf67AxAfvg5y5SZ1kaMRHFMVmb4nWCIt");
        $options->setBaseUrl("https://sandbox-api.iyzipay.com");
        return $options;
    }
}
