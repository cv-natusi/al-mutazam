<div class="card mb-3" style="width: 100%; background-color:#ffffff">
	<div class="card-header bg-card">	
		<h5 class="text-card">DATA PENDIDIKAN DAN PEKERJAAN</h5>
	</div>
	<div class="card-body">
		<form class="formDataPendidikan">
			<input type="hidden" name="id" id="id" value="{{!empty($data)?$data->id_guru:''}}">
			<div class="row mb-3">
				<div class="col-md-7">
					<label>Mata Pelajaran Yang Diajar</label>
					<select class="form-control" id="mata_pelajaran" name="mata_pelajaran">
						<option value="first" disabled selected>.:: Pilih ::.</option>
						@if (count($pelajaran)>0)
							@foreach ($pelajaran as $p)
								<option id="opt_{{$p->id_pelajaran}}" value="{{$p->id_pelajaran}}">{{$p->nama_mapel}}</option>
							@endforeach
						@endif
					</select>
					<input type="hidden" name="sIdMapel" id="sIdMapel">
				</div>
				<div class="col-md-2">
					<label>Jumlah Jam <small>*</small></label>
					<input autocomplete="off" class="form-control" type="number" name="jumlah_jam" id="jumlah_jam" value="{{ !empty($data->jumlah_jam)? $data->jumlah_jam : ''}}" placeholder="0">
				</div>
				<div class="col-md-3">
					<button type="button" style="margin-top: 20px;" class="btn btn-primary" id="btnAddMapel" onclick="addMapel()">ADD</button>
					<div class="btn-update" style="margin-top: 20px;"></div>
				</div>
			</div>
			<div class="row mb-3">
				<div class="col-md-12">
					<table class="table" id="tableMapel" style="font-size: 12px;">
						<thead class="table-light">
							<tr>
								<th scope="col">Nama Mata Pelajaran</th>
								<th scope="col">Jumlah Jam</th>
								<th scope="col">Aksi</th>
							</tr>
						</thead>
						<tbody id="tempatData">
							@if (!empty($dataMapel)&&$dataMapel[0]->id_detail_data_pendidikan != '')
								@foreach($dataMapel as $index => $val)
									<tr class="rowMapel" id="{{$val->id_pelajaran}}">
										<td><span id="namaMapel">{{$val->nama_mapel}}</span></td>
										<td><span id="jumlahJam">{{$val->jumlah_jam}}</span></td>
										<td>
											<input type="hidden" class="hps_{{$val->id_pelajaran}}" id="idMapel" name="mata_pelajaran[]" value="{{$val->id_pelajaran}}">
											<input type="hidden" class="hps_{{$val->id_pelajaran}}" id="idJam" name="jumlah_jam[]" value="{{$val->jumlah_jam}}">
											<a href="javascript:void(0)" class="btn btn-sm btn-rounded btn-warning mr-2" onclick="editMapel(`{{$val->id_pelajaran}}`)"><i class="bx bxs-edit"></i></a>
											<a href="javascript:void(0)" class="btn btn-sm btn-rounded btn-danger" onclick="deleteMapel(`{{$val->id_pelajaran}}`)"><i class="bx bxs-trash"></i></a>
										</td>
									</tr>
								@endforeach
							@endif
						</tbody>
					</table>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">
					<label>Potensi Bidang</label>
					<select name="potensi_bidang" id="potensi_bidang" class="form-control">
						<option value="">.:: Pilih ::.</option>
						@if (count($pelajaran)>0)
							@foreach ($pelajaran as $p)
								<option value="{{$p->id_pelajaran}}">{{$p->nama_mapel}}</option>
							@endforeach
						@endif
					</select>
				</div>
				<div class="col-md-3">
					<label>No. Sertifikat Pendidik</label>
					<input type="text" name="no_sertifikat_pendidik" id="no_sertifikat_pendidik" placeholder="No. Sertifikat Pendidik" class="form-control" value="{{!empty($dataMapel[0]->no_sertifikat_pendidik)?$dataMapel[0]->no_sertifikat_pendidik:''}}">
				</div>
				<div class="col-md-3">
					<label>Sertifikasi</label>
					<input type="text" name="sertifikasi" id="sertifikasi" placeholder="Sertifikasi" class="form-control" value="{{!empty($dataMapel[0]->sertifikasi)?$dataMapel[0]->sertifikasi:''}}">
				</div>
				<div class="col-md-3">
					<label>File Sertifikat Pendidik</label>
					<input type="file" name="file_sertifikat_pendidik" id="file_sertifikat_pendidik" class="form-control">
				</div>
			</div>
		</form>
	</div>
	<div class="card-footer">
		{{-- <button class="btn btn-secondary editDataPendidikan" type="button">EDIT</button> --}}
		<button class="btn btn-success simpanDataPendidikan" type="button">SIMPAN</button>
	</div>
