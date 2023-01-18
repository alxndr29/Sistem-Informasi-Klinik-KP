@extends('layouts.simple.master')
@section('title', 'Daftar Dokter')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/date-picker.css')}}">
@endsection

@section('breadcrumb-title')
<h3>Master Data User</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">
    Manajemen User
</li>
<li class="breadcrumb-item active">Daftar User</li>
@endsection

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="row">
            @if ($message = Session::get('success'))
                <div class="alert alert-success dark alert-dismissible fade show" role="alert">
                    <strong>Berhasil</strong> {{$message}}
                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-primary" href="{{route('user.create')}}">Tambah Data User</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display" id="basic-1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jabatan</th>
                                    <th>Nama</th>
                                    <th>email</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $key => $value)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td><span class="badge badge-{{$value->role == 'Dokter' ? 'primary' : 'secondary'}}">{{$value->role}}</span></td>
                                    <td>{{$value->name}}</td>
                                    <td>{{$value->email}}</td>
                                    <td>
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                              action="{{ route('user-pengguna.destroy', $value->id) }}"
                                              method="POST">
                                            <a href="{{route('user-pengguna.edit', $value->id)}}"
                                               class="btn btn-warning btn-xl me-2">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-xs" type="submit">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
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

<script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script>
<script src="{{asset('assets/js/select2/select2.full.min.js')}}"></script>
<script src="{{asset('assets/js/select2/select2-custom.js')}}"></script>

<script src="{{asset('assets/js/datepicker/date-picker/datepicker.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-picker/datepicker.en.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-picker/datepicker.custom.js')}}"></script>
@endsection
