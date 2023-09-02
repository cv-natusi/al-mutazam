@extends('layout.master.main')

@push('style')
    <style>
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
            <div class="card" style="background: #ffffff; padding-bottom: 20px">
                <div class="row">
                    <div class="row">
                        <h6 class="h6-titlecard"><b>Edit Data Primer</b></h6>
                    </div>
                    <form class="row g-3" style="margin-left: 10px; margin-top: -10px"
                        action="{{ route('updatedataprimerPetugas', $primer->id) }}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="patch">
                        <div class="col-md-6">
                            <label for="inputCity" class="form-label">Nama Data Primer *</label>
                            <input type="text" class="form-control" id="namadataprimer_guru" name="namadataprimer_guru"
                                value="{{ $primer->namadataprimer_guru }}">
                        </div>
                        <div class="col-md-2">
                            <label for="inputState" class="form-label">Tahun Berkas *</label>
                            <div class="h-25 input-group">
                                <div class="input-group-text" id="btnGroupAddon2"><i class='bx bxs-calendar'></i></div>
                                <input type="date" class="form-control" placeholder="-" aria-label="Input group example"
                                    aria-describedby="btnGroupAddon2" id="tahun" name="tahun"
                                    value="{{ $primer->tahun }}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="inputState" class="form-label">Batas Upload *</label>
                            <div class="h-25 input-group">
                                <div class="input-group-text" id="btnGroupAddon2"><i class='bx bxs-calendar'></i></div>
                                <input type="date" class="form-control" placeholder="-" aria-label="Input group example"
                                    aria-describedby="btnGroupAddon2" id="batas_upload" name="batas_upload"
                                    value="{{ $primer->batas_upload }}">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Keterangan *</label>
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Leave a comment here" id="keterangan" name="keterangan"
                                    style="height: 100px">{{ $primer->keterangan }}</textarea>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-ctk"
                                style="background-color: #62A044; margin-top: -8px;">Simpan</button>
                        </div>
                    </form>
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
