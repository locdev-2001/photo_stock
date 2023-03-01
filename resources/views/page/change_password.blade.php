@extends('layout')
@section('changePassword')
<div class="container">
    <div class="jumbotron">
        <form action="../update-password" id="change_password_form" method="post">

            @csrf

            <div class="form-group">
                <label>Current Password</label>
                <input type="password" class="form-control" name="old_password" id="old_password" value="" placeholder="">
            </div>
            @if($errors->any('old_password'))
            <span class="text-danger">{{$errors->first('old_password')}}</span>
            @endif
            <div class="form-group">
                <label>New Password</label>
                <input type="password" class="form-control" name="new_password" id="new_password" value="" placeholder="">
            </div>
            @if($errors->any('new_password'))
            <span class="text-danger">{{$errors->first('new_password')}}</span>
            @endif
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" class="form-control" name="confirm_password" id="confirm_password" value="" placeholder="">
            </div>
            @if($errors->any('confirm_password'))
            <span class="text-danger">{{$errors->first('confirm_password')}}</span>
            @endif
            <button type="submit" name="submit" class="btn btn-primary" style="width:100%">CHANGE PASSWORD</button>
        </form>
    </div>
</div>
<script type="text/javascript">
    $('#change_password_form').validate({
        ignore: '.ignore',
        errorClass: 'invalid',
        validClass: 'success',
        rules: {
            old_password: {
                required: true,
                minlength: 6,
                maxlength: 50
            },
            new_password: {
                required: true,
                minlength: 6,
                maxlength: 50
            },
            confirm_password: {
                required: true,
                equalTo: '#new_password'
            },

        },
        message: {
            old_password: {
                required: "Enter your current password"
            },
            new_password: {
                required: "Enter your new password"
            },
            confirm_password: {
                required: "Need to confirm your password"
            },
        },
        submitHandler: function(form) {
            $.LoadingOverlay("show");
            form.submit();
        }
    })
</script>
@endsection
