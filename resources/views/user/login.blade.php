@extends('layouts.master')



@section('content')

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <h2>Login</h2>


    @if(session('registerok'))
        <p class="alert alert-success">{{session('registerok')}}</p>
    @endif
     @if(session('loginError'))
         <p class="alert alert-danger">{{session('loginError')}}</p>
     @endif
    @include('error.errors')
    <form method="POST" action="">
        {{csrf_field()}}
        <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" class="form-control" name="username">

        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="password">
        </div>

        <button type="submit" class="btn btn-primary">Login</button>
    </form>

@endsection

