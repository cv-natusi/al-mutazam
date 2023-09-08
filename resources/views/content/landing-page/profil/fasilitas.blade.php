@extends('layout.landing-page.main')

@push('style')
    <link href="{{ asset('plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">
    <style>
        .galery .image img {
            transition: all o.5s ease;
        }

        .galery .image:hover img {
            transform: scale(1.1);
        }

        .galery span {
            overflow: hidden;
        }

        .img-box .slide {
            position: absolute;
            top: 50%;
            cursor: pointer;
            color: #ffffff;
            font-size: 30px;
            transform: translateY(-50%);
            width: 60px;
            height: 50px;
            line-height: 50px;
            text-align: center;
        }

        .image-box .slide.prev {
            left: 0;
            padding: 0, 0, 0, 50px;
        }

        .image-box .slide.prev {
            right: 0;
        }

        .preview-box .img-box img {
            width: 100%;
            border-radius: 0 0 3px 3px;
        }
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
@endpush
@section('content')
    <section id="hero-1" class="hero-section division">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="h3-sm mt-4"><b>FASILITAS MADRASAH</b></h3>
                            <h4 class="m-0 fw7">MTs Al-Multazam</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 justify-content-end">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="h3-sm mt-4" style="font-size: 65px; color: #D9D9D9"><b>PROFIL</b></h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-2 g-4 mt-20 ">
                @foreach ($fasilitas as $index => $f)
                    <div class="col-md-4 galery">
                        <div class="t-3-photo mb-25 image">
                            <img class="span img-shadow mx-auto d-block responsive img-thumbnail img-fluid"
                                src="{{ asset('uploads/exkul/' . $f->foto) }}" alt="slide-background">
                            <h5 class="mt-3 text-center">{{ $f->nama_exkul }}</h5>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center">
                {!! $fasilitas->links() !!}
            </div>
        </div>
    </section>
@endsection
