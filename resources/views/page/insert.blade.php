@extends('layout')
@section('insert')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Upload here</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="store" enctype="multipart/form-data">
                        <div class="mb-3"><label class="form-label" for="Library">Library</label>
                            @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error}}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn btn-close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                            </div>
                            @endif
                            @csrf
                            <select name="Library" id="" class='select-library'>
                                <option value="">--select library--</option>
                                @foreach($dsLibrary as $library)
                                <option value="{!!$library-> LIBRARYID!!}">{!!$library->LIBRARYNAME!!}</option>
                                </>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3"><label class="form-label">Image</label>
                            <input type="file" class="form-control" name="image">
                        </div>
                        <div class="mb-3"><label class="form-label">Tag</label>
                            <input type="text" class="form-control" placeholder="input tag" name="tag">
                        </div>
                        <div class="mb-3"><label class="form-control">Description</label>
                            <textarea style="width:100%; height:auto; resize:none" name="description" id="" rows="10"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
