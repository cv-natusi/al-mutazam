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
		<div class="row">
			<div class="col-md-4 mtb-auto" style="line-height: 1;">
				<div class="row">
					<div class="col-md-12">
						<div class="slider-card b-bottom" style="margin: 9px -1px 0px -1px;">
							<div class="row">
								<div class="col-sm-12 cbox-5-txt">
									<h5 class="h5-xs fwhite fw8">Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum</h5>
									<p class="fwhite fw3 mb-3">Lorem ipsum, atau ringkasnya lipsum, adalah teks standar yang ditempatkan untuk mendemostrasikan el...</p>
									<a href="javascript:void(0)" class="slider-clink m-0">[baca]</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="slider-card b-bottom" style="margin: 9px -1px 0px -1px;">
							<div class="row">
								<div class="col-sm-12 cbox-5-txt">
									<h5 class="h5-xs fwhite fw8">Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum</h5>
									<p class="fwhite fw3 mb-3">Lorem ipsum, atau ringkasnya lipsum, adalah teks standar yang ditempatkan untuk mendemostrasikan el...</p>
									<a href="javascript:void(0)" class="slider-clink m-0">[baca]</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="slider-card b-bottom" style="margin: 9px -1px 0px -1px;">
							<div class="row">
								<div class="col-sm-12 cbox-5-txt">
									<h5 class="h5-xs fwhite fw8">Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum</h5>
									<p class="fwhite fw3 mb-3">Lorem ipsum, atau ringkasnya lipsum, adalah teks standar yang ditempatkan untuk mendemostrasikan el...</p>
									<a href="javascript:void(0)" class="slider-clink m-0">[baca]</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-8 p-0">
				<div class="slider">
					<ul class="slides">
						<li id="slide-1">
							<img src="{{asset('landing-page/images/slider/slide-1.jpg')}}" alt="slide-background">
							<div class="caption d-flex align-items-center left-align">
								<div class="container">
									<div class="row">
										<div class="col-md-8 col-lg-7">
											<div class="caption-txt">
												<h2 class="h2-sm">25K+ students trust our online courses</h2>
												<p class="p-lg">
													Feugiat primis ligula gravida auctor egestas augue viverra mauri 
													tortor in iaculis placerat an eugiat mauris ipsum undo viverra tortor gravida 
													purus lorem in tortor a viverr
												</p>
												<a href="#categories-3" class="btn btn-md btn-rose tra-black-hover">View Popular Courses</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</li>

						<li id="slide-2">
							<img src="{{asset('landing-page/images/slider/slide-2.jpg')}}" alt="slide-background">
							<div class="caption d-flex align-items-center right-align">
								<div class="container">
									<div class="row">
										<div class="col-md-8 col-lg-7">
											<div class="caption-txt white-color">
												<h2 class="h2-sm">2,769 online courses from the best tutors</h2>
												<form class="hero-form" action="categories-list.html">
													<div class="input-group">
														<input type="text" class="form-control" placeholder="What do you want to learn?" aria-label="Search">
														<span class="input-group-btn"><button type="submit" class="btn"><i class="fa fa-search" aria-hidden="true"></i></button></span>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</li>

						<li id="slide-3">
							<img src="{{asset('landing-page/images/slider/slide-3.jpg')}}" alt="slide-background">
							<div class="caption d-flex align-items-center right-align">
								<div class="container">
									<div class="row">
										<div class="col-md-8 col-lg-7">
											<div class="caption-txt">
												<h2 class="h2-sm">High quality courses from the leading experts</h2>
												<p class="p-lg">Feugiat primis ligula gravida auctor egestas augue viverra mauri 
													tortor in iaculis placerat an eugiat mauris ipsum undo viverra tortor gravida 
													purus lorem in tortor a viverr
												</p>
												<a href="#courses-4" class="btn btn-md btn-rose tra-black-hover">View Popular Courses</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</section>

	<section class="bg-second-section about-section division padding-section">
		<div class="container">
			<div class="row d-flex align-items-center">
				<div class="col-md-5">
					<div class="txt-block pc-25">
						<p class="h3-sm fw7 m-0" style="font-size: 14px; color: #0F4C81;">MTs AL-MUTAZAM</p>
						<h3 class="h3-sm" style="line-height: 1">Sambutan<br>Kepala Madrasah</h3>
						<p class="text-justify">
							Puji syukur kehadirat Allah SWT, karena kita masih diberikan kesempatan, kekuatan, dan kesehatan untuk melanjutkan ibadah kita, karya kita, serta tugas dan pengabdian kita dalam upaya mencerdaskan kehidupan bangsa dan negara yang tercinta. Rasa syukur ini juga saya panjatkan dalam rangka peluncuran situs website resmi MTs Al-Multazam Mojokerto sebagai sarana informasi dan komunikasi.
							<a href="javascript:void(0)" class="color-a fw4">[Baca Selengkapnya]</a>
						</p>
						<div class="row">
							<div class="col-md-3">TTD</div>
							<div class="col-md-9 text-left">
								<h5>Nama Kepala Madrasah</h5>
								<p>Kepala Sekolah</p>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-7">
					<div class="embed-responsive embed-responsive-16by9" style="height:100%">
						<div id="playerId"></div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="team-3" class="pt-50 pb-50 team-section division">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h3>Berita Terbaru</h3>
				</div>
			</div>
			<div class="row">
				@if(count($berita)>0)
					@foreach ($berita as $key => $val)
						<div class="col-md-4">
							<div class="t-3-photo mb-25">
								<img class="img-shadow mx-auto d-block responsive img-thumbnail img-fluid" src="{{asset('landing-page/images/berita/1.png')}}" alt="team-member-foto">
								<h5 class="mt-3">{{$val->judul}}</h5>
								<div class="text-justify text-color content" id="content-{{$val->id_berita}}">{!!$val->isi!!}</div>
								<a href="javascript:void(0)" id="read-more-{{$val->id_berita}}" onclick="readMore('{{$val->id_berita}}')" class="color-a">[Baca Selengkapnya]</a>
							</div>
						</div>
					@endforeach
				@endif
				{{-- <div class="col-md-4">
					<div class="t-3-photo mb-25">
						<img class="img-shadow mx-auto d-block responsive img-thumbnail img-fluid" src="{{asset('landing-page/images/berita/2.png')}}" alt="team-member-foto">
						<h4 class="mt-3">Judul</h4>
						<p class="text-color">Lorem ipsum, atau ringkasnya lipsum, adalah teks standar yang ditempatkan untuk mendemostrasikan elemen grafis atau <a href="javascript:void(0)" class="color-a">[selengkapnya]</a></p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="t-3-photo mb-25">
						<img class="img-shadow mx-auto d-block responsive img-thumbnail img-fluid" src="{{asset('landing-page/images/berita/3.png')}}" alt="team-member-foto">
						<h4 class="mt-3">Judul</h4>
						<p class="text-color">Lorem ipsum, atau ringkasnya lipsum, adalah teks standar yang ditempatkan untuk mendemostrasikan elemen grafis atau <a href="javascript:void(0)" class="color-a">[selengkapnya]</a></p>
					</div>
				</div> --}}
			</div>
			<div class="row">
				<div class="col-md-12">
					<a href="{{route('home.berita')}}" class="color-a fw6"><i>LIHAT BERITA TERBARU LAINNYA >></i></a>
				</div>
			</div>
		</div>
	</section>

	<section id="about-3" class="bg-second-section about-section division padding-section">
		<div class="container">
			<div class="row mb-2">
				<div class="col-md-12">
					<h3>Event Terbaru<br>MTs Al-Mutazam</h3>
				</div>
			</div>
			<div class="row">
				@if(count($event)>0)
					@foreach($event as $key => $val)
						<div class="col-md-4">
							<div class="t-3-photo mb-25">
								{{-- <img class="img-shadow mx-auto d-block responsive img-thumbnail img-fluid" src="https://www.quipper.com/id/blog/wp-content/uploads/2023/03/Apa-Itu-Peringkat-Sekolah-Ini-Penjelasannya-Lengkap-dengan-Cara-Melihat-Peringkat-Sekolah.webp" alt="team-member-foto"> --}}
								<img class="img-shadow mx-auto d-block responsive img-thumbnail img-fluid" src="{{asset('landing-page/images/event/1.png')}}" alt="team-member-foto">
								<div class="overlay-content overlay-card text-center">
								<p class="text-overlay fw7">{{$val->judul}}</p>
								</div>
							</div>
						</div>
					@endforeach
				@endif
				{{-- <div class="col-md-4">
					<div class="t-3-photo mb-25">
						<img class="img-shadow mx-auto d-block responsive img-thumbnail img-fluid" src="{{asset('landing-page/images/event/2.png')}}" alt="team-member-foto">
						<div class="overlay-content overlay-card fw7">
						  <p class="text-overlay">USP Kelas XII</p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="t-3-photo mb-25">
						<img class="img-shadow mx-auto d-block responsive img-thumbnail img-fluid" src="{{asset('landing-page/images/event/3.png')}}" alt="team-member-foto">
						<div class="overlay-content overlay-card fw7">
						  <p class="text-overlay">PTS Genap Kelas X dan XI</p>
						</div>
					</div>
				</div> --}}
			</div>
			<div class="row">
				<div class="col-md-12">
					<a href="{{route('home.event')}}" class="color-a fw6"><i>LIHAT EVENT LAINNYA >></i></a>
				</div>
			</div>
			{{-- <div class="row d-flex align-items-center">
				<div class="col-md-7 col-lg-6">
					<div class="txt-block pc-25">
					<h3 class="h3-sm">Event Mendatang<br>MTs Al-Mutazam</h3>
					<p>
						An enim nullam tempor sapien gravida donec porta and blandit ipsum enim justo integer velna vitae 
						auctor integer congue magna and purus pretium risus ligula rutrum luctus ultrice 
					</p>
					<ul class="txt-list mb-15">
						<li>Nullam rutrum eget nunc varius etiam mollis risus undo</li>
						<li>Integer congue magna at pretium purus pretium ligula at rutrum risus luctus dolor auctor ipsum blandit purus</li>
						<li>Risus at congue etiam aliquam sapien egestas posuere</li>
					</ul>
					<a href="categories-list.html" class="btn btn-md btn-rose tra-black-hover">Start Learning Now</a>
					</div>
				</div>
				<div class="col-md-5 col-lg-6">
					<div class="img-block">
						<img class="img-fluid" src="{{asset('landing-page/images/image-02.png')}}" alt="about-image">
					</div>
				</div>
			</div> --}}
		</div>
	</section>

	<section class="bg-lightgrey courses-section division padding-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="row">
						<div class="col-md-12">
							<h1>Agenda</h1>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-12">
							<div class="table-responsive pr-30">
								<table id="agendaTable" class="table table-striped table-bordered" style="width:100%; font-size: 14px;">
									<thead>
										<tr>
											<th>No</th>
											<th>Hari/Tanggal</th>
											<th>Kegiatan</th>
											<th>Aksi</th>
										</tr>
									</thead>
								</table>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-4">
					<div class="row">
						<div class="col-md-12">
							<h1>Pengumuman</h1>
						</div>
					</div>
					@if(count($pengumuman)>0)
						@foreach($pengumuman as $key => $val)
							<div class="row d-flex align-items-center">
								<div class="col-lg-12">
									<div class="contact-box">
										<div class="row">
											<div class="col-md-3 mtb-auto">
												<img class="img-80" src="{{asset('landing-page/images/pengumuman.png')}}" alt="contacts-icon">
											</div>
											<div class="col-md-9 mtb-auto text-left">
												{{-- <span class="fw5">Sekolah:</span><br> --}}
												{{-- <span class="fw4 f-color">Final MA Permata Festival 2021 [Baca Selengkapnya]</span> --}}
												<span class="fw4">
													{{$val->judul}}<br>
													<a href="{{route('home.pengumuman')}}" class="color-a">[Baca Selengkapnya]</a>
												</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						@endforeach
					@endif
					{{-- <div class="row d-flex align-items-center">
						<div class="col-lg-12">
							<div class="contact-box">
								<div class="row">
									<div class="col-md-3 mtb-auto">
										<img class="img-80" src="{{asset('landing-page/images/pengumuman.png')}}" alt="contacts-icon">
									</div>
									<div class="col-md-9 mtb-auto text-left">
										<span class="fw4">
											10 Besar Finalis Lomba KSM ( Kompetisi Sains Madrasah) Mojokerto<br>
											<a href="{{route('home.pengumuman')}}" class="color-a">[Baca Selengkapnya]</a>
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
										<span class="fw4">
											Juara Harapan 2 Kompetisi Bahasa Arab Nasional (KOMBANAS)<br>
											<a href="{{route('home.pengumuman')}}" class="color-a">[Baca Selengkapnya]</a>
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
										<span class="fw4">
											Pendaftaran Tes Gelombang 2 Pondok Pesantren Al-Multazam 1 dan 2<br>
											<a href="{{route('home.pengumuman')}}" class="color-a">[Baca Selengkapnya]</a>
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
										<span class="fw4">
											Pendaftaran Tes Gelombang 2 Pondok Pesantren Al-Multazam 1 dan 2<br>
											<a href="{{route('home.pengumuman')}}" class="color-a">[Baca Selengkapnya]</a>
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
										<span class="fw4">
											Pemenang Lomba Poster, Karikatur dan Mading<br>
											<a href="{{route('home.pengumuman')}}" class="color-a">[Baca Selengkapnya]</a>
										</span>
									</div>
								</div>
							</div>
						</div>
					</div> --}}
				</div>
			</div>
		</div>
	</section>
