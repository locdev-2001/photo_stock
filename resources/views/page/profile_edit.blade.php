@extends('layout')
@section('profile_edit')
<div class="container">
    <div class="jumbotron">
        <form action="/update/{{ $profile [0]->UID}}" method="post">

            {{csrf_field() }}

            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name" value="{{$profile[0]->NAME}}" placeholder="">
            </div>
            <div class="form-group">
                <label>Gender</label>
                <input type="text" class="form-control" name="gender" value="{{$profile[0]->GENDER}}" placeholder="">
            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control" name="address" value="{{$profile[0]->ADDRESS}}" placeholder="">
            </div>
            <div class="form-group">
                <label>Tel</label>
                <input type="text" class="form-control" name="tel" value="{{$profile[0]->TEL}}" placeholder="">
            </div>
            <button type="submit" name="submit" class="btn btn-primary" style="width:100%">UPDATE PROFILE</button>
        </form>
    </div>
</div>
@endsection
