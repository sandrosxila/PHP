@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2 class="d-inline-block">
                        {{$listing->title}}
                    </h2>
                </div>

                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">
                            Address: {{$listing->address}}
                        </li>
                        <li class="list-group-item">
                            Website: {{$listing->website}}
                        </li>
                        <li class="list-group-item">
                            E-mail: {{$listing->email}}
                        </li>
                        <li class="list-group-item">
                            Phone: {{$listing->phone}}
                        </li>
                        <li class="list-group-item">
                            Bio: {{$listing->bio}}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection
