<div class="modal fade" id="modalFormDialog" role="dialog">
	<div class="modal-dialog modal-lg">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header bg-card">
				<h5 class="text-card">{{$title}}</h5>
				<button type="button" class="btn button-custome btnCancel">&times;</button>
			</div>
			<div class="modal-body">
				<form id="saveForm">
					<input type="hidden" name="id" id="id" value="{{!empty($data)?$data->id_kelas:''}}">
					<div class="row mb-3">
						<div class="col-md-12">
                            <label>Pilih Kelas <small>*</small></label>
                            <select name="kelas" id="kelas" class="form-control">
                                <option value="">.:: Pilih ::.</option>
                                <option @if(!empty($data) && $data->kelas=='7') selected @endif value="7">Kelas 7</option>
                                <option @if(!empty($data) && $data->kelas=='8') selected @endif value="8">Kelas 8</option>
                                <option @if(!empty($data) && $data->kelas=='9') selected @endif value="9">Kelas 9</option>
                            </select>
						</div>
					</div>
                    <div class="row mb-3">
						<div class="col-md-12">
                            <label>Nama Kelas <small>*</small></label>
                            <input type="text" name="nama_kelas" id="nama_kelas" class="form-control" value="{{!empty($data)?$data->nama_kelas:''}}">
						</div>
					</div>
                    <div class="row">
						<div class="col-md-12">
                            <label>Guru Wali Kelas <small>*</small></label>
                            <select name="guru_id" id="guru_id" class="form-control">
                                <option value="">.:: Pilih ::.</option>
                                @if (count($guru)>0)
                                    @foreach ($guru as $v)
                                        <option @if(!empty($data) && $data->guru_id==$v->id_guru) selected @endif value="{{$v->id_guru}}">{{$v->nama}}</option>
                                    @endforeach
                                @endif
                            </select>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary btnCancel">KEMBALI</button>
                <button type="button" class="btn btn-sm button-custome btnSimpan">SIMPAN</button>
            </div>
		</div>

	</div>
</div> 
<script type="text/javascript">
    $('#modalFormDialog').modal('show');
    $('.btnSimpan').click(function (e) { 
        e.preventDefault();
        var kelas = $('#kelas').val();
        var nama = $('#nama_kelas').val();
        var guru = $('#guru_id').val();
        if(!kelas) {
            Swal.fire('Maaf!!', 'Kelas Wajib Diisi.', 'warning')
        } else if(!nama) {
            Swal.fire('Maaf!!', 'Nama Kelas Wajib Diisi.', 'warning')
        } else if(!guru) {
            Swal.fire('Maaf!!', 'Guru Wali Kelas Wajib Diisi.', 'warning')
        }else{
            var data = new FormData($('#saveForm')[0]);
            $.ajax({
                url: '{{route("saveKelas")}}',
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
        }
    });
    $('.btnCancel').click(()=>{
		$('#modalForm').fadeOut(function(){
			location.reload()
		})
	})
</script>