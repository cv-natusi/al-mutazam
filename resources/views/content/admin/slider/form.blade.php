<div class="row">
    <div class="col-md-12">
        <div class="card" style="width: 100%; background-color:#ffffff">
            <div class="card-header bg-card">	
                <h5 class="text-card">Edit Logo</h5>
            </div>
            <div class="card-body">
                <form class="formSave">
                    <div class="form-group">
						<div class="row mb-3">
							<div class="col-md-12">
								<label>Gambar Icon </label>
                                <input type="file" name="logo" class="form-control upload" onchange="loadFilePhoto(event)" required>
                                <input type="hidden" name="id_slider" class="form-control" value="{{$slider->id_slider}}">
							</div>
						</div>
                        <div class="row">
                            <div class="col-md-4">
                                @if($slider->gambar=='')
                                <img id="preview-photo" src="{!! url('uploads/default.jpg') !!}" class="img-polaroid" width="200">
                                @else
                                <img id="preview-photo" src="{!! url('uploads/slider/'.$slider->gambar) !!}" class="img-polaroid" width="200">
                                @endif
                            </div>
                            <div class="col-md-8"></div>
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
<script type="text/javascript">
	$('.btnCancel').click(()=>{
		$('.other-page').fadeOut(function(){
			hideForm()
		})
	})
	$('.btnSimpan').click(()=>{
		var data = new FormData($('.formSave')[0])
		$('.btnSimpan').attr('disabled',true).html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>LOADING...')
        $.ajax({
            url: '{{route("saveSlider")}}',
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
    function loadFilePhoto(event) {
        var image = URL.createObjectURL(event.target.files[0]);
		$('#preview-photo').fadeOut(function(){
			$(this).attr('src', image).fadeIn().css({
				'-webkit-animation' : 'showSlowlyElement 700ms',
				'animation'         : 'showSlowlyElement 700ms'
			});
		});
    };
</script>