@extends('layout.master.main')

@push('style')
<style>
	.card-title {
		margin-top: 40px;
	}
</style>
@endpush

@section('content')
	<div class="page-content">
		@include('include.master.breadcrumb')
        
		<div class="row">
            <form method='post' action="{{ route('changeIdentity') }}" enctype='multipart/form-data'>
                {{ csrf_field() }}
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @elseif(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif
                <div class="col-md-12">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Data Umum</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col-md-3">
                                            <label>Nama Web: </label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="nama_web"  value='{!! $identity->nama_web !!}' required="required" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-3">
                                            <label>URL: </label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="url"  value='{!! $identity->url !!}' required="required" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-3">
                                            <label>Meta: </label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="meta"  value='{!! $identity->meta !!}' required="required" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-3">
                                            <label>Alamat: </label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="alamat"  value='{!! $identity->alamat !!}' required="required" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-3">
                                            <label>No. HP: </label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="phone"  value='{!! $identity->phone !!}' required="required" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-3">
                                            <label>Email: </label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="email"  value='{!! $identity->email !!}' required="required" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-3">
                                            <label>Icon: </label>
                                        </div>
                                        <div class="col-md-9">
                                            <center>
                                                @if(!empty($identity->favicon))
                                                    <img id="preview-photo" src="{!! url('uploads/identitas/'.$identity->favicon) !!}" class="img-polaroid" width="100" height="101">
                                                @else
                                                    <img id="preview-photo" src="{!! url('uploads/default.jpg') !!}" class="img-polaroid" width="100" height="101">
                                                @endif
                                            </center>
                                            <div class="clearfix" style="padding-bottom: 10px"></div>
                                            <input type="file" class="upload form-control" onchange="loadFilePhoto(event)" name="icon" accept="image/*" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Detail Kontak</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col-md-3">
                                            <label>Facebook: </label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="fb"  value='{!! $identity->fb !!}' required="required" class="form-control input-sm customInput col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-3">
                                            <label>Instagram: </label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="instagram"  value='{!! $identity->instagram !!}' required="required" class="form-control input-sm customInput col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-3">
                                            <label>Google Plus: </label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="gplus"  value='{!! $identity->gplus !!}' required="required" class="form-control input-sm customInput col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-3">
                                            <label>Twitter: </label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="twitter"  value='{!! $identity->twitter !!}' required="required" class="form-control input-sm customInput col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-3">
                                            <label>Youtube: </label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="youtube"  value='{!! $identity->youtube !!}' required="required" class="form-control input-sm customInput col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-3">
                                            <label>peta: </label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="lokasi" class="form-control input-sm customInput col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <?php echo $identity->lokasi?>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <input type="submit" name="edit" id="btn_simpan" class="btn btn-primary btn-block" style="width: 100%" value="Simpan">
                        </div>
                        <div class="col-md-6">
                            <input type="reset" class="btn btn-warning btn-block" style="width: 100%" value="Reset">
                        </div>
                    </div>
                </div>
            </form>
        </div>
	</div>
@endsection

@push('script')
<script src="{{url('assets/plugins/jquery-knob/jquery.knob.js')}}"></script>
<script type="text/javascript">
    function loadFilePhoto(event) {
        var image = URL.createObjectURL(event.target.files[0]);
            $('#preview-photo').fadeOut(function(){
                $(this).attr('src', image).fadeIn().css({
                    '-webkit-animation' : 'showSlowlyElement 700ms',
                    'animation'         : 'showSlowlyElement 700ms'
                });
            });
    };

    $('#btn_simpan').click(function(){
    	$('#main_content').hide();
    	$('.loading').show();
    });
</script>
@endpush