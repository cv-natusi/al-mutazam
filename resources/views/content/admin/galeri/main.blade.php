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
				<h5 class="text-card">Galeri</h5>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="table-responsive">
						<table id="datatabel" class="table table-striped table-bordered" style="width: 100%;">
							<thead>
								<tr>
									<th>No</th>
									<th>Gambar</th>
									<th>Deskripsi</th>
									<th>Status</th>
									<th>Aksi</th>
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
				{targets: [0,1,4], searchable: false},
				{targets: [1,4], orderable: false},
			],
			ajax: {
				url: "{{route('media.galeri.main')}}",
			},
			columns: [
				{ data: "DT_RowIndex", name: "DT_RowIndex"},
				{ data: "gambar", name: "gambar"},
				{ data: "deskripsi", name: "deskripsi"},
				{ data: "status", name: "status"},
				{ data: "actions", name: "actions"},
			],
		})
	}
	function formAdd(id='') {
		$('.main-layer').hide();
		$.post("{{route('formUpdateSlider')}}", {id:id})
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
	function hideForm(){
		$('.other-page').empty()
		$('.main-layer').show()
	}
	function editGaleri(id){
		alert('pengembangan')
	}
	function hapusGaleri(id){
		alert('pengembangan')
	}
</script>
@endpush