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
	var datagrid = $("#datagrid").datagrid({
		url                     : "{!! route('tampilSlider') !!}",
		primaryField            : 'id_slider', 
		rowNumber               : true, 
		rowCheck                : false, 
		searchInputElement      : '#search', 
		searchFieldElement      : '#search-option', 
		pagingElement           : '#paging', 
		optionPagingElement     : '#option', 
		pageInfoElement         : '#info',
		columns                 : [
			{field: 'image', title: 'Gambar Icon', editable: false, sortable: false, width: 200, align: 'center', search: false,
				rowStyler: function(rowData, rowIndex) {
					return image(rowData, rowIndex);
				}
			},
			// {field: 'nama_exkul', title: 'Ekstra Kulikuler', editable: false, sortable: true, width: 200, align: 'left', search: true},
			// {field: 'status_exku', title: 'Status', editable: false, sortable: true, width: 150, align: 'left', search: true,
			// 	custom_search: {appendClass: 'input-sm form-control',
   //                  option: [
   //                  	{text:'Aktif',value:'1'},
   //                  	{text:'Tidak Aktif',value:'0'}
   //                  ]
   //              },
			// 	rowStyler: function(rowData, rowIndex) {
			// 		return status(rowData, rowIndex);
			// 	}
			// },
			{field: 'edit', title: 'Edit', editable: false, sortable: true, width: 150, align: 'left', search: false,
				rowStyler: function(rowData, rowIndex) {
					return edit(rowData, rowIndex);
				}
			},
		]
	});

	$(document).ready(function() {
		datagrid.run();
	});

	$('#btn-add').click(function(){
		$('.loading').show();
		$('.main-layer').hide();
		$.post("{!! route('formAddEkskul') !!}").done(function(data){
			if(data.status == 'success'){
				$('.loading').hide();
				$('.other-page').html(data.content).fadeIn();
			} else {
				$('.main-layer').show();
			}
		});
	});

	function updated(rowIndex){
		var rowData = datagrid.getRowData(rowIndex);
		$('.loading').show();
		$('.main-layer').hide();
		$.post("{!! route('formUpdateSlider') !!}", {id:rowData.id_slider }).done(function(data){
			if(data.status == 'success'){
				$('.loading').hide();
				$('.other-page').html(data.content).fadeIn();
			} else {
				$('.main-layer').show();
			}
		});
	}

	function image(rowData, rowIndex){
		if (rowData.gambar != "") {
			var tag = '<img src="{!! url("uploads/slider/'+rowData.gambar+'") !!}" style="height:100px;width:auto">';
		}else{
			var tag = '<img src="{!! url("uploads/default.jpg") !!}" style="height:100px;width:auto">';
		};
		return tag;
	}
	function edit(rowData, rowIndex) {
		var tag = '<a href="javascript:void(0)" class="btn btn-sm btn-info m-0" onclick="updated('+rowIndex+')"><span class="fa fa-pencil"></span> &nbsp Ubah Gambar</a>';
		return tag;
	}
	function status(rowData, rowIndex){
		var tag = '';
		if(rowData.status_exkul==1){
			tag='Aktif';
		}else{
			tag='Tidak Aktif';
		}
		return tag;
	}
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