<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Request\AdminLoginRequest;

class AdminLoginController extends Controller
{

    public function index()
    {
        return view('dashboard.auth.login');
    }


    public function login(AdminLoginRequest $request){

        $remember_me = $request->has('remember_me') ? true : false;

        if (auth()->guard('admin')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)){
            return redirect() -> route('dashboard.index')->with(['success', 'تم تسجيل الدخول بنجاح  ']);
        }

        return back()->with('error','هناك خطأ في البيانات!');
    }

}
