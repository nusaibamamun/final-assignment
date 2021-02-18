@extends('layouts.master')

@section('content')
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="container">
        <div class="row">

            <div class="col-md-6 col-md-offset-3">
                <h2>Dashboard</h2>
                @if(session('uploadSuccess'))
                    <li class="alert alert-success">{{ session('uploadSuccess') }}</li>
                @endif
                @include('error.errors')
                <form class="form-group" action="{{ route('user.upload') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input class="form-control" name="title" type="text" placeholder="Title"><br>
                    <input class="form-control" name="description" type="text" placeholder="Description"><br>
                    <input class="form-control" placeholder="Image upload" type="file" name="image"><br>
                    <input class="btn btn-success" type="submit" name="submit" value="Upload">
                </form>
            </div>


        </div>
    </div>
@endsection
