<?php

namespace App\Http\Controllers;

use App\Helpers\IyzicoRequestHelper;
use App\Mail\OrderMailable;
use App\Mail\OrderMailableAdmin;
use App\Models\Order;
use App\Models\Orderitem;
use App\Models\Shopcart;
use App\Models\User;
use App\Notifications\OrderMail;
use Config;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Iyzipay\Model\Address;
use Iyzipay\Model\BasketItem;
use Iyzipay\Model\BasketItemType;
use Iyzipay\Model\Buyer;
use Iyzipay\Model\Currency;
use Iyzipay\Model\Locale;
use Iyzipay\Model\Payment;
use Iyzipay\Model\PaymentCard;
use Iyzipay\Model\PaymentChannel;
use Iyzipay\Model\PaymentGroup;
use Iyzipay\Options;
use Iyzipay\Request\CreatePaymentRequest;
use Symfony\Component\Console\Input\Input;

class OrderController extends Controller
{

    public static function orderitemmail($id)
    {
        return Orderitem::where('user_id', Auth::id())->where('order_id', $id)->get();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datalist = Order::where('user_id', Auth::id())->get();
        return view('home.user_order', ['datalist' => $datalist]);
    }

    public function iyzico_callback(Request $request)
    {
        return view('home.iyzico_success');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $total = $request->input('total');

        $getcity = DB::table('city')->orderBy('sehir_key', 'asc')->get();
        return view('home.user_order_add', ['total' => $total, 'getcity' => $getcity]);
    }

    public function getDistrict(Request $request)
    {
//        $il_id = Input::get('id');
//        $regencies = DB::table('district')->where('ilce_sehirkey','=',$il_id)->orderBy('ilce_key', 'asc')->get();
//        return response()->json($regencies);

        $cid = $request->post('cid');
        $getdistrict = DB::table('district')->where('ilce_sehirkey', '=', $cid)->orderBy('ilce_key', 'asc')->get();
        $html = '<option value="">İlçe Seçiniz</option>';
        foreach ($getdistrict as $rs) {
            $html .= '<option value="' . $rs->ilce_key . '">' . $rs->ilce_title . '</option>';
        }
        echo $html;
    }

