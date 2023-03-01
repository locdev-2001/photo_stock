<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class ChangePasswordController extends Controller
{
    public function changePassword()
    {
        $account = Session::get('Account');
        $dsThongtin = DB::table('profile')->where('UID', '=', $account)->first(['UID', 'NAME', 'GENDER', 'ADDRESS', 'TEL', 'POSTED', 'FOLLOW']);
        $UID = $dsThongtin->UID;
        return view('page.change_password', compact('UID'));
    }
    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required|min:6|max:50',
            'new_password' => 'required|min:6|max:50',
            'confirm_password' => 'required|same:new_password'
        ]);

        $account = Session::get('Account');
        $dsThongtin = DB::table('profile')->where('UID', '=', $account)->first('UID');
        $UID = $dsThongtin->UID;
        $currentPassword = DB::table('account')->where('UID', $UID)->first('PASSWORD');
        $oldpassword = $request->input('old_password');

        //printf($currentPassword->PASSWORD);
        //exit();

        $new_password = $request->input('new_password');
        if (md5($oldpassword) == $currentPassword->PASSWORD) {
            DB::update('UPDATE account set PASSWORD = ? where UID = ' . $UID . '', [md5($new_password)]);

            return redirect('library')->with('Success', 'Data Updated');
        } else {
            printf('loi');
        }
    }
}
