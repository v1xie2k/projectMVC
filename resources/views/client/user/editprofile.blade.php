@extends('layouts.layout')
@section('content')
    <form action="{{ url('home/user/doedit/'.getYangLogin()->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        {{-- <input type="hidden" name="saldo" value=0>
        <input type="hidden" name="role" value="user"> --}}
        <div class="mb-3">
            <label>Name: </label><br>
            <input type="text" name="name" class="name" value="{{ getYangLogin()->name }}"
                aria-describedby="emailHelp" style="width: 100%;">
            @error('name')
                <div class="error"> {{$message}} </div> <br>
            @enderror
        </div>
        <div class="mb-3">
            <label>Email address: </label><br>
            <input type="text" name="email" class="email" value="{{ getYangLogin()->email }}"
                aria-describedby="emailHelp" style="width: 100%;" disabled>
            @error('email')
                <div class="error"> {{$message}} </div> <br>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Alamat: </label><br>
            <input type="text" name="alamat" class="alamat" value="{{ getYangLogin()->alamat }}"
                aria-describedby="emailHelp" style="width: 100%;">
            @error('alamat')
                <div class="error"> {{$message}} </div> <br>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Upload Pict</label>
            <input type="file" name="photo" class="form-control" value="{{ old('photo') }}"
                aria-describedby="emailHelp">
            @error('photo')
                <div class="error"> {{$message}} </div> <br>
            @enderror
        </div>
        <input type="hidden" name="pict" value="{{$picture}}">
        <button type="submit" class="btn btn-success">save</button>
    </form>
    <br><br>
    <label  class="form-label">user Pict</label>
    <div class="card" style="width: 18rem;">
        @if ($picture)

        <img src="{{asset('storage/users/'.$picture)}}" class="card-img-top" alt="...">
        @endif
    </div>
@endsection
