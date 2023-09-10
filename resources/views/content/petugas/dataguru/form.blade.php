<style>
    #errKtp {
        margin-top:4px;
		background: #ff5757;
		color:#fff;
		padding:4px;
		display:none;
		width: 250p
    }
    #errNip {
        margin-top:4px;
		background: #ff5757;
		color:#fff;
		padding:4px;
		display:none;
		width: 250p
    }
    #errTelepon {
        margin-top:4px;
		background: #ff5757;
		color:#fff;
		padding:4px;
		display:none;
		width: 250p
    }
</style>
<div class="row">
    <div class="col-md-12">
        <!-- DATA DIRI -->
        @include('content.petugas.dataguru.segmentForm.formDataDiri')
        <!-- DATA PENDIDIKAN DAN PEKERJAAN -->
        @include('content.petugas.dataguru.segmentForm.formPendidikan')
        <!-- PENUGASAN -->
        @include('content.petugas.dataguru.segmentForm.formPenugasan')
        <!-- DATA PENDUKUNG -->
        @include('content.petugas.dataguru.segmentForm.formPendukung')
    </div>
</div>
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
                }else{
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
    // Store Data Pendidikan
    $('.simpanDataPendidikan').click(()=>{
		var data = new FormData($('.formSave')[0])
		$('.simpanDataPendidikan').attr('disabled',true).html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>LOADING...')
        $.ajax({
            url: '{{route("saveDataPendidikan")}}',
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
                }else{
                    Swal.fire({
                        icon: 'warning',
                        title: 'Whoops',
                        text: data.message,
                        showConfirmButton: false,
                        timer: 1300,
                    })
                }
                $('.simpanDataPendidikan').attr('disabled',false).html('SIMPAN')
            }
        }).fail(()=>{
            Swal.fire({
                icon: 'error',
                title: 'Whoops..',
                text: 'Terjadi kesalahan silahkan ulangi kembali',
                showConfirmButton: false,
                timer: 1300,
            })
            $('.simpanDataPendidikan').attr('disabled',false).html('SIMPAN')
        })
	})
    // Store Data Penugasan
    $('.simpanPenugasan').click(()=>{
		var data = new FormData($('.formSave')[0])
		$('.simpanPenugasan').attr('disabled',true).html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>LOADING...')
        $.ajax({
            url: '{{route("saveDataPenugasan")}}',
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
                }else{
                    Swal.fire({
                        icon: 'warning',
                        title: 'Whoops',
                        text: data.message,
                        showConfirmButton: false,
                        timer: 1300,
                    })
                }
                $('.simpanPenugasan').attr('disabled',false).html('SIMPAN')
            }
        }).fail(()=>{
            Swal.fire({
                icon: 'error',
                title: 'Whoops..',
                text: 'Terjadi kesalahan silahkan ulangi kembali',
                showConfirmButton: false,
                timer: 1300,
            })
            $('.simpanPenugasan').attr('disabled',false).html('SIMPAN')
        })
	})
    // Store Data Pendukung
    $('.simpanDataPendukung').click(()=>{
		var data = new FormData($('.formSave')[0])
		$('.simpanDataPendukung').attr('disabled',true).html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>LOADING...')
        $.ajax({
            url: '{{route("saveDataPendukung")}}',
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
                }else{
                    Swal.fire({
                        icon: 'warning',
                        title: 'Whoops',
                        text: data.message,
                        showConfirmButton: false,
                        timer: 1300,
                    })
                }
                $('.simpanDataPendukung').attr('disabled',false).html('SIMPAN')
            }
        }).fail(()=>{
            Swal.fire({
                icon: 'error',
                title: 'Whoops..',
                text: 'Terjadi kesalahan silahkan ulangi kembali',
                showConfirmButton: false,
                timer: 1300,
            })
            $('.simpanDataPendukung').attr('disabled',false).html('SIMPAN')
        })
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
</script>
