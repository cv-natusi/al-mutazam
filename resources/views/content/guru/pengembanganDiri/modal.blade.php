<div class="modal fade" id="modalFormDialog" role="dialog">
	<div class="modal-dialog modal-lg">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header bg-card">
				<h5 class="text-card">{{$title}}</h5>
				<button type="button" class="btn button-custome btnCancel">&times;</button>
			</div>
			<div class="modal-body">
				<form id="saveForm">
					<input type="hidden" name="id" id="id" value="{{!empty($data)?$data->id_pengembangan_diri:''}}">
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="">Nama Kegiatan <small>*</small></label>
                            {{-- <input type="text" name="nama_kegiatan" id="" class="form-control" value="{{!empty($data)?$data->nama_kegiatan:''}}" autocomplete="off"> --}}
                            <select name="nama_kegiatan" id="nama_kegiatan" class="form-control single-select">
                                <option value="">.:: Pilih ::.</option>
                                @if (count($dokumen)>0)
                                @foreach ($dokumen as $d)
                                <option @if(!empty($data)&&$data->mst_pengembangan_diri_id==$d->id_mst_pengembangan_diri) selected @endif value="{{$d->id_mst_pengembangan_diri}}">{{$d->nama_dokumen}}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="">Tanggal Mulai <small>*</small></label>
                            <input type="date" name="tgl_mulai" id="" onchange="triggerDate()" class="form-control" value="{{!empty($data)?$data->tgl_mulai:''}}">
                        </div>
                        <div class="col-md-6">
                            <label for="">Tanggal Selesai <small>*</small></label>
                            <input type="date" name="tgl_selesai" id=""  onchange="triggerDate()" class="form-control" value="{{!empty($data)?$data->tgl_selesai:''}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="">File Dokumen/Berkas</label>
                            <input type="file" name="file_dokumen" id="file_dokumen" class="form-control" placeholder="Upload file">
                        </div>
                    </div>
				</form>
			</div>
			<div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary btnCancel">KEMBALI</button>
                <button type="button" class="btn btn-sm button-custome btnSimpan">SIMPAN</button>
            </div>
		</div>

	</div>
</div> 
<script type="text/javascript">
    $(document).ready(function () {
        $(".single-select").select2({
            theme: 'bootstrap-5',
            dropdownParent: $('#modalFormDialog')
        });
    });
    $('#modalFormDialog').modal('show');
    var rowCount = 1; // Awal nomor urutan
    $('#dokumen_id').change(function() {
        var selectedValue = $(this).val(); // Mendapatkan nilai yang dipilih
        if (selectedValue !== '') {
            // Mendapatkan teks dari option yang dipilih
            var selectedText = $('#dokumen_id option:selected').text();
            // Menambahkan data ke dalam tabel
            var newRow = '<tr>' +
                '<td>' + rowCount + '</td>' +
                '<td data-nama="' + selectedValue + '">' + selectedText + '</td>' +
                '<td class="text-center"><button class="btn btn-danger deleteRow"><i class="bx bxs-trash"><i/></button></td>' + // Tombol Hapus
            '</tr>';
            $('#tableList tbody').append(newRow);
            rowCount++; // Tingkatkan nomor urutan
            // Mengosongkan pilihan select setelah data ditambahkan
            $(this).val('');
        }
    });
    // Event handler untuk tombol "Hapus"
    $('#tableList').on('click', '.deleteRow', function() {
        $(this).closest('tr').remove();
    });
    
    $('.btnSimpan').click(function (e) { 
        e.preventDefault();
        var data = new FormData($('#saveForm')[0]);
            $.ajax({
                url: '{{route("savePengembanganDiriGuru")}}',
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
                        location.reload()
                    }else{
                        alert_validation(data.message)
                    }
                    // $('.btnSimpan').attr('disabled',false).html('SIMPAN')
                }
            }).fail(()=>{
                Swal.fire({
                    icon: 'error',
                    title: 'Whoops..',
                    text: 'Terjadi kesalahan silahkan ulangi kembali',
                    showConfirmButton: false,
                    timer: 1300,
                })
                // $('.btnSimpan').attr('disabled',false).html('SIMPAN')
            })
    });
    function alert_validation(message) { 
        var n = 0;
                for (key in message) {
                    if (n == 0) {
                        var dt0 = key;
                    }
                    n++;
                }
                Swal.fire({
                    icon: 'error',
                    title: 'Whoops..',
                    text:  dt0 + ' ' + message[dt0],
                    showConfirmButton: false,
                    timer: 1300,
                })
     }
    $('.btnCancel').click(()=>{
		$('#modalForm').fadeOut(function(){
			location.reload()
		})
	})

    function triggerDate() { 
        var start_date = $('input[name=tgl_mulai').val();
        var end_date = $('input[name=tgl_selesai').val();
        if (start_date != '' && end_date != '') {
                if (end_date < start_date) {
                    $('input[name=tgl_selesai').val(start_date);
                    Swal.fire({
                    icon: 'error',
                    title: 'Whoops..',
                    text:  'Tanggal selesai tidak boleh kurang dari tanggal mulai',
                    showConfirmButton: false,
                    timer: 1300,
                })
                }
            }
     }
</script>