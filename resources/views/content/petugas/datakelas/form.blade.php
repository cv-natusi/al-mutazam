<div class="row">
    <div class="col-md-12">
        <div class="card" style="width: 100%; background-color:#ffffff">
            <div class="card-header">	
                <h5>{{$title}}</h5>
            </div>
            <div class="card-body">
                <form class="row mb-3 formSave">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label>Kelas <small>*</small></label>
                            <select name="kelas" id="kelas" class="form-control singleSelect">
                                <option value="">.:: Pilih ::.</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>Nama Kelas <small>*</small></label>
                            <input autocomplete="off" class="form-control" type="text" name="namakelas" id="namakelas" value="{{ !empty($data->namakelas)? $data->namakelas : ''}}" placeholder="Nama Kelas">
                        </div>
                        <div class="col-md-4">
                            <label>Kode Kelas <small>*</small></label>
                            <input autocomplete="off" class="form-control" type="text" name="kodekelas" id="kodekelas" value="{{ !empty($data->kodekelas)? $data->kodekelas : ''}}" placeholder="Kode Kelas">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label>Guru Wali Kelas <small>*</small></label>
                            <select name="id_guru" id="id_guru" class="form-control singleSelect">
                                <option value="">.:: Pilih ::.</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <button class="btn btn-success btnSimpan">Simpan</button>
                <button class="btn btn-secondary btnCancel">Kembali</button>
            </div>
        </div>
    </div>
</div>

@push('script')
<script>
    $(document).ready(function () {
        $(".singleSelect").select2();
    });
    $('.btnSimpan').click(()=>{
		var data = new FormData($('.formSave')[0])
		$('.btnSimpan').attr('disabled',true).html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>LOADING...')
		$.ajax({
			url: '{{route("saveKelas")}}',
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
    $('.btnCancel').click(()=>{
		$('.other-page').fadeOut(function(){
			hideForm()
		})
	})
</script>
@endpush
