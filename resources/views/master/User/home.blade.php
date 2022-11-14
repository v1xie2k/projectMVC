@extends('layouts.layout2')
@include('navbar2')
@section('content')
    <div class="product">
        <h1>List Users</h1>

        @if (Session::has('pesan'))
        @php
            $pesan = Session::get('pesan');
        @endphp

        @if ($pesan['tipe'] == 1)
            <div class="alert alert-success">{{ $pesan['isi'] }}</div>
        @else
            <div class="alert alert-danger">{{ $pesan['isi'] }}</div>
        @endif
    @endif
       
        <form action="{{ url('/admin/user/dosearch') }}" method="post" enctype="multipart/form-data">
            @csrf
            <label for="sort">Sort by:</label>
            <select name="sort" id="sorting">
                {{-- @foreach ($categories as $value) --}}
                    <option value="new">Newest User</option>
                    <option value="old" >Oldest User</option>
                    <option value="asc" >A-Z Name</option>
                    <option value="desc">Z-A Name</option>
                {{-- @endforeach --}}
            </select><br><br>
            <div class="mb-3">     
                <label for="search">Search user:</label>
                <input type="text" name="search" id="">
            </div>
            <button type="submit" class="btn btn-success btn-sm">Search</button>
        </form>
        
        <br><br>
        <div class="card-body">
            <table class="table responsive table-dark" id="tableHasil">
                <thead class="thead-dark">
                    <tr>
                        <th>ID User</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>Saldo</th>
                        <th style="text-align: center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->alamat}}</td>
                            <td>{{$user->saldo}}</td>
                            <td style="text-align: center"><a href="{{ url("admin/user/reset/".$user->id) }}"><button class="btn btn-warning m-2" >Reset Password</button></a> <a href="{{ url("admin/user/delete/".$user->id) }}"><button class="btn btn-danger">Delete</button></a> </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

@endsection

@section('plugins.Datatables', true)
@section('custom_js')
<script>
   
    
   $(document).ready(function(){
        console.log("test");
        var table = $("#table").DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ url('admin/menu/lprod') }}",
            },
            'columnDefs': [ {
                'targets': [4,5], /* column index */
                'orderable': false, /* true or false */
                }],
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'id_kategori', name: 'id_kategori' },
                { data: 'harga', name: 'harga' },
                { data: 'deskripsi', name: 'deskripsi' },
                { data: 'btnDelete', name: 'btnDelete' }
            ]
        });
    });
</script>
@stop
