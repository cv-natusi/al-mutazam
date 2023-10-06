<div class="card">
    <div class="card-header bg-card">
        <h5 class="text-card">{{!empty($data)?'Edit':'Tambah'}} {{ $title }}</h5>
    </div>
    <div class="card-body">
        <form class="formSave">
            <input type="hidden" name="id" id="id" value="{{!empty($data)?$data->id_berita:''}}">
            <input type="hidden" name="kategori" id="kategori" value="{{!empty($kategori)?$kategori:''}}">
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="">Judul</label>
                    <input type="text" id="judul" name="judul" class="form-control" value="{{!empty($data)?$data->judul:''}}">
                </div>
            </div>
            @if ($kategori=='2')
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="">Tanggal Acara</label>
                    <input type="date" id="tanggal_acara" name="tanggal_acara" class="form-control" value="{{!empty($data)?date('Y-m-d',strtotime($data->tanggal_acara)):''}}">
                </div>
            </div>
            @endif
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="">Isi Prestasi Siswa</label>
                    <textarea id="editor1" name="isi" rows="40" cols="100" class="form-control">{{!empty($data->isi)?$data->isi:''}}</textarea>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="">Gambar</label>
                    <input type="file" id="gambar" name="gambar" class="form-control upload" onchange="loadFilePhoto(event)">
                    <div class="clearfix" style="margin-bottom: 10px"></div>
                    @if(empty($data))
                    <img id="preview-photo" src="{!! url('uploads/default.jpg') !!}" class="img-polaroid" width="200">
                    @else
                    <img id="preview-photo" src="{!! url('uploads/berita/'.$data->gambar) !!}" class="img-polaroid" width="200">
                    @endif
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="">Status</label><br>
                    <?php
                    $aktif = [];
                    if (!empty($data)) {
                        if($data->status=='1'){
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
        var kategori = $('#kategori').val();
        var judul = $('#judul').val();
        var tgl = $('#tanggal_acara').val();
        var status =  $('#status').val();
        var gambar = $('#gambar').val();
        var data = new FormData($('.formSave')[0])
        var isi = CKEDITOR.instances.editor1.getData();
            data.append('isi',isi);
        if (!judul) {
            Swal.fire({
                icon: 'error',
                title: 'Whoops..',
                text: 'Judul Wajib Diisi',
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
        } else if (!id && !gambar) {
            Swal.fire({
                icon: 'error',
                title: 'Whoops..',
                text: 'Gambar Wajib Diisi',
                showConfirmButton: false,
                timer: 1300,
            })
        } else if (kategori=='2' && !tgl) {
            Swal.fire({
                icon: 'error',
                title: 'Whoops..',
                text: 'Tanggal Acara Wajib Diisi',
                showConfirmButton: false,
                timer: 1300,
            })
        } else if (!isi) {
            Swal.fire({
                icon: 'error',
                title: 'Whoops..',
                text: 'Isi Prestasi Siswa Wajib Diisi',
                showConfirmButton: false,
                timer: 1300,
            })
        } else {
            $('.btnSimpan').attr('disabled',true).html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>LOADING...')
            $.ajax({
                url: '{{route("berita.saveBerita")}}',
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