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
            <div class="card-body">
                <div class="row mb-3" style="margin-top: 1rem">
                    <div class="col-md-3">
                        <button type="button" class="btn btn-primary btn-sm" style="width: 100%" onclick="formAdd()"><i class="bx bxs-plus-square"></i> Tambah Kelas Baru</button>
                    </div>
                    <div class="col-md-7"></div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-info btn-sm float-end" style="width: 100%; color: #fff" onclick="print()"><i class="bx bxs-printer"></i> Print</button>
                    </div>
                </div>

                <div class="row" style="margin-top: 2rem">
                    <div class="table-responsive">
                        <table id="datatabel" class="table table-striped table-bordered" width="100%">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Kelas</td>
                                    <td>Kode Kelas</td>
                                    <td>Nama Kelas</td>
                                    <td>Guru Wali Kelas</td>
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
                url: "{{route('dataKelas')}}",
            },
            columns: [
                { data: "DT_RowIndex", name: "DT_RowIndex"},
                { data: "kelas", name: "kelas"},
                { data: "kode_kelas", name: "kode_kelas"},
                { data: "nama_kelas", name: "nama_kelas"},
                { data: "guru", name: "guru"},
                { data: "actions", name: "actions", class: "text-center"},
            ],
        })
    }
    function formAdd(id='') {
        $('.main-layer').hide();
        $.post("{{route('tambahKelas')}}", {id:id})
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
