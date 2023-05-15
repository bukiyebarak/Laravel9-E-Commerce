<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\PaketCategory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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
        $lang1=Session::get('applocale');
        $lang2=config('app.locale');
        $parent = Category::find($category->parent_id);
        if ($lang1=="en" or $lang2=="en")
            $title =$parent->title_en . ' / ' . $title;
        elseif ($lang1=="tr" or $lang2=="tr")
            $title =$parent->title_tr . ' / ' . $title;

        return CategoryController::getParentsTree($parent, $title);
    }


    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        $datalist = Category::with('children')->get();
        $data=PaketCategory::all();
        //dd($datalist);
        //print_r($datalist);
        //exit();
        return view('admin.category', ['datalist' => $datalist,'data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function add(): View|Factory|Application
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
    public function create(CategoryRequest $request): \Illuminate\Http\RedirectResponse
    {
        $category = new Category();
        $category->parent_id = $request->input('parent_id');
        $category->title_tr = $request->input('title_tr');
        $category->keywords_tr = $request->input('keywords_tr');
        $category->description_tr = $request->input('description_tr');
        $category->detail_tr = $request->input('detail_tr');
        $category->title_en = $request->input('title_en');
        $category->keywords_en = $request->input('keywords_en');
        $category->description_en = $request->input('description_en');
        $category->detail_en = $request->input('detail_en');
        $category->title_tr = $request->input('title_tr');
        $category->title_tr = $request->input('title_tr');
        $category->slug = $request->input('slug');
        $category->status = $request->input('status');
        $category->save();
        $message=__('Category Add Successfully');
        return redirect()->route('admin_category')->with('success', $message);
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
     * @return Application|Factory|View
     */
    public function edit($id): View|Factory|Application
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
    public function update(CategoryRequest $request, $id): \Illuminate\Http\RedirectResponse
    {
        $category = Category::find($id);
        $category->parent_id = $request->input('parent_id');
        $category->title_tr = $request->input('title_tr');
        $category->keywords_tr = $request->input('keywords_tr');
        $category->description_tr = $request->input('description_tr');
        $category->detail_tr = $request->input('detail_tr');
        $category->title_en = $request->input('title_en');
        $category->keywords_en = $request->input('keywords_en');
        $category->description_en = $request->input('description_en');
        $category->detail_en = $request->input('detail_en');
        $category->title_tr = $request->input('title_tr');
        $category->title_tr = $request->input('title_tr');
        $category->slug = $request->input('slug');
        $category->status = $request->input('status');
        $category->save();
        $message=__('Category Update Successfully' );
        return redirect()->route('admin_category')->with('success',$message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        DB::table('categories')->where('id', '=', $id)->delete();
        $message=__('Category Deleted Successfully!');
        return redirect()->route('admin_category')->with('toast_success',$message);
    }
}
