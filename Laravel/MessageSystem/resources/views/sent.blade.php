@extends('layouts.app')

@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Sent</div>
            <div class="card-body">
                @if (count($messages))
                    <ul  class="list-group">
                        @foreach($messages as $message)
                            <a href="{{route('show',$message->id)}}" class="list-group-item">
                                <strong>
                                    To: {{$message->userTo->name}} <br>
                                    Email: {{$message->userTo->email}}
                                </strong>
                                | Subject: {{$message->subject}}
                                @if($message->read)
                                    <span class="badge badge-success float-right">READ</span>
                                @endif
                            </a>

                        @endforeach
                    </ul>
                @else
                    You Have No Sent Messages.
                @endif
            </div>
        </div>
    </div>
@endsection
