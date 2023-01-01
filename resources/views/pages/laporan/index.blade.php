@extends('layouts.simple.master')
@section('title', 'Satuan Produk')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/date-picker.css')}}">
@endsection

@section('breadcrumb-title')
<h3>Laporan Uang</h3>
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
                    <div class="d-flex">
                        <div class="mr-auto p-2">
                            <h3>Laporan</h3>
                        </div>
                        <div class="p-2">
                            <select class="form-select digits" id="tahun">
                                <option selected value="2023">2023</option>
                                <option value="2022">2022</option>
                            </select>
                        </div>
                        <div class="p-2">
                            <button type="button" class="btn btn-primary" onClick="cari()">Cari Data</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    Menampilkan Data Untuk Tahun {{$currentYear}}
                    <div class="table-responsive">
                        <table class="display" id="basic-100">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Bulan</th>
                                    <th>Jumlah Pasien</th>
                                    <th>Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Januari</td>
                                    <td>{{$januari}} Pasien</td>
                                    <td>
                                        <a href="{{route('laporan.index',['tahun' => $currentYear, 'bulan' => 1])}}" class="btn btn-primary">Detail</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Februari</td>
                                    <td>{{$februari}} Pasien</td>
                                     <td>
                                        <a href="{{route('laporan.index',['tahun' => $currentYear, 'bulan' => 2])}}" class="btn btn-primary">Detail</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Maret</td>
                                    <td>{{$maret}} Pasien</td>
                                     <td>
                                        <a href="{{route('laporan.index',['tahun' => $currentYear, 'bulan' => 3])}}" class="btn btn-primary">Detail</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>April</td>
                                    <td>{{$april}} Pasien</td>
                                     <td>
                                        <a href="{{route('laporan.index',['tahun' => $currentYear, 'bulan' => 4])}}" class="btn btn-primary">Detail</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Mei</td>
                                    <td>{{$mei}} Pasien</td>
                                     <td>
                                        <a href="{{route('laporan.index',['tahun' => $currentYear, 'bulan' => 5])}}" class="btn btn-primary">Detail</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>Juni</td>
                                    <td>{{$juni}} Pasien</td>
                                     <td>
                                        <a href="{{route('laporan.index',['tahun' => $currentYear, 'bulan' => 6])}}" class="btn btn-primary">Detail</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>Juli</td>
                                    <td>{{$juli}} Pasien</td>
                                     <td>
                                        <a href="{{route('laporan.index',['tahun' => $currentYear, 'bulan' => 7])}}" class="btn btn-primary">Detail</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td>Agustus</td>
                                    <td>{{$agustus}} Pasien</td>
                                     <td>
                                        <a href="{{route('laporan.index',['tahun' => $currentYear, 'bulan' => 8])}}" class="btn btn-primary">Detail</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>9</td>
                                    <td>September</td>
                                    <td>{{$september}} Pasien</td>
                                     <td>
                                        <a href="{{route('laporan.index',['tahun' => $currentYear, 'bulan' => 9])}}" class="btn btn-primary">Detail</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>10</td>
                                    <td>Oktober</td>
                                    <td>{{$oktober}} Pasien</td>
                                     <td>
                                        <a href="{{route('laporan.index',['tahun' => $currentYear, 'bulan' => 10])}}" class="btn btn-primary">Detail</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>11</td>
                                    <td>November</td>
                                    <td>{{$november}} Pasien</td>
                                     <td>
                                        <a href="{{route('laporan.index',['tahun' => $currentYear, 'bulan' => 11])}}" class="btn btn-primary">Detail</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>12</td>
                                    <td>Desember</td>
                                    <td>{{$desember}} Pasien</td>
                                     <td>
                                        <a href="{{route('laporan.index',['tahun' => $currentYear, 'bulan' => 12])}}" class="btn btn-primary">Detail</a>
                                    </td>
                                </tr>

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
@vite('resources/js/app-vue.js')
<script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script>
<script src="{{asset('assets/js/select2/select2.full.min.js')}}"></script>
<script src="{{asset('assets/js/select2/select2-custom.js')}}"></script>

<script src="{{asset('assets/js/datepicker/date-picker/datepicker.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-picker/datepicker.en.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-picker/datepicker.custom.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $("#basic-100").dataTable({
            "paging": false
        });
    });
    function cari() {
        location.href = "{{route('laporan.index')}}/" + $("#tahun").val();
    }
</script>
@endsection