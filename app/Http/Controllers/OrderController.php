<?php

namespace App\Http\Controllers;


use App\Events\OrderRecord;
use App\Helpers\IyzicoAddressHelper;
use App\Helpers\IyzicoApi;
use App\Helpers\IyzicoBasketItemsHelper;
use App\Helpers\IyzicoBuyerHelper;
use App\Helpers\IyzicoRequestHelper;
use App\Http\Requests\CheckoutRequest;
use App\Mail\OrderMailable;
use App\Mail\OrderMailableAdmin;
use App\Models\Order;
use App\Models\Orderitem;
use App\Models\Product;
use App\Models\Shopcart;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Mail;
use Iyzipay\Model\Buyer;
use Iyzipay\Model\Currency;
use Iyzipay\Model\PaymentGroup;
use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
{

    public static function orderitemmail($id)
    {
        return Orderitem::where('user_id', Auth::id())->where('order_id', $id)->get();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        $name=__("User Orders");
        $data= __("Şipariş bulunumadı. Keyifli alışverişler dileriz. ");
        $datalist = Order::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();
        if($datalist->count()==0){
            return view('home.blank_data', ['data' => $data,'name'=>$name]);
        }
            return view('home.user_order', ['datalist' => $datalist]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(Request $request)
    {
        $total = $request->input('total');

        $getcity = DB::table('city')->orderBy('sehir_key', 'asc')->get();
        return view('home.user_order_add', ['total' => $total, 'getcity' => $getcity]);
    }

    public function getDistrict(Request $request)
    {
        $cid = $request->post('cid');
        $getdistrict = DB::table('district')->where('ilce_sehirkey', '=', $cid)->orderBy('ilce_key', 'asc')->get();
        $html = '<option value="">'. __('İlçe Seçiniz') . '</option>';
        foreach ($getdistrict as $rs) {
            $html .= '<option value="' . $rs->ilce_key . '">' . $rs->ilce_title . '</option>';
        }
        echo $html;
    }

    public function getNeighbourhood(Request $request)
    {
        $did = $request->post('did');
        $getneighbourhood = DB::table('neighbourhood')->where('mahalle_ilcekey', '=', $did)->orderBy('mahalle_key', 'asc')->get();
        $html = '<option value="">'. __('Mahalle Seçiniz') . '</option>';
        foreach ($getneighbourhood as $rs) {
            $html .= '<option value="' . $rs->mahalle_key . '">' . $rs->mahalle_title . '</option>';
        }
        echo $html;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CheckoutRequest $request)
    {
        $order = Order::create([
            'name' => $request->input('name'),
            'surname' => $request->input('surname'),
            'address' => $request->input('address'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'total' => $request->input('total'),
            'note' => $request->input('note'),
            'city' => DB::table('city')->where('sehir_key', $request->input('city'))->pluck('sehir_title')->first(),
            'neighbourhood' => DB::table('neighbourhood')->where('mahalle_key', $request->input('neighbourhood'))->pluck('mahalle_title')->first(),
            'district' => DB::table('district')->where('ilce_key', $request->input('district'))->pluck('ilce_title')->first(),
            'zipcode' => $request->input('zipcode'),
            'user_id' => Auth::id(),
            'payment' => $request->input('payment'),
            'IP' => $request->ip(),
        ]);
        // dd($order);
        //Kullanıcıyı Al

        $fields = $request->get('payment');
        // dd($fields);

        if ($fields == 'iyzico') {
            //dd('aa');
            $date = DB::table('shopcarts')->where('user_id', Auth::id())->first();
            //Sepetteki ürünlerin toplam tutarını hesapla
            $total = $request->input('total');
            // dd($total);

            //Ödeme İsteği Oluştur.

            $requestIyzico = IyzicoRequestHelper::createRequest($total);
           // dd($requestIyzico);
            #region PaymentCard Nesnesi oluştur
            //  $paymentCard =IyzicoPaymentCardHelper::getPaymentCard();

            #endregion

            #region Buyer Nesnesi oluştur.
         $buyer = IyzicoBuyerHelper::getBuyer($order, $date);
         $requestIyzico->setBuyer($buyer);
//            dd($a);
#endregion

            #region Kargo ve fatura adresi nesnlerini oluştur.
            $shippingAddress = IyzicoAddressHelper::getAddress($order);
            $requestIyzico->setShippingAddress($shippingAddress);

            $billingAddress = IyzicoAddressHelper::getAddress($order);
            $requestIyzico->setBillingAddress($billingAddress);

#endregion

            #region Sepetteki ürünleri (CartDetails) BasketItem listesi olarak hazırla
            $basketItems = IyzicoBasketItemsHelper::getBasketItems();
            $requestIyzico->setBasketItems($basketItems);

#endregion
            //Ödeme Yap

            $checkoutFormInitialize = \Iyzipay\Model\CheckoutFormInitialize::create($requestIyzico, IyzicoApi::options());
            $paymentForm = $checkoutFormInitialize->getCheckoutFormContent();
//            dd($paymentForm);
            return view('home.iyzico-form', compact('paymentForm'));
        } else {
            //kredi kartı ile ödeme
            $this->getOrder();
            // dd($order);
            //Sepeti Kapat
            $data3 = Shopcart::where('user_id', Auth::id());
            $data3->delete();
//            return view('home.payment_success');
            return redirect()->route('payment_success');
        }

        // return redirect()->back()->with('success','Product Add Successfully' );
    }

    public function paymentSuccess(): Factory|View|Application
    {
        return view('home.payment_success');
    }

    public function paymentFail(): Factory|View|Application
    {
        return view('home.payment_fail');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function callback(Request $request, User $user): RedirectResponse
    {
        if (!auth()->check()) {
            dd('callbackdggg');
            auth()->login($user);
        }
        $requestIyzico = new \Iyzipay\Request\RetrieveCheckoutFormRequest();
        $requestIyzico->setLocale(\Iyzipay\Model\Locale::TR);
        $requestIyzico->setConversationId(rand());
        $requestIyzico->setToken($request->get('token'));
        $checkoutForm = \Iyzipay\Model\CheckoutForm::retrieve($requestIyzico, IyzicoApi::options());
        // dd($checkoutForm->getPaymentStatus());
        if ($checkoutForm->getPaymentStatus() == 'SUCCESS') {
            $this->getOrder();
            //Sepeti Kapat
            $data3 = Shopcart::where('user_id', Auth::id());
            $data3->delete();
            //getorder da mail atılıyor.
//            $this->sendOrderConfirmationMail($order);
//            $this->sendOrderConfirmationMailAdmin($order);

            return redirect()->route('payment_success');
        } else {
            // dd($checkoutForm);
            $orderDelete = Order::orderByDesc('id')->first();
            //dd($orderDelete);
            $orderDelete->delete();
            return redirect()->route('payment_fail');
        }
    }

    public function sendOrderConfirmationMail($order)
    {
        Mail::to($order->email)->send(new OrderMailable($order));
    }

    public function sendOrderConfirmationMailAdmin($order)
    {
        Mail::to('yonetici@admin.com')->send(new OrderMailableAdmin($order));
    }


    /**
     * Display the specified resource.
     *
     * @param \App\Models\Order $order
     * @return Application|Factory|View
     */
    public function show(Order $order, $id): View|Factory|Application
    {
        $datalist = Orderitem::where('user_id', Auth::id())->where('order_id', $id)->get();

        return view('home.user_order_item(edit)', ['datalist' => $datalist]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Order $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param \App\Models\Order $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Order $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    /**
     * @return mixed
     */
    public function getOrder()
    {
        $orderId = Order::orderByDesc('id')->pluck('id')->first();
        $order = Order::orderByDesc('id')->first();

        Order::where("id", $orderId)->update(array(
            "is_pay" => "True",
            "total" => $order->total + 30,
        ));

        // dd($order);
        $datalist = Shopcart::where('user_id', Auth::id())->get();
        foreach ($datalist as $rs) {
            $data2 = new Orderitem;
            $data2->user_id = Auth::id();
            $data2->product_id = $rs->product_id;
            $data2->order_id = $order->id;
            $data2->price = $rs->product->price;
            $data2->quantity = $rs->quantity;
            $data2->amount = $rs->quantity * $rs->product->price;
            $data2->total = $order->total + 30;
            $data2->note = $order->note;
            $data2->save();
        }

        $product = Orderitem::where('order_id', $order->id)->get();
        // dd($product);

        foreach ($product as $rs) {
            Product::find($rs->product_id)->decrement('quantity', $rs->quantity);
            continue;
        }
        Event::dispatch(new OrderRecord($order));
        return $order;
    }


}
