<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\PaketCategory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryPaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        $datalist=PaketCategory::all();
        //dd($datalist);
        //print_r($datalist);
        //exit();
        return view('admin.category_paket', ['datalist' => $datalist]);
    }
    public function create(): Factory|View|Application
    {
        $datalist = Category::where('parent_id','=',0)->with('children')->get();
//        dd($datalist);
        return view('admin.category_paket_add', ['datalist' => $datalist]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        PaketCategory::create([
            'title' => $request->input('title'),
            'keywords' => $request->input('keywords'),
            'description' => $request->input('description'),
            'slug' => $request->input('slug'),
            'status' => $request->input('status')
        ]);
        $message=__('Paket Category Add Successfully' );
        return redirect()->route('admin_category_paket')->with('success',$message);
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
     * @param PaketCategory $paketCategory
     * @param $id
     * @return Application|Factory|View
     */
    public function edit(PaketCategory $paketCategory,$id): Application|Factory|View
    {
        $data = PaketCategory::find($id);
        return view('admin.category_paket_edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param PaketCategory $paketCategory
     * @param $id
     * @return RedirectResponse
     */
    public function update(Request $request, PaketCategory $paketCategory,$id): \Illuminate\Http\RedirectResponse
    {
        $data = PaketCategory::find($id);
        $data->title = $request->input('title');
        $data->keywords = $request->input('keywords');
        $data->description = $request->input('description');
        $data->slug = $request->input('slug');
        $data->status = $request->input('status');
        $data->save();
        $message= __('Paket Category Update Successfully');
        return redirect()->route('admin_category_paket')->with('success', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param PaketCategory $paketCategory
     * @param $id
     * @return RedirectResponse
     */
    public function destroy(PaketCategory $paketCategory,$id): \Illuminate\Http\RedirectResponse
    {
        DB::table('paket_categories')->where('id', '=', $id)->delete();
        $message=__('Paket Category Deleted Successfully!');
        return redirect()->route('admin_category_paket')->with('toast_success',$message);
    }
}
