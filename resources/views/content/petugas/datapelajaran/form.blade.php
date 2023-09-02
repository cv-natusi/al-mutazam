<div class="row">
    <div class="col-md-12">
        <div class="card" style="width: 100%; background-color:#ffffff">
            <div class="card-header">	
                <h5>{{$title}}</h5>
            </div>
            <div class="card-body">
                <form class="row mb-3 formSave">
                    <div class="row mb-3">
                        <input type="hidden" name="id" id="id" value="{{!empty($data->id_tugas_pegawai)?$data->id_tugas_pegawai:''}}">
                        <div class="col-md-6">
                            <label>Nama Mata Pelajaran <small>*</small></label>
                            <input type="text" class="form-control" autocomplete="off" name="nama_mapel" id="nama_mapel" value="{{!empty($data->nama_mapel)?$data->kode_tugas:''}}">
                        </div>
                        <div class="col-md-2">
                            <label>Kelas <small>*</small></label>
                            <select name="kelas_id" id="kelas_id" class="form-control singleSelect">
                                <option value="">.:: Pilih ::.</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label>TA <small>*</small></label>
                            <select name="ta" id="ta" class="form-control singleSelect">
                                <option value="">.:: Pilih ::.</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label>Semester <small>*</small></label>
                            <select name="semester" id="semester" class="form-control singleSelect">
                                <option value="">.:: Pilih ::.</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label>Guru Pengajar <small>*</small></label>
                            <select name="guru_id" id="guru_id" class="form-control multiSelect">
                                <option value="">.:: Pilih ::.</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <button type="button" class="btn btn-sm btn-success" id="btnSimpan">Simpan</button>
                <button type="button" class="btn btn-sm btn-secondary btnCancel">Kembali</button>
            </div>
        </div>
    </div>
</div>

@push('script')
<script type="text/javascript">
    $('#btnSimpan').click(()=>{
        alert('test')
		var data = new FormData($('.formSave')[0])
		$('#btnSimpan').attr('disabled',true).html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>LOADING...')
		var kode = $('#kode_tugas').val();
        var nama = $('#nama_tugas').val();
        if(!kode){
            Swal.fire({
                icon: 'warning',
                title: 'Whoops',
                text: 'Kode Tugas Wajin Diisi!',
                showConfirmButton: false,
                timer: 1300,
            })
        }elseif(!nama){
            Swal.fire({
                icon: 'warning',
                title: 'Whoops',
                text: 'Nama Tugas Wajin Diisi!',
                showConfirmButton: false,
                timer: 1300,
            })
        }else{
            $.ajax({
                url: '{{route("saveDataPelajaran")}}',
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
                            $('#otherPage').fadeOut(()=>{
                                $('#dataTable').DataTable().ajax.reload()
                                hideForm()
                            })
                        }, 1100);
                    }else{
                        Swal.fire({
                            icon: 'warning',
                            title: 'Whoops',
                            text: data.message,
                            showConfirmButton: false,
                            timer: 1300,
                        })
                    }
                    $('#btnSimpan').attr('disabled',false).html('SIMPAN')
                }
            }).fail(()=>{
                Swal.fire({
                    icon: 'error',
                    title: 'Whoops..',
                    text: 'Terjadi kesalahan silahkan ulangi kembali',
                    showConfirmButton: false,
                    timer: 1300,
                })
                $('#btnSimpan').attr('disabled',false).html('SIMPAN')
            })
        }
	})
    $('.btnCancel').click(()=>{
		$('.other-page').fadeOut(function(){
			hideForm()
		})
	})
</script>
@endpush
