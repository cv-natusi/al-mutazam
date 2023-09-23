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
                            <label>Nama Berkas <small>*</small></label>
                            <input type="text" name="nama_berkas" id="nama_berkas" class="form-control" value="{{!empty($data)?$data->nama_berkas:''}}">
						</div>
					</div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label>Guru <small>*</small></label>
                    <select name="guru_id" id="guru_id" class="form-control multiSelect">
                        <option value="">.:: Pilih ::.</option>
                        @foreach ($guru as $g)
                                <option @if(!empty($data) && $data->guru_id==$g->id_guru) selected @endif value="{{$g->id_guru}}">({{$g->nip}}) {{$g->nama}}</option>
                            @endforeach
                    </select>
                        </div>
                    </div>
                    <div class="row mb-3">
						<div class="col-md-12">
                            <label>Keterangan <small>*</small></label>
                            <input type="text" name="keterangan" id="keterangan" class="form-control" value="{{!empty($data)?$data->keterangan:''}}">
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
        var guru = $('#guru_id').find(":selected").val();
        console.log(guru);
        if(!nama) {
            Swal.fire('Maaf!!', 'Nama Berkas Wajib Diisi.', 'warning')
        } else if(!keterangan) {
            Swal.fire('Maaf!!', 'Keterangan Kelas Wajib Diisi.', 'warning')
        } else if(!guru) {
            Swal.fire('Maaf!!', 'Guru Wajib Diisi.', 'warning')
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
    // $('#guru_id').select2({
    //     width: "resolve",
    //     ajax: {
    //         url: "{{ route('findGuru') }}",
    //         dataType: 'json',
    //         type: 'POST',
    //         delay: 250,
    //         data: function(params) {
    //             var query = {
    //                 q: params.term,
    //             }
    //             return query;
    //         },
    //         processResults: function(data) {
    //             return {
    //                 results: $.map(data, function(item) {
    //                     return {
    //                         text: '(' + item.nip + ') ' + item.nama_guru,
    //                         id: item.id_guru,
    //                     }
    //                 })
    //             };
    //         },
    //         cache: true,
    //     }
    // });
    $('.btnCancel').click(()=>{
		$('#modalForm').fadeOut(function(){
			location.reload()
		})
	})
  
</script>