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
                        <h5 style="margin-bottom: 50px"><b>Update Tugas Pegawai</b></h5>
                        <div class="my-3 mx-3">
                            <div class="row">
                                <div class="row">
                                    <div class="col-lg-5 mb-2">
                                        <div class="mb-3">
                                            <label class="text-label form-label">Kode Tugas *</label>
                                            <input type="text" name="kodeTugas" class="form-control" placeholder="Kode Jabatan" required="">
                                        </div>
                                    </div>
                                    <div class="col-lg-7 mb-2">
                                        <div class="mb-3">
                                            <label class="text-label form-label">Nama Tugas *</label>
                                            <input type="text" name="namaTugas" class="form-control" placeholder="Kode Jabatan" required="">
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
