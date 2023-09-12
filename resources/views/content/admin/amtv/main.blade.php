@extends('layout.master.main')

@push('style')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
<style>
	.card-title {
		margin-top: 40px;
	}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@section('content')
	<div class="page-content">
		@include('include.master.breadcrumb')
		<div class="card main-layer">
			<div class="card-header bg-card">
				<h5 class="text-card">Amtv</h5>
			</div>
			<div class="card-body">
				<div class="row mb-3">
					<div class="col-md-3">
						<button type="button" class="btn btn-primary" onclick="formAdd()">Tambah AMTV</button>
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
									<th style="width: 3%">No</th>
									<th style="width: 60%">Judul</th>
									<th style="width: 30%">Video</th>
									<th style="width: 4%">Status</th>
									<th style="width: 3%">Aksi</th>
								</tr>
							</thead>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js" integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$(".knob").knob()
		loadTable();
	});
	function loadTable(){
		var table = $('#datatabel').DataTable({
         dom: 'lftip',
			scrollX: true,
			processing: true,
			serverSide: true,
			columnDefs: [
				{targets: [0,2,4], searchable: false},
				{targets: [2,4], orderable: false},
			],
			ajax: {
				url: "{{route('media.amtv.main')}}",
			},
			columns: [
				{ data: "DT_RowIndex", name: "DT_RowIndex", width: '3%'},
				{ data: "judul", name: "judul", width: '60%'},
				{ data: "file", name: "file", width: '30%'},
				{ data: "status", name: "status", width: '4%'},
				{ data: "actions", name: "actions", width: '3%'},
			],
		})
	}
	function formAdd(id='') {
		$('.main-layer').hide();
		$.post("{{route('media.amtv.formAddAmtv')}}", {id:id})
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
	function hapusAmtv(id='') {
		$.post("{{route('media.amtv.deleteAmtv')}}", {id:id})
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