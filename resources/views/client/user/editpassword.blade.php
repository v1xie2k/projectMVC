@extends('layouts.layout')
{{-- @include('navbar2') --}}
@section('adminlte_css_pre')
<link rel="stylesheet" href="{{ asset('css/index.css') }}" media="screen">
@endsection
@section('content')
    <div class="product5">
        <h1>Edit Password</h1>
        <form action="{{ url('home/user/doedit/password/'.getYangLogin()->id) }}" method="post">
            @csrf
            {{-- <input type="hidden" name="saldo" value=0>
            <input type="hidden" name="role" value="user"> --}}
            <div class="mb-3">
                <label>Old Password: </label><br>
                <input type="password" name="oldpassword" class="password" style="width: 100%;">
                @error('oldpassword')
                    <div class="error"> {{$message}} </div> <br>
                @enderror
            </div>
            <div class="mb-3">
                <label>New Password: </label><br>
                <input type="password" name="password" class="password" style="width: 100%;">
                @error('password')
                    <div class="error"> {{$message}} </div> <br>
                @enderror
            </div>
            <div class="mb-3">
                <label>Confirm New Password: </label><br>
                <input type="password" name="password_confirmation" class="password" style="width: 100%;">
            </div>
            <button type="submit" class="btn btn-success">Save</button>
        </form>
        <br>
        <a href="{{url('home/user/profile')}}"><button class="btn btn-primary" style="width:85%;">Back To Profile</button></a>
    </div>
    
@endsection
