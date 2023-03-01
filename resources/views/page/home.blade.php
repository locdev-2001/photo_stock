@extends('layout')
@section('content')
<!-- Hero section  -->
<?php

use Illuminate\Support\Facades\DB;


$postImage = DB::select('SELECT * FROM `post`');
$postImage2 = DB::select('SELECT * FROM `post` ORDER BY RAND()');
$postImage3 = DB::select('SELECT * FROM `post`  ORDER BY RAND()');
$postPaginate = DB::table('post')->paginate(18);

?>
<div class="hero-section">
    <div class="hero-slider owl-carousel">
        @foreach($postImage as $post)
        <form>
            {{csrf_field()}}
            <div class="hero-item portfolio-item set-bg popup_click" data-setbg="upload/{{$post->IMAGE}}" data-id_image="{{$post -> POSTID}}">
                <a href="upload/{{$post->IMAGE}}" class="hero-link set-bg img-popup" onclick="updateClick('{{$post->POSTID}}')">
                    <h2>Take a look at my Portfolio</h2>
                    <script>
                        function updateClick(id) {
                            var xmlhttp = new XMLHttpRequest();
                            xmlhttp.onreadystatechange = function() {
                                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {}
                            };
                            xmlhttp.open("GET", "updateClicked.php?id=" + id, true);
                            xmlhttp.send();
                        }
                    </script>


                </a>
            </div>
        </form>
        @endforeach
    </div>
    <div class="hero-slider owl-carousel">
        @foreach($postImage2 as $post)
        <div class="hero-item portfolio-item set-bg popup_click" data-setbg="upload/{{$post->IMAGE}}" data-id_image="{{$post -> POSTID}}">
            <a href="upload/{{$post->IMAGE}}" class="hero-link set-bg img-popup" onclick="updateClick('{{$post->POSTID}}')">
                <h2>Take a look at my Portfolio</h2>
                <script>
                    function updateClick(id) {
                        var xmlhttp = new XMLHttpRequest();
                        xmlhttp.onreadystatechange = function() {
                            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {}
                        };
                        xmlhttp.open("GET", "updateClicked.php?id=" + id, true);
                        xmlhttp.send();
                    }
                </script>
            </a>
        </div>
        </form>
        @endforeach
    </div>
    <div class="hero-slider owl-carousel">
        @foreach($postImage3 as $post)
        <div class="hero-item portfolio-item set-bg popup_click" data-setbg="upload/{{$post->IMAGE}}" data-id_image="{{$post -> POSTID}}">
            <a href="upload/{{$post->IMAGE}}" class="hero-link set-bg img-popup" onclick="updateClick('{{$post->POSTID}}')">
                <h2>Take a look at my Portfolio</h2>
                <script>
                    function updateClick(id) {
                        var xmlhttp = new XMLHttpRequest();
                        xmlhttp.onreadystatechange = function() {
                            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {}
                        };
                        xmlhttp.open("GET", "updateClicked.php?id=" + id, true);
                        xmlhttp.send();
                    }
                </script>


            </a>
        </div>
        </form>
        @endforeach
    </div>
    <div class="hero-social-links">
        <a href=""><i class="fa fa-pinterest"></i></a>
        <a href=""><i class="fa fa-facebook"></i></a>
        <a href=""><i class="fa fa-twitter"></i></a>
        <a href=""><i class="fa fa-dribbble"></i></a>
        <a href=""><i class="fa fa-behance"></i></a>
    </div>
</div>
<!-- Hero section end  -->

<!--this is wallpaper show list-->
<section class="intro-section">
    <div class="intro-warp">
        <!--slide-show-tag-->
        <div class="container-fluid">
            <div class="title-section">
                <h2>Most Popular</h2>
            </div>
            <div class="row">
                @foreach($postPaginate as $post)
                <div class="col-lg-2" style="margin-bottom:100px">
                    <div class="hero-item portfolio-item set-bg" data-setbg="upload/{{$post->IMAGE}}" data-id_image="{{$post -> POSTID}}">
                        <a href="upload/{{$post->IMAGE}}" class="hero-link set-bg img-popup" onclick="updateClick('{{$post->POSTID}}')">
                            <div class="name-artist">
                                <p>{{$post->Description}}</p>
                                <div class="tag">
                                    <span>{{$post->TAG}}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php
                    $artist = DB::table('profile')->where('UID', $post->UID)->first(['UID', 'NAME']);
                    ?>
                    <div class="name-artist" style="margin-top:5px">
                        <a href="profile_artist/{{$artist->UID}}" style="color:white; font-size:13px; background:linear-gradient(-90deg, rgba(2,0,36,1) 0%, rgba(8,7,38,1) 7%, rgba(12,141,167,1) 100%); padding:7px 20px;border:none;border-radius:3px;box-shadow:1px -1px 11px 2px #706968">{{$artist->NAME}}</a>
                    </div>
                    <script>
                        function updateClick(id) {
                            var xmlhttp = new XMLHttpRequest();
                            xmlhttp.onreadystatechange = function() {
                                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {}
                            };
                            xmlhttp.open("GET", "updateClicked.php?id=" + id, true);
                            xmlhttp.send();
                        }
                    </script>
                </div>
                @endforeach

            </div>
            @if(!$postPaginate->onFirstPage())
            <a href="{{$postPaginate->previousPageUrl()}}" class="btn btn-outline-danger" style="padding:5px 30px"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
                </svg></a>
            @endif
            @for($i=1;$i<=$postPaginate->lastPage();$i++)
                <a href="{{$postPaginate->url($i)}}" class="btn btn-outline-secondary" style="color:white; margin:5px;">{{$i}}</a>
                @endfor
                @if($postPaginate->hasMorePages())
                <a href="{{$postPaginate->nextPageUrl()}}" class="btn btn-outline-danger" style="padding:5px 30px"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" />
                    </svg></a>
                @endif


        </div>
        <!--Recommend for work-->
        <div class="container-fluid">
            <div class="title-section">
                <h2>Recommend for Work</h2>
            </div>
            <div class="row">
                @foreach($postPaginate as $post)
                <div class="col-lg-2" style="margin-bottom:100px">
                    <div class="hero-item portfolio-item set-bg" data-setbg="upload/{{$post->IMAGE}}" data-id_image="{{$post -> POSTID}}">
                        <a href="upload/{{$post->IMAGE}}" class="hero-link set-bg img-popup" onclick="updateClick('{{$post->POSTID}}')">
                            <div class="name-artist">
                                <p>{{$post->Description}}</p>
                                <div class="tag">
                                    <span>{{$post->TAG}}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php
                    $artist = DB::table('profile')->where('UID', $post->UID)->first(['UID', 'NAME']);
                    ?>
                    <div class="name-artist" style="margin-top:5px">
                        <a href="profile_artist/{{$artist->UID}}" style="color:white; font-size:13px; background:linear-gradient(-90deg, rgba(2,0,36,1) 0%, rgba(8,7,38,1) 7%, rgba(12,141,167,1) 100%); padding:7px 20px;border:none;border-radius:3px;box-shadow:1px -1px 11px 2px #706968">{{$artist->NAME}}</a>
                    </div>
                    <script>
                        function updateClick(id) {
                            var xmlhttp = new XMLHttpRequest();
                            xmlhttp.onreadystatechange = function() {
                                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {}
                            };
                            xmlhttp.open("GET", "updateClicked.php?id=" + id, true);
                            xmlhttp.send();
                        }
                    </script>
                </div>
                @endforeach

            </div>
        </div>
        <!--End Recommend for Work-->
        <!--Not safe for work-->
    </div>
</section>
<!-- Intro section end  -->
@endsection
