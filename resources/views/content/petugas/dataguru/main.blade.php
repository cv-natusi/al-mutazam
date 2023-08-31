@extends('layout.master.main')

@push('style')
    <style>
        .card-title {
            margin-top: 40px;
        }

        .btn-card {
            text-align: left;
            width: 100%;
            color: white;
        }

        .btn-ctk {
            text-align: center;
            color: white;
            border-radius: 10px;
        }

        .tbl-container {
            width: 100%;
            margin-top: 10px;
        }

        .bg-tbl {
            background-color: #5C9DED;
            color: white;
        }

        .bdr {
            border-radius: 6px;
            overflow: hidden;
        }
    </style>
@endpush

@section('content')
    <div class="page-content">
        @include('include.master.breadcrumb')

        <div class="card main-layer">
            <div class="card-body">
                <div class="row mb-3" style="margin-top: 1rem">
                    <div class="col-md-3">
                        <button type="button" class="btn btn-primary btn-sm" onclick="formAdd()"><i class="bx bxs-plus-square"></i> TAMBAH GURU BARU</button>
                    </div>
                    <div class="col-md-7"></div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-primary btn-sm float-end" style="width: 100%" onclick="print()"><i class="bx bxs-printer"></i> PRINT</button>
                    </div>
                </div>

                <div class="row" style="margin-top: 2rem">
                    <div class="table-responsive">
                        <table id="datatabel" class="table table-striped table-bordered" width="100%">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>NIK</td>
                                    <td>Nama Guru</td>
                                    <td>Tugas Utama</td>
                                    <td>NO.Telepon</td>
                                    <td>Status</td>
                                    <td>Bank Data</td>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js" integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ url('assets/plugins/jquery-knob/jquery.knob.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        $(".knob").knob()
        loadTable();
    });
    function loadTable(filterBy='', filter = ''){
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
                url: "{{route('dataGuru')}}",
            },
            columns: [
                { data: "DT_RowIndex", name: "DT_RowIndex"},
                { data: "no_rekening", name: "no_rekening"},
                { data: "nama_siswa", name: "nama_siswa"},
                { data: "nama_kelas", name: "nama_kelas"},
                { data: "registrasi", name: "registrasi"},
                { data: "format", name: "format"},
                { data: "actions", name: "actions", class: "text-center"},
            ],
        })
    }
    function formAdd(id='') {
        $('.main-layer').hide();
        $.post("{{route('tambahGuru')}}", {id:id})
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
        $('#otherPage').empty()
        $('#mainLayer').show()
    }
</script>
@endpush
