<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaketCategory;
use Illuminate\Http\Request;

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        echo "aa";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit(PaketCategory $paketCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PaketCategory  $paketCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaketCategory $paketCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaketCategory  $paketCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaketCategory $paketCategory)
    {
        //
    }
}
