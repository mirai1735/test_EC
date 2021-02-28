<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    // ログイン画面
    public function login_form() {
        return view('user.login');
    }

    // ログイン処理
    public function login(UserRequest $request) {
        $inputs = $request->all();

        $login_id = $inputs['LOGIN_ID'];
        $password = $inputs['PASSWORD'];

        ver_dump($inputs);
        exit;

        redirect(route('blogs'));
    }
}
