@extends('layouts.layout2')
@include('navbar2')
@section('content')
    <div class="product">
        <h1>History of Top Up Transaction</h1>

        <br><br>
        <div class="card-body">
            <table class="table responsive table-dark" id="tableHasil">
                <thead class="thead-dark" style="text-align: center">
                    <tr>
                        <th style="text-align: left">Name</th>
                        <th>Date</th>
                        <th>Balance</th>
                        <th>Status</th>
                        <th>Updated At</th>
                    </tr>
                </thead>
                <tbody style="text-align: center">
                    @foreach ($topup as $item)
                        <tr>
                            <td style="text-align: left">{{$item->Users->name}}</td>
                            <td>{{$item->date_time}}</td>
                            <td>{{$item->topup}}</td>
                                @if($item->status == 1)
                                    <td>Accepted</td>
                                @elseif($item->status == 2)
                                    <td>Rejected</td>
                                @endif
                            <td>{{$item->updated_at}}</td>
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
