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
                        <h5 style="margin-bottom: 50px"><b>Tambah Guru Baru</b></h5>
                        <div class="my-3 mx-3">
                            <div class="row">
                                <div class="row">
                                    <div class="col-lg-6 mb-2">
                                        <div class="mb-3">
                                            <label class="text-label form-label">Nomor Induk Kependudukan (NIK) *</label>
                                            <input type="text" name="firstName" class="form-control"
                                                placeholder="placeholder" required="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <div class="mb-3">
                                            <label class="text-label form-label">NIP *</label>
                                            <input type="text" name="lastName" class="form-control"
                                                placeholder="placeholder" required="">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-3">
                                        <div class="mb-3">
                                            <label class="text-label form-label">Nama Lengkap *</label>
                                            <input type="text" name="place" class="form-control"
                                                placeholder="placeholder" required="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <div class="mb-3">
                                            <label class="text-label form-label">Tanggal Lahir *</label>
                                            <div class="input-group">
                                                <input type="email" class="form-control" id="inputGroupPrepend2"
                                                    aria-describedby="inputGroupPrepend2" placeholder="placeholder"
                                                    required="">
                                                <div class="input-group-text" id="btnGroupAddon"><i
                                                        class='bx bxs-calendar'></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <div class="mb-3">
                                            <label class="text-label form-label">Foto *</label>
                                            <div class="input-group">
                                                <input type="email" class="form-control" id="inputGroupPrepend2"
                                                    aria-describedby="inputGroupPrepend2" placeholder="placeholder"
                                                    required="">
                                                <div class="input-group-text" id="btnGroupAddon">Pilih</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-3">
                                        <div class="mb-3">
                                            <label class="text-label form-label">Alamat *</label>
                                            <input type="text" name="place" class="form-control"
                                                placeholder="placeholder" required="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <div class="mb-3">
                                            <label class="text-label form-label">Provinsi *</label>
                                            <select class="form-select" aria-label="Default select example">
                                                <option selected>placeholder</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <div class="mb-3">
                                            <label class="text-label form-label">Kabupaten *</label>
                                            <select class="form-select" aria-label="Default select example">
                                                <option selected>placeholder</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <div class="mb-3">
                                            <label class="text-label form-label">Kecamatan *</label>
                                            <select class="form-select" aria-label="Default select example">
                                                <option selected>placeholder</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <div class="mb-3">
                                            <label class="text-label form-label">Desa / Kelurahan *</label>
                                            <select class="form-select" aria-label="Default select example">
                                                <option selected>placeholder</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <div class="mb-3">
                                            <label class="text-label form-label">No Telepon *</label>
                                            <input type="email" class="form-control" id="inputGroupPrepend2"
                                                aria-describedby="inputGroupPrepend2" placeholder="placeholder"
                                                required="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <div class="mb-3">
                                            <label class="text-label form-label">Email</label>
                                            <input type="text" name="phoneNumber" class="form-control"
                                                placeholder="Upload File" required="">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-3">
                                        <div class="mb-3">
                                            <label class="text-label form-label">Tugas Utama *</label>
                                            <input type="text" name="place" class="form-control"
                                                placeholder="placeholder" required="">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-3">
                                        <div class="mb-3">
                                            <label class="text-label form-label">Tugas Tambahan</label>
                                            <select class="form-select" aria-label="Default select example">
                                                <option selected>Multiple Pilihan / Tidak Boleh Memilih</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <div class="mb-3">
                                            <label class="text-label form-label">SUBMINKAL</label>
                                            <input type="email" class="form-control" id="inputGroupPrepend2"
                                                aria-describedby="inputGroupPrepend2" placeholder="placeholder"
                                                required="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <div class="mb-3">
                                            <label class="text-label form-label">TMTA Awal</label>
                                            <div class="input-group">
                                                <input type="email" class="form-control" id="inputGroupPrepend2"
                                                    aria-describedby="inputGroupPrepend2" placeholder="placeholder"
                                                    required="">
                                                <div class="input-group-text" id="btnGroupAddon"><i
                                                        class='bx bxs-calendar'></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <div class="mb-0">
                                            <label class="text-label form-label">Status Guru</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="exampleRadios"
                                                id="exampleRadios1" value="option1" checked>
                                            <label class="form-check-label" for="exampleRadios1">
                                                Aktif
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="exampleRadios"
                                                id="exampleRadios1" value="option1" checked>
                                            <label class="form-check-label" for="exampleRadios1">
                                                Tidak Aktif
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <a href="{{-- route('editprofilGuru') --}}" type="button" class="btn"
                                                style="background-color: #62A044; color:white; border-radius: 10px;">Simpan</a>
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
