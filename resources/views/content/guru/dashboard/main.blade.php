@extends('layout.master.main')

@push('style')
    <style>
        .card-contenttitle {
            margin-top: 30px;
            text-align: left;
            color: white;
            font-size: 30px;
        }

        .h6-titlecard {
            margin-bottom: 15px;
            margin-top: 20px;
        }

        .h6-contentcard {
            color: white;
            text-align: left;
        }

        .btn-card {
            text-align: left;
            padding-left: 20px;
            border: none;
            width: 100%;
            color: white;
            margin-top: 30px;
        }
    </style>
@endpush

@section('content')
    <div class="page-content">
        @include('include.master.breadcrumb')

        <div class="row">
            <div class="card" style="backgrounf: #ffffff:">
                {{-- <div class="col-md-12">
                    <div class="card" style="background: #ffffff">
                        <div class="card-body">
                            <span><b id="date" style="font-size: 10pt;"></b></span>&nbsp;
                            <span id="time" style="font-size: 10pt"></span>
                        </div>
                    </div>
                </div> --}}
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <h6 class="h6-titlecard"><b>Tugas Akademis - 2022/2023</b></h6>
                        </div>
                        <div class="row">
                            <div class="col-md-3 ">
                                <div class="card" style="width: 100%;">
                                    <div class="card-body" style="background: #EF6154">
                                        <h6 class="h6-contentcard">Guru Mata Pelajaran</h6>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h1 class="card-contenttitle">
                                                    <b>1</b>
                                                </h1>
                                            </div>
                                        </div>
                                        <button class="btn btn-card" onclick="alert('Maintenance!')"
                                            style="background-color: #BF4E43;">Tampilkan
                                            <i class='bx bxs-right-arrow-circle' style="padding-left: 110px"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <h6 class="h6-titlecard"><b>Bank Data Primer - 2022/2023</b></h6>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card" style="width: 100%;">
                                    <div class="card-body" style="background: #5476EF">
                                        <h6 class="h6-contentcard">Selesai Upload</h6>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h1 class="card-contenttitle">
                                                    <b>1</b>
                                                </h1>
                                            </div>
                                        </div>
                                        <button class="btn btn-card" onclick="alert('Maintenance!')"
                                            style="background-color: #7995F6">Tampilkan
                                            <i class='bx bxs-right-arrow-circle' style="padding-left: 110px"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card" style="width: 100%;">
                                    <div class="card-body" style="background: #FF000080">
                                        <h6 class="h6-contentcard">Belum Upload</h6>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h1 class="card-contenttitle">
                                                    <b>1</b>
                                                </h1>
                                            </div>
                                        </div>
                                        <button class="btn btn-card" onclick="alert('Maintenance!')"
                                            style="background-color: #FF000066;">Tampilkan
                                            <i class='bx bxs-right-arrow-circle' style="padding-left: 110px"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <h6 class="h6-titlecard"><b>Bank Data Sekunder - 2022/2023</b></h6>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card" style="width: 100%;">
                                    <div class="card-body" style="background: #AA9D28">
                                        <h6 class="h6-contentcard">Selesai Upload</h6>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h1 class="card-contenttitle">
                                                    <b>1</b>
                                                </h1>
                                            </div>
                                        </div>
                                        <button class="btn btn-card" onclick="alert('Maintenance!')"
                                            style="background-color: #C1B440;">Tampilkan
                                            <i class='bx bxs-right-arrow-circle' style="padding-left: 110px"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card" style="width: 100%;">
                                    <div class="card-body" style="background: #FF000080">
                                        <h6 class="h6-contentcard">Belum Upload</h6>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h1 class="card-contenttitle">
                                                    <b>1</b>
                                                </h1>
                                            </div>
                                        </div>
                                        <button class="btn btn-card" onclick="alert('Maintenance!')"
                                            style="background-color: #FF000066;">Tampilkan
                                            <i class='bx bxs-right-arrow-circle' style="padding-left: 110px"></i></button>
                                    </div>
                                </div>
                            </div>
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
