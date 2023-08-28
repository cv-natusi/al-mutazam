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
                    <!-- <span><b id="date" style="font-size: 10pt;"></b></span>&nbsp;
                        <span id="time" style="font-size: 10pt"></span> -->
                    <div class="my-3 mx-3">
                        <div class="row">
                            <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
                                <div class="btn-group" role="group" aria-label="First group">
                                    <a href="{{ route('tambahdataPelajaran') }}" type="button" class="btn" style="background-color: #5C9DED; color:white; border-radius: 10px;">Tambah Pelajaran Baru</a>
                                </div>
                                <div class="btn-group" role="group" aria-label="First group">
                                    <a href="" type="button" class="btn" style="background-color: #A4C7E7; color:white; border-radius: 10px;"><i class='bx bxs-printer' style='color:#f7f7f7'></i>Print</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="my-3 mx-3">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="tbl-container bdr">
                                    <table class="table">
                                        <thead class="bg-tbl">

                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Nama Pelajaran</th>
                                                <th scope="col">Kelas</th>
                                                <th scope="col">TA</th>
                                                <th scope="col">Semester</th>
                                                <th scope="col">Guru Pengajar</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($pelajaran as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</th>
                                                <td>{{ $item->mapel }}</td>
                                                <td>{{ $item->namakelas }}</th>
                                                <td>{{ $item->ta }}</td>
                                                <td>{{ $item->semester }}</th>
                                                <td>{{ $item->nama_guru }}</td>
                                                <td>
                                                    <div class="btn-group" role="group" aria-label="First group">
                                                        <a href="{{ route('editdataPelajaran', $item->id) }}" type="button" class="btn" style="background-color: #D9D9D9; color:black; border-radius: 10px;">Edit</a>
                                                    </div>
                                                    <div class="btn-group" role="group" aria-label="First group">
                                                        <a href="{{ route('hapusdataPelajaran', $item->id) }}" onclick="return confirm('Anda yakin ingin menghapus data?')" type="button" class="btn" style="background-color: #FF0000; color:white; border-radius: 10px;">Hapus</a>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="my-3 mx-3">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-end">
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous"><i class='bx bxs-chevron-left' style='font-size: small; color:#828282'></i></a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#" style='color:#828282'>1</a></li>
                                <li class="page-item"><a class="page-link" href="#" style='color:#828282'>2</a></li>
                                <li class="page-item"><a class="page-link" href="#" style='color:#828282'>3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous"><i class='bx bxs-chevron-right' style='font-size: small; color:#828282'></i></a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<!-- @push('script')
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
<<<<<<< HEAD
@endpush
=======
@endpush -->
>>>>>>> 7c2b83e (data pelajaran)
