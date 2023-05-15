<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\PaketCategory;
use App\Models\PaketProduct;
use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PaketProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        $datalist = PaketProduct::with('category')->get();
        return view('admin.product_paket', ['datalist' => $datalist]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): Application|Factory|View
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
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
        $message=__('Paket Product Add Successfully');
        return redirect()->route('admin_paket_products')->with('success',$message );
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
     * @return Application|Factory|View
     */
    public function edit(Product $product,$id): Application|Factory|View
    {
        $data = PaketProduct::find($id);
        $dataCat=PaketCategory::all();

        $datalist = Category::with('children')->get();
        return view('admin.product_paket_edit', ['data' => $data, 'datalist' => $datalist,'dataCat'=>$dataCat]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request,$id): \Illuminate\Http\RedirectResponse
    {
        $data = PaketProduct::find($id);
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
        $message=__('Paket Product Update Successfully');
        return redirect()->route('admin_paket_products')->with('success',$message );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Product $product,$id): \Illuminate\Http\RedirectResponse
    {
        $data = PaketProduct::find($id);
        $data->delete();
        $message=__('Paket Product is Deleted.');
        return redirect()->route('admin_paket_products')->with('toast_success', $message);
    }
}
