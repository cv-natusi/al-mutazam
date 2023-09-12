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
                            <h3 class="h3-sm mt-4"><b>PENGUMUMAN</b></h3>
                            <h4 class="m-0 fw7">MTs Al-Multazam</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 justify-content-end">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="h3-sm mt-4" style="font-size: 60px; color: #D9D9D9"><b>PENGUMUMAN</b></h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-2 g-4 mt-20">
                <div class="col-lg-8">
                    @foreach ($pengumuman as $key => $val)
                        <div class="row d-flex align-items-center mb-4 berita-bg">
                            <div class="col-lg-12">
                                <div class="contact-box">
                                    <div class="row">
                                        <div class="col-md-3 mtb-auto">
                                            <img class="mx-auto d-block responsive img-fluid"
                                                src="{{ asset('uploads/berita/' . $val->gambar) }}" alt="contacts-icon" style="height:100px; width:100px; object-fit: cover; border-radius: 5px;">
                                        </div>
                                        <div class="col-md-9 mtb-auto text-left">
                                            <span class="fw4">
                                                {{ $val->tanggal }}<br>
                                            </span>
                                            <span class="fw5">
                                                {{ $val->judul }}<br>
                                            </span>
                                            <a href="javascript:void(0)" data-toggle="modal" data-target="#modal-detail"
                                                id="read-more-{{ $val->id_berita }}"
                                                onclick="modalShow(`{{ $val->id_berita }}`)" class="color-a">[lihat]</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="d-flex justify-content-center">
                        {!! $pengumuman->links() !!}
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            <div
                                style="background: linear-gradient(90deg, #97E2A8 4.57%, rgba(217, 217, 217, 0) 76.75%); color: #000; padding: 5px">
                                <h3 style="margin-left: 10px">Dokumen</h3>
                            </div>
                        </div>
                    </div>
                    @foreach ($pengumuman as $key => $val)
                        <div class="row d-flex align-items-center">
                            <div class="col-lg-12">
                                <div class="contact-box">
                                    <div class="row">
                                        <div class="col-md-3 mtb-auto">
                                            <img class="img-80" src="{{ asset('landing-page/images/mask.png') }}"
                                                alt="contacts-icon">
                                        </div>
                                        <div class="col-md-9 mtb-auto text-left">
                                            <span class="fw4">
                                                {{ $val->judul }}<br>
                                                <a href="javascript:void(0)" class="color-a">[Baca Selengkapnya]</a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="row">
                        <div class="col-md-12">
                            <a href="javascript:void(0)" class="color-a fw6"><i>LIHAT LAINNYA ...</i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal-detail" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #5A79CB;">
                        <h5 style="color: white;">PENGUMUMAN</h5>
                        <button type="button" class="close-modal btn-x">
                            <i class="far fa-times-circle fwhite" style="font-size: 25px;"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="contact-box">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="fw5" id="modal-title" style="color: black; margin-top: -25px;">
                                        {{ $val->judul }}
                                    </h5>
                                </div>
                                <div class="col-md-12 mtb-auto">
                                    @if (file_exists(public_path() . '/uploads/berita/' . $val->gambar))
                                        <img class="mx-auto d-block responsive img-fluid" id="modal-img" width="400"
                                            height="auto" src="{{ asset('uploads/berita/' . $val->gambar) }}"
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
                    url: '{{ route('home.searchPengumuman') }}',
                    type: 'POST',
                    data: {
                        id: id
                    },
                }).done(async (data, textStatus, xhr) => {
                    const code = xhr.status
                    const rootDir = '{{ URL::asset('/uploads/berita') }}'
                    const defaultDir =
                        '{{ URL::asset('') }}'
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
                    await $('.modal-title').text(data.response.judul)
                    await $('#modal-img').attr('src', `${rootDir}/${data.response.gambar}`)
                    await $('#event-text').html(data.response.isi)
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
