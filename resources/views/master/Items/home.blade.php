@extends('layouts.layout2')
@include('navbar2')
@section('content')
    <div class="product">
        <h1>Page Item</h1>
        @if ($errors->any())
            <h1>Errors :</h1>

            <ul>
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        @endif


        <form action="{{ url('/admin/menu/docreate') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="id_kategori">Choose a category:</label>
                <select name="id_kategori" id="category">
                    @foreach ($categories as $value)
                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                    aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label class="form-label">harga</label>
                <input type="number" name="harga" class="form-control" min:1 value="{{ old('harga') }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <input type="text" name="deskripsi" class="form-control" value="{{ old('deskripsi') }}"
                    aria-describedby="emailHelp">
            </div>
            <button type="submit" class="btn btn-success">Add</button>
        </form>
        @if (Session::has('pesan'))
            @php($pesan = Session::get('pesan'))
            @if ($pesan['tipe'] == 0)
                <div class="alert alert-danger">{{ $pesan['isi'] }}</div>
            @else
                <div class="alert alert-success">{{ $pesan['isi'] }}</div>
            @endif
        @endif
        <br><br>
        <h1>List Menu</h1>
        <div class="card-body">
            <table class="table responsive" id="tableHasil">
                <thead class="thead-dark">
                    <tr>
                        <th>Menu Id</th>
                        <th>Name</th>
                        <th>Kategori</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($menus)
                        @foreach ($menus as $values)
                            <tr>
                                <td>{{ $values->id }}</td>
                                <td>{{ $values->name }}</td>
                                <td>{{ $values->Kategories->name }}</td>
                                <td>{{ $values->harga }}</td>
                                <td>{{ $values->deskripsi }}</td>
                                <td>
                                    <a href="{{ url('admin/menu/details/' . $values->id) }}"
                                        class="btn btn-primary">Detail</a>
                                    <a href="{{ url('admin/menu/delete/' . $values->id) }}"
                                        class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>

    </div>

@endsection
@section('plugins.Datatables', true)
@push('js')
<script>
    $(function(){
        var table = $("#table").DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ url('admin/menu/lprod') }}",
            },
            'columnDefs': [ {
                'targets': [4,5,6], /* column index */
                'orderable': false, /* true or false */
                }],
            columns: [
                { data: 'user_id', name: 'user_id' },
                { data: 'user_fullname', name: 'user_fullname' },
                { data: 'user_username', name: 'user_username' },
                { data: 'user_email', name: 'user_email' },
                { data: 'role_id', name: 'role_id' },
                { data: 'btnEdit', name: 'btnEdit' },
                { data: 'btnDelete', name: 'btnDelete' },
                { data: 'btnReset', name: 'btnReset' }
            ]
        });
    });
</script>
@endpush
