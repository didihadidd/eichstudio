@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Transaksi {{ $item->user->email}}</h1>
      </div>

      <!-- Content Row -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card shadow">
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <td>{{ $item->id }}</td>
                    </tr>
                    <tr>
                        <th>Nama Talent</th>
                        <td>{{ $item->talent->title}}</td>
                    </tr>
                    <tr>
                        <th>Pembeli</th>
                        <td>{{ $item->user->name }}</td>
                    </tr>
                    <tr>
                        <th>Jumlah Item</th>
                        <td>${{ $item->jumlah_item }}</td>
                    </tr>
                    <tr>
                        <th>Total Transaksi</th>
                        <td>${{ $item->transactional_total }}</td>
                    </tr>
                    <tr>
                        <th>Status Transaksi</th>
                        <td>{{ $item->transaction_status }}</td>
                    </tr>
                    <tr>
                        <th>Pembelian</th>
                        <td>
                            <table class="table table-bordered">
                                <tr> <!--sesuai yg ada di halaman checkout -->
                                    <th>ID</th>
                                    <th>Nama Brand</th>
                                    <th>Email Brand</th>
                                    <th>Jumlah Item</th>
                                    <th>Deskripsi</th>
                                    <th>Bukti Bayar</th>
                                </tr>
                                @foreach($item->details as $detail) <!-- jd dia checkout apa aja ketauan-->
                                    <tr>
                                        <td>{{ $detail->id }}</td>
                                        <td>{{ $detail->nama_brand }}</td>
                                        <td>{{ $detail->email }}</td>
                                        <td>{{ $detail->jumlah_item }}</td>
                                        <td>{{ $detail->deskripsi }}</td>
                                        <td>{{ $detail->bukti_bayar }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
