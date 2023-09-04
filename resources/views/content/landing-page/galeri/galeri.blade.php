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

        .galery .image img{
            transition: all o.5s ease;
        }

        .galery .image:hover img{
            transform: scale(1.1);
        }

        .galery span{
            overflow: hidden;
        }

        .img-box .slide {
            position: absolute;
            top: 50%;
            cursor: pointer;
            color: #ffffff;
            font-size: 30px; 
            transform: translateY(-50%);
            width: 60px;
            height: 50px;
            line-height: 50px;
            text-align: center;
        }

        .image-box .slide.prev {
            left: 0;
            padding: 0, 0, 0, 50px;
        }

        .image-box .slide.prev {
            right: 0;
        }

        .preview-box .img-box img{
            width: 100%;
            border-radius: 0 0 3px 3px;
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
							<h3 class="h3-sm mt-4"><b>GALLERY</b></h3>
						<h4 class="m-0 fw7">MTs Al-Multazam</h4>
						</div>
					</div>
				</div>
				<div class="col-lg-3 justify-content-end">
					<div class="row">
						<div class="col-md-12">
							<h1 class="h3-sm mt-4" style="font-size: 65px; color: #D9D9D9"><b>GALLERY</b></h1>
						</div>
					</div>
				</div>
			</div>
			<div class="row row-cols-1 row-cols-md-2 g-4 mt-20 ">
				@foreach ($galeries as $index => $galeri)
				<div class="col-md-4 galery">
					<div class="t-3-photo mb-25 image">
						<img class="span img-shadow mx-auto d-block responsive img-thumbnail img-fluid" src="{{asset('uploads/galeri/'.$galeri->file_galeri)}}" alt="slide-background" data-toggle="modal" data-target="#modal-detail">
						<h5 class="mt-3">{{$galeri->deskripsi_galeri}}</h5>
					</div>
				</div>
				@endforeach
				{{-- <div class="col-md-4">
					<div class="t-3-photo mb-25">
						<img class="img-shadow mx-auto d-block responsive img-thumbnail img-fluid" src="{{asset('landing-page/images/slider/slide-3.jpg')}}" alt="slide-background">
						<h5 class="mt-3">Study Ekskursi</h5>
					</div>
				</div>
				<div class="col-md-4">
					<div class="t-3-photo mb-25">
						<img class="img-shadow mx-auto d-block responsive img-thumbnail img-fluid" src="{{asset('landing-page/images/slider/slide-3.jpg')}}" alt="slide-background">
						<h5 class="mt-3">Program Tahfidhul Qur'an</h5>
					</div>
				</div>
				<div class="col-md-4">
					<div class="t-3-photo mb-25">
						<img class="img-shadow mx-auto d-block responsive img-thumbnail img-fluid" src="{{asset('landing-page/images/slider/slide-3.jpg')}}" alt="slide-background">
						<h5 class="mt-3">Program Tahfidhul Qur'an</h5>
					</div>
				</div>
				<div class="col-md-4">
					<div class="t-3-photo mb-25">
						<img class="img-shadow mx-auto d-block responsive img-thumbnail img-fluid" src="{{asset('landing-page/images/slider/slide-3.jpg')}}" alt="slide-background">
						<h5 class="mt-3">Study Ekskursi</h5>
					</div>
				</div>
				<div class="col-md-4">
					<div class="t-3-photo mb-25">
						<img class="img-shadow mx-auto d-block responsive img-thumbnail img-fluid" src="{{asset('landing-page/images/slider/slide-3.jpg')}}" alt="slide-background">
						<h5 class="mt-3">Program Tahfidhul Qur'an</h5>
					</div>
				</div>
				<div class="col-md-4">
					<div class="t-3-photo mb-25">
						<img class="img-shadow mx-auto d-block responsive img-thumbnail img-fluid" src="{{asset('landing-page/images/slider/slide-3.jpg')}}" alt="slide-background">
						<h5 class="mt-3">Program Tahfidhul Qur'an</h5>
					</div>
				</div>	
				<div class="col-md-4">
					<div class="t-3-photo mb-25">
						<img class="img-shadow mx-auto d-block responsive img-thumbnail img-fluid" src="{{asset('landing-page/images/slider/slide-3.jpg')}}" alt="slide-background">
						<h5 class="mt-3">Program Tahfidhul Qur'an</h5>
					</div>
				</div>
				<div class="col-md-4">
					<div class="t-3-photo mb-25">
						<img class="img-shadow mx-auto d-block responsive img-thumbnail img-fluid" src="{{asset('landing-page/images/slider/slide-3.jpg')}}" alt="slide-background">
						<h5 class="mt-3">Program Tahfidhul Qur'an</h5>
					</div>
				</div> --}}
			</div>
		</div>
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

    
	<div class="modal fade" id="modal-detail" tabindex="-1" aria-labelledby="modal-detailLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="preview-box">
                    <div class="details">
                        <span class="title">
                        </span>
                    </div>
                    <div class="img-box">
                        <div class="slide prev">
                            <i class="fas fa-angle-left"></i>
                        </div>
                        <div class="slide next" style="margin-left: 87%">
                            <i class="fas fa-angle-right"></i>
                        </div>
                        <img src="{{asset('landing-page/images/slider/slide-3.jpg')}}" alt="">
                    </div>
                </div>
			</div>
		</div>
	</div>
</section>
	
@endsection

