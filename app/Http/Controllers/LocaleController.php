<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class LocaleController extends Controller
{

    public function switchLang($lang): \Illuminate\Http\RedirectResponse
    {
        if (array_key_exists($lang, Config::get('languages'))) {
            Session::put('applocale', $lang);
        }
        return redirect()->route('home');
    }
    public function switchLangAdmin($lang): \Illuminate\Http\RedirectResponse
    {
        if (array_key_exists($lang, Config::get('languages'))) {
            Session::put('applocale', $lang);
        }
        return redirect()->route('adminhome');
    }
}
