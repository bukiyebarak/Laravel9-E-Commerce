<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        $data= __("Favoriler listeniz boş bulunmaktadır. Favori ürünlerinizi buraya ekleyebilirsiniz.");
        $name= __("User Wishlist");
        $datalist = Wishlist::with('product')->where('user_id', Auth::id());
        $datalist = $datalist->cursorPaginate(10);
        if($datalist->count()==0){
            return view('home.blank_data', ['data' => $data,'name'=>$name]);
        }
        else
            return view('home.user_wishlist', ['datalist' => $datalist]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request, $id): RedirectResponse
    {
        $data = Wishlist::where('product_id', $id)->where('user_id', Auth::id())->first();
        if ($data) {
            $message=__("ürün daha önce eklenmiştir.");
            return redirect()->back()->with('toast_info',$message );
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
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $data = Wishlist::find($id);
        $data->delete();
        $message= __( 'Product deleted from the wishlist successfully');
        return redirect()->back()->with('success', $message);
    }

}
