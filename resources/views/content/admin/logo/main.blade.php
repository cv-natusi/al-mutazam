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
        
		<div class="row main-layer">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center" width='10px'>No</th>
                        <th class="text-center">Logo</th>
                        <th class="text-center">Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center">1</td>
                        <td class="text-center">
                            <?php if ($identity->logo_kiri != null) { ?>
                                <img src="{!! url('uploads/identitas/'.$identity->logo_kiri) !!}" width="200">
                            <?php }else{ ?>
                                <img src="{!! url('AssetsSite/img/icon/default_logo.jpg') !!}" width="200">
                            <?php } ?>
                        </td>
                        <td class="text-center">
                            <a onclick="updated('Kiri')" href="javascript:void(0);" class='btn btn-primary btn-sm'><i class="fa fa-pencil"></i> Edit</a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="other-page"></div>
            <div class="modal-dialog"></div>
        </div>
	</div>
@endsection

@push('script')
<script src="{{url('assets/plugins/jquery-knob/jquery.knob.js')}}"></script>
<script type="text/javascript">
	function updated(posisi){
		$('.main-layer').hide();
		$.post("{!! route('formUpdateLogo') !!}", {posisi:posisi}).done(function(data){
			if(data.status == 'success'){
				$('.loading').hide();
				$('.other-page').html(data.content).fadeIn();
			} else {
				$('.main-layer').show();
			}
		});
	}
</script>
@endpush