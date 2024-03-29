@extends('layouts.simple.master')
@section('title', 'Satuan Produk')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/date-picker.css')}}">
@endsection

@section('breadcrumb-title')
<h3>Stok Obat Keluar</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">
    Transaksi
</li>
<li class="breadcrumb-item">Pembelian</li>
<li class="breadcrumb-item active">Buat Transaksi</li>
@endsection

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h3>Data Stok Keluar<h3>
                        </div>
                        <!--
                        <div>
                            <label>Tanggal Awal</label>
                            <input class="form-control" type="date" name="awal" required>
                        </div>
                        <div>
                            <label>Tanggal Akhir</label>
                            <input class="form-control" type="date" name="akhir" required>
                        </div>
                        <div>
                            <a class="btn btn-primary m-1" href="{{route('obat.tambahstok')}}">Cari</a>
                        </div> -->
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display" id="basic-1">
                            <thead>
                                <tr>
                                    <!-- <th>No</th>
                                    <th>ID Kunjungan</th>
                                    <th>Tanggal</th>
                                    <th>Nama</th>
                                    <th>Satuan</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th> -->
                                    <th class="text-center">No</th>
                                    <th class="text-center">Waktu dan Jam</th>
                                    <th class="text-center">Produk</th>
                                    <th class="text-center">Kategori</th>
                                    <th class="text-center">Pasien</th>
                                    <th class="text-center">Jumlah Stok Dikeluarkan</th>
                                    <th class="text-center">Harga</th>
                                    <th class="text-center">Grand Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kunjungan as $key => $value)
                                @foreach ($value->obat as $obat)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$value->created_at}}</td>
                                    <td>{{$obat->nama}}</td>
                                    <td>{{$obat->kategori}}</td>
                                    <td>{{$value->pasien->nama_lengkap}}</td>
                                    <td>{{$obat->pivot->jumlah}}</td>
                                    <td>Rp. {{number_format($obat->pivot->harga)}}</td>
                                    <td>Rp. {{number_format($obat->pivot->harga * $obat->pivot->jumlah)}}</td>
                                </tr>
                                @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

<script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script>
<script src="{{asset('assets/js/select2/select2.full.min.js')}}"></script>
<script src="{{asset('assets/js/select2/select2-custom.js')}}"></script>

<script src="{{asset('assets/js/datepicker/date-picker/datepicker.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-picker/datepicker.en.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-picker/datepicker.custom.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function() {

    });
</script>

@endsection
