@extends('layout.landing-page.main')

@push('style')
    <link href="{{ asset('plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"> --}}
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
    </style>
@endpush
@section('content')
    <section id="hero-1" class="hero-section division">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="h3-sm mt-4"><b>EKSTRAKURIKULER</b></h3>
                            <h4 class="m-0 fw7">MTs Al-Multazam</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 justify-content-end">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="h3-sm mt-4" style="font-size: 65px; color: #D9D9D9"><b>PROGRAM</b></h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-2 g-4 mt-20 ">
                <div class="col-md-8 mt-4">
                    <div class="row mb-4">
                        @if (count($ekskul) > 0)
                            @foreach ($ekskul as $index => $eks)
                                <div class="col-md-3">
                                    <div class="t-3-photo mb-25">
                                        <img class="img-shadow mx-auto d-block responsive img-thumbnail img-fluid"
                                            src="{{ asset('uploads/exkul/' . $eks->foto) }}" alt="slide-background"
                                            data-toggle="modal" data-target="#modal-detail">
                                        <button class="btn" type="button">{{ $eks->nama_exkul }}</button>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="d-flex justify-content-center">
                        {!! $ekskul->links() !!}
                    </div>

                    {{-- <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">‹</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">›</a>
                        </li>
                    </ul>
                </nav> --}}
                </div>
                <div class="col-md-4 mt-4" style="padding-left: 30px;">
                    <div class="row gradient"><!-- Menu Profil -->
                        <div class="col-md-12 my-3">
                            <h1>Menu Profil</h1>
                        </div>
                    </div>
                    <div class="row d-flex align-items-center">
                        <div class="col-lg-12">
                            <div class="contact-box">
                                <div class="row">
                                    <li>Sejarah</li>
                                </div>
                                <div class="row">
                                    <li>Visi dan Misi</li>
                                </div>
                                <div class="row">
                                    <li>Sambutan Kepada Kepala Madrasah</li>
                                </div>
                                <div class="row">
                                    <li>Struktur Organisasi</li>
                                </div>
                                <div class="row">
                                    <li>Profil Struktural</li>
                                </div>
                                <div class="row">
                                    <li>Fasilitas Madrasah</li>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row gradient"><!-- AMTV -->
                        <div class="col-md-12 my-3">
                            <h1>AMTV Terbaru</h1>
                        </div>
                    </div>
                    <div class="row d-flex align-items-center">
                        <div class="col-lg-12">
                            <div class="contact-box">
                                <div class="row">
                                    <div class="col-md-3 mtb-auto">
                                        <img class="img-80" src="{{ asset('landing-page/images/amtv.png') }}"
                                            alt="contacts-icon">
                                    </div>
                                    <div class="col-md-9 mtb-auto text-left">
                                        <span class="fw4">Sosialisasi Kegiatan Visi dan Misi SMAS Al-Multazam
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex align-items-center">
                        <div class="col-lg-12">
                            <div class="contact-box">
                                <div class="row">
                                    <div class="col-md-3 mtb-auto">
                                        <img class="img-80" src="{{ asset('landing-page/images/amtv.png') }}"
                                            alt="contacts-icon">
                                    </div>
                                    <div class="col-md-9 mtb-auto text-left">
                                        <span class="fw4">Sosialisasi Kegiatan Visi dan Misi SMAS Al-Multazam
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex align-items-center">
                        <div class="col-lg-12">
                            <div class="contact-box">
                                <div class="row">
                                    <div class="col-md-3 mtb-auto">
                                        <img class="img-80" src="{{ asset('landing-page/images/amtv.png') }}"
                                            alt="contacts-icon">
                                    </div>
                                    <div class="col-md-9 mtb-auto text-left">
                                        <span class="fw4">Sosialisasi Kegiatan Visi dan Misi SMAS Al-Multazam
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex align-items-center">
                        <div class="col-lg-12">
                            <div class="contact-box">
                                <div class="row">
                                    <div class="col-md-3 mtb-auto">
                                        <img class="img-80" src="{{ asset('landing-page/images/amtv.png') }}"
                                            alt="contacts-icon">
                                    </div>
                                    <div class="col-md-9 mtb-auto text-left">
                                        <span class="fw4">Sosialisasi Kegiatan Visi dan Misi SMAS Al-Multazam
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex align-items-center">
                        <div class="col-lg-12">
                            <div class="contact-box">
                                <div class="row">
                                    <div class="col-md-3 mtb-auto">
                                        <img class="img-80" src="{{ asset('landing-page/images/amtv.png') }}"
                                            alt="contacts-icon">
                                    </div>
                                    <div class="col-md-9 mtb-auto text-left">
                                        <span class="fw4">Sosialisasi Kegiatan Visi dan Misi SMAS Al-Multazam
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <a href="#" class="color-a fw6">LIHAT LAINNYA ...</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal-detail" tabindex="-1" aria-labelledby="modal-detailLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="preview-box">
                        <div class="details">
                            <span class="title">
                            </span>
                        </div>
                        <div class="img-box">
                            <div class="slide prev">
                                <i class="fas fa-angle-left"></i>
                            </div>
                            <div class="slide next" style="margin-left: 87%">
                                <i class="fas fa-angle-right"></i>
                            </div>
                            <img src="{{ asset('landing-page/images/slider/slide-3.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
