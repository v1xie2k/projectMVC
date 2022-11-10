@extends('layouts.layout')
@section('content')
    <table border="1">
        <thead>
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
@endsection
