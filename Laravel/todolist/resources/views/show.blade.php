@extends('layouts.app')

@section('content')
    <a href="/" class="btn-outline-info">Go Back</a>
    <h1>
        {{$todo->title}}
        <a href="/todos/{{$todo->id}}/edit" class="ml-2 btn btn-dark">edit</a>
        <form method="post" class="d-inline-block px-1" action="/todos/{{$todo->id}}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </h1>
    <div class="label label-danger">{{$todo->due}}</div>
    <hr>
    <p>{{$todo->content}}</p>
@endsection
