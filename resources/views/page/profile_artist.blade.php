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
                <p>Artist: {{$dsThongtin->NAME}}</p>
                <p>Gender: {{$dsThongtin->GENDER}}</p>
                <p>Address: {{$dsThongtin->ADDRESS}}</p>
                <p>Tel: {{$dsThongtin->TEL}}</p>
                <p>POSTED: {{$dsThongtin->POSTED}}</p>
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

        </li>
        @endforeach
    </ul>
    <div class="portfolio-warp">
        <div class="row portfolio-gallery m-0">

            @foreach ($dsPost as $postImage)
            <div class="mix col-lg-4 col-sm-6 p-0 library_{{$postImage->LIBRARYID}}">
                <div class="portfolio-box">
                    <a href="/upload/{{$postImage->IMAGE}}" class="portfolio-item img-popup set-bg" onclick="updateClick('{{$postImage->POSTID}}')">
                        <div class="portfolio-item set-bg" data-setbg="/upload/{{$postImage->IMAGE}}"></div>
                        <h6>{!!$postImage->Description!!}</h6>
                    </a>
                </div>
                <script>
                    function updateClick(id) {
                        var xmlhttp = new XMLHttpRequest();
                        xmlhttp.onreadystatechange = function() {
                            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {}
                        };
                        xmlhttp.open("GET", "/public/frontend/updateClicked.php?id=" + id, true);
                        xmlhttp.send();
                    }
                </script>
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
