@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @if(count($albums))
                @foreach($albums as $album)
                    <div class="col-3 m-2">
                        <div class="card" style="width: 18rem;">
                            <img src="/storage/album_covers/{{$album->cover_image}}" class="card-img-top"
                                 alt="{{$album->cover_image}}">
                            <div class="card-body">
                                <h5 class="card-title">{{$album->name}}</h5>
                                <p class="card-text">{{$album->description}}</p>
                                    <a href="/albums/{{$album->id}}" class="btn btn-primary">view</a>
                                    <form method="post" action="/albums/{{$album->id}}" class="float-right">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>

                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <h2>There is no albums added yet</h2>
            @endif
        </div>
    </div>
@endsection
