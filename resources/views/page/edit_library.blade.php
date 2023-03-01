@extends('layout')
@section('edit_library')
<style>
    body {
        font-family: sans-serif;
    }

    #id_confirm {
        display: none;
        background-color: #eee;
        border-radius: 5px;
        border: 1px solid #aaa;
        position: fixed;
        width: 300px;
        left: 50%;
        margin-left: -150px;
        padding: 6px 8px 8px;
        box-sizing: border-box;
        text-align: center;
    }

    #id_confirm button {
        background-color: #ccc;
        display: inline-block;
        border-radius: 3px;
        border: 1px solid #aaa;
        padding: 2px;
        text-align: center;
        width: 80px;
        cursor: pointer;
    }

    #id_confirm button:hover {
        background-color: #ddd;
    }

    #confirmBox .message {
        text-align: left;
        margin-bottom: 8px;
    }
</style>
<div class="container">
    <div class="jumbotron">
        <form action="/edit-library/{{$inforLibrary->LIBRARYID}}" method="post">
            {{csrf_field() }}
            <div class="form-group">
                <label>Library Name</label>
                <input type="text" class="form-control" name="libraryName" value="{{$inforLibrary->LIBRARYNAME}}" placeholder="">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">RENAME LIBRARY</button>
            <br>
            <br>
        </form>
        <button class="btn btn-primary" onclick="confirmDelete()">DELETE LIBRARY</button>
        <div id="id_confirm">
            <p>Are you sure you want to delete this library</p>
            <button id="id_truebtn" class="btn btn-primary" onclick="show()">Yes</button>
            <button id="id_faslebtn" class="btn btn-primary" onclick="hide()">No</button>
        </div>
    </div>
</div>
<script type="text/javascript">
    function confirmDelete() {
        document.getElementById('id_confirm').style.display = "block";
    }

    function show() {
        window.location = "/delete-library/{{$inforLibrary->LIBRARYID}}";
    };

    function hide() {
        document.getElementById('id_confirm').style.display = "none";
    };
</script>
@endsection
