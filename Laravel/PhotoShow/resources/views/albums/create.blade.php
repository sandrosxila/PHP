@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create New Album</h2>
        <form method="post" action="{{route('album-store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" id="description" name="description">
            </div>
            <div class="form-group">
                <label for="cover-image">Upload an image</label>
                <input type="file" class="form-control-file" id="cover-image" name="cover-image">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
