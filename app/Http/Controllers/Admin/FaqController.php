<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FaqRequest;
use App\Models\Faq;
use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        $datalist = Faq::all();

        return view('admin.faq', ['datalist' => $datalist]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): Application|Factory|View
    {
        return view('admin.faq_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(FaqRequest $request): \Illuminate\Http\RedirectResponse
    {
        $data = new Faq;
        $data->question = $request->input('question');
        $data->answer = $request->input('answer');
        $data->status = $request->input('status');
        $data->save();
        $message=__('FAQ Saved Successfully' );
        return redirect()->route('admin_faq')->with('success', $message);
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
        $data = Faq::find($id);
        return view('admin.faq_edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(FaqRequest $request, Product $product,$id): \Illuminate\Http\RedirectResponse
    {
        $data = Faq::find($id);
        $data->question = $request->input('question');
        $data->answer = $request->input('answer');
        $data->status = $request->input('status');
        $data->save();
        $message=__('FAQ Uptaded Successfully');
        return redirect()->route('admin_faq')->with('success', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Product $product,$id): \Illuminate\Http\RedirectResponse
    {
        $data = Faq::find($id);
        $data->delete();
        $message=__('FAQ Deleted Successfully');
        return redirect()->route('admin_faq')->with('toast_success',$message );
    }
}
