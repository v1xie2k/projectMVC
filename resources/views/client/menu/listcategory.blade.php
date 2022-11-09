@extends('layouts.layout')
@section('content')
    Temporary category list <br>
    <div class="d-flex flex-wrap">
        @foreach ($categories as $val)
        @foreach ($picts as $pict)
            @if (explode('.',$pict)[0] == $val->id)
            <img src="{{asset('storage/categories/'.$pict)}}" class="card-img-top" alt="..." style="width:200px;height:200px;">
            @endif
        @endforeach
        <a href="{{url('home/menu/'.$val->id)}}"><button>{{$val->name}}</button></a>
    @endforeach
    </div>
@endsection
