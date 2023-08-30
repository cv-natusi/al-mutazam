@extends('layout.master.main')

@push('style')
    <style>
        .card-title {
            margin-top: 40px;
        }

        .btn-ctk {
            text-align: center;
            color: white;
            border-radius: 10px;
        }

        .btn-card {
            text-align: left;
            width: 100%;
            color: white;
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

        <div class="row">
            <div class="col-md-12">
                <div class="card" style="background: #ffffff">
                    <div class="card-body">
                        <span><b id="date" style="font-size: 10pt;"></b></span>&nbsp;
                        <span id="time" style="font-size: 10pt"></span>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card" style="width: 100%; background-color:#ffffff">
                    <div class="card-body">
                        <div class="position-relative">
                            <div class="position-absolute top-0 start-0">
                                <a href="{{route('tambahKelas')}}" type="button" class="btn btn-ctk" style="background-color: #5C9DED">
                                    <i class='bx bxs-plus-circle'></i> Tambah Kelas Baru</a>
                            </div>
                            <div class="position-absolute top-0 end-0">
                                <a href="#" type="button" class="btn btn-ctk" style="background-color: #A4C7E7">
                                    <i class='bx bx-printer'></i> Print</a>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div>
                            <div class="tbl-container bdr">
                                <table class="table">
                                    <thead class="bg-tbl">
                                        <tr>
                                            <th class="text-center" scope="col">No</th>
                                            <th class="text-center" scope="col">Kelas</th>
                                            <th class="text-center" scope="col">Kode Kelas</th>
                                            <th class="text-center" scope="col">Nama Kelas</th>
                                            <th class="text-center" scope="col">Guru Wali Kelas</th>
                                            <th class="text-center" scope="col">Created_at</th>
                                            <th class="text-center" scope="col">Updated_at</th>
                                            <th class="text-center" scope="col" colspan="2">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($datakelas as $k)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $k->kelas }}</td>
                                                <td>{{ $k->kodekelas }}</td>
                                                <td>{{ $k->namakelas }}</td>
                                                <td>{{ $k->id_guru }}</td>
                                                <td>{{ $k->created_at }}</td>
                                                <td>{{ $k->updated_at }}</td>
                                                <td class="text-center">
                                                    <a href="{{route('editKelas')}}" type="button" class="btn btn-ctk" style="background-color:#D9D9D9; color:black">
                                                        <i class='bx bx-edit-alt' ></i> Edit</a>
                                                </td>
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-danger btn-ctk">
                                                        <i class='bx bx-trash'></i> Delete</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
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
