<style>
    body {
        font-family: 'Varela Round', sans-serif;
    }

    .modal-confirm {
        color: #434e65;
        width: 525px;
    }

    .modal-confirm .modal-content {
        padding: 20px;
        font-size: 16px;
        border-radius: 5px;
        border: none;
    }

    .modal-confirm .modal-header {
        background: white;
        border-bottom: none;
        position: relative;
        text-align: center;
        margin: -20px -20px 0;
        border-radius: 5px 5px 0 0;
        padding: 35px;
    }

    .modal-confirm h4 {
        text-align: center;
        font-size: 36px;
        margin: 10px 0;
    }

    .modal-confirm .form-control,
    .modal-confirm .btn {
        min-height: 40px;
        border-radius: 3px;
    }

    .modal-confirm .btn-close {
        position: absolute;
        top: 15px;
        right: 15px;
        color: white;
        text-shadow: none;
        opacity: 0.5;
    }

    .h5 {
        position: left;
        top: 15px;
        right: 15px;
        color: black;
        text-shadow: none;
        opacity: 0.5;
    }

    .modal-confirm .close:hover {
        opacity: 0.8;
    }

    .modal-confirm .icon-box {
        color: #fff;
        width: 95px;
        height: 95px;
        display: inline-block;
        border-radius: 50%;
        z-index: 9;
        border: 5px solid #fff;
        padding: 15px;
        text-align: center;
    }

    .modal-confirm .icon-box i {
        font-size: 64px;
        margin: -4px 0 0 -4px;
    }

    .modal-confirm.modal-dialog {
        margin-top: 80px;
    }

    .modal-confirm .btn,
    .modal-confirm .btn:active {
        color: #878787;
        background: #D9D9D9 !important;
        text-decoration: none;
        transition: all 0.4s;
        line-height: normal;
        border-radius: 5px;
        margin-top: 10px;
        padding: 6px 20px;
        border: none;
    }

    .modal-confirm .btn:hover,
    .modal-confirm .btn:focus {
        outline: none;
    }

    .modal-confirm .btn span {
        margin: 1px 3px 0;
        float: left;
    }

    .modal-confirm .btn i {
        margin-left: 1px;
        font-size: 20px;
        float: right;
    }

    .trigger-btn {
        display: inline-block;
        margin: 100px auto;
    }

    .small-text {
        text-align: left;
        color: black;
    }
</style>

<!-- Modal HTML -->
@if ($message = Session::get('success'))
    <div class="alert alert-succes" role="alert">
        <strong>{{ $message }}</strong>
    </div>
    @foreach (\Session::get('file') as $files)
        <img src="assets/images/{{ $files }}">
    @endforeach
@endif
<form method="post" action="{{ url('file-store') }}" enctype="multipart/form-data">
    <div id="ModalCreate" class="modal">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="justify-content-start">
                    <small class="small-text">Upload File :</small>
                    <small class="small-text"><br><b>Kartu Tanda Penduduk (KTP)</b></small>
                </div>
                <div class="text-center">
                    <i class='bx bxs-cloud-upload' style="color:#0e8ed8; font-size: 100px"></i>
                    <small class="small-text" style="font-size: 20px;"><br><b>Drag and Drop
                            File</b></small>
                    <p>atau</p>
                    <input type="file" name="file[]" class="form-control" multiple>
                    @error('file.*')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <button type="submit">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>