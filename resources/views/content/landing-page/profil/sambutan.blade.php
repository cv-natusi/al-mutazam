@extends('layout.landing-page.main')

@push('style')
	<link href="{{asset('plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet">
@endpush

@section('content')
	<section id="hero-1" class="hero-section division">
		<div class="container">
		<div class="row">
				<div class="col-lg-9">
					<div class="row">
						<div class="col-md-12">
							<h3 class="h3-sm mt-4"><b>SAMBUTAN KEPALA SEKOLAH</b></h3>
							<h4 class="m-0 fw7">MTs Al-Multazam</h4>
						</div>
					</div>
				</div>
				<div class="col-lg-3 justify-content-end">
					<div class="row">
						<div class="col-md-12">
							<h1 class="h3-sm mt-4" style="font-size: 60px; color: #D9D9D9"><b>PROFIL</b></h1>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-8 mt-4">
					
                    <img class="img" src="{{asset('uploads/identitas/'.$identity->foto_kepsek)}}" alt="contacts-icon" style="margin-bottom: 30px; width: 100%; border-radius: 15px">
					<section id="contacts-2" class="contacts-section division">
						<p>{!! $identity->sambutan_kepsek !!}</p>
					</section>
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
                                    <li>
                                        <a href="{{route('profil.sejarah')}}">Sejarah</a>
                                    </li>
                                </div>
                                <div class="row">
                                    <li>
                                        <a href="{{route('profil.visimisi')}}">Visi dan Misi</a>
                                    </li>
                                </div>
                                <div class="row">
                                    <li>
                                        <a href="{{route('profil.sambutan')}}">Sambutan Kepala Madrasah</a>
                                    </li>
                                </div>
                                <div class="row">
                                    <li>
                                        <a href="{{route('profil.struktur')}}">Struktur organisasi</a>
                                    </li>
                                </div>
                                <div class="row">
                                    <li>
                                        <a href="{{route('profil.struktural')}}">Profil Struktural</a>
                                    </li>
                                </div>
                                <div class="row">
                                    <li>
                                        <a href="{{route('profil.fasilitas')}}">Fasilitas Madrasah</a>
                                    </li>
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
                            @endforeach
                        @endif
					</div>
					<div class="row gradient"><!--Dokumen-->
						<div class="col-md-12 my-3">
							<h1>Dokumen</h1>
						</div>
					</div>
					<div class="row d-flex align-items-center">
						<div class="col-lg-12">
							<div class="contact-box">
								<div class="row">
									<div class="col-md-3 mtb-auto">
										<img class="img-80" src="{{asset('landing-page/images/mask.png')}}" alt="contacts-icon">
									</div>
									<div class="col-md-9 mtb-auto text-left">
										<span class="fw4">Panduan Pembuatan Soal Ujian Tahun 2036/2027 Link Download File<br>
											<a href="" class="color-a">[Link Download File]</a>
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
										<img class="img-80" src="{{asset('landing-page/images/mask.png')}}" alt="contacts-icon">
									</div>
									<div class="col-md-9 mtb-auto text-left">
										<span class="fw4">Panduan Pembuatan Soal Ujian Tahun 2036/2027 Link Download File<br>
											<a href="" class="color-a">[Link Download File]</a>
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
										<img class="img-80" src="{{asset('landing-page/images/mask.png')}}" alt="contacts-icon">
									</div>
									<div class="col-md-9 mtb-auto text-left">
										<span class="fw4">Panduan Pembuatan Soal Ujian Tahun 2036/2027 Link Download File<br>
											<a href="" class="color-a">[Link Download File]</a>
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
										<img class="img-80" src="{{asset('landing-page/images/mask.png')}}" alt="contacts-icon">
									</div>
									<div class="col-md-9 mtb-auto text-left">
										<span class="fw4">Panduan Pembuatan Soal Ujian Tahun 2036/2027 Link Download File<br>
											<a href="" class="color-a">[Link Download File]</a>
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
										<img class="img-80" src="{{asset('landing-page/images/mask.png')}}" alt="contacts-icon">
									</div>
									<div class="col-md-9 mtb-auto text-left">
										<span class="fw4">Panduan Pembuatan Soal Ujian Tahun 2036/2027 Link Download File<br>
											<a href="" class="color-a">[Link Download File]</a>
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
	</section>
@endsection

