<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Order;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{

    public static function countmessages()
    {
        return Message::where('user_id',Auth::id())->count();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        $datalist=Message::all();
        return view('admin.messages',['datalist'=>$datalist]);
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
     * @param Message $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Message $message
     * @param $id
     * @return Application|Factory|View
     */
    public function edit(Message $message,$id): Application|Factory|View
    {
       $data=Message::find($id);
       $data->status='Read';
       $data->save();
       return view('admin.message_edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Message $message
     * @param $id
     * @return RedirectResponse
     */
    public function update(Request $request, Message $message,$id): RedirectResponse
    {
        $data = Message::find($id);
        $data->note = $request->input('note');
        $data->status=$request->input('status');
        $data->save();
        $message1=__('Message Updated');
        return back()->with('toast_success',$message1);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Message $message
     * @param $id
     * @return RedirectResponse
     */
    public function destroy(Message $message,$id): RedirectResponse
    {
        $data = Message::find($id);
        $data->delete();
        $message1=__('Mesaj Başarıyla Silindi.');
        return redirect()->route('admin_messages')->with('toast_success', $message1);
    }
}
