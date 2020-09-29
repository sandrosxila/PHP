@extends('layouts.app')

@section('content')
    <div class="container">
        @include('inc.messages')
        @if(count($items))
            <div class="list-group">
                @foreach($items as $item)
                    <a href="{{route('request.edit',$item->id)}}" class="list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">{{$item->text}}</h5>
                            <small>{{date_format(date_create($item->created_at),'Y/m/d H:i:s')}}</small>
                        </div>
                        <form action="{{route('request.destroy',$item->id)}}" method="POST" class="float-right">
                            @csrf
                            @method('delete')
                            <button  type="submit" class="btn btn-danger btn-sm  d-inline-block">Delete</button>
                        </form>
                        <p class="mb-1">{{$item->body}}</p>
                    </a>

                @endforeach
            </div>

        @endif
    </div>
@endsection
