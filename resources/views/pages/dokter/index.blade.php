@extends('layouts.simple.master')
@section('title', 'Daftar Dokter')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/date-picker.css')}}">
@endsection

@section('breadcrumb-title')
<h3>Master Data Dokter</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">
    Dashboard
</li>
<li class="breadcrumb-item">Manajemen User</li>
<li class="breadcrumb-item active">Daftar Dokter</li>
@endsection

@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            @if ($message = Session::get('success'))
                <div class="alert alert-success dark alert-dismissible fade show" role="alert">
                    <strong>Berhasil</strong> {{$message}}
                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-primary" href="{{route('daftar-dokter.create')}}">Tambah Dokter Baru</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display" id="basic-1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Lengkap</th>
                                    <th>TTL</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Alamat</th>
                                    <th>Poli</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dokter as $key => $value)
                                <tr>
                                    <td>{{$key+1}}</td>

                                    <td>{{$value->nama_lengkap}}</td>
                                    <td>{{$value->tempat_lahir}}, {{$value->tanggal_lahir}}</td>
                                    <td><span class="badge badge-{{$value->jenis_kelamin == "Laki-laki" ? 'primary' : 'secondary'}}">{{$value->jenis_kelamin}}</span></td>
                                    <td>{{$value->alamat}}</td>
                                    <td>{{$value->poli->nama_lengkap}}</td>
                                    <td>
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                              action="{{ route('daftar-dokter.destroy', $value->iddokter) }}"
                                              method="POST">
                                            <a href="{{route('daftar-dokter.show', $value->iddokter)}}"
                                               class="btn btn-info btn-xl me-2">Detail</a>
                                            <a href="{{route('daftar-dokter.edit', $value->iddokter)}}"
                                               class="btn btn-warning btn-xl me-2">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-xl" type="submit">
                                                Delete
                                            </button>
                                        </form>
{{--                                        <a class="btn btn-success me-2" href="{{route('dokter.show',$value->iddokter)}}">--}}
{{--                                            Detail--}}
{{--                                        </a>--}}
{{--                                        <a class="btn btn-warning me-2" href="{{route('dokter.edit',$value->iddokter)}}">--}}
{{--                                            Edit--}}
{{--                                        </a>--}}
{{--                                        <a class="btn btn-danger" href="{{route('dokter.edit',$value->iddokter)}}">--}}
{{--                                            Delete--}}
{{--                                        </a>--}}
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
@endsection
