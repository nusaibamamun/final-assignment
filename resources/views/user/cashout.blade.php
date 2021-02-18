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
                <h2>BALANCE: {{ $balance }} || EARNING: {{ $earning }}</h2>
                <form action="{{ route('user.cashout.process') }}" method="POST">
                    {{ csrf_field() }}
                    <input type="submit" value="Cashout" class="btn btn-warning">
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table width="100%" border="1px">
                    <tr>
                        <th>Date/Time</th>
                        <th>Amount</th>
                        <th>Status</th>
                    </tr>
                    @foreach($cashouts as $cashout)
                        <tr>
                            <td>{{ $cashout->created_at }} || {{ $cashout->created_at->diffForHumans() }}</td>
                            <td>{{ $cashout->amount }}</td>
                            <td>{{ $cashout->status }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
