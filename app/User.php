<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Crypt;

class User extends Model
{
    static public function validate($email, $password)
    {
        $valid = false;

        $user = DB::table('users as u')
            ->join('user_permission as up', 'u.id', '=', 'up.uid')
            ->join('permissions as p', 'p.id', '=', 'up.pid')
            ->select('u.*', 'p.pname', 'up.pid')
            ->where('u.email', '=', $email)
            ->first();

        if ($user) {

            if (Hash::check($password, $user->password)) {

                $valid = true;
                Session::put('user_name', $user->name);
                Session::put('user_id', $user->id);
                Session::flash('sm', "Wellcome back $user->name");

                if ($user->pname == 'Admin') {
                    Session::put('is_admin', true);
                }
            }
        }
        return $valid;
    }

    static public function save_new($request)
    {
        $user = new self();
        $user->name = ucwords(strtolower($request['name']));
        $user->email = strtolower($request['email']);
        $user->password = bcrypt($request['password']);
        $user->country = $request['country'];
        $user->save();
        DB::table('user_permission')->insert(
            ['uid' => $user->id, 'pid' => $request['permission_id'] ?? 2]
        );

        Session::put('user_name', $user->name);
        Session::put('user_id', $user->id);
        Session::flash('sm', "Wellcome $user->name, you are signup");
    }

    static public function get_name_by_id($id)
    {

        $user_name = DB::table('users as u')
            ->select('u.name')
            ->where('u.id', '=', $id)
            ->first();

        return $user_name;
    }

    //CMS

    static public function add_new_user($request)
    {
        $user = new self();
        $user->name = ucwords(strtolower($request['name']));
        $user->email = strtolower($request['email']);
        $user->password = bcrypt($request['password']);
        $user->country = $request['country'];
        $user->save();
        DB::table('user_permission')->insert(
            ['uid' => $user->id, 'pid' => $request['permission_id'] ?? 2]
        );

        Session::flash('sm', "New user was created");
    }

    static public function get_permission_name()
    {
        $permmision_name = DB::table('users as u')
            ->join('user_permission as up', 'u.id', '=', 'up.uid')
            ->join('permissions as p', 'p.id', '=', 'up.pid')
            ->select('p.pname', 'p.id', 'up.uid', 'up.pid')
            ->get()->toArray();


        return $permmision_name;
    }

    static public function get_user_permission($id)
    {
        $user = DB::table('users as u')
            ->join('user_permission as up', 'up.uid', '=', 'u.id')
            ->join('permissions as p', 'p.id', '=', 'up.pid')
            ->select('u.*', 'p.pname')
            ->where('u.id', '=', $id)
            ->first();

        return $user;
    }

    static public function update_user($request, $id)
    {

        $user =  self::find($id);
        $user->name = ucwords(strtolower($request['name']));
        $user->email = strtolower($request['email']);
        $user->country = $request['country'];
        $user->save();
        DB::table('user_permission')
            ->where('uid', '=', $id)
            ->update(
                ['pid' => $request['permission_id']]
            );

        Session::flash('sm', "User was updated");
    }
}