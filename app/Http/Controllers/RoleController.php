<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Role;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $datalist = Role::all();
        return view('admin.role', compact('datalist',));
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'role' => [
                'required',
                'min:3',
                'max:15',
                Rule::unique('roles', 'name'),
            ],
        ], [
            'role.min' => __("Rol minimum 3 karakterden oluşmalıdır."),
            'role.required' => __("Rol İsmi girilmesi zorunludur."),
            'role.max' => __("Rol maksimum 15 karakterden oluşmalıdır."),
            'role.unique' => __("Rol ismi eşsiz olmalıdır."),
        ], [
            'role' => __('Bu Rol'),
        ]);

        if ($validator->fails()) {
            // Handle validation error
            return back()->withErrors($validator->errors())->withInput();
        } else {
            // Create a new record in the database
            $data = new Role;
            $data->name = $request->input('role');
            $data->save();
            $message = __('Rol  ') . $data->name . __(' başarılı bir şekilde eklendi.');
            return redirect()->back()->with('toast_success', $message);;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Role $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Role $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Role $role
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Role $role, $id): \Illuminate\Http\RedirectResponse
    {
        $name = $request->input('name');
        $validator = Validator::make($request->all(), [
            'role' => [
                'required',
                'min:3',
                'max:15',
                Rule::unique('roles', 'name'),
            ],
        ], [
            'role.min' => __("Rol minimum 3 karakterden oluşmalıdır."),
            'role.required' => __("Rol İsmi girilmesi zorunludur."),
            'role.max' => __("Rol maksimum 15 karakterden oluşmalıdır."),
            'role.unique'=>__("Rol ismi eşsiz olmalıdır."),
        ], [
        'role' => __('Bu Rol'),
    ]);
        if ($validator->fails()) {
            // Handle validation error
            return back()->withErrors($validator->errors())->withInput();
        } else {
            // Create a new record in the database
            $data = Role::findOrFail($id);
            $data->name = $name;
            $data->save();
            $message = __('Rol  ') . $data->name . __(' başarılı bir şekilde güncellendi.');
            return redirect()->back()->with('toast_success', $message);;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Role $role
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Role $role, $id): \Illuminate\Http\RedirectResponse
    {
        // Get the role to be deleted
        $role = Role::findOrFail($id);

        // Remove the role from all users who are currently assigned to it
        $users = $role->users;
        foreach ($users as $user) {
            $user->roles()->detach($role->id);
        }
        // Delete the role itself
        $role->delete();

        // Redirect the user to the roles index page with a success message
        $message = __('Rol  ') . $role->name . __(' başarılı bir şekilde silindi.');
        return redirect()->back()->with('toast_success', $message);
    }
}
