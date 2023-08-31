<style>
    #errKtp {
        margin-top:4px;
		background: #ff5757;
		color:#fff;
		padding:4px;
		display:none;
		width: 250p
    }
    #errnip {
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
        <div class="card" style="width: 100%; background-color:#ffffff">
            <div class="card-header">
                <h5>{{$title}}</h5>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label>Nomor Induk Kependudukan (NIK) <small>*</small></label>
                        <input type="text" name="nik" class="form-control" maxlength="16" pattern="/^-?\d+\.?\d*$/" placeholder="000000000000" autocomplete="off" value="{{ !empty($guru) ? $guru->nik : ''}}">
                        <div id="errKtp"></div>
                    </div>
                    <div class="col-md-6">
                        <label>NIP</label>
                        <input class="form-control" type="text" name="nip" id="nip" value="{{ !empty($guru->nip)? $guru->nip : ''}}" placeholder="NIP">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label>Nama Lengkap<small>*</small></label>
                        <input class="form-control" type="text" name="nama" id="nama" value="{{ !empty($guru->nama)? $guru->nama : ''}}" placeholder="Nama Lengkap">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label>Tanggal Lahir <small>*</small></label>
                        <input class="form-control" type="text" name="tanggal_lahir" id="tanggal_lahir" value="{{ !empty($guru->tanggal_lahir)? $guru->tanggal_lahir : ''}}" placeholder="YYYY-MM-DD">
                    </div>
                    <div class="col-md-6">
                        <label>Foto <small>*</small></label>
                        <input class="form-control" type="text" name="foto" id="foto" value="{{ !empty($guru->foto)? $guru->foto : ''}}" placeholder="Upload Foto">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label>Alamat <small>*</small></label>
                        <input class="form-control" type="text" name="alamat" id="alamat" value="{{ !empty($guru->alamat)? $guru->alamat : ''}}" placeholder="Alamat">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label>Provinsi <small>*</small></label>
                        <select class="form-control" name="provinsi" id="provinsi">
                            <option value="">.:: Pilih ::.</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label>Kabupaten <small>*</small></label>
                        <select class="form-control" name="kabupaten" id="kabupaten">
                            <option value="">.:: Pilih ::.</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label>Kecamatan <small>*</small></label>
                        <select class="form-control" name="kecamatan" id="kecamatan">
                            <option value="">.:: Pilih ::.</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label>Desa/Kelurahan <small>*</small></label>
                        <select class="form-control" name="desa" id="desa">
                            <option value="">.:: Pilih ::.</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label>No. Telepon <small>*</small></label>
                        <input class="form-control" type="text" name="telepon" id="telepon" value="{{ !empty($guru->telepon)? $guru->telepon : ''}}" placeholder="No. Telepon">
                    </div>
                    <div class="col-md-6">
                        <label>Email <small>*</small></label>
                        <input class="form-control" type="text" name="email" id="email" value="{{ !empty($guru->email)? $guru->email : ''}}" placeholder="Email">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label>Tugas Utama <small>*</small></label>
                        <select class="form-control" name="tugas_utama" id="tugas_utama">
                            <option value="">.:: Pilih ::.</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label>Tugas Tambahan <small>*</small></label>
                        <select class="form-control" name="tugas_tambahan[]" id="tugas_tambahan">
                            <option value="">.:: Pilih ::.</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label>SUBMINKAL</label>
                        <input class="form-control" type="text" name="subminkal" id="subminkal" value="{{ !empty($guru->subminkal)? $guru->subminkal : ''}}" placeholder="SUBMINKAL">
                    </div>
                    <div class="col-md-6">
                        <label>TMTA Awal</label>
                        <input class="form-control" type="text" name="tmta" id="tmta" value="{{ !empty($guru->tmta)? $guru->tmta : ''}}" placeholder="TMTA Awal">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label>Nomor Induk Kependudukan (NIK) <small>*</small></label>
                        <input class="form-control" type="text" name="nik" id="nik" value="{{ !empty($guru->nik)? $guru->nik : ''}}" placeholder="Nomor Induk Kependidikan">
                    </div>
                    <div class="col-md-6">
                        <label>NIP <small>*</small></label>
                        <input class="form-control" type="text" name="nik" id="nik" value="{{ !empty($guru->nip)? $guru->nip : ''}}" placeholder="NIP">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label>Nomor Induk Kependudukan (NIK) <small>*</small></label>
                        <input class="form-control" type="text" name="nik" id="nik" value="{{ !empty($guru->nik)? $guru->nik : ''}}" placeholder="Nomor Induk Kependidikan">
                    </div>
                    <div class="col-md-6">
                        <label>NIP <small>*</small></label>
                        <input class="form-control" type="text" name="nik" id="nik" value="{{ !empty($guru->nip)? $guru->nip : ''}}" placeholder="NIP">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label>Nomor Induk Kependudukan (NIK) <small>*</small></label>
                        <input class="form-control" type="text" name="nik" id="nik" value="{{ !empty($guru->nik)? $guru->nik : ''}}" placeholder="Nomor Induk Kependidikan">
                    </div>
                    <div class="col-md-6">
                        <label>NIP <small>*</small></label>
                        <input class="form-control" type="text" name="nik" id="nik" value="{{ !empty($guru->nip)? $guru->nip : ''}}" placeholder="NIP">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('script')
