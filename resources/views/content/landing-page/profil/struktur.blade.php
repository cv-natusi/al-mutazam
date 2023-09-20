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
						<h3 class="h3-sm mt-4"><b>STRUKTUR ORGANISASI</b></h3>
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
				<img class="img" src="{{asset('uploads/identitas/'.$identity->foto_struktur)}}" alt="contacts-icon" style="margin-bottom: 30px; width: 100%; border-radius: 15px">
				{{-- <section id="contacts-2" class="contacts-section division">
						<p>{!! $identity->sejarah !!}</p>
					</section> --}}
			</div>

			<div class="col-md-4 mt-4" style="padding-left: 30px;">
				@include('content.landing-page.include.side-profile')
				@include('content.landing-page.include.side-amtv')
				<div class="row">
					<div class="col-md-12">
						<a href="{{route("amtv.main")}}" class="color-a fw6">LIHAT LAINNYA ...</a>
					</div>
				</div>
			</div>
		</div>

	</div>
</section>
@endsection