@extends('layouts.app')
@section('content')
    @include('layouts.messages')
    <form method="post" action="/todos">
        @csrf
        <div class="form-group">
            <label for="title" >Title</label>
            <input type="text" class="form-control" id="title" name = "title" value="{{old('title')}}">
        </div>
        <div class="form-group">
            <label for="content" >Content</label>
            <input type="text" class="form-control" id="content" name = "content" value="{{old('content')}}">
        </div>
        <div class="form-group">
            <label for="due" >Due</label>
            <input type="text" class="form-control" id="due" name = "due" value="{{old('due')}}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
