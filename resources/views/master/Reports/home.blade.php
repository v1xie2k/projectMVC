@extends('adminlte::master')
{{-- @include('navbar2') --}}
@section('adminlte_css_pre')
<link rel="stylesheet" href="{{ asset('css/mycssadmin.css') }}" media="screen">
@endsection
@section('body')
@include('navbar2')
    <div class="product">
        <h1>Report Page</h1>
        @if ($errors->any())
            <h1>Errors :</h1>

            <ul>
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        @endif


        <form action="{{ url('/admin/report/filterDate') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="id_kategori">Choose a Date Range:</label>
                <input type="date" name="start" id="" value="{{ \carbon\carbon::parse($start)->isoFormat("YYYY-MM-DD")}}">
                <input type="date" name="end" id="" value="{{ \carbon\carbon::parse($end)->isoFormat("YYYY-MM-DD")}}">
            </div>
            <button type="submit" class="btn btn-success">Filter</button>
        </form><br>
        {{-- @if (Session::has('pesan'))
            @php($pesan = Session::get('pesan'))
            @if ($pesan['tipe'] == 0)
                <div class="alert alert-danger">{{ $pesan['isi'] }}</div>
            @else
                <div class="alert alert-success">{{ $pesan['isi'] }}</div>
            @endif
        @endif --}}
        <br><br>
        <h1>Total Trans {{$total_trans}} </h1>
        <h1>Total qty sold {{$total_qty}}</h1>
        <h1>Total Income {{$total_income}}</h1>
    </div>

@endsection

