@extends('layouts.simple.master')
@section('title', 'Satuan Produk')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/date-picker.css')}}">
@endsection

@section('breadcrumb-title')
<h3>Pemeriksaan Pasien</h3>
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

                <div class="card-body">
                    <div class="row">
                        <div class="col-3">

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label">Tanggal:</label>
                                        <input class="form-control" type="date" value="{{$kunjungan->tanggal}}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label">Pasien:</label>
                                        <input class="form-control" type="text" value="{{$kunjungan->pasien->nama_lengkap}}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label">Poli:</label>
                                        <input class="form-control" type="text" value="{{$kunjungan->poli->nama_lengkap}}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label">Dokter:</label>
                                        <input class="form-control" type="text" value="{{$kunjungan->dokter->nama_lengkap}}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div>
                                        <label class="form-label">Keluhan / Diagnosa Awal</label>
                                        <textarea class="form-control" rows="3" readonly>{{$kunjungan->diagnosa_awal}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col">
                                    <div>
                                        <label class="form-label">Diagnosa Dokter</label>
                                        <textarea id="hasil_diagnosa" class="form-control" rows="3" placeholder="isi diagnosa disini" readonly>{{$kunjungan->hasil_diagnosa}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col">
                                    <!-- <button type="submit" class="btn btn-success">Simpan</button> -->
                                </div>
                            </div>

                        </div>
                        <div class="col">
                            Daftar Obat:
                            <br>
                            <br>
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="display" id="data-obat">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Obat</th>
                                                    <th>Satuan</th>
                                                    <th>Dosis</th>
                                                    <th>Jumlah</th>
                                                    <th>Total Harga</th>
                                                </tr>
                                            </thead>
                                            <tbody id="isi-data-obat">
                                                @foreach ($kunjungan->obat as $key => $value)
                                                <tr>
                                                    <td>{{$key+1}}</td>
                                                    <td>{{$value->nama}}</td>
                                                    <td>{{$value->satuan}}</td>
                                                    <td>{{$value->pivot->keterangan}}</td>
                                                    <td>{{$value->pivot->jumlah}}</td>
                                                    <td>Rp. {{number_format($value->pivot->harga * $value->pivot->jumlah)}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <br>
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            Biaya Obat
                                        </div>
                                        <div id="biaya-obat">
                                            Rp. {{number_format($kunjungan->tarif_obat)}}
                                        </div>
                                    </div>
                                    <br>
                                    <form method="post" action="{{route('piutang.update', $kunjungan->idkunjungan)}}" class="form theme-form">
                                        <div class="row">
                                            <div class="col">
                                                Metode Pembayaran:
                                            </div>
                                            @method('put')
                                            @csrf
                                             <div class="col">
                                                <b>{{$kunjungan->metode_pembayaran}}</b>
                                            </div>

                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col">
                                                <button type="submit" class="btn btn-success">Sudah Lunas</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

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
    $(document).ready(function() {
        $("#data-obat").DataTable({
            paging: false,
            searching: false
        });
    });
</script>

@endsection