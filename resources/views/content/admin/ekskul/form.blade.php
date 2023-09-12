<div class="card">
    <div class="card-header bg-card">
        <h5 class="text-card">{{!empty($data)?'Edit':'Tambah'}} Ekstrakurikuler</h5>
    </div>
    <div class="card-body">
        <form class="formSave">
            <input type="hidden" name="id" id="id" value="{{!empty($data)?$data->id_exkul:''}}">
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="">Nama Ekstrakurikuler</label>
                    <input type="text" id="nama_exkul" name="nama_exkul" class="form-control" value="{{!empty($data)?$data->nama_exkul:''}}">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="">Deskripsi</label>
                    <textarea id="editor1" name="deskripsi" rows="40" cols="100" class="form-control">{{!empty($data->deskripsi)?$data->deskripsi:''}}</textarea>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="">Gambar Icon</label>
                    <input type="file" id="logo" name="logo" class="form-control upload" onchange="loadFilePhoto(event)">
                    <div class="clearfix" style="margin-bottom: 10px"></div>
                    @if(empty($data))
                    <img id="preview-photo" src="{!! url('uploads/default.jpg') !!}" class="img-polaroid" width="200">
                    @else
                    <img id="preview-photo" src="{!! url('uploads/exkul/'.$data->foto) !!}" class="img-polaroid" width="200">
                    @endif
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="">Status</label><br>
                    <?php
                    $aktif = [];
                    if (!empty($data)) {
                        if($data->status_exkul=='1'){
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

    function loadFilePhoto(event) {
        var image = URL.createObjectURL(event.target.files[0]);
            $('#preview-photo').fadeOut(function(){
                $(this).attr('src', image).fadeIn().css({
                    '-webkit-animation' : 'showSlowlyElement 700ms',
                    'animation'         : 'showSlowlyElement 700ms'
                });
            });
    };
    var editor = CKEDITOR.replace('editor1', {
		// uiColor: '#CCEAEE'
		toolbarCanCollapse:false,
	});

    $('.btnSimpan').click(()=>{
        var id = $('#id').val();
        var nama = $('#nama_exkul').val();
        var status =  $('#status').val();
        var foto = $('#logo').val();
        var data = new FormData($('.formSave')[0])
        var isi = CKEDITOR.instances.editor1.getData();
            data.append('deskripsi',isi);
        if (!nama) {
            Swal.fire({
                icon: 'error',
                title: 'Whoops..',
                text: 'Nama Wajib Diisi',
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
        } else if (!id && !foto) {
            Swal.fire({
                icon: 'error',
                title: 'Whoops..',
                text: 'Gambar Icon Wajib Diisi',
                showConfirmButton: false,
                timer: 1300,
            })
        } else if (!isi) {
            Swal.fire({
                icon: 'error',
                title: 'Whoops..',
                text: 'Deskripsi Wajib Diisi',
                showConfirmButton: false,
                timer: 1300,
            })
        } else {
            $('.btnSimpan').attr('disabled',true).html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>LOADING...')
            $.ajax({
                url: '{{route("sekolah.ekskul.saveExkul")}}',
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