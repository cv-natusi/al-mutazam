@extends('layout.master.main')

@push('style')
    <style>
        .btn-ctk {
            text-align: center;
            color: white;
            margin-left: 12px;
        }

        .dropdown-btn {}

        .card-contenttitle {
            margin-top: 30px;
            text-align: left;
            color: white;
            font-size: 30px;
        }

        .h6-titlecard {
            margin-bottom: 15px;
            margin-top: 20px;
            margin-left: 15px;
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
            <div class="card" style="background: #ffffff; padding-bottom: 20px">
                <div class="row">
                    <div class="row">
                        <h6 class="h6-titlecard"><b>Ubah Password</b></h6>
                    </div>
                    <form action="pengaturan-guru" method="post">
                        @csrf
                        <label for="inputPassword5" class="form-label" style="margin-left: 15px">Password saat ini</label>
                        <div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups"
                            style="margin-left: 15px">
                            <div class="input-group">
                                <input type="password" id="oldPassword" name="old_password" class="form-control"
                                    placeholder="Input group example" aria-label="Input group example"
                                    aria-describedby="btnGroupAddon">
                                <div class="input-group-text" id="btnGroupAddon"><i class='bx bxs-low-vision'></i></div>
                            </div>
                        </div>

                        <div class="row">

                            <label for="inputPassword5" class="form-label" style="margin-left: 15px">Password
                                baru</label>
                            <div class="col-lg-6 mb-2">
                                <div class="input-group me-4" style="margin-left: 15px">
                                    <input type="password" id="newPassword" name="new_password" class="form-control"
                                        placeholder="Input group example" aria-label="Input group example"
                                        aria-describedby="btnGroupAddon">
                                    <div class="input-group-text" id="btnGroupAddon"><i class='bx bxs-low-vision'></i></div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-2">
                                <div class="input-group me-4">
                                    <input type="password" id="repeatPassword" name="repeat_password" class="form-control"
                                        placeholder="Input group example" aria-label="Input group example"
                                        aria-describedby="btnGroupAddon">
                                    <div class="input-group-text" id="btnGroupAddon"><i class='bx bxs-low-vision'></i></div>
                                </div>
                            </div>
                        </div>

                        {{-- <label for="inputPassword5" class="form-label" style="margin-left: 15px">Password baru</label>
                    <div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups"
                        style="margin-left: 15px">
                        <div class="input-group me-4">
                            <input type="text" class="form-control" placeholder="Input group example"
                                aria-label="Input group example" aria-describedby="btnGroupAddon">
                            <div class="input-group-text" id="btnGroupAddon"><i class='bx bxs-low-vision'></i></div>
                        </div>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Input group example"
                                aria-label="Input group example" aria-describedby="btnGroupAddon">
                            <div class="input-group-text" id="btnGroupAddon"><i class='bx bxs-low-vision'></i></div>
                        </div>
                    </div> --}}
                </div>
                <div>
                    <div>
                        <button type="button" class="btn btn-ctk"
                            style="background-color: #62A044; margin-top: 15px;">Simpan</button>
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
