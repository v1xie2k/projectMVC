@extends('layouts.layout')
@section('content')
    {{-- <div class="d-flex p-1 w-100 mt-5 ">
        <div class="d-flex flex-wrap filter w-25 h-50 card p-3 ms-5"> --}}
            Temporary menu list <br>
            <h1>List item category {{$category->name}}</h1><br>
            <div class=""d-flex flex-wrap gap-3">
                @foreach ($items as $val)
                <div class="" style="width: 18rem;">
                    @foreach ($picts as $pict )
                        @if (explode('.',$pict)[0]== $val->id)
                        <img src="{{asset('storage/items/'.$pict)}}" class="card-img-top" alt="...">
                        @endif
                    @endforeach
                    <div class="card-body">
                    <h5 class="card-title">{{$val->name}}</h5>
                    <p class="card-text">Price: {{$val->harga}}</p>
                    <p class="card-text">Desc: {{$val->deskripsi}}</p>
                    <a href="#" class="btn btn-primary">add to cart</a>
                    </div>
                </div>
                @endforeach
            </div>
        {{-- </div>
    </div> --}}
@endsection
