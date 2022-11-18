<?php

namespace App\Http\Controllers;

use App\Mail\OrderMailable;
use App\Mail\OrderMailableAdmin;
use App\Models\Order;
use App\Models\Orderitem;
use App\Models\Shopcart;
use App\Models\User;
use App\Notifications\OrderMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Notifications\Messages\MailMessage;

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
        $cid=$request->post('cid');
        $getdistrict = DB::table('district')->where('ilce_sehirkey','=',$cid)->orderBy('ilce_key', 'asc')->get();
        $html='<option value="">İlçe Seçiniz</option>';
        foreach($getdistrict as $rs)
        {
            $html.='<option value="'.$rs->ilce_key.'">'.$rs->ilce_title.'</option>';
        }
        echo $html;
    }
    public function getNeighbourhood(Request $request)
    {
        $did=$request->post('did');
        $getneighbourhood = DB::table('neighbourhood')->where('mahalle_ilcekey','=',$did)->orderBy('mahalle_key', 'asc')->get();
        $html='<option value="">Mahalle Seçiniz</option>';
        foreach($getneighbourhood as $rs)
        {
            $html.='<option value="'.$rs->mahalle_key.'">'.$rs->mahalle_title.'</option>';
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

        $data = new Order;
        $data->name = $request->input('name');
        $data->surname = $request->input('surname');
        $data->address = $request->input('address');
        $data->email = $request->input('email');
        $data->phone = $request->input('phone');
        $data->total = $request->input('total');
        $data->note = $request->input('note');
        $data->city = DB::table('city')->where('sehir_key',$request->input('city'))->pluck('sehir_title')->first();
        $data->neighbourhood =DB::table('neighbourhood')->where('mahalle_key', $request->input('neighbourhood'))->pluck('mahalle_title')->first();
        $data->district =DB::table('district')->where('ilce_key', $request->input('district'))->pluck('ilce_title')->first();
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

        $this->sendOrderConfirmationMail($data);
        $this->sendOrderConfirmationMailAdmin($data);


        //iyzico ile sağlanacak
        $data3 = Shopcart::where('user_id', Auth::id());
        $data3->delete();

        return redirect()->route('user_orders')->with('success', 'Product Order Successfuly');
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
}