<script src="{{ url('assets/plugins/jquery-knob/jquery.knob.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function () {
        $(".select-2").select2();
        $('#nip').keypress(function(e){
			var nip = $('#nip').val()
			var res = nip.toString().replace(/[^,\d]/g, "")
			$('#nip').val(res)
			if(e.which!=8 && isNaN(String.fromCharCode(e.which))){
				e.preventDefault()
				$('#errnip').html('Hanya angka').stop().show().fadeOut('slow')
				return false;
			}
		})
    });
    $('.datepicker').pickadate({
		selectMonths: true,
		selectYears: true
        // getFullYear: true
	})
    $('.single-select').select2({
		theme: 'bootstrap4',
		width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
		placeholder: $(this).data('placeholder'),
		allowClear: Boolean($(this).data('allow-clear')),
	})
    var status = '{{$page}}'
	$(()=>{
		if(status=='Tambah'){
			setProv()
		}else{
			var data = JSON.parse('{!!$data!!}')
			var provId=data.provinsi, kabId=data.kabupaten, kecId=data.kecamatan
			setProv(provId)
			setTimeout(()=>{
				setKab(provId,kabId)
			}, 200)
			setTimeout(()=>{
				setKec(kabId,kecId)
			}, 400)
		}
	})
    $('#provinsi').change(()=>{
		var id = $('#provinsi').val()
		setKab(id)
	})
	$('#kabupaten').change(()=>{
		var id = $('#kabupaten').val()
		setKec(id)
	})
	function setProv(param=''){
		$.post('{{route("getProv")}}').done((res)=>{
			if(res.success){
				var html = '<option value="first" selected disabled>--Pilih Provinsi--</option>'
				$.each(res.data,(i,val)=>{
					var selected = ''
					if(val.id==param){
						selected = 'selected'
					}
					html += `<option value="${val.id}" ${selected}>${val.nama}</option>`
				})
				$('#provinsi').html(html)
			}
		})
	}
	function setKab(id='',param=''){
		$.post('{{route("getKab")}}',{provinsiId:id}).done((res)=>{
			if(res.success){
				var html = '<option value="first" selected disabled>--Pilih Kabupaten/Kota--</option>'
				var kecamatan = '<option value="first" selected disabled>--Pilih Kecamatan--</option>'
				$.each(res.data,(i,val)=>{
					var selected = ''
					if(val.id==param){
						selected = 'selected'
					}
					html += `<option value="${val.id}" ${selected}>${val.nama}</option>`
					// res.data[i].text = res.data[i].nama
				})
				$('#kabupaten').html(html)
				$('#kecamatan').html(kecamatan)
			}
		})
	}
	function setKec(id='',param=''){
		$.post('{{route("getKec")}}',{kabupatenId:id}).done((res)=>{
			if(res.success){
				var html = '<option value="first" selected disabled>--Pilih Kecamatan--</option>'
				$.each(res.data,(i,val)=>{
					var selected = ''
					if(val.id==param){
						selected = 'selected'
					}
					html += `<option value="${val.id}" ${selected}>${val.nama}</option>`
				})
				$('#kecamatan').html(html)
			}
		})
	}
    $('.btnSimpan').click(()=>{
		var data = new FormData($('.formSave')[0])
		$('.btnSimpan').attr('disabled',true).html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>LOADING...')
		$.ajax({
			url: '{{route("saveLoker")}}',
			type: 'POST',
			data: data,
			async: true,
			cache: false,
			contentType: false,
			processData: false,
			success: function(data){
				if(data.code==201 || data.code==200){
					Swal.fire({
						icon: 'success',
						title: 'Berhasil',
						text: data.message,
						showConfirmButton: false,
						timer: 1200
					})
					setTimeout(()=>{
						$('#otherPage').fadeOut(()=>{
							$('#dataTable').DataTable().ajax.reload()
							hideForm()
						})
					}, 1100);
				}else{
					arr = []
					if(typeof(data.code) != 'undefined' && data.code !== null && data.code == 400){
						$.each(data.message,(i)=>{
							if(arr.length==0){
								arr.push(i)
							}
							return false
						})
						Swal.fire({
							icon: 'warning',
							title: 'Validasi gagal',
							text: data.message[arr],
							showConfirmButton: false,
							timer: 1300,
						})
					}else{
						Swal.fire({
							icon: 'warning',
							title: 'Whoops',
							text: data.message,
							showConfirmButton: false,
							timer: 1300,
						})
					}
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
    $('.btnKembali').click(()=>{
		$('.other-page').fadeOut(function(){
			hideForm()
		})
	})
</script>
@endpush
