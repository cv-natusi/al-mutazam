@extends('layout.landing-page.main')

@push('style')
	<link href="{{asset('plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet">
	<style>
	/* Slider start */
		.slider-clink{
			text-decoration: none;
			color: white;
		}
		.slider-clink:hover{
			color: #a2b9ff;
		}
		.slider-card {
			background: rgb(172,197,19);
			background: linear-gradient(180deg, rgba(172,197,19,1) 0%, rgba(41,105,161,1) 100%);
			border: 1px solid #ddd;
			padding: 25px;
			margin-bottom: 16px;
			-webkit-transition: all 450ms ease-in-out;
			-moz-transition: all 450ms ease-in-out;
			-o-transition: all 450ms ease-in-out;
			-ms-transition: all 450ms ease-in-out;
			transition: all 450ms ease-in-out;
		}
		.hero-section{
			margin-top: 80px;
		}
		.slider {
			position: relative;
			max-width: 100%;
			height: 600px;
			margin-top: 10px;
		}
		.slider .slides li img {
			background-position: center;
		}
	/* Slider end */

	.bg-second-section{
		background-color: var(--custom-bg-section);
	}

	.text-color{
		color: var(--text-color)
	}

	.gradient{
		background-image: linear-gradient(to right, #97E2A8, #ffffff);
		border-radius: 5px;
	}

	/* Section 2 start */
	/* Section 2 end */
	.img-shadow{
		box-shadow: 3px 3px 10px #ccc;
		border-radius: 10px;
	}


	.overlay-content{
		position: absolute; 
		background: rgb(255,255,255);
		background: linear-gradient(180deg, rgba(255,255,255,0) 0%, rgba(160,166,227,1) 100%);
		display: flex;
		align-items: center;
		justify-content: center;
	}
	.overlay-card{
		left: 20px;
		right: 20px;
		margin-bottom: 30px;
		bottom: 0;
		border-radius: 0px 0px 5px 5px;
		padding: 80px 0px 30px 0px;
	}

	.text-overlay{
		color: white;
		margin-bottom: -25px;
	}
	</style>
@endpush

@section('content')
	<section id="hero-1" class="hero-section division">
		<div class="container">
		<div class="row">
				<div class="col-lg-9">
					<div class="row">
						<div class="col-md-12">
							<h3 class="h3-sm mt-4"><b>SEJARAH</b></h3>
						<h4 class="m-0 fw7">MTs Al-Multazam</h4>
						</div>
					</div>
				</div>
				<div class="col-lg-3 justify-content-end">
					<div class="row">
						<div class="col-md-12">
							<h1 class="h3-sm mt-4" style="font-size: 60px; color: #D9D9D9"><b>PROFIL</b></h1>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-8 mt-4">
					
                    <img class="img" src="{{asset('uploads/identitas/'.$identity->foto_sejarah)}}" alt="contacts-icon" style="margin-bottom: 30px; width: 100%; border-radius: 15px">
					<section id="contacts-2" class="contacts-section division">
						<p>{!! $identity->sejarah !!}</p>
					</section>
				</div>
							
				<div class="col-md-4 mt-4" style="padding-left: 30px;">
					<div class="row gradient"><!-- Menu Profil -->
						<div class="col-md-12 my-3">
							<h1>Menu Profil</h1>
						</div>
					</div>
					<div class="row d-flex align-items-center">
						<div class="col-lg-12">
							<div class="contact-box">
								<div class="row">
									<li>Sejarah</li>
								</div>
								<div class="row">
									<li>Visi dan Misi</li>
								</div>
								<div class="row">
									<li>Sambutan Kepada Kepala Madrasah</li>
								</div>
								<div class="row">
									<li>Struktur Organisasi</li>
								</div>
								<div class="row">
									<li>Profil Struktural</li>
								</div>
								<div class="row">
									<li>Fasilitas Madrasah</li>
								</div>
							</div>
						</div>
					</div>
					<div class="row gradient"><!-- AMTV -->
						<div class="col-md-12 my-3">
							<h1>AMTV Terbaru</h1>
						</div>
					</div>
					<div class="row d-flex align-items-center">
						<div class="col-lg-12">
							<div class="contact-box">
								<div class="row">
									<div class="col-md-3 mtb-auto">
										<img class="img-80" src="{{asset('landing-page/images/amtv.png')}}" alt="contacts-icon">
									</div>
									<div class="col-md-9 mtb-auto text-left">
										<span class="fw4">Sosialisasi Kegiatan Visi dan Misi SMAS Al-Multazam
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
										<img class="img-80" src="{{asset('landing-page/images/amtv.png')}}" alt="contacts-icon">
									</div>
									<div class="col-md-9 mtb-auto text-left">
										<span class="fw4">Sosialisasi Kegiatan Visi dan Misi SMAS Al-Multazam
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
										<img class="img-80" src="{{asset('landing-page/images/amtv.png')}}" alt="contacts-icon">
									</div>
									<div class="col-md-9 mtb-auto text-left">
										<span class="fw4">Sosialisasi Kegiatan Visi dan Misi SMAS Al-Multazam
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
										<img class="img-80" src="{{asset('landing-page/images/amtv.png')}}" alt="contacts-icon">
									</div>
									<div class="col-md-9 mtb-auto text-left">
										<span class="fw4">Sosialisasi Kegiatan Visi dan Misi SMAS Al-Multazam
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
										<img class="img-80" src="{{asset('landing-page/images/amtv.png')}}" alt="contacts-icon">
									</div>
									<div class="col-md-9 mtb-auto text-left">
										<span class="fw4">Sosialisasi Kegiatan Visi dan Misi SMAS Al-Multazam
										</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row gradient"><!--Dokumen-->
						<div class="col-md-12 my-3">
							<h1>Dokumen</h1>
						</div>
					</div>
					<div class="row d-flex align-items-center">
						<div class="col-lg-12">
							<div class="contact-box">
								<div class="row">
									<div class="col-md-3 mtb-auto">
										<img class="img-80" src="{{asset('landing-page/images/mask.png')}}" alt="contacts-icon">
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
										<img class="img-80" src="{{asset('landing-page/images/mask.png')}}" alt="contacts-icon">
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
										<img class="img-80" src="{{asset('landing-page/images/mask.png')}}" alt="contacts-icon">
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
										<img class="img-80" src="{{asset('landing-page/images/mask.png')}}" alt="contacts-icon">
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
										<img class="img-80" src="{{asset('landing-page/images/mask.png')}}" alt="contacts-icon">
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
			
		</div>
	</section>
@endsection

