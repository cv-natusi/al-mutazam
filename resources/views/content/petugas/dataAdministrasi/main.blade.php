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
                <div class="row mb-3">
                    <div class="col-md-2">
                        <button type="button" class="btn btn-sm button-custome" style="width: 100%" onclick="formAdd()"><i class="bx bxs-plus-square"></i> Tambah</button>
                    </div>
                    <div class="col-md-2"></div>
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
                        <button type="button" class="btn btn-sm button-custome float-end" style="width: 100%" onclick="download()"><i class='bx bxs-cloud-download'></i> Download</button>
                    </div>
                </div>
                <div class="row" style="margin-top: 2rem">
                    <div class="table-responsive">
                        <table id="datatabel" class="table table-striped table-bordered" width="100%">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>NIP</td>
                                    <td>Nama Guru</td>
                                    <td>Tahun Ajaran</td>
                                    <td>Semester</td>
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
        $('#tahun').select2();
        $('#semester').select2();
        loadTable();
        filterByTwo();
    });
    function loadTable(tahun='', semester=''){
        var table = $('#datatabel').DataTable({
            scrollX: true,
            searching: false,
            ordering: false,
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
                data: {
                    tahun : tahun,
                    semester : semester,
                },
            },
            columns: [
                { data: "DT_RowIndex", name: "DT_RowIndex"},
                { data: "nip", name: "nip"},
                { data: "guru", name: "guru"},
                { data: "tahun_ajaran", name: "tahun_ajaran"},
                { data: "modifySemester", name: "modifySemester"},
                { data: "actions", name: "actions", class: "text-center"},
                { data: "btnStatus", name: "btnStatus", class: "text-center"},
                { data: "verifikasi", name: "verifikasi", class: "text-center"},
            ],
        })
    }
    function filterByTwo() {
		$("#tahun").change(function (e) { 
			e.preventDefault();
            $('#datatabel').DataTable().destroy();
			loadTable( $(this).val(), $("#semester").val());
		});
		$("#semester").change(function (e) { 
			e.preventDefault();
            $('#datatabel').DataTable().destroy();
			loadTable($("#tahun").val() , $(this).val());
		});
	}
    function formAdd(id='') {
        $.post("{{route('administrasiModalForm')}}",{id:id},function(data){
			$("#modalForm").html(data.content);
		});
    }
    function lihat(id='') {
        $.post("{!! route('administrasiModalFormPetugas') !!}",{id:id}).done(function(data){
          if(data.status == 'success'){
            $('#modalForm').html(data.content).fadeIn();
          } else {
            $('.main-layer').show();
          }
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
        $.post("{!! route('formTolakAdministrasi') !!}",{id:id}).done(function(data){
          if(data.status == 'success'){
            $('#modalForm').html(data.content).fadeIn();
          } else {
            $('.main-layer').show();
          }
        });
	}
    function hideForm(){
        $('#modalForm').hide()
        $('.main-layer').show()
    }
    function download() {
        var tahun = $('#tahun').val();
        var semester = $('#semester').val();
        if (tahun && semester) {
            $.post("{!! route('exportDataAdministrasi') !!}", {
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
