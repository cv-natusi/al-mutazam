@extends('layout.master.main')

@push('style')
<style>
	.card-title {
		margin-top: 40px;
	}
</style>
@endpush

@section('content')
	<div class="page-content">
		@include('include.master.breadcrumb')

		<div class="row">
			<div class="col-md-12">
                <div class="row">
                    <h5 style="font-size: 10pt">Selamat Datang Di halaman Administrator!</h5>
                </div>
				<div class="row">
					<div class="col">
						<div class="card radius-10 bg-card">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<h5 class="mb-0 text-white" id="beritaSekolah">0</h5>
									<div class="ms-auto">
										<i class="bx bx-news fs-3 text-white"></i>
									</div>
								</div>
								<div class="progress my-2 bg-opacity-25 bg-white" style="height:4px;">
									<div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="d-flex align-items-center text-white">
									<p class="mb-0">Berita Sekolah</p>
									<a href="{{ route('berita.main',1) }}" class="btn btn-light btn-sm mb-0 ms-auto">Selengkapnya</a>
								</div>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card radius-10 bg-card">
						<div class="card-body">
							<div class="d-flex align-items-center">
								<h5 class="mb-0 text-white" id="event">0</h5>
								<div class="ms-auto">
									<i class="bx bx-news fs-3 text-white"></i>
								</div>
							</div>
							<div class="progress my-2 bg-opacity-25 bg-white" style="height:4px;">
								<div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
							<div class="d-flex align-items-center text-white">
								<p class="mb-0">Event</p>
								<a href="{{ route('berita.main',2) }}" class="btn btn-light btn-sm mb-0 ms-auto">Selengkapnya</a>
							</div>
						</div>
						</div>
					</div>
					<div class="col">
						<div class="card radius-10 bg-card">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<h5 class="mb-0 text-white" id="pengumuman">0</h5>
									<div class="ms-auto">
										<i class="bx bx-news fs-3 text-white"></i>
									</div>
								</div>
								<div class="progress my-2 bg-opacity-25 bg-white" style="height:4px;">
									<div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="d-flex align-items-center text-white">
									<p class="mb-0">Pengumuman</p>
									<a href="{{ route('berita.main',3) }}" class="btn btn-light btn-sm mb-0 ms-auto">Selengkapnya</a>
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
<script src="{{url('assets/plugins/jquery-knob/jquery.knob.js')}}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
	$(document).ready(function() {
		$(".knob").knob()
		arrbulan = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
		date = new Date();
		hari = date.getDay();
		tanggal = date.getDate();
		bulan = date.getMonth();
		tahun = date.getFullYear();
		$('#date').html(tanggal+" "+arrbulan[bulan]+" "+tahun)
		getDashboard();
	});

	function getDashboard() {
		$.get("{{ route('getDashboard') }}",{jenis:'gudang'}).done(function(result){
			console.log(result)
            $('#beritaSekolah').text(result.beritaSekolah);
            $('#event').text(result.event);
            $('#pengumuman').text(result.pengumuman);
        });
	}
	
	function renderTime(){
		var currentTime = new Date();
		var h = currentTime.getHours();
		var m = currentTime.getMinutes();
		var s = currentTime.getSeconds();
		if (h == 0){
			h = 24;
		}
		if (h < 10){
			h = "0" + h;
		}
		if (m < 10){
			m = "0" + m;
		}
		if (s < 10){
			s = "0" + s;
		}
		$('#time').html("<b>"+h+" : " + m + " : " + s + " WIB</b>");
		setTimeout ('renderTime()',1000);
	}
	
	renderTime();
</script>
@endpush