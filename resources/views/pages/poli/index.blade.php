@extends('layouts.simple.master')
@section('title', 'Satuan Produk')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/date-picker.css')}}">
@endsection

@section('breadcrumb-title')
<h3>Master Data Poli</h3>
@endsection

@section('breadcrumb-items')

<li class="breadcrumb-item">Manajemen Klinik</li>
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
                            <h3>Daftar Data Poli<h3>
                        </div>
                        <div class="">
                            <a class="btn btn-primary" href="{{route('poli.create')}}">Tambah Data Poli</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display" id="basic-1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Lengkap</th>
                                    <th>Tanggal Ditambahkan</th>
                                    <th>Tanggal Diubah Terakhir</th>
                                    <!-- <th>Detail</th> -->
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($poli as $key => $value)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$value->nama_lengkap}}</td>
                                    <td>{{$value->created_at}}</td>
                                    <td>{{$value->updated_at}}</td>
                                    <td>
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('poli.destroy', $value->idpoli) }}" method="POST">
                                            <a href="{{route('poli.edit', $value->idpoli)}}"
                                                   class="btn btn-warning text-dark  me-2">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-xs" type="submit">
                                                Delete
                                            </button>
                                        </form>
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
