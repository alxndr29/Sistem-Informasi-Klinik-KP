@extends('layouts.simple.master')
@section('title', 'Form Tambah Pasien')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/date-picker.css')}}">
@endsection

@section('breadcrumb-title')
<h3>Tambah Data User Baru</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">
    Dashboard
</li>
<li class="breadcrumb-item"><a href="{{route('user-pengguna.index')}}">Daftar User</a></li>
<li class="breadcrumb-item active">Tambah User</li>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header p-4">
                    <h5>Form Data User Baru</h5>
                </div>
                <form method="post" action="{{route('user.store')}}" class="form theme-form">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label">Nama Lengkap</label>
                                    <input class="form-control" type="text" placeholder="Masukan Nama Lengkap" data-bs-original-title="" title="" name="nama" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input class="form-control" type="email" placeholder="Masukan Email Untuk Login" data-bs-original-title="" title="" name="email" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <input class="form-control" type="password" placeholder="Masukan Password" data-bs-original-title="" title="" name="password" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label">Role</label>
                                    <select class="form-select digits" name="role">
                                        <option value="Admin">Admin</option>
                                        <option value="Dokter" selected>Dokter</option>
                                    </select>
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

<script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script>
<script src="{{asset('assets/js/select2/select2.full.min.js')}}"></script>
<script src="{{asset('assets/js/select2/select2-custom.js')}}"></script>

<script src="{{asset('assets/js/datepicker/date-picker/datepicker.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-picker/datepicker.en.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-picker/datepicker.custom.js')}}"></script>
@endsection
