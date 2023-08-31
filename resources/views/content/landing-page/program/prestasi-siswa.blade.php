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
	</style>
@endpush

@section('content')
	<section id="hero-1" class="hero-section division">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h3 class="h3-sm mt-4"><b>PRESTASI SISWA</b></h3>
                    <h4 class="m-0 fw7">MTs Al-Multazam</h4>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 mt-4">
					{{-- <section id="contacts-2" class="wide-100 contacts-section division"> --}}
					<section id="contacts-2" class="contacts-section division">
						{{-- <div class="container"> --}}
							<div class="contacts-2-holder mb-20">
								<div class="row d-flex align-items-center">
									<div class="col-lg-12">
										{{-- <div class="contact-box b-right"> --}}
										<div class="contact-box">
											<div class="row">
												<div class="col-md-4 mtb-auto">
													<img class="img-60" src="{{asset('landing-page/images/pengumuman.png')}}" alt="contacts-icon">
													<br>
												</div>
												<div class="col-md-8 mtb-auto text-left">
													<span class="fw5">Sekolah:</span><br>
													<span class="fw4 f-color">Jalan Raya Kepuhanyar No. 24 Mojoanyar Mojokerto</span>
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
													<img class="img-60" src="{{asset('landing-page/images/pengumuman.png')}}" alt="contacts-icon">
													<br>
												</div>
												<div class="col-md-8 mtb-auto text-left">
													<span class="fw5">Sekolah:</span><br>
													<span class="fw4 f-color">Jalan Raya Kepuhanyar No. 24 Mojoanyar Mojokerto</span>
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
													<img class="img-60" src="{{asset('landing-page/images/pengumuman.png')}}" alt="contacts-icon">
													<br>
												</div>
												<div class="col-md-8 mtb-auto text-left">
													<span class="fw5">Sekolah:</span><br>
													<span class="fw4 f-color">Jalan Raya Kepuhanyar No. 24 Mojoanyar Mojokerto</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						{{-- </div> --}}
					</section>
				</div>
			</div>
		</div>
	</section>
@endsection

