@extends('layout.landing-page.main')

@push('style')
<link href="{{asset('plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<style>
	.size-card{
		height: 300px !important;
	}
    @media (min-width: 10px) and (max-width: 610px) {
        .size-card{
    		height: 700px !important;
    	}
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
						<h3 class="h3-sm mt-4"><b>PROGRAM UNGGULAN</b></h3>
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
		<div class="row">
			@if (count($beritas)>0)
			@foreach ($beritas as $index => $b)
			<div class="col-md-12 mt-4">
				<section id="contacts-2" class="contacts-section division">
					<div class="contacts-2-holder mb-20">
						<div class="row d-flex align-items-center">
							<div class="col-lg-12">
								<div class="contact-box">
									<div class="row size-card">
										<div class="col-md-6">
											<img class="img" src="{{asset('uploads/berita/'.$b->gambar)}}" onclick="modalShow(`{{ $b->id_berita }}`)" alt="contacts-icon" style="height:250px; width:300px; object-fit: cover;">
											<br>
										</div>
										<div class="col-md-6 text-left">
											<span class="fw4">{{$b->judul}}</span>
											<div class="text-justify content" id="content-{{$b->id_berita}}">{!!$b->isi!!}</div>
											<a href="javascript:void(0)" id="read-more-{{$b->id_berita}}" onclick="readMore('{{$b->id_berita}}')" class="color-a">[Baca Selengkapnya]</a>
											{{-- <span class="fw4">{{date('d/M/Y',strtotime($b->tanggal))}}</span><br> --}}
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
			@endforeach
			@endif
		</div>
		<div class="row">
			<div class="col-md-8 mt-4">
				<div class="d-flex justify-content-center">
					{!! $beritas->links() !!}
				</div>
			</div>
		</div>
	</div>	
	{{-- <div class="modal" id="exampleModal" tabindex="-1">
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
    						<div id="event-text" class="text-justify"></div>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </div> --}}
</section>
@endsection
@push('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        async function modalShow(id) {
		try {
			await $.ajax({
				url: '{{route("program.searchUnggulan")}}',
				type: 'POST',
				data: {
					id: id
				},
			}).done(async (data, textStatus, xhr) => {
				const code = xhr.status
				const rootDir = '{{URL::asset('/uploads/berita')}}'
				const defaultDir = '{{URL::asset('')}}'
				if (code !== 200) {
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
				await $('#modal-img').attr('src', `${rootDir}/${data.response.gambar}`)
				await $('#event-text').html(data.response.isi)
				await $('#modal-img').on('error', async () => {
					await $('#modal-img').attr('src', `${defaultDir}/default.jpg`)
				})
				$('.modal').fadeIn("slow")
			})
		} catch (error) {
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
		$('.close-modal').click(() => {
			$('.modal').fadeOut("slow")
			location.reload()
		})
		var maxWord = 10;
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
    </script>
@endpush