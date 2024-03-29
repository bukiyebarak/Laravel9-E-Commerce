<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CategoryPaketController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\PaketCategoryController;
use App\Http\Controllers\Admin\PaketProductController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ShopCartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/laravel', function () {
    return view('welcome');
});
Route::get('lang/{lang}', [LocaleController::class, 'switchLang'])->name('lang.switch');
Route::get('lang-admin/{lang}', [LocaleController::class, 'switchLangAdmin'])->name('lang.switch.admin');
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

#region Home
Route::get('/calender', [App\Http\Controllers\Admin\HomeController::class, 'calender'])->name('calender');
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about-us', [HomeController::class, 'aboutus'])->name('aboutus');
Route::get('/faq', [HomeController::class, 'faq'])->name('faq');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/references', [HomeController::class, 'references'])->name('references');
Route::post('send-message', [HomeController::class, 'sendmessage'])->name('sendmessage');
Route::get('product/{id}/{slug}', [HomeController::class, 'product'])->name('product');
Route::get('paket-product/{id}/{slug}', [HomeController::class, 'paket_product'])->name('paket_product');
Route::post('paket-product-update/{id}/{slug}', [HomeController::class, 'paket_product_update_cart'])->name('paket_product_update_cart');
Route::get('category-products/{id}/{slug}', [HomeController::class, 'categoryproducts'])->name('categoryproducts');
Route::get('category-product/{id}/{slug}', [HomeController::class, 'main_category_products'])->name('main_category_products');
Route::get('category-product-paket', [HomeController::class, 'main_category_products_paket'])->name('main_category_products_paket');
Route::get('discount-products', [HomeController::class, 'discount_products'])->name('discount_products');
Route::get('new-products', [HomeController::class, 'new_products'])->name('new_products');
Route::post('/get-product', [HomeController::class, 'getproduct'])->name('getproduct');
Route::get('/product-list/{search}', [HomeController::class, 'productlist'])->name('productlist');
Route::get('/sidebar', [HomeController::class, 'sidebar'])->name('sidebar');

Route::match(['get', 'post'], 'all-products', [HomeController::class, 'allproducts'])->name('allproducts');
Route::post('/getDistrict', [OrderController::class, 'getDistrict']);
Route::post('/getNeighbourhood', [OrderController::class, 'getNeighbourhood']);


