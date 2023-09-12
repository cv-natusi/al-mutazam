@extends('layout.landing-page.main')

@push('style')
    <link href="{{ asset('plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        /* Slider start */
        .slider-clink {
            text-decoration: none;
            color: white;
        }

        .slider-clink:hover {
            color: #a2b9ff;
        }

        .slider-card {
            background: rgb(172, 197, 19);
            background: linear-gradient(180deg, rgba(172, 197, 19, 1) 0%, rgba(41, 105, 161, 1) 100%);
            border: 1px solid #ddd;
            padding: 25px;
            margin-bottom: 16px;
            -webkit-transition: all 450ms ease-in-out;
            -moz-transition: all 450ms ease-in-out;
            -o-transition: all 450ms ease-in-out;
            -ms-transition: all 450ms ease-in-out;
            transition: all 450ms ease-in-out;
        }

        .hero-section {
            margin-top: 80px;
        }

        .slider {
            position: relative;
            max-width: 100%;
            height: 600px;
            margin-top: 10px;
        }

        .slider .slides li img {
            background-position: center;
        }

        /* Slider end */

        .bg-second-section {
            background-color: var(--custom-bg-section);
        }

        .text-color {
            color: var(--text-color)
        }

        /* Section 2 start */
        /* Section 2 end */
        .img-shadow {
            box-shadow: 3px 3px 10px #ccc;
            border-radius: 10px;
        }

        .overlay-content {
            position: absolute;
            background: rgb(255, 255, 255);
            background: linear-gradient(180deg, rgba(255, 255, 255, 0) 0%, rgba(160, 166, 227, 1) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .overlay-card {
            left: 20px;
            right: 20px;
            margin-bottom: 30px;
            bottom: 0;
            border-radius: 0px 0px 5px 5px;
            padding: 80px 0px 30px 0px;
        }

        .text-overlay {
            color: white;
            margin-bottom: -25px;
        }

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
@endpush
@section('content')
    <section id="hero-1" class="hero-section division">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="h3-sm mt-4"><b>GALLERY</b></h3>
                            <h4 class="m-0 fw7">MTs Al-Multazam</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 justify-content-end">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="h3-sm mt-4" style="font-size: 65px; color: #D9D9D9"><b>GALLERY</b></h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-2 g-4 mt-20 ">
                @foreach ($galeries as $index => $galeri)
                    <div class="col-md-4 galery">
                        <div class="t-3-photo mb-25 image">
                            <img class="span img-shadow mx-auto d-block responsive img-thumbnail img-fluid"
                                src="{{ asset('uploads/galeri/' . $galeri->file_galeri) }}" alt="slide-background" style="width: 400px; height: 250px; object-fit:cover"
                                data-toggle="modal" data-target="#modal-detail" id="read-more-{{ $galeri->id_galeri }}"
                                onclick="modalShow(`{{ $galeri->id_galeri }}`)">
                            <h5 class="mt-3">{{ $galeri->deskripsi_galeri }}</h5>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="d-flex justify-content-center">
            {!! $galeries->links() !!}
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
                            {{-- <img src="{{ asset('landing-page/images/slider/slide-3.jpg') }}" alt=""> --}}
                            @if (file_exists(public_path() . '/uploads/galeri/' . $galeri->file_galeri))
                                <img class="mx-auto d-block responsive img-fluid" id="modal-img" width="400"
                                    height="auto" src="{{ asset('uploads/galeri/' . $galeri->file_galeri) }}"
                                    alt="team-member-foto">
                            @else
                                <img class="mx-auto d-block responsive img-fluid" src="{{ asset('default.jpg') }}"
                                    alt="team-member-foto">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        async function modalShow(id) {
            try {
                await $.ajax({
                    url: '{{ route('galeri.searchGaleri') }}',
                    type: 'POST',
                    data: {
                        id: id
                    },
                }).done(async (data, textStatus, xhr) => {
                    const code = xhr.status
                    const rootDir = '{{ URL::asset('/uploads/galeri') }}'
                    const defaultDir = '{{ URL::asset('') }}'
                    if (code !== 200) {
                        await Swal.fire({
                            icon: 'info',
                            title: 'Whoops..',
                            text: 'Data not found',
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                        })
                        return false
                    }
                    //await $('.modal-title').text(data.response.kategori_galeri)
                    await $('#modal-img').attr('src', `${rootDir}/${data.response.file_galeri}`)
                    // await $('#event-text').html(data.response.deskripsi_galeri)
                    await $('#modal-img').on('error', async () => {
                        await $('#modal-img').attr('src', `${defaultDir}/default.jpg`)
                    })
                    $('.modal').fadeIn("slow")
                })
            } catch (error) {
                await Swal.fire({
                    icon: 'error',
                    title: 'ERROR!',
                    text: error.responseJSON.metadata.message,
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                })
            }
        }

        $(document).ready(() => {
            $('.close-modal').click(() => {
                $('.modal').fadeOut("slow")
                location.reload()
            })

            var maxWord = 15;
            $(".content").each(function() {
                var myStr = $(this).html()
                var id = $(this).data('id')
                if (myStr.split(' ').length > maxWord) {
                    var arrStr = myStr.split(' ')

                    var newStr = filterArray(arrStr, maxWord, `first`)
                    var removedStr = filterArray(arrStr, maxWord, 'second')

                    newStr = newStr.join(' ')
                    removedStr = removedStr.join(' ')

                    $(this).empty().html(newStr + '...')
                    $(this).data('first', newStr + '...')
                    $(this).data('second', ' ' + removedStr)
                }
            })
        })

        function filterArray(array, num, prefix) {
            var arrStr = $.grep(array, function(v, i) {
                if (prefix === 'first') {
                    if (i < num) {
                        return v.indexOf('1');
                    }
                } else {
                    if (i >= num) {
                        return v.indexOf('1');
                    }
                }
            })
            return arrStr
        }

        function readMore(id) {
            var textButton = $(`#read-more-${id}`).text()
            var firstText = $(`#content-${id}`).data('first')
            var secondText = $(`#content-${id}`).data('second')
            if (textButton === '[Baca Selengkapnya]') {
                $(`#content-${id}`).empty().html(firstText.slice(0, -3) + secondText)
                $(`#read-more-${id}`).text('[Baca Lebih Sedikit]')
            } else {
                $(`#content-${id}`).empty().html(firstText)
                $(`#read-more-${id}`).text('[Baca Selengkapnya]')
            }
        }
    </script>
@endpush
