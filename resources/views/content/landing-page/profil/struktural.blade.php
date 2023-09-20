@extends('layout.landing-page.main')

@push('style')
<link href="{{asset('plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<style>
    .modal-dialog {
		position: absolute;
		left: 10%;
		top: 35%;
		transform: translate(0%, -35%);
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
                        <h3 class="h3-sm mt-4"><b>PROFIL GURU</b></h3>
                        <h4 class="m-0 fw7">MTs Al-Multazam</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 justify-content-end">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="h3-sm mt-4" style="font-size: 65px; color: #D9D9D9"><b>PROFIL</b></h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-md-2 g-4 mt-20 ">
            <div class="col-md-8 mt-4">
                <div class="row mb-4">
                    @if (count($guru)>0)
                    @foreach ($guru as $index => $g)
                    <div class="col-md-3 galery">
                        <div class="t-3-photo mb-25 image">
                            @if (!empty($g->foto))
                            <img style="width:400px;height:200px;object-fit:cover" class="span img-shadow mx-auto d-block responsive img-thumbnail img-fluid" 
                            src="{{asset('images/guru/'.$g->foto)}}" alt="slide-background" onclick="modalShow(`{{$g->id_guru}}`)">
                            @else
                            <img style="width:400px;height:200px;object-fit:cover" class="span img-shadow mx-auto d-block responsive img-thumbnail img-fluid" 
                            src="{{asset('uploads/default.jpg')}}" alt="slide-background" onclick="modalShow(`{{$g->id_guru}}`)">
                            @endif
                            <h5 class="mt-3 text-center">{{$g->nama}}</h5>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
                <div class="d-flex justify-content-center">
                    {!! $guru->links() !!}
                </div>
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
                        <div class="col-md-4 mb-4">
                            <img class="mx-auto d-block responsive img-fluid" id="modal-img" width="400" height="auto" src="{{asset('default.jpg')}}" alt="team-member-foto">
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-9">Nama</div>
                                                <div class="col-md-3 text-right">:</div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-9">NIP</div>
                                                <div class="col-md-3 text-right">:</div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-9">Tugas</div>
                                                <div class="col-md-3 text-right">:</div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-9">Nama Mapel</div>
                                                <div class="col-md-3 text-right">:</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-12"><span id="nama"></span></div>
                                        <div class="col-md-12"><span id="nip"></span></div>
                                        <div class="col-md-12"><span id="tugas"></span></div>
                                        <div class="col-md-12"><span id="mapel"></span></div>
                                    </div>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
	async function modalShow(id) {
		try {
			await $.ajax({
				url: '{{route("profil.searchStruktural")}}',
				type: 'POST',
				data: {
					id: id
				},
			}).done(async (data, textStatus, xhr) => {
				const code = xhr.status
				const rootDir = '{{URL::asset('/images/guru')}}'
				const defaultDir = '{{URL::asset('')}}'
                var namaTugas = data.jabatan===null ? '-' : data.jabatan.nama_tugas
				if (code !== 200) {
					await Swal.fire({
						icon: 'info',
						title: 'Whoops..',
						text: 'Data not found',
						allowOutsideClick: false,
						allowEscapeKey: false,
					})
					return
				}
				await $('.modal-title').text('PREVIEW PROFILE')
                await $('#nama').text(data.guru.nama)
                await $('#nip').text(data.guru.nip)
                await $('#tugas').text(namaTugas)
                var mapel = ''
                if(data.mapel.length>0){
                    await $.each(data.mapel, function (index, value) { 
                        // $('.mapel').text(value.nama_mapel)
                        mapel += `${value.nama_mapel}<br>`
                    });
                }else{
                    mapel = '-'
                }
                $('#mapel').html(mapel)
				await $('#modal-img').attr('src', `${rootDir}/${data.guru.foto}`)
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
		})
	})
</script>
@endpush