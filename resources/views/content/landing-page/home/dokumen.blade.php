@extends('layout.landing-page.main')

@push('style')
    <style>
        /*Btn */
        .btn {
            background-color: #337CCF;
            border: none;
            color: white;
            padding: 16px 40px;
            width: 191px;
            text-align: center;
            font-size: 12px;
            margin: 4px 2px;
            opacity: 1;
            transition: 0.3s;
        }

        .btn:hover {
            opacity: 0.6
        }

        .berita-bg {
            background-color: #d6e4d0;
            border-radius: 5px;
        }
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="{{ asset('plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">
@endpush

@section('content')
    <section id="hero-1" class="hero-section division">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="h3-sm mt-4"><b>DOKUMEN TENDIK</b></h3>
                            <h4 class="m-0 fw7">MTs Al-Multazam</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 justify-content-end">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="h3-sm mt-4" style="font-size: 60px; color: #D9D9D9"><b>DOKUMEN</b></h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-2 g-4 mt-20">
                <div class="col-lg-8">
                    @foreach ($dokumen as $key => $val)
                        <div class="row d-flex align-items-center mb-4 berita-bg">
                            <div class="col-lg-12">
                                <div class="contact-box">
                                    <div class="row">
                                        <div class="col-md-3 mtb-auto">
                                            <img class="mx-auto d-block responsive img-fluid"
                                                src="{{ asset('landing-page/images/Mask.png') }}" alt="contacts-icon" style="height:100px; width:100px; object-fit: cover; border-radius: 5px;">
                                        </div>
                                        <div class="col-md-9 mtb-auto text-left">
                                            <span class="fw4">{{ substr($val->created_at,0,10) }}</span><br>
                                            <span style="font-weight: bold" class="fw5">{{ $val->nama_dokumen }}</span><br>
                                            <a href="javascript:void(0)" class="color-a" onclick="preDownloadFile('{{$val->file_dokumen}}')">[Download]</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="d-flex justify-content-center">
                        {!! $dokumen->links() !!}
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            <div
                                style="background: linear-gradient(90deg, #97E2A8 4.57%, rgba(217, 217, 217, 0) 76.75%); color: #000; padding: 5px">
                                <h3 style="margin-left: 10px">AMTV</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex align-items-center">
                        @if (count($amtvs) > 0)
                            @foreach ($amtvs as $idx => $amtv)
                                @php
                                    $url = explode('?v=', $amtv->file);
                                    $link = $url[count($url) - 1];
                                @endphp
                                <div class="col-lg-12">
                                    <div class="contact-box">
                                        <div class="row">
                                            <div class="col-md-3 mtb-auto">
                                                <iframe class="img-80"
                                                    src="http://www.youtube.com/embed/{{ $link }}" frameborder="0"
                                                    allowfullscreen>
                                                </iframe>

                                            </div>
                                            <div class="col-md-9 mtb-auto text-left">
                                                <span class="fw4">{{ $amtv->judul_amtv }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @include('content.landing-page.home.modal-login')
    </section>
@endsection

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        function preDownloadFile(param) {
            $("#modal-login").show();
            $('#filename').val(param);
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
        function downloadFile() {
            var filename = $('#filename').val();
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
                },
                error: function() {
                    Swal.fire('Gagal mengunduh file PDF.');
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
