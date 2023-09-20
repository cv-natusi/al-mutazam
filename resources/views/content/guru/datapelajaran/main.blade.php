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
                    <div class="col-md-3">
                        {{-- <h2>Select a Year:</h2>
                        <div class="input-group date">
                            <input type="text" class="form-control" id="yearPicker" readonly>
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="bx bxs-calendar"></i></span>
                            </div>
                        </div> --}}
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
                    <div class="col-md-6"></div>
                </div>
                <div class="row">
                    <div class="table-responsive">
                        <table id="datatabel" class="table table-striped table-bordered" width="100%">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Kelas</td>
                                    <td>Rombel</td>
                                    <td>Nama Mata Pelajaran</td>
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
        $('#yearPicker').datepicker({
            format: "yyyy",
            minViewMode: "years", // Set the view mode to years only
            autoclose: true,
            todayHighlight: true
        });
        $('#tahun').select2();
        $('#semester').select2();
        loadTable($("#tahun").val(), $("#semester").val());
		filterByTwo();
    });
    function loadTable(tahun=null, semester=null){
        var table = $('#datatabel').DataTable({
            scrollX: true,
            searching: true, 
            paging: true,
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
				url:"{{route('datatableDataPelajaranGuru')}}",
				type: 'post',
				data: {
					tahun : tahun,
					semester : semester,
				}
			},
            columns: [
                { data: "DT_RowIndex", name: "DT_RowIndex"},
                { data: "kls", name: "kls"},
                { data: "nama_kelas", name: "nama_kelas"},
                { data: "nama_mapel", name: "nama_mapel"},
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
</script>
@endpush
