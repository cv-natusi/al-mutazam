<div class="row">
    <div class="col-md-12">
        <div class="card" style="width: 100%; background-color:#ffffff">
            <div class="card-header bg-card">	
                <h5 class="text-card">Edit Slider</h5>
            </div>
            <div class="card-body">
                <form class="formSave">
                    <div class="form-group">
						<input type="hidden" name='position' value='{!! $position !!}' class="form-control" required='required'>
						<div class="row">
							<div class="col-md-12">
								<label>Logo </label>
								<input type="file" class="upload form-control" onchange="loadFilePhoto(event)" name="logo" accept="image/*" class="form-control customInput input-sm col-md-7 col-xs-12">
							</div>
						</div>
						<div class="row mt-3">
							<div class="col-md-12">
								<i>* Rekomendasi Ukuran Logo 514x600 pixel</i>
							</div>
						</div>
						<div class="row mt-3">
							<div class="col-md-4">
								<div class="crop-edit">
									<center>
										@if(!empty($identity->logo_kiri))
											@if(file_exists('uploads/identitas/'.$identity->logo_kiri))
											<img id="preview-photo" src="{!! url('uploads/identitas/'.$identity->logo_kiri) !!}" class="img-polaroid" width="200">
											@else
											<img id="preview-photo" src="{!! url('AssetsSite/img/icon/default_logo.jpg') !!}" class="img-polaroid" width="200">
											@endif
										@else
											<img id="preview-photo" src="{!! url('AssetsSite/img/icon/default_logo.jpg') !!}" class="img-polaroid" width="200">
										@endif
									</center>
								</div>
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
            url: '{{route("saveLogo")}}',
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