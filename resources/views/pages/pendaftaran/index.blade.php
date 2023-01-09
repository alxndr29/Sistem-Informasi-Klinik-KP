@extends('layouts.simple.master')
@section('title', 'Pendaftaran Pasien')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/date-picker.css')}}">
@endsection

@section('breadcrumb-title')
    <h3>Pendaftaran Pasien</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">
        <a href="{{route('dashboard.index')}}">Home</a>
    </li>
    <li class="breadcrumb-item">
        Pelayanan
    </li>
    <li class="breadcrumb-item active">Pendaftaran Pasien</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs border-tab nav-primary" id="info-tab" role="tablist">
                            <li class="nav-item"><a class="nav-link active" id="info-home-tab" data-bs-toggle="tab"
                                                    href="#info-home" role="tab" aria-controls="info-home"
                                                    aria-selected="true" data-bs-original-title="" title=""><i
                                        class="icofont icofont-ui-home"></i>Cari Pasien</a></li>
                            <li class="nav-item"><a class="nav-link" id="profile-info-tab" data-bs-toggle="tab"
                                                    href="#info-profile" role="tab" aria-controls="info-profile"
                                                    aria-selected="false" data-bs-original-title="" title=""><i
                                        class="icofont icofont-man-in-glasses"></i>Pasien Baru</a></li>
                        </ul>
                        <div class="tab-content" id="info-tabContent">
                            <div class="tab-pane fade active show" id="info-home" role="tabpanel"
                                 aria-labelledby="info-home-tab">
                                <div class="row">
                                    <div class="table-responsive">
                                        <table class="display" id="basic-1">
                                            <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nama Pasien</th>
                                                <th>Usia</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Aksi</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @foreach($pasien as $data_pasien)
                                                <tr>

                                                    <td>{{$i++}}</td>
                                                    <td>{{$data_pasien->nama_lengkap}}</td>
                                                    <td>{{$data_pasien->jenis_kelamin}}</td>
                                                    <td>{{$data_pasien->tempat_lahir}}
                                                        , {{$data_pasien->tanggal_lahir}}</td>
                                                    <td>
                                                        <button class="btn btn-sm btn-primary">Daftar</button>
                                                    </td>


                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="info-profile" role="tabpanel"
                                 aria-labelledby="profile-info-tab">
                                <form method="post" action="{{route('pendaftaran.store')}}" class="form theme-form">
                                    @csrf
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label class="form-label">Tanggal:</label>
                                                <input class="form-control" type="date" name="tanggal" readonly
                                                       value="@php echo date('Y-m-d'); @endphp">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label class="form-label">Pilih Pasien</label>
                                                <select class="form-select digits" name="pasien" id="pasien" required>
                                                    <!-- <option value="" selected>-- Pilih Pasien --</option> -->
                                                    @foreach ($pasien as $value)
                                                        <option
                                                            value="{{$value->idpasien}}">{{$value->nama_lengkap}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label class="form-label">Pilih Poli</label>
                                                <select class="form-select digits" name="poli" id="poli" required>
                                                    <!-- <option value="" selected>-- Pilih Poli --</option> -->
                                                    @foreach ($poli as $value)
                                                        <option
                                                            value="{{$value->idpoli}}">{{$value->nama_lengkap}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label class="form-label">Pilih Dokter</label>
                                                <select class="form-select digits" name="dokter" id="dokter" required>
                                                    <!-- <option value="" selected>-- Pilih Dokter --</option> -->
                                                    @foreach ($dokter as $value)
                                                        <option
                                                            value="{{$value->iddokter}}">{{$value->nama_lengkap}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div>
                                                <label class="form-label">Keluhan / Diagnosa Awal</label>
                                                <textarea class="form-control" rows="3" name="diagnosa_awal"
                                                          required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-end">
                                        <button class="btn btn-primary" type="submit" data-bs-original-title=""
                                                title="">Submit
                                        </button>
                                        <input class="btn btn-light" type="reset" value="Cancel"
                                               data-bs-original-title="" title="">
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="info-contact" role="tabpanel"
                                 aria-labelledby="contact-info-tab">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                    unknown printer took a galley of type and scrambled it to make a type specimen book.
                                    It has survived not only five centuries, but also the leap into electronic
                                    typesetting, remaining essentially unchanged. It was popularised in the 1960s with
                                    the release of Letraset sheets containing Lorem Ipsum passages, and more recently
                                    with desktop publishing software like Aldus PageMaker including versions of Lorem
                                    Ipsum</p>
                            </div>
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

    <script type="text/javascript">
        $(document).ready(function () {
            $('#pasien').select2();
            $('#poli').select2();
            $('#dokter').select2();
        });
    </script>

@endsection
