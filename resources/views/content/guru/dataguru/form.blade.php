@extends('layout.master.main')

@push('style')
    <link href="{{asset('assets/plugins/datetimepicker/css/classic.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/datetimepicker/css/classic.date.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
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
        .btnFormAdd{
            background: #32762C80 !important;
            color: #ffffff !important;
        }
    </style>
@endpush

@section('content')
    <div class="page-content">
        @include('include.master.breadcrumb')

        <div class="card main-layer">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        @include('content.petugas.dataguru.segmentForm.formDataDiri') <!-- DATA DIRI -->
                        @include('content.petugas.dataguru.segmentForm.formPendidikan') <!-- DATA PENDIDIKAN DAN PEKERJAAN -->
                        @include('content.petugas.dataguru.segmentForm.formPenugasan') <!-- PENUGASAN -->
                        @include('content.petugas.dataguru.segmentForm.formPendukung') <!-- DATA PENDUKUNG -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
<script src="{{ url('assets/plugins/jquery-knob/jquery.knob.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('assets/plugins/datetimepicker/js/picker.js')}}"></script>
<script src="{{asset('assets/plugins/datetimepicker/js/picker.date.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js" integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
	$(document).ready(function () {
		$('#nip').keypress(function(e){
			var nip = $('#nip').val()
			var res = nip.toString().replace(/[^,\d]/g, "")
			$('#nip').val(res)
			if(e.which!=8 && isNaN(String.fromCharCode(e.which))){
				e.preventDefault()
				$('#errNip').html('Hanya angka').stop().show().fadeOut('slow')
				return false;
			}
		})
		$('#nik').keypress(function(e){
			var nik = $('#nik').val()
			var res = nik.toString().replace(/[^,\d]/g, "")
			$('#nik').val(res)
			if(e.which!=8 && isNaN(String.fromCharCode(e.which))){
				e.preventDefault()
				$('#errNik').html('Hanya angka').stop().show().fadeOut('slow')
				return false;
			}
		})
		$('#telepon').keypress(function(e){
			var telepon = $('#telepon').val()
			var res = telepon.toString().replace(/[^,\d]/g, "")
			$('#telepon').val(res)
			if(e.which!=8 && isNaN(String.fromCharCode(e.which))){
				e.preventDefault()
				$('#errTelepon').html('Hanya angka').stop().show().fadeOut('slow')
				return false;
			}
		})
		$('#tugas_utama').select2();
		$('#tugas_tambahan').select2();
		$('#mata_pelajaran').select2();
		$('#potensi_bidang').select2();
	});
	// Store Data Diri
	$('.simpanDataDiri').click(()=>{
		var data = new FormData($('.formDataDiri')[0])
		$('.simpanDataDiri').attr('disabled',true).html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>LOADING...')
		$.ajax({
			url: '{{route("saveDataDiri")}}',
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
					setTimeout(()=>{
						$('.other-page').fadeOut(()=>{
							$('#datatabel').DataTable().ajax.reload()
							hideForm()
						})
					}, 1100);
					// location.reload()
				}else if(data.code==403){
					alert_validation(data.message)
				}
				else{
					Swal.fire({
						icon: 'warning',
						title: 'Whoops',
						text: data.message,
						showConfirmButton: false,
						timer: 1300,
					})
				}
				$('.simpanDataDiri').attr('disabled',false).html('SIMPAN')
			}
		}).fail(()=>{
			Swal.fire({
				icon: 'error',
				title: 'Whoops..',
				text: 'Terjadi kesalahan silahkan ulangi kembali',
				showConfirmButton: false,
				timer: 1300,
			})
			$('.simpanDataDiri').attr('disabled',false).html('SIMPAN')
		})
	})
	function alert_validation(message) { 
        var n = 0;
                for (key in message) {
                    if (n == 0) {
                        var dt0 = key;
                    }
                    n++;
                }
                Swal.fire({
                    icon: 'error',
                    title: 'Whoops..',
                    text:  dt0 + ' ' + message[dt0],
                    showConfirmButton: false,
                    timer: 1300,
                })
     }
	// Store Data Pendidikan
	$('.simpanDataPendidikan').click(async(e)=>{
		var data = new FormData($('.formDataPendidikan')[0])
		const url = '{{route("saveDataPendidikan")}}'
		$('.simpanDataPendidikan').attr('disabled',true).html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>LOADING...')
		await store(data,url)
		$('.simpanDataPendidikan').attr('disabled',false).html('SIMPAN')
	})
	// Store Data Penugasan
	$('.simpanPenugasan').click(async(e)=>{
		var data = new FormData($('.formDataPenugasan')[0])
		const url = '{{route("saveDataPenugasan")}}'
		$('.simpanPenugasan').attr('disabled',true).html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>LOADING...')
		await store(data,url)
		$('.simpanPenugasan').attr('disabled',false).html('SIMPAN')
	})
	// Store Data Pendukung
	$('.simpanDataPendukung').click(async(e)=>{
		var data = new FormData($('.formDataPendukung')[0])
		const url = '{{route("saveDataPendukung")}}'
		$('.simpanDataPendukung').attr('disabled',true).html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>LOADING...')
		await store(data,url)
		$('.simpanDataPendukung').attr('disabled',false).html('SIMPAN')
	})
	// Validasi NIK 16 Digit
	$('input[name="nik"]').keyup(() => {
		var nik = $('input[name="nik"]').val();
		if (nik.length < 16) {
			$('#errKtp').html('Nomor Kartu Penduduk Tidak Boleh Kurang Dari 16').stop().show();
			return false;
		} else if (nik.length <= 16) {
			$('#errKtp').html('Nomor Kartu Penduduk Tidak Boleh Lebih Dari 16').stop().show().fadeOut();
		} else {
			$('#errKtp').hide();
		}
	})
	$('.btnCancel').click(()=>{
		$('.other-page').fadeOut(function(){
			hideForm()
		})
	})
	async function store(data,url){
		try{
			await $.ajax({
				url: url,
				type: 'POST',
				data: data,
				contentType: false,
				processData: false,
			}).done(async(data,status,xhr)=>{
				const code = xhr.status
				if(code===204){
					await Swal.fire({
						icon: 'warning',
						title: 'Oops..',
						text: 'Data tidak ditemukan',
						showConfirmButton: true,
					})
					return
				}
				if(data.code==403){
					return alert_validation(data.message)
				}
				await Swal.fire({
					icon: 'success',
					title: 'Berhasil',
					text: 'Data berhasil disimpan',
					showConfirmButton: true,
				})
				$('.other-page').fadeOut(function(){
					hideForm()
					location.reload()
				})
			})
		}catch(e){
			await Swal.fire({
				icon: 'error',
				title: 'Oops..',
				text: 'Terjadi kesalahan sistem',
				showConfirmButton: true,
			})
		}
	}
</script>
@endpush
