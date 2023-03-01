<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class LibraryController extends Controller
{
    public function index()
    {
        $account = Session::get('Account');
        $dsThongtin = DB::table('profile')->where('UID', '=', $account)->first(['UID', 'NAME', 'GENDER', 'ADDRESS', 'TEL', 'POSTED', 'FOLLOW']);
        $UID = $dsThongtin->UID;
        $dsPost = DB::table('post')->select('POSTID', 'LIBRARYID', 'IMAGE', 'Description')->where('UID', $UID)->get();

        $dsLibrary = DB::table('library')->select('LIBRARYID', 'LIBRARYNAME')->where('UID', $UID)->get();

        return view('page.library', compact('dsPost', 'dsLibrary'));
    }

    public function create()
    {
        $account = Session::get('Account');
        $dsThongtin = DB::table('profile')->where('UID', '=', $account)->first(['UID', 'NAME', 'GENDER', 'ADDRESS', 'TEL', 'POSTED', 'FOLLOW']);
        $UID = $dsThongtin->UID;
        //lay danh sach cac thu vien
        $dsLibrary = DB::table('library')->select('LIBRARYID', 'LIBRARYNAME')->where('UID', $UID)->get();
        return view('page.insert', compact('dsLibrary'));
    }
    /*
    public function store(Request $request)
    {
        $library = new Library;
        $library->library_name = $request->library_name;
        $library->uid = $request->uid;
    }*/
    public function AddForm()
    {
        return view('page.add_new_library');
    }
    public function UpdateLibrary(Request $request)
    {
        $account = Session::get('Account');
        $dsThongtin = DB::table('profile')->where('UID', '=', $account)->first(['UID', 'NAME', 'GENDER', 'ADDRESS', 'TEL', 'POSTED', 'FOLLOW']);
        $UID = $dsThongtin->UID;

        $LIBRARYNAME = $request->input('library-name');
        $dataInsert = array(
            'LIBRARYNAME' => $LIBRARYNAME,
            'UID' => $UID,
        );
        $insertData = DB::table('library')->insert($dataInsert);
        if ($insertData) {
            echo "<script type='text/javascript'>alert('Thanh cong');</script>";
            return redirect()->action('LibraryController@index');
        } else {
            echo "<script type='text/javascript'>alert('That bai');</script>";
            return redirect()->action('LibraryController@AddForm');
        }
    }
    public function deletePicture($POSTID)
    {
        $fileName = DB::table('post')->where('POSTID', '=', $POSTID)->first('IMAGE')->IMAGE;
        unlink('upload/' . $fileName);
        DB::table('post')->where('POSTID', $POSTID)->delete();
        return redirect()->action('LibraryController@index');
    }
    public function editLibraryForm($LIBRARYID)
    {
        $inforLibrary = DB::table('library')->where('LIBRARYID', $LIBRARYID)->first(['LIBRARYID', 'LIBRARYNAME', 'UID']);
        return view('page.edit_library', compact('inforLibrary'));
    }

    public function editLibrary(Request $request, $LIBRARYID)
    {
        $newLibraryName = $request->input('libraryName');
        DB::table('library')->where('LIBRARYID', $LIBRARYID)->update(['LIBRARYNAME' => $newLibraryName]);
        return redirect('/library');
    }

    public function deleteLibrary($LIBRARYID)
    {
        DB::table('post')->where('LIBRARYID', $LIBRARYID)->delete();
        DB::table('library')->where('LIBRARYID', $LIBRARYID)->delete();
        return redirect('/library');
    }

    public function updateClick(Request $request)
    {
        $postid = $request->postID;
        $clicked = DB::table('post')->where('POSTID', $postid)->first('CLICKED')->CLICKED;
        $clickedNew = (int)$clicked + 1;
        DB::table('post')->where('POSTID', $postid)->update(['CLICKED' => $clickedNew]);
    }
}
