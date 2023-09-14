@extends('layout.master.main')

@push('style')
    <link href="{{asset('assets/plugins/datetimepicker/css/classic.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/datetimepicker/css/classic.date.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
@endpush

@section('content')
    <div class="page-content">
        @include('include.master.breadcrumb')
        
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="width: 100%; background-color:#ffffff">
                    <div class="card-header bg-card">	
                        <h5 class="text-card">{{$title}}</h5>
                    </div>
                    <div class="card-body">
                        <form class="row mb-3 formSave">
                            <input type="hidden" name="id" id="id" value="{{Auth::User()->id}}">
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="">Password Sekarang</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="input-group" id="show_hide_password_sekarang">
                                        <input type="password" class="form-control border-end-0" id="inputChoosePassword" name="password_sekarang" value="{{Auth::User()->lihat_password}}" placeholder="Masukkan Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="">Password Baru</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="input-group" id="show_hide_password_baru">
                                        <input type="password" class="form-control border-end-0" id="inputChoosePassword" name="password_baru" placeholder="********"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="">Ulangi Password Baru</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="input-group" id="show_hide_password_baru_ulang">
                                        <input type="password" class="form-control border-end-0" id="inputChoosePassword" name="password_baru_ulang" placeholder="********"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <button type="button" class="btn btn-sm button-custome btnSimpan">Simpan Perubahan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
<script src="{{ url('assets/plugins/jquery-knob/jquery.knob.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#show_hide_password_sekarang a").on('click', function (event) {
            event.preventDefault();
            if ($('#show_hide_password_sekarang input').attr("type") == "text") {
                $('#show_hide_password_sekarang input').attr('type', 'password');
                $('#show_hide_password_sekarang i').addClass("bx-hide");
                $('#show_hide_password_sekarang i').removeClass("bx-show");
            } else if ($('#show_hide_password_sekarang input').attr("type") == "password") {
                $('#show_hide_password_sekarang input').attr('type', 'text');
                $('#show_hide_password_sekarang i').removeClass("bx-hide");
                $('#show_hide_password_sekarang i').addClass("bx-show");
            }
        });

        $("#show_hide_password_baru a").on('click', function (event) {
            event.preventDefault();
            if ($('#show_hide_password_baru input').attr("type") == "text") {
                $('#show_hide_password_baru input').attr('type', 'password');
                $('#show_hide_password_baru i').addClass("bx-hide");
                $('#show_hide_password_baru i').removeClass("bx-show");
            } else if ($('#show_hide_password_baru input').attr("type") == "password") {
                $('#show_hide_password_baru input').attr('type', 'text');
                $('#show_hide_password_baru i').removeClass("bx-hide");
                $('#show_hide_password_baru i').addClass("bx-show");
            }
        });

        $("#show_hide_password_baru_ulang a").on('click', function (event) {
            event.preventDefault();
            if ($('#show_hide_password_baru_ulang input').attr("type") == "text") {
                $('#show_hide_password_baru_ulang input').attr('type', 'password');
                $('#show_hide_password_baru_ulang i').addClass("bx-hide");
                $('#show_hide_password_baru_ulang i').removeClass("bx-show");
            } else if ($('#show_hide_password_baru_ulang input').attr("type") == "password") {
                $('#show_hide_password_baru_ulang input').attr('type', 'text');
                $('#show_hide_password_baru_ulang i').removeClass("bx-hide");
                $('#show_hide_password_baru_ulang i').addClass("bx-show");
            }
        });
    });
    $('.btnSimpan').click(()=>{
		var data = new FormData($('.formSave')[0])
		$('.btnSimpan').attr('disabled',true).html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>LOADING...')
        $.ajax({
            url: '{{route("savePengaturan")}}',
            type: 'POST',
            data: data,
            async: true,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data){
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
                $('.btnSimpan').attr('disabled',false).html('SIMPAN')
            }
        }).fail(()=>{
            Swal.fire({
                icon: 'error',
                title: 'Whoops..',
                text: 'Terjadi kesalahan silahkan ulangi kembali',
                showConfirmButton: false,
                timer: 1300,
            })
            $('.btnSimpan').attr('disabled',false).html('SIMPAN')
        })
	})
</script>
@endpush