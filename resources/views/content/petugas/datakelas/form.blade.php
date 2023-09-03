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
                            <select name="kelas" id="kelas" class="form-control">
                                <option value="">.:: Pilih ::.</option>
								<option value="1">KELAS I</option>
								<option value="2">KELAS II</option>
								<option value="3">KELAS III</option>
								<option value="4">KELAS IV</option>
								<option value="5">KELAS V</option>
								<option value="6">KELAS VI</option>
								<option value="7">KELAS VII</option>
								<option value="8">KELAS VIII</option>
								<option value="9">KELAS IX</option>
								<option value="10">KELAS X</option>
								<option value="11">KELAS XI</option>
								<option value="12">KELAS XII</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>Nama Kelas <small>*</small></label>
                            <input autocomplete="off" class="form-control" type="text" name="nama_kelas" id="nama_kelas" value="{{ !empty($data->namakelas)? $data->namakelas : ''}}" placeholder="Nama Kelas">
                        </div>
                        <div class="col-md-4">
                            <label>Kode Kelas <small>*</small></label>
                            <input autocomplete="off" class="form-control" type="text" name="kode_kelas" id="kode_kelas" value="{{ !empty($data->kodekelas)? $data->kodekelas : ''}}" placeholder="Kode Kelas">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label>Guru Wali Kelas <small>*</small></label>
                            <select name="guru_id" id="guru" class="form-control">
                                <option value="">.:: Pilih ::.</option>
								@if (count($guru)>0)
									@foreach ($guru as $g)
										<option @if(!empty($data)&&$data->guru_id==$g->id_guru) selected @endif value="{{$g->id_guru}}">{{$g->nama}}</option>
									@endforeach
								@endif
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <button class="btn btn-success btnSimpan" type="button">Simpan</button>
                <button class="btn btn-secondary btnCancel" type="button">Kembali</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#kelas').select2();
		$('#guru').select2();
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
	})
    $('.btnCancel').click(()=>{
		$('.other-page').fadeOut(function(){
			hideForm()
		})
	})
</script>
