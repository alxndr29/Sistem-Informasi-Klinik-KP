@extends('layouts.simple.master')
@section('title', 'Edit Dokter')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/date-picker.css')}}">
@endsection

@section('breadcrumb-title')
<h3>Edit Data Dokter - {{$dokter->nama_lengkap}}</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Manajemen User</li>
<li class="breadcrumb-item"><a href="{{route('daftar-dokter.index')}}">Daftar Dokter</a></li>
<li class="breadcrumb-item active">Edit Dokter</li>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div class="">
                            <h5>Form Ubah Data Dokter</h5>
                        </div>
                    </div>
                </div>
                <form method="post" action="{{route('dokter.update',$dokter->iddokter)}}" class="form theme-form">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label">Nama Lengkap</label>
                                    <input value="{{$dokter->nama_lengkap}}" class="form-control" type="text" placeholder="Masukan Nama Lengkap" data-bs-original-title="" title="" name="nama_lengkap" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label">Tempat Lahir</label>
                                    <input value="{{$dokter->tempat_lahir}}" class="form-control" type="text" placeholder="Masukan Tempat Lahir" data-bs-original-title="" title="" name="tempat_lahir" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label">Tanggal Lahir</label>
                                    <input value="{{$dokter->tanggal_lahir}}" class="form-control" type="date" placeholder="Masukan Tempat Lahir" data-bs-original-title="" title="" name="tanggal_lahir" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div>
                                    <label class="form-label">Alamat</label>
                                    <textarea class="form-control" rows="3" name="alamat">{{$dokter->alamat}}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <label class="form-label">Jenis Kelamin</label>
                                @if($dokter->jenis_kelamin == "Perempuan")
                                <div class="m-t-15 m-checkbox-inline custom-radio-ml">
                                    <div class="form-check form-check-inline radio radio-primary">
                                        <input class="form-check-input" id="radioinline1" type="radio" name="jenis_kelamin" value="Laki-laki">
                                        <label class="form-check-label mb-0" for="radioinline1">Laki-laki</label>
                                    </div>
                                    <div class="form-check form-check-inline radio radio-primary">
                                        <input class="form-check-input" id="radioinline2" type="radio" name="jenis_kelamin" value="Perempuan" checked>
                                        <label class="form-check-label mb-0" for="radioinline2">Perempuan</label>
                                    </div>
                                </div>
                                @else
                                <div class="m-t-15 m-checkbox-inline custom-radio-ml">
                                    <div class="form-check form-check-inline radio radio-primary">
                                        <input class="form-check-input" id="radioinline1" type="radio" name="jenis_kelamin" value="Laki-laki" checked>
                                        <label class="form-check-label mb-0" for="radioinline1">Laki-laki</label>
                                    </div>
                                    <div class="form-check form-check-inline radio radio-primary">
                                        <input class="form-check-input" id="radioinline2" type="radio" name="jenis_kelamin" value="Perempuan">
                                        <label class="form-check-label mb-0" for="radioinline2">Perempuan</label>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label class="form-label">Poli</label>
                                <div class="mb-3">
                                    <select class="form-select digits" name="poli">
                                        @foreach ($poli as $value)
                                        <option value="{{$value->idpoli}}" {{ ($value->idpoli == $dokter->poli_idpoli) ? 'selected' : '' }}>{{$value->nama_lengkap}}</option>
                                        @endforeach
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
