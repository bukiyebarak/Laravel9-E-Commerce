<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reply;
use App\Models\Review;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $datalist = Review::all();
        return view('admin.review', ['datalist' => $datalist]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    public function reply(Request $request): RedirectResponse
    {
        $data = new Reply;
        $data->reply = $request->input('reply');
        $data->review_id = $request->input('tax');
        $data->user_id = Auth::id();
        $data->review_id = $request->input('reviewId');
        $data->IP = $request->ip();
        $data->save();
        $message=__( 'Add Reply');
        return redirect()->back()->with('success', $message);

    }

    /**
     * Display the specified resource.
     *
     * @param Review $review
     * @param $id
     * @return View|Application|Factory
     */
    public function show(Review $review, $id): Application|Factory|View
    {
        $data = Review::find($id);
        return view('admin.review_edit', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Review $review
     * @return Response
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Review $review
     * @param $id
     * @return RedirectResponse
     */
    public function update(Request $request, Review $review, $id): RedirectResponse
    {
        $data = Review::find($id);
        $data->status = $request->input('status');
        $data->save();
        $message=__('Review Updated');
        return back()->with('toast_success', $message );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Review $review
     * @param $id
     * @return RedirectResponse
     */
    public function destroy(Review $review, $id): RedirectResponse
    {
        $data = Review::find($id);
        $data->delete();
        $message=__( 'Review Deleted');
        return redirect()->back()->with('success', $message);
    }
}
