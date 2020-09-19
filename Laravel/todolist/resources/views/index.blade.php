@extends('layouts.app')

@section('content')
    @include('layouts.messages')
    <div class="row mx-auto justify-content-center">
        @foreach($todos as $todo)
            <div class="col-3 m-2">
                <div class="card" style="width: 18rem;">
                    <div class="card-header">
                        <h3 class="row">
                            <div class="col">
                                <a href="todos/{{$todo->id}}" class="font-weight-bold size">
                                    {{$todo->title}}
                                </a>
                            </div>
                            <div class="col col-7">
                                <form method="post" class="d-inline-block float-right px-1" action="/todos/{{$todo->id}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                                <a href="/todos/{{$todo->id}}/edit" class="float-right btn btn-dark">edit
                                </a>
                            </div>


                        </h3>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{$todo->due}}</h5>
                        <p class="card-text">{{$todo->content}}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
