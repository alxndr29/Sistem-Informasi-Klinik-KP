@extends('layouts.simple.master')
@section('title', 'Satuan Produk')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/date-picker.css')}}">
@endsection

@section('breadcrumb-title')
<h3>Buat Transaksi Baru</h3>
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
                            <h3>Daftar Data Pasien<h3>
                        </div>
                        <div class="">
                            <a class="btn btn-primary" href="{{route('pasien.create')}}">Tambah Data Pasien</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display" id="basic-1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIK</th>
                                    <th>BPJS No</th>
                                    <th>Nama</th>
                                    <th>TTL</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Alamat</th>
                                    <th>Pekerjaan</th>
                                    <th>Agama</th>
                                    <th>Detail</th>
                                    <th>Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pasien as $key => $value)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$value->nik}}</td>
                                    <td>{{$value->no_bpjs}}</td>
                                    <td>{{$value->nama_lengkap}}</td>
                                    <td>{{$value->tempat_lahir}}, {{$value->tanggal_lahir}}</td>
                                    <td>{{$value->alamat}}</td>
                                    <td>{{$value->jenis_kelamin}}</td>
                                    <td>{{$value->pekerjaan}}</td>
                                    <td>{{$value->agama}}</td>
                                    <td>
                                        <a class="btn btn-success" href="{{route('pasien.show',$value->idpasien)}}">
                                            Detail
                                        </a>
                                    </td>
                                    <td>
                                        <a class="btn btn-warning" href="{{route('pasien.edit',$value->idpasien)}}">
                                            Edit
                                        </a>
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