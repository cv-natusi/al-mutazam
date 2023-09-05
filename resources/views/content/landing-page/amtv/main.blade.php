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
							<h3 class="h3-sm mt-4"><b>AMTV</b></h3>
						<h4 class="m-0 fw7">MTs Al-Multazam</h4>
						</div>
					</div>
				</div>
				<div class="col-lg-3 justify-content-end">
					<div class="row">
						<div class="col-md-12">
							<h1 class="h3-sm mt-4" style="font-size: 65px; color: #D9D9D9"><b>AMTV</b></h1>
						</div>
					</div>
				</div>
			</div>
			<div class="row row-cols-1 row-cols-md-2 g-4 mt-20 ">
				@if(count($amtvs)>0)
					@foreach ($amtvs as $idx => $amtv)
					@php
						$url = explode('?v=', $amtv->file);
						$link = $url[count($url)-1];	
					@endphp
					<div class="col-md-4">
						<div class="t-3-photo mb-25">
							<iframe width="100%" height="250" src="http://www.youtube.com/embed/{{$link}}" frameborder="0" allowfullscreen></iframe>
							<h5 class="mt-3 text-center">{{$amtv->judul_amtv}}</h5>
						</div>
					</div>
					@endforeach
				@endif
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