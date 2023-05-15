<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Orderitem;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        $datalist = Order::all();
        return view('admin.orders', ['datalist' => $datalist]);
    }

    public function list($status): Factory|View|Application
    {
        $datalist = Order::where('status', $status)->get();
        return view('admin.orders', ['datalist' => $datalist]);
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

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Order $order
     * @return Application|Factory|View
     */
    public function show(Order $order, $id): Application|Factory|View
    {
        $data = Order::find($id);
        $datalist = Orderitem::where('order_id', $id)->get();

        return view('admin.order_items', ['data' => $data, 'datalist' => $datalist]);
    }

    public function showmodal(Order $order, $id): array
    {
        $data = Order::find($id);
        $datalist = Orderitem::where('order_id', $id)->get();

        return  ['data' => $data, 'datalist' => $datalist];
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Order $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Order $order
     * @param $id
     * @return RedirectResponse
     */
    public function update(Request $request, Order $order, $id): \Illuminate\Http\RedirectResponse
    {
        $data = Order::find($id);
        $data->status = $request->input('status');
        $data->note = $request->input('note');
        $data->save();
        $message=__('Order Updated');
        return redirect()->back()->with('success', $message);
    }

    public function itemupdate(Request $request, Order $order, $id): RedirectResponse
    {
        $data = Orderitem::find($id);
        $data->status = $request->input('status');
        $data->note = $request->input('note');
        $data->save();
        $message=__('Order Item Updated');
        return redirect()->back()->with('success', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Order $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
