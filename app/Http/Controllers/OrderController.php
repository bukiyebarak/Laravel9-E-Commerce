<?php

namespace App\Http\Controllers;

use App\Helpers\IyzicoApi;
use App\Helpers\IyzicoRequestHelper;
use App\Mail\OrderMailable;
use App\Mail\OrderMailableAdmin;
use App\Models\CreditCard;
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
use PhpParser\Node\Expr\Array_;
use Symfony\Component\Console\Input\Input;

class OrderController extends Controller
{
    public Arr $array;

    /**
     * Create a new message instance.
     *
     *
     * @return void
     */
    public function __construct(Arr $array)
    {
        $this->array=$array;
    }

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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        #Get credit card information send to bank webservice if everything is ok next
//        $cart_name = $requestt->get("cartname");
//        $cart_no = $requestt->get("cartno");
//        $expire_month = $requestt->get("expire_month");
//        $expire_year = $requestt->get("expire_year");
//        $cvc = $requestt->get("cartcvc");
        // dd($cart_name, $cart_no, $expire_month, $expire_year, $cvc);

        $array = $this->getorderinformation($request);
        dd($array);

        $name = $request->input('name');
        $surname = $request->input('surname');
        $address = $request->input('address');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $city = DB::table('city')->where('sehir_key', $request->input('city'))->pluck('sehir_title')->first();
        $zipcode = $request->input('zipcode');

        //Kullanıcıyı Al
        $user = Auth::user();

        $date = DB::table('shopcarts')->where('user_id', Auth::id())->first();
        //dd($date);
        //Sepetteki ürünlerin toplam tutarını hesapla
        $total = $request->input('total');
        // dd($total);
        //Option nesnesi oluştur
//        $options = new \Iyzipay\Options();
//        $options->setApiKey(env("TEST_IYZI_API_KEY"));
//        $options->setSecretKey(env("TEST_IYZI_SECRET_KEY"));
//        $options->setBaseUrl(env("TEST_IYZI_BASE_URL"));

        //Ödeme İsteği Oluştur.

        //  $request = IyzicoRequestHelper::createRequest((float)$total);
        $requestIyzico = new \Iyzipay\Request\CreateCheckoutFormInitializeRequest();
        $requestIyzico->setLocale(\Iyzipay\Model\Locale::TR);
        $requestIyzico->setConversationId(rand());
        $requestIyzico->setPrice(number_format($total, '2', '.', ''));
        $requestIyzico->setPaidPrice(number_format($total + 30, '2', '.', ''));//kargo indirim dahil fiyatı
        $requestIyzico->setCurrency(Currency::TL);
        $requestIyzico->setBasketId("B67832");
        $requestIyzico->setPaymentGroup(PaymentGroup::PRODUCT);
        $requestIyzico->setCallbackUrl(route('iyzico.callback'));
        $requestIyzico->setEnabledInstallments(array(2, 3, 6, 9));

//        //PaymentCard Nesnesi oluştur
//        $paymentCard = new PaymentCard();
//        $paymentCard->setCardHolderName($cart_name);
//        $paymentCard->setCardNumber($cart_no);
//        $paymentCard->setExpireMonth($expire_month);
//        $paymentCard->setExpireYear($expire_year);
//        $paymentCard->setCvc($cvc);
//        $paymentCard->setRegisterCard(0);//iyzico kart bilgilerini kayıt altına alınsın mı diye soruyor.
//        $request->setPaymentCard($paymentCard);
        //Buyer Nesnesi oluştur.
        $buyer = new Buyer();
        $buyer->setId($user->id);
        $buyer->setName($array['name']);
        $buyer->setSurname($array['surname']);
        $buyer->setGsmNumber($array['phone']);
        $buyer->setEmail($array['email']);
        $buyer->setIdentityNumber(rand());
        $buyer->setLastLoginDate((string)$date->created_at);
        $buyer->setRegistrationDate((string)$user->created_at);
        $buyer->setRegistrationAddress($array['address']);
        $buyer->setIp(\request()->ip());
        $buyer->setCity((string)$array['city']);
        $buyer->setCountry("Turkey");
        $buyer->setZipCode($array['zipcode']);
        $requestIyzico->setBuyer($buyer);

