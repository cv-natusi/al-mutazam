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

        /*Btn */
        .btn {
        background-color: #337CCF;
        border: none;
        color: white;
        padding: 16px 40px;
        width: 191px;
        text-align: center;
        font-size: 12px;
        margin: 4px 2px;
        opacity: 1;
        transition: 0.3s;
        }

        .btn:hover {
        opacity: 0.6
        }
	</style>
@endpush

@section('content')
<section id="hero-1" class="hero-section division">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h3 class="h3-sm mt-4"><b>EKSTRAKULIKULER</b></h3>
						<h4 class="m-0 fw7">MTs Al-Multazam</h4>
				</div>
			</div>
			<div class="row row-cols-1 row-cols-md-2 g-4 mt-20 ">
				<div class="col-md-2">
					<div class="t-3-photo mb-25">
						<img class="img-shadow mx-auto d-block responsive img-thumbnail img-fluid" src="{{asset('landing-page/images/team-1.jpg')}}" alt="slide-background" data-toggle="modal" data-target="#modal-detail">
                        <button class="btn">PMR</button>
						</div>
					</div>
                    <div class="col-md-2">
					<div class="t-3-photo mb-25">
						<img class="img-shadow mx-auto d-block responsive img-thumbnail img-fluid" src="{{asset('landing-page/images/team-1.jpg')}}" alt="slide-background" data-toggle="modal" data-target="#modal-detail">
                        <button class="btn">KALIGRAFI</button>
						</div>
					</div>
				<div class="col-md-2">
					<div class="t-3-photo mb-25">
						<img class="img-shadow mx-auto d-block responsive img-thumbnail img-fluid" src="{{asset('landing-page/images/team-1.jpg')}}" alt="slide-background">
						<button class="btn">TARTIL QUR'AN</button>
                        {{-- <a href="javascript:void(0)" id="read-more-319" onclick="readMore('319')" class="color-a">[Baca Selengkapnya]</a> --}}
					</div>
				</div>
				<div class="col-md-2">
					<div class="t-3-photo mb-25">
					    <img class="img-shadow mx-auto d-block responsive img-thumbnail img-fluid" src="{{asset('landing-page/images/team-1.jpg')}}" alt="slide-background">
                        <button class="btn">CLUB OLIMPIADE</button>
                    </div>
				</div>
                <div class="row row-cols-1 row-cols-md-2 g-4 mt-20 ">
				<div class="col-md-2">
					<div class="t-3-photo mb-25">
						<img class="img-shadow mx-auto d-block responsive img-thumbnail img-fluid" src="{{asset('landing-page/images/team-1.jpg')}}" alt="slide-background">
						<button class="btn">MENJAHIT</button>
                        {{-- <a href="javascript:void(0)" id="read-more-319" onclick="readMore('319')" class="color-a">[Baca Selengkapnya]</a> --}}
					</div>
				</div>
				<div class="col-md-2">
					<div class="t-3-photo mb-25">
						<img class="img-shadow mx-auto d-block responsive img-thumbnail img-fluid" src="{{asset('landing-page/images/team-1.jpg')}}" alt="slide-background">
                        <button class="btn">PASKIBRAKA</button>
                    </div>
				</div>
				<div class="col-md-2">
					<div class="t-3-photo mb-25">
						<img class="img-shadow mx-auto d-block responsive img-thumbnail img-fluid" src="{{asset('landing-page/images/team-1.jpg')}}" alt="slide-background">
                        <button class="btn">PRAMUKA</button>
                    </div>
				</div>
				<div class="col-md-2">
					<div class="t-3-photo mb-25">
						<img class="img-shadow mx-auto d-block responsive img-thumbnail img-fluid" src="{{asset('landing-page/images/team-1.jpg')}}" alt="slide-background">
                        <button class="btn">PENCAK SILAT</button>
                    </div>
				</div>
                <div class="row">
				<div class="col-md-2">
					<div class="t-3-photo mb-25">
						<img class="img-shadow mx-auto d-block responsive img-thumbnail img-fluid" src="{{asset('landing-page/images/team-1.jpg')}}" alt="slide-background">
                        <button class="btn">JURNALISTIK</button>
                    </div>
				</div>
                <div class="col-md-2">
					<div class="t-3-photo mb-25">
						<img class="img-shadow mx-auto d-block responsive img-thumbnail img-fluid" src="{{asset('landing-page/images/team-1.jpg')}}" alt="slide-background">
                        <button class="btn">PADUAN SUARA</button>
                    </div>
				</div>
                <div class="col-md-2">
					<div class="t-3-photo mb-25">
						<img class="img-shadow mx-auto d-block responsive img-thumbnail img-fluid" src="{{asset('landing-page/images/team-1.jpg')}}" alt="slide-background">
                        <button class="btn">BANJARI</button>
                    </div>
				</div>
				<div class="col-md-2">
					<div class="t-3-photo mb-25">
						<img class="img-shadow mx-auto d-block responsive img-thumbnail img-fluid" src="{{asset('landing-page/images/team-1.jpg')}}" alt="slide-background">
                        <button class="btn">PUBLIC SPEAKING</button>
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
	</section>
@endsection