#endregion
Route::middleware('auth')->group(function () {

    Route::post('/iyzico-callback', [OrderController::class, 'callback'])->name('iyzico_callback');
    Route::get('/payment-success', [OrderController::class, 'paymentSuccess'])->name('payment_success');
    Route::get('/payment-fail', [OrderController::class, 'paymentFail'])->name('payment_fail');
});
#region Admin
Route::middleware('auth')->prefix('admin')->group(function () {
    #admin roles system
    Route::middleware('admin')->group(function () {
        Route::prefix('role')->group(function () {
            //Route assigned name "admin_users"...
            Route::get('/', [ RoleController::class, 'index'])->name('roles');
            Route::post('/add-role',[RoleController::class,'store'])->name('role_store');
            Route::put('update/{id}', [ RoleController::class, 'update'])->name('admin_role_update');
            Route::delete('delete/{id}', [ RoleController::class, 'destroy'])->name('admin_role_delete');
        });
        Route::get('/', [\App\Http\Controllers\Admin\HomeController::class, 'index'])->name('adminhome');

        #Category
        Route::get('category', [CategoryController::class, 'index'])->name('admin_category');
        Route::get('category/add', [CategoryController::class, 'add'])->name('admin_category_add');
        Route::post('category/create', [CategoryController::class, 'create'])->name('admin_category_create');
        Route::get('category/edit/{id}', [CategoryController::class, 'edit'])->name('admin_category_edit');
        Route::post('category/update/{id}', [CategoryController::class, 'update'])->name('admin_category_update');
        Route::get('category/delete/{id}', [CategoryController::class, 'destroy'])->name('admin_category_delete');
        Route::get('category/show', [CategoryController::class, 'show'])->name('admin_category_show');

        #paket category
        Route::prefix('category')->group(function () {
            Route::get('/paket', [CategoryPaketController::class, 'index'])->name('admin_category_paket');
            Route::get('paket/create', [CategoryPaketController::class, 'create'])->name('admin_category_paket_add');
            Route::post('paket/store', [CategoryPaketController::class, 'store'])->name('admin_category_paket_store');
            Route::get('paket/edit/{id}', [CategoryPaketController::class, 'edit'])->name('admin_category_paket_edit');
            Route::post('paket/update/{id}', [CategoryPaketController::class, 'update'])->name('admin_category_paket_update');
            Route::get('paket/delete/{id}', [CategoryPaketController::class, 'destroy'])->name('admin_category_paket_delete');
        });
        #Product
        Route::prefix('product')->group(function () {
            //Route assigned name "admin_users"...
            Route::get('/', [ProductController::class, 'index'])->name('admin_products');
            Route::get('create', [ProductController::class, 'create'])->name('admin_product_add');
            Route::post('store', [ProductController::class, 'store'])->name('admin_product_store');
            Route::get('edit/{id}', [ProductController::class, 'edit'])->name('admin_product_edit');
            Route::post('update/{id}', [ProductController::class, 'update'])->name('admin_product_update');
            Route::get('delete/{id}', [ProductController::class, 'destroy'])->name('admin_product_delete');
            Route::get('show', [ProductController::class, 'show'])->name('admin_product_show');
            Route::get('checkSlug', [ProductController::class, 'checkSlug'])->name('checkSlug');
            #paket product
            Route::prefix('paket')->group(function () {
                Route::get('/', [PaketProductController::class, 'index'])->name('admin_paket_products');
                Route::get('create', [PaketProductController::class, 'create'])->name('admin_paket_product_add');
                Route::post('store', [PaketProductController::class, 'store'])->name('admin_paket_product_store');
                Route::get('edit/{id}', [PaketProductController::class, 'edit'])->name('admin_paket_product_edit');
                Route::post('update/{id}', [PaketProductController::class, 'update'])->name('admin_paket_product_update');
                Route::get('delete/{id}', [PaketProductController::class, 'destroy'])->name('admin_paket_product_delete');
            });
        });


        #Review
        Route::prefix('review')->group(function () {
            Route::get('/', [ReviewController::class, 'index'])->name('admin_review');
            Route::post('update/{id}', [ReviewController::class, 'update'])->name('admin_review_update');
            Route::get('delete/{id}', [ReviewController::class, 'destroy'])->name('admin_review_delete');
            Route::get('show/{id}', [ReviewController::class, 'show'])->name('admin_review_show');

        });

        #Faq
        Route::prefix('faq')->group(function () {
            //Route assigned name "admin_users"...
            Route::get('/', [FaqController::class, 'index'])->name('admin_faq');
            Route::get('create', [FaqController::class, 'create'])->name('admin_faq_add');
            Route::post('store', [FaqController::class, 'store'])->name('admin_faq_store');
            Route::get('edit/{id}', [FaqController::class, 'edit'])->name('admin_faq_edit');
            Route::post('update/{id}', [FaqController::class, 'update'])->name('admin_faq_update');
            Route::get('delete/{id}', [FaqController::class, 'destroy'])->name('admin_faq_delete');
            Route::get('show', [FaqController::class, 'show'])->name('admin_faq_show');
        });

        #User
        Route::prefix('user')->group(function () {
            //Route assigned name "admin_users"...
            Route::get('/', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin_users');
            Route::get('create', [\App\Http\Controllers\Admin\UserController::class, 'create'])->name('admin_user_add');
            Route::post('store', [\App\Http\Controllers\Admin\UserController::class, 'store'])->name('admin_user_store');
            Route::get('edit/{id}', [\App\Http\Controllers\Admin\UserController::class, 'edit'])->name('admin_user_edit');
            Route::post('update/{id}', [\App\Http\Controllers\Admin\UserController::class, 'update'])->name('admin_user_update');
            Route::get('delete/{id}', [\App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('admin_user_delete');
            Route::get('show/{id}', [\App\Http\Controllers\Admin\UserController::class, 'show'])->name('admin_user_show');
            Route::get('user-role/{id}', [\App\Http\Controllers\Admin\UserController::class, 'user_roles'])->name('admin_user_roles');
            Route::post('user-role-store/{id}', [\App\Http\Controllers\Admin\UserController::class, 'user_role_store'])->name('admin_user_role_add');
            Route::get('user-role-delete/{userid}/{roleid} ', [\App\Http\Controllers\Admin\UserController::class, 'user_role_delete'])->name('admin_user_role_delete');
        });

        #Order
        Route::prefix('order')->group(function () {
            Route::get('/', [AdminOrderController::class, 'index'])->name('admin_orders');
            Route::get('list/{status}', [AdminOrderController::class, 'list'])->name('admin_order_list');
            Route::post('create', [AdminOrderController::class, 'create'])->name('admin_order_add');
            Route::post('store', [AdminOrderController::class, 'store'])->name('admin_order_store');
            Route::get('edit/{id}', [AdminOrderController::class, 'edit'])->name('admin_order_edit');
            Route::post('update/{id}', [AdminOrderController::class, 'update'])->name('admin_order_update');
            Route::post('item-update/{id}', [AdminOrderController::class, 'itemupdate'])->name('admin_order_item_update');
            Route::get('delete/{id}', [AdminOrderController::class, 'destroy'])->name('admin_order_delete');
            Route::get('show/{id}', [AdminOrderController::class, 'show'])->name('admin_order_show');
            Route::get('show-modal/{id}', [AdminOrderController::class, 'showmodal'])->name('admin_order_showmodal');
        });


        #Message(Contact Form)
        Route::prefix('message')->group(function () {
            //Route assigned name "admin_users"...
            Route::get('/', [MessageController::class, 'index'])->name('admin_messages');
            Route::get('edit/{id}', [MessageController::class, 'edit'])->name('admin_message_edit');
            Route::post('update/{id}', [MessageController::class, 'update'])->name('admin_message_update');
            Route::get('delete/{id}', [MessageController::class, 'destroy'])->name('admin_message_delete');
            Route::get('show', [MessageController::class, 'show'])->name('admin_message_show');
        });
        #Product Image Gallery
        Route::prefix('image')->group(function () {
            Route::get('create/{product_id}', [ImageController::class, 'create'])->name('admin_image_add');
            Route::post('store/{product_id}', [ImageController::class, 'store'])->name('admin_image_store');
            Route::get('delete/{id}/{product_id}', [ImageController::class, 'destroy'])->name('admin_image_delete');
            Route::get('show', [ImageController::class, 'show'])->name('admin_image_show');
        });
        #Setting
        Route::get('setting', [SettingController::class, 'index'])->name('admin_setting');
        Route::post('setting/update', [SettingController::class, 'update'])->name('admin_setting_update');
    });#admin
}); #auth
#endregion

#region MyAcccount
Route::middleware('auth')->prefix('myaccount')->namespace('myaccount')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('myprofile');
    Route::get('/my-reviews', [UserController::class, 'myreviews'])->name('myreviews');
    Route::get('/destroy-my-review/{id}', [UserController::class, 'destroymyreview'])->name('user_review_delete');
});
#endregion

#region User
Route::middleware('auth')->prefix('user')->namespace('user')->group(function () {

    Route::get('/profile', [UserController::class, 'index'])->name('userprofile');

    #Product
    Route::prefix('product')->group(function () {
        Route::get('/', [\App\Http\Controllers\ProductController::class, 'index'])->name('user_products');
        Route::get('create', [\App\Http\Controllers\ProductController::class, 'create'])->name('user_product_add');
        Route::post('store', [\App\Http\Controllers\ProductController::class, 'store'])->name('user_product_store');
        Route::get('edit/{id}', [\App\Http\Controllers\ProductController::class, 'edit'])->name('user_product_edit');
        Route::post('update/{id}', [\App\Http\Controllers\ProductController::class, 'update'])->name('user_product_update');
        Route::get('delete/{id}', [\App\Http\Controllers\ProductController::class, 'destroy'])->name('user_product_delete');
        Route::get('show', [\App\Http\Controllers\ProductController::class, 'show'])->name('user_product_show');
    });
    #Product Image Gallery
    Route::prefix('image')->group(function () {
        Route::get('create/{product_id}', [ImageController::class, 'create'])->name('user_image_add');
        Route::post('store/{product_id}', [ImageController::class, 'store'])->name('user_image_store');
        Route::get('delete/{id}/{product_id}', [ImageController::class, 'destroy'])->name('user_image_delete');
        Route::get('show', [ImageController::class, 'show'])->name('user_image_show');
    });

    #ShopCart
    Route::prefix('shop-cart')->group(function () {
        Route::get('/', [ShopCartController::class, 'index'])->name('user_shopcart');
        Route::post('store/{id}', [ShopCartController::class, 'store'])->name('user_shopcart_add');
        Route::post('update/{id}', [ShopCartController::class, 'update'])->name('user_shopcart_update');
        Route::get('delete/{id}', [ShopCartController::class, 'destroy'])->name('user_shopcart_delete');
    });

    Route::prefix('wishlist')->group(function () {
        Route::get('/', [WishlistController::class, 'index'])->name('user_wishlist');
        Route::post('store/{id}', [WishlistController::class, 'store'])->name('user_wishlist_add');
        Route::post('update/{id}', [WishlistController::class, 'update'])->name('user_wishlist_update');
        Route::get('delete/{id}', [WishlistController::class, 'destroy'])->name('user_wishlist_delete');
    });

    #Order
    Route::prefix('order')->group(function () {
        Route::get('/', [OrderController::class, 'index'])->name('user_orders');
        Route::post('create', [OrderController::class, 'create'])->name('user_order_add');
        Route::post('store', [OrderController::class, 'store'])->name('user_order_store');
        Route::get('edit/{id}', [OrderController::class, 'edit'])->name('user_order_edit');
        Route::post('update/{id}', [OrderController::class, 'update'])->name('user_order_update');
        Route::get('delete/{id}', [OrderController::class, 'destroy'])->name('user_order_delete');
        Route::get('show/{id}', [OrderController::class, 'show'])->name('user_order_show');
    });

    Route::prefix('review')->group(function () {

        Route::post('reply', [ReviewController::class, 'reply'])->name('review_reply');
    });
});
#endregion

#region Login-Logout
Route::get('/login', [\App\Http\Controllers\HomeController::class, 'login'])->name('adminlogin');
Route::post('/admin/logincheck', [HomeController::class, 'logincheck'])->name('admin_logincheck');
Route::get('/logout', [HomeController::class, 'logoutt'])->name('logoutt');
#endregion
