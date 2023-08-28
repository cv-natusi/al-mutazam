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
                    <!-- <span><b id="date" style="font-size: 10pt;"></b></span>&nbsp;
                        <span id="time" style="font-size: 10pt"></span> -->
                    <div class="my-3 mx-3">
                        <div class="row">
                            <h5>Tambah Data Pelajaran</h5>
                        </div>
                    </div>
                    <div class="my-3 mx-3">
                        <form action="{{ route('simpandataPelajaran') }}" method="post">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Nama Mata Pelajaran *</label>
                                        <input type="text" name="mapel" class="form-control" placeholder="Mata Pelajaran" id="mapel">
                                    </div>
                                </div>
                                <div class="col-lg-2 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Kelas *</label>
                                        <select class="form-select" aria-label="Default select example" id="id_kelas" name="id_kelas">
                                            <option value="">Pilih</option>
                                            @foreach($kelas as $kelas)
                                            <option value="{{$kelas->id}}">{{$kelas->namakelas}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">TA *</label>
                                        <select class="form-select" aria-label="Default select example" id="ta" name="ta">
                                            <option value="">Pilih</option>
                                            <option value="2022 / 2023">2022 / 2023</option>
                                            <option value="2023 / 2024">2023 / 2024</option>
                                            <option value="2024 / 2025">2024 / 2025</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Semester *</label>
                                        <select class="form-select" aria-label="Default select example" id="semester" name="semester">
                                            <option value="">Pilih</option>
                                            <option value="Ganjil">Ganjil</option>
                                            <option value="Genap">Genap</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Guru Pengajar</label>
                                        <select class="form-select" aria-label="Default select example" id="id_guru" name="id_guru">
                                            <option selected>Multiple Choice</option>
                                            @foreach($guru as $guru)
                                            <option value="{{$guru->id_guru}}">{{$guru->nama_guru}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <button class="btn" type="submit" style="background-color: #62A044; color:white; border-radius: 10px;">Simpan</button>
                                        <!-- <a href="" type="submit" class="btn" style="background-color: #62A044; color:white; border-radius: 10px;">Simpan</a> -->
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<!-- @push('script')
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
@endpush -->