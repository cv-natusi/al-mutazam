@extends('layout.landing-page.main')

@push('style')
	<link href="{{asset('plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet">
@endpush

@section('content')
	<section id="hero-1" class="hero-section division">
		<div class="container">
			<div class="row">
				<div class="col-lg-9">
					<div class="row">
						<div class="col-md-12">
							<h3 class="h3-sm mt-4"><b>PRESTASI SISWA</b></h3>
						<h4 class="m-0 fw7">MTs Al-Multazam</h4>
						</div>
					</div>
				</div>
				<div class="col-lg-3 justify-content-end">
					<div class="row">
						<div class="col-md-12">
							<h1 class="h3-sm mt-4" style="font-size: 60px; color: #D9D9D9"><b>PROGRAM</b></h1>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 mt-4">
					<section id="contacts-2" class="contacts-section division">
						@foreach ($beritas1 as $index => $berita1)
						<div class="contacts-2-holder mb-20">
							<div class="row d-flex align-items-center">
								<div class="col-lg-12">
									<div class="contact-box">
										<div class="row">
											<div class="col-md-4 mtb-auto">
												<img class="img-80" src="{{asset('uploads/berita/'.$berita1->gambar)}}" alt="contacts-icon">
												<br>
											</div>
											<div class="col-md-8 mtb-auto text-left">
												<span class="fw4">{{date('d/M/Y',strtotime($berita1->tanggal))}}</span><br>
												<span class="fw5">{{$berita1->judul}}</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						@endforeach
						{{-- <div class="contacts-2-holder mb-20">
							<div class="row d-flex align-items-center">
								<div class="col-lg-12">
									<div class="contact-box">
										<div class="row">
											<div class="col-md-4 mtb-auto">
												<img class="img-80" src="{{asset('landing-page/images/berita/1.png')}}" alt="contacts-icon">
												<br>
											</div>
											<div class="col-md-8 mtb-auto text-left">
												<span class="fw4">31/Oct/2022</span><br>
												<span class="fw5">JUARA LOMBA ESAI AL-MULTAZAM 2022</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="contacts-2-holder mb-20">
							<div class="row d-flex align-items-center">
								<div class="col-lg-12">
									<div class="contact-box">
										<div class="row">
											<div class="col-md-4 mtb-auto">
												<img class="img-80" src="{{asset('landing-page/images/berita/1.png')}}" alt="contacts-icon">
												<br>
											</div>
											<div class="col-md-8 mtb-auto text-left">
												<span class="fw4">31/Oct/2022</span><br>
												<span class="fw5">JUARA LOMBA ESAI AL-MULTAZAM 2022</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="contacts-2-holder mb-20">
							<div class="row d-flex align-items-center">
								<div class="col-lg-12">
									<div class="contact-box">
										<div class="row">
											<div class="col-md-4 mtb-auto">
												<img class="img-80" src="{{asset('landing-page/images/berita/1.png')}}" alt="contacts-icon">
												<br>
											</div>
											<div class="col-md-8 mtb-auto text-left">
												<span class="fw4">31/Oct/2022</span><br>
												<span class="fw5">JUARA LOMBA ESAI AL-MULTAZAM 2022</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="contacts-2-holder">
							<div class="row d-flex align-items-center">
								<div class="col-lg-12">
									<div class="contact-box">
										<div class="row">
											<div class="col-md-4 mtb-auto">
												<img class="img-80" src="{{asset('landing-page/images/berita/1.png')}}" alt="contacts-icon">
												<br>
											</div>
											<div class="col-md-8 mtb-auto text-left">
												<span class="fw4">31/Oct/2022</span><br>
												<span class="fw5">JUARA LOMBA ESAI AL-MULTAZAM 2022</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div> --}}
					</section>
				</div>
				
				<div class="col-md-4 mt-4">
					<section id="contacts-2" class="contacts-section division">
						@foreach ($beritas2 as $index => $berita2)
						<div class="contacts-2-holder mb-20">
							<div class="row d-flex align-items-center">
								<div class="col-lg-12">
									<div class="contact-box">
										<div class="row">
											<div class="col-md-4 mtb-auto">
												<img class="img-80" src="{{asset('uploads/berita/'.$berita2->gambar)}}" alt="contacts-icon">
												<br>
											</div>
											<div class="col-md-8 mtb-auto text-left">
												<span class="fw4">{{date('d/M/Y',strtotime($berita2->tanggal))}}</span><br>
												<span class="fw5">{{$berita2->judul}}</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						@endforeach
						{{-- <div class="contacts-2-holder mb-20">
							<div class="row d-flex align-items-center">
								<div class="col-lg-12">
									<div class="contact-box">
										<div class="row">
											<div class="col-md-4 mtb-auto">
												<img class="img-80" src="{{asset('landing-page/images/event/1.png')}}" alt="contacts-icon">
												<br>
											</div>
											<div class="col-md-8 mtb-auto text-left">
												<span class="fw4">31/Oct/2022</span><br>
												<span class="fw5">JUARA LOMBA PUISI TINGKAT MTs AL-MULTAZAM 2022</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="contacts-2-holder mb-20">
							<div class="row d-flex align-items-center">
								<div class="col-lg-12">
									<div class="contact-box">
										<div class="row">
											<div class="col-md-4 mtb-auto">
												<img class="img-80" src="{{asset('landing-page/images/event/1.png')}}" alt="contacts-icon">
												<br>
											</div>
											<div class="col-md-8 mtb-auto text-left">
												<span class="fw4">31/Oct/2022</span><br>
												<span class="fw5">JUARA LOMBA PUISI TINGKAT MTs AL-MULTAZAM 2022</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="contacts-2-holder mb-20">
							<div class="row d-flex align-items-center">
								<div class="col-lg-12">
									<div class="contact-box">
										<div class="row">
											<div class="col-md-4 mtb-auto">
												<img class="img-80" src="{{asset('landing-page/images/event/1.png')}}" alt="contacts-icon">
												<br>
											</div>
											<div class="col-md-8 mtb-auto text-left">
												<span class="fw4">31/Oct/2022</span><br>
												<span class="fw5">JUARA LOMBA PUISI TINGKAT MTs AL-MULTAZAM 2022</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="contacts-2-holder">
							<div class="row d-flex align-items-center">
								<div class="col-lg-12">
									<div class="contact-box">
										<div class="row">
											<div class="col-md-4 mtb-auto">
												<img class="img-80" src="{{asset('landing-page/images/event/1.png')}}" alt="contacts-icon">
												<br>
											</div>
											<div class="col-md-8 mtb-auto text-left">
												<span class="fw4">31/Oct/2022</span><br>
												<span class="fw5">JUARA LOMBA PUISI TINGKAT MTs AL-MULTAZAM 2022</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div> --}}
					</section>
				</div>
				
				<div class="col-md-4 mt-4" style="padding-left: 30px;">
					<div class="row gradient">
						<div class="col-md-12 my-3">
							<h1>Pengumuman Guru</h1>
						</div>
					</div>
					<div class="row d-flex align-items-center">
						<div class="col-lg-12">
							<div class="contact-box">
								<div class="row">
									<div class="col-md-3 mtb-auto">
										<img class="img-80" src="{{asset('landing-page/images/pengumuman.png')}}" alt="contacts-icon">
									</div>
									<div class="col-md-9 mtb-auto text-left">
										<span class="fw4">Panduan Pembuatan Soal Ujian Tahun 2036/2027 Link Download File<br>
											<a href="" class="color-a">[Link Download File]</a>
										</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row d-flex align-items-center">
						<div class="col-lg-12">
							<div class="contact-box">
								<div class="row">
									<div class="col-md-3 mtb-auto">
										<img class="img-80" src="{{asset('landing-page/images/pengumuman.png')}}" alt="contacts-icon">
									</div>
									<div class="col-md-9 mtb-auto text-left">
										<span class="fw4">Panduan Pembuatan Soal Ujian Tahun 2036/2027 Link Download File<br>
											<a href="" class="color-a">[Link Download File]</a>
										</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row d-flex align-items-center">
						<div class="col-lg-12">
							<div class="contact-box">
								<div class="row">
									<div class="col-md-3 mtb-auto">
										<img class="img-80" src="{{asset('landing-page/images/pengumuman.png')}}" alt="contacts-icon">
									</div>
									<div class="col-md-9 mtb-auto text-left">
										<span class="fw4">Panduan Pembuatan Soal Ujian Tahun 2036/2027 Link Download File<br>
											<a href="" class="color-a">[Link Download File]</a>
										</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row d-flex align-items-center">
						<div class="col-lg-12">
							<div class="contact-box">
								<div class="row">
									<div class="col-md-3 mtb-auto">
										<img class="img-80" src="{{asset('landing-page/images/pengumuman.png')}}" alt="contacts-icon">
									</div>
									<div class="col-md-9 mtb-auto text-left">
										<span class="fw4">Panduan Pembuatan Soal Ujian Tahun 2036/2027 Link Download File<br>
											<a href="" class="color-a">[Link Download File]</a>
										</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row d-flex align-items-center">
						<div class="col-lg-12">
							<div class="contact-box">
								<div class="row">
									<div class="col-md-3 mtb-auto">
										<img class="img-80" src="{{asset('landing-page/images/pengumuman.png')}}" alt="contacts-icon">
									</div>
									<div class="col-md-9 mtb-auto text-left">
										<span class="fw4">Panduan Pembuatan Soal Ujian Tahun 2036/2027 Link Download File<br>
											<a href="" class="color-a">[Link Download File]</a>
										</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<a href="#" class="color-a fw6">LIHAT LAINNYA ...</a>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-8 mt-4">
					<nav aria-label="Page navigation example">
						<ul class="pagination justify-content-center">
							<li class="page-item disabled">
								<a class="page-link" href="#" tabindex="-1" aria-disabled="true">‹</a>
							</li>
							<li class="page-item"><a class="page-link" href="#">1</a></li>
							<li class="page-item"><a class="page-link" href="#">2</a></li>
							<li class="page-item"><a class="page-link" href="#">3</a></li>
							<li class="page-item">
								<a class="page-link" href="#">›</a>
							</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</section>
@endsection

