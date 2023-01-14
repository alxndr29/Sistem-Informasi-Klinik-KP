@extends('layouts.simple.master')
@section('title', 'Laporan Pasien Bulanan')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/date-picker.css')}}">
@endsection

@section('breadcrumb-title')
    <h3>Laporan Pasien Bulanan</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Laporan</li>
    <li class="breadcrumb-item active">Laporan Pasien Bulanan</li>
@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card p-4">
                    <form action="{{route('pasien-bulanan')}}">
                        <div class="row">
                            <div class="col-9">
                                <label class="form-label" for="months">Tahun</label>
                                <select class="form-select digits" id="tahun" name="tahun">
                                    @for($i = 2020; $i < 2025; $i++)
                                        <option {{$i == $year ? 'selected' : ''}} value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-3">
                                <button class="btn btn-lg btn-primary w-100 mt-4" id='btn-cari' onClick="cari()">Cari
                                    Data
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @php
            $i = 1;
        @endphp
        <div class="row">
            <div class="col-12">
                <div class="card p-4 bg-info">
                    <div class="row">
                        <div class="col-12 ">
                            Menampilkan Data Keuangan Tahun : <span class="fw-bold f-16">{{$year}}</span>
                            <span class="float-end fw-bold f-16">{{number_format($totalPasien,0,',','.') }} Orang</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="basic-100">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Bulan</th>
                                    <th>Total Pasien</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($TotalPasienBulanan as $item)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$item->bulan}}</td>
                                        <td>{{number_format($item->totalPasien,0,',','.') }} Orang</td>
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
            $("#basic-100").dataTable({
                "paging": false
            });
        });

        function cari() {
            location.href = "{{route('laporan.index')}}/" + $("#tahun").val();
        }
    </script>
@endsection
