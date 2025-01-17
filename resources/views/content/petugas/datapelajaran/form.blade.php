<div class="row">
    <div class="col-md-12">
        <div class="card" style="width: 100%; background-color:#ffffff">
            <div class="card-header">	
                <h5>{{$title}}</h5>
            </div>
            <div class="card-body">
                <form class="row mb-3 formSave">
                    <div class="row mb-3">
                        <input type="hidden" name="id" id="id" value="{{!empty($data->id_pelajaran)?$data->id_pelajaran:''}}">
                        <div class="col-md-6">
                            <label>Nama Mata Pelajaran <small>*</small></label>
                            <input type="text" class="form-control" autocomplete="off" name="nama_mapel" id="nama_mapel" value="{{!empty($data->nama_mapel)?$data->nama_mapel:''}}">
                        </div>
                        <div class="col-md-3">
                            <label>Kelas <small>*</small></label>
                            <select name="kelas_id" id="kelas" class="form-control singleSelect">
                                <option value="">.:: Pilih ::.</option>
                                @if (count($kelas)>0)
                                    @foreach ($kelas as $k)
                                        <option @if(!empty($data) && $data->kelas_id==$k->id_kelas) selected @endif value="{{$k->id_kelas}}">Kelas {{$k->kelas}} {{$k->nama_kelas}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label>TA <small>*</small></label>
                            <select name="ta" id="ta" class="form-control">
                                <option value="">.:: Pilih ::.</option>
                                <option @if(!empty($data) && $data->ta=='2020-2021') selected @endif value="2020-2021">2020-2021</option>
                                <option @if(!empty($data) && $data->ta=='2021-2022') selected @endif value="2021-2022">2021-2022</option>
                                <option @if(!empty($data) && $data->ta=='2022-2023') selected @endif value="2022-2023">2022-2023</option>
                                <option @if(!empty($data) && $data->ta=='2023-2024') selected @endif value="2023-2024">2023-2024</option>
                                <option @if(!empty($data) && $data->ta=='2024-2025') selected @endif value="2024-2025">2024-2025</option>
                                <option @if(!empty($data) && $data->ta=='2025-2026') selected @endif value="2025-2026">2025-2026</option>
                                <option @if(!empty($data) && $data->ta=='2026-2027') selected @endif value="2026-2027">2026-2027</option>
                                <option @if(!empty($data) && $data->ta=='2027-2028') selected @endif value="2027-2028">2027-2028</option>
                                <option @if(!empty($data) && $data->ta=='2028-2029') selected @endif value="2028-2029">2028-2029</option>
                                <option @if(!empty($data) && $data->ta=='2029-2030') selected @endif value="2029-2030">2029-2030</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label>Semester <small>*</small></label>
                            <select name="semester" id="semester" class="form-control">
                                <option value="">.:: Pilih ::.</option>
                                <option @if(!empty($data) && $data->semester=='1') selected @endif value="1">Semeseter 1</option>
                                <option @if(!empty($data) && $data->semester=='2') selected @endif value="2">Semeseter 2</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Guru Pengajar <small>*</small></label>
                            <select name="guru_id" id="guru" class="form-control multiSelect">
                                <option value="">.:: Pilih ::.</option>
                                @if (count($guru)>0)
                                    @foreach ($guru as $g)
                                        <option @if(!empty($data) && $data->guru_id==$g->id_guru) selected @endif value="{{$g->id_guru}}">{{$g->nama}}</option>
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
