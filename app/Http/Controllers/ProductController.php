<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        $datalist = Product::where('user_id',Auth::id())->get();
        //print_r($datalist);
        // exit();
        return view('home.user_product', ['datalist' => $datalist]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): Application|Factory|View
    {
        $datalist = Category::with('children')->get();
        return view('home.user_product_add', ['datalist' => $datalist]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
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
        $data->tax = $request->input('tax');
        $data->user_id = Auth::id();
        $data->image = Storage::putFile('images', $request->file('image')); //file upload
        $data->save();
        $message=__('Product Added Successfully');
        return redirect()->route('user_products')->with('success', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @return Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @return Application|Factory|View
     */
    public function edit(Product $product, $id): View|Factory|Application
    {
        $data = Product::find($id);
        $datalist = Category::with('children')->get();
        return view('home.user_product_edit', ['data' => $data, 'datalist' => $datalist]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Product $product
     * @return RedirectResponse
     */
    public function update(Request $request, Product $product, $id): RedirectResponse
    {
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
        $data->user_id = Auth::id();
        if ($request->file('image')!=null)
        {
            $data->image = Storage::putFile('images', $request->file('image')); //file upload
        }
        $data->save();
        return redirect()->route('user_products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return RedirectResponse
     */
    public function destroy(Product $product, $id): RedirectResponse
    {
        $data = Product::find($id);
        $data->delete();
        return redirect()->route('user_products');
    }
}
