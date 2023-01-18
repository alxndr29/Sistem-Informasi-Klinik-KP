@extends('layouts.simple.master')
@section('title', 'Daftar Pasien')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/date-picker.css')}}">
@endsection

@section('breadcrumb-title')
<h3>Master Data Pasien</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">
    Pelayanan
</li>
<li class="breadcrumb-item active">Daftar Pasien</li>
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
        <div class="col-12">
            <div class="card">
                <div class="card-header p-4">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h5>Daftar Pasien<h5>
                        </div>
                        <div class="">
                            <!-- <a class="btn btn-primary" href="{{route('pasien.create')}}">Tambah Data Pasien</a> -->
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
                                    <th>Umur</th>
                                    <th>Jenis Kelamin</th>
                                    <!-- <th>Alamat</th> -->
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pasien as $key => $value)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$value->nama_lengkap}}</td>
                                    <td>
                                        {{\Carbon\Carbon::parse($value->tanggal_lahir)->diff(\Carbon\Carbon::now())->format('%y Tahun, %m Bulan and %d Hari');}}
                                    </td>
                                    <td><span class="badge badge-{{$value->jenis_kelamin == "Laki-laki" ? 'primary' : 'secondary'}}">{{$value->jenis_kelamin}}</span></td>
                                    <!-- <td>{{$value->alamat}}</td> -->
                                    <td>
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('pasien.delete', $value->idpasien) }}" method="POST">
                                            <a class="btn btn-primary btn-sm me-2" href="{{route('pasien.show',$value->idpasien)}}">
                                                Detail
                                            </a>
                                            <a class="btn btn-warning btn-sm text-dark me-2" href="{{route('pasien.edit',$value->idpasien)}}">
                                                Edit
                                            </a>
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

<script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script>
<script src="{{asset('assets/js/select2/select2.full.min.js')}}"></script>
<script src="{{asset('assets/js/select2/select2-custom.js')}}"></script>

<script src="{{asset('assets/js/datepicker/date-picker/datepicker.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-picker/datepicker.en.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-picker/datepicker.custom.js')}}"></script>
@endsection
