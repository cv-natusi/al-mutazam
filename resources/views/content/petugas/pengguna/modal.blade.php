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
					<input type="hidden" name="id" id="id" value="{{!empty($data)?$data->id:''}}">
                    <div class="row mb-3">
						<div class="col-md-12">
                            <label>Sebagai <small>*</small></label>
                            <select name="level" id="level" class="form-control">
                                <option value="">.:: Pilih ::.</option>
                                <option @if(!empty($data)&&$data->level=='2') selected @endif value="2">Petugas Madrasah</option>
                                <option @if(!empty($data)&&$data->level=='3') selected @endif value="3">Guru</option>
                            </select>
						</div>
					</div>
                    <div class="row mb-3" id="divGuru">
						<div class="col-md-12">
                            <label>Pilih Guru <small>*</small></label>
                            <select name="guru_id" id="guru_id" class="form-control">
                                <option value="">.:: Pilih ::.</option>
                                @if (count($guru)>0)
                                    @foreach ($guru as $gu)
                                    <option @if(!empty($data)&&$gu->id_guru==$data->guru_id) selected @endif value="{{$gu->id_guru}}">{{$gu->nama}}</option>
                                    @endforeach
                                @endif
                            </select>
						</div>
					</div>
                    <div class="row mb-3">
						<div class="col-md-12">
                            <label>Username <small>*</small></label>
                            <input type="text" name="email" id="email" class="form-control" value="{{!empty($data)?$data->email:''}}" autocomplete="off">
						</div>
					</div>
                    <div class="row mb-3">
						<div class="col-md-12">
                            <label>Password <small>*</small></label>
                            <input type="text" name="password" id="password" class="form-control" autocomplete="off">
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
        var level = $('#level').val();
        var guruId = $('#guru_id').val();
        var username = $('#email').val();
        var password = $('#password').val();
        if(!level) {
            Swal.fire('Maaf!!', 'Pilih Sebagai Wajib Diisi.', 'warning')
        } else if(!username) {
            Swal.fire('Maaf!!', 'Username Wajib Diisi.', 'warning')
        } else if(!password) {
            Swal.fire('Maaf!!', 'Password Wajib Diisi.', 'warning')
        } else if(level=='3' && !guruId) {
            Swal.fire('Maaf!!', 'Pilih Guru Wajib Diisi.', 'warning')
        } else{
            var data = new FormData($('#saveForm')[0]);
            $.ajax({
                url: '{{route("savePengguna")}}',
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