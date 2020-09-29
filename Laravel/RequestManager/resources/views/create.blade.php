@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2 class="d-inline-block">
                        Create Item
                    </h2>
                    <a href="{{route('request.index')}}" class="btn btn-info float-right">Go Back</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="post" action="{{route('request.store')}}">
                        @csrf
                        <div class="form-group">
                            <label for="text">Text</label>
                            <input type="text" class="form-control" id="text" name="text" value="{{old('name')}}">
                        </div>
                        <div class="form-group">
                            <label for="body">Body</label>
                            <input type="text" class="form-control" id="body" name="body" value="{{old('body')}}">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
