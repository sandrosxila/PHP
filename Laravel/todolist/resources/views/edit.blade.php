@extends('layouts.app')
@section('content')
    @include('layouts.messages')
    <form method="post" action="/todos/{{$todo->id}}">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="title" >Title</label>
            <input type="text" class="form-control" id="title" name = "title" value="{{$todo->title}}">
        </div>
        <div class="form-group">
            <label for="content" >Content</label>
            <input type="text" class="form-control" id="content" name = "content" value="{{$todo->content}}">
        </div>
        <div class="form-group">
            <label for="due" >Due</label>
            <input type="text" class="form-control" id="due" name = "due" value="{{$todo->due}}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
