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
				<h5 class="text-card">Slider</h5>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="table-responsive">
						<table id="datatabel" class="table table-striped table-bordered" style="width: 100%;">
							<thead>
								<tr>
									<td>No</td>
									<td class="text-center">Gambar Icon</td>
									<td class="text-center">Aksi</td>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js" integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$(".knob").knob()
		loadTable();
	});
	function loadTable(){
		var table = $('#datatabel').DataTable({
         dom: 'tip',
			scrollX: true,
			searching: false,
			processing: true,
			serverSide: true,
			columnDefs: [
				{sortable: false,'targets': [0]},
				{searchable: false,'targets': [0]},
			],
			ajax: {
				url: "{{route('slider')}}",
			},
			columns: [
				{ data: "DT_RowIndex", name: "DT_RowIndex"},
				{ data: "image", name: "image"},
				{ data: "actions", name: "actions", class: "text-center"},
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
</script>
@endpush