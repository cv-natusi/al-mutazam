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
                        <h5 style="margin-bottom: 50px"><b>Detail Guru</b></h5>
                        @foreach($guru as $g)
                        <div class="my-3 mx-3">
                            <div class="row">
                                <div class="col-sm-4">
                                    <img src="{{url('assets/images/avatar.png')}}" class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-sm-6">
                                    <div class="row">
                                        <h3 class="col text-muted text-sm-start">{{$g->nama_guru}}</h3>
                                    </div>
                                    <div class="row">
                                        <p class="col text-muted text-sm-start">NIP. {{$g->nip}}</p>
                                    </div>
                                    <div class="row">
                                        <p class="col-sm-4 text-muted text-sm-start mb-0 mb-sm-3">NIK</p>
                                        <p class="col-sm-1 text-muted text-sm-center">:</p>
                                        <p class="col-sm-6">{{$g->nik}}</p>
                                    </div>
                                    <div class="row">
                                        <p class="col-sm-4 text-muted text-sm-start mb-0 mb-sm-3">Tanggal Lahir</p>
                                        <p class="col-sm-1 text-muted text-sm-center">:</p>
                                        <p class="col-sm-6">{{$g->tanggal_lahir}}</p>
                                    </div>
                                    <div class="row">
                                        <p class="col-sm-4 text-muted text-sm-start mb-0 mb-sm-3">Usia</p>
                                        <p class="col-sm-1 text-muted text-sm-center">:</p>
                                        <p class="col-sm-6">{{$g->usia}}</p>
                                    </div>
                                    <div class="row">
                                        <p class="col-sm-4 text-muted text-sm-start mb-0 mb-sm-3">Email</p>
                                        <p class="col-sm-1 text-muted text-sm-center">:</p>
                                        <p class="col-sm-6">{{$g->email}}</p>
                                    </div>
                                    <div class="row">
                                        <p class="col-sm-4 text-muted text-sm-start mb-0 mb-sm-3">Telepon</p>
                                        <p class="col-sm-1 text-muted text-sm-center">:</p>
                                        <p class="col-sm-6">{{$g->telepon}}</p>
                                    </div>
                                    <div class="row">
                                        <p class="col-sm-4 text-muted text-sm-start mb-0 mb-sm-3">Alamat</p>
                                        <p class="col-sm-1 text-muted text-sm-center">:</p>
                                        <p class="col-sm-6">{{$g->alamat}}</p>
                                    </div>
                                    <div class="row">
                                        <p class="col-sm-4 text-muted text-sm-start mb-0 mb-sm-3">Subminkal</p>
                                        <p class="col-sm-1 text-muted text-sm-center">:</p>
                                        <p class="col-sm-6">{{$g->subminkal}}</p>
                                    </div>
                                    <div class="row">
                                        <p class="col-sm-4 text-muted text-sm-start mb-0 mb-sm-3">TMTA</p>
                                        <p class="col-sm-1 text-muted text-sm-center">:</p>
                                        <p class="col-sm-6">{{$g->tmta}}</p>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <button type="button" class="btn" style="color:#0000ff; border-radius: 8px;"><i class='bx bxs-circle' style='color:#0000ff'></i>Aktif</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">TUGAS UTAMA</th>
                                                <th scope="col" style="background-color: #D1FEE9">TUGAS TAMBAHAN</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{$g->tugas_utama}}</th>
                                                <td>{{$g->tugas_tambahan}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <a href="{{route('dataGuru')}}" type="button" class="btn btn-secondary btn-ctk">Kembali</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
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
