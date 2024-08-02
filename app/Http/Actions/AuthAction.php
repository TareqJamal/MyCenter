<?php

namespace App\Http\Actions;

use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthAction
{
    public function checkLoginAdmin($credentials)
    {
        if (Auth::guard('admin')->attempt($credentials)) {
            Session::put('status', true);
            return true;
        } else {
            return false;
        }
    }
    public function checkLoginStudent($credentials)
    {
        if (Auth::guard('student')->attempt($credentials)) {
            Session::put('status', true);
            return true;
        } else {
            return false;
        }
    }

}
