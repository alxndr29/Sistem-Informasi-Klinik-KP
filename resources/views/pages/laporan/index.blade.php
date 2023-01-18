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
        <div class="col-sm-12">
            <div class="card p-4">
                <div class="row">
                    <div class="col-9">
                        <label class="form-label" for="months">Tahun</label>
                        <select class="form-select digits" id="tahun">
                            <option value="2022">2022</option>
                            <option selected value="2023">2023</option>
                        </select>
                    </div>
                    <div class="col-3">
                        <button class="btn btn-lg btn-primary w-100 mt-4" id='btn-cari' onClick="cari()">Cari Data</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card p-4 bg-info">
                <div class="row">
                    <div class="col-12 ">
                        Menampilkan Data Keuangan Tahun :  {{$currentYear}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display" id="basic-100">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Bulan</th>
                                    <th>Jumlah Pasien</th>
                                    <th>Total Pendapatan</th>
                                    <th>Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $value)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$value->name}}</td>
                                    <td>{{$value->totalPasien}} Pasien</td>
                                    <td>Rp. {{number_format($value->totalPendapatan)}}</td>
                                    <td>
                                        <a href="{{route('laporan.index',['tahun' => $currentYear, 'bulan' => $value->id])}}" class="btn btn-primary">Detail</a>
                                    </td>
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
        $("#basic-100").dataTable({
            "paging": false
        });
    });

    function cari() {
        location.href = "{{route('laporan.index')}}/" + $("#tahun").val();
    }
</script>
@endsection
