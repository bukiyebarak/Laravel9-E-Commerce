<?php

namespace App\Http\Controllers;

use App\Mail\MessageContactMailable;
use App\Models\Faq;
use App\Models\PaketCategory;
use App\Models\PaketProduct;
use App\Models\Review;
use App\Models\Category;
use App\Models\Image;
use App\Models\Message;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Shopcart;
use App\Models\Wishlist;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Route;

class HomeController extends Controller
{
    public static function categorylist()
    {
        return Category::where('parent_id', "=", 0)->with('children')->get();
    }

    public static function paket_category_list()
    {
        return PaketCategory::where('paket_parent_id', "=", 0)->get();
    }

    public static function categorylistall()
    {
        return Category::with('children')->get();
    }


    public static function headerShopCart()
    {
        return Shopcart::with('product')->where('user_id', Auth::id())->get();
    }

    public static function topHeaderWishlist()
    {
        return Wishlist::with('product')->where('user_id', Auth::id())->limit(5)->orderByDesc('id')->get();
    }

    public static function countreview($id)
    {
        return Review::where(['product_id' => $id, 'status' => 'True'])->count();
    }

    public static function avrgreview($id)
    {
        return Review::where(['product_id' => $id, 'status' => 'True'])->average('rate');
    }

    public static function getsetting()
    {
        return Setting::first();
    }

    public static function sidebar()
    {
        return Product::select('id', 'image', 'slug', 'is_sale', 'sale', 'status')->where(['status' => 'True'])->limit(4)->orderByDesc('id')->get();
        // dd($datalist);
    }
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $setting = Setting::first();
        $slider = Product::select('id', 'title', 'image', 'price', 'slug', 'status', 'sale', 'is_sale','category_id')
            ->where('status', '=', 'True')
            ->with('category')
            ->limit(4)
            ->get();
        $daily = Product::where('status', '=', 'True')->limit(6)->inRandomOrder()->get();
        $last = Product::where('status', '=', 'True')->limit(6)->orderByDesc('id')->get();
        $picked = Product::where('status', '=', 'True')->limit(6)->inRandomOrder()->get();

