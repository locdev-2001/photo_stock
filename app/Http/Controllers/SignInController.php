<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;


class SignInController extends Controller
{
    public function index()
    {
        return view('login');
    }
    public function postLogin(Request $request)
    {
        $username = $request->username;
        $password = md5($request->password);
        $result = DB::table('account')->where('USERNAME', $username)->where('PASSWORD', $password)->first();
        if ($result) {
            Session::put('Account', $result->UID);
            return Redirect::to('/home');
        } else {
            Session::put('message', 'Ban nhap sai');
            return Redirect::to('/dangnhap');
        }
    }
    public function getInformation()
    {
        //lay thong tin cua nguoi dung
        $currentAccount = Session::get('Account');
        $dsThongtin = DB::table('profile')->where('UID', '=', $currentAccount)->first(['UID', 'NAME', 'GENDER', 'ADDRESS', 'TEL', 'POSTED', 'FOLLOW']);
        $name = $dsThongtin->NAME;
        return view('page.home', compact('name'));
    }

    public function logOut()
    {
        Session::put('Account', null);
        return view('page.home');
    }
}
