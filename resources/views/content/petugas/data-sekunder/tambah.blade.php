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
                    {{-- <form action="pengaturan-guru" method="post">
                        @csrf --}}
                    {{-- <label for="inputPassword5" class="form-label" style="margin-left: 15px">Password saat ini</label>
                        <div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups"
                            style="margin-left: 15px">
                            <div class="input-group">
                                <input type="password" id="oldPassword" name="old_password" class="form-control"
                                    placeholder="Input group example" aria-label="Input group example"
                                    aria-describedby="btnGroupAddon">
                                <div class="input-group-text" id="btnGroupAddon"><i class='bx bxs-low-vision'></i></div>
                            </div>
                        </div> --}}

                    {{-- <div class="row">
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
                        <div>
                            <button type="submit" class="btn btn-ctk"
                                style="background-color: #62A044; margin-top: 15px;">Simpan</button>
                        </div>
                    </form> --}}

                    {{-- coba --}}
                    {{-- <form class="row g-3" style="margin-top: -20px; margin-left: 10px;" action="pengaturan-guru"
                        method="post">
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">NIK</label>
                            <div class="input-group me-4">
                                <input type="password" id="repeatPassword" name="nik" class="form-control"
                                    placeholder="Input group example" aria-label="Input group example"
                                    aria-describedby="btnGroupAddon">
                            </div>
                            <div class="input-group">
                                <div class="dropdown">
                                    <div class="btn-group me-3">
                                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1"
                                            data-bs-toggle="dropdown" aria-expanded="false" style="border-color: black">
                                            Filter Berdasarkan
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li><a class="dropdown-item" href="#">Action</a></li>
                                            <li><a class="dropdown-item" href="#">Another action</a></li>
                                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="h-25 input-group">
                                    <div class="input-group-text" id="btnGroupAddon2"><i class='bx bxs-calendar'></i></div>
                                    <input type="text" class="form-control" placeholder="-"
                                        aria-label="Input group example" aria-describedby="btnGroupAddon2">
                                </div>
                                <div style="font-size: 25px; margin-left: 5px; margin-right: 5px"><b> - </b></div>
                                <div class="h-25 input-group">
                                    <input type="text" class="form-control" placeholder="-"
                                        aria-label="Input group example" aria-describedby="btnGroupAddon2">
                                    <div class="input-group-text" id="btnGroupAddon2"><i class='bx bxs-calendar'></i>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                    {{-- <div class="col-md-6">
                            <label for="inputPassword4" class="form-label">Password Saat Ini</label>
                            <div class="input-group me-4">
                                <input type="password" id="repeatPassword" name="old_password" class="form-control"
                                    placeholder="Input group example" aria-label="Input group example"
                                    aria-describedby="btnGroupAddon">
                                <div class="input-group-text" id="btnGroupAddon"><i class='bx bxs-low-vision'></i></div>
                            </div>
                        </div> --}}

                    {{-- <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Password Baru</label>
                            <div class="input-group me-4">
                                <input type="password" id="repeatPassword" name="new_password" class="form-control"
                                    placeholder="Input group example" aria-label="Input group example"
                                    aria-describedby="btnGroupAddon">
                                <div class="input-group-text" id="btnGroupAddon"><i class='bx bxs-low-vision'></i></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label">Ulangi Password Baru</label>
                            <div class="input-group me-4">
                                <input type="password" id="repeatPassword" name="repeat_password" class="form-control"
                                    placeholder="Input group example" aria-label="Input group example"
                                    aria-describedby="btnGroupAddon">
                                <div class="input-group-text" id="btnGroupAddon"><i class='bx bxs-low-vision'></i></div>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-ctk"
                                style="background-color: #62A044; margin-top: 15px;">Simpan</button>
                        </div>
                    </form> --}}
                    <form class="row g-3" style="margin-left: 10px; margin-top: -10px">
                        <div class="col-md-6">
                            <label for="inputCity" class="form-label">Nama Data Primer *</label>
                            <input type="text" class="form-control" id="inputCity">
                        </div>
                        <div class="col-md-2">
                            <label for="inputState" class="form-label">Tahun Berkas *</label>
                            <div class="h-25 input-group">
                                <div class="input-group-text" id="btnGroupAddon2"><i class='bx bxs-calendar'></i></div>
                                <input type="text" class="form-control" placeholder="-" aria-label="Input group example"
                                    aria-describedby="btnGroupAddon2">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="inputState" class="form-label">Batas Upload *</label>
                            <div class="h-25 input-group">
                                <div class="input-group-text" id="btnGroupAddon2"><i class='bx bxs-calendar'></i></div>
                                <input type="text" class="form-control" placeholder="-" aria-label="Input group example"
                                    aria-describedby="btnGroupAddon2">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Keterangan *</label>
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                                <label for="floatingTextarea2">Comments</label>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-ctk"
                                style="background-color: #62A044; margin-top: -8px;">Simpan</button>
                        </div>
                    </form>
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
