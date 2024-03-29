<?php

namespace App\Http\Controllers;

use App\Models\Shopcart;

//use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use function PHPUnit\Framework\isEmpty;


class ShopCartController extends Controller
{

    public static function countshopcart()
    {
        return Shopcart::where('user_id', Auth::id())->count();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $data= __('Sepetinizde ürün bulunmamaktadır. Lütfen sepetinize ürün ekleyin.');
        $name= __('User Shopcart');
        $datalist = Shopcart::with('product')->where('user_id', Auth::id())->get();
//dd($datalist);
        if ($datalist->count() == 0) {
            return view('home.blank_data', ['data' => $data,'name'=>$name]);
        } else
            return view('home.user_shopcart', ['datalist' => $datalist]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        $data = Shopcart::where('product_id', $id)->where('user_id', Auth::id())->first();
        if ($data) {
            $data->quantity = $data->quantity + (int)$request->input('quantity');
        } else {
            $data = new Shopcart;
            $data->product_id = $id;
            $data->user_id = Auth::id();
            $data->quantity = (int)$request->input('quantity');
        }
        $data->save();

        //Alert::success('Product Added Successfully', 'We have added product to the cart',);

//        Alert::success('Product Added Successfully', 'We have added product to the cart');

        $message = __('Product Added to Shopcart Successfully');
        return redirect()->back()->with('success', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Shopcart $shopcart
     * @return \Illuminate\Http\Response
     */
    public function show(Shopcart $shopcart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Shopcart $shopcart
     * @return \Illuminate\Http\Response
     */
    public function edit(Shopcart $shopcart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Shopcart $shopcart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shopcart $shopcart, $id): \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
    {
        $data = Shopcart::find($id);
        $data->quantity = (int)$request->input('quantity');
        if ($data->quantity == 0)
            return $this->destroy($data, $data->id);
        $data->save();
        $message=__('Product Updated to Shopcart');
        return redirect()->back()->with('success',$message );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Shopcart $shopcart
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Shopcart $shopcart, $id): \Illuminate\Http\RedirectResponse
    {
        $data = Shopcart::find($id);
        $data->delete();
        $message=__('Product deleted succesfully');
        return redirect()->back()->with('success',$message );
    }
}
