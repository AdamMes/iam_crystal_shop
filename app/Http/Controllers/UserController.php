<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SigninRequest;
use App\Http\Requests\SignupRequest;
use App\User;
use Illuminate\Contracts\Session\Session;
use App\IAM;


class UserController extends MainController
{

    public function getSignin()
    {
        self::$viewData['page_title'] .= ' Signin Page';
        return view('signin', self::$viewData);
    }

    public function postSignin(SigninRequest $request)
    {
        if (User::validate($request['email'], $request['password'])) {
            $rn = !empty($request['rn']) ? $request['rn'] : '';
            return redirect($rn);
        } else {
            self::$viewData['page_title'] .= ' Signin Page';
            self::$viewData['sign_error'] = 'Wrong email or password';
            return view('signin', self::$viewData);
        }
    }

    public function logout(Request $request)
    {
        //Session::forget(['user_id', 'user_name', 'is_admin']);
        //$request->session()->forget(['user_id', 'user_name', 'is_admin']);
        $request->session()->flush();
        return redirect('user/signin');
    }

    public function getSignup(Request $request)
    {

        self::$viewData['page_title'] .= ' Signup Page';
        self::$viewData['countries'] = IAM::getCountries();
        self::$viewData['rn'] = !empty($request['rn']) ? '?rn=' . $request['rn'] : '';
        return view('signup', self::$viewData);
    }

    public function postSignup(SignupRequest $request)
    {
        User::save_new($request);
        $rn = !empty($request['rn']) ? $request['rn'] : '';
        return redirect($rn);
    }
}