<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InsertModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class InsertController extends Controller
{
    public function insertform()
    {
        return view('page.insert');
    }
    /*public function insert_data(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:33554432'
        ]);
        $image = $request->file('file');
        $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('/uploads');
        $image->move($destinationPath, $input['imagename']);
        $article = new InsertModel();
        $article->name = $input['imagename'];
        $article->save();
    }*/
    /*public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $request->validate(['image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:33554432']);
            $request->file->store('post', 'public');

            $post = new InsertModel;
            $post->LIBRARYID = $request->LIBRARYID;
            $post->IMAGE = $request->file->hashName();
            $post->TAG = $request->tag;
            $post->Description = $request->description;
            $post->save();
            return redirect()->action('InsertController@

    }*/
    public function store(Request $request)
    {
        //kiem tra gia tri
        $this->validate(
            $request,
            [
                'Library' => 'required',
                'tag' => 'required',
                'description' => 'required'
            ],
            [
                'Library.required' => 'Ban chua chon thu vien',
                'tag.required' => 'Ban chua nhap tag',
                'description.required' => 'Ban chua nhap mo ta'
            ]
        );
        //luu hinh khi co file hinh
        $getImage = '';
        if ($request->hasFile('image'))
        //ham kiem tra du lieu
        {
            $this->validate(
                $request,
                [
                    //Kiểm tra đúng file đuôi .jpg,.jpeg,.png.gif và dung lượng không quá 2M
                    'image' => 'mimes:jpg,jpeg,png,gif|max:30000',
                ],
                [
                    //Tùy chỉnh hiển thị thông báo không thõa điều kiện
                    'image.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
                    'image.max' => 'Hình thẻ giới hạn dung lượng không quá 2M',
                ]
            );
            //lưu file về local folder
            $image = $request->file('image');
            $getImage = $image->getClientOriginalName();
            $filePath = public_path('post\\' . $image);
            $image->move('upload', $image->getClientOriginalName());
            //@move_uploaded_file($image, $filePath);

            $account = Session::get('Account');
            $dsThongtin = DB::table('profile')->where('UID', '=', $account)->first(['UID', 'NAME', 'GENDER', 'ADDRESS', 'TEL', 'POSTED', 'FOLLOW']);
            $UID = $dsThongtin->UID;

            $dataInsert = array(
                'LIBRARYID' => $request->get('Library'),
                'IMAGE' => $getImage,
                'TAG' => $request->get('tag'),
                'UID' => $UID, //Sửa sau
                'Description' => $request->get('description')
            );

            //Insert vào bảng post
            $insertData = DB::table('post')->insert($dataInsert);
            if ($insertData) {
                return redirect()->action('LibraryController@index');
            } else {
                echo "<script type='text/javascript'>alert('That Bai');</script>";
                return redirect()->back();
            }
        }
    }
}
