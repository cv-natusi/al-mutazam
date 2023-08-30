@extends('layout.master.main')

@push('style')
    <style>
        .card-title {
            margin-top: 40px;
        }

        .btn-ctk {
            text-align: center;
            color: white;
            border-radius: 10px;
        }

        .btn-card {
            text-align: left;
            width: 100%;
            color: white;
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
                        <h5 style="margin-bottom: 50px"><b>Tambah Data Kelas</b></h5>
                        <div class="my-3 mx-3">
                            <div class="row">
                                <div class="row">
                                    <div class="col-lg-4 mb-2">
                                        <div class="mb-3">
                                            <label class="text-label form-label">Kelas *</label>
                                            <input type="text" name="kelas" class="form-control" placeholder="Pilih Kelas" required="">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mb-2">
                                        <div class="mb-3">
                                            <label class="text-label form-label">Nama Kelas *</label>
                                            <input type="text" name="namaKelas" class="form-control" required="">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mb-2">
                                        <div class="mb-3">
                                            <label class="text-label form-label">Kode Kelas *</label>
                                            <input type="text" name="kodeKelas" class="form-control" required="">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-2">
                                        <div class="mb-3">
                                            <label class="text-label form-label">Guru Wali Kelas</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="" placeholder="Pilih Wali Kelas" required="">
                                                <div class="input-group-text" id=""><i class='bx bx-chevron-down' ></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <a href="#" type="button" class="btn" style="background-color: #62A044; color:white; border-radius: 10px;">Simpan</a>
                                        </div>
                                    </div>
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
