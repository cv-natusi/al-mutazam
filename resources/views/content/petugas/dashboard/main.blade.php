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
                <div class="row">
                    <h5>Selamat Datang Di halaman Petugas Sekolah!</h5>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card text-white mb-3 text-center" style="width: 100%;">
                            <div class="card-header" style="color: #000; background: #ffffff;">Berita Sekolah</div>
                            <div class="card-body" style="background: #ffffff">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h1 class="card-title">
                                            <b>11</b>
                                        </h1>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer" style="background: #ffffff">
                                <button class="btn btn-primary" onclick="alert('Maintenance!')">More Info</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-white mb-3 text-center" style="width: 100%;">
                            <div class="card-header" style="color: #000; background: #ffffff;">Event</div>
                            <div class="card-body" style="background: #ffffff;">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h1 class="card-title">
                                            <b>11</b>
                                        </h1>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer" style="background: #ffffff;">
                                <button class="btn btn-primary" onclick="alert('Maintenance!')">More Info</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-white mb-3 text-center" style="width: 100%;">
                            <div class="card-header" style="color: #000; background: #ffffff;">Pengumuman</div>
                            <div class="card-body" style="background: #ffffff;">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h1 class="card-title">
                                            <b>11</b>
                                        </h1>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer" style="color: #000; background: #ffffff;">
                                <button class="btn btn-primary" onclick="alert('Maintenance!')">More Info</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: 10px">
                    <h6>Data - 2022/2023</h6>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="card" style="width: 100%; background-color:#EF6154">
                            <div class="card-body">
                                <h6 class="card-subtitle mb-2 text-white">Guru</h6>
								<h1 class="card-title" style="color: #ffffff;margin: 20px 0px;">
									<b>10</b>
								</h1>						
                                <button class="btn btn-card" style="color:#ffffff;background-color: #BF4E43" onclick="alert('Maintenance!')">
									Tampilkan <i class="bx bxs-right-arrow-circle" style="padding-left: 50%"></i></button>
                            </div>
                        </div>
					</div>
                    <div class="col-md-3">
                        <div class="card" style="width: 100%; background-color:#F7B34C;">
                            <div class="card-body">
                                <h6 class="card-subtitle mb-2 text-white">Siswa</h6>
								<h1 class="card-title" style="color: #ffffff;margin: 20px 0px;">
									<b>100</b>
								</h1>						
                                <button class="btn btn-card" style="color:#ffffff;background-color: #C58F3C" onclick="alert('Maintenance!')">
									Tampilkan <i class="bx bxs-right-arrow-circle" style="padding-left: 50%"></i></button>
                            </div>
                        </div>
					</div>
                    <div class="col-md-3">
                        <div class="card" style="width: 100%; background-color:#AEB5C1">
                            <div class="card-body">
                                <h6 class="card-subtitle mb-2 text-white">Kelas</h6>
								<h1 class="card-title" style="color: #ffffff;margin: 20px 0px;">
									<b>12</b>
								</h1>						
                                <button class="btn btn-card" style="color:#ffffff;background-color: #8B919B" onclick="alert('Maintenance!')">
									Tampilkan <i class="bx bxs-right-arrow-circle" style="padding-left: 50%"></i></button>
                            </div>
                        </div>
					</div>
                    <div class="col-md-3">
                        <div class="card" style="width: 100%; background-color:#6DC193">
                            <div class="card-body">
                                <h6 class="card-subtitle mb-2 text-white">Mata Pelajaran</h6>
								<h1 class="card-title" style="color: #ffffff;margin: 20px 0px;">
									<b>36</b>
								</h1>						
                                <button class="btn btn-card" style="color:#ffffff;background-color: #579B75" onclick="alert('Maintenance!')">
									Tampilkan <i class="bx bxs-right-arrow-circle" style="padding-left: 50%"></i></button>
                            </div>
                        </div>
					</div>
				</div>
                <div class="row" style="margin-top: 10px">
                    <h6>Bank Data Primer - 2022/2023</h6>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="card" style="width: 100%; background-color:#5476EF">
                            <div class="card-body">
                                <h6 class="card-subtitle mb-2 text-white">Pengguna Selesai Upload</h6>
								<h1 class="card-title" style="color: #ffffff;margin: 20px 0px;">
									<b>10</b>
								</h1>						
                                <button class="btn btn-card" style="color:#ffffff;background-color: #7995F6" onclick="alert('Maintenance!')">
									Tampilkan <i class="bx bxs-right-arrow-circle" style="padding-left: 50%"></i></button>
                            </div>
                        </div>
					</div>
                    <div class="col-md-3">
                        <div class="card" style="width: 100%; background-color:#A1CF8B;">
                            <div class="card-body">
                                <h6 class="card-subtitle mb-2 text-white">Pengguna Belum Upload</h6>
								<h1 class="card-title" style="color: #ffffff;margin: 20px 0px;">
									<b>11</b>
								</h1>						
                                <button class="btn btn-card" style="color:#ffffff;background-color: #8FA584" onclick="alert('Maintenance!')">
									Tampilkan <i class="bx bxs-right-arrow-circle" style="padding-left: 50%"></i></button>
                            </div>
                        </div>
					</div>
				</div>
				<div class="row" style="margin-top: 10px">
                    <h6>Bank Data Sekunder - 2022/2023</h6>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="card" style="width: 100%; background-color:#AA9D28">
                            <div class="card-body">
                                <h6 class="card-subtitle mb-2 text-white">Pengguna Selesai Upload</h6>
								<h1 class="card-title" style="color: #ffffff;margin: 20px 0px;">
									<b>10</b>
								</h1>						
                                <button class="btn btn-card" style="color:#ffffff;background-color: #C1B440" onclick="alert('Maintenance!')">
									Tampilkan <i class="bx bxs-right-arrow-circle" style="padding-left: 50%"></i></button>
                            </div>
                        </div>
					</div>
                    <div class="col-md-3">
                        <div class="card" style="width: 100%; background-color:#6D9B57;">
                            <div class="card-body">
                                <h6 class="card-subtitle mb-2 text-white">Pengguna Belum Upload</h6>
								<h1 class="card-title" style="color: #ffffff;margin: 20px 0px;">
									<b>12</b>
								</h1>						
                                <button class="btn btn-card" style="color:#ffffff;background-color: #4F783C" onclick="alert('Maintenance!')">
									Tampilkan <i class="bx bxs-right-arrow-circle" style="padding-left: 50%"></i></button>
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