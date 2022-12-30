<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public static function count_wishlist()
    {
        return Wishlist::where('user_id', Auth::id())->count();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data="Favoriler listeniz boş bulunmaktadır. Favori ürünlerinizi buraya ekleyebilirsiniz.";
        $datalist = Wishlist::with('product')->where('user_id', Auth::id());
        $datalist = $datalist->cursorPaginate(10);
        if($datalist->count()==0){
            return view('home.blank_data', ['data' => $data]);
        }
        else
            return view('home.user_wishlist', ['datalist' => $datalist]);
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $data = Wishlist::where('product_id', $id)->where('user_id', Auth::id())->first();
        if ($data) {
            return redirect()->back()->with('toast_info', "ürün daha önce eklenmiştir.");
        } else {
            $data = new Wishlist();
            $data->product_id = $id;
            $data->user_id = Auth::id();
        }
        $data->save();
        $message = __('Product Added to Wishlist Successfully');
        return redirect()->back()->with('success', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Wishlist::find($id);
        $data->delete();
        return redirect()->back()->with('success', 'Product deleted from the wishlist  succesfully');
    }

}
