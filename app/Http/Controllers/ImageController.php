<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create($product_id): Application|Factory|View
    {
        $data = Product::find($product_id);
        $images=DB::table('images')->where('product_id','=', $product_id)->get();
        return view('home.user_product_image_add',['data'=>$data],['images'=>$images]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request,$product_id): RedirectResponse
    {
        $data = new Image;
        $data->title = $request->input('title');
        $data->image = Storage::putFile('images', $request->file('image')); //file upload
        $data->product_id =$product_id;
        $data->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param Image $image
     * @return Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Image $image
     * @return Response
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param Image $image
     * @return Response
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Image $image
     * @return RedirectResponse
     */
    public function destroy(Image $image,$id,$product_id): RedirectResponse
    {
        $data = Image::find($id);
        $data->delete();
        return redirect()->back();
    }
}
