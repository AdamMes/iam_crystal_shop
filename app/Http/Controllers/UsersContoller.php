<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Session;


use App\User;
use App\Permission;
use App\IAM;

class UsersContoller extends MainController
{

    public function index()
    {
        self::$viewData['permissions'] = User::get_permission_name();
        self::$viewData['users'] = User::all()->toArray();
        return view('cms.users_index', self::$viewData);
    }


    public function create()
    {
        self::$viewData['permissions'] = Permission::all()->toArray();
        self::$viewData['countries'] = IAM::getCountries();
        return view('cms.user_add', self::$viewData);
    }


    public function store(UserRequest $request)
    {
        User::add_new_user($request);
        return redirect('cms/users');
    }


    public function show($id)
    {
        self::$viewData['user_id'] = $id;
        self::$viewData['user_name'] = User::get_name_by_id($id);
        return view('cms.user_delete', self::$viewData);
    }


    public function edit($id)
    {
        self::$viewData['item'] = User::get_user_permission($id);
        self::$viewData['permissions'] = Permission::all()->toArray();
        self::$viewData['countries'] = IAM::getCountries();
        return view('cms.user_edit', self::$viewData);
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'permission_id' => 'required',
            'name' => 'required|min:2|max:70',
            'email' => 'required|email|unique:users,email,' . $id,
            'country' => 'required',
        ]);
        User::update_user($request, $id);
        return redirect('cms/users');
    }


    public function destroy($id)
    {
        User::destroy($id);
        Session::flash('sm', 'User was deleted');
        return redirect('cms/users');
    }
}