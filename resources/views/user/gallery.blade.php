@extends('layouts.master')

@section('content')
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="container">
        <div class="row">
            <h2 class="text-center">Gallery</h2>

            @foreach($photos as $photo)
                <div class="col-md-2">
                    <div class="panel panel-success">
                        <div class="panel-heading">{{ $photo->title }}</div>
                        <div class="panel-body text-center">
                            <img style="width: 100%; height: 150px" src="{{ asset('photos/'.$photo->image) }}" alt="">
                        </div>
                        <div class="panel-footer">
                            <p>Status: {{ $photo->status }}</p>
                            @if($photo->status == 'approve')
                                <a href="{{ route('user.gallery.photoStatus',[$photo->id,'selling']) }}" class="btn btn-warning">Request for Sell</a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <div class="row">
            {{ $photos->links() }}
        </div>
    </div>

@endsection
