<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datalist=User::all();
        return view('admin.user',['datalist'=>$datalist]);
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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user,$id)
    {
        $data = User::find($id);
        $datalist= Role::all()->sortBy('name');
        return view('admin.user_show', ['data'=>$data,'datalist'=>$datalist]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user,$id)
    {
        $data = User::find($id);

        return view('admin.user_edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user,$id)
    {
        $data = User::find($id);
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->phone = $request->input('phone');
        $data->address = $request->input('address');
//
//        if ($request->hasFile('image'))
//        {
//            $destination='images/profile'.$data->image;
//            if(File::exists($destination)){
//                File::delete($destination);
//            }
//
//            $file=$request->file('image');
//            $extension=$file->getClientOriginalExtension();
//            $filename= time().'.'.$extension;
//            $file->move('images',$filename);
//            $data->image=$filename;
//        }
//        if ($request->file('image')!=null)
//        {
//            $file=$request->file('image');
//            $extension=$file->getClientOriginalExtension();
//            $filename= time().'.'.$extension;
//            $file->move('images/profile',$filename);
//            $data->profile_photo_path =$filename;//file upload
//        }
        $data->save();
        return redirect()->route('admin_users')->with('success','User Information Updated');
    }
    public function user_roles(User $user, $id)
    {
        $data=User::find($id);
        $datalist= Role::all()->sortBy('name');
        return view('admin.user_role', ['data'=>$data,'datalist'=>$datalist]);
    }

    public function user_role_store(Request $request,User $user, $id)
    {
        $user=User::find($id);
        $roleid=$request->input('roleid');
        $user->roles()->attach($roleid); #Many to Many ilişkisine veri ekler
        return redirect()->back()->with('success','Role added to user');
    }

    public function user_role_delete(Request $request,User $user, $userid,$roleid)
    {
        $user=User::find($userid);
        $user->roles()->detach($roleid); #Many to Many ilişkisinden verilen rolu siler
        return redirect()->back()->with('success','Role deleted from user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user,$id)
    {
        $data = User::find($id);
        $data->delete();
        return redirect()->back()->with('toast_success', 'User Deleted');
    }
}
