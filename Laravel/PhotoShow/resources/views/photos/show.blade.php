@extends('layouts.app')

@section('content')
    <div class="container">
        @if($photo)
            <h1>{{$photo->title}}</h1>
            <h3>{{$photo->description}}</h3>
            <p class="text-muted">Size: {{$photo->size}}</p>
            <a href="/albums/{{$photo->album_id}}" class="btn btn-outline-info">Go Back</a>
            <hr>
            <div class="row">
                <div class="col">
                    <img src="/storage/albums/{{$photo->album_id}}/{{$photo->photo}}"
                         class="img-fluid"
                         alt="Photo is not loaded">
                </div>
            </div>
            <hr>
        @endif
    </div>
@endsection
