@extends('layouts.layout')
@include('navbar')
@section('content')
<!-- awal profile -->
<div class="container_profile">
    <div class ="back_profile">
        <!-- atur profile kiri -->
        <div class="profile_left">
            <div class="picture_profile">
                @if ($picture)

                <img src="{{asset('storage/users/'.$picture)}}" class="card-img-top" alt="...">
                @endif
                <div class="profile"></div>    
                <center>
                    <br>
                    <div class="nama_profile">Hello, {{ getYangLogin()->name}}</div>
                </center>
            </div>

            <div class="data_user">
                <!-- data user -->
                <h1>Name<span class="data_user_nama">: {{ getYangLogin()->name}}</span></h1><br>
                <h1>Email<span class="data_user_email">: {{ getYangLogin()->email}}</span></h1><br>
                <h1>Address<span class="data_user_alamat">: {{ getYangLogin()->alamat}}</span></h1><br>
                <form action="#" method="get">
                    <input type="hidden" name="edit" value="(email)">
                    <a href="{{url('home/user/editprofile/'.getYangLogin()->id)}}"><button class="tombol_edit_user">Edit Profile</button></a><br>
                    <a href="{{url('home/user/editpassword/'.getYangLogin()->id)}}"><button class="tombol_edit_user">Edit Password</button></a>
                </form>
            </div>
        </div>
        <!-- end profile kiri -->

        <!-- atur profile kanan -->
        <div class="profile_kanan">
            <h2 style="color: #ffffff;">Your Balance is : {{ getYangLogin()->saldo}}</h2><br>
            <div class="top_up">
                <h4>Masukan jumlah topup</h4>
                    <br>
                <form action="" method="post">
                    <input type="number" name="jum" id="" min="0">
                    <br>
                    <button class="tombol_top_up" name="topup">Top Up</button>
                </form>
                <br>
                <form action="#" method="get">
                    <input type="hidden" name="status" value="(email)">
                    <button class="tombol_status">Status Top Up</button>
                </form>
                <br>
                <form action="#" method="get">
                    <input type="hidden" name="detail" value="(email)">
                    <button  class="tombol_history">History Top Up</button>
                </form>
            </div>
            
            <br>
            <center>
            <h2 class="font_profile">Purchase History</h2>
            </center>
            
            <!-- tabelnya -->
            <div class="tabel_top_up">
                <table>
                    <thead>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Detail</th>
                    </thead>
                    <tbody>
                        <tr id="tabel_history">
                            <td>(tanggal)</td>
                            <td> (total)</td>
                            <td><form action="#" method="get">
                                <input type="hidden" name="detail3" value="(htrans)">
                                <button>Detail</button>
                            </form></td>
                        </tr>
                        <td colspan="2">You don't have any transaction history</td>
                    </tbody>
                </table>
            </div>
            <!-- end table -->
        </div>
        <!-- end profile kanan -->
    </div>
</div>
</div>
@endsection
