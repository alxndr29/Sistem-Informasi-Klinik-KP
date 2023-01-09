@extends('layouts.simple.master')
@section('title', 'Satuan Produk')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/date-picker.css')}}">
@endsection

@section('breadcrumb-title')
    <h3>Data Piutang</h3>
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
                                <h3>Daftar Data Piutang<h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="basic-1">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Poli Tujuan</th>
                                    <th>Dokter Tujuan</th>
                                    <th>Status</th>
                                    <th>Jam Datang</th>
                                    <th>Jam Selesai</th>
                                    <th>Tarif Obat</th>
                                    <th>Tarif Periksa</th>
                                    <th>Aksi</th>
                                </tr>

                                </thead>
                                <tbody>
                                @foreach ($kunjungan as $key => $value)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$value->pasien->nama_lengkap}}</td>
                                        <td>{{$value->poli->nama_lengkap}}</td>
                                        <td>{{$value->dokter->nama_lengkap}}</td>
                                        <td>{{$value->status}}</td>
                                        <td>{{$value->jam_datang}}</td>
                                        @if ($value->jam_selesai == null)
                                            <td></td>
                                        @else
                                            <td>{{$value->jam_selesai}}</td>
                                        @endif
                                        <td>Rp. {{number_format($value->tarif_obat)}}</td>
                                        <td>Rp. {{number_format($value->tarif_periksa)}}</td>
                                        <td>
                                            <a href="{{route('piutang.edit',$value->idkunjungan)}}" class="btn btn-primary">Detail</a>
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
    @vite('resources/js/app-vue.js')
    <script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script>
    <script src="{{asset('assets/js/select2/select2.full.min.js')}}"></script>
    <script src="{{asset('assets/js/select2/select2-custom.js')}}"></script>

    <script src="{{asset('assets/js/datepicker/date-picker/datepicker.js')}}"></script>
    <script src="{{asset('assets/js/datepicker/date-picker/datepicker.en.js')}}"></script>
    <script src="{{asset('assets/js/datepicker/date-picker/datepicker.custom.js')}}"></script>
@endsection
