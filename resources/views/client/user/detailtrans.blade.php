@extends('layouts.layout')
@section('content')
    <div class="product6">
    <h1>Detail Tranksaksi</h1>
        <div class="card-body">
            <table class="table responsive table-dark" id="tableHasil">
                <thead class="thead-dark">
                <tr>
                    <th>Nama Menu</th>
                    <th>Kategori</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($details as $val )
                    <tr>
                        <td>{{$val->name_menu}}</td>
                        <td>{{$val->Menus->Kategories->name}}</td>
                        <td>{{$val->price}}</td>
                        <td>{{$val->quantity}}</td>
                        <td>{{$val->subtotal}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{url('home/user/profile')}}"><button class="btn btn-primary" style="width:100%;">Back To Profile</button></a>
        </div>
    </div>

@endsection
