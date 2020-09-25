@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="jumbotron text-center"
             style=" background-image: linear-gradient(rgba(255,255,255,.5), rgba(255,255,255,.5)),url('/storage/album_covers/{{$album->cover_image}}');background-size: cover; filter: alpha(opacity=20);">
            <h1 class="display-4" style="text-shadow: 0 0 5px #d7d7d7;">{{$album->name}}</h1>
            <p class="lead" style="text-shadow: 0 0 5px #d7d7d7;">{{$album->description}}</p>
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="/photos/create/{{$album->id}}" role="button">
                    Add Photo
                </a>
            </p>
            <p class="lead">
                <form method="post" action="/albums/{{$album->id}}">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </p>
        </div>
        <div class="row justify-content-center">
            @if(count($album->photos))
                @foreach($album->photos as $photo)
                    <div class="col-md-3 m-1">
                        <div class="card shadow-sm" style="width: 18rem;">
                            <img src="/storage/albums/{{$photo->album_id}}/{{$photo->photo}}" class="card-img-top"
                                 alt="{{$photo->title}}">
                            <div class="card-body">
                                <p class="card-text">{{$photo->description}}</p>
                                <a href="/photos/{{$photo->id}}" class="btn btn-outline-secondary btn-sm">View</a>
                                <form method="post" action="/photos/{{$photo->id}}" class="float-right">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <h2>There is no photos added yet</h2>
            @endif
        </div>
    </div>
@endsection
