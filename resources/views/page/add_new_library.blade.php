@extends('layout')
@section('add_library')
<div class="container">
    <div class="jumbotron">
        <form action="update-library" method="post">

            {{csrf_field() }}

            <div class="form-group">
                <label>NEW LIBRARY NAME</label>
                <input type="text" class="form-control" name="library-name" value="" placeholder="">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">ADD NEW</button>
        </form>
    </div>
</div>
@endsection
