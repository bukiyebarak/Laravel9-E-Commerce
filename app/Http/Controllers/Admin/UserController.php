<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        $datalist=User::all();
        return view('admin.user',['datalist'=>$datalist]);
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
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @param $id
     * @return Application|Factory|View
     */
    public function show(User $user,$id): Application|Factory|View
    {
        $data = User::find($id);
        $datalist= Role::all()->sortBy('name');
        return view('admin.user_show', ['data'=>$data,'datalist'=>$datalist]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @param $id
     * @return Application|Factory|View
     */
    public function edit(User $user,$id): Application|Factory|View
    {
        $data = User::find($id);
        return view('admin.user_edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserRequest $request
     * @param User $user
     * @param $id
     * @return RedirectResponse
     */
    public function update(UserRequest $request, User $user,$id): RedirectResponse
    {
        $data = User::find($id);
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->phone = $request->input('phone');
        $data->address = $request->input('address');
        $data->save();
        $message=__('User Information Updated');
        return redirect()->route('admin_users')->with('success',$message);
    }
    public function user_roles(User $user, $id): Factory|View|Application
    {
        $data=User::find($id);
        $datalist= Role::all()->sortBy('name');
        return view('admin.user_role', ['data'=>$data,'datalist'=>$datalist]);
    }

    public function user_role_store(Request $request,User $user, $id): RedirectResponse
    {
        $user=User::find($id);
        $roleid=$request->input('roleid');
        $user->roles()->attach($roleid); #Many to Many ilişkisine veri ekler
        return redirect()->back()->with('success','Role added to user');
    }

    public function user_role_delete(Request $request,User $user, $userid,$roleid): RedirectResponse
    {
        $user=User::find($userid);
        $user->roles()->detach($roleid); #Many to Many ilişkisinden verilen rolu siler
        return redirect()->back()->with('success','Role deleted from user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @param $id
     * @return RedirectResponse
     */
    public function destroy(User $user,$id): RedirectResponse
    {
        $data = User::find($id);
        $data->delete();
        $message=__('User Deleted');
        return redirect()->back()->with('toast_success',$message );
    }
}
