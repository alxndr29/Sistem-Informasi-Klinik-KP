@extends('layouts.simple.master')
@section('title', 'Kategori Produk')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">

@endsection

@section('breadcrumb-title')
<h3>Daftar Kategori Produk</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">
    Konfigurasi
</li>
<li class="breadcrumb-item">Produk</li>
<li class="breadcrumb-item active">Daftar Kategori Produk</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card p-4">
                <div class="row">
                    <div class="col">
                        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg">Create
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @if ($message = Session::get('success'))
        <div class="alert alert-success dark alert-dismissible fade show" role="alert">
            <strong>Berhasil</strong> {{$message}}
            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <!-- Zero Configuration  Starts-->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display" id="basic-1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kategori</th>
                                    <th>Tanggal Ditambahkan</th>
                                    <th>Tanggal Diubah Terakhir</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i = 0;
                                @endphp
                                @foreach($categories as $category)
                                <tr>
                                    <td>{{$i += 1}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->created_at}}</td>
                                    <td>{{$category->updated_at}}</td>
                                    <td>
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('kategori.destroy', $category->id) }}" method="POST">
                                            <!-- <a href="{{route('kategori.edit', $category->id)}}"
                                                   class="btn btn-warning btn-xl me-2">Edit</a> -->
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-xs" type="submit">
                                                Delete
                                            </button>
                                        </form>
                                        <button class="btn btn-primary" type="button" onclick="" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal-{{$category->id}}" data-bs-original-title="" title="">Edit
                                        </button>
                                    </td>
                                </tr>
                                @endforeach

                                </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<x-modal-large title="Kategori Produk">
    <form method="POST" action="{{route('kategori.store')}}">
        @csrf
        <div class="modal-body">
            <div class="row gy-4">
                <div class="col-xl-12">
                    <label class="form-label" for="Kategori">Nama Kategori</label>
                    <input class="form-control form-control-lg" id="Kategori" placeholder="Masukan Kategori Produk" name="name">
                </div>
                <div class="col-12">
                    <label class="form-label" for="deskripsi">Deskripsi</label>
                    <textarea class="form-control form-control-lg" id="deskripsi" name="deskripsi" rows="3" placeholder="Masukan deskripsi produk"></textarea>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
            <button class="btn btn-primary" type="submit">Simpan</button>
        </div>
    </form>
</x-modal-large>

@foreach ($categories as $value)
<div class="modal fade" id="exampleModal-{{$value->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title="">
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('kategori.update', $value->id)}}">
                    @csrf
                    @method('put')
                    <div class="modal-body">
                        <div class="row gy-4">
                            <div class="col-xl-12">
                                <label class="form-label" for="Kategori">Nama Kategori</label>
                                <input class="form-control form-control-lg" value="{{$value->name}}"id="Kategori" placeholder="Masukan Kategori Produk" name="name">
                            </div>
                            <div class="col-12">
                                <label class="form-label" for="deskripsi">Deskripsi</label>
                                <textarea class="form-control form-control-lg" id="deskripsi" name="deskripsi" rows="3" placeholder="Masukan deskripsi produk">{{$value->deskripsi}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>
@endforeach
@endsection

@section('script')
<script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script>
<script src="{{asset('assets/js/select2/select2.full.min.js')}}"></script>
<script src="{{asset('assets/js/select2/select2-custom.js')}}"></script>
@endsection
