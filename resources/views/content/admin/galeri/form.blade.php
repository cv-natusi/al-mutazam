<div class="card">
    <div class="card-header bg-card">
        <h5 class="text-card">{{!empty($data)?'Edit':'Tambah'}} Galeri</h5>
    </div>
    <div class="card-body">
        <form class="formSave">
            <input type="hidden" name="id" id="id" value="{{!empty($data)?$data->id_galeri:''}}">
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="">Kategori</label><br>
                    <?php
                    $aktif = [];
                    if (!empty($data)) {
                        if($data->kategori_galeri=='1'){
                            $aktif = ['checked',''];
                        }else{
                            $aktif = ['','checked'];
                        }
                    }
                    ?>
                    <input type="radio" name="kategori" value='1' {{!empty($data)?$aktif[0]:''}}><label style='margin-right:10px;font-weight:normal'> Upload</label>
                    <input type="radio" name="kategori" value='0' {{!empty($data)?$aktif[1]:''}}><label style='font-weight:normal'> Instagram</label>
                </div>
            </div>
            <div class="row mb-3" id="rowUpload">
                <div class="col-md-12 ">
                    <label>Upload Foto</label>
                    <input type="file" name="file" class="form-control"
                </div>
            </div>
            <div class="row mb-3" id="rowInstagram">
                <div class="col-md-12">
                    <label>Embed Instagram</label>
                    <textarea name="file" class="form-control"></textarea>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" class="form-control">{{!empty($data->deskripsi_galeri)?$data->deskripsi_galeri:''}}</textarea>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="">Status</label><br>
                    <?php
                    $aktif = [];
                    if (!empty($data)) {
                        if($data->status_galeri=='1'){
                            $aktif = ['checked',''];
                        }else{
                            $aktif = ['','checked'];
                        }
                    }
                    ?>
                    <input type="radio" name="status" value='1' {{!empty($data)?$aktif[0]:''}}><label style='margin-right:10px;font-weight:normal'> Aktif</label>
                    <input type="radio" name="status" value='0' {{!empty($data)?$aktif[1]:''}}><label style='font-weight:normal'> Tidak Aktif</label>
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
    $(document).ready(function () {
        $("input[name='kategori']").change(function() {
            if ($(this).val() === "0") {
                $('#rowInstagram').show();
                $('#rowUpload').hide();
            } else if ($(this).val() === "1") {
                $('#rowUpload').show();
                $('#rowInstagram').hide();
            }
        });
    });
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
                url: '{{route("media.galeri.SaveGaleri")}}',
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