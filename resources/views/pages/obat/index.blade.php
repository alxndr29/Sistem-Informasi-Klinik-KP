@extends('layouts.simple.master')
@section('title', 'Satuan Produk')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/date-picker.css')}}">
@endsection

@section('breadcrumb-title')
<h3>Master Data Obat</h3>
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
        <div class="col-12">
            @if ($message = Session::get('success'))
                <div class="alert alert-success dark alert-dismissible fade show" role="alert">
                    <strong>Berhasil</strong> {{$message}}
                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <button class="btn btn-primary" type="button" onclick=""
                            data-bs-toggle="modal" data-original-title="test"
                            data-bs-target="#example-modal" data-bs-original-title=""
                            title="">Tambah Data Obat
                    </button>
                    <a class="btn btn-secondary m-1" href="{{route('obat.tambahstok')}}">Tambah Stok Obat</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display" id="basic-1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Kategori</th>
                                    <th>Harga</th>
                                    <th>Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($obat as $key => $value)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$value->nama}}</td>
                                    <td>{{$value->kategori}}</td>
                                    <td>Rp. {{number_format($value->harga)}}</td>
                                    <th>
                                        <a class="btn btn-primary" href="{{route('obat.edit',$value->idobat)}}">Edit</a>
                                    </th>
                                </tr>
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
<x-modal-large title="Obat ">
    <form method="POST" action="{{route('daftar-produk.store')}}">
        @csrf
        <div class="modal-body">
            <div class="row gy-4">
                <div class="col-xl-12">
                    <label class="form-label" for="Kategori">Nama Obat</label>
                    <input class="form-control" id="Kategori"
                           placeholder="Masukan Kategori Produk" name="nama">
                </div>
                <div class="col-12">
                        <label class="form-label">Kategori</label>
                        <select class="form-select digits" name="kategori" id="kategori" required>
                            <!-- <option value="" selected>-- Pilih Dokter --</option> -->
                            @foreach ($kategori as $value)
                                <option
                                    value="{{$value->name}}">{{$value->name}}</option>
                            @endforeach
                        </select>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
            <button class="btn btn-primary" type="submit">Simpan</button>
        </div>
    </form>
</x-modal-large>
@endsection

@section('script')
@vite('resources/js/app-vue.js')
<script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script>
<script src="{{asset('assets/js/select2/select2.full.min.js')}}"></script>
<script src="{{asset('assets/js/select2/select2-custom.js')}}"></script>

<script src="{{asset('assets/js/datepicker/date-picker/datepicker.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-picker/datepicker.en.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-picker/datepicker.custom.js')}}"></script>
@endsection
