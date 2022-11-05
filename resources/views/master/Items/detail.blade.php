@extends('layouts.layout')
@section('content')
    <a href="{{url('admin/menu')}}"><button type="submit" class="btn btn-success">Back</button></a>
    <h1>Detail Item</h1>
    @if($errors -> any())
        <h1>Errors :</h1>
        <ul>
            @foreach ($errors->all() as $err)
                <li>{{$err}}</li>
            @endforeach
        </ul>
    @endif
    <form action="{{url('/admin/menu/doedit')}}" method="post">
        @csrf
        <input type="hidden" name="id" value="{{$menu->id}}">
        <div class="mb-3">
            <label for="id_kategori">Choose a category: (nanti dimerge ke database) </label>
            <select name="id_kategori" id="category">
                <option value="1">makanan</option>
                <option value="2">minuman</option>
            </select>
        </div>
        <div class="mb-3">
            <label  class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="{{$menu->name}}" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label class="form-label">harga</label>
            <input type="number" name="harga" class="form-control" min:1 value="{{$menu->harga}}" >
        </div>
        <div class="mb-3">
            <label  class="form-label">Deskripsi</label>
            <input type="text" name="deskripsi" class="form-control" value="{{$menu->deskripsi}}" aria-describedby="emailHelp">
        </div>
        <button type="submit" class="btn btn-success">Edit</button>
    </form>
    @if (Session::has('pesan'))
        @php($pesan = Session::get('pesan'))
        @if ($pesan['tipe'] == 0)
            <div class="alert alert-danger">{{ $pesan['isi'] }}</div>
        @else
            <div class="alert alert-success">{{ $pesan['isi'] }}</div>
        @endif
    @endif

@endsection
