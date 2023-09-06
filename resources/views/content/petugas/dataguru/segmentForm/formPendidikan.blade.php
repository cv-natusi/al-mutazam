<div class="card mb-3" style="width: 100%; background-color:#ffffff">
    <div class="card-header bg-card">	
        <h5 class="text-card">DATA PENDIDIKAN DAN PEKERJAAN</h5>
    </div>
    <div class="card-body">
        <form class="formDataPendidikan">
            <div class="row mb-3">
                <div class="col-md-8">
                    <label>Mata Pelajaran Yang Diajar</label>
                    <select class="form-control" id="mata_pelajaran" name="mata_pelajaran">
                    </select>
                </div>
                <div class="col-md-2">
                    <label>Jumlah Jam <small>*</small></label>
                    <input autocomplete="off" class="form-control" type="number" name="jumlah_jam" id="jumlah_jam" value="{{ !empty($data->jumlah_jam)? $data->jumlah_jam : ''}}" placeholder="0">
                </div>
                <div class="col-md-2">
                    <button type="button" style="margin-top: 20px;" class="btn btn-primary" id="addDataPendidikan">ADD</button>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12">
                    <table class="table" id="tableMapel" style="font-size: 12px;">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Mata Pelajaran</th>
                                <th scope="col">Jumlah Jam</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label>Potensi Bidang</label>
                    <select name="potensi_bidang" id="potensi_bidang" class="form-control">
                        <option value="">.:: Pilih ::.</option>
                        <option value="potensi">Potensi Bidang</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label>No. Sertifikat Pendidik</label>
                    <input type="text" name="no_sertifikat_pendidik" id="no_sertifikat_pendidik" placeholder="No. Sertifikat Pendidik" class="form-control">
                </div>
                <div class="col-md-4">
                    <label>Sertifikasi</label>
                    <input type="text" name="sertifikasi" id="sertifikasi" placeholder="Sertifikasi" class="form-control">
                </div>
            </div>
        </form>
    </div>
    <div class="card-footer">
        <button class="btn btn-secondary editDataPendidikan" type="button">EDIT</button>
        <button class="btn btn-success simpanDataPendidikan" type="button">SIMPAN</button>
    </div>
</div>