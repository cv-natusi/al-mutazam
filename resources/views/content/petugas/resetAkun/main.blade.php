@extends('layout.master.main')

@push('style')
    <link href="{{asset('assets/plugins/datetimepicker/css/classic.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/datetimepicker/css/classic.date.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
@endpush

@section('content')
    <div class="page-content">
        @include('include.master.breadcrumb')

        <div class="card main-layer">
            <div class="card-header bg-card">
                <h5 class="text-card">Reset Akun</h5>
            </div>
            <div class="card-body">
                <div class="row" style="margin-top: 2rem">
                    <div class="table-responsive">
                        <table id="datatabel" class="table table-striped table-bordered" width="100%">
                            <thead>
                                <tr>
                                    <td style="width: 6%">No</td>
                                    <td style="width: 40%">Username</td>
                                    <td style="width: 44%">Nama Pengguna</td>
                                    <td style="width: 10%">Aksi</td>
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
<script src="{{ url('assets/plugins/jquery-knob/jquery.knob.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('assets/plugins/datetimepicker/js/picker.js')}}"></script>
<script src="{{asset('assets/plugins/datetimepicker/js/picker.date.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js" integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
        $(".knob").knob()
        loadTable();
    });
    function loadTable(){
        var table = $('#datatabel').DataTable({
            scrollX: true,
            searching: false, 
            // paging: false,
            processing: true,
            serverSide: true,
            columnDefs: [
                {
                    sortable: false,
                    'targets': [0]
                }, {
                    searchable: false,
                    'targets': [0]
                },
            ],
            ajax: {
                url: "{{route('resetAkun')}}",
            },
            columns: [
                { data: "DT_RowIndex", name: "DT_RowIndex"},
                { data: "email", name: "email"},
                { data: "name_user", name: "name_user"},
                { data: "actions", name: "actions", class: "text-center"},
            ],
        })
    }
    function resetData(id) {
        alert('Maintenance')
    }
    function nonActiveData(id) {
		Swal.fire({
			title: "Apakah Anda yakin?",
			text: "User Akan Di Non-Aktifkan.",
			icon: 'warning',
			showCancelButton: true,
			cancelButtonText: 'Batal',
			confirmButtonText: 'Non-Aktifkan',
		}).then((result) => {
			if (result.value) {
				$.post("{{ route('removeAkunUser') }}",{id:id}).done(function(data) {
					if(data.code==200){
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: data.message,
                            showConfirmButton: false,
                            timer: 1200
                        })
                        location.reload()
                    }else{
                        Swal.fire({
                            icon: 'warning',
                            title: 'Whoops',
                            text: data.message,
                            showConfirmButton: false,
                            timer: 1300,
                        })
                    }
				}).fail(function() {
					Swal.fire("Sorry!", "Terjadi Kesalahan Sistem!", "error");
				});
			} else if (result.dismiss === Swal.DismissReason.cancel) {
				Swal.fire("error", "Batal Non-Aktifkan User!", "error");
			}
		});
	}
    function hideForm(){
        $('.other-page').empty()
        $('.main-layer').show()
    }
</script>
@endpush
