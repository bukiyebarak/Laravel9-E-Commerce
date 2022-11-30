<?php

namespace App\Http\Controllers;

use App\Mail\MessageContactMailable;
use App\Models\Faq;
use App\Models\Review;
use App\Models\Category;
use App\Models\Image;
use App\Models\Message;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Shopcart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\ContactRequest;

class HomeController extends Controller
{
    public static function categorylist()
    {
        return Category::where('parent_id', "=", 0)->with('children')->get();
    }

    public static function headerShopCart()
    {
        return Shopcart::with('product')->where('user_id', Auth::id())->get();
    }

    public static function countreview($id)
    {
        return Review::where('product_id', $id)->count();
    }

    public static function avrgreview($id)
    {
        return Review::where('product_id', $id)->average('rate');
    }

    public static function getsetting()
    {
        return Setting::first();
    }


    public function index()
    {
        $setting = Setting::first();
        $slider = Product::select('id', 'title', 'image', 'price', 'slug')->limit(4)->get();
        $daily = Product::select('id', 'title', 'image', 'price', 'slug','is_sale','sale','sale_price')->limit(6)->inRandomOrder()->get();
        $last = Product::select('id', 'title', 'image', 'price', 'slug', 'is_sale','sale','sale_price')->limit(6)->orderByDesc('id')->get();
        $picked = Product::select('id', 'title', 'image', 'price', 'slug','is_sale','sale','sale_price')->limit(6)->inRandomOrder()->get();

        //dd($picked);
//        exit();
        $data = [
            'setting' => $setting,
            'slider' => $slider,
            'daily' => $daily,
            'last' => $last,
            'picked' => $picked,
        ];
        return view('home.index', $data);
    }


    public function header()
    {
        $datalist = Shopcart::with('product')->where('user_id', Auth::id())->get();
        return view('home._header', ['datalist' => $datalist]);
    }

    public function login()
    {
        return view('admin.login');
    }

    public function logincheck(Request $request)
    {
        if ($request->isMethod('post')) {
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) //Veritabanından kullanıcı adını sorguluyor
            {
                $request->session()->regenerate();
                return redirect()->intended('/');
            }

            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        } else {
            return view('admin.login');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function aboutus()
    {
        $setting = Setting::first();

        return view('home.about', ['setting' => $setting]);
    }

    public function contact()
    {
        $setting = Setting::first();
        return view('home.contact', ['setting' => $setting]);
    }

    public function faq()
    {
        $datalist = Faq::all()->sortBy('position');

        return view('home.faq', ['datalist' => $datalist]);
    }

    public function references()
    {
        $setting = Setting::first();
        return view('home.references', ['setting' => $setting]);
    }

    public function sendmessage(ContactRequest $request)
    {
        $input = $request->all();
        $message = Message::create($input);

        $this->sendContactMessageMailAdmin($message);

        return redirect()->route('contact')->with('success', 'Mesajınız Kaydedilmiştir. Teşekkür Ederiz.');

    }

    public function sendContactMessageMailAdmin($contact)
    {
        Mail::to('yonetici@admin.com')->send(new MessageContactMailable($contact));
    }


    #region Search
    public function getproduct(Request $request)
    {
        $search = $request->input('search');
        $count = Product::where('title', 'like', '%' . $search . '%')->get()->count();
        if ($count == 1) {
            $data = Product::where('title', 'like', '%' . $search . '%')->first();
            return redirect()->route('product', ['id' => $data->id, 'slug' => $data->slug]);
        } else {
            return redirect()->route('productlist', ['search' => $search]);
        }
    }

    public function productlist($search)
    {
        $datalist = Product::where('title', 'like', '%' . $search . '%')->get();
        return view('home.search_products', ['search' => $search, 'datalist' => $datalist]);
    }

    #endregion

    public function product($id, $slug)
    {
        $data = Product::find($id);
        $datalist = Image::where('product_id', $id)->get();
        $reviews = Review::where('product_id', $id)->get();
        return view('home.product_detail', ['data' => $data, 'datalist' => $datalist, 'reviews' => $reviews]);
    }

    //alt kategori ürün bulma
    public function categoryproducts($id, $slug)
    {
        $datalist = Product::where('category_id', $id)->get();
        $data = Category::find($id);
        //print_r($data);
        //exit();
        return view('home.category_products', ['data' => $data, 'datalist' => $datalist]);
    }


    //Tüm ürümleri listeleme
    public function allproducts()
    {
        $datalist = Product::all();

        return view('home.all_product', ['datalist' => $datalist]);
    }
}
