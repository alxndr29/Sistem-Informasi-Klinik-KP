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
                    Cashflow Tahun: {{$currentYear}}
                    <br>
                    <br>
                    <div class="table-responsive">

                        <table class="display" id="basic-1">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Bulan</th>
                                    <th class="text-center">Pemasukan</th>
                                    <th class="text-center">Piutang</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">1</td>
                                    <td class="text-center">Januari</td>
                                    <td class="text-center">Rp. {{ number_format($januari_pemasukan)}}</td>
                                    <td class="text-center">Rp. {{ number_format($januari_piutang)}}</td>
                                </tr>
                                <tr>
                                    <td class="text-center">2</td>
                                    <td class="text-center">Februari</td>
                                    <td class="text-center">Rp. {{ number_format($februari_pemasukan)}}</td>
                                    <td class="text-center">Rp. {{ number_format($februari_piutang)}}</td>
                                </tr>
                                <tr>
                                    <td class="text-center">3</td>
                                    <td class="text-center">Maret</td>
                                    <td class="text-center">Rp. {{ number_format($maret_pemasukan)}}</td>
                                    <td class="text-center">Rp. {{ number_format($maret_piutang)}}</td>
                                </tr>
                                <tr>
                                    <td class="text-center">4</td>
                                    <td class="text-center">April</td>
                                    <td class="text-center">Rp. {{ number_format($april_pemasukan)}}</td>
                                    <td class="text-center">Rp. {{ number_format($april_piutang)}}</td>
                                </tr>
                                <tr>
                                    <td class="text-center">5</td>
                                    <td class="text-center">mei</td>
                                    <td class="text-center">Rp. {{ number_format($mei_pemasukan)}}</td>
                                    <td class="text-center">Rp. {{ number_format($mei_piutang)}}</td>
                                </tr>
                                <tr>
                                    <td class="text-center">6</td>
                                    <td class="text-center">juni</td>
                                    <td class="text-center">Rp. {{ number_format($juni_pemasukan)}}</td>
                                    <td class="text-center">Rp. {{ number_format($juni_piutang)}}</td>
                                </tr>
                                <tr>
                                    <td class="text-center">7</td>
                                    <td class="text-center">juli</td>
                                    <td class="text-center">Rp. {{ number_format($juli_pemasukan)}}</td>
                                    <td class="text-center">Rp. {{ number_format($juli_piutang)}}</td>
                                </tr>
                                <tr>
                                    <td class="text-center">8</td>
                                    <td class="text-center">agustus</td>
                                    <td class="text-center">Rp. {{ number_format($agustus_pemasukan)}}</td>
                                    <td class="text-center">Rp. {{ number_format($agustus_piutang)}}</td>
                                </tr>
                                <tr>
                                    <td class="text-center">9</td>
                                    <td class="text-center">september</td>
                                    <td class="text-center">Rp. {{ number_format($september_pemasukan)}}</td>
                                    <td class="text-center">Rp. {{ number_format($september_piutang)}}</td>
                                </tr>
                                <tr>
                                    <td class="text-center">10</td>
                                    <td class="text-center">oktober</td>
                                    <td class="text-center">Rp. {{ number_format($oktober_pemasukan)}}</td>
                                    <td class="text-center">Rp. {{ number_format($oktober_piutang)}}</td>
                                </tr>
                                <tr>
                                    <td class="text-center">11</td>
                                    <td class="text-center">november</td>
                                    <td class="text-center">Rp. {{ number_format($november_pemasukan)}}</td>
                                    <td class="text-center">Rp. {{ number_format($november_piutang)}}</td>
                                </tr>
                                <tr>
                                    <td class="text-center">12</td>
                                    <td class="text-center">desember</td>
                                    <td class="text-center">Rp. {{ number_format($desember_pemasukan)}}</td>
                                    <td class="text-center">Rp. {{ number_format($desember_piutang)}}</td>
                                </tr>
                                <!-- @php
                                    $i = 0;
                                @endphp
                                @for($i =0; $i <12;$i++)
                                    <tr>
                                        <td class="text-center">Bulan {{$i}} Januari</td>
                                        <td class="text-center">{{number_format(random_int(1000000,1500000),0,',','.') }}</td>
                                        <td class="text-center">{{number_format(random_int(1000000,1500000),0,',','.') }}</td>
                                    </tr>
                                @endfor -->
                                {{-- @foreach($cashflowByMonth as $item)--}}
                                {{-- <tr>--}}
                                {{-- <td>{{$i += 1}}</td>--}}
                                {{-- <td>{{$item->bulan}}</td>--}}
                                {{-- <td style="text-align:right;">{{number_format($item->pemasukan,0,',','.') }}</td>--}}
                                {{-- <td style="text-align:right;">{{number_format($item->pengeluaran,0,',','.') }}</td>--}}
                                {{-- <td style="text-align:right;">{{number_format($item->piutang,0,',','.') }}</td>--}}
                                {{-- <td style="text-align:right;">{{number_format($item->hutang,0,',','.') }}</td>--}}
                                {{-- </tr>--}}
                                {{-- @endforeach--}}
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