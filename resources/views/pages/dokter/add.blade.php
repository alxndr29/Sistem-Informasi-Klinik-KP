@extends('layouts.simple.master')
@section('title', 'Tambah Dokter')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/date-picker.css')}}">
@endsection

@section('breadcrumb-title')
<h3>Tambah Dokter</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">
    Pelayanan
</li>
<li class="breadcrumb-item">Manajemen User</li>
<li class="breadcrumb-item"><a href="{{route('daftar-dokter.index')}}">Daftar Dokter</a></li>
<li class="breadcrumb-item active">Tambah Dokter</li>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Form Data Dokter Baru</h5>
                </div>
                <form method="post" action="{{route('daftar-dokter.store')}}" class="form theme-form">
                    @csrf
                    <div class="card-body">

                        <div class="row gy-3">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label">Nama Lengkap</label>
                                    <input class="form-control" type="text" placeholder="Masukan Nama Lengkap" data-bs-original-title="" title="" name="nama_lengkap" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label">Tempat Lahir</label>
                                    <input class="form-control" type="text" placeholder="Masukan Tempat Lahir" data-bs-original-title="" title="" name="tempat_lahir" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label">Tanggal Lahir</label>
                                    <input class="form-control" type="date" placeholder="Masukan Tempat Lahir" data-bs-original-title="" title="" name="tanggal_lahir" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div>
                                    <label class="form-label">Alamat</label>
                                    <textarea class="form-control" rows="3" name="alamat"></textarea>
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label">Email Login</label>
                                <input class="form-control" type="email" placeholder="Masukan Email" data-bs-original-title="" title="" name="email" required>
                            </div>
                            <div class="col-6">
                                <label class="form-label">Password</label>
                                <input class="form-control" type="password" placeholder="Masukan Password" data-bs-original-title="" title="" name="password" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Jenis Kelamin</label>
                                <div class="m-t-15 m-checkbox-inline custom-radio-ml">
                                    <div class="form-check form-check-inline radio radio-primary">
                                        <input class="form-check-input" id="radioinline1" type="radio" name="jenis_kelamin" value="Laki-laki">
                                        <label class="form-check-label mb-0" for="radioinline1">Laki-laki</label>
                                    </div>
                                    <div class="form-check form-check-inline radio radio-primary">
                                        <input class="form-check-input" id="radioinline2" type="radio" name="jenis_kelamin" value="Perempuan">
                                        <label class="form-check-label mb-0" for="radioinline2">Perempuan</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer text-end">
                        <button class="btn btn-primary" type="submit" data-bs-original-title="" title="">Submit</button>
                        <input class="btn btn-light" type="reset" value="Cancel" data-bs-original-title="" title="">
                    </div>
                </form>
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
