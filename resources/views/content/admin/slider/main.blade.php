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
                    <div class="box box-primary main-layer">
                        <div class="col-md-4 col-sm-4 col-xs-12 form-inline main-layer" style='padding:5px'>
                            <!-- <button type="button" class="btn btn-sm btn-primary" id="btn-add">
                                <span class="fa fa-plus"></span> &nbsp New {{$title}}
                            </button> -->
                        </div>
                        <!-- Search -->
                        <div class="col-md-8 col-sm-8 col-xs-12 form-inline main-layer" style="text-align: right;padding:5px;">
                            <div class="form-group">
                                <select class="input-sm form-control input-s-sm inline v-middle option-search" id="search-option"></select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="input-sm form-control" placeholder="Search" id="search">
                            </div>
                        </div>
                        <div class='clearfix'></div>
                        <div class="col-md-12" style='padding:0px'>
                            <!-- Datagrid -->
                            <div class="table-responsive">
                                <table class="table table-striped b-t b-light" id="datagrid"></table>
                            </div>
                            <footer class="panel-footer">
                                <div class="row">
                                    <!-- Page Option -->
                                    <div class="col-sm-1 hidden-xs">
                                        <select class="input-sm form-control input-s-sm inline v-middle option-page" id="option"></select>
                                    </div>
                                    <!-- Page Info -->
                                    <div class="col-sm-6 text-center">
                                        <small class="text-muted inline m-t-sm m-b-sm" id="info"></small>
                                    </div>
                                    <!-- Paging -->
                                    <div class="col-sm-5 text-right text-center-xs">
                                        <ul class="pagination pagination-sm m-t-none m-b-none" id="paging"></ul>
                                    </div>
                                </div>
                            </footer>
                        </div>
                        <div class='clearfix'></div>
                    </div>
                    <div class="other-page"></div>
                    <div class="modal-dialog"></div>
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
</script>
@endpush