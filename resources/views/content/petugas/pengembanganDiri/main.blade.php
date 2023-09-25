@extends('layout.master.main')

@push('style')
    <link href="{{asset('assets/plugins/datetimepicker/css/classic.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/datetimepicker/css/classic.date.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
@endpush

@section('content')
    <div class="page-content">
        @include('include.master.breadcrumb')

        <div class="card-group main-layer">
            <div class="card">
                <div class="card-body">
                    {{-- <button type="button" class="btn btn-sm btn-rounded btn-primary addPengembangan mb-2">
                        (+) Pengembangan Diri Guru
                    </button>
                    <button type="button" class="btn btn-sm btn-rounded btn-success addMstPengembanganDiri mb-2" style="float: right;">
                        (+) Master Pengembangan Diri
                    </button>
                    <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                        <li class="nav-item">
                            <a href="#pengembanganDiri" id="navPengembanganDiri" data-toggle="tab" aria-expanded="false" class="nav-link rounded-0 active">
                                <i class="mdi mdi-home-variant d-lg-none d-block mr-1"></i><span class="d-none d-lg-block">Data Pengembangan Diri Guru</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#mstPengembanganDiri" id="navMstPengembanganDiri" data-toggle="tab" aria-expanded="true" class="nav-link rounded-0">
                                <i class="mdi mdi-account-circle d-lg-none d-block mr-1"></i><span class="d-none d-lg-block">Data Master Pengembangan Diri</span>
                            </a>
                        </li>
                    </ul>
    
                    <div class="tab-content">
                        <div class="tab-pane show active" id="pengembanganDiri">
                            <table class="table table-striped dataTable" id="datatablePengembanganDiri" style="width: 100%">
                                <thead>
                                    <td>No</td>
                                    <td>NIP</td>		
                                    <td>Nama Guru</td>												
                                    <td>Aksi</td>
                                    <td>Status</td>
                                    <td>Verifikasi</td>
                                </thead>
                            </table>
                        </div>
                        <div class="tab-pane" id="mstPengembanganDiri">
                            <table class="table table-striped dataTable" id="datatableMstPengembanganDiri" style="width: 100%">
                                <thead>
                                    <td>No</td>
                                    <td>Nama Dokumen/Data Pengembangan Diri</td>
                                    <td>Aksi</td>
                                </thead>
                            </table>
                        </div>
                    </div> --}}

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" id="myTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Data Pengembangan Diri</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Master Data Pengembangan Diri</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content mt-3">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            {{-- <button type="button" class="btn button-custome" onclick="formFirst()"><i class="bx bxs-plus-square"></i> Tambah</button> --}}
                            <div class="clearfix" style="margin-bottom: 20px"></div>
                            <table class="table table-bordered table-striped dataTable" id="datatablePengembanganDiri" style="width: 100%">
                                <thead>
                                    <td>No</td>
                                    <td>NIP</td>		
                                    <td>Nama Guru</td>												
                                    <td class="text-center">Aksi</td>
                                    <td class="text-center">Status</td>
                                    <td class="text-center">Verifikasi</td>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <button type="button" class="btn button-custome" onclick="formSecond()"><i class="bx bxs-plus-square"></i> Tambah</button>
                            <div class="clearfix" style="margin-bottom: 20px"></div>
                            <table class="table table-bordered table-striped dataTable" id="datatableMstPengembanganDiri" style="width: 100%">
                                <thead>
                                    <td>No</td>
                                    <td>Nama Dokumen/Berkas</td>
                                    <td>Aksi</td>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
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
<script src="{{asset('assets/plugins/datetimepicker/js/picker.js')}}"></script>
<script src="{{asset('assets/plugins/datetimepicker/js/picker.date.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js" integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
        $(".knob").knob()
    });
    $(function() {
        // DataTable Pengembangan Diri
        var table = $('#datatablePengembanganDiri').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('pengembanganDiriPetugas') }}",
                type: "POST",
                error: function(xhr, errorType, exception) {
                    console.log(xhr.responseText); // Pesan kesalahan dari server
                }
            },

            columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                render: function(data, type, row) {
                    return '<p style="color:black">' + data + '</p>';
                }
            },
            {
                data: 'nip',
                name: 'nip',
                render: function(data, type, row) {
                    return '<p style="color:black">' + data + '</p>';
                }
            },				
            {
                data: 'nama',
                name: 'nama',
                render: function(data, type, row) {
                    return '<p style="color:black">' + data + '</p>';
                }
            },
            {
                data: 'actions',
                name: 'actions',
                class: 'text-center',
                orderable: false,
                searchable: false
            },		
            {
                data: 'btnStatus',
                name: 'btnStatus',
                class: 'text-center',
                orderable: false,
                searchable: false
            },
            {
                data: 'verifikasi',
                name: 'verifikasi',
                class: 'text-center',
                orderable: false,
                searchable: false
            },]
        });
        // DataTable Master Pengembangan Diri
        var table2 = $('#datatableMstPengembanganDiri').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('mstPengembanganDiri') }}",
                type: "POST",
                error: function(xhr, errorType, exception) {
                    console.log(xhr.responseText); // Pesan kesalahan dari server
                }
            },

            columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                render: function(data, type, row) {
                    return '<p style="color:black">' + data + '</p>';
                }
            },								
            {
                data: 'nama_dokumen',
                name: 'nama_dokumen',
                render: function(data, type, row) {
                    return '<p style="color:black">' + data + '</p>';
                }
            },
            {
                data: 'actions',
                name: 'actions',
                orderable: false,
                searchable: false
            },]
        });
    });
    function formFirst(id=''){
		$.post("{{route('formPengembanganDiri')}}",{id:id},function(data){
			$("#modalForm").html(data.content);
		});
	}
    function formFirstLihat(id='') {
        $.post("{{route('formLihatPengembanganDiri')}}",{id:id},function(data){
			$("#modalForm").html(data.content);
		});   
    }
    function formSecond(id='') {
        $.post("{{route('formMstPengembanganDiri')}}",{id:id},function(data){
			$("#modalForm").html(data.content);
		});   
    }
    function verifikasi(id) {
        $.post("{{ route('verifPengembanganDiri') }}",{id:id}).done(function(data) {
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
		// Swal.fire({
		// 	title: "Apakah Anda yakin?",
		// 	text: "Data Akan Ditolak Dan Dikembalikan Pada Guru.",
		// 	icon: 'warning',
        //     inputAttributes: {
        //         autocapitalize: 'off'
        //     },
		// 	showCancelButton: true,
		// 	cancelButtonText: 'Batal',
		// 	confirmButtonText: 'Tolak',
        //     showLoaderOnConfirm: true,
		// }).then((result) => {
		// 	if (result.value) {
		// 		$.post("{{ route('tolakPengembanganDiri') }}",{id:id}).done(function(data) {
		// 			if(data.code==200){
        //                 Swal.fire({
        //                     icon: 'success',
        //                     title: 'Berhasil',
        //                     text: data.message,
        //                     showConfirmButton: false,
        //                     timer: 1200
        //                 })
        //                 location.reload()
        //             }else{
        //                 Swal.fire({
        //                     icon: 'warning',
        //                     title: 'Whoops',
        //                     text: data.message,
        //                     showConfirmButton: false,
        //                     timer: 1300,
        //                 })
        //             }
		// 		}).fail(function() {
		// 			Swal.fire("Sorry!", "Terjadi Kesalahan Sistem!", "error");
		// 		});
		// 	} else if (result.dismiss === Swal.DismissReason.cancel) {
		// 		Swal.fire("Batal", "Data batal ditolak!", "error");
		// 	}
		// });

        Swal.fire({
            title: "Tolak pengembangan diri?",
			text: "Masukkan keterangan anda menolak.",
            input: 'text',
            inputAttributes: {
                autocapitalize: 'off'
            },
            showCancelButton: true,
            confirmButtonText: 'Tolak',
            cancelButtonText: 'Batal',
            showLoaderOnConfirm: true,
            preConfirm: (keterangan) => {
                if (keterangan == '') {
                    Swal.showValidationMessage(
                        `Masukkan keterangan and menolak!`
                        );
                }else{
                    return keterangan;
                }
            },
            allowOutsideClick: () => !Swal.isLoading()
            }).then((result) => {
            if (result.isConfirmed) {
                let keterangan = result.value;
                $.post("{{ route('tolakPengembanganDiri') }}",{id:id, keterangan:keterangan}).done(function(data) {
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
            }
            })
	}
</script>
@endpush
