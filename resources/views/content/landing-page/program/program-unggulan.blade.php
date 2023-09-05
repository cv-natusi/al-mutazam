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
						<h3 class="h3-sm mt-4"><b>UNGGULAN</b></h3>
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
		<div class="row row-cols-1 row-cols-md-2 g-4 mt-20 ">
			@foreach ($beritas as $index => $berita)
			<div class="col-md-4">
				<div class="t-3-photo mb-25">
					<img class="img-shadow mx-auto d-block responsive img-thumbnail img-fluid" src="{{asset('uploads/berita/'.$berita->gambar)}}" alt="slide-background" data-toggle="modal" data-target="#modal-detail">
					<h5 class="mt-3 text-center">{{$berita->judul}}</h5>
				</div>
			</div>
			@endforeach
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
	</div>
	<div class="modal fade" id="modal-detail" tabindex="-1" aria-labelledby="modal-detailLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header"  style="background-color: #5A79CB;">
					<h5 class="modal-title fs-5" id="modal-detail" style="color: white;">Study Tour Bahasa Arab dan Inggris </h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				</div>
				<div class="modal-body">
					<div class="contact-box">
						<div class="row">
							<div class="col-md-3 mtb-auto">
								<img class="img-80" src="{{asset('landing-page/images/slider/slide-3.jpg')}}">
							</div>
							<div class="col-md-9 mtb-auto text-left">
								<span class="fw4">Panduan Pembuatan Soal Ujian Tahun 2036/2027 Link Download File<br></span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
	
@endsection

