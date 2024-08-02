<?php

namespace App\Http\Controllers\Auth;

use App\Http\Actions\AuthAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function checkLoginAdmin(Request $request, AuthAction $action)
    {
        $credentials = $request->only(['email', 'password']);
        $result = $action->checkLoginAdmin($credentials);
        if ($result) {
            return response()->json([
                'redirect' => route('dashboard.index'),
                'success' => 'تم تسجيل الدخول بنجاح'
            ]);
        } else {
            return response()->json([
                'error' => 'كلمة المرور او البريد الالكتروني خطأ'
            ]);
        }
    }
    public function checkLoginStudent(Request $request, AuthAction $action)
    {
        $credentials = $request->only(['email', 'password']);
        $result = $action->checkLoginStudent($credentials);
        if ($result) {
            return response()->json([
                'redirect' => route('dashboard.index'),
                'success' => 'تم تسجيل الدخول بنجاح'
            ]);
        } else {
            return response()->json([
                'error' => 'كلمة المرور او البريد الالكتروني خطأ'
            ]);
        }
    }

    public function getFormLoginAdmin()
    {
        if (Auth::guard('admin')->check() && Session::has('status')) {
            return redirect(route('admins.index'));
        } else {
            return view('Admin.auth.loginAdmin');
        }
    }
    public function getFormLoginStudent()
    {
        if (Auth::guard('student')->check() && Session::has('status')) {
            return redirect(route('admins.index'));
        } else {
            return view('Admin.auth.loginStudent');
        }
    }

    public function logoutAdmin()
    {
        Session::flush();
        return redirect()->route('loginFormAdmin');
    }
}
