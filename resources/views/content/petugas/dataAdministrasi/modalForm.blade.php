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
					<input type="hidden" name="id" id="id" value="{{!empty($data)?$data->id_administrasi:''}}">
                    <div class="row mb-3">
						<div class="col-md-12">
                            <label>Nama Berkas <small>*</small></label>
                            <input type="text" name="nama_berkas" id="nama_berkas" class="form-control" value="{{!empty($data)?$data->nama_berkas:''}}" autocomplete="off">
						</div>
					</div>
                    <div class="row mb-3">
						<div class="col-md-6">
                            <label>Tahun Ajaran <small>*</small></label>
                            <select name="tahun_ajaran" id="tahun_ajaran" class="form-control single-select">
                                <option value="">.:: Pilih ::.</option>
                                <option @if(!empty($data) && $data->tahun_ajaran=='2020-2021') selected @endif value="2020-2021">2020-2021</option>
                                <option @if(!empty($data) && $data->tahun_ajaran=='2021-2022') selected @endif value="2021-2022">2021-2022</option>
                                <option @if(!empty($data) && $data->tahun_ajaran=='2022-2023') selected @endif value="2022-2023">2022-2023</option>
                                <option @if(!empty($data) && $data->tahun_ajaran=='2023-2024') selected @endif value="2023-2024">2023-2024</option>
                                <option @if(!empty($data) && $data->tahun_ajaran=='2024-2025') selected @endif value="2024-2025">2024-2025</option>
                                <option @if(!empty($data) && $data->tahun_ajaran=='2025-2026') selected @endif value="2025-2026">2025-2026</option>
                                <option @if(!empty($data) && $data->tahun_ajaran=='2026-2027') selected @endif value="2026-2027">2026-2027</option>
                                <option @if(!empty($data) && $data->tahun_ajaran=='2027-2028') selected @endif value="2027-2028">2027-2028</option>
                                <option @if(!empty($data) && $data->tahun_ajaran=='2028-2029') selected @endif value="2028-2029">2028-2029</option>
                                <option @if(!empty($data) && $data->tahun_ajaran=='2029-2030') selected @endif value="2029-2030">2029-2030</option>
                            </select>
						</div>
                        <div class="col-md-6">
                            <label>Semester <small>*</small></label>
                            <select name="semester" id="semester" class="form-control single-select">
                                <option value="">.:: Pilih ::.</option>
                                <option @if(!empty($data) && $data->semester=='1') selected @endif value="1">Semeseter 1</option>
                                <option @if(!empty($data) && $data->semester=='2') selected @endif value="2">Semeseter 2</option>
                            </select>
						</div>
					</div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label>Pilih Guru <small>*</small></label>
                            <select name="guru_id[]" id="guru_id" class="form-control single-select" multiple='multiple'>
                                <option value="">.:: Pilih ::.</option>
                                @foreach ($guru as $g)
                                    <option @if(!empty($data) && $data->guru_id==$g->id_guru) selected @endif value="{{$g->id_guru}}">{{$g->nama}}</option>
                                @endforeach
                            </select>
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
    $('.btnSimpan').click(function (e) { 
        e.preventDefault();
        var idAdministrasi = $('#id').val();
        var nama = $('#nama_berkas').val();
        var tahun = $('#tahun_ajaran').find(":selected").val();
        var semester = $('#semester').find(":selected").val();
        var guru = $('#guru_id').find(":selected").val();
        console.log(guru);
        if(!nama) {
            Swal.fire('Maaf!!', 'Nama Berkas Wajib Diisi.', 'warning')
        } else if(!tahun) {
            Swal.fire('Maaf!!', 'Tahun Ajaran Wajib Diisi.', 'warning')
        } else if(!semester) {
            Swal.fire('Maaf!!', 'Semester Wajib Diisi.', 'warning')
        } else if(!guru) {
            Swal.fire('Maaf!!', 'Guru Wajib Diisi.', 'warning')
        } else{
            var data = new FormData($('#saveForm')[0]);
            $.ajax({
                url: '{{route("saveAdministrasi")}}',
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