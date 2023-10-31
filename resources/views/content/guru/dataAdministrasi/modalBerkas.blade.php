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
					<input type="hidden" name="id" id="id" value="{{!empty($data)?$data->id_administrasi:''}}">
                    <div class="row mb-3">
						<div class="col-md-12">
                            <label>Upload File <small>*</small></label>
                            <input type="file" name="file" id="file" class="form-control">
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
        var idAdministrasi = $('#id').val();
        var file = $('#file').val();
        if(!idAdministrasi && !file) {
            Swal.fire('Maaf!!', 'Upload File Wajib Diisi.', 'warning')
        } else{
            var data = new FormData($('#saveForm')[0]);
            $.ajax({
                url: '{{route("uploadBerkasGuru")}}',
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
                    }else if(data.code==403){
                        alert_validation(data.message);
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
    $('.btnCancel').click(()=>{
		$('#modalForm').fadeOut(function(){
			location.reload()
		})
	})
</script>