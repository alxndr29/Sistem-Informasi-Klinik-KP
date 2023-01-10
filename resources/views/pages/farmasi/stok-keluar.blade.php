@extends('layouts.simple.master')
@section('title', 'Stok Keluar')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
@endsection

@section('breadcrumb-title')
<h3>Stok Keluar</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">
    Penyimpanan
</li>
<li class="breadcrumb-item active">Stok Keluar</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Zero Configuration  Starts-->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <button class=""></button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display" id="basic-1">
                            <thead>
                                <tr>
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
                                @for($i =1; $i <100;$i++)
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td class="text-center">{{\Carbon\Carbon::parse('2019-02-28 22:42:27')->format('d M y h:m')}}</td>
                                        <td class="text-center">Produk {{$i}}</td>
                                        <td class="text-center"><span class="badge badge-info">Obat Batuk</span></td>
                                        <td class="text-center">Pasien A</td>
                                        <td class="text-center">5 Strip</td>
                                        <td class="text-center">Rp.{{number_format(random_int(50000,75000),0,',','.') }}</td>
                                        <td class="text-center">Rp.{{number_format(random_int(50000,75000),0,',','.') }}</td>
                                    </tr>
                                @endfor
{{--                                @foreach($stockOut as $item)--}}
{{--                                <tr>--}}
{{--                                    <td>{{$i++}} </td>--}}
{{--                                    <td>{{\Carbon\Carbon::parse($item->created_at)->format('d M y h:m:s')}}</td>--}}
{{--                                    <!-- <td class="text-danger fw-bolder" >{{$item->SalesOrder->no_transaction}}</td> -->--}}
{{--                                    <td>{{$item->product->nama}}</td>--}}
{{--                                    <td><span class="fw-bold badge badge-info">{{$item->Product->Type->name}}</span> - {{$item->Product->Category->name}}</td>--}}
{{--                                    <td>{{$item->SalesOrder->Customer->name}}</td>--}}
{{--                                    <td>{{$item->jumlah}} {{$item->Product->UOM->name}}</td>--}}
{{--                                    <td style="text-align:right;">{{number_format($item->harga * $item->jumlah,0,',','.') }}</td>--}}
{{--                                    <td style="text-align:right;">{{number_format( ($item->harga * $item->jumlah) + ($item->harga * $item->jumlah * $item->Product->keuntungan / 100) - ($item->harga * $item->jumlah * $item->Product->diskon / 100) )}}</td>--}}
{{--                                </tr>--}}

{{--                                @endforeach--}}

                                {{-- @foreach($suppliers as $supplier)--}}
                                {{-- <tr>--}}
                                {{-- <td>{{$i+= 1}}</td>--}}
                                {{-- <td>{{$supplier->name}}</td>--}}
                                {{-- <td>{{$supplier->address}}</td>--}}
                                {{-- <td>{{$supplier->telephone}}</td>--}}
                                {{-- <td>--}}
                                {{-- <span class="badge badge-{{$supplier->status == 0 ? 'danger' : 'success'}}">{{$supplier->status == 0 ? 'Tidak Aktif' : 'Aktif'}}</span>--}}
                                {{-- </td>--}}
                                {{-- <td>--}}
                                {{-- <form onsubmit="return confirm('Apakah Anda Yakin ?');"--}}
                                {{-- action="{{ route('supplier.destroy', $supplier->id) }}" metdod="POST">--}}
                                {{-- <a href="{{route('supplier.edit', $supplier->id)}}" class="btn btn-warning btn-xl me-2">Edit</a>--}}
                                {{-- @csrf--}}
                                {{-- @metdod('DELETE')--}}
                                {{-- <button class="btn btn-danger btn-xs" type="submit"--}}
                                {{-- data-original-title="btn btn-danger btn-xs" title=""--}}
                                {{-- data-bs-original-title="">Delete--}}
                                {{-- </button>--}}
                                {{-- </form>--}}

                                {{-- </td>--}}
                                {{-- </tr>--}}
                                {{-- @endforeach--}}
                        </table>
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