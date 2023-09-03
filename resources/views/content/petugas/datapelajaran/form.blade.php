<div class="row">
    <div class="col-md-12">
        <div class="card" style="width: 100%; background-color:#ffffff">
            <div class="card-header">	
                <h5>{{$title}}</h5>
            </div>
            <div class="card-body">
                <form class="row mb-3 formSave">
                    <div class="row mb-3">
                        <input type="hidden" name="id" id="id" value="{{!empty($data->id_tugas_pegawai)?$data->id_tugas_pegawai:''}}">
                        <div class="col-md-6">
                            <label>Nama Mata Pelajaran <small>*</small></label>
                            <input type="text" class="form-control" autocomplete="off" name="nama_mapel" id="nama_mapel" value="{{!empty($data->nama_mapel)?$data->kode_tugas:''}}">
                        </div>
                        <div class="col-md-3">
                            <label>Kelas <small>*</small></label>
                            <select name="kelas_id" id="kelas" class="form-control singleSelect">
                                <option value="">.:: Pilih ::.</option>
                                @if (count($kelas)>0)
                                    @foreach ($kelas as $k)
                                        <option value="{{$k->id_kelas}}">{{$k->nama_kelas}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label>TA <small>*</small></label>
                            <select name="ta" id="ta" class="form-control">
                                <option value="">.:: Pilih ::.</option>
                                <option value="2020-2021">2020-2021</option>
                                <option value="2021-2022">2021-2022</option>
                                <option value="2022-2023">2022-2023</option>
                                <option value="2023-2024">2023-2024</option>
                                <option value="2024-2025">2024-2025</option>
                                <option value="2025-2026">2025-2026</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label>Semester <small>*</small></label>
                            <select name="semester" id="semester" class="form-control">
                                <option value="">.:: Pilih ::.</option>
                                <option value="1">Semeseter 1</option>
                                <option value="2">Semeseter 2</option>
                                <option value="3">Semeseter 3</option>
                                <option value="4">Semeseter 4</option>
                                <option value="5">Semeseter 5</option>
                                <option value="6">Semeseter 6</option>
                                <option value="7">Semeseter 7</option>
                                <option value="8">Semeseter 8</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Guru Pengajar <small>*</small></label>
                            <select name="guru_id" id="guru" class="form-control multiSelect">
                                <option value="">.:: Pilih ::.</option>
                                @if (count($guru)>0)
                                    @foreach ($guru as $g)
                                        <option value="{{$g->id_guru}}">{{$g->nama}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <button type="button" class="btn btn-sm btn-success btnSimpan">Simpan</button>
                <button type="button" class="btn btn-sm btn-secondary btnCancel">Kembali</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('#kelas').select2();
        $('#ta').select2();
        $('#guru').select2();
        $('#semester').select2();
    });
    $('.btnSimpan').click(()=>{
		var data = new FormData($('.formSave')[0])
		$('.btnSimpan').attr('disabled',true).html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>LOADING...')
        $.ajax({
            url: '{{route("saveDataPelajaran")}}',
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
    $('.btnCancel').click(()=>{
		$('.other-page').fadeOut(function(){
			hideForm()
		})
	})
</script>
