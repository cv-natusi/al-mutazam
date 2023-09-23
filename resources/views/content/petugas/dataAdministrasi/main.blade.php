@extends('layout.master.main')

@push('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
@endpush

@section('content')
    <div class="page-content">
        @include('include.master.breadcrumb')

        <div class="card main-layer">
            <div class="card-header bg-card">
                <h5 class="text-card">{{$title}}</h5>
            </div>
            <div class="card-body">
                <div class="row mb-3" style="margin-top: 1rem">
                    <div class="col-md-2">
                        <button type="button" class="btn button-custome btn-sm" style="width: 100%" onclick="formAdd()"><i class="bx bxs-plus-square"></i> Tambah</button>
                    </div>
                    <div class="col-md-10"></div>
                </div>
                <div class="row" style="margin-top: 2rem">
                    <div class="table-responsive">
                        <table id="datatabel" class="table table-striped table-bordered" width="100%">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>NIP</td>
                                    <td>Nama Guru</td>
                                    <td class="text-center">Aksi</td>
                                    <td class="text-center">Status</td>
                                    <td class="text-center">Verifikasi</td>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div id="modalForm"></div>
    </div>
@endsection

@push('script')
<script src="{{ url('assets/plugins/jquery-knob/jquery.knob.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                url: "{{route('dataAdministrasiPetugas')}}",
            },
            columns: [
                { data: "DT_RowIndex", name: "DT_RowIndex"},
                { data: "nip", name: "nip"},
                { data: "guru", name: "guru"},
                { data: "actions", name: "actions", class: "text-center"},
                { data: "btnStatus", name: "btnStatus", class: "text-center"},
                { data: "verifikasi", name: "verifikasi", class: "text-center"},
            ],
        })
    }
    function formAdd(id='') {
        $.post("{{route('administrasiModalForm')}}",{id:id},function(data){
			$("#modalForm").html(data.content);
		});
    }
    function lihat(id='') {
        $.post("{{route('administrasiModalFormPetugas')}}",{id:id},function(data){
			$("#modalForm").html(data.content);
		});
    }
    function verifikasi(id) {
        $.post("{{ route('verifAdministrasiPetugas') }}",{id:id}).done(function(data) {
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
            Swal.fire("Sorry!", "Gagal menghapus data!", "error");
        });
	}
    function tolak(id) {
		Swal.fire({
			title: "Apakah Anda yakin?",
			text: "Data Akan Ditolak Dan Dikembalikan Pada Guru.",
			icon: 'warning',
			showCancelButton: true,
			cancelButtonText: 'Batal',
			confirmButtonText: 'Tolak',
		}).then((result) => {
			if (result.value) {
				$.post("{{ route('tolakAdministrasiPetugas') }}",{id:id}).done(function(data) {
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
				Swal.fire("Batal", "Data batal ditolak!", "error");
			}
		});
	}
    function hideForm(){
        $('#modalForm').hide()
        $('.main-layer').show()
    }
    function hapusData(id) {
		Swal.fire({
			title: "Apakah Anda yakin?",
			text: "Data yang dihapus tidak dapat dikembalikan lagi.",
			icon: 'warning',
			showCancelButton: true,
			cancelButtonText: 'Batal',
			confirmButtonText: 'Hapus',
		}).then((result) => {
			if (result.value) {
				$.post("{{ route('deleteAdministrasi') }}",{id:id}).done(function(data) {
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
					Swal.fire("Sorry!", "Gagal menghapus data!", "error");
				});
			} else if (result.dismiss === Swal.DismissReason.cancel) {
				Swal.fire("Batal", "Data batal dihapus!", "error");
			}
		});
	}   
</script>
@endpush
