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
                                <div class="row mb-4">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-3">
                                        <label>Tanggal Awal</label>
                                        <input type="date" name="pilihawal" id="pilihawal" class="form-control">
                                    </div>
                                    <div class="col-md-3">
                                        <label>Tanggal Akhir</label>
                                        <input type="date" name="pilihakhir" id="pilihakhir" class="form-control">
                                    </div>
                                    <div class="col-md-3">
                                        <label>Pilih Guru</label>
                                        <select name="pilihguru" id="pilihguru" class="form-control single-select">
                                            <option value="">.:: Pilih ::.</option>
                                            @if (count($guru)>0)
                                                @foreach ($guru as $gr)
                                                <option value="{{$gr->id_guru}}">{{$gr->nama}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button"  class="btn button-custome" style="width: 100%; margin-top:20px;" onclick="download()"><i class='bx bxs-cloud-download'></i> Download</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <table class="table table-bordered table-striped dataTable" id="datatablePengembanganDiri" style="width: 100%">
                                        <thead>
                                            <td>No</td>
                                            <td>NIP</td>
                                            <td>Nama Kegiatan</td>	
                                            <td>Nama Guru</td>	
                                            {{-- <td>Tahun Ajaran</td>
                                            <td>Semester</td>	 --}}
                                            <td>Tgl Mulai</td>										
                                            <td>Tgl Selesai</td>
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
        $(".single-select").select2({
            theme: 'bootstrap-5'
        });
        table();
        table2();
        filterByTwo();
    });
    // DataTable Pengembangan Diri
    function table(awal='',akhir='',guru='') {
        var table = $('#datatablePengembanganDiri').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('pengembanganDiriPetugas') }}",
                type: "POST",
                data: {
                    awal : awal,
                    akhir : akhir,
                    guru : guru
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
                data: 'modifyName',
                name: 'modifyName',
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
                data: 'tgl_mulai',
                name: 'tgl_mulai',
                render: function(data, type, row) {
                    return '<p style="color:black">' + data + '</p>';
                }
            },				
            {
                data: 'tgl_selesai',
                name: 'tgl_selesai',
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
		$("#pilihawal").change(function (e) { 
			e.preventDefault();
            $('#datatablePengembanganDiri').DataTable().destroy();
			table($(this).val(), $("#pilihakhir").val(), $("#pilihguru").val());
		});
        $("#pilihakhir").change(function (e) { 
			e.preventDefault();
            $('#datatablePengembanganDiri').DataTable().destroy();
			table($("#pilihawal").val(), $(this).val(), $("#pilihguru").val());
		});
		$("#pilihguru").change(function (e) { 
			e.preventDefault();
            $('#datatablePengembanganDiri').DataTable().destroy();
			table($("#pilihawal").val(), $("#pilihakhir").val(), $(this).val());
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
        var awal = $('#pilihawal').val();
        var akhir = $('#pilihakhir').val();
        var guru = $('#pilihguru').val();
        if (awal && akhir && guru) {
            $.post("{!! route('exportPengembanganDiri') !!}", {
                awal: awal,
                akhir: akhir,
                guru: guru
            }, function(data) {
                var newWin = window.open('', 'Print-Window');
                newWin.document.open();
                newWin.document.write(
                    '<html><head><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css"></head><body>' +
                    data.content + '</body></html>');
                    setTimeout(() => {
                        newWin.document.close();
                        newWin.close();
                    }, 2000);
                });
        } else {
            Swal.fire({
                icon: 'warning',
                title: 'Whoops',
                text: 'Tanggal awal & akhir atau guru wajib dipilih!',
                showConfirmButton: false,
                timer: 2000
            });
        }
    }
</script>
@endpush
