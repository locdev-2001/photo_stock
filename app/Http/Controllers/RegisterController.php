<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }
    /////////////////////////////////////////
    public function postRegister(Request $request)
    {
        $dataInsertProfile = array(
            'NAME' => $request->get('name'),
            'GENDER' => $request->get('gender'),
            'ADDRESS' => $request->get('address'),
            'TEL' => $request->get('tel'),
        );
        //Insert vào bảng profile
        $insertProfile = DB::table('profile')->insert($dataInsertProfile);
        // lay ra uid moi duoc them vao
        $uidProfile = DB::table('profile')->max('UID');
        //lay du lieu cua password da nhap
        $password = $request->get('password');
        $dataInsertAccount = array(
            'UID' => $uidProfile,
            'USERNAME' => $request->get('username'),
            'PASSWORD' => md5($password), //insert vao with md5
        );
        $insertAccount = DB::table('account')->insert($dataInsertAccount);
        if ($insertProfile && $insertAccount) {
            echo "<script type='text/javascript'>alert('Thanh cong');</script>";
            return redirect()->action('SignInController@index');
        } else {
            echo "<script type='text/javascript'>alert('Dang ky that bai');</script>";
            return redirect()->action('RegisterController@index');
        }
    }
    ///////////////////////////////////////////
}