        $data = [
            'setting' => $setting,
            'slider' => $slider,
            'daily' => $daily,
            'last' => $last,
            'picked' => $picked,
        ];
        return view('home.index', $data);
    }


    public function header(): Factory|View|Application
    {
        $datalist = Shopcart::with('product')->where('user_id', Auth::id())->get();
        return view('home._header', ['datalist' => $datalist]);
    }


    public function login(): Factory|View|Application
    {
        return view('admin.login');
    }

    public function logincheck(Request $request): Factory|View|\Illuminate\Http\RedirectResponse|Application
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

    public function logoutt(Request $request): \Illuminate\Routing\Redirector|Application|\Illuminate\Http\RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function aboutus(): Factory|View|Application
    {
        $setting = Setting::first();

        return view('home.about', ['setting' => $setting]);
    }

    public function contact(): Factory|View|Application
    {
        $setting = Setting::first();
        return view('home.contact', ['setting' => $setting]);
    }

    public function faq(): Factory|View|Application
    {
        $datalist = Faq::all()->sortBy('position');

        return view('home.faq', ['datalist' => $datalist]);
    }

    public function references(): Factory|View|Application
    {
        $setting = Setting::first();
        return view('home.references', ['setting' => $setting]);
    }

    public function sendmessage(ContactRequest $request): \Illuminate\Http\RedirectResponse
    {
        $message = Message::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
            'phone' => $request->input('phone'),
            'note' => $request->input('note'),
            'ip_address' => $request->ip(),
            'user_id' => Auth::id(),
        ]);
        $this->sendContactMessageMailAdmin($message);

        $message= __('Mesajınız Kaydedilmiştir. Teşekkür Ederiz.');
        return redirect()->route('contact')->with('success', $message);
    }

    public function sendContactMessageMailAdmin($contact)
    {
        Mail::to('yonetici@admin.com')->send(new MessageContactMailable($contact));
    }


    #region Search
    public function getproduct(Request $request): \Illuminate\Http\RedirectResponse
    {
        $search = $request->input('search');
        $count = Product::IsSearch($search)->get()->count();
//        $data1 = Product::where('title', 'like', '%' . $search . '%')->get()->count();
        if ($count == 1) {
            $data = Product::IsSearch($search)->first();
            return redirect()->route('product', ['id' => $data->id, 'slug' => $data->slug]);
        } elseif ($count == 0)
        {
            $message= __('Please,re-enter the product you want to search.');
            return redirect()->back()->with('toast_error', $message);
        }
        else
            return redirect()->route('productlist', ['search' => $search]);
    }

    public function productlist($search): Factory|View|Application
    {
        $datalist = Product::IsSearch($search);
        $this->getSort($datalist);
        // dd($datalist);
        $datalist = $datalist->paginate(5);
        $last = Product::select('id')->limit(6)->orderByDesc('id')->get();
        return view('home.search_products', ['search' => $search, 'datalist' => $datalist, 'last' => $last]);
    }

    #endregion

    public function product($id): Factory|View|Application
    {
        $data = Product::find($id);
        $datalist = Image::where('product_id', $id)->get();
        $reviews = Review::where(['product_id' => $id, 'status' => 'True'])->get();
        return view('home.product_detail', ['data' => $data, 'datalist' => $datalist, 'reviews' => $reviews]);
    }

    public function paket_product($id, $slug): Factory|View|Application|\Illuminate\Http\RedirectResponse
    {
        $data = PaketProduct::where(['paket_category_id' => $id, 'status' => 'True'])->first();
        $dataid = PaketProduct::where('paket_category_id', '=', $id)->select('category_id')->first();
        if ($data) {
            $products = Product::where(['category_id' => $dataid->category_id, 'status' => 'True'])->get();
//        dd($id,$a,$data,$products);
//        $datalist = Image::where('product_id', $id)->get();
//        $reviews = Review::where(['product_id'=>$id, 'status'=>'True'])->get();
            return view('home.paket_product_detail', ['data' => $data, 'products' => $products]);
        } else {
            $message=__('Not Find Product');
            return redirect()->back()->with('toast_error', $message );
        }    }

    public function paket_product_update_cart(Request $request, $id, $slug): Factory|View|Application
    {
        $data = PaketProduct::where('paket_category_id', '=', $id)->first();
        $dataid = PaketProduct::where('paket_category_id', '=', $id)->select('category_id')->first();
        $products = Product::where('category_id', '=', $dataid->category_id)->get();

        $quantity = $request->input('quantity');
        $price = $request->input('price');
        $total = $quantity * $price;
//        dd($data, $price,$total);
        return view('home.paket_product_detail', ['data' => $data, 'products' => $products, 'total' => $total]);
    }


    //alt kategori ürün bulma
    public function categoryproducts(Request $request, $id, $slug): Factory|View|Application
    {
        $datalist = Product::where('category_id', $id);
        //checking for sort
        $this->getSort($datalist);
        // dd($datalist);
        $datalist = $datalist->paginate(5);
        $data = Category::find($id);
        $last = Product::select('id')->limit(3)->orderByDesc('id')->get();
        return view('home.category_products', ['data' => $data, 'datalist' => $datalist, 'last' => $last]);
    }

    public function main_category_products($id,$slug): Factory|View|Application
    {
        $data2 = Category::where('parent_id', $id)->count();
      //  dd($data2);
        if ($data2 == 0) {
            DB::table('categories')
                ->where('id', $id)
                ->update(['main_cat_id' => $id]);
            $data1 = Category::where('id', $id)->select('id')->get();
            $datacount = Category::where('id', $id)->count();

        } else {
            DB::table('categories')
                ->where('parent_id', $id)
                ->update(['main_cat_id' => $id]);
            $data1 = Category::where('parent_id', $id)->select('id')->get();
            $datacount = Category::where('parent_id', $id)->count();

        }

        $newcat = Category::where(['main_cat_id' => $id])->get();

//        dd($data1[0]->id);
        foreach ($newcat as $rs) {
            if ($rs->main_cat_id == $id) {
                for ($i = 0; $i < $datacount; $i++) {
                    DB::table('products')
                        ->where('category_id', $data1[$i]->id)
                        ->update(['main_category_id' => $id]);
                }
            }
        }

        $datalist = Product::where(['main_category_id' => $id, 'status' => 'True']);
        $this->getSort($datalist);
        $datalist = $datalist->paginate(9);

        $data = Category::find($id);
//                dd($data->title);
        $catDetail = Category::where(['id'=>$id])->get();
        $last = Product::select('id')->limit(6)->orderByDesc('id')->get();
        return view('home.category_main_products', ['data' => $data, 'datalist' => $datalist,'last' => $last,'catDetail'=>$catDetail]);
    }
    public function main_category_products_paket(): Factory|View|Application
    {

        $datalist = PaketProduct::where('status','=','True');
//        $this->getSort($datalist);
        $datalist = $datalist->paginate(10);
//        dd($datalist);
        return view('home.category_main_products_paket', [ 'datalist' => $datalist]);
    }

    public function discount_products(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $datalist = Product::where(['is_sale' => 'Yes', 'status' => 'True']);
        // dd($datalist);
        //checking for sort
        $this->getSort($datalist);

        $datalist = $datalist->paginate(6);
        $last = Product::select('id')->limit(6)->orderByDesc('id')->get();
        return view('home.discount_products', ['datalist' => $datalist, 'last' => $last]);
    }

    public function new_products(): Factory|View|Application
    {
        $datalist = Product::where(['status' => 'True'])->limit(6);
        // dd($datalist);
        //checking for sort
        $this->getSort($datalist);

        $datalist = $datalist->paginate(10);
        $last = Product::select('id')->limit(5)->orderByDesc('id')->get();
        return view('home.new_products', ['datalist' => $datalist, 'last' => $last]);
    }

    //Tüm ürümleri listeleme
    public function allproducts(Request $request)
    {
        $minprice = Product::min('products.sale_price');
        $maxprice = Product::max('products.sale_price');
        $min_price = $request->get('min_price');
        $max_price = $request->get('max_price');
//          dd($minprice,$maxprice);
        if ($request->ajax()) {
            $min_price = $request->get('min_price');
            $max_price = $request->get('max_price');
            $data = $request->all();
//             echo "<pre>"; print_r($request['sort']); die;
            $url = $data['url'];
//            print_r($url);
            $_GET['sort'] = $data['sort'];

            $productCount = Product::where('status', '=', 'True')->count();
            if ($productCount > 0) {
                $datalist = Product::where('status', '=', 'True');
                //checking for sort
                //dd(isset($_GET['sort']));
                if (isset($_GET['sort']) && !empty($_GET['sort'])) {

                    if ($_GET['sort'] == "product_lastest") {

                        $datalist->orderby('products.id', 'Desc');
                    } elseif ($_GET['sort'] == "price_highest") {
                        $datalist->orderby('products.sale_price', 'Desc');
                    } elseif ($_GET['sort'] == "price_lowest") {
                        $datalist->orderby('products.sale_price', 'Asc');
                    } elseif ($_GET['sort'] == "name_z_a") {
                        $datalist->orderby('products.title', 'Desc');
                    } elseif ($_GET['sort'] == "name_a_z") {
                        $datalist->orderby('products.title', 'Asc');
                    }
                }

                if (($min_price) && ($max_price)) {
                    // dd($min_price,$max_price);
                    $datalist = $datalist->wherebetween('products.sale_price', [$min_price, $max_price])->paginate(6);
                } else
                    $datalist = $datalist->wherebetween('products.sale_price', [$minprice, $maxprice])->paginate(6);
                $last = Product::select('id')->limit(5)->orderByDesc('id')->get();
                return view('home.ajax_product_listing', ['datalist' => $datalist, 'last' => $last, 'url' => $url, 'data' => $data, 'min_price' => $min_price, 'max_price' => $maxprice]);
            } else {
                abort(404);
            }
        } else {
            $url = Route::getFacadeRoot()->current()->uri();
            //dd($url);
            $productcount = Product::where('status', '=', 'True')->count();
            if ($productcount > 0) {
                $datalist = Product::where('status', '=', 'True');
                //checking for sort
                //dd(isset($_GET['sort']));
                if (isset($_GET['sort']) && !empty($_GET['sort'])) {

                    if ($_GET['sort'] == "product_lastest") {
                        $datalist->orderby('products.id', 'Desc');
                    } elseif ($_GET['sort'] == "price_highest") {
                        $datalist->orderby('products.sale_price', 'Desc');
                    } elseif ($_GET['sort'] == "price_lowest") {
                        $datalist->orderby('products.sale_price', 'Asc');
                    } elseif ($_GET['sort'] == "name_z_a") {
                        $datalist->orderby('products.title', 'Desc');
                    } elseif ($_GET['sort'] == "name_a_z") {
                        $datalist->orderby('products.title', 'Asc');
                    }
                }
                if (($min_price) && ($max_price)) {
                    //dd($min_price,$max_price);
                    $datalist = $datalist->wherebetween('products.sale_price', [$min_price, $max_price])->paginate(6);
                } else
                    $datalist = $datalist->wherebetween('products.sale_price', [$minprice, $maxprice])->paginate(6);

                $last = Product::select('id')->limit(5)->orderByDesc('id')->get();
                return view('home.all_product', ['datalist' => $datalist, 'last' => $last, 'url' => $url, 'min_price' => $min_price, 'max_price' => $maxprice]);
            } else {
                abort(404);
            }
        }


    }

    /**
     * @param $datalist
     * @return void
     */
    public static function getSort($datalist): void
    {
        if (isset($_GET['sort1']) && !empty($_GET['sort1'])) {
            // dd($_GET['sort1']);
            if ($_GET['sort1'] == "product_lastest") {
                $datalist->orderby('products.id', 'Desc');
            } elseif ($_GET['sort1'] == "price_highest") {
                $datalist->orderby('products.sale_price', 'Desc');
            } elseif ($_GET['sort1'] == "price_lowest") {
                $datalist->orderby('products.sale_price', 'Asc');
            } elseif ($_GET['sort1'] == "name_z_a") {
                $datalist->orderby('products.title', 'Asc');
            } elseif ($_GET['sort1'] == "name_a_z") {
                $datalist->orderby('products.title', 'Desc');
            }
        }
    }
}
