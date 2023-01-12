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
                                @foreach ($kunjungan as $key => $value)
                                @foreach ($value->obat as $obat)
                                <tr>
                                    <td class="text-center">{{$key+1}}</td>
                                    <td class="text-center">{{$value->created_at}}</td>
                                    <td class="text-center">{{$obat->nama}}</td>
                                    <td class="text-center"><span class="badge badge-info">{{$obat->kategori}}</span></td>
                                    <td class="text-center">{{$value->pasien->nama_lengkap}}</td>
                                    <td class="text-center">{{$obat->pivot->jumlah}}</td>
                                    <td class="text-center">Rp. {{number_format($obat->pivot->harga)}}</td>
                                    <td class="text-center">Rp. {{number_format($obat->pivot->harga * $obat->pivot->jumlah)}}</td>
                                </tr>
                                @endforeach

                                @endforeach
                                <!-- @for($i =1; $i <100; $i++) 
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
                                @endfor -->
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