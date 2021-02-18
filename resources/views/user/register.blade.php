@extends('layouts.master')

@section('content')

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    @include('error.errors')
    <form method="POST" action="{{route('register.save')}}">
        {{csrf_field()}}
        <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" class="form-control" name="username">

        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="password">
        </div>

        <div class="mb-3">
            <label class="form-label">Confirm Password</label>
            <input type="password" class="form-control" name="password_confirmation">
        </div>

        <button type="submit" class="btn btn-primary">Register</button>
    </form>

@endsection
