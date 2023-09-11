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
                    <div class="row">
						<div class="col-md-3">
                            <p>Nama Guru</p>
						</div>
                        <div class="col-md-9">
                            <p>: {{$guru->nama}}</p>
                        </div>
					</div>
                    <div class="row">
						<div class="col-md-3">
                            <p>NIP</p>
						</div>
                        <div class="col-md-9">
                            <p>: {{$guru->nip}}</p>
                        </div>
					</div>
                    <div class="row">
                        <hr>
                    </div>
                    <div class="row mb-3">
                        <div class="table-responsive">
                            <table id="tableLihat" class="table table-striped table-bordered" width="100%">
                                <thead>
                                    <tr>
                                        <td>No</td>
                                        <td>Nama Berkas</td>
                                        <td>File Berkas</td>
                                        <td class="text-center">Verifikasi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>{{$data->nama_berkas}}</td>
                                        <td>{{$data->file}}</td>
                                        <td class="text-center">
                                            <button class="btn btn-primary" type="button" onclick="verifikasi({{$data->id_administrasi}})">
                                                <i class='bx bxs-check-square'></i>
                                            </button>
                                            <button class="btn btn-danger" type="button" onclick="tolak({{$data->id_administrasi}})">
                                                <i class='bx bxs-x-square'></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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
        var nama = $('#nama_berkas').val();
        var keterangan = $('#keterangan').val();
        var file = $('#file').val();
        if(!nama) {
            Swal.fire('Maaf!!', 'Nama Berkas Wajib Diisi.', 'warning')
        } else if(!keterangan) {
            Swal.fire('Maaf!!', 'Keterangan Kelas Wajib Diisi.', 'warning')
        } else if(!idAdministrasi && !file) {
            Swal.fire('Maaf!!', 'Upload File Wajib Diisi.', 'warning')
        } else{
            var data = new FormData($('#saveForm')[0]);
            $.ajax({
                url: '{{route("saveAdministrasi")}}',
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