<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    //heryerden erişim sağlar. Static dışardan erişim sağlar
    protected $appends = [
        'getParentsTree',

    ];


    public static function getParentsTree($category, $title)
    {
        //recursive mantığı.Bulunca durur.
        if ($category->parent_id == 0) {
            return $title;
        }
        $parent = Category::find($category->parent_id);
        $title = $parent->title . ' / ' . $title;

        return CategoryController::getParentsTree($parent, $title);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datalist = Category::with('children')->get();
        //dd($datalist);
        //print_r($datalist);
        //exit();
        return view('admin.category', ['datalist' => $datalist]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function add()
    {
        $datalist = Category::with('children')->get();
        //dd($datalist);
        return view('admin.category_add', ['datalist' => $datalist]);
    }

    /**
     * Show the form for creating a new resource.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(CategoryRequest $request)
    {
         Category::create([
             'parent_id' => $request->input('parent_id'),
             'title' => $request->input('title'),
             'keywords' => $request->input('keywords'),
             'description' => $request->input('description'),
             'slug' => $request->input('slug'),
             'status' => $request->input('status')
        ]);

        return redirect()->route('admin_category')->with('success','Category Add Successfully' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $data = Category::find($id);
        $datalist = Category::with('children')->get();
        return view('admin.category_edit', ['data' => $data, 'datalist' => $datalist]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CategoryRequest $request, $id)
    {
        $data = Category::find($id);
        $data->parent_id = $request->input('parent_id');
        $data->title = $request->input('title');
        $data->keywords = $request->input('keywords');
        $data->description = $request->input('description');
        $data->slug = $request->input('slug');
        $data->status = $request->input('status');
        $data->save();
        return redirect()->route('admin_category')->with('success','Category Update Successfully' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        DB::table('categories')->where('id', '=', $id)->delete();
        return redirect()->route('admin_category');
    }
}
