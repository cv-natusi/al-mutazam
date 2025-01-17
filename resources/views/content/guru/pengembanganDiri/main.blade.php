@extends('layout.master.main')

@push('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
@endpush

@section('content')
    <div class="page-content">
        @include('include.master.breadcrumb')

        <div class="card main-layer">
            <div class="card-body">
                <div class="row mb-3" style="margin-top: 1rem">
                    <div class="col-md-3"></div>
                    <div class="col-md-7"></div>
                    <div class="col-md-2">
                        {{-- <label for="">Tahun</label>
                        <input type="date" name="tahun" id="tahun" value="{{date('Y')}}" class="form-control"> --}}
                    </div>
                </div>

                <div class="row" style="margin-top: 2rem">
                    <div class="table-responsive">
                        <table id="datatabel" class="table table-striped table-bordered" width="100%">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Tahun</td>
                                    <td>Nama Dokumen/Berkas</td>
                                    <td class="text-center">Status</td>
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
                url: "{{route('mainPengembanganDiriGuru')}}",
            },
            columns: [
                { data: "DT_RowIndex", name: "DT_RowIndex"},
                { data: "tahun", name: "tahun"},
                { data: "nama_dokumen", name: "nama_dokumen"},
                { data: "stts", name: "stts", class: "text-center"},
                { data: "actions", name: "actions", class: "text-center"},
            ],
        })
    }
    function uploadGuru(id) {
        $.post("{{route('formPengembanganDiriGuru')}}",{id:id},function(data){
			$("#modalForm").html(data.content);
		});
    }
</script>
@endpush
