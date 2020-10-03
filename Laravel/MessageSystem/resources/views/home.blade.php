@extends('layouts.app')

@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Inbox</div>
            <div class="card-body">
                @if (count($messages))
                    <ul class="list-group">
                        @foreach($messages as $message)
                            @if($message->deleted == 0)
                                <a href="{{route('read',$message->id)}}">
                                    <li class="list-group-item">
                                        <strong>
                                            From: {{$message->userFrom->name}}
                                            @if($message->read)
                                                <span class="badge badge-success float-right">READ</span>
                                            @endif
                                            <br>
                                            Email: {{$message->userFrom->email}}
                                        </strong>
                                        | Subject: {{$message->subject}}

                                        <a href="{{route('delete',$message->id)}}" class="btn btn-danger float-right">Delete</a>
                                    </li>
                                </a>
                            @endif
                        @endforeach
                    </ul>
                @else
                    You Have No Message.
                @endif
            </div>
        </div>
    </div>
@endsection
