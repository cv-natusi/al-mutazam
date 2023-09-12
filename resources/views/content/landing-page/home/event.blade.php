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
		.btn-x{
			background: transparent !important;
			border: 0;
			opacity: .5;
		}
		.modal-dialog{
			position: absolute;
			left: 0%;
			top: 35%;
			transform: translate(0%, -35%);
		}
		.modal-header{
			background-color: var(--color-menu);
		}
	</style>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
@endpush

@section('content')
	<section class="bg-lightgrey mt-90 courses-section division padding-section">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1><b>EVENT</b></h1>
					<h4 class="m-0 fw8">MTs AL-MUTAZAM</h4>
				</div>
			</div>
			<div class="row mt-4">
				<div class="col-lg-8">
					@foreach ($event as $key => $val)
						<div class="row d-flex align-items-center mb-4">
							<div class="col-md-3 mtb-auto">
								@if(file_exists(public_path().'/uploads/berita/'.$val->gambar))
									<img class="mx-auto d-block responsive img-fluid" src="{{asset('uploads/berita/'.$val->gambar)}}" alt="team-member-foto" style="height:100px; width:140px; object-fit: cover; border-radius: 5px;">
								@else
									<img class="mx-auto d-block responsive img-fluid" src="{{asset('default.jpg')}}" alt="team-member-foto">
								@endif
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
											<a href="javascript:void(0)" id="read-more-{{$val->id_berita}}" onclick="modalShow(`{{$val->id_berita}}`)" class="color-a">[Baca Selengkapnya]</a>
										</p>
									</div>
								</div>
							</div>
						</div>
					@endforeach
					<div class="d-flex justify-content-center">
						{!! $event->links() !!}
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
											<a href="javascript:void(0)" onclick="tes()" class="color-a">[Baca Selengkapnya]</a>
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

	<div class="modal" id="exampleModal" tabindex="-1">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<p class="modal-title fwhite fw7"></p>
					<button type="button" class="close-modal btn-x">
						<i class="far fa-times-circle fwhite" style="font-size: 25px;"></i>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12 mb-4">
							<img class="mx-auto d-block responsive img-fluid" id="modal-img" width="400" height="auto" src="{{asset('default.jpg')}}" alt="team-member-foto">
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div id="event-text"></div>
							{{-- <p class="m-0" id="event-text"></p> --}}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@push('script')
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script type="text/javascript">
		async function modalShow(id){
			try{
				await $.ajax({
					url: '{{route("home.searchEvent")}}',
					type: 'POST',
					data: {id:id},
				}).done(async (data, textStatus, xhr)=>{
					const code = xhr.status
					const rootDir = '{{URL::asset('/uploads/berita')}}'
					const defaultDir = '{{URL::asset('/')}}'
					if(code!==200){
						await Swal.fire({
							icon: 'info',
							title: 'Whoops..',
							text: 'Data not found',
							allowOutsideClick: false,
							allowEscapeKey: false,
						})
						return false
					}
					await $('.modal-title').text(data.response.judul)
					await $('#modal-img').attr('src',`${rootDir}/${data.response.gambar}`)
					await $('#event-text').html(data.response.isi)
					await $('#modal-img').on('error',async()=>{
						await $('#modal-img').attr('src',`${defaultDir}/default.jpg`)
					})
					$('.modal').fadeIn("slow")
				})
			}catch(error){
				await Swal.fire({
					icon: 'error',
					title: 'ERROR!',
					text: error.responseJSON.metadata.message,
					allowOutsideClick: false,
					allowEscapeKey: false,
				})
			}
		}
		$(document).ready(() => {
			$('.close-modal').click(()=>{
				$('.modal').fadeOut("slow")
			})
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