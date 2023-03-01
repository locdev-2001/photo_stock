@extends('layout')
@section('edit_library')
<div class="container">
    <div class="jumbotron">
        <form action="" method="post">

            {{csrf_field() }}
            <div class="form-group">
                <p></p>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">RENAME LIBRARY</button>
            <a href="">
                <input type="button" name="" class="btn btn-primary" value="DELETE LIBRARY" />
            </a>
        </form>
    </div>
</div>
@endsection
