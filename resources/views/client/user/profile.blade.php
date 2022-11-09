@extends('layouts.layout')
@section('content')
    <div class="mb-3">
        Name: {{ getYangLogin()->name}}
    </div>
    <div class="mb-3">
        Email: {{ getYangLogin()->email}}
    </div>
    <div class="mb-3">
        alamat: {{ getYangLogin()->alamat}}
    </div>
    <div class="mb-3">
        saldo: {{ getYangLogin()->saldo}}
    </div>
    <a href="{{url('home/user/editprofile/'.getYangLogin()->id)}}"><button>editprofile</button></a>
    <a href="{{url('home/user/editpassword/'.getYangLogin()->id)}}"><button>editpassword</button></a>
    <br><br>
    <label  class="form-label">user Pict</label>
    <div class="card" style="width: 18rem;">
        @if ($picture)

        <img src="{{asset('storage/users/'.$picture)}}" class="card-img-top" alt="...">
        @endif
    </div>
@endsection
