@extends('layout.master.main')

@push('style')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
<style>
	.card-title {
		margin-top: 40px;
	}
</style>
@endpush

@section('content')
	<div class="page-content">
		@include('include.master.breadcrumb')
		<div class="card main-layer">
			<div class="card-header bg-card">
				<h5 class="text-card">{{$title}}</h5>
			</div>
			<div class="card-body">
				<div class="row mb-3">
					<div class="col-md-3">
						<button type="button" class="btn btn-primary" onclick="formAdd()">Tambah Berita</button>
					</div>
					<div class="col-md-3"></div>
					<div class="col-md-3"></div>
					<div class="col-md-3"></div>
				</div>
				<div class="row">
					<div class="table-responsive">
						<table id="datatabel" class="table table-striped table-bordered" style="width: 100%;">
							<thead>
								<tr>
									<td style="width:3%">No</td>
									<td style="width:60%">Judul</td>
									<td style="width:30%" class="text-center">Tanggal</td>
									<td style="width:4%">status</td>
									<td style="width:3%">aksi</td>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="other-page"></div>
	</div>
@endsection

@push('script')
<script src="{{url('assets/plugins/jquery-knob/jquery.knob.js')}}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{!! url('assets/js/ckeditor1/ckeditor.js') !!}"></script>
<script src="{!! url('assets/js/ckeditor1/adapters/jquery.js') !!}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js" integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$(".knob").knob()
		loadTable();
	});
	async function loadTable(){
      var uri = await '{{Request::url()}}'
      uri = await uri.split('/').pop()
		var table = await $('#datatabel').DataTable({
			scrollX: true,
			processing: true,
			serverSide: true,
			ajax: '{{route("berita.main",'')}}/'+uri,
			columns: [
			{ data: 'DT_RowIndex', name: 'DT_RowIndex', width: '3%'},
			{ data: 'judul', name: 'judul', width: '60%'},
			{ data: 'tanggal', name: 'tanggal', width: '30%'},
			{ data: 'stts', name: 'stts', width: '4%'},
			{ data: 'actions', name: 'actions', width: '3%'},
			],
		})
	}
	function formAdd(id='') {
		$('.main-layer').hide();
		var kategori = "<?php echo $id ?>";
		var url = '{{route("berita.formAddBerita")}}';
		$.post(url, {id:id,kategori:kategori})
		.done(function(data){
			if(data.status == 'success'){
				$('.other-page').html(data.content).fadeIn();
			} else {
				$('.main-layer').show();
			}
		})
		.fail(() => {
			$('.other-page').empty();
			$('.main-layer').show();
		})
	}

	function hapusBerita(id) {
		$.post("{{route('berita.deleteBerita')}}", {id:id})
		.done(function(data){
			if(data.status == 'success'){
				Swal.fire({
					icon: 'success',
					title: 'Berhasil',
					text: data.message,
					showConfirmButton: false,
					timer: 1200
				})
				location.reload()
			} else {
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: data.message,
					showConfirmButton: false,
					timer: 1200
				})
			}
		})
		.fail(() => {
			Swal.fire({
				icon: 'error',
				title: 'Error',
				text: 'Terjadi Kesalahan Sistem',
				showConfirmButton: false,
				timer: 1200
			})
		})
	}
</script>
@endpush