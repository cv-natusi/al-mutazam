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
                <h5 class="text-card">Data Pelajaran</h5>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-2">
                        <button type="button" class="btn button-custome" onclick="formAdd()"><i class="bx bxs-plus-square"></i>Tambah</button>
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-3">
                        <label>Tahun Ajaran</label>
                        <select name="tahun" id="tahun" class="form-control">
                            <option value="">.:: Pilih ::.</option>
                            <option value="2020-2021">2020-2021</option>
                            <option value="2021-2022">2021-2022</option>
                            <option value="2022-2023" selected>2022-2023</option>
                            <option value="2023-2024">2023-2024</option>
                            <option value="2024-2025">2024-2025</option>
                            <option value="2025-2026">2025-2026</option>
                            <option value="2026-2027">2026-2027</option>
                            <option value="2027-2028">2027-2028</option>
                            <option value="2028-2029">2028-2029</option>
                            <option value="2029-2030">2029-2030</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label>Semester</label>
                        <select name="semester" id="semester" class="form-control">
                            <option value="">.:: Pilih ::.</option>
                            <option value="1" selected>Semester 1</option>
                            <option value="2">Semester 2</option>
                        </select>
                    </div>
                </div>

                <div class="row" style="margin-top: 2rem">
                    <div class="table-responsive">
                        <table id="datatabel" class="table table-striped table-bordered" width="100%">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Nama Pelajaran</td>
                                    <td>Kelas</td>
                                    <td>Guru Pengajar</td>
                                    <td>Tahun Ajaran</td>
                                    <td>Semester</td>
                                    <td>Aksi</td>
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
        $('#tahun').select2();
        $('#semester').select2();
        loadTable($("#tahun").val(), $("#semester").val());
		filterByTwo();
    });
    function loadTable(tahun=null, semester=null){
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
                url: "{{route('dataPelajaran')}}",
            },
            // ajax: {
			// 	url:"{{route('datatableDataPelajaranGuru')}}",
			// 	type: 'post',
			// 	data: {
			// 		tahun : tahun,
			// 		semester : semester,
			// 	}
			// },
            columns: [
                { data: "DT_RowIndex", name: "DT_RowIndex"},
                { data: "nama_mapel", name: "nama_mapel"},
                { data: "kelas", name: "kelas"},
                { data: "guru", name: "guru"},
                { data: "ta", name: "ta"},
                { data: "semester", name: "semester"},
                { data: "actions", name: "actions", class: "text-center"},
            ],
        })
    }
    function filterByTwo() {
		$("#tahun").change(function (e) { 
			e.preventDefault();
            $('#datatabel').DataTable().destroy();
            console.log($(this).val(), $("#semester").val());
			loadTable( $(this).val(), $("#semester").val());
		});
		$("#semester").change(function (e) { 
			e.preventDefault();
            $('#datatabel').DataTable().destroy();
            console.log($("#tahun").val(),$(this).val());
			loadTable($("#tahun").val() , $(this).val());
		});
	}
    function formAdd(id='') {
        console.log(id)
        $('.main-layer').hide();
        $.post("{{route('formDataPelajaran')}}", {id:id})
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
				$.post("{{ route('deleteDataPelajaran') }}",{id:id}).done(function(data) {
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
    function hideForm(){
        $('.other-page').empty()
        $('.main-layer').show()
    }
</script>
@endpush
