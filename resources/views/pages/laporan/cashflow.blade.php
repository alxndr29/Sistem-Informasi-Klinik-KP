@extends('layouts.simple.master')
@section('title', 'Cashflow')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
@endsection

@section('breadcrumb-title')
    <h3>Cashflow</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">
        Penyimpanan
    </li>
    <li class="breadcrumb-item active">Cashflow</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Zero Configuration  Starts-->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="basic-1">
                                <thead>
                                <tr>

                                    <th class="text-center">Bulan</th>
                                    <th class="text-center">Pemasukan</th>
                                    <th class="text-center">Piutang</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $i = 0;
                                @endphp
                                @for($i =0; $i <12;$i++)
                                    <tr>
                                        <td class="text-center">Bulan {{$i}} Januari</td>
                                        <td class="text-center">{{number_format(random_int(1000000,1500000),0,',','.') }}</td>
                                        <td class="text-center">{{number_format(random_int(1000000,1500000),0,',','.') }}</td>
                                    </tr>
                                @endfor
{{--                                @foreach($cashflowByMonth as $item)--}}
{{--                                    <tr>--}}
{{--                                        <td>{{$i += 1}}</td>--}}
{{--                                        <td>{{$item->bulan}}</td>--}}
{{--                                        <td style="text-align:right;">{{number_format($item->pemasukan,0,',','.') }}</td>--}}
{{--                                        <td style="text-align:right;">{{number_format($item->pengeluaran,0,',','.') }}</td>--}}
{{--                                        <td style="text-align:right;">{{number_format($item->piutang,0,',','.') }}</td>--}}
{{--                                        <td style="text-align:right;">{{number_format($item->hutang,0,',','.') }}</td>--}}
{{--                                    </tr>--}}
{{--                                @endforeach--}}
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script>
@endsection
