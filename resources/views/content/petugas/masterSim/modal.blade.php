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
					<input type="hidden" name="id" id="id" value="{{!empty($data)?$data->id_mst_sim:''}}">
                    <div class="row mb-3">
						<div class="col-md-12">
                            <label>Gambar <small>*</small></label>
                            <input type="file" name="gambar" id="gambar" class="form-control">
						</div>
					</div>
                    
                    <div class="row mb-3">
						<div class="col-md-12">
                            <label>Nama <small>*</small></label>
                            <input type="text" name="nama" id="nama" class="form-control" value="{{!empty($data)?$data->nama:''}}" autocomplete="off">
						</div>
					</div>
                    <div class="row mb-3">
						<div class="col-md-12">
                            <label>Link URL <small>*</small></label>
                            <input type="text" name="link_url" id="link_url" class="form-control" value="{{!empty($data)?$data->nama:''}}">
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
    $(document).ready(function () {
        $('#divGuru').hide();
    });
    $('.btnSimpan').click(function (e) { 
        e.preventDefault();
        var data = new FormData($('#saveForm')[0]);
            $.ajax({
                url: '{{route("saveMasterSim")}}',
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
                        alert_validation(data.message)
                    }
                    // $('.btnSimpan').attr('disabled',false).html('SIMPAN')
                }
            }).fail(()=>{
                Swal.fire({
                    icon: 'error',
                    title: 'Whoops..',
                    text: 'Terjadi kesalahan silahkan ulangi kembali',
                    showConfirmButton: false,
                    timer: 1300,
                })
                // $('.btnSimpan').attr('disabled',false).html('SIMPAN')
            })
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
    $('#level').change(function (e) { 
        e.preventDefault();
        var level = $('#level').val();
        if (level==3) {
            $('#divGuru').show();
        } else {
            $('#divGuru').hide();
        }
    });
    $('.btnCancel').click(()=>{
		$('#modalForm').fadeOut(function(){
			location.reload()
		})
	})
</script>