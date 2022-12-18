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
                                            <textarea id="hasil_diagnosa" class="form-control" rows="3" placeholder="isi diagnosa disini"></textarea>
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
                                            <select class="form-select digits" id="select-obat">
                                                @foreach($obat as $value)
                                                <option value="{{$value->idobat}}">{{$value->nama}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="p-1">
                                            <label>Pilih Dosis</label>
                                            <!-- <input class="form-control" type="text" name="inputPassword" placeholder="" data-bs-original-title="" title=""> -->
                                            <select class="form-select digits" id="select-dosis">
                                                <option value="1x1">1x1</option>
                                                <option value="2x1">2x1</option>
                                                <option value="3x1">3x1</option>
                                            </select>
                                        </div>
                                        <div class="p-1">
                                            <label>Pilih Jumlah</label>
                                            <input class="form-control" id="jumlah" type="number" value="0" placeholder="" data-bs-original-title="" title="">
                                        </div>
                                        <div class="p-1">
                                            <label>Tulis Harga</label>
                                            <input class="form-control" id="harga" type="number" value="0" placeholder="" data-bs-original-title="" title="">
                                        </div>
                                        <div class="p-1">
                                            <label>Tambah</label>
                                            <button type="button" class="form-control btn btn-primary" onClick="tambahProduk()">+</button>
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
                                                    <th>Harga</th>
                                                    <th>Total</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody id="isi-data-obat">

                                            </tbody>
                                        </table>
                                    </div>
                                    <br>
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            Biaya Obat
                                        </div>
                                        <div id="biaya-obat">
                                            Rp. {{number_format(0)}}
                                        </div>
                                    </div>
                                    <br>
                                    <div class="d-flex justify-content-end">
                                        <div>
                                            <button class="btn btn-success" type="button" onClick="simpanData()">Simpan</button>
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
        $.ajax({
            type: 'GET',
            url: "{{route('obat.ajaxget')}}",
            data: {
                'aaa': 'aa'
            },
            success: function(data) {
                console.log(data);
            },
            error: function(data) {
                console.log(data);
            }
        });
        // display();
    });
    var daftar_produk = [];
    var counter = 0;
    var biaya_obat = 0;

    function tambahProduk() {
        daftar_produk[counter] = {};
        daftar_produk[counter].nama = $("#select-obat option:selected").text();
        daftar_produk[counter].obat_idobat = $("#select-obat option:selected").val();
        daftar_produk[counter].dosis = $("#select-dosis option:selected").text();
        daftar_produk[counter].jumlah = $("#jumlah").val();
        daftar_produk[counter].harga = $("#harga").val();
        daftar_produk[counter].keterangan = 0;
        counter++;
        console.log(daftar_produk);
        display();
    }

    function display() {
        biaya_obat = 0;
        daftar_produk = daftar_produk.filter(Boolean);
        $("#isi-data-obat").empty();
        $.each(daftar_produk, function(i, k) {
            biaya_obat = biaya_obat + (k.jumlah * k.harga);
            $("#isi-data-obat").append(
                '<tr>' +
                '<td>' + (i + 1) + '</td>' +
                '<td>' + k.nama + '</td>' +
                '<td>' + 'NN' + '</td>' +
                '<td>' + k.dosis + '</td>' +
                '<td>' + k.jumlah + '</td>' +
                '<td>Rp. ' + k.harga + '</td>' +
                '<td>Rp. ' + (k.jumlah * k.harga) + '</td>' +
                '<td>' + '<button type="button" class="btn btn-primary" onClick="hapus(' + k.obat_idobat + ')">Hapus</button>' + '</td>' +
                '</tr>'
            );
        });
        $("#jumlah").val(0);
        $("#harga").val(0);
        $("#biaya-obat").html('Rp. ' + biaya_obat);
    }

    function hapus(id) {
        daftar_produk = daftar_produk.filter(Boolean);
        $.each(daftar_produk, function(i, k) {
            alert(k.obat_idobat);
            if (id == k.obat_idobat) {
                daftar_produk.splice(i, 1);
            }
        });
        display();
    }

    function simpanData() {
        $.ajax({
            type: 'POST',
            url: "{{route('pemeriksaan.storedokter')}}",
            data: {
                '_token': "{{ csrf_token() }}",
                'daftar_produk': daftar_produk,
                'id': "{{$id}}",
                'biaya-obat': biaya_obat,
                'hasil_diagnosa': $("#hasil_diagnosa").val()
            },
            success: function(data) {
                console.log(data);
                if (data == "berhasil") {
                    alert(data);
                    
                }
            },
            error: function(data) {
                console.log(data);
            }
        });
    }
</script>

@endsection