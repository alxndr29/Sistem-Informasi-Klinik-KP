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
                                        class="icofont icofont-search"></i>Cari Pasien</a></li>
                            <li class="nav-item"><a class="nav-link" id="profile-info-tab" data-bs-toggle="tab"
                                                    href="#info-profile" role="tab" aria-controls="info-profile"
                                                    aria-selected="false" data-bs-original-title="" title=""><i
                                        class="icofont icofont-users"></i>Pendaftaran Pasien Baru</a></li>
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
                                                <th class="text-center">Nama Pasien</th>
                                                <th class="text-center">Usia</th>
                                                <th class="text-center">Jenis Kelamin</th>
                                                <th class="text-center">Terakhir Datang Pada Tanggal</th>
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
                                                    <td class="text-center">{{$data_pasien->nama_lengkap}}</td>
                                                    <td class="text-center">
                                                        23 Tahun
                                                    </td>
                                                    <td class="text-center"><span
                                                            class="badge badge-{{$data_pasien->jenis_kelamin == 'Laki-laki' ? 'primary' : 'secondary'}}">{{$data_pasien->jenis_kelamin}}</span></td>
                                                    <td class="text-center">
                                                        {{$data_pasien->tanggal_lahir}}</td>
                                                    <td>
                                                        <button class="btn btn-primary" type="button"
                                                                data-bs-toggle="modal" data-original-title="test"
                                                                data-bs-target="#exampleModal" data-bs-original-title=""
                                                                title="">Daftar
                                                        </button>
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
                                {{--                                <form method="post" action="{{route('pendaftaran.store')}}" class="form theme-form">--}}
                                {{--                                    @csrf--}}
                                {{--                                    <div class="row">--}}
                                {{--                                        <div class="col-6">--}}
                                {{--                                            <div class="mb-3">--}}
                                {{--                                                <label class="form-label">Tanggal:</label>--}}
                                {{--                                                <input class="form-control" type="date" name="tanggal" readonly--}}
                                {{--                                                       value="@php echo date('Y-m-d'); @endphp">--}}
                                {{--                                            </div>--}}
                                {{--                                        </div>--}}
                                {{--                                        <div class="col-6">--}}
                                {{--                                            <div class="mb-3">--}}
                                {{--                                                <label class="form-label">Tanggal:</label>--}}
                                {{--                                                <input class="form-control" type="date" name="tanggal" readonly--}}
                                {{--                                                       value="@php echo date('Y-m-d'); @endphp">--}}
                                {{--                                            </div>--}}
                                {{--                                        </div>--}}
                                {{--                                    </div>--}}
                                {{--                                    <div class="row">--}}
                                {{--                                        <div class="col">--}}
                                {{--                                            <div class="mb-3">--}}
                                {{--                                                <label class="form-label">Pilih Pasien</label>--}}
                                {{--                                                <select class="form-select digits" name="pasien" id="pasien" required>--}}
                                {{--                                                    <!-- <option value="" selected>-- Pilih Pasien --</option> -->--}}
                                {{--                                                    @foreach ($pasien as $value)--}}
                                {{--                                                        <option--}}
                                {{--                                                            value="{{$value->idpasien}}">{{$value->nama_lengkap}}</option>--}}
                                {{--                                                    @endforeach--}}
                                {{--                                                </select>--}}
                                {{--                                            </div>--}}
                                {{--                                        </div>--}}
                                {{--                                    </div>--}}
                                {{--                                    <div class="row">--}}
                                {{--                                        <div class="col">--}}
                                {{--                                            <div class="mb-3">--}}
                                {{--                                                <label class="form-label">Pilih Poli</label>--}}
                                {{--                                                <select class="form-select digits" name="poli" id="poli" required>--}}
                                {{--                                                    <!-- <option value="" selected>-- Pilih Poli --</option> -->--}}
                                {{--                                                    @foreach ($poli as $value)--}}
                                {{--                                                        <option--}}
                                {{--                                                            value="{{$value->idpoli}}">{{$value->nama_lengkap}}</option>--}}
                                {{--                                                    @endforeach--}}
                                {{--                                                </select>--}}
                                {{--                                            </div>--}}
                                {{--                                        </div>--}}
                                {{--                                    </div>--}}
                                {{--                                    <div class="row">--}}
                                {{--                                        <div class="col">--}}
                                {{--                                            <div class="mb-3">--}}
                                {{--                                                <label class="form-label">Pilih Dokter</label>--}}
                                {{--                                                <select class="form-select digits" name="dokter" id="dokter" required>--}}
                                {{--                                                    <!-- <option value="" selected>-- Pilih Dokter --</option> -->--}}
                                {{--                                                    @foreach ($dokter as $value)--}}
                                {{--                                                        <option--}}
                                {{--                                                            value="{{$value->iddokter}}">{{$value->nama_lengkap}}</option>--}}
                                {{--                                                    @endforeach--}}
                                {{--                                                </select>--}}
                                {{--                                            </div>--}}
                                {{--                                        </div>--}}
                                {{--                                    </div>--}}
                                {{--                                    <div class="row">--}}
                                {{--                                        <div class="col">--}}
                                {{--                                            <div>--}}
                                {{--                                                <label class="form-label">Keluhan / Diagnosa Awal</label>--}}
                                {{--                                                <textarea class="form-control" rows="3" name="diagnosa_awal"--}}
                                {{--                                                          required></textarea>--}}
                                {{--                                            </div>--}}
                                {{--                                        </div>--}}
                                {{--                                    </div>--}}
                                {{--                                    <div class="card-footer text-end">--}}
                                {{--                                        <button class="btn btn-primary" type="submit" data-bs-original-title=""--}}
                                {{--                                                title="">Submit--}}
                                {{--                                        </button>--}}
                                {{--                                        <input class="btn btn-light" type="reset" value="Cancel"--}}
                                {{--                                               data-bs-original-title="" title="">--}}
                                {{--                                    </div>--}}
                                {{--                                </form>--}}
                                <form method="post" action="{{route('pendaftaran.store')}}" class="form theme-form">
                                    @csrf
                                    <div class="row gy-4">
                                        <div class="col-6">
                                            <label class="form-label" for="exampleFormControlInput1">Nama
                                                Pasien</label>
                                            <input class="form-control form-control-lg"
                                                   id="exampleFormControlInput1" type="name"
                                                   placeholder="Masukan nama pasien">
                                        </div>
                                        <div class="col-6">
                                            <div class=" m-checkbox-inline custom-radio-ml">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="card mb-0 p-4">
                                                            <div class="form-check form-check-inline radio radio-primary">
                                                                <input class="form-check-input" id="radioinline1" type="radio" name="radio1" value="option1">
                                                                <label class="form-check-label mb-0 f-14" for="radioinline1">Laki-laki</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="card mb-0 p-4">
                                                            <div class="form-check form-check-inline radio radio-primary">
                                                                <input class="form-check-input" id="radioinline2" type="radio" name="radio1" value="option1">
                                                                <label class="form-check-label mb-0" for="radioinline2">Perempuan</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label" for="exampleFormControlInput1">Umur Pasien</label>
                                            <input class="form-control form-control-lg"
                                                   id="exampleFormControlInput1" type="name"
                                                   placeholder="Masukan nama pasien">
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label" for="exampleFormControlInput1">Nomor Telefon</label>
                                            <input class="form-control form-control-lg"
                                                   id="exampleFormControlInput1" type="name"
                                                   placeholder="Masukan nama pasien">
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label" for="exampleFormControlSelect9">Poliklinik</label>
                                            <select class="form-select form-control-lg digits" id="exampleFormControlSelect9">
                                                <option value="">Pilih Poliklinik</option>
                                                @foreach ($poli as $value)
                                                    <option
                                                        value="{{$value->idpoli}}">{{$value->nama_lengkap}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label">Dokter</label>
                                            <select class="form-select form-control-lg" name="dokter" required>
                                                <option value="">Pilih Dokter</option>
                                                @foreach ($dokter as $value)
                                                    <option
                                                        value="{{$value->iddokter}}">{{$value->nama_lengkap}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12">
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
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;"
         aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pendaftaran Pasien</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"
                            data-bs-original-title="" title=""></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('pendaftaran.store')}}" class="form theme-form">
                        @csrf
                        <div class="row gy-3">
                            <div class="col-6">
                                <label class="form-label" for="Pasien">Nama Pasien</label>
                                <input class="form-control form-control-lg" disabled id="Pasien" type="email"
                                       placeholder="name@example.com">
                            </div>
                            <div class="col-6">
                                <label class="form-label" for="exampleFormControlInput1">Jenis Kelamin</label>
                                <input class="form-control form-control-lg" disabled id="exampleFormControlInput1"
                                       type="email"
                                       placeholder="name@example.com">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Pilih Dokter</label>
                                <select class="form-select digits" name="dokter" id="dokter" required>
                                    <!-- <option value="" selected>-- Pilih Dokter --</option> -->
                                    @foreach ($dokter as $value)
                                        <option
                                            value="{{$value->iddokter}}">{{$value->nama_lengkap}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Pilih Poliklinik</label>
                                <select class="form-select digits" name="dokter" id="dokter" required>
                                    <!-- <option value="" selected>-- Pilih Dokter --</option> -->
                                    @foreach ($poli as $item)
                                        <option
                                            value="{{$item->idpoli}}">{{$item->nama_lengkap}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Keluhan / Diagnosa Awal</label>
                                <textarea class="form-control" rows="3" name="diagnosa_awal"
                                          required></textarea>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="row d-flex justify-content-end">
                        <div class="col-6">
                            <button class="btn btn-light" type="button" data-bs-dismiss="modal"
                                    data-bs-original-title=""
                                    title="">Close
                            </button>
                        </div>
                        <div class="col-6 w-50">
                            <button class="btn btn-primary" type="button" data-bs-original-title="" title="">Daftar
                            </button>
                        </div>
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
