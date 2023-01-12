@extends('layouts.simple.master')
@section('title', 'Stok Masuk')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
@endsection

@section('breadcrumb-title')
<h3>Stok Masuk</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">
    Penyimpanan
</li>
<li class="breadcrumb-item active">Stok Masuk</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Zero Configuration  Starts-->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header p-4 d-flex justify-content-between">
                    <div>
                        <h6>Daftar Barang Masuk</h6>
                    </div>
                    <!-- <button class="btn btn-primary" type="button" onclick="" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal" data-bs-original-title="" title="">Tambah Stok Barang
                    </button> -->
                    <a class="btn btn-primary" href="{{url('obat/index/tambahstok')}}">Tambah Stok Barang
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display" id="basic-1">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Waktu</th>
                                    <th class="text-center">Produk</th>
                                    <th class="text-center">Kategori</th>
                                    <th class="text-center">Jumlah Stok Masuk</th>
                                    <th class="text-center">Harga</th>
                                    <th class="text-center">Grand Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stokin as $key => $value)
                                @foreach ($value->obat as $obat)
                                <tr>
                                   <td class="text-center">{{$key+1}}</td>
                                   <td class="text-center">{{$value->created_at}}</td>
                                   <td class="text-center">{{$obat->nama}}</td>
                                   <td class="text-center"><span class="badge badge-info">{{$obat->kategori}}</span></td>
                                   <td class="text-center">{{number_format($obat->pivot->jumlah)}}</td>
                                   <td class="text-center">Rp. {{number_format($obat->pivot->harga)}}</td>
                                   <td class="text-center">Rp. {{number_format($obat->pivot->harga * $obat->pivot->jumlah)}}</td>
                                </tr>
                                @endforeach
                                @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Stok Barang</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{route('pendaftaran.store')}}" class="form theme-form">
                    @csrf
                    <div class="row gy-3">
                        <div class="col-12">
                            <label class="form-label">Pilih Barang</label>
                            <select class="form-select digits" name="dokter" id="dokter" required>
                                <!-- <option value="" selected>-- Pilih Dokter --</option> -->
                                @foreach ($obats as $obat)
                                <option value="{{$obat->idobat}}">{{$obat->nama}} - {{$obat->kategori}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6">
                            <label class="form-label" for="exampleFormControlInput1">Jumlah</label>
                            <input class="form-control form-control-lg" id="exampleFormControlInput1" type="text" placeholder="0">
                        </div>
                        <div class="col-6">
                            <label class="form-label" for="exampleFormControlInput1">Harga</label>
                            <input class="form-control form-control-lg" id="exampleFormControlInput1" type="text" placeholder="0">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="row d-flex justify-content-end">
                    <div class="col-6">
                        <button class="btn btn-light" type="button" data-bs-dismiss="modal" data-bs-original-title="" title="">Close
                        </button>
                    </div>
                    <div class="col-6 w-50">
                        <button class="btn btn-primary" type="button" data-bs-original-title="" title="">Tambah Stok
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script>
@endsection