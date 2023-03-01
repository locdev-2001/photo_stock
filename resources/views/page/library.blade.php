@extends('layout')
@section('library')
<style>
    .about-section,
    .portfolio-2-section {
        background-color: black;
    }

    .about-section {
        top: 0;
        padding-top: 40px;
    }

    .profile {
        width: 100%;
    }

    .profile h4 {
        margin: 0;
    }

    .profile-info {
        display: flex;
        flex-direction: column;
        flex-wrap: wrap;
        justify-content: flex-start;
        align-items: flex-start;
        margin-top: 30px;
    }

    .profile-info p {
        margin: 5px 5px 5px 120px;
    }

    .profile-info a {
        margin: 5px 5px 5px 120px;
    }

    .control {
        color: white !important;
    }

    h6 {
        color: white !important;
    }
</style>
<section class="about-section">
    <div class="container-fluid">
        <div class="profile">
            <div class="profile-info">
                <?php

                use Illuminate\Support\Facades\Session;
                use Illuminate\Support\Facades\DB;

                $account = Session::get('Account');
                $dsThongtin = DB::table('profile')->where('UID', '=', $account)->first(['UID', 'NAME', 'GENDER', 'ADDRESS', 'TEL', 'POSTED', 'FOLLOW']);
                if ($account) {
                    echo "
                <p>Artist: $dsThongtin->NAME</p>
                <p>Gender: $dsThongtin->GENDER</p>
                <p>Address: $dsThongtin->ADDRESS</p>
                <p>Tel: $dsThongtin->TEL</p>
                <p>POSTED: $dsThongtin->POSTED</p>
                <a href='click_edit/$dsThongtin->UID' class='btn btn-success'>Edit Profile</a>
                <a href='click_edit_password/$dsThongtin->UID' class='btn btn-success'>Change Password</a>
                <a href='add_new_library' class='btn btn-success'>Add New Library</a>
                ";
                }
                ?>
            </div>
        </div>
    </div>
</section>
<!-- Portfolio section  -->
<div class="portfolio-2-section">.
    <ul class="portfolio-filter pf-2 controls">
        <li class="control" data-filter="all">All</li>
        @foreach($dsLibrary as $ds)
        <li class="control" data-filter=".library_{{$ds->LIBRARYID}}">{{$ds->LIBRARYNAME}}
            <a href="/edit-library/{{$ds->LIBRARYID}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                    <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z" />
                </svg></a>
        </li>
        @endforeach
    </ul>
    <div class="portfolio-warp">
        <div class="row portfolio-gallery m-0">

            @foreach ($dsPost as $postImage)
            <div class="mix col-lg-4 col-sm-6 p-0 library_{{$postImage->LIBRARYID}}">
                <div class="portfolio-box">
                    <a href="upload/{{$postImage->IMAGE}}" class="portfolio-item img-popup set-bg">
                        <div class="portfolio-item set-bg" data-setbg="upload/{{$postImage->IMAGE}}"></div>



                        <a href="/delete/{{$postImage->POSTID}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                            </svg></a>



                        <h6>{!!$postImage->Description!!}</h6>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="text-center">
        <button class="site-btn">Load More</button>
    </div>
</div>
<!-- Portfolio section end  -->

@endsection
