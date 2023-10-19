@extends('layout.master.main')

@push('style')
<style>
	.card-title {
		margin-top: 40px;
	}
	.bg-card {
		width: 250px;
		height: 160px;
	}
</style>
@endpush

@section('content')
	<div class="page-content">
		@include('include.master.breadcrumb')

		<div class="row">
			<div class="col-md-12">
                <div class="row">
                    <h5 style="font-size: 10pt">Selamat datang di halaman Petugas!</h5>
                </div>
				<div class="row">
					<div class="col">
						<div class="card radius-10 bg-card">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<h5 class="mb-0 text-white" id="guru">0</h5>
									<div class="ms-auto">
										<i class="bx bx-news fs-3 text-white"></i>
									</div>
								</div>
								<div class="progress my-2 bg-opacity-25 bg-white" style="height:4px;">
									<div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="d-flex align-items-center text-white">
									<p class="mb-0">Jumlah Guru</p>
									<a href="{{ route('dataGuru') }}" class="btn btn-light btn-sm mb-0 ms-auto">Selengkapnya</a>
								</div>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card radius-10 bg-card">
						<div class="card-body">
							<div class="d-flex align-items-center">
								<h5 class="mb-0 text-white" id="kelas">0</h5>
								<div class="ms-auto">
									<i class="bx bx-news fs-3 text-white"></i>
								</div>
							</div>
							<div class="progress my-2 bg-opacity-25 bg-white" style="height:4px;">
								<div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
							<div class="d-flex align-items-center text-white">
								<p class="mb-0">Jumlah Rombel</p>
								<a href="{{ route('dataKelas') }}" class="btn btn-light btn-sm mb-0 ms-auto">Selengkapnya</a>
							</div>
						</div>
						</div>
					</div>
					<div class="col">
						<div class="card radius-10 bg-card">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<h5 class="mb-0 text-white" id="administrasi">0</h5>
									<div class="ms-auto">
										<i class="bx bx-news fs-3 text-white"></i>
									</div>
								</div>
								<div class="progress my-2 bg-opacity-25 bg-white" style="height:4px;">
									<div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="d-flex align-items-center text-white">
									<p class="mb-0">Total Upload Administrasi</p>
									<a href="{{ route('dataAdministrasiPetugas') }}" class="btn btn-light btn-sm mb-0 ms-auto">Selengkapnya</a>
								</div>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card radius-10 bg-card">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<h5 class="mb-0 text-white" id="pengembanganDiri">0</h5>
									<div class="ms-auto">
										<i class="bx bx-news fs-3 text-white"></i>
									</div>
								</div>
								<div class="progress my-2 bg-opacity-25 bg-white" style="height:4px;">
									<div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="d-flex align-items-center text-white">
									<p class="mb-0">Total Upload Pengembangan Diri</p>
									<a href="{{ route('mainPengembanganDiri') }}" class="btn btn-light btn-sm mb-0 ms-auto">Selengkapnya</a>
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
		getDashboard();
	});

	function getDashboard() {
		$.get("{{ route('getDashboardPetugas') }}").done(function(result){
			console.log(result.data)
			if (result.code==200) {
				$('#guru').text(result.data.guru);
				$('#kelas').text(result.data.kelas);
				$('#administrasi').text(result.data.administrasi);
				$('#pengembanganDiri').text(result.data.pengembangandiri);
			}
        });
	}
</script>
@endpush