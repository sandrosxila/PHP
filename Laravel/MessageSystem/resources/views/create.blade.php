@extends('layouts.app')

@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <form action="{{route('send')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="to">To</label>
                        <select class="form-control" id="to" name="to">
                            @if(count($users))
                                @foreach($users as $user)
                                    <option value="{{$user->id}}">
                                        {{$user->name}} , {{$user->email}}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" class="form-control" name="subject" id="subject"
                               @if(isset($reply) && isset($subject))
                                    value="{{'Re: '.$subject}}"
                               @endif
                        >
                    </div>

                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea class="form-control" id="message" name="message" rows="3"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Send</button>
                </form>
            </div>
        </div>
    </div>
@endsection
