<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Psy\Util\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $datalist = Product::with('category')->get();
        return view('admin.product', ['datalist' => $datalist]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        $datalist = Category::with('children')->get();
        return view('admin.product_add', ['datalist' => $datalist]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductRequest $request
     * @return RedirectResponse
     */
    public function store(ProductRequest $request): RedirectResponse
    {
        $price = $request->get('price');
        $sale = $request->get('sale');
        $salee = $price * $sale;
        $totalsale = $salee / 100;
        $totalsale = $price - $totalsale;

        $data = new Product;
        $data->keywords_tr = $request->input('keywords_tr');
        $data->title_tr = $request->input('title_tr');
        $data->description_tr = $request->input('description_tr');
        $data->detail_tr = $request->input('detail_tr');
        $data->keywords_en = $request->input('keywords_en');
        $data->title_en = $request->input('title_en');
        $data->description_en = $request->input('description_en');
        $data->detail_en = $request->input('detail_en');
        $data->slug = $request->input('slug');
        $data->status = $request->input('status');
        $data->category_id = $request->input('category_id');
        $data->price = $request->input('price');
        $data->quantity = $request->input('quantity');
        $data->minquantity = $request->input('minquantity');
        $data->is_sale = $request->input('is_sale');
        $data->sale = $request->input('sale');

        if ($request->input('is_sale') == "Yes") {
            $data->sale_price = $totalsale;
        } else
            $data->sale_price = $request->input('price');
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
     * @param Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Product::class, 'slug', $request->title_tr);
        return response()->json(['slug' => $slug]);
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
        return view('admin.product_edit', ['data' => $data, 'datalist' => $datalist]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'title_tr' => 'required|min:3',
            'keywords_tr' => 'required|min:3|max:60',
            'description_tr' => 'required|min:5|max:100',
            'detail_tr' => 'required|min:5',
            'title_en' => 'required|min:3',
            'keywords_en' => 'required|min:3|max:60',
            'description_en' => 'required|min:5|max:100',
            'detail_en' => 'required|min:5',
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
        $data->keywords_tr = $request->input('keywords_tr');
        $data->title_tr = $request->input('title_tr');
        $data->description_tr = $request->input('description_tr');
        $data->detail_tr = $request->input('detail_tr');
        $data->keywords_en = $request->input('keywords_en');
        $data->title_en = $request->input('title_en');
        $data->description_en = $request->input('description_en');
        $data->detail_en = $request->input('detail_en');
        $data->slug = $request->input('slug');
        $data->status = $request->input('status');
        $data->category_id = $request->input('category_id');
        $data->price = $request->input('price');
        $data->quantity = $request->input('quantity');
        $data->minquantity = $request->input('minquantity');
        $data->tax = (int)$request->input('tax');
        $data->is_sale = $request->input('is_sale');
        $data->sale = $request->input('sale');
        if ($request->input('is_sale') == "Yes") {
            $data->sale_price = $totalsale;
        } else
            $data->sale_price = $request->input('price');
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
        $message = __('Product Update Successfully');
        return redirect()->route('admin_products')->with('success', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @param $id
     * @return RedirectResponse
     */
    public function destroy(Product $product, $id): RedirectResponse
    {
        $data = Product::find($id);
        $data->delete();
        $message = __('Product is Deleted.');
        return redirect()->route('admin_products')->with('toast_success', $message);
    }
}
