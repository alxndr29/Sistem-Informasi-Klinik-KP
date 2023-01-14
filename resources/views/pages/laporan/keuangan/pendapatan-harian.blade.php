@extends('layouts.simple.master')
@section('title', 'Pendapatan Harian')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/date-picker.css')}}">
@endsection

@section('breadcrumb-title')
    <h3>Pendapatan Harian</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Laporan</li>
    <li class="breadcrumb-item active">Pendapatan Harian</li>
@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card p-4">
                    <form action="{{route('pendapatan-harian')}}">
                        <div class="row">
                            <div class="col-6">
                                <label class="form-label" for="months">Tahun</label>
                                <select class="form-select digits" id="tahun" name="tahun">
                                    @for($i = 2020; $i < 2025; $i++)
                                        <option {{$i == $year ? 'selected' : ''}} value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-3">
                                <label class="form-label" for="months">Bulan</label>
                                <select class="form-select digits" id="tahun" name="bulan">
                                    @foreach($dataBulan as $item)
                                        <option {{$item->id == $month ? 'selected' : ''}} value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
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
                            Menampilkan Data Keuangan Tahun & Bulan : <span class="fw-bold f-16">{{$year}} & Bulan {{$month}}</span>
                            <span class="float-end fw-bold f-16">Rp. {{number_format($grandTotal,0,',','.') }}</span>
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
                                    <th class="text-center">Tanggal</th>
                                    <th class="text-center">Total Pendapatan</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($pendapatanHarian as $item)
                                    <tr>
                                        <td class="text-center">{{$item->tanggal}}</td>
                                        <td class="text-center">Rp. {{number_format($item->totalPendapatan,0,',','.') }}</td>
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
