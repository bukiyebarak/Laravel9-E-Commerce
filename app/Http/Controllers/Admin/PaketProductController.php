<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\PaketCategory;
use App\Models\PaketProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaketProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datalist = Category::with('children')->get();
        $data=PaketCategory::all();
       // dd($datalist);
        return view('admin.product_paket_add', ['datalist' => $datalist,'data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

//        $sale = $request->get('sale');
//        $salee = $price * $sale;
//        $totalsale = $salee / 100;
//        $totalsale = $price - $totalsale;

        $data = new PaketProduct;
        $data->keywords = $request->input('keywords');
        $data->paket_category_id=$request->input('paket_category_id');
        $data->title = $request->input('title');
        $data->description = $request->input('description');
        $data->slug = $request->input('slug');
        $data->status = $request->input('status');
        $data->category_id = $request->input('category_id');
        $data->detail = $request->input('detail');
        $data->price = $request->input('price');
        $data->quantity = $request->input('quantity');
        $data->price = $request->get('price');
//        $data->is_sale = $request->input('is_sale');
//        $data->sale = $request->input('sale');
//
//        if ( $request->input('is_sale')=="Yes"){
//            $data->sale_price = $totalsale;
//        }
//        else
//            $data->sale_price =$request->input('price') ;

        $data->tax = $request->input('tax');
        $data->user_id = Auth::id();

        if ($request->hasfile('image')) {

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('images', $filename);
            $data->image = $filename;
        }
        //$data->image = Storage::putFile('images', $request->file('image')); //file upload

        $data->save();

        return redirect()->route('admin_products')->with('success', 'Paket Product Add Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $data=Product::find($id);
        $quantity=$request->input('quantity');
        $price=$data->price;
        $total=$quantity*$price;
//        dd($data, $price,$total);
//        return view('home.paket_product_detail',compact($total));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
