@extends('layouts.simple.master')

@section('title', 'Dashboard')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>Dashboard</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Home</li>
<li class="breadcrumb-item active">Dashboard</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-3">
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-4">Jumlah Kunjungan Pasien Hari Ini</h6>
                    <h3 class="mb-4">{{$total_pasien_hari_ini}} Orang</h3>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-4">Jumlah Kunjungan Pasien Bulanan</h6>
                    <h3 class="mb-4">{{$total_pasien_1_bulan}} Orang</h3>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-4">Total Pendapatan Harian</h6>
                    @if($total_pemasukan != null)
                    <h3 class="mb-4">Rp. {{{number_format($total_pemasukan->pemasukan)}}}</h3>
                    @else
                    <h3 class="mb-4">Rp. 0</h3>
                    @endif

                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-4">Jumlah Obat Di Miliki</h6>
                    <h3 class="mb-4">{{$obat}}</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5>Daftar Kunjungan Pasien Hari Ini</h5>
                    <div>
                        @php
                        setlocale(LC_TIME, 'id_ID');
                        \Carbon\Carbon::setLocale('id');
                        @endphp
                        <h5>{{\Carbon\Carbon::now()->formatLocalized("%A, %d %B %Y");}} <span id="jam-terkini"></span></h5>

                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display" id="basic-1">
                            <thead>
                                <tr>
                                    <th class="text-center">No.Antrian</th>
                                    <th class="text-center">Hari Jam</th>
                                    <th class="text-center">Nama Pasien</th>
                                    <th class="text-center">Total Biaya</th>
                                    <th class="text-center">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kunjungan as $key => $value)
                                <tr>
                                    <td class="text-center">Antrian - {{$key}}</td>
                                    <td class="text-center">{{$value->created_at}}</td>
                                    <td class="text-center">{{$value->pasien->nama_lengkap}}</td>
                                    <td class="text-center">
                                        Rp.{{number_format($value->tarif_obat + $value->tarif_periksa)}}
                                    </td>
                                    @if($value->status == "Menunggu Pemeriksaan")
                                    <td class="text-center">
                                        <span class="badge badge-warning text-dark">
                                        Menunggu Pemeriksaan</span>
                                        
                                    </td>
                                    @else
                                    <td class="text-center">
                                       
                                        <span class="badge badge-success">Selesai di tangani</span>
                                    </td>
                                    @endif

                                </tr>
                                @endforeach
                                <!-- @for($i = 1; $i <100; $i++)
                                    <tr>
                                        <td class="text-center">Antrian - {{$i}}</td>
                                        <td class="text-center">10:00</td>
                                        <td class="text-center">Pasien {{$i}}</td>
                                        <td class="text-center">
                                            Rp.{{number_format(random_int(50000,75000),0,',','.') }}</td>
                                        <td class="text-center"><span
                                                class="badge badge-warning text-dark">Menunggu Pemeriksaan</span>
                                            <span class="badge badge-success">Selesai di tangani</span>
                                        </td>
                                    </tr>
                                @endfor -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="col-6">--}}
        {{-- <div class="card">--}}
        {{-- <div class="card-body">--}}
        {{-- <h4 class="mb-4">Produk Kadaluwarsa</h4>--}}
        {{-- <div class="table-responsive">--}}
        {{-- <table class="display" id="basic-1">--}}
        {{-- <thead>--}}
        {{-- <tr class="fs-sm-6">--}}
        {{-- <th>No</th>--}}
        {{-- <th>Nama Produk</th>--}}
        {{-- <th>Satuan</th>--}}
        {{-- <th>Jenis & Kategori</th>--}}
        {{-- <th>Tanggal Expired</th>--}}
        {{-- <th>Sisa Stok</th>--}}
        {{-- <th>Harga Jual</th>--}}
        {{-- <th>Harga Beli</th>--}}
        {{-- </tr>--}}
        {{-- </thead>--}}
        {{-- <tbody>--}}
        {{-- @php--}}
        {{-- $i = 0;--}}
        {{-- @endphp--}}
        {{-- @foreach($products as $product)--}}
        {{-- <tr>--}}
        {{-- <td>No</td>--}}
        {{-- <td>{{$product->nama}}</td>--}}
        {{-- <td>{{$product->uom}}</td>--}}
        {{-- <td><span class="fw-bold badge badge-info">{{$product->type}}</span> - {{$product->category}}</td>--}}
        {{-- <td>{{$product->min_stock}}</td>--}}
        {{-- <td>15</td>--}}
        {{-- <td>{{$product->harga == null ? '0' : $product->harga}}</td>--}}
        {{-- <td>{{$product->harga == null ? '0' : $product->harga}}</td>--}}
        {{-- <td>{{$product->harga == null ? '0' : $product->harga}}</td>--}}
        {{-- <td>{{$product->harga == null ? '0' : $product->harga}}</td>--}}
        {{-- </tr>--}}
        {{-- @endforeach--}}


        {{-- @foreach($products as $product)--}}
        {{-- <tr>--}}
        {{-- <td>{{$i += 1}}</td>--}}
        {{-- <td style="font-size: 11px">{{$product->nama}}</td>--}}
        {{-- <td>{{$product->uom}}</td>--}}
        {{-- <td>{{$product->type}}</td>--}}
        {{-- <td>{{$product->category}}</td>--}}
        {{-- <td class="text-center">{{ $product->min_stock != 0 ? $product->min_stock : '0'}}</td>--}}
        {{-- <td class="text-center">{{$product->keuntungan}} %</td>--}}
        {{-- <td class="text-center">{{$product->diskon}} %</td>--}}
        {{-- <td class="text-center">--}}
        {{-- Rp. {{number_format($product->harga * 1.45,0,',','.') }}</td>--}}
        {{-- <td>--}}
        {{-- <form onsubmit="return confirm('Apakah Anda Yakin ?');"--}}
        {{-- action="{{ route('daftar-produk.destroy', $product->id) }}"--}}
        {{-- method="POST">--}}
        {{-- <a href="{{route('daftar-produk.show', $product->id)}}"--}}
        {{-- class="btn btn-info btn-sm">Detail</a>--}}
        {{-- <a href="{{route('daftar-produk.edit', $product->id)}}"--}}
        {{-- class="btn btn-warning btn-sm">Edit</a>--}}
        {{-- @csrf--}}
        {{-- @method('DELETE')--}}
        {{-- <button class="btn btn-danger btn-sm" type="submit">--}}
        {{-- Delete--}}
        {{-- </button>--}}
        {{-- </form>--}}
        {{-- </td>--}}
        {{-- </tr>--}}
        {{-- @endforeach--}}

        {{-- </tfoot>--}}
        {{-- </table>--}}
        {{-- </div>--}}
        {{-- </div>--}}
        {{-- </div>--}}
        {{-- </div>--}}
        {{-- <div class="col-6">--}}
        {{-- <div class="card">--}}
        {{-- <div class="card-body">--}}
        {{-- <h4 class="mb-4">Stok Habis</h4>--}}
        {{-- <div class="table-responsive">--}}
        {{-- <table class="display" id="basic-2">--}}
        {{-- <thead>--}}
        {{-- <tr class="fs-sm-6">--}}
        {{-- <th>No</th>--}}
        {{-- <th>Nama Produk</th>--}}
        {{-- <th>Satuan</th>--}}
        {{-- <th>Jenis & Kategori</th>--}}
        {{-- <th>Batas Min Stok</th>--}}
        {{-- <th>Sisa Stok</th>--}}
        {{-- <th>Harga Jual</th>--}}
        {{-- </tr>--}}
        {{-- </thead>--}}
        {{-- <tbody>--}}
        {{-- @php--}}
        {{-- $i = 0;--}}
        {{-- @endphp--}}
        {{-- @foreach($products as $product)--}}
        {{-- <tr>--}}
        {{-- <td>No</td>--}}
        {{-- <td>{{$product->nama}}</td>--}}
        {{-- <td>{{$product->uom}}</td>--}}
        {{-- <td><span class="fw-bold badge badge-info">{{$product->type}}</span> - {{$product->category}}</td>--}}
        {{-- <td>{{$product->min_stock}}</td>--}}
        {{-- <td>15</td>--}}
        {{-- <td>{{$product->harga == null ? '0' : $product->harga}}</td>--}}
        {{-- </tr>--}}
        {{-- @endforeach--}}


        {{-- @foreach($products as $product)--}}
        {{-- <tr>--}}
        {{-- <td>{{$i += 1}}</td>--}}
        {{-- <td style="font-size: 11px">{{$product->nama}}</td>--}}
        {{-- <td>{{$product->uom}}</td>--}}
        {{-- <td>{{$product->type}}</td>--}}
        {{-- <td>{{$product->category}}</td>--}}
        {{-- <td class="text-center">{{ $product->min_stock != 0 ? $product->min_stock : '0'}}</td>--}}
        {{-- <td class="text-center">{{$product->keuntungan}} %</td>--}}
        {{-- <td class="text-center">{{$product->diskon}} %</td>--}}
        {{-- <td class="text-center">--}}
        {{-- Rp. {{number_format($product->harga * 1.45,0,',','.') }}</td>--}}
        {{-- <td>--}}
        {{-- <form onsubmit="return confirm('Apakah Anda Yakin ?');"--}}
        {{-- action="{{ route('daftar-produk.destroy', $product->id) }}"--}}
        {{-- method="POST">--}}
        {{-- <a href="{{route('daftar-produk.show', $product->id)}}"--}}
        {{-- class="btn btn-info btn-sm">Detail</a>--}}
        {{-- <a href="{{route('daftar-produk.edit', $product->id)}}"--}}
        {{-- class="btn btn-warning btn-sm">Edit</a>--}}
        {{-- @csrf--}}
        {{-- @method('DELETE')--}}
        {{-- <button class="btn btn-danger btn-sm" type="submit">--}}
        {{-- Delete--}}
        {{-- </button>--}}
        {{-- </form>--}}
        {{-- </td>--}}
        {{-- </tr>--}}
        {{-- @endforeach--}}

        {{-- </tfoot>--}}
        {{-- </table>--}}
        {{-- </div>--}}
        {{-- </div>--}}
        {{-- </div>--}}
        {{-- </div>--}}
    </div>
</div>
@endsection

@section('script')
<script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script>
<script>
    let myVar = setInterval(myTimer, 1000);

    function myTimer() {
        const d = new Date();
        document.getElementById("jam-terkini").innerHTML = d.toLocaleTimeString();
    }
</script>
@endsection