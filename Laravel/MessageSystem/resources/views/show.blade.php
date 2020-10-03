@extends('layouts.app')

@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                @if($message)
                    @csrf
                    To: {{$message->userTo->name}}
                    <hr>
                    Email: {{$message->userTo->email}}
                    <hr>
                    Subject: {{$message->subject}}
                    <hr>
                    Message: <br>
                    <p>
                        {{$message->body}}
                    </p>
                @endif
            </div>
        </div>
    </div>
@endsection
