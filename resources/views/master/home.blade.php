@extends('layouts.layout')
@section('content')
    @if (isLogin())
    <form action="{{url('dologout')}}" method="post">
        @csrf
        <button type="submit" class="btn btn-success">Logout</button>
    </form>
    @endif
    ini Page Admin
@endsection
