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
                    <button class="btn btn-primary" type="button" onclick=""
                            data-bs-toggle="modal" data-original-title="test"
                            data-bs-target="#exampleModal" data-bs-original-title=""
                            title="">Tambah Stok Barang
                    </button>
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
                                @php
                                $i = 1;
                                @endphp
                                @for($i =1; $i <100;$i++)
                                    <tr>
                                        <td class="text-center">{{$i}}</td>
                                        <td class="text-center">{{\Carbon\Carbon::parse('2019-02-28 22:42:27')->format('d M y h:m')}}</td>
                                        <td class="text-center">Produk {{$i}}</td>
                                        <td class="text-center"><span class="badge badge-info">Obat Batuk</span></td>
                                        <td class="text-center">{{rand(5,15)}} Strip</td>
                                        <td class="text-center">Rp.{{number_format(random_int(50000,75000),0,',','.') }}</td>
                                        <td class="text-center">Rp.{{number_format(random_int(50000,75000),0,',','.') }}</td>
                                    </tr>
                                @endfor
{{--                                @foreach($stockIn as $item)--}}
{{--                                <tr>--}}
{{--                                    <td>{{$i++}}</td>--}}
{{--                                    <td>{{\Carbon\Carbon::parse($item->created_at)->format('d M y h:m:s')}}</td>--}}
{{--                                    <td class="text-primary fw-bolder">PO-{{$item->purchase_order->no_transaction}}</td>--}}
{{--                                    <td>{{$item->product->nama}}</td>--}}
{{--                                    <td>{{$item->purchase_order->supplier->name}}</td>--}}
{{--                                    <td><span class="fw-bold badge badge-info">{{$item->Product->Type->name}}</span> - {{$item->Product->Category->name}}</td>--}}
{{--                                    <td>{{$item->jumlah}} {{$item->Product->UOM->name}}</td>--}}
{{--                                    <td style="text-align:right;">{{$item->harga}}</td>--}}
{{--                                </tr>--}}
{{--                                @endforeach--}}


                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;"
     aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Stok Barang</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"
                        data-bs-original-title="" title=""></button>
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
                                    <option
                                        value="{{$obat->idobat}}">{{$obat->nama}} - {{$obat->kategori}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6">
                            <label class="form-label" for="exampleFormControlInput1">Jumlah</label>
                            <input class="form-control form-control-lg"  id="exampleFormControlInput1"
                                   type="text"
                                   placeholder="0">
                        </div>
                        <div class="col-6">
                            <label class="form-label" for="exampleFormControlInput1">Harga</label>
                            <input class="form-control form-control-lg"  id="exampleFormControlInput1"
                                   type="text"
                                   placeholder="0">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="row d-flex justify-content-end">
                    <div class="col-6">
                        <button class="btn btn-light" type="button" data-bs-dismiss="modal"
                                data-bs-original-title=""
                                title="">Close
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
