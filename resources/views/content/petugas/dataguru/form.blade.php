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
                <form class="row mb-3 formSave">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label>Nomor Induk Kependudukan (NIK) <small>*</small></label>
                            <input autocomplete="off" type="text" name="nik" class="form-control" maxlength="16" pattern="/^-?\d+\.?\d*$/" placeholder="000000000000" autocomplete="off" value="{{ !empty($data) ? $data->nik : ''}}" required>
                            <div id="errKtp"></div>
                        </div>
                        <div class="col-md-6">
                            <label>NIP</label>
                            <input autocomplete="off" class="form-control" type="text" name="nip" id="nip" value="{{ !empty($data->nip)? $data->nip : ''}}" placeholder="NIP">
                            <div id="errnip"></div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label>Nama Lengkap<small>*</small></label>
                            <input autocomplete="off" class="form-control" type="text" name="nama" id="nama" value="{{ !empty($data->nama)? $data->nama : ''}}" placeholder="Nama Lengkap" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
							<label>Tanggal Lahir <small>*</small></label>
                            <input autocomplete="off" type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="00-00-0000" value="{{isset($data->tanggal_lahir) ? date("Y-m-d",strtotime($data->tanggal_lahir)):''}}" required>
                        </div>
                        <div class="col-md-6">
                            <label>Foto</label>
                            <input class="form-control" type="file" name="foto" id="foto" value="{{ !empty($data->foto)? $data->foto : ''}}" placeholder="Upload Foto">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label>Alamat <small>*</small></label>
                            <input autocomplete="off" class="form-control" type="text" name="alamat" id="alamat" value="{{ !empty($data->alamat)? $data->alamat : ''}}" placeholder="Alamat" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label>Provinsi <small>*</small></label>
                            <select class="form-control select-2" name="provinsi_id" id="provinsi" required>
                                <option value="">.:: Pilih ::.</option>
								@if (!empty($prov))
									@foreach ($provinsi as $row)
										<option @if ($prov==$row->name) selected @endif value="{{$row->id}}">{{$row->name}}</option>
									@endforeach
								@else
									@foreach ($data_provinsi as $row)
										<option value="{{$row->id}}">{{$row->name}}</option>
									@endforeach
								@endif
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Kabupaten <small>*</small></label>
                            <select class="form-control select-2" name="kabupaten_id" id="kabupaten" required>
                                <option value="">.:: Pilih ::.</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label>Kecamatan <small>*</small></label>
                            <select class="form-control select-2" name="kecamatan_id" id="kecamatan" required>
                                <option value="">.:: Pilih ::.</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Desa/Kelurahan <small>*</small></label>
                            <select class="form-control select-2" name="desa_id" id="desa" required>
                                <option value="">.:: Pilih ::.</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label>No. Telepon <small>*</small></label>
                            <input autocomplete="off" class="form-control" type="text" name="telepon" id="telepon" value="{{ !empty($data->telepon)? $data->telepon : ''}}" placeholder="No. Telepon" required>
                        </div>
                        <div class="col-md-6">
                            <label>Email <small>*</small></label>
                            <input autocomplete="off" class="form-control" type="text" name="email" id="email" value="{{ !empty($data->email)? $data->email : ''}}" placeholder="Email">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label>Tugas Utama <small>*</small></label>
                            <select class="form-control" name="tugas_utama" id="tugas_utama" required>
                                <option value="">.:: Pilih ::.</option>
                                @if (count($tugas)>0)
                                    @foreach ($tugas as $item)
                                        <option value="{{$item->id_tugas_pegawai}}">{{$item->nama_tugas}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Tugas Tambahan</label>
                            <select class="form-control" name="tugas_tambahan[]" id="tugas_tambahan" multiple>
                                <option value="">.:: Pilih ::.</option>
                                @if (count($tugas)>0)
                                    @foreach ($tugas as $i)
                                        <option value="{{$i->id_tugas_pegawai}}">{{$i->nama_tugas}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label>SUBMINKAL</label>
                            <input autocomplete="off" class="form-control" type="text" name="subminkal" id="subminkal" value="{{ !empty($data->subminkal)? $data->subminkal : ''}}" placeholder="SUBMINKAL">
                        </div>
                        <div class="col-md-6">
                            <label>TMTA Awal</label>
                            <input autocomplete="off" class="form-control" type="text" name="tmta" id="tmta" value="{{ !empty($data->tmta)? $data->tmta : ''}}" placeholder="TMTA Awal">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label>Status Guru <small>*</small></label>
                            <div>
                                <input type="radio" id="status_guru" name="status_guru" value="aktif" checked />
                                <label>Aktif</label>
                                &nbsp;&nbsp;&nbsp;
                                <input type="radio" id="status_guru" name="status_guru" value="Tidak Aktif" />
                                <label>Tidak Aktif</label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <button class="btn btn-success btnSimpan" type="button">Simpan</button>
                <button class="btn btn-secondary btnCancel" type="button">Kembali</button>
            </div>
        </div>
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
				$('#errnip').html('Hanya angka').stop().show().fadeOut('slow')
				return false;
			}
		})
        $('#provinsi').select2();
		$('#kabupaten').select2();
		$('#kecamatan').select2();
		$('#desa').select2();
        $('#tugas_utama').select2();
        $('#tugas_tambahan').select2();

		loadDaerah();

		$('#provinsi').change(function(){
			var id = $('#provinsi').val();
			$.post("{{route('get_kabupaten')}}",{id:id},function(data){
				var kabupaten = '<option value="">..:: Pilih ::..</option>';
				if(data.status=='success'){
					if(data.data.length>0){
						$.each(data.data,function(v,k){
							kabupaten+='<option value="'+k.id+'">'+k.name+'</option>';
						});
					}
				}
				$('#kabupaten').html(kabupaten);
			});
		});

		$('#kabupaten').change(function(){
			var id = $('#kabupaten').val();
			$.post("{{route('get_kecamatan')}}",{id:id},function(data){
				var kecamatan = '<option value="">..:: Pilih ::..</option>';
				if(data.status=='success'){
					if(data.data.length>0){
						$.each(data.data,function(v,k){
							kecamatan+='<option value="'+k.id+'">'+k.name+'</option>';
						});
					}
				}
				$('#kecamatan').html(kecamatan);
			});
		});

		$('#kecamatan').change(function(){
			var id = $('#kecamatan').val();
			$.post("{{route('get_desa')}}",{id:id},function(data){
				var desa = '<option value="">..:: Pilih ::..</option>';
				if(data.status=='success'){
					if(data.data.length>0){
						$.each(data.data,function(v,k){
							desa+='<option value="'+k.id+'">'+k.name+'</option>';
						});
					}
				}
				$('#desa').html(desa);
			});
		});
	});
    $('.btnSimpan').click(()=>{
		var data = new FormData($('.formSave')[0])
		$('.btnSimpan').attr('disabled',true).html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>LOADING...')
        $.ajax({
            url: '{{route("saveGuru")}}',
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
	function loadDaerah(kab='',kec='',kel='') {
		var id = $('#provinsi').val();
		// SELECTED KABUPATEN
		var selectedkab = "{{ !empty($kab) ? $kab:'' }}";
		setTimeout(()=>{
			if(kab=='-'){
				selectedkab = ''
			}else if(kab){
				selectedkab = kab
			}
            $.post("{{route('get_kabupaten')}}",{id:id},(data)=>{
                var kabupaten = '<option value="first">..:: Pilih ::..</option>';
                if(data.status=='success'){
                    if(data.data.length>0){
                        $.each(data.data,function(v,k){
                            kabupaten+='<option value="'+k.id+'">'+k.name+'</option>';
                        });
                    }

                    $('#kabupaten').html(kabupaten);
                    $('#kabupaten').val((selectedkab?selectedkab:'first')).trigger('change');
                }
            });
		},200)
		var selectedkec = "{{ !empty($kec) ? $kec:'' }}";
		setTimeout(() => {
			// SELECTED KECAMATAN
			if(kec=='-'){
				selectedkec = ''
			}else if(kec){
				selectedkec = kec
			}
            $.post("{{route('get_kecamatan')}}",{id:selectedkab},(data)=>{
                var kecamatan = '<option value="first">..:: Pilih ::..</option>';
                if(data.status=='success'){
                    if(data.data.length>0){
                        $.each(data.data,function(v,k){
                            kecamatan+='<option value="'+k.id+'">'+k.name+'</option>';
                        });
                    }
                }

                $('#kecamatan').html(kecamatan);
                $('#kecamatan').val((selectedkec?selectedkec:'first')).trigger('change');
            });
		}, 600);
		var selectedkel = "{{ !empty($kel) ? $kel:'' }}";
		setTimeout(() => {
			// SELECTED DESA/KELURAHAN
			if(kel=='-'){
				selectedkel = ''
			}else if(kel){
				selectedkel = kel
			}
            $.post("{{route('get_desa')}}",{id:selectedkec},function(data){
                var desa = '<option value="first">..:: Pilih ::..</option>';
                if(data.status=='success'){
                    if(data.data.length>0){
                        $.each(data.data,function(v,k){
                            desa+='<option value="'+k.id+'">'+k.name+'</option>';
                        });
                    }
                }

                $('#desa').html(desa);
                $('#desa').val((selectedkel?selectedkel:'first')).trigger('change');
            });
		}, 1200);
	}
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
