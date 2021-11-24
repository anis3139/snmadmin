@extends('errors.errors_layout')

@section('title')
    403 - Access Denied
@endsection

@section('error-content')

                       <div class="text-center p-5">
        <h2 class="text-danger" style="font-size: 100px">403</h2>
        <p>Access to this resource on the server is denied</p>
    </div>
    <hr>
    <p class="mt-2 text-center">
        {{ $exception->getMessage() }}
    </p>
    @php
        $path=  $_SERVER['REQUEST_URI'];
        $pathToken=explode('/', $path);
    @endphp
    @if($pathToken[1]=='admin')
    <div class="container p-5 d-flex justify-content-between">
        <a class="btn btn-primary btn-lg" href="{{ route('home') }}">Back to Dashboard</a>
        <a class="btn btn-warning btn-lg" href="{{ route('admin.login') }}">Admin Login</a>
    </div>
    @else
     <div class="container p-5 d-flex justify-content-between">
        <a class="btn btn-primary btn-lg" href="{{ route('client.home') }}">Back to Home</a>
        <a class="btn btn-warning btn-lg" href="{{ route('client.login') }}">User Login</a>
    </div>
    @endif



@endsection
