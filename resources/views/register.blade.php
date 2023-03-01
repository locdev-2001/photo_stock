<!DOCTYPE html>
<html lang="en">

<head>
    <title>Photographer | HTML Template|Register</title>
    <meta charset="UTF-8" />
    <meta name="description" content="Photographer html template" />
    <meta name="keywords" content="photographer, html" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Favicon -->
    <link href="{{('frontend/img/favicon.ico')}}" rel="shortcut icon" />

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,500i,600,600i,700,700i&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('frontend/css/login.css')}}">
    <style>
        * {
            background-image: url('frontend/img/icons/mau-background-dep.jpg');
        }
    </style>
</head>

<body>
    <div class="container">
        <h3>Sign In</h3>
        <form action="postRegister" method="post" class="login-form" enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="text" name="name" placeholder="Nhập họ tên" required="required">
            <input type="text" name="gender" placeholder="Nhập giới tính" required="required">
            <input type="text" name="address" placeholder="Nhập địa chỉ" required="required">
            <input type="text" name="tel" placeholder="Nhập số điện thoại" required="required">
            <input type="text" name="username" placeholder="Nhập tên đăng nhập" required="required">
            <input type="password" name="password" placeholder="Nhập mật khẩu" required="required">
            <button type="submit">Đăng ký</button>
            <span style="font-size:9pt; color:white; margin-top:10px;">Đã có tài khoản? Hãy</span><a style="color:white" href="../website_wallpaper/dangnhap">Đăng nhập</a>
        </form>
    </div>
</body>

</html>
