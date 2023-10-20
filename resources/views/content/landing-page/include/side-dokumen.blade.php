<div class="row gradient"><!--Dokumen-->
    <div class="col-md-12 my-3">
        <h1>Dokumen</h1>
    </div>
</div>
<div class="row d-flex align-items-center">
    @foreach ($dokumen as $dok)
    <div class="col-lg-12">
        <div class="contact-box">
            <div class="row">
                <div class="col-md-3 mtb-auto">
                    <img class="img-80" src="{{ asset('landing-page/images/Mask.png') }}" alt="contacts-icon">
                </div>
                <div class="col-md-9 mtb-auto text-left">
                    <span class="fw4">{{ $dok->nama_dokumen }}</span><br>
                    <a href="javascript:void(0)" class="color-a" onclick="preDownloadFile('{{$dok->file_dokumen}}')">[Link Download File]</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@include('content.landing-page.home.modal-login')
@push('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function preDownloadFile(param) {
        var AuthUser = "{{{ (Auth::user()) ? Auth::user() : null }}}";
		console.log(AuthUser)
		if (AuthUser!='') {
			downloadFile(param)
		} else {
			$("#modal-login").show();
			$('#filename').val(param);	
		}
    }
    $('#btn-login').click(function (e) {
        var data  = new FormData($('.formLogin')[0]);
        $.ajax({
            url: "{{ route('home.doLoginDownload') }}",
            type: 'POST',
            data: data,
            async: true,
            cache: false,
            contentType: false,
            processData: false
        }).done(function(data){
            if(data.code=='200'){
                downloadFile()
            } else {
                Swal.fire('Whoops !', data.message, 'error');
            }
        }).fail(function() {
            Swal.fire("MAAF !","Terjadi Kesalahan, Silahkan Ulangi Kembali !!", "error");
        });
    });
    function downloadFile(filename='') {
		if (filename!='') {
			var filename = filename;
		} else {
			var filename = $('#filename').val();
		}
        var url = "{{ route('home.downloadPdf', ':filename') }}";
        url = url.replace(':filename', filename);

        $.ajax({
            url: url,
            method: 'GET',
            xhrFields: {
                responseType: 'blob' // Format respons sebagai blob
            },
            success: function(response) {
                var blob = new Blob([response], { type: 'application/pdf' });
                var link = document.createElement('a');
                link.href = window.URL.createObjectURL(blob);
                link.download = filename;
                link.click();
				$('#modal-login').fadeOut("slow")
				location.reload()
            },
            error: function() {
                Swal.fire('Maaf!','Gagal mengunduh file PDF, Berkas tidak ada.','error');
            }
        });
	}
    $(document).ready(() => {
        $("#modal-login").hide();
        $('.close-modal').click(() => {
            $('.modal').fadeOut("slow")
            location.reload()
        })
    })
</script>
@endpush