<?php

namespace App\Http\Controllers\Auth;

use App\Http\Actions\AuthAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function checkLogin(Request $request, AuthAction $action)
    {
        $credentials = $request->only(['email', 'password']);
        $result = $action->checkLogin($credentials);
        if ($result) {
            return response()->json([
                'redirect' => route('admins.index'),
                'success' => 'تم تسجيل الدخول بنجاح'
            ]);
        } else {
            return response()->json([
                'error' => 'كلمة المرور او البريد الالكتروني خطأ'
            ]);
        }
    }

    public function getFormLogin()
    {
        if (Auth::guard('admin')->check() && Session::has('status')) {
            return redirect(route('admins.index'));
        } else {
            return view('Admin.auth.login');
        }
    }

    public function logout()
    {
        Session::flush();
        return redirect()->route('loginForm');
    }
}
