<div class="card mb-3" style="width: 100%; background-color:#ffffff">
    <div class="card-header bg-card">	
        <h5 class="text-card">DATA DIRI</h5>
    </div>
    <div class="card-body">
        <form class="formDataDiri">
            <input type="hidden" name="id" id="id" value="{{!empty($data)?$data->id_guru:''}}">
            <div class="row mb-3">
                <div class="col-md-4">
                    <label>Nama Lengkap <small>*</small></label>
                    <input autocomplete="off" type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="{{ !empty($data) ? $data->nama : ''}}">
                </div>
                <div class="col-md-4">
                    <label>NIK <small>*</small></label>
                    <input autocomplete="off" class="form-control" type="text" name="nik" id="nik" value="{{ !empty($data->nik)? $data->nik : ''}}" placeholder="Nomor Kartu Penduduk" maxlength="16" pattern="/^-?\d+\.?\d*$/">
                    <div id="errKtp"></div>
                </div>
                <div class="col-md-4">
                    <label>NIP</label>
                    <input autocomplete="off" class="form-control" type="text" name="nip" id="nip" value="{{ !empty($data->nip)? $data->nip : ''}}" placeholder="NIP">
                    <div id="errNip"></div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <label>NUPTK</label>
                    <input autocomplete="off" class="form-control" type="text" name="nuptk" id="nuptk" value="{{ !empty($data->nuptk)? $data->nuptk : ''}}" placeholder="NUPTK">
                </div>
                <div class="col-md-4">
                    <label>PTK ID</label>
                    <input autocomplete="off" class="form-control" type="text" name="ptkid" id="ptkid" value="{{ !empty($data->ptkid)? $data->ptkid : ''}}" placeholder="PTK ID">
                </div>
                <div class="col-md-4">
                    <label>NRG / NPK</label>
                    <input autocomplete="off" class="form-control" type="text" name="nrg_npk" id="nrg_npk" value="{{ !empty($data->nrg_npk)? $data->nrg_npk : ''}}" placeholder="NRG / NPK">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <label>Email</label>
                    <input class="form-control" type="text" name="email" id="email" value="{{ !empty($data->email)? $data->email : ''}}" placeholder="Email">
                </div>
                <div class="col-md-4">
                    <label>TMT Pegawai</label>
                    <input autocomplete="off" type="text" class="form-control" name="tmt_pegawai" id="tmt_pegawai" placeholder="TMT Pegawai" value="{{isset($data->tmt_pegawai) ? $data->tmt_pegawai:''}}">
                </div>
                <div class="col-md-4">
                    <label>File TMT Pegawai</label>
                    <input class="form-control" type="file" name="file_tmt_pegawai" id="file_tmt_pegawai" value="{{ !empty($data->file_tmt_petugas)? $data->file_tmt_petugas : ''}}" placeholder="Upload TMT Pegawai">
                </div>
                
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <label>No Telp <small>*</small></label>
                    <input class="form-control" type="text" name="no_telp" id="no_telp" value="{{ !empty($data->no_telp)? $data->no_telp : ''}}" placeholder="No Telp">
                </div>
                <div class="col-md-4">
                    <label>TMT Guru</label>
                    <input class="form-control" type="text" name="tmt_guru" id="tmt_guru" value="{{ !empty($data->tmt_guru)? $data->tmt_guru : ''}}" placeholder="TMT Guru">
                </div>
                <div class="col-md-4">
                    <label>File TMT Guru</label>
                    <input class="form-control" type="file" name="file_tmt_guru" id="file_tmt_guru" value="{{ !empty($data->file_tmt_guru)? $data->file_tmt_guru : ''}}" placeholder="Upload File TMT Guru">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <label>Email Madrasah</label>
                    <input autocomplete="off" class="form-control" type="text" name="email_madrasah" id="email_madrasah" value="{{ !empty($data->email_madrasah)? $data->email_madrasah : ''}}" placeholder="Email Madrasah">
                </div>
                <div class="col-md-4">
                    <label>Tempat Lahir <small>*</small></label>
                    <input autocomplete="off" class="form-control" type="text" name="tempat_lahir" id="tempat_lahir" value="{{ !empty($data->tempat_lahir)? $data->tempat_lahir : ''}}" placeholder="Tempat Lahir">
                </div>
                <div class="col-md-4">
                    <label>Tanggal Lahir <small>*</small></label>
                    <input autocomplete="off" class="form-control" type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{ !empty($data->tanggal_lahir)? $data->tanggal_lahir : ''}}" placeholder="Tanggal Lahir">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-8">
                    <label>Alamat <small>*</small></label>
                    <input autocomplete="off" class="form-control" type="text" name="alamat" id="alamat" value="{{ !empty($data->alamat)? $data->alamat : ''}}" placeholder="Alamat">
                </div>
                <div class="col-md-4">
                    <label>Foto Diri</label>
                    <input class="form-control" type="file" name="foto" id="foto" value="{{ !empty($data->foto)? $data->foto : ''}}" placeholder="Upload Foto">
                </div>
            </div>
        </form>
    </div>
    <div class="card-footer">
        {{-- <button class="btn btn-secondary editDataDiri" type="button">EDIT</button> --}}
        <button class="btn btn-success simpanDataDiri" type="button">SIMPAN</button>
    </div>
</div>