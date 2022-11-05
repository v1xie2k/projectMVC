@extends('layouts.layout')

@section('content')
    {{-- {{isLogin()}}
    {{getYangLogin()}} --}}
    @if (isLogin())
        <form action="{{url('dologout')}}" method="post">
            @csrf
            <button type="submit" class="btn btn-success">Logout</button>
        </form>
    @endif
    ini page user
@endsection
