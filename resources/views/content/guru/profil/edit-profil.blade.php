@extends('layout.master.main')

@push('style')
<style>
    .card-title {
        margin-top: 40px;
    }
</style>
@endpush

@section('content')
<div class="page-content">
    @include('include.master.breadcrumb')

    <div class="row">
        <div class="col-md-12">
            <div class="card" style="background: #ffffff">
                <div class="card-body">
                    <div class="my-3 mx-3">
                        <div class="row">
                            <div class="row">
                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Nomor Induk Kependudukan (NIK) *</label>
                                        <input type="text" name="firstName" class="form-control" placeholder="placeholder" required="">
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">NIP *</label>
                                        <input type="text" name="lastName" class="form-control" placeholder="placeholder" required="">
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Nama Lengkap *</label>
                                        <input type="text" name="place" class="form-control" placeholder="placeholder" required="">
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Tanggal Lahir *</label>
                                        <div class="input-group">
                                            <input type="email" class="form-control" id="inputGroupPrepend2" aria-describedby="inputGroupPrepend2" placeholder="placeholder" required="">
                                            <div class="input-group-text" id="btnGroupAddon"><i class='bx bxs-calendar'></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Foto *</label>
                                        <div class="input-group">
                                            <input type="email" class="form-control" id="inputGroupPrepend2" aria-describedby="inputGroupPrepend2" placeholder="placeholder" required="">
                                            <div class="input-group-text" id="btnGroupAddon">Pilih</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Alamat *</label>
                                        <input type="text" name="place" class="form-control" placeholder="placeholder" required="">
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Provinsi *</label>
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected>placeholder</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Kabupaten *</label>
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected>placeholder</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Kecamatan *</label>
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected>placeholder</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Desa / Kelurahan *</label>
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected>placeholder</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">No Telepon *</label>
                                        <input type="email" class="form-control" id="inputGroupPrepend2" aria-describedby="inputGroupPrepend2" placeholder="placeholder" required="">
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Email</label>
                                        <input type="text" name="phoneNumber" class="form-control" placeholder="Upload File" required="">
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Tugas Utama *</label>
                                        <input type="text" name="place" class="form-control" placeholder="placeholder" required="">
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Tugas Tambahan</label>
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected>Multiple Pilihan / Tidak Boleh Memilih</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">SUBMINKAL</label>
                                        <input type="email" class="form-control" id="inputGroupPrepend2" aria-describedby="inputGroupPrepend2" placeholder="placeholder" required="">
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">TMTA Awal</label>
                                        <div class="input-group">
                                            <input type="email" class="form-control" id="inputGroupPrepend2" aria-describedby="inputGroupPrepend2" placeholder="placeholder" required="">
                                            <div class="input-group-text" id="btnGroupAddon"><i class='bx bxs-calendar'></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <div class="mb-0">
                                        <label class="text-label form-label">Status Guru</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                            Aktif
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                            Tidak Aktif
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <a href="{{route('editprofilGuru')}}" type="button" class="btn" style="background-color: #62A044; color:white; border-radius: 10px;">Simpan</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection