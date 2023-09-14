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
					<input type="hidden" name="id" id="id">
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="">Guru Pengajar <small>*</small></label>
                            <select name="guru_id" id="guru_id" class="form-control">
                                <option value="">.:: Pilih ::.</option>
                                @if (count($guru)>0)
                                @foreach ($guru as $gr)
                                <option value="{{$gr->id_guru}}">{{$gr->nama}}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
					</div>
                    <hr>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="">Pilih Dokumen <small>*</small></label>
                            <select name="dokumen_id" id="dokumen_id" class="form-control">
                                <option value="">.:: Pilih ::.</option>
                                @if (count($dokumen)>0)
                                @foreach ($dokumen as $d)
                                <option value="{{$d->id_mst_pengembangan_diri}}">{{$d->nama_dokumen}}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="row-mb-1">
                        <i><small>*</small> Hanya Bisa Menginputkan 1 data</i>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12 table-responsive">
                            <table id="tableList" class="table table-striped table-bordered" width="100%">
                                <thead>
                                    <tr>
                                        <td>No</td>
                                        <td>Nama Dokumen</td>
                                        <td class="text-center">Aksi</td>
                                    </tr>
                                </thead>
                                <tbody id="tbodyList">
                                </tbody>
                            </table>
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
        var guru = $('#guru_id').val();
        if(!guru) {
            Swal.fire('Maaf!!', 'Guru Pengajar Wajib Diisi.', 'warning')
        } else{
            var data = new FormData($('#saveForm')[0]);
            $('#tableList tbody tr').each(function() {
                var nama_dokumen = $(this).find('td[data-nama]').data('nama');
                data.append('nama_dokumen',nama_dokumen);
            });
            $.ajax({
                url: '{{route("savePengembanganDiri")}}',
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
    });
    $('.btnCancel').click(()=>{
		$('#modalForm').fadeOut(function(){
			location.reload()
		})
	})
</script>