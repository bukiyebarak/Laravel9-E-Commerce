<?php

use Laravel\Fortify\Features;

return [
    'guard' => 'web',
    'middleware' => ['web'],
    'auth_middleware' => 'auth',
    'passwords' => 'users',
    'username' => 'email',
    'email' => 'email',
    'views' => true,
    'home' => 'myaccount',
    'prefix' => '',
    'domain' => null,
    'limiters' => [
        'login' => 'adminlogin',
    ],
    'redirects' => [
        'login' => 'adminlogin',
        'logout' => null,
        'password-confirmation' => null,
        'register' => null,
        'email-verification' => 'myaccount',
        'password-reset' => null,
    ],
    'features' => [
        Features::registration(),
        Features::resetPasswords(),
        Features::emailVerification(),
        Features::updateProfileInformation(),
        Features::updatePasswords(),
        Features::twoFactorAuthentication(),
    ],
];
