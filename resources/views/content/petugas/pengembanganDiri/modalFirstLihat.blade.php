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
					<input type="hidden" name="id" id="id" value="{{!empty($data)?$data->id_pengembangan_diri:''}}">
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
                                        <td>Nama Kegiatan</td>
                                        <td>Tgl Mulai</td>
                                        <td>Tgl Selesai</td>
                                        <td class="text-center">Verifikasi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>{{$data->nama_kegiatan}}</td>
                                        <td>{{$data->tgl_mulai}}</td>
                                        <td>{{$data->tgl_selesai}}</td>
                                        <td class="text-center">
                                            <button class="btn btn-primary" type="button" onclick="verifikasi({{$data->id_pengembangan_diri}})">
                                                <i class='bx bxs-check-square'></i>
                                            </button>
                                            <button class="btn btn-danger" type="button" onclick="tolak({{$data->id_pengembangan_diri}})">
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
            </div>
		</div>

	</div>
</div> 
<script type="text/javascript">
    $('#modalFormDialog').modal('show');
    $('.btnCancel').click(()=>{
		$('#modalForm').fadeOut(function(){
			location.reload()
		})
	})
</script>