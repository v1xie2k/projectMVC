@extends('layouts.layout')
@section('content')
    <h1>Register</h1>
    @if($errors -> any())
        <h1>Errors :</h1>

        <ul>
            @foreach ($errors->all() as $err)
                <li>{{$err}}</li>
            @endforeach
        </ul>
    @endif
    <form action="{{url('/doregister')}}" method="post">
        @csrf
        <input type="hidden" name="saldo" value=0>
        <input type="hidden" name="role" value="user">
        <div class="mb-3">
            <label  class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="{{old('name')}}" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label  class="form-label">Email address</label>
            <input type="text" name="email" class="form-control" value="{{old('email')}}" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" >
        </div>
        <div class="mb-3">
            <label class="form-label">Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control" >
        </div>
        <div class="mb-3">
            <label  class="form-label">Alamat</label>
            <input type="text" name="alamat" class="form-control" value="{{old('alamat')}}" aria-describedby="emailHelp">
        </div>
        <button type="submit" class="btn btn-success">Register</button>
    </form>
    Already have account ? <a href="{{url('login')}}">Login Here</a>
    @if (Session::has('pesan'))
        @php($pesan = Session::get('pesan'))
        @if ($pesan['tipe'] == 0)
            <div class="alert alert-danger">{{ $pesan['isi'] }}</div>
        @else
            <div class="alert alert-success">{{ $pesan['isi'] }}</div>
        @endif
    @endif
@endsection
