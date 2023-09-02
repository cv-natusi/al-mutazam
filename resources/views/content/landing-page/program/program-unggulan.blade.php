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
					<h3 class="h3-sm mt-4"><b>UNGGULAN</b></h3>
						<h4 class="m-0 fw7">MTs Al-Multazam</h4>
				</div>
			</div>
			<div class="row row-cols-1 row-cols-md-2 g-4 mt-20 ">
				<div class="col-md-4">
					<div class="t-3-photo mb-25">
						<img class="img-shadow mx-auto d-block responsive img-thumbnail img-fluid" src="http://192.168.2.251:8006/landing-page/images/berita/1.png" alt="team-member-foto">
							<h5 class="mt-3">Study Tour Bahasa Arab dan Inggris </h5>
						</div>
					</div>
				<div class="col-md-4">
					<div class="t-3-photo mb-25">
						<img class="img-shadow mx-auto d-block responsive img-thumbnail img-fluid" src="http://192.168.2.251:8006/landing-page/images/berita/1.png" alt="team-member-foto">
						<h5 class="mt-3">Study Ekskursi</h5>
						{{-- <a href="javascript:void(0)" id="read-more-319" onclick="readMore('319')" class="color-a">[Baca Selengkapnya]</a> --}}
					</div>
				</div>
				<div class="col-md-4">
					<div class="t-3-photo mb-25">
						<img class="img-shadow mx-auto d-block responsive img-thumbnail img-fluid" src="http://192.168.2.251:8006/landing-page/images/berita/1.png" alt="team-member-foto">
						<h5 class="mt-3">Program Tahfidhul Qur'an</h5>
					</div>
				</div>
				<div class="col-md-4">
					<div class="t-3-photo mb-25">
						<img class="img-shadow mx-auto d-block responsive img-thumbnail img-fluid" src="http://192.168.2.251:8006/landing-page/images/berita/1.png" alt="team-member-foto">
						<h5 class="mt-3">Program Tahfidhul Qur'an</h5>
					</div>
				</div>
				<div class="col-md-4">
					<div class="t-3-photo mb-25">
						<img class="img-shadow mx-auto d-block responsive img-thumbnail img-fluid" src="http://192.168.2.251:8006/landing-page/images/berita/1.png" alt="team-member-foto">
						<h5 class="mt-3">Study Ekskursi</h5>
						{{-- <a href="javascript:void(0)" id="read-more-319" onclick="readMore('319')" class="color-a">[Baca Selengkapnya]</a> --}}
					</div>
				</div>
				<div class="col-md-4">
					<div class="t-3-photo mb-25">
						<img class="img-shadow mx-auto d-block responsive img-thumbnail img-fluid" src="http://192.168.2.251:8006/landing-page/images/berita/1.png" alt="team-member-foto">
						<h5 class="mt-3">Program Tahfidhul Qur'an</h5>
					</div>
				</div>
				<div class="col-md-4">
					<div class="t-3-photo mb-25">
						<img class="img-shadow mx-auto d-block responsive img-thumbnail img-fluid" src="http://192.168.2.251:8006/landing-page/images/berita/1.png" alt="team-member-foto">
						<h5 class="mt-3">Program Tahfidhul Qur'an</h5>
					</div>
				</div>	
				<div class="col-md-4">
					<div class="t-3-photo mb-25">
						<img class="img-shadow mx-auto d-block responsive img-thumbnail img-fluid" src="http://192.168.2.251:8006/landing-page/images/berita/1.png" alt="team-member-foto">
						<h5 class="mt-3">Program Tahfidhul Qur'an</h5>
					</div>
				</div>
				<div class="col-md-4">
					<div class="t-3-photo mb-25">
						<img class="img-shadow mx-auto d-block responsive img-thumbnail img-fluid" src="http://192.168.2.251:8006/landing-page/images/berita/1.png" alt="team-member-foto">
						<h5 class="mt-3">Program Tahfidhul Qur'an</h5>
					</div>
				</div>						
			</div>
		</div>
	</section>
@endsection