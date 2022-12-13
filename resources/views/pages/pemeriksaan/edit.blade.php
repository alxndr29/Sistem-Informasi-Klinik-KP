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
                        <div class="col-4">
                            <form method="post" action="{{route('pendaftaran.store')}}" class="form theme-form">
                                @csrf
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
                                            <textarea class="form-control" rows="3" placeholder="isi diagnosa disini"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col">
                            Daftar Obat:
                            <br>
                            <br>
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-row">
                                        <div class="p-1">
                                            <label>Pilih Obat</label>
                                            <select class="form-select digits" id="exampleFormControlSelect9">
                                                @foreach($obat as $value)
                                                <option value="{{$value->idobat}}">{{$value->nama}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="p-1">
                                            <label>Pilih Dosis</label>
                                            <input class="form-control" type="text" name="inputPassword" placeholder="" data-bs-original-title="" title="">
                                        </div>
                                        <div class="p-1">
                                            <label>Pilih Jumlah</label>
                                            <input class="form-control" type="number" name="inputPassword" placeholder="" data-bs-original-title="" title="">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="table-responsive">
                                        <table class="display" id="data-obat">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Obat</th>
                                                    <th>Satuan</th>
                                                    <th>Dosis</th>
                                                    <th>Jumlah</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Obat A</td>
                                                    <td>Strip</td>
                                                    <td><input type="text" value="3x1"></td>
                                                    <td><input type="number" value="5"></td>
                                                    <td><button class="btn btn-danger" type="button" value="5">Hapus</button></td>
                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Obat A</td>
                                                    <td>Strip</td>
                                                    <td><input type="text" value="3x1"></td>
                                                    <td><input type="number" value="5"></td>
                                                    <td><button class="btn btn-danger" type="button" value="5">Hapus</button></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            Biaya Obat
                                        </div>
                                        <div>
                                            Rp. {{number_format(30000)}}
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            Biaya Pemeriksaan
                                        </div>
                                        <div>
                                            Rp. {{number_format(50000)}}
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            Grand Total
                                        </div>
                                        <div>
                                            Rp. {{number_format(80000)}}
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            Metode Pembayaran
                                        </div>
                                        <div class="col">
                                            <div class="m-t-15 m-checkbox-inline custom-radio-ml">
                                                <div class="form-check form-check-inline radio radio-primary">
                                                    <input class="form-check-input" id="radioinline1" type="radio" name="radio1" value="option1" data-bs-original-title="" title="" checked>
                                                    <label class="form-check-label mb-0" for="radioinline1">Cash</span></label>
                                                </div>
                                                <div class="form-check form-check-inline radio radio-primary">
                                                    <input class="form-check-input" id="radioinline1" type="radio" name="radio1" value="option1" data-bs-original-title="" title="">
                                                    <label class="form-check-label mb-0" for="radioinline1">Cash</span></label>
                                                </div>
                                                <div class="form-check form-check-inline radio radio-primary">
                                                    <input class="form-check-input" id="radioinline1" type="radio" name="radio1" value="option1" data-bs-original-title="" title="">
                                                    <label class="form-check-label mb-0" for="radioinline1">Cash</span></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label class="form-label">Masukan Nominal Pembayaran:</label>
                                                <input class="form-control" type="number" required>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="d-flex justify-content-end">
                                        <div>
                                            <button class="btn btn-success">Simpan</button>
                                        </div>
                                    </div>
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