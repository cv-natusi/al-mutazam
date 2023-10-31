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
                            <div class="col-md-12">
                                <div class="row mb-3">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-3" style="text-align: center">
                                        <label>Tahun</label>
                                        <select name="tahun" id="tahun" class="form-control" style="display: inline-block; width:70%;">
                                            <option value="">.:: Pilih ::.</option>
                                            <option value="2020-2021">2020-2021</option>
                                            <option value="2021-2022">2021-2022</option>
                                            <option value="2022-2023">2022-2023</option>
                                            <option value="2023-2024">2023-2024</option>
                                            <option value="2024-2025">2024-2025</option>
                                            <option value="2025-2026">2025-2026</option>
                                            <option value="2026-2027">2026-2027</option>
                                            <option value="2027-2028">2027-2028</option>
                                            <option value="2028-2029">2028-2029</option>
                                            <option value="2029-2030">2029-2030</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3" style="text-align: center">
                                        <label>Semester</label>
                                        <select name="semester" id="semester" class="form-control" style="display: inline-block; width:70%;">
                                            <option value="">.:: Pilih ::.</option>
                                            <option value="1">Semester 1</option>
                                            <option value="2">Semester 2</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button"  class="btn btn-sm button-custome float-end" style="width: 100%" onclick="download()"><i class='bx bxs-cloud-download'></i> Download</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <table class="table table-bordered table-striped dataTable" id="datatablePengembanganDiri" style="width: 100%">
                                        <thead>
                                            <td>No</td>
                                            <td>NIP</td>
                                            <td>Nama Kegiatan</td>	
                                            <td>Nama Guru</td>	
                                            <td>Tahun Ajaran</td>										
                                            <td>Semester</td>	
                                            <td class="text-center">Aksi</td>
                                            <td class="text-center">Status</td>
                                            <td class="text-center">Verifikasi</td>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="col-md-12">
                                <div class="row mb-3">
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-sm button-custome" style="width: 100%" onclick="formSecond()"><i class="bx bxs-plus-square"></i> Tambah</button>
                                    </div>
                                    <div class="col-md-10"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-bordered table-striped dataTable" id="datatableMstPengembanganDiri" style="width: 100%">
                                            <thead>
                                                <td>No</td>
                                                <td>Nama Dokumen</td>
                                                <td>Tahun Ajaran</td>
                                                <td>Semester</td>
                                                <td>Aksi</td>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
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
        $('#tahun').select2();
        $('#semester').select2();
        table();
        table2();
        filterByTwo();
    });
    // DataTable Pengembangan Diri
    function table(tahun='', semester='') {
        var table = $('#datatablePengembanganDiri').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('pengembanganDiriPetugas') }}",
                type: "POST",
                data: {
                    tahun : tahun,
                    semester : semester,
                },
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
                data: 'modifySemester',
                name: 'modifySemester',
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
                data: 'tahun_ajaran',
                name: 'tahun_ajaran',
                render: function(data, type, row) {
                    return '<p style="color:black">' + data + '</p>';
                }
            },				
            {
                data: 'modifySemester',
                name: 'modifySemester',
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
    }
    // DataTable Master Pengembangan Diri
    function table2() {
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
                data: 'tahun_ajaran',
                name: 'tahun_ajaran',
                render: function(data, type, row) {
                    return '<p style="color:black">' + data + '</p>';
                }
            },
            {
                data: 'semester',
                name: 'semester',
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
    }
    function filterByTwo() {
		$("#tahun").change(function (e) { 
			e.preventDefault();
            $('#datatablePengembanganDiri').DataTable().destroy();
			table( $(this).val(), $("#semester").val());
		});
		$("#semester").change(function (e) { 
			e.preventDefault();
            $('#datatablePengembanganDiri').DataTable().destroy();
			table($("#tahun").val() , $(this).val());
		});
	}
    function formFirst(id=''){
		$.post("{{route('formPengembanganDiri')}}",{id:id},function(data){
			$("#modalForm").html(data.content);
		});
	}
    function formFirstLihat(id='') {
        $.post("{!! route('formLihatPengembanganDiri') !!}",{id:id}).done(function(data){
          if(data.status == 'success'){
            $('#modalForm').html(data.content).fadeIn();
          } else {
            $('.main-layer').show();
          }
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
        $.post("{!! route('formTolakPengembanganDiri') !!}",{id:id}).done(function(data){
          if(data.status == 'success'){
            $('#modalForm').html(data.content).fadeIn();
          } else {
            $('.main-layer').show();
          }
        });
    }
    function deleteSecond(id) { 
		Swal.fire({
			title: "Apakah Anda yakin?",
			text: "Data yang dihapus tidak dapat dikembalikan lagi.",
			icon: 'warning',
			showCancelButton: true,
			cancelButtonText: 'Batal',
			confirmButtonText: 'Hapus',
		}).then((result) => {
			if (result.value) {
				$.post("{{ route('deleteMstPengembanganDiri') }}",{id:id}).done(function(data) {
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
    function download() {
        var tahun = $('#tahun').val();
        var semester = $('#semester').val();
        if (tahun && semester) {
            $.post("{!! route('exportPengembanganDiri') !!}", {
                tahun: tahun,
                semester: semester
            }, function(data) {
                if (data.status=='success') {
                    var newWin = window.open('', 'Print-Window');
                    newWin.document.open();
                    newWin.document.write(
                        '<html><head><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css"></head><body>' +
                        data.content + '</body></html>'
                    );
                    setTimeout(() => {
                        newWin.document.close();
                        newWin.close();
                    }, 3000);
                } else {
                    Swal.fire({
                        icon: data.status,
                        title: 'Whoops',
                        text: data.message,
                        showConfirmButton: false,
                        timer: 3000
                    });
                }
            });
        } else {
            Swal.fire({
                icon: 'warning',
                title: 'Whoops',
                text: 'Tahun Ajaran atau Semester Belum Dipilih!',
                showConfirmButton: false,
                timer: 1200
            });
        }
    }
</script>
@endpush
