@extends('layouts.simple.master')
@section('title', 'Form Tambah Pasien')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/date-picker.css')}}">
@endsection

@section('breadcrumb-title')
<h3>Ubah Data Pasien</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">
    Pelayanan
</li>
<li class="breadcrumb-item">Pelayanan</li>
<li class="breadcrumb-item active">Edit Pasien</li>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div class="">
                            <h5>Form Ubah Data Pasien</h5>
                        </div>
                        <div class="">
                            <form method="post" action="{{route('pasien.delete',$pasien->idpasien)}}">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </div>
                    </div>

                </div>
                <form method="post" action="{{route('pasien.update',$pasien->idpasien)}}" class="form theme-form">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <!-- <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label">Nomor NIK</label>
                                    <input value="{{$pasien->nik}}" class="form-control" type="number" placeholder="Masukan Nomor NIK" data-bs-original-title="" title="" name="nik" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label">Nomor BPJS</label>
                                    <input value="{{$pasien->no_bpjs}}" class="form-control" type="number" placeholder="Masukan Nomor BPJS" data-bs-original-title="" title="" name="no_bpjs" required>
                                </div>
                            </div>
                        </div> -->
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label">Nama Lengkap</label>
                                    <input value="{{$pasien->nama_lengkap}}" class="form-control" type="text" placeholder="Masukan Nama Lengkap" data-bs-original-title="" title="" name="nama_lengkap" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label">Tempat Lahir</label>
                                    <input value="{{$pasien->tempat_lahir}}" class="form-control" type="text" placeholder="Masukan Tempat Lahir" data-bs-original-title="" title="" name="tempat_lahir" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label">Tanggal Lahir</label>
                                    <input value="{{$pasien->tanggal_lahir}}" class="form-control" type="date" placeholder="Masukan Tempat Lahir" data-bs-original-title="" title="" name="tanggal_lahir" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div>
                                    <label class="form-label">Alamat</label>
                                    <textarea class="form-control" rows="3" name="alamat">{{$pasien->alamat}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label">Pekerjaan</label>
                                    <input class="form-control" type="text" value="{{$pasien->pekerjaan}}" placeholder="Masukan Pekerjaan" data-bs-original-title="" title="" name="pekerjaan" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label">Agama</label>
                                    <select class="form-select digits" name="agama">
                                        <option selected value="{{$pasien->agama}}">{{$pasien->agama}}</option>
                                        <option value="ISLAM">ISLAM</option>
                                        <option value="KRISTEN">KRISTEN</option>
                                        <option value="KATOLIK">KATOLIK</option>
                                        <option value="BUDHA">BUDHA</option>
                                        <option value="HINDU">HINDU</option>
                                        <option value="KONGFUCU">KONGFUCU</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label class="form-label">Jenis Kelamin</label>
                                @if($pasien->jenis_kelamin == "Perempuan")
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