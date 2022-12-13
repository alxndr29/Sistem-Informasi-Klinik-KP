@extends('layouts.simple.master')
@section('title', 'Satuan Produk')

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
    Transaksi
</li>
<li class="breadcrumb-item">Pembelian</li>
<li class="breadcrumb-item active">Buat Transaksi</li>
@endsection

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h3>Pendaftaran Pasien<h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('pendaftaran.store')}}" class="form theme-form">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label">Tanggal:</label>
                                    <input class="form-control" type="date" name="tanggal" readonly value="@php echo date('Y-m-d'); @endphp">
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
                                        <option value="{{$value->idpasien}}">{{$value->nama_lengkap}}</option>
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
                                        <option value="{{$value->idpoli}}">{{$value->nama_lengkap}}</option>
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
                                        <option value="{{$value->iddokter}}">{{$value->nama_lengkap}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div>
                                    <label class="form-label">Keluhan / Diagnosa Awal</label>
                                    <textarea class="form-control" rows="3" name="diagnosa_awal" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button class="btn btn-primary" type="submit" data-bs-original-title="" title="">Submit</button>
                            <input class="btn btn-light" type="reset" value="Cancel" data-bs-original-title="" title="">
                        </div>
                    </form>
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
    $(document).ready(function() {
        $('#pasien').select2();
        $('#poli').select2();
        $('#dokter').select2();
    });
</script>

@endsection