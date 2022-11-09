@extends('layouts.layout2')
@include('navbar2')
@section('content')
    <div class="product">
        <h1>List Users</h1>

        <form action="{{ url('/admin/user/dofilter') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="sort">Sort by:</label>
                <select name="sort" id="sorting">
                    {{-- @foreach ($categories as $value) --}}
                        <option value="asc">Newest User</option>
                        <option value="old">Oldest User</option>
                    {{-- @endforeach --}}
                </select><br><br>
                <label for="search">Search user:</label>
                <input type="text" name="" id="search">
            </div>
            
            <button type="submit" class="btn btn-success btn-sm">Search</button>
        </form>
        
        <br><br>
        <div class="card-body">
            <table class="table responsive table-dark" id="tableHasil">
                <thead class="thead-dark">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Alamat</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->email}}</td>
                            <td><button class="btn btn-danger">Delete</button></td>
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
