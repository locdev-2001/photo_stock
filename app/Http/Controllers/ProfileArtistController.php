<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;

class ProfileArtistController extends Controller
{
    public function index($UID)
    {
        $dsThongtin = DB::table('profile')->where('UID', $UID)->first();
        $dsLibrary = DB::table('library')->where('UID', $UID)->get();
        $dsPost = DB::table('post')->where('UID', $UID)->get();


        //$result = compact('dsThongtin', 'dsLibrary');
        //print_r($result);
        //exit();

        return view('page.profile_artist', compact('dsThongtin', 'dsLibrary', 'dsPost'));
    }
}
