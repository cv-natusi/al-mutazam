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
                            <label>Kode Tugas <small>*</small></label>
                            <input type="text" class="form-control" autocomplete="off" name="kode_tugas" id="kode_tugas" value="{{!empty($data->kode_tugas)?$data->kode_tugas:''}}">
                        </div>
                        <div class="col-md-6">
                            <label>Nama Tugas <small>*</small></label>
                            <input autocomplete="off" class="form-control" type="text" name="nama_tugas" id="nama_tugas" value="{{ !empty($data->nama_tugas)? $data->namakelas : ''}}" placeholder="Nama Kelas">
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <button type="button" class="btn btn-sm btn-success btnSimpan">Simpan</button>
                <button type="button" class="btn btn-sm btn-secondary btnCancel">Kembali</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('.btnSimpan').click(()=>{
		var data = new FormData($('.formSave')[0])
		var kode = $('#kode_tugas').val();
        var nama = $('#nama_tugas').val();
        if(!kode){
            Swal.fire({
                icon: 'warning',
                title: 'Whoops',
                text: 'Kode Tugas Wajib Diisi!',
                showConfirmButton: false,
                timer: 1300,
            })
        }else if(!nama){
            Swal.fire({
                icon: 'warning',
                title: 'Whoops',
                text: 'Nama Tugas Wajib Diisi!',
                showConfirmButton: false,
                timer: 1300,
            })
        }else{
            $('.btnSimpan').attr('disabled',true).html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>LOADING...')
            $.ajax({
                url: '{{route("saveTugasPegawai")}}',
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
        }
	})
    $('.btnCancel').click(()=>{
		$('.other-page').fadeOut(function(){
			hideForm()
		})
	})
</script>