        //Kargo ve fatura adresi nesnlerini oluştur.
        $shippingAddress = new Address();
        $shippingAddress->setContactName($name . '' . $surname);
        $shippingAddress->setCity($city);
        $shippingAddress->setCountry("Turkey");
        $shippingAddress->setAddress($address);
        $shippingAddress->setZipCode($zipcode);
        $requestIyzico->setShippingAddress($shippingAddress);

        $billingAddress = new Address();
        $billingAddress->setContactName($name . ' ' . $surname);
        $billingAddress->setCity($city);
        $billingAddress->setCountry("Turkey");
        $billingAddress->setAddress($address);
        $billingAddress->setZipCode($zipcode);
        $requestIyzico->setBillingAddress($billingAddress);

        //Sepetteki ürünleri (CartDetails) BasketItem listesi olarak hazırla
        $basketItems = $this->getBasketItems();
        $requestIyzico->setBasketItems($basketItems);

        //Ödeme Yap
        $checkoutFormInitialize = \Iyzipay\Model\CheckoutFormInitialize::create($requestIyzico, IyzicoApi::options());
        // İşlem Başarılı ise sipariş ve fatura oluştur.
//        if ($checkoutFormInitialize->getStatus() == "success") {
//            // dd("ödeme tamamlandı.");
//            #region Order and Orderitem
//            $data = $this->getOrder($requestt);
//
//            //Sepeti Kapat
//            $data3 = Shopcart::where('user_id', Auth::id());
//            $data3->delete();
//            $this->sendOrderConfirmationMail($data);
//            $this->sendOrderConfirmationMailAdmin($data);
//            #endregion
//        }

        $data = $this->getOrder($request);

        $paymentForm = $checkoutFormInitialize->getCheckoutFormContent();

        return view('home.iyzico-form', compact('paymentForm'));
        //dd($payment);

//        $this->regionSendMail();

    }

    public function callback(Request $request,)
    {
        $requestIyzico = new \Iyzipay\Request\RetrieveCheckoutFormRequest();
        $requestIyzico->setLocale(\Iyzipay\Model\Locale::TR);
        $requestIyzico->setToken($request->token);
        $checkoutForm = \Iyzipay\Model\CheckoutForm::retrieve($requestIyzico, IyzicoApi::options());

        if ($checkoutForm->getPaymentStatus() == 'SUCCESS') {

            $array = $this->getorderinformation($request);
            dd($array);
            $data = new Order;
            $data->name = $array['name'];
            $data->surname = $array['surname'];
            $data->address = $array['address'];
            $data->email = $array['email'];
            $data->phone =$array['phone'];
            $data->total = $array['total'];
            $data->note = $array['note'];
            $data->city =$array['city'];
            $data->neighbourhood = $array['neighbourhood'];
            $data->district =$array['district'];
            $data->zipcode = $array['zipcode'];
            $data->user_id = $array['user_id'];
            $data->IP = $array['IP'];
            $data->save();

//            $data = $this->getOrder($request);
//
//            //Sepeti Kapat
//            $data3 = Shopcart::where('user_id', Auth::id());
//            $data3->delete();
//           // $this->sendOrderConfirmationMail($data);
//           // $this->sendOrderConfirmationMailAdmin($data);

            return view('home.iyzico_success');
        } else {
            return view('home.iyzico_failed');
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

    /**
     * @param Request $request
     * @return array
     */
    public function getorderinformation(Request $request): array
    {
        $array =[
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
            'IP' => $request->ip()
        ];

        return $array;
    }
}
