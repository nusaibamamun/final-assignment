@extends('layouts.master')

@section('content')
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @foreach($pendingPhotos as $photo)
                <div class="row" style="border:2px solid black">
                    <div class="col-md-4">
                        <p>{{ $photo->user->username }}</p>
                    </div>

                    <div class="col-md-4">
                        <img src="{{ asset('photos/'.$photo->image) }}" width="100px" height="100px" alt="">

                    </div>

                    <div class="col-md-4">
                        <a href="{{ route('admin.image.approve',[$photo->id,'approve']) }}" class="btn btn-success btn-sm">Approve</a>
                        <a href="{{ route('admin.image.approve',[$photo->id,'decline']) }}" class="btn btn-danger btn-sm">Decline</a>
                    </div>

                </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
