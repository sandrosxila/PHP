@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2 class="d-inline-block">
                        Dashboard
                    </h2>
                    <a href="/listings/create" class="btn btn-success float-right">Create</a>
                </div>

                <div class="card-body">


                    @if(count($listings))
                        <table class="table table-stripped">
                            <tr>
                                <th>Your Company Listings</th>
                                <th>Actions</th>
                            </tr>
                            @foreach($listings as $listing)
                                <tr>
                                    <td>{{$listing->name}}</td>
                                    <td>
                                        <a href="/listings/{{$listing->id}}/edit" class="d-inline-block btn btn-primary">
                                            Edit
                                        </a>
                                        <form method="post" action="/listings/{{$listing->id}}" class="d-inline-block">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="d-inline-block btn btn-danger">
                                                Delete
                                            </button>
                                        </form>
                                    </td>

                                </tr>
                            @endforeach
                        </table>
                    @else
                        There is nothing to show
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
