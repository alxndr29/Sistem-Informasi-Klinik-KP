@extends('layouts.simple.master')
@section('title', 'Form Tambah Obat')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/date-picker.css')}}">
@endsection

@section('breadcrumb-title')
<h3>Tambah Data Obat Baru</h3>
@endsection

@section('breadcrumb-items')

@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Form Data Obat Baru</h5>
                </div>
                <form method="post" action="{{route('obat.store')}}" class="form theme-form">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label">Nama</label>
                                    <input class="form-control" type="text" placeholder="Masukan Nama Obat" data-bs-original-title="" title="" name="nama" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label">Harga</label>
                                    <input class="form-control" type="number" placeholder="Masukan Harga Obat" data-bs-original-title="" title="" name="harga" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label">Kategori</label>
                                    <select class="form-select" aria-label="Default select example" name="kategori">
                                        @foreach ($kategori as $value)
                                        <option value="{{$value->name}}">{{$value->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label">Satuan</label>
                                    <select class="form-select" aria-label="Default select example" name="satuan">
                                        <option value="Strip" selected>Strip</option>
                                        <option value="Tablet">Tablet</option>
                                        <option value="Sirup">Sirup</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button class="btn btn-primary" type="submit" data-bs-original-title="" title="">Submit</button>
                        <input class="btn btn-light" type="reset" value="Cancel" data-bs-original-title="" title="">
                    </div>
                </form>
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