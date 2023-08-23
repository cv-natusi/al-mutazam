@extends('layout.landing-page.main')

@push('style')
	<style>
		/* .pagination li{
			float: left;
			list-style-type: none;
			margin:5px;
		} */
		.content .more-text{
			display: none;
		}
	</style>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
@endpush

@section('content')
	<section class="bg-lightgrey mt-90 courses-section division padding-section">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1><b>MTs AL-MUTAZAM</b></h1>
					<h4 class="m-0 fw7">Berita Terbaru</h4>
				</div>
			</div>
			<div class="row mt-4">
				<div class="col-lg-8">
					@foreach ($berita as $key => $val)
						<div class="row d-flex align-items-center mb-4">
							<div class="col-md-3 mtb-auto">
								<img class="mx-auto d-block responsive img-fluid" src="{{asset('landing-page/images/berita/terbaru-1.png')}}" alt="team-member-foto">
							</div>
							<div class="col-md-9 mtb-auto text-left">
								<div class="row">
									<div class="col-md-12">
										<h5><b>{{$val->judul}}</b></h5>
										<p><i>{{$val->date_indo}}</i></p>
										<div class="text-justify content" id="content-{{$val->id_berita}}" data-id="{{$val->id_berita}}">
											{!!$val->isi!!}
										</div>
										<p class="m-0">
											<a href="javascript:void(0)" id="read-more-{{$val->id_berita}}" onclick="readMore('{{$val->id_berita}}')" class="color-a">[Baca Selengkapnya]</a>
										</p>
									</div>
								</div>
							</div>
						</div>
					@endforeach
					<div class="d-flex justify-content-center">
						{!! $berita->links() !!}
					</div>
				</div>

				<div class="col-lg-4">
					<div class="row">
						<div class="col-md-12">
							<h1>Pengumuman</h1>
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
										{{-- <span class="fw5">Sekolah:</span><br> --}}
										{{-- <span class="fw4 f-color">Final MA Permata Festival 2021 [Baca Selengkapnya]</span> --}}
										<span class="fw4">
											Final MA Permata Festival 2021<br>
											<a href="javascript:void(0)" class="color-a">[Baca Selengkapnya]</a>
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
											<a href="javascript:void(0)" class="color-a">[Baca Selengkapnya]</a>
										</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection

@push('script')
	<script type="text/javascript">
		$(document).ready(() => {
			var maxWord = 40;
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
	</script>
@endpush