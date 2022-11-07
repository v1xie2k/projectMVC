@extends('layouts.layout')
@include('navbar')
@section('content')
    @if ($errors->any())
        <h1>Errors :</h1>

        <ul>
            @foreach ($errors->all() as $err)
                <li>{{ $err }}</li>
            @endforeach
        </ul>
    @endif

    <div class="login1">
        <div class="log2 blur">
            <h2>Registration</h2><br><br>

            <form action="{{ url('/doregister') }}" method="post">
                @csrf
                <input type="hidden" name="saldo" value=0>
                <input type="hidden" name="role" value="user">
                <div class="mb-3">
                    <label>Name: </label><br>
                    <input type="text" name="name" class="name" value="{{ old('name') }}"
                        aria-describedby="emailHelp" style="width: 100%;">
                </div>
                <div class="mb-3">
                    <label>Email address: </label><br>
                    <input type="text" name="email" class="email" value="{{ old('email') }}"
                        aria-describedby="emailHelp" style="width: 100%;">
                </div>
                <div class="mb-3">
                    <label>Password: </label><br>
                    <input type="password" name="password" class="password" style="width: 100%;">
                </div>
                <div class="mb-3">
                    <label>Confirm Password: </label><br>
                    <input type="password" name="password_confirmation" class="password" style="width: 100%;">
                </div>
                <div class="mb-3">
                    <label class="form-label">Alamat: </label><br>
                    <input type="text" name="alamat" class="alamat" value="{{ old('alamat') }}"
                        aria-describedby="emailHelp" style="width: 100%;">
                </div>
                <button type="submit" class="btn btn-success">Register</button>
            </form>

            Already have account ? <a href="{{ url('login') }}">Login Here</a>
            @if (Session::has('pesan'))
                @php($pesan = Session::get('pesan'))
                @if ($pesan['tipe'] == 0)
                    <div class="alert alert-danger">{{ $pesan['isi'] }}</div>
                @else
                    <div class="alert alert-success">{{ $pesan['isi'] }}</div>
                @endif
            @endif


        </div>
    </div>




    <div class="foot">
        <p class="copy">Copyright 2021 © Amazake</p>
    </div>
@endsection
