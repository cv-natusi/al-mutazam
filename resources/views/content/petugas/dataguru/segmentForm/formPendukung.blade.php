<div class="card" style="width: 100%; background-color:#ffffff">
    <div class="card-header bg-card">	
        <h5 class="text-card">DATA PENDUKUNG</h5>
    </div>
    <div class="card-body">
        <form class="row mb-3 formDataPendidikan">
            <input type="hidden" name="id" id="id" value="{{!empty($data)?$data->id_guru:''}}">
            <div class="row mb-3">
                <div class="col-md-6">
                    <label>File KTP <small>*</small></label>
                    <input type="file" name="file_ktp" class="form-control" placeholder="File KTP">
                </div>
                <div class="col-md-6">
                    <label>File KK <small>*</small></label>
                    <input class="form-control" type="file" name="file_kk" id="file_kk" placeholder="File KK">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label>Sertifikat Pendidik</label>
                    <input type="file" name="file_sertifikat_pendidik" class="form-control" placeholder="Sertifikat Pendidik">
                </div>
                <div class="col-md-6">
                    <label>Ijazah Terakhir <small>*</small></label>
                    <input class="form-control" type="file" name="ijazah_terakhir" id="ijazah_terakhir" placeholder="Ijazah Terakhir">
                </div>
            </div>
        </form>
    </div>
    <div class="card-footer">
        {{-- <button class="btn btn-secondary editDataPendukung" type="button">EDIT</button> --}}
        <button class="btn btn-success simpanDataPendukung" type="button">SIMPAN</button>
    </div>
</div>