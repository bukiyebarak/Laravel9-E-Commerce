<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\PaketCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryPaketController extends Controller
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


    public function create()
    {
        $datalist = Category::where('parent_id','=',0)->with('children')->get();
//        dd($datalist);
        return view('admin.category_paket_add', ['datalist' => $datalist]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        PaketCategory::create([
            'title' => $request->input('title'),
            'keywords' => $request->input('keywords'),
            'description' => $request->input('description'),
            'slug' => $request->input('slug'),
            'status' => $request->input('status')
        ]);

        return redirect()->route('admin_category')->with('success','Category Add Successfully' );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaketCategory  $paketCategory
     * @return \Illuminate\Http\Response
     */
    public function show(PaketCategory $paketCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaketCategory  $paketCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(PaketCategory $paketCategory,$id)
    {
        $data = PaketCategory::find($id);
        return view('admin.category_paket_edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PaketCategory  $paketCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaketCategory $paketCategory,$id)
    {
        $data = PaketCategory::find($id);
        $data->title = $request->input('title');
        $data->keywords = $request->input('keywords');
        $data->description = $request->input('description');
        $data->slug = $request->input('slug');
        $data->status = $request->input('status');
        $data->save();
        return redirect()->route('admin_category')->with('success','Paket Category Update Successfully' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaketCategory  $paketCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaketCategory $paketCategory,$id)
    {
        DB::table('paket_categories')->where('id', '=', $id)->delete();
        return redirect()->route('admin_category')->with('toast_success','Paket Category Deleted Successfully!');
    }
}
