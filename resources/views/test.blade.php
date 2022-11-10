@extends('adminlte::master')

@section('body')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (Session::has('pesan'))
        @if (Session::get('pesan')['code'] == 1)
            <div class="alert alert-success">{{ Session::get('pesan')['payload'] }}</div>
        @else
            <div class="alert alert-danger">{{ Session::get('pesan')['payload'] }}</div>
        @endif
    @endif

    <div class="card">
    <div class="card-header">
        <h1 class="card-title">List Staff</h1>
        <div class="card-tools">
            <a href="{{ url('admin/tambah') }}" class="btn btn-outline-success"><i class="fa fa-plus mr-1"></i>Tambah</a>
        </div>
    </div>
    <div class="card-body">
        <table class="table responsive" id="table">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    <th>Reset Pass</th>
                </tr>
            </thead>

        </table>
    </div>
    <div class="card-footer">
    </div>
</div>

@stop


@section('plugins.Datatables', true)
@section('adminlte_js')
<script>
    $(function(){
        var table = $("#table").DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ url('load') }}",
            },
            'columnDefs': [ {
                'targets': [4], /* column index */
                'orderable': false, /* true or false */
                }],
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'harga', name: 'harga' },
                { data: 'btnEdit', name: 'btnEdit' },
                { data: 'btnDelete', name: 'btnDelete' },
                { data: 'btnReset', name: 'btnReset' }
            ]
        });
    });
</script>
@stop

