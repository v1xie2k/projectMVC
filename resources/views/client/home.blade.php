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
    temporary button ke user profile
    <a href="{{url('home/user/profile/'.getYangLogin()->id)}}"><button>userprofile</button></a><br>
    temporary button ke menu page
    <a href="{{url('home/menu')}}"><button>Menu</button></a>
@endsection
