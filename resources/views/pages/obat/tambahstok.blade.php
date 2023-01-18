@extends('layouts.simple.master')
@section('title', 'Tambah Stok')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/date-picker.css')}}">
@endsection

@section('breadcrumb-title')
<h3>Tambah Stok Data Obat</h3>
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
                        <div class="">
                            <h3>Daftar Data Obat<h3>
                        </div>
                    </div>
                </div>
                <form method="post" action="{{route('obat.tambahstokpost')}}">
                    @csrf
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="basic-1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Satuan</th>
                                        <th>Stok Sekarang</th>
                                        <th>Tambah Harga</th>
                                        <th>Tambah Stok</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($obat as $key => $value)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$value->nama}}</td>
                                        <td>{{$value->satuan}}</td>
                                        <td>{{$value->stokin->sum('pivot.jumlah')}}</td>
                                        <td>
                                            <input class="form-control" type="number" name="daftar_harga[{{$value->idobat}}]" value="0" required>
                                        </td>
                                        <td>
                                            <input class="form-control" type="number" name="daftar_jumlah[{{$value->idobat}}]" value="0" required>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
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
@endsection
