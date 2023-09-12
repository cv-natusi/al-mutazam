<div class="card">
    <div class="card-header bg-card">
        <h5 class="text-card">{{!empty($data)?'Edit':'Tambah'}} AMTV</h5>
    </div>
    <div class="card-body">
        <form class="formSave">
            <input type="hidden" name="id" id="id" value="{{!empty($data)?$data->id_amtv:''}}">
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="">Judul</label>
                    <input type="text" id="judul" name="judul" class="form-control" value="{{!empty($data)?$data->judul_amtv:''}}">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="">Link Youtube</label>
                    <input id="link" name="link" class="form-control" value="{{!empty($data)?$data->file:''}}">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="">Status</label><br>
                    <?php
                    $aktif = [];
                    if (!empty($data)) {
                        if($data->status_amtv=='1'){
                            $aktif = ['checked',''];
                        }else{
                            $aktif = ['','checked'];
                        }
                    }
                    ?>
                    <input type="radio" id="status" name="status" value='1' {{!empty($data)?$aktif[0]:''}} required="required" id='ya'><label for='ya' style='margin-right:10px;font-weight:normal'>Aktif</label>
                    <input type="radio" id="status" name="status" value='0' {{!empty($data)?$aktif[1]:''}} required="required" id='tidak'><label for='tidak' style='font-weight:normal'>Tidak Aktif</label>
                </div>
            </div>
        </form>
    </div>
    <div class="card-footer">
        <button type="button" class="btn btn-warning btn-cancel">KEMBALI</button>
        <button type="button" class="btn btn-primary btnSimpan">SIMPAN</button>
    </div>
</div>
<script type="text/javascript">
	$('.btn-cancel').click(function(e){
    	e.preventDefault();
    	$('.other-page').fadeOut(function(){
    		$('.other-page').empty();
            $('.main-layer').fadeIn();
        });
    });
    $('.btnSimpan').click(()=>{
        var judul = $('#judul').val();
        var link =  $('#link').val();
        var status = $('#status').val();
        var data = new FormData($('.formSave')[0])
        if (!judul) {
            Swal.fire({
                icon: 'error',
                title: 'Whoops..',
                text: 'Judul Wajib Diisi',
                showConfirmButton: false,
                timer: 1300,
            })
        } else if (!link) {
            Swal.fire({
                icon: 'error',
                title: 'Whoops..',
                text: 'Link Youtube Wajib Diisi',
                showConfirmButton: false,
                timer: 1300,
            })
        } else if (!status) {
            Swal.fire({
                icon: 'error',
                title: 'Whoops..',
                text: 'Status Wajib Diisi',
                showConfirmButton: false,
                timer: 1300,
            })
        } else {
            $('.btnSimpan').attr('disabled',true).html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>LOADING...')
            $.ajax({
                url: '{{route("media.amtv.saveAmtv")}}',
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
                                location.reload()
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
</script>