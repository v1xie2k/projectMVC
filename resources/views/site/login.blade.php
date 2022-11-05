@extends('layouts.layout')
@section('content')
    <form action="{{url('/dologin')}}" method="post">
        @csrf
        {{-- email:
        <input type="email" name="email"><br> --}}
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        {{-- password:
        <input type="password" name="password"> --}}
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
        </div>
        {{-- <button class="btn btn-primary">Login</button> --}}
        <button type="submit" class="btn btn-success">Login</button>
    </form>
    Dont have account ? <a href="{{url('register')}}">Register Here</a>
    @if (Session::has('pesan'))
        @php($pesan = Session::get('pesan'))
        @if ($pesan['tipe'] == 0)
            <div class="alert alert-danger">{{ $pesan['isi'] }}</div>
        @else
            <div class="alert alert-success">{{ $pesan['isi'] }}</div>
        @endif
    @endif
@endsection
