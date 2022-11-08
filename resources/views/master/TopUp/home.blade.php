@extends('layouts.layout2')
@include('navbar2')
@section('content')
    <div class="product">
        <h1>Top Up Transaction</h1>

        <form action="{{ url('/admin/topup/dofilter') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="sort">Sort by:</label>
                <select name="sort" id="sorting">
                    {{-- @foreach ($categories as $value) --}}
                        <option value="asc">Newest Request Top Up</option>
                        <option value="old">Oldest Request Top Up</option>
                    {{-- @endforeach --}}
                </select><br><br>
                <label for="search">Search Top Up:</label>
                <input type="text" name="" id="search">
            </div>
            
            <button type="submit" class="btn btn-success btn-sm">Search</button>
        </form>
        
        <br><br>
        <div class="form-check form-switch">
            <label class="form-check-label" for="pending">Request Pending</label>
            <input class="form-check-input" type="checkbox" role="switch" id="pending">
        </div>
        <div class="card-body">
            <table class="table responsive table-dark" id="tableHasil">
                <thead class="thead-dark">
                    <tr>
                        <th>Name</th>
                        <th>Date</th>
                        <th>Balance</th>
                        <th style="text-align: center" >Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($topup as $item)
                        <tr>
                            <td>{{$item->Users->name}}</td>
                            <td>{{$item->date_time}}</td>
                            <td>{{$item->topup}}</td>
                            <td style="text-align: center"><button class="btn btn-warning ml-10">Accept</button> <button class="btn btn-danger">Reject</button></td>
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