@endsection
@push('script')
	<script src="{{asset('plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{asset('plugins/datatable/js/dataTables.bootstrap5.min.js')}}"></script>

	<script type='text/javascript' src='http://www.youtube.com/iframe_api'></script>
	<script type="text/javascript">
		$(document).ready(() => {
			var maxWord = 15;
			$(".content").each(function(){
				var myStr = $(this).html()
				var id = $(this).data('id')
				if(myStr.split(' ').length > maxWord){
					var arrStr = myStr.split(' ')

					var newStr = filterArray(arrStr,maxWord,`first`)
					var removedStr = filterArray(arrStr,maxWord,'second')

					newStr = newStr.join(' ')
					removedStr = removedStr.join(' ')

					$(this).empty().html(newStr+'...')
					$(this).data('first',newStr+'...')
					$(this).data('second',' '+removedStr)
				}
			})

			var data = [
				{
					'no': '1',
					'tanggal': 'Senin',
					'kegiatan': 'Ekstra',
					'aksi': 'detail'
				},
			]
			$('#agendaTable').DataTable({
				// dom: 'lfrtip', // Default
				dom: 'rtp',
				data:data,
				columns: [
					{
						name: 'no',
						data: 'no'
					},
					{
						name: 'tanggal',
						data: 'tanggal'
					},
					{
						name: 'kegiatan',
						data: 'kegiatan'
					},
					{
						name: 'aksi',
						data: 'aksi'
					},
				]
			});
		})


		function filterArray(array,num,prefix){
			var arrStr = $.grep(array, function(v,i) {
				if(prefix==='first'){
					if(i<num){
						return v.indexOf('1');
					}
				}else{
					if(i>=num){
						return v.indexOf('1');
					}
				}
			})
			return arrStr
		}
		function readMore(id){
			var textButton = $(`#read-more-${id}`).text()
			var firstText = $(`#content-${id}`).data('first')
			var secondText = $(`#content-${id}`).data('second')
			if(textButton==='[Baca Selengkapnya]'){
				$(`#content-${id}`).empty().html(firstText.slice(0,-3)+secondText)
				$(`#read-more-${id}`).text('[Baca Lebih Sedikit]')
			}else{
				$(`#content-${id}`).empty().html(firstText)
				$(`#read-more-${id}`).text('[Baca Selengkapnya]')
			}
		}

		// https://youtu.be/ysNDDrG9PtI
		var player;
		// function onYouTubeIframeAPIReady(){
		// 	player = new YT.Player('playerId',{
		// 		videoId: 'ysNDDrG9PtI', // Video id
		// 		playerVars: {
		// 			'autoplay': 1,
		// 			'controls': 1,
		// 			'showinfo': 0,
		// 			'modestbranding': 0,
		// 			'loop': 1,
		// 			'fs': 0,
		// 			'cc_load_policty': 0,
		// 			'iv_load_policy': 3
		// 		},
		// 		events:{
		// 			onReady: function(event){
		// 				// event.target.mute();
		// 				event.target.setVolume(2);
		// 				event.target.playVideo();
		// 			},
		// 			onStateChange: function(e){
		// 				if(e.data === YT.PlayerState.ENDED){
		// 					e.target.playVideo();
		// 				}
		// 			}
		// 		}
		// 	})
		// }
	</script>
@endpush