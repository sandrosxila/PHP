@extends('layouts.app')

@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                @if($message)
                    <form action="{{route('reply',$message->id)}}" method="post">
                        @csrf
                        From: {{$message->userFrom->name}}
                        <hr>
                        Email: {{$message->userFrom->email}}
                        <hr>
                        Subject: {{$message->subject}}
                        <hr>
                        Message: <br>
                        <p>
                            {{$message->body}}
                        </p>
                        <button type="submit" class="btn btn-success">Reply</button>
                        <a href="{{route('delete',$message->id)}}" class="btn btn-danger float-right">Delete</a>
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection
