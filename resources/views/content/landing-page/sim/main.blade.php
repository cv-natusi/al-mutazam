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
	.btn-buka{
		background: #6E8FE7;
		color: #ffffff;
		border-radius: 10px;
	}
	.btn-buka:hover{
		color: #ffffff;
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
							<h3 class="h3-sm mt-4"><b>SIM</b></h3>
						<h4 class="m-0 fw7">MTs Al-Multazam</h4>
						</div>
					</div>
				</div>
				<div class="col-lg-3 justify-content-end">
					<div class="row">
						<div class="col-md-12">
							<h1 class="h3-sm mt-4" style="font-size: 60px; color: #D9D9D9"><b>SIM</b></h1>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-8 mt-4">
					<div class="row">
						@foreach ($sim as $item)
							<div class="col-md-6">
								<div class="contacts-2-holder mb-20">
									<div class="row d-flex align-items-center">
										<div class="col-lg-12">
											<div class="contact-box">
												<div class="row">
													<div class="col-md-4 mtb-auto">
														<img class="img-80" src="{{asset('storage/uploads/MstSIM/'.$item->gambar)}}" alt="contacts-icon">
														<br>
													</div>
													<div class="col-md-8 mtb-auto text-left">
														<span class="fw4">{{ $item->nama }}</span><br>
														<a href="{{ $item->link_url }}" class="btn btn-buka btn-sm fw5">Buka</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						@endforeach
						
					</div>
				</div>
				
				{{-- <div class="col-md-4 mt-4">
					<section id="contacts-2" class="contacts-section division">
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
												<span class="fw4">PIP</span><br>
												<button type="button" class="btn btn-buka btn-sm fw5">Buka</button>
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
												<span class="fw4">SIMPATIKA</span><br>
												<button type="button" class="btn btn-buka btn-sm fw5">Buka</button>
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
												<span class="fw4">RKAM</span><br>
												<button type="button" class="btn btn-buka btn-sm fw5">Buka</button>
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
												<span class="fw4">RDM</span><br>
												<button type="button" class="btn btn-buka btn-sm fw5">Buka</button>
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
												<span class="fw4">e-Learning</span><br>
												<button type="button" class="btn btn-buka btn-sm fw5">Buka</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div> --}}
				
				<div class="col-md-4 mt-4" style="padding-left: 30px;">
					@include('content.landing-page.include.side-dokumen')
				</div>
			</div>
			
			<div class="row">
			{{ $sim->links() }}
				{{-- <div class="col-md-8 mt-4">
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
				</div> --}}
			</div>
		</div>
	</section>
@endsection