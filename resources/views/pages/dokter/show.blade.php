@extends('layouts.simple.master')
@section('title', 'Detail Dokter')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/date-picker.css')}}">
@endsection

@section('breadcrumb-title')
<h3>Detail Dokter</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">
    Pelayanan
</li>
<li class="breadcrumb-item active">Data Dokter</li>
@endsection

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Data Diri Dokter</h5>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label">Nama Lengkap</label>
                                <input class="form-control" type="text" value="{{$dokter->nama_lengkap}}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label">Tempat Lahir</label>
                                <input class="form-control" type="text" value="{{$dokter->tempat_lahir}}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label">Tanggal Lahir</label>
                                <input class="form-control" type="date" value="{{$dokter->tanggal_lahir}}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div>
                                <label class="form-label">Alamat</label>
                                <textarea class="form-control" rows="3" readonly>{{$dokter->alamat}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label class="form-label">Jenis Kelamin</label>
                            @if($dokter->jenis_kelamin == "Perempuan")
                            <div class="m-t-15 m-checkbox-inline custom-radio-ml">
                                <div class="form-check form-check-inline radio radio-primary">
                                    <input class="form-check-input" id="radioinline1" type="radio" name="jenis_kelamin" value="Laki-laki" disabled>
                                    <label class="form-check-label mb-0" for="radioinline1">Laki-laki</label>
                                </div>
                                <div class="form-check form-check-inline radio radio-primary">
                                    <input class="form-check-input" id="radioinline2" type="radio" name="jenis_kelamin" value="Perempuan" checked disabled>
                                    <label class="form-check-label mb-0" for="radioinline2">Perempuan</label>
                                </div>
                            </div>
                            @else
                            <div class="m-t-15 m-checkbox-inline custom-radio-ml">
                                <div class="form-check form-check-inline radio radio-primary">
                                    <input class="form-check-input" id="radioinline1" type="radio" name="jenis_kelamin" value="Laki-laki" checked disabled>
                                    <label class="form-check-label mb-0" for="radioinline1">Laki-laki</label>
                                </div>
                                <div class="form-check form-check-inline radio radio-primary">
                                    <input class="form-check-input" id="radioinline2" type="radio" name="jenis_kelamin" value="Perempuan" disabled>
                                    <label class="form-check-label mb-0" for="radioinline2">Perempuan</label>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div class="">
                            <h3>Riwayat Penanganan Pasien<h3>
                        </div>
                        <div class="">

                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display" id="basic-1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Jam Datang</th>
                                    <th>Jam Selesai</th>
                                    <th>Pasien</th>
                                    <th>Poli</th>
                                    <th>Hasil Diagnsoa</th>
                                    <th>Tarif Berobat</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dokter->kunjungan as $key => $value)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$value->tanggal}}</td>
                                    <td>{{$value->jam_datang}}</td>
                                    <td>{{$value->jam_selesai}}</td>
                                    <td>{{$value->pasien->nama_lengkap}}</td>
                                    <td>{{$value->poli->nama_lengkap}}</td>
                                    <td>{{$value->hasil_diagnosa}}</td>
                                    @if ($value->tarif_obat == null)
                                    <td>Rp. {{$value->tarif_obat}}</td>
                                    @else
                                    <td>Belum Ada</td>
                                    @endif

                                    <!-- <td>{{$value->status}}</td> -->
                                    <td><span class="badge badge-success">{{$value->status}}</span></td>
                                </tr>
                                @endforeach
                                <!-- <tr>
                                    <td>No</td>
                                    <td>Nama</td>
                                    <td>Poli Tujuan</td>
                                    <td>Jam Datang</td>
                                    <td>Jam Selesai</td>
                                    <td>Tarif Obat</td>
                                    <td>Tarif Periksa</td>
                                    <td><span class="badge badge-success"></span></td>
                                </tr> -->
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
