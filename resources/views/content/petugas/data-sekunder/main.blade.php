@extends('layout.master.main')

@push('style')
    <style>
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

        .btn-ctk {
            text-align: center;
            color: white;
            margin-left: 12px;
        }

        .dropdown-btn {}

        .card-contenttitle {
            margin-top: 30px;
            text-align: left;
            color: white;
            font-size: 30px;
        }

        .h6-titlecard {
            margin-bottom: 15px;
            margin-top: 20px;
            margin-left: 15px;
        }

        .h6-contentcard {
            color: white;
            text-align: left;
        }

        .btn-card {
            text-align: left;
            padding-left: 20px;
            border: none;
            width: 100%;
            color: white;
            margin-top: 30px;
        }
    </style>
@endpush

@section('content')
    <div class="page-content">
        @include('include.master.breadcrumb')

        <div class="row">
            <div class="card" style="background: #ffffff:">
                <div class="row">
                    <div class="row">
                        <h6 class="h6-titlecard"><b>Data Sekunder</b></h6>
                    </div>
                    <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
                        <div class="btn-toolbar mb-3" role="toolbar">
                            <div class="btn-group me-0" role="group">
                                <button type="button" class="btn btn-ctk" style="background-color: #6FA4DD;"><i
                                        class='bx bx-printer' style='color:#ffffff'></i> CETAK</button>
                            </div>
                            <div>
                                <button type="button" class="btn btn-ctk" style="background-color: #6B9E5E;"><i
                                        class='bx bx-file' style='color:#ffffff'></i> EXCEL</button>
                            </div>
                        </div>
                        <div class="input-group">
                            <div class="dropdown">
                                <div class="btn-group me-3">
                                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1"
                                        data-bs-toggle="dropdown" aria-expanded="false" style="border-color: black">
                                        Filter Berdasarkan
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="h-25 input-group">
                                <div class="input-group-text" id="btnGroupAddon2"><i class='bx bx-search-alt'></i></div>
                                <input type="text" class="form-control" placeholder="-" aria-label="Input group example"
                                    aria-describedby="btnGroupAddon2">
                            </div>

                        </div>
                    </div>
                    <div>
                        <div class="tbl-container bdr">
                            <table class="table">
                                <thead class="bg-tbl">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Data Sekunder</th>
                                        <th scope="col">Tahun</th>
                                        <th scope="col">Batas Upload</th>
                                        <th scope="col">Keterangan</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Tgl.Upload</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datasekunders as $datasekunder)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $datasekunder->namadatasekunder_guru }}</td>
                                            <td>{{ $datasekunder->tahun }}</td>
                                            <td>{{ $datasekunder->batas_upload }}</td>
                                            <td>{{ $datasekunder->keterangan }}</td>
                                            <td>{{ $datasekunder->status }}</td>
                                            <td>{{ $datasekunder->tgl_upload }}</td>
                                            <td>
                                                <div class="btn-toolbar" role="toolbar">
                                                    <div class="btn-group me-0" role="group">
                                                        <button type="button" class="btn btn-ctk" data-bs-toggle="modal"
                                                            data-bs-target="#ModalCreate"
                                                            style="background-color: #8282F2; border-radius: 10px">Upload</button>
                                                    </div>
                                                    <div>
                                                        <button type="button" class="btn btn-ctk"
                                                            style="background-color: #D5E497; border-radius: 10px; color: black">Lihat</button>
                                                    </div>
                                                </div>
                                            </td>
                                            @include('content.guru.data-primer.modal')
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <ul class="pagination justify-content-end">
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Next</a>
            </li>
        </ul>
    </div>
@endsection

@push('script')
    {{-- <script src="{{ url('assets/js/index.js') }}"></script> --}}
    <script src="{{ url('assets/plugins/jquery-knob/jquery.knob.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $(".knob").knob()
            arrbulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September",
                "Oktober", "November", "Desember"
            ];
            date = new Date();
            hari = date.getDay();
            tanggal = date.getDate();
            bulan = date.getMonth();
            tahun = date.getFullYear();
            // document.write(tanggal+"-"+arrbulan[bulan]+"-"+tahun+"<br/>"+jam+" : "+menit+" : "+detik+"."+millisecond);

            $('#date').html(tanggal + " " + arrbulan[bulan] + " " + tahun)
        });

        function renderTime() {
            var currentTime = new Date();
            var h = currentTime.getHours();
            var m = currentTime.getMinutes();
            var s = currentTime.getSeconds();
            if (h == 0) {
                h = 24;
            }
            if (h < 10) {
                h = "0" + h;
            }
            if (m < 10) {
                m = "0" + m;
            }
            if (s < 10) {
                s = "0" + s;
            }
            // var myClock = document.getElementById('time');
            $('#time').html("<b>" + h + " : " + m + " : " + s + " WIB</b>");
            setTimeout('renderTime()', 1000);
        }

        renderTime();
    </script>
@endpush
