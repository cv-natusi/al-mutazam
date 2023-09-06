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
                                            data-toggle="modal" data-target="#modal-detail"
                                            id="read-more-{{ $eks->id_exkul }}" onclick="modalShow(`{{ $eks->id_exkul }}`)">
                                        {{-- <a href="javascript:void(0)" id="read-more-{{ $eks->id_exkul }}"
                                            onclick="modalShow(`{{ $eks->id_exkul }}`)" class="color-a">[Baca
                                            Selengkapnya]</a> --}}
                                        <button class="btn" type="button">{{ $eks->nama_exkul }}</button>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="d-flex justify-content-center">
                        {!! $ekskul->links() !!}
                    </div>
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
        <div class="modal fade" id="modal-detail" tabindex="-1" aria-labelledby="modal-detailLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #5A79CB;">
                        {{-- <h5><b>{{$eks->nama_exkul}}</b></h5>
								<div class="text-justify content" id="content-{{$eks->id_exkul}}" data-id="{{$eks->id_exkul}}">
									{!!$eks->deskripsi!!}
								</div> --}}
                        <h5 class="modal-title fs-5" id="modal-title" style="color: white;">{{ $eks->nama_exkul }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </div>
                    <div class="modal-body">
                        <div class="contact-box">
                            <div class="row">
                                <div class="col-md-3 mtb-auto">
                                    <img class="mx-auto d-block responsive img-fluid" id="modal-img" width="400"
                                        height="auto" src="{{ asset('uploads/exkul/' . $eks->foto) }}"
                                        alt="team-member-foto">
                                </div>
                                <div class="col-md-9 mtb-auto text-left" id="event-text">
                                    <span class="fw4">{{ $eks->deskripsi }}<br></span>
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
                    url: '{{ route('program.searchEkskul') }}',
                    type: 'POST',
                    data: {
                        id: id
                    },
                }).done(async (data, textStatus, xhr) => {
                    const code = xhr.status
                    const rootDir = '{{ URL::asset(' / uploads / exkul ') }}'
                    const defaultDir = '{{ URL::asset(' / ') }}'
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
                    await $('.modal-title').text(data.response.nama_exkul)
                    await $('#modal-img').attr('src', `${rootDir}/${data.response.foto}`)
                    await $('#event-text').html(data.response.deskripsi)
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
