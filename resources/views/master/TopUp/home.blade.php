@extends('layouts.layout2')
@include('navbar2')
@section('content')
    <div class="product">
        <h1>Top Up Transaction</h1>
        @if (Session::has('pesan'))
            @php($pesan = Session::get('pesan'))
                @if ($pesan['tipe'] == 0)
                    <div class="alert alert-danger">{{ $pesan['isi'] }}</div>
                @else
                    <div class="alert alert-success">{{ $pesan['isi'] }}</div>
                @endif
        @endif
        {{-- 
        <form action="{{ url('/admin/topup/dofilter') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="sort">Sort by:</label>
                <select name="sort" id="sorting">
                    {{-- @foreach ($categories as $value) --}}
                        {{-- <option value="new">Newest Request Top Up</option>
                        <option value="old">Oldest Request Top Up</option> --}}
                    {{-- @endforeach --}}
                {{-- </select><br><br>
                <label for="search">Search Top Up:</label>
                <input type="text" name="" id="search">
            </div>
            
            <button type="submit" class="btn btn-success btn-sm">Search</button>
        </form> --}}
        <br><br>
        {{-- <div class="form-check form-switch">
            <label class="form-check-label" for="pending">Request Pending</label>
            <input class="form-check-input" type="checkbox" role="switch" id="pending">
        </div> --}}
        <div class="card-body">
            <table class="table responsive table-dark" id="tableHasil">
                <thead class="thead-dark">
                    <tr>
                        <th style="text-align: center">Name</th>
                        <th style="text-align: center">Date</th>
                        <th style="text-align: center">Balance</th>
                        <th style="text-align: center" >Action</th>
                    </tr>
                </thead>
                <tbody style="text-align: center">
                    @foreach ($topup as $item)
                        <tr>
                            <td style="text-align: left">{{$item->Users->name}}</td>
                            <td>{{$item->created_at}}</td>
                            <td>{{$item->topup}}</td>
                                @if ($item->status == 0)
                                    <td>
                                        <a href="{{url("admin/topup/accept/".$item->id)}}" class="btn btn-warning">Accept</a>
                                        <a href="{{url("admin/topup/reject/".$item->id)}}" class="btn btn-danger">Reject</a>
                                    </td>
                                @elseif($item->status == 1)
                                    <td>Accepted</td>
                                @elseif($item->status == 2)
                                    <td>Rejected</td>
                                @endif
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
