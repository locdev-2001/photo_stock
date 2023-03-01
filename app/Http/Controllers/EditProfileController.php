<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class EditProfileController extends Controller
{
    public function edit_function($UID)
    {
        $profile = DB::select('select * from profile where UID = ?', [$UID]); //lay ra profile tuong ung trong database khi UID = UID cua tai khoan dang dang nhap
        $account = DB::select('select * from account where UID = ?', [$UID]); //lay ra account tuong ung trong database khi UID = UID cua tai khoan dang dang nhap

        return view('page.profile_edit', ['profile' => $profile], ['account' => $account]);
    }
    public function update_function(Request $request, $UID)
    {
        $name = (string)$request->input('name');
        $gender = (string)$request->input('gender');
        $address = (string)$request->input('address');
        $tel = (string)$request->input('tel');
        DB::update('UPDATE `profile` set NAME = ?, GENDER = ?, ADDRESS = ?, TEL = ? where UID = ' . $UID . '', [$name, $gender, $address, $tel, $UID]);

        return redirect('library')->with('Success', 'Data Updated');
    }
}
