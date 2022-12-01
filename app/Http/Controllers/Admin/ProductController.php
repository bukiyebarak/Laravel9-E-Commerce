<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $datalist = Product::with('category')->get();

        return view('admin.product', ['datalist' => $datalist]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $datalist = Category::with('children')->get();
        return view('admin.product_add', ['datalist' => $datalist]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProductRequest $request)
    {
        $price = $request->get('price');
        $sale = $request->get('sale');
        $salee = $price * $sale;
        $totalsale = $salee / 100;
        $totalsale = $price - $totalsale;

        $data = new Product;
        $data->keywords = $request->input('keywords');
        $data->title = $request->input('title');
        $data->description = $request->input('description');
        $data->slug = $request->input('slug');
        $data->status = $request->input('status');
        $data->category_id = $request->input('category_id');
        $data->detail = $request->input('detail');
        $data->price = $request->input('price');
        $data->quantity = $request->input('quantity');
        $data->minquantity = $request->input('minquantity');
        $data->is_sale = $request->input('is_sale');
        $data->sale = $request->input('sale');
        $data->sale_price = $totalsale;

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


        return redirect()->route('admin_products')->with('success', 'Product Add Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Product $product, $id)
    {
        $data = Product::find($id);
        $datalist = Category::with('children')->get();
        return view('admin.product_edit', ['data' => $data, 'datalist' => $datalist]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|min:3',
            'keywords' => 'required|min:3|max:60',
            'description' => 'required|min:5|max:100',
            'detail' => 'required|min:5',
            'price' => 'required|min:0',
            'quantity' => 'required|numeric|min:1',
            'minquantity' => 'required|numeric|min:1',
            'tax' => 'required|numeric|min:0',
            'slug' => 'required',
            'sale' => 'required_if:is_sale,Yes',
            'is_sale' => 'nullable',
        ]);

        $price = $request->get('price');
        $sale = $request->get('sale');
        $salee = $price * $sale;
        $totalsale = $salee / 100;
        $totalsale = $price - $totalsale;

//        dd($price,$sale,$totalsale);
        $data = Product::find($id);

        $data->keywords = $request->input('keywords');
        $data->title = $request->input('title');
        $data->description = $request->input('description');
        $data->slug = $request->input('slug');
        $data->status = $request->input('status');
        $data->category_id = $request->input('category_id');
        $data->detail = $request->input('detail');
        $data->price = $request->input('price');
        $data->quantity = $request->input('quantity');
        $data->minquantity = $request->input('minquantity');
        $data->tax = (int)$request->input('tax');
        $data->is_sale = $request->input('is_sale');
        $data->sale = $request->input('sale');
        $data->sale_price = $totalsale;
        $data->user_id = Auth::id();
        if ($request->hasFile('image')) {
            $destination = 'images/' . $data->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('images', $filename);
            $data->image = $filename;
        }
        $data->save();
        return redirect()->route('admin_products')->with('success', 'Product Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Product $product, $id)
    {
        $data = Product::find($id);
        $data->delete();
        return redirect()->route('admin_products')->with('toast_success', 'Product is Deleted.');
    }
}
