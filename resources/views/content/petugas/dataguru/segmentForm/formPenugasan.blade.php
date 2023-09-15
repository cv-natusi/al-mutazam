<div class="card mb-3" style="width: 100%; background-color:#ffffff">
	<div class="card-header bg-card">	
		<h5 class="text-card">PENUGASAN</h5>
	</div>
	<div class="card-body">
		<form class="row mb-3 formDataPendidikan">
			<input type="hidden" name="id" id="id" value="{{!empty($data)?$data->id_guru:''}}">
			<div class="row mb-3">
				<label>Tugas Utama</label>
				<select name="tugas_utama" id="tugas_utama" class="form-control">
					<option value="first">.:: Pilih ::.</option>
					@if($tugas)
						@foreach($tugas as $k => $v)
							<option value="{{$v->id_tugas_pegawai}}">{{$v->nama_tugas}}</option>
						@endforeach
					@endif
				</select>
			</div>
			<div class="row mb-3">
				<div class="col-md-10">
					<label>
						Tugas Tambahan
					</label>
					<select class="form-control" id="tugas_tambahan" name="tugas_tambahan">
						<option value="first">.:: Pilih ::.</option>
						@if($tugas)
							@foreach($tugas as $k => $v)
								<option value="{{$v->id_tugas_pegawai}}">{{$v->nama_tugas}}</option>
							@endforeach
						@endif
					</select>
				</div>
				<div class="col-md-2">
					<button type="button" style="margin-top: 20px;" class="btn btn-primary" id="addTugasTambahan" onclick="addTugas()">ADD</button>
				</div>
			</div>
			<div class="row mb-3">
				<div class="col-md-12">
					<table class="table" id="tableTugasTambahan" style="font-size: 12px;">
						<thead class="table-light">
							<tr>
								<th scope="col">No</th>
								<th scope="col">Nama Tugas Tambahan</th>
								<th scope="col">Aksi</th>
							</tr>
						</thead>
						<tbody id="dataPenugasan">
						</tbody>
					</table>
				</div>
			</div>
		</form>
	</div>
	<div class="card-footer">
		{{-- <button class="btn btn-secondary editPenugasan" type="button">EDIT</button> --}}
		<button class="btn btn-success simpanPenugasan" type="button">SIMPAN</button>
	</div>
</div>
<script type="text/javascript">
	async function addTugas() {
		const kode = await generateId(5)
		var id = $('#tugas_tambahan').val()
		var nama = $('#tugas_tambahan option:selected').text()
		var cekTugas = $('input[name^="tugasTambahan"]')
		let exist = 0;
		var rowCount = $('#dataPenugasan tr').length +1
		var html = ''

		for (var i=0;i < cekTugas.length;i++) {
			if (cekTugas[i].value == id) {
				exist += 1;
			}
		}
		if(!id || id=='first'){
			await Swal.fire({
				icon: 'warning',
				title: 'Oops..',
				text: 'Pilih Tugas dengan benar!',
				showConfirmButton: true,
			})
			return
		}
		if(exist>0){
			await Swal.fire({
				icon: 'warning',
				title: 'Oops..',
				text: 'Tugas sudah masuk ke list!',
				showConfirmButton: true,
			})
			return
		}

		html += '<tr class="rowMapel" id="'+kode+'">'
		html += '<td><span id="rowCount">'+rowCount+'</span></td>'
		html += '<td><span id="namaMapel">'+nama+'</span></td>'
		html += '<td>'
		html += '<input type="hidden" id="idMapel" name="tugasTambahan[]" value="'+id+'">'
		html += '<a href="javascript:void(0)" class="btn btn-sm btn-rounded btn-danger" onclick="deleteTugas(`'+kode+'`)"><i class="bx bxs-trash"></i></a>'
		html += '</td>'
		html += '</tr>'
		$('#dataPenugasan').append(html)
		$('#tugas_tambahan').val('first').trigger('change')
		await Swal.fire({
			icon: 'success',
			title: 'Berhasil ditambahkan',
			showConfirmButton: false,
			timer: 900,
		})
	}
	async function deleteTugas(id){
		Swal.fire({
			title: 'Anda yakin?',
			text: 'Ingin menghapus data ini!',
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#d33',
			confirmButtonText: 'Saya yakin!',
			cancelButtonText: 'Batal!',
		}).then(async (result) => {
			if(result.value == true){
				await $('#' + id).remove()
				await $('#dataPenugasan').find('tr').each(function(c){
					$(this).find('td:first #rowCount').text(c+1);
				});
				await Swal.fire({
					icon: 'success',
					title: 'Berhasil',
					text: 'Data berhasil dihapus',
					showConfirmButton: false,
					timer: 900
				})
			}
		})
	}

	async function generateId(n) {
		var text = "";
		var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
		
		for (var i = 0; i < n; i++) {
			text += possible.charAt(Math.floor(Math.random() * possible.length));
		}
		return text;
	}
</script>