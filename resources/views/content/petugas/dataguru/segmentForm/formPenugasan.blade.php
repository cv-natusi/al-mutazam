<div class="card mb-3" style="width: 100%; background-color:#ffffff">
    <div class="card-header bg-card">	
        <h5 class="text-card">PENUGASAN</h5>
    </div>
    <div class="card-body">
        <form class="row mb-3 formDataPendidikan">
            <div class="row mb-3">
                <label>Tugas Utama</label>
                <select name="tugas_utama" id="tugas_utama" class="form-control">
                    <option value="">.:: Pilih ::.</option>
                </select>
            </div>
            <div class="row mb-3">
                <div class="col-md-10">
                    <label>
                        Tugas Tambahan
                    </label>
                    <select class="form-control" id="tugas_tambahan" name="tugas_tambahan">
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="button" style="margin-top: 20px;" class="btn btn-primary" id="addTugasTambahan">ADD</button>
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
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    </div>
    <div class="card-footer">
        <button class="btn btn-secondary editPenugasan" type="button">EDIT</button>
        <button class="btn btn-success simpanPenugasan" type="button">SIMPAN</button>
    </div>
</div>