    public function getNeighbourhood(Request $request)
    {
        $did = $request->post('did');
        $getneighbourhood = DB::table('neighbourhood')->where('mahalle_ilcekey', '=', $did)->orderBy('mahalle_key', 'asc')->get();
        $html = '<option value="">Mahalle Seçiniz</option>';
        foreach ($getneighbourhood as $rs) {
            $html .= '<option value="' . $rs->mahalle_key . '">' . $rs->mahalle_title . '</option>';
        }
        echo $html;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $requestt
     * @return \Illuminate\Http\Response
     */
    public function store(Request $requestt)
    {
        #Get credit card information send to bank webservice if everything is ok next
        $cart_name = $requestt->get("cartname");
        $cart_no = $requestt->get("cartno");
        $expire_month = $requestt->get("expire_month");
        $expire_year = $requestt->get("expire_year");
        $cvc = $requestt->get("cartcvc");
        // dd($cart_name, $cart_no, $expire_month, $expire_year, $cvc);
        $name = $requestt->input('name');
        $surname = $requestt->input('surname');
        $address = $requestt->input('address');
        $email = $requestt->input('email');
        $phone = $requestt->input('phone');
        $city = DB::table('city')->where('sehir_key', $requestt->input('city'))->pluck('sehir_title')->first();
        $zipcode = $requestt->input('zipcode');

        //Kullanıcıyı Al
        $user = Auth::user();
        $date=DB::table('shopcarts')->where('user_id', Auth::id())->first();
        //dd($date);

        //Sepetteki ürünlerin toplam tutarını hesapla
        $total = $requestt->input('total');

        // dd($total);

        //Option nesnesi oluştur
        $options = new \Iyzipay\Options();
        $options->setApiKey(env("TEST_IYZI_API_KEY"));
        $options->setSecretKey(env("TEST_IYZI_SECRET_KEY"));
        $options->setBaseUrl(env("TEST_IYZI_BASE_URL"));

        //Ödeme İsteği Oluştur.

       $request=IyzicoRequestHelper::createRequest((float) $total);

        //PaymentCard Nesnesi oluştur
        $paymentCard = new PaymentCard();
        $paymentCard->setCardHolderName($cart_name);
        $paymentCard->setCardNumber( $cart_no);
        $paymentCard->setExpireMonth($expire_month);
        $paymentCard->setExpireYear($expire_year);
        $paymentCard->setCvc( $cvc);
        $paymentCard->setRegisterCard(0);//iyzico kart bilgilerini kayıt altına alınsın mı diye soruyor.
        $request->setPaymentCard($paymentCard);

        //Buyer Nesnesi oluştur.
        $buyer = new Buyer();
        $buyer->setId($user->id);
        $buyer->setName($name);
        $buyer->setSurname($surname);
        $buyer->setGsmNumber($phone);
        $buyer->setEmail($email);
        $buyer->setIdentityNumber("74300864791");
        $buyer->setLastLoginDate((string) $date->created_at);
        $buyer->setRegistrationDate((string) $user->created_at);
        $buyer->setRegistrationAddress($address);
        $buyer->setIp(\request()->ip());
        $buyer->setCity((string)$city);
        $buyer->setCountry("Turkey");
        $buyer->setZipCode($zipcode);
        $request->setBuyer($buyer);

        //Kargo ve fatura adresi nesnlerini oluştur.
        $shippingAddress = new Address();
        $shippingAddress->setContactName($name .''. $surname);
        $shippingAddress->setCity($city);
        $shippingAddress->setCountry("Turkey");
        $shippingAddress->setAddress($address);
        $shippingAddress->setZipCode($zipcode);
        $request->setShippingAddress($shippingAddress);

        $billingAddress = new Address();
        $billingAddress->setContactName($name .' '. $surname);
        $billingAddress->setCity($city);
        $billingAddress->setCountry("Turkey");
        $billingAddress->setAddress($address);
        $billingAddress->setZipCode($zipcode);
        $request->setBillingAddress($billingAddress);

        //Sepetteki ürünleri (CartDetails) BasketItem listesi olarak hazırla
        $basketItems= $this->getBasketItems();
        $request->setBasketItems($basketItems);

        //Ödeme Yap
        $payment = Payment::create($request, $options);
        //dd($payment);
        //İşlem Başarılı ise sipariş ve fatura oluştur.
        if ($payment->getStatus() == "success") {
           // dd("ödeme tamamlandı.");
            #region Order and Orderitem
            $data = $this->getOrder($requestt);

            //Sepeti Kapat
            $data3 = Shopcart::where('user_id', Auth::id());
            $data3->delete();
            $this->sendOrderConfirmationMail($data);
            $this->sendOrderConfirmationMailAdmin($data);
            return view('home.iyzico_success');
            #endregion
        } else {
            return view('home.iyzico_failed');
        }

//        $this->regionSendMail();

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
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order, $id)
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
     * @param \Illuminate\Http\Request $request
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
     * @return void
     */
    public function regionSendMail(): void
    {
        #region Send Mail

//        sending user
        // $datalist=Shopcart::with('product')->where('user_id',Auth::id())->get();
//        $user = Order::orderByDesc('id')->first();
//        $user->notify(new OrderMail($data));

//        sending to email
        // Notification::route('mail',['someexample@example.com'])->notify(new OrderMail($data));


        //sending to multiple emails
//        $receipients = [
//            'someone@example.com' => 'John  Doe',
//            'luck@example.com' => 'Lucky'
//        ];
//        Notification::route('mail', $receipients)->notify(new OrderMail($data));


        //sending to multiple users
//        $users=User::all();
//        Notification::route('mail', $users)->notify(new OrderMail($data));

        //User tablosundaki kullanıcıları 10'ar gruplar ve mail atar.
//        User::chunk(10,function ($users) use($data){
//            $receipients=$users->pluck('name','email');
//
//           Notification::route('mail', $receipients)->notify(new OrderMail($data));
//        });
#endregion
    }

    /**
     *
     * @return array
     */
    public function getBasketItems(): array
    {
        $basketItems = array();
        $cart = Shopcart::with('product')->where('user_id', Auth::id())->get();
        foreach ($cart as $detail) {

            $item = new BasketItem();
            $item->setId($detail->product->id);
            $item->setName($detail->product->title);
            $item->setCategory1($detail->product->category->title);
           // $item->setCategory2("Usb / Cable");
            $item->setItemType(BasketItemType::PHYSICAL);
            $item->setPrice(number_format($detail->product->price, '2', '.', ''));

            for ($i = 0; $i < $detail->quantity; $i++) {
                array_push($basketItems, $item);
            }
        }

        //dd($basketItems);
        return $basketItems;

    }

    /**
     * @param Request $request
     * @return Order
     */
    public function getOrder(Request $request): Order
    {
        $data = new Order;
        $data->name = $request->get('name');
        $data->surname = $request->input('surname');
        $data->address = $request->input('address');
        $data->email = $request->input('email');
        $data->phone = $request->input('phone');
        $data->total = $request->input('total');
        $data->note = $request->input('note');
        $data->city = DB::table('city')->where('sehir_key', $request->input('city'))->pluck('sehir_title')->first();
        $data->neighbourhood = DB::table('neighbourhood')->where('mahalle_key', $request->input('neighbourhood'))->pluck('mahalle_title')->first();
        $data->district = DB::table('district')->where('ilce_key', $request->input('district'))->pluck('ilce_title')->first();
        $data->zipcode = $request->input('zipcode');
        $data->user_id = Auth::id();
        $data->IP = $_SERVER['REMOTE_ADDR'];
        $data->save();

        $datalist = Shopcart::where('user_id', Auth::id())->get();

        foreach ($datalist as $rs) {
            $data2 = new Orderitem;
            $data2->user_id = Auth::id();
            $data2->product_id = $rs->product_id;
            $data2->order_id = $data->id;
            $data2->price = $rs->product->price;
            $data2->quantity = $rs->quantity;
            $data2->amount = $rs->quantity * $rs->product->price;
            $data2->total = $data->total;
            $data2->note = $data->note;

            $data2->save();
        }
        return $data;
    }
}
