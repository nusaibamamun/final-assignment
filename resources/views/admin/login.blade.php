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

                <h4><i class="icon-envelope"></i><strong>Admin Login</strong></h4>
                <!-- start contact form -->
                <div class="" id="">
                    @if(session('loginError'))
                        <li class="alert alert-danger">{{ session('loginError') }}</li>
                    @endif
                    @include('error.errors')
                        <form method="POST" action="{{ route('admin.login') }}">
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

                </div>
            </div>

        </div>
    </div>

@endsection