</div>
<script type="text/javascript">
	$('#mata_pelajaran').change(() => {
		var id = $('#mata_pelajaran').val();
		$('#sIdMapel').val(id);
	});
	
	async function addMapel() {
		const kode = await generateId(5)
		var id = $('#mata_pelajaran').val()
		var nama = $('#mata_pelajaran option:selected').text()
		var jumlahJam = $('#jumlah_jam').val()
		var cekMapel = $('input[name^="mata_pelajaran"]')
		let exist = 0;
		var html = ''

		for (var i=0;i < cekMapel.length;i++) {
			if (cekMapel[i].value == id) {
				exist += 1;
			}
		}
		if(!id){
			await Swal.fire({
				icon: 'warning',
				title: 'Oops..',
				text: 'Pilih Mapel dengan benar!',
				showConfirmButton: true,
			})
			return
		}
		if(exist>0){
			await Swal.fire({
				icon: 'warning',
				title: 'Oops..',
				text: 'Mapel sudah masuk ke list!',
				showConfirmButton: true,
			})
			return
		}
		if(!jumlahJam){
			await Swal.fire({
				icon: 'warning',
				title: 'Oops..',
				text: 'Isi jumlah jam dengan benar!',
				showConfirmButton: true,
			})
			return
		}

		html += '<tr class="rowMapel" id="'+kode+'">'
		html += '<td><span id="namaMapel">'+nama+'</span></td>'
		html += '<td><span id="jumlahJam">'+jumlahJam+'</span></td>'
		html += '<td>'
		html += '<input type="hidden" id="idMapel" name="mata_pelajaran[]" value="'+id+'">'
		html += '<input type="hidden" id="idJam" name="jumlah_jam[]" value="'+jumlahJam+'">'
		html += '<a href="javascript:void(0)" class="btn btn-sm btn-rounded btn-warning mr-2" onclick="editMapel(`'+kode+'`)"><i class="bx bxs-edit"></i></a>'
		html += '<a href="javascript:void(0)" class="btn btn-sm btn-rounded btn-danger" onclick="deleteMapel(`'+kode+'`)"><i class="bx bxs-trash"></i></a>'
		html += '</td>'
		html += '</tr>'
		$('#tempatData').append(html)
		$('#mata_pelajaran').val('first').trigger('change')
		$('#jumlah_jam').val('')
		await Swal.fire({
			icon: 'success',
			title: 'Berhasil ditambahkan',
			showConfirmButton: false,
			timer: 900,
		})
	}
	async function editMapel(id){
		const idMapel = $(`#${id} #idMapel`).val()
		const jumlahJam = $(`#${id} #idJam`).val()
		const namaMapel = $(`#${id} #namaMapel`).html()

		$('#mata_pelajaran').val(idMapel)
		$('#select2-mata_pelajaran-container').attr('title', namaMapel)
		$('#select2-mata_pelajaran-container').html(`${namaMapel}`)
		$('#jumlah_jam').val(jumlahJam)

		await $('#btnAddMapel').hide()
		var buttonUpdate = '<input type="hidden" id="idRow" value="'+id+'">'
		buttonUpdate += '<button type="button" class="btn btn-secondary" onclick="batalEdit()">Batal</button>'
		buttonUpdate += '<button type="button" class="btn btn-warning" onclick="updateMapel(`'+id+'`)">Update</button>'
		await $('.btn-update').html(buttonUpdate)
		await $('#mata_pelajaran').attr('disabled',true)
	}
	async function updateMapel(id){
		const jumlahJam = parseInt($(`#jumlah_jam`).val())
		if(!jumlahJam || jumlahJam<=0){
			await Swal.fire({
				icon: 'warning',
				title: 'Oops..',
				text: 'Masukkan jam dengan benar!',
				showConfirmButton: true,
			})
			return
		}

		await $(`#${id} #idJam`).val(jumlahJam)
		await $(`#${id} #jumlahJam`).text(jumlahJam)

		await Swal.fire({
			icon: 'success',
			title: 'Berhasil',
			text: 'Data berhasil di ubah',
			showConfirmButton: false,
			timer: 900
		})
		await $('#mata_pelajaran').val('first').trigger('change')
		await $('#jumlah_jam').val('')
		await $('.btn-update').empty()
		await $('#btnAddMapel').show()
		$('#mata_pelajaran').attr('disabled',false)
	}
	async function deleteMapel(id){
		Swal.fire({
			title: 'Anda yakin?',
			text: 'Ingin menghapus data ini!',
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#d33',
			confirmButtonText: 'Saya yakin!',
			cancelButtonText: 'Batal!',
			// closeOnConfirm: true,
		}).then(async (result) => {
			if(result.value == true){
				// await array_stok_barang.splice($('#' + id).index(), 1);
				await $('#' + id).remove()
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
	async function batalEdit(){
		await $('#mata_pelajaran').val('first').trigger('change')
		await $('#jumlah_jam').val('')
		await $('.btn-update').empty()
		await $('#btnAddMapel').show()
		$('#mata_pelajaran').attr('disabled',false)
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