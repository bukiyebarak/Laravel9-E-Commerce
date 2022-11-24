<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reply;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datalist = Review::all();
        return view('admin.review', ['datalist' => $datalist]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

    public function reply(Request $request)
    {
        $data = new Reply;
        $data->reply = $request->input('reply');
        $data->review_id = $request->input('tax');
        $data->user_id = Auth::id();
        $data->review_id = $request->input('reviewId');
        $data->IP = $request->ip();

        $data->save();
        return redirect()->back()->with('success', 'Add Reply');

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Review $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review, $id)
    {
        $data = Review::find($id);
        return view('admin.review_edit', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Review $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Review $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review, $id)
    {
        $data = Review::find($id);
        $data->status = $request->input('status');
        $data->save();
        return back()->with('success', 'Review Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Review $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review, $id)
    {
        $data = Review::find($id);
        $data->delete();
        return redirect()->back()->with('success', 'Review Deleted');
    }
}
