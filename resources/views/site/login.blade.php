@extends('layouts.layout')
@section('content')
    <form action="{{url('/dologin')}}" method="post">
        @csrf
        email:
        <input type="email" name="email"><br>
        password:
        <input type="password" name="password">
        <button class="btn btn-primary">Login</button>
    </form>
    @if(Session::has('pesan'))
        <div class="alert alert-danger">{{ Session::get('pesan') }}</div>
    @endif
@endsection
