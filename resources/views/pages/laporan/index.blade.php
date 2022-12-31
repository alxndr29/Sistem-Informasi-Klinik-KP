@extends('layouts.simple.master')
@section('title', 'Satuan Produk')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/date-picker.css')}}">
@endsection

@section('breadcrumb-title')
<h3>Laporan Uang</h3>
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
                    <div class="d-flex">
                        <div class="mr-auto p-2">
                            <h3>Laporan</h3>
                        </div>
                        <div class="p-2">
                            <select class="form-select digits" id="tahun">
                                <option selected value="2022">2022</option>
                                <option value="2021">2021</option>
                                <option value="2020">2020</option>

                            </select>
                        </div>
                        <div class="p-2">
                            <select class="form-select digits" id="bulan">
                                <option selected value="01">Januari</option>
                                <option value="02">Februari</option>
                                <option value="03">Maret</option>
                                <option value="04">April</option>
                                <option value="05">Mei</option>
                                <option value="06">Juli</option>
                                <option value="07">Juni</option>
                                <option value="08">Agustus</option>
                                <option value="09">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                        </div>
                        <div class="p-2">
                            <button type="button" class="btn btn-primary" onClick="cari()">Cari Data</button>
                        </div>
                    </div>
                    <div class="text-center">
                        Total Pendapatan: Rp. {{number_format($total)}}
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display" id="basic-1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nomor Kunjungan</th>
                                    <th>Tanggal Kunjungan</th>
                                    <th>Poliklinik</th>
                                    <th>Tipe Pembayaran</th>
                                    <th>Tarif Obat</th>
                                    <th>Tarif Periksa</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kunjungan as $key => $kunjungan)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$kunjungan->idkunjungan}}</td>
                                    <td>{{$kunjungan->tanggal}}</td>
                                    <td>{{$kunjungan->poli->nama_lengkap}}</td>
                                    <td>{{$kunjungan->metode_pembayaran}}</td>
                                    <td>Rp. {{number_format($kunjungan->tarif_obat)}}</td>
                                    <td>Rp. {{number_format($kunjungan->tarif_periksa)}}</td>
                                    <td>Rp. {{number_format($kunjungan->tarif_obat + $kunjungan->tarif_periksa)}}</td>
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
@endsection

<script type="text/javascript">
    function cari() {
        alert('hello world!');
        location.href = "{{route('laporan.index')}}/" + $("#bulan").val() + "/" + $("#tahun").val();
    }
</script>