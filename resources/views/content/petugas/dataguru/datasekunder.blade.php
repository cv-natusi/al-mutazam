@extends('layout.master.main')

@push('style')
    <style>
        .card-title {
            margin-top: 40px;
        }

        .btn-card {
            text-align: left;
            width: 100%;
            color: white;
        }

        .btn-ctk {
            text-align: center;
            color: white;
            border-radius: 10px;
        }

        .tbl-container {
            width: 100%;
            margin-top: 10px;
        }

        .bg-tbl {
            background-color: #5C9DED;
            color: white;
        }

        .bdr {
            border-radius: 6px;
            overflow: hidden;
        }
    </style>
@endpush

@section('content')
    <div class="page-content">
        @include('include.master.breadcrumb')

        <div class="row">
            <div class="col-md-12">
                <div class="card" style="background: #ffffff">
                    <div class="card-body">
                        <span><b id="date" style="font-size: 10pt;"></b></span>&nbsp;
                        <span id="time" style="font-size: 10pt"></span>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card" style="width: 100%; background-color:#ffffff">
                    <div class="card-body">
                        <h5 style="margin-botttom: 50px"><b>Data Sekunder Guru</b></h5>
                        @foreach ($guru as $g)
                            <div class="my-3 mx-3">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="row">
                                            <h3 class="col text-muted text-sm-start">{{ $g->nama_guru }}</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom: 30px">
                                    <div class="col-sm-12">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col">TUGAS UTAMA</th>
                                                    <th scope="col" style="background-color: #D1FEE9">TUGAS TAMBAHAN</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>{{ $g->tugas_utama }}</th>
                                                    <td>{{ $g->tugas_tambahan }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="btn-toolbar justify-content-between" role="toolbar"
                                    aria-label="Toolbar with button groups">
                                    <div class="btn-toolbar mb-3" role="toolbar">
                                        <div class="btn-group me-4" role="group">
                                            <button type="button" class="btn btn-ctk" style="background-color: #6FA4DD;"><i
                                                    class='bx bx-printer' style='color:#ffffff'></i> CETAK</button>
                                        </div>
                                        <div>
                                            <button type="button" class="btn btn-ctk" style="background-color: #6B9E5E;"><i
                                                    class='bx bx-file' style='color:#ffffff'></i> EXCEL</button>
                                        </div>
                                    </div>
                                    <div class="input-group">
                                        <div class="dropdown">
                                            <div class="btn-group me-3">
                                                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1"
                                                    data-bs-toggle="dropdown" aria-expanded="false"
                                                    style="border-color: black">
                                                    Filter Berdasarkan
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tbl-container bdr">
                                    <table class="table">
                                        <thead class="bg-tbl">
                                            <tr class="text-center">
                                                <th scope="col">No</th>
                                                <th scope="col">Nama Data Primer</th>
                                                <th scope="col">Tahun</th>
                                                <th scope="col">Batas Upload</th>
                                                <th scope="col">Tgl.Upload</th>
                                                <th scope="col">Keterangan</th>
                                                <th scope="col">Status</th>
                                                <th class="col-lg-2" scope="col" colspan="2">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($sekunderguru as $s)
                                                <tr class="text-center">
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $s->namadataprimer_guru }}</td>
                                                    <td>{{ $s->tahun }}</td>
                                                    <td>{{ $s->batas_upload }}</td>
                                                    <td>{{ $s->tgl_upload }}</td>
                                                    <td>{{ $s->keterangan }}</td>
                                                    <td>{{ $s->status }}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-ctk" data-bs-toggle="modal"
                                                            data-bs-target="#ModalCreate"
                                                            style="background-color: #8282F2; border-radius: 10px">Upload</button>
                                                    </td>
                                                    @include('content.petugas.dataguru.modal')
                                                    <td>
                                                        <button type="button" class="btn btn-ctk"
                                                            style="background-color: #D5E497; border-radius: 10px; color: black">Lihat</button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <a href="{{ route('dataGuru') }}" type="button"
                                                class="btn btn-secondary btn-ctk">Kembali</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    {{-- <script src="{{ url('assets/js/index.js') }}"></script> --}}
    <script src="{{ url('assets/plugins/jquery-knob/jquery.knob.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $(".knob").knob()
            arrbulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September",
                "Oktober", "November", "Desember"
            ];
            date = new Date();
            hari = date.getDay();
            tanggal = date.getDate();
            bulan = date.getMonth();
            tahun = date.getFullYear();
            // document.write(tanggal+"-"+arrbulan[bulan]+"-"+tahun+"<br/>"+jam+" : "+menit+" : "+detik+"."+millisecond);

            $('#date').html(tanggal + " " + arrbulan[bulan] + " " + tahun)
        });

        function renderTime() {
            var currentTime = new Date();
            var h = currentTime.getHours();
            var m = currentTime.getMinutes();
            var s = currentTime.getSeconds();
            if (h == 0) {
                h = 24;
            }
            if (h < 10) {
                h = "0" + h;
            }
            if (m < 10) {
                m = "0" + m;
            }
            if (s < 10) {
                s = "0" + s;
            }
            // var myClock = document.getElementById('time');
            $('#time').html("<b>" + h + " : " + m + " : " + s + " WIB</b>");
            setTimeout('renderTime()', 1000);
        }

        renderTime();
    </script>
@endpush
