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
                @foreach($photos as $photo)
                    <div class="row" style="border:1px solid black">
                        <div class="col-md-4">
                            <p>{{ $photo->user->username }}</p>
                        </div>

                        <div class="col-md-4">
                            <img src="{{ asset('photos/'.$photo->image) }}" width="100px" height="100px" alt="">
                        </div>

                        <div class="col-md-4">
                            @if($photo->status == 'selling')
                                <form class="form-group form-inline" action="{{ route('admin.selling.process') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $photo->id }}">
                                    <input type="hidden" name="user_id" value="{{ $photo->user->id }}">
                                    <input type="number" class="form-control" name="rate" placeholder="rate">
                                    <select class="form-control" name="status">
                                        <option value="buy-out">buy-out</option>
                                        <option value="rejected">rejected</option>
                                    </select>
                                    <input type="submit" value="save" class="btn btn-primary btn-sm">
                                </form>
                            @else
                                <span>{{ $photo->status }} | {{ $photo->rate }}</span>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
