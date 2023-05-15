<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImageAddRequest;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImageController extends Controller
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
     * @param $product_id
     * @return Application|Factory|View
     */
    public function create($product_id): Application|Factory|View
    {
        $data = Product::find($product_id);
        $images=DB::table('images')->where('product_id','=', $product_id)->get();
        return view('admin.modal.image_add',['data'=>$data],['images'=>$images]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ImageAddRequest $request
     * @param $product_id
     * @return RedirectResponse
     */
    public function store(ImageAddRequest $request,$product_id): RedirectResponse
    {
        $data = new Image;
        $data->title = $request->input('title');

        if($request->hasfile('image')){

            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $filename= time().'.'.$extension;
            $file->move('images',$filename);
            $data->image=$filename;
        }
        $data->product_id =$product_id;

        $data->save();
    //    return view('admin.modal.image_add',['product_id'=>$product_id]);
        $message=__('Product Image added Successfully.');
        return redirect()->route('admin_products')->with('success', $message);
//        return redirect()->route('admin_image_add',['product_id'=>$product_id])->with('toast_success','Product Image Added Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param Image $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Image $image
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Image $image
     * @param $id
     * @param $product_id
     * @return RedirectResponse
     */
    public function destroy(Image $image,$id,$product_id): RedirectResponse
    {
        $data = Image::find($id);
        $data->delete();
        $message=__('Product Image Deleted Successfully.');
        return redirect()->route('admin_products')->with('toast_success',$message);
//        return redirect()->route('admin_image_add',['product_id'=>$product_id])->with('toast_success','Product Image Deleted Successfully.');
        //birinci id ürünü silmek için ikinci id sayfaya geri dönmek için
    }
}
