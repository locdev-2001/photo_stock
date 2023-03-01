<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Photographer | HTML Template</title>
    <meta charset="UTF-8" />
    <meta name="description" content="Photographer html template" />
    <meta name="keywords" content="photographer, html" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Favicon -->
    <link href="{{('frontend/img/favicon.ico')}}" rel="shortcut icon" />

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,500i,600,600i,700,700i&display=swap" rel="stylesheet" />

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/css/font-awesome.min.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/css/magnific-popup.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/css/slicknav.min.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/css/owl.carousel.min.css')}}" />

    <!-- Main Stylesheets -->
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}" />

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header section  -->
    <header class="header-section">
        <a href="{{URL::to('/home')}}" class="site-logo"><img src="{{asset('frontend/img/logo.png')}}" alt="logo" /></a>
        <div class="header-controls">
            <button class="nav-switch-btn"><i class="fa fa-bars"></i></button>
            <button class="search-btn"><i class="fa fa-search"></i></button>

        </div>
        <ul class="main-menu">
            <li><a href="{{URL::to('/home')}}">Home</a></li>
            <?php

            use Illuminate\Support\Facades\Session;
            use Illuminate\Support\Facades\DB;

            $account = Session::get('Account');
            $dsThongtin = DB::table('profile')->where('UID', '=', $account)->first(['UID', 'NAME', 'GENDER', 'ADDRESS', 'TEL', 'POSTED', 'FOLLOW']);
            ?>
            @if ($account)
            <ul class='main-menu'>
                <li class='active'><a href="{{URL::to('/library')}}">{{$dsThongtin->NAME}}</a></li>
                <li><a href="{{URL::to('/logout')}}">Log Out</a></li>
            </ul>
            @else
            <li>
                <a href="{{URL::to('/dangnhap')}}">Login</a>
            </li>
            @endif
            <li class="search-mobile">
                <button class="search-btn"><i class="fa fa-search"></i></button>
            </li>
            @if ($account)
            <li>
                <a href="{{URL::to('/library')}}">Library</a>
            </li>
            <li>
                <a href="{{URL::to('/insert')}}"><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-plus-square-dotted' viewBox='0 0 16 16'>
                        <path d='M2.5 0c-.166 0-.33.016-.487.048l.194.98A1.51 1.51 0 0 1 2.5 1h.458V0H2.5zm2.292 0h-.917v1h.917V0zm1.833 0h-.917v1h.917V0zm1.833 0h-.916v1h.916V0zm1.834 0h-.917v1h.917V0zm1.833 0h-.917v1h.917V0zM13.5 0h-.458v1h.458c.1 0 .199.01.293.029l.194-.981A2.51 2.51 0 0 0 13.5 0zm2.079 1.11a2.511 2.511 0 0 0-.69-.689l-.556.831c.164.11.305.251.415.415l.83-.556zM1.11.421a2.511 2.511 0 0 0-.689.69l.831.556c.11-.164.251-.305.415-.415L1.11.422zM16 2.5c0-.166-.016-.33-.048-.487l-.98.194c.018.094.028.192.028.293v.458h1V2.5zM.048 2.013A2.51 2.51 0 0 0 0 2.5v.458h1V2.5c0-.1.01-.199.029-.293l-.981-.194zM0 3.875v.917h1v-.917H0zm16 .917v-.917h-1v.917h1zM0 5.708v.917h1v-.917H0zm16 .917v-.917h-1v.917h1zM0 7.542v.916h1v-.916H0zm15 .916h1v-.916h-1v.916zM0 9.375v.917h1v-.917H0zm16 .917v-.917h-1v.917h1zm-16 .916v.917h1v-.917H0zm16 .917v-.917h-1v.917h1zm-16 .917v.458c0 .166.016.33.048.487l.98-.194A1.51 1.51 0 0 1 1 13.5v-.458H0zm16 .458v-.458h-1v.458c0 .1-.01.199-.029.293l.981.194c.032-.158.048-.32.048-.487zM.421 14.89c.183.272.417.506.69.689l.556-.831a1.51 1.51 0 0 1-.415-.415l-.83.556zm14.469.689c.272-.183.506-.417.689-.69l-.831-.556c-.11.164-.251.305-.415.415l.556.83zm-12.877.373c.158.032.32.048.487.048h.458v-1H2.5c-.1 0-.199-.01-.293-.029l-.194.981zM13.5 16c.166 0 .33-.016.487-.048l-.194-.98A1.51 1.51 0 0 1 13.5 15h-.458v1h.458zm-9.625 0h.917v-1h-.917v1zm1.833 0h.917v-1h-.917v1zm1.834-1v1h.916v-1h-.916zm1.833 1h.917v-1h-.917v1zm1.833 0h.917v-1h-.917v1zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z' />
                    </svg>
                </a>
            </li>
            @endif
        </ul>
    </header>
    <div class="clearfix"></div>
    <!-- Header section end  -->

    @Yield('content')
    @Yield ('library')
    @Yield('insert')
    @Yield('profile_edit')
    @Yield('changePassword')
    @Yield('add_library')
    @Yield('edit_library')
    <!-- Footer section   -->
    <footer class="footer-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 order-1 order-md-2">
                    <div class="footer-social-links">
                        <a href=""><i class="fa fa-pinterest"></i></a>
                        <a href=""><i class="fa fa-facebook"></i></a>
                        <a href=""><i class="fa fa-twitter"></i></a>
                        <a href=""><i class="fa fa-dribbble"></i></a>
                        <a href=""><i class="fa fa-behance"></i></a>
                    </div>
                </div>
                <div class="col-md-6 order-2 order-md-1">
                    <div class="copyright">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                        All rights reserved | This template is made with
                        <i class="fa fa-heart-o" aria-hidden="true"></i> by
                        <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer section end  -->

    <!-- Search model -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here....." />
            </form>
        </div>
    </div>
    <!-- Search model end -->

    <!--====== Javascripts & Jquery ======-->
    <script src="{{asset('frontend/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.slicknav.min.js')}}"></script>
    <script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('frontend/js/circle-progress.min.js')}}"></script>
    <script src="{{asset('frontend/js/mixitup.min.js')}}"></script>
    <script src="{{asset('frontend/js/instafeed.min.js')}}"></script>
    <script src="{{asset('frontend/js/masonry.pkgd.min.js')}}"></script>
    <script src="{{asset('frontend/js/main.js')}}"></script>
</body>

</html>
