@extends('layout.landing-page.main')

@push('style')
<link href="{{asset('plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet">
<style>
	/* Slider start */
	.slider-clink {
		text-decoration: none;
		color: white;
	}

	.slider-clink:hover {
		color: #a2b9ff;
	}

	.slider-card {
		background: rgb(172, 197, 19);
		background: linear-gradient(180deg, rgba(172, 197, 19, 1) 0%, rgba(41, 105, 161, 1) 100%);
		border: 1px solid #ddd;
		padding: 25px;
		margin-bottom: 16px;
		-webkit-transition: all 450ms ease-in-out;
		-moz-transition: all 450ms ease-in-out;
		-o-transition: all 450ms ease-in-out;
		-ms-transition: all 450ms ease-in-out;
		transition: all 450ms ease-in-out;
	}

	.hero-section {
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

	.bg-second-section {
		background-color: var(--custom-bg-section);
	}

	.text-color {
		color: var(--text-color)
	}

	/* Section 2 start */
	/* Section 2 end */
	.img-shadow {
		box-shadow: 3px 3px 10px #ccc;
		border-radius: 10px;
	}

	.overlay-content {
		position: absolute;
		background: rgb(255, 255, 255);
		background: linear-gradient(180deg, rgba(255, 255, 255, 0) 0%, rgba(160, 166, 227, 1) 100%);
		display: flex;
		align-items: center;
		justify-content: center;
	}

	.overlay-card {
		left: 20px;
		right: 20px;
		margin-bottom: 30px;
		bottom: 0;
		border-radius: 0px 0px 5px 5px;
		padding: 80px 0px 30px 0px;
	}

	.text-overlay {
		color: white;
		margin-bottom: -25px;
	}

	.color-readmore-slider {
		color: #ffffff;
	}

	.text-color-slider {
		color: #ffffff;
	}
</style>
@endpush

@section('content')
<section id="hero-1" class="hero-section division">
	<div class="row">
		<div class="col-md-4 mtb-auto" style="line-height: 1;">
			@foreach ($beritaSlider as $index => $item)
			<div class="row">
				<div class="col-md-12">
					<div class="slider-card b-bottom" style="margin: 9px -1px 0px -1px;">
						<div class="row">
							<div class="col-sm-12 cbox-5-txt">
								<h5 class="h5-xs fwhite fw8">{{$item->judul}}</h5>
								<div class="text-justify text-color-slider content" id="content-{{$item->id_berita}}">{!!$item->isi!!}</div>
								<a href="javascript:void(0)" id="read-more-{{$item->id_berita}}" onclick="readMore('{{$item->id_berita}}')" class="color-readmore-slider">[Baca Selengkapnya]</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>

		<div class="col-md-8 p-0">
			<div class="slider">
				<ul class="slides">
					@foreach ($slider as $i => $s)
					@if (empty($s->gambar))
					<li id="slide-{{$i}}">
						<img src="{{asset('uploads/default.jpg')}}" alt="slide-background">
					</li>
					@else
					<li id="slide-{{$i}}">
						<img src="{{asset('uploads/slider/'.$s->gambar)}}" alt="slide-background">
					</li>
					@endif
					@endforeach
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
					<div class="text-justify content" id="content-{{$identity->id_identitas}}">{!!$identity->sambutan_kepsek!!}</div>
					{{-- <p class="text-justify content" id="content-{{$identity->id_identitas}}">
					{!! $identity->sambutan_kepsek !!}
					</p> --}}
					<a href="javascript:void(0)" id="read-more-{{$identity->id_identitas}}" onclick="readMore('{{$identity->id_identitas}}')" class="color-a">[Baca Selengkapnya]</a>
					<div class="row">
						<div class="col-md-3">
							<img class="img-shadow mx-auto d-block responsive img-thumbnail img-fluid" src="{{asset('ttd-default.png')}}" alt="ttd kepsek">
						</div>
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
			<div class="col-md-12 mb-2">
				<div style="background: linear-gradient(90deg, #97E2A8 4.57%, rgba(217, 217, 217, 0) 76.75%); color: #000; padding: 5px">
					<h3 style="margin-left: 10px">Berita Terbaru</h3>
				</div>
			</div>
		</div>
		<div class="row">
			@if(count($berita)>0)
			@foreach ($berita as $key => $val)
			<div class="col-md-4">
				<div class="t-3-photo mb-25">
					<img class="img-shadow mx-auto d-block responsive img-thumbnail img-fluid" src="{{asset('uploads/berita/'.$val->gambar)}}" alt="team-member-foto">
					<h5 class="mt-3">{{$val->judul}}</h5>
					<div class="text-justify content" id="content-{{$val->id_berita}}">{!!$val->isi!!}</div>
					<a href="javascript:void(0)" id="read-more-{{$val->id_berita}}" onclick="readMore('{{$val->id_berita}}')" class="color-a">[Baca Selengkapnya]</a>
				</div>
			</div>
			@endforeach
			@endif
		</div>
		<div class="row">
			<div class="col-md-12">
				<a href="{{route('home.berita')}}" class="color-a fw6"><i>LIHAT LAINNYA ...</i></a>
			</div>
		</div>
	</div>
</section>

<section id="about-3" class="bg-second-section about-section division padding-section">
	<div class="container">
		<div class="row mb-2">
			<div class="col-md-12 mb-2">
				<div style="background: linear-gradient(90deg, #97E2A8 4.57%, rgba(217, 217, 217, 0) 76.75%); color: #000; padding: 5px">
					<h3 style="margin-left: 10px">Event Mendatang</h3>
				</div>
			</div>
		</div>
		<div class="row">
			@if(count($event)>0)
			@foreach($event as $key => $val)
			<div class="col-md-4">
				<div class="t-3-photo mb-25">
					@if(file_exists(public_path().'/uploads/berita/'.$val->gambar))
					<img class="mx-auto d-block responsive img-fluid" src="{{asset('uploads/berita/'.$val->gambar)}}" alt="team-member-foto">
					@else
					<img class="mx-auto d-block responsive img-fluid" src="{{asset('default.jpg')}}" alt="team-member-foto">
					@endif
					<div class="overlay-content overlay-card text-center">
						<p class="text-overlay fw7">{{$val->judul}}</p>
					</div>
				</div>
			</div>
			@endforeach
			@endif
		</div>
		<div class="row">
			<div class="col-md-12">
				<a href="{{route('home.event')}}" class="color-a fw6"><i>LIHAT EVENT LAINNYA >></i></a>
			</div>
		</div>
	</div>
</section>

<section class="bg-lightgrey courses-section division padding-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="row">
					<div class="col-md-12 mb-2">
						<div style="background: linear-gradient(90deg, #97E2A8 4.57%, rgba(217, 217, 217, 0) 76.75%); color: #000; padding: 5px">
							<h3 style="margin-left: 10px">Agenda</h3>
						</div>
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
								<tbody>
									@if (count($agendas)>0)
									@foreach ($agendas as $index => $agenda)
									<tr>
										<td>{{$index+1}}</td>
										<td>{{$agenda->judul}}</td>
										<td>{{date('d/M/Y',strtotime($agenda->tanggal_acara))}}</td>
										<td>
											<a href="#" onclick="alert('Maintenance!')" class="text-center" style="text-align: center; color: #000">Detail</a>
										</td>
									</tr>
									@endforeach
									@endif
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section id="about-3" class="bg-second-section about-section division padding-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="row">
					<div class="col-md-12 mb-2">
						<div style="background: linear-gradient(90deg, #97E2A8 4.57%, rgba(217, 217, 217, 0) 76.75%); color: #000; padding: 5px">
							<h3 style="margin-left: 10px">Pengumuman</h3>
						</div>
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
									<span class="fw4">
										{{$val->judul}}<br>
									</span>
									<div class="text-justify content" id="content-{{$val->id_berita}}">{!!$val->isi!!}</div>
									<a href="javascript:void(0)" id="read-more-{{$val->id_berita}}" onclick="readMore('{{$val->id_berita}}')" class="color-a">[Baca Selengkapnya]</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				@endforeach
				@endif
				<div class="row">
					<div class="col-md-12">
						<a href="{{route('home.pengumuman')}}" class="color-a fw6"><i>LIHAT LAINNYA ...</i></a>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="row">
					<div class="col-md-12 mb-2">
						<div style="background: linear-gradient(90deg, #97E2A8 4.57%, rgba(217, 217, 217, 0) 76.75%); color: #000; padding: 5px">
							<h3 style="margin-left: 10px">Dokumen</h3>
						</div>
					</div>
				</div>
				@if(count($pengumuman)>0)
				@foreach($pengumuman as $key => $val)
				<div class="row d-flex align-items-center">
					<div class="col-lg-12">
						<div class="contact-box">
							<div class="row">
								<div class="col-md-3 mtb-auto">
									<img class="img-80" src="{{asset('landing-page/images/mask.png')}}" alt="contacts-icon">
								</div>
								<div class="col-md-9 mtb-auto text-left">
									<span class="fw4">
										{{$val->judul}}<br>
										<a href="javascript:void(0)" class="color-a">[Baca Selengkapnya]</a>
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				@endforeach
				@endif
				<div class="row">
					<div class="col-md-12">
						<a href="{{route('home.pengumuman')}}" class="color-a fw6"><i>LIHAT LAINNYA ...</i></a>
					</div>
				</div>
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
		$(".content").each(function() {
			var myStr = $(this).html()
			var id = $(this).data('id')
			if (myStr.split(' ').length > maxWord) {
				var arrStr = myStr.split(' ')

				var newStr = filterArray(arrStr, maxWord, `first`)
				var removedStr = filterArray(arrStr, maxWord, 'second')

				newStr = newStr.join(' ')
				removedStr = removedStr.join(' ')

				$(this).empty().html(newStr + '...')
				$(this).data('first', newStr + '...')
				$(this).data('second', ' ' + removedStr)
			}
		})

		// var data = [
		// 	{
		// 		'no': '1',
		// 		'tanggal': 'Senin',
		// 		'kegiatan': 'Ekstra',
		// 		'aksi': 'detail'
		// 	},
		// ]
		// $('#agendaTable').DataTable({
		// 	// dom: 'lfrtip', // Default
		// 	dom: 'rtp',
		// 	data:data,
		// 	columns: [
		// 		{
		// 			name: 'no',
		// 			data: 'no'
		// 		},
		// 		{
		// 			name: 'tanggal',
		// 			data: 'tanggal'
		// 		},
		// 		{
		// 			name: 'kegiatan',
		// 			data: 'kegiatan'
		// 		},
		// 		{
		// 			name: 'aksi',
		// 			data: 'aksi'
		// 		},
		// 	]
		// });
	})


	function filterArray(array, num, prefix) {
		var arrStr = $.grep(array, function(v, i) {
			if (prefix === 'first') {
				if (i < num) {
					return v.indexOf('1');
				}
			} else {
				if (i >= num) {
					return v.indexOf('1');
				}
			}
		})
		return arrStr
	}

	function readMore(id) {
		var textButton = $(`#read-more-${id}`).text()
		var firstText = $(`#content-${id}`).data('first')
		var secondText = $(`#content-${id}`).data('second')
		if (textButton === '[Baca Selengkapnya]') {
			$(`#content-${id}`).empty().html(firstText.slice(0, -3) + secondText)
			$(`#read-more-${id}`).text('[Baca Lebih Sedikit]')
		} else {
			$(`#content-${id}`).empty().html(firstText)
			$(`#read-more-${id}`).text('[Baca Selengkapnya]')
		}
	}

	// https://youtu.be/ysNDDrG9PtI
	var player;

	function onYouTubeIframeAPIReady() {
		player = new YT.Player('playerId', {
			videoId: '4qEs6r6Ycnc', // Video id
			playerVars: {
				'autoplay': 1,
				'controls': 1,
				'showinfo': 0,
				'modestbranding': 0,
				'loop': 1,
				'fs': 0,
				'cc_load_policty': 0,
				'iv_load_policy': 3
			},
			events: {
				onReady: function(event) {
					// event.target.mute();
					event.target.setVolume(2);
					event.target.playVideo();
				},
				onStateChange: function(e) {
					if (e.data === YT.PlayerState.ENDED) {
						e.target.playVideo();
					}
				}
			}
		})
	}
</script>
@endpush