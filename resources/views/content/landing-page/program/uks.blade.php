@extends('layout.landing-page.main')

@push('style')
	<link href="{{asset('plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet">
	<style>
	/* Slider start */
		.slider-clink{
			text-decoration: none;
			color: white;
		}
		.slider-clink:hover{
			color: #a2b9ff;
		}
		.slider-card {
			background: rgb(172,197,19);
			background: linear-gradient(180deg, rgba(172,197,19,1) 0%, rgba(41,105,161,1) 100%);
			border: 1px solid #ddd;
			padding: 25px;
			margin-bottom: 16px;
			-webkit-transition: all 450ms ease-in-out;
			-moz-transition: all 450ms ease-in-out;
			-o-transition: all 450ms ease-in-out;
			-ms-transition: all 450ms ease-in-out;
			transition: all 450ms ease-in-out;
		}
		.hero-section{
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

	.bg-second-section{
		background-color: var(--custom-bg-section);
	}

	.text-color{
		color: var(--text-color)
	}

	.gradient{
		background-image: linear-gradient(to right, #97E2A8, #ffffff);
		border-radius: 5px;
	}

	/* Section 2 start */
	/* Section 2 end */
	.img-shadow{
		box-shadow: 3px 3px 10px #ccc;
		border-radius: 10px;
	}


	.overlay-content{
		position: absolute; 
		background: rgb(255,255,255);
		background: linear-gradient(180deg, rgba(255,255,255,0) 0%, rgba(160,166,227,1) 100%);
		display: flex;
		align-items: center;
		justify-content: center;
	}
	.overlay-card{
		left: 20px;
		right: 20px;
		margin-bottom: 30px;
		bottom: 0;
		border-radius: 0px 0px 5px 5px;
		padding: 80px 0px 30px 0px;
	}

	.text-overlay{
		color: white;
		margin-bottom: -25px;
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
							<h3 class="h3-sm mt-4"><b>UKS</b></h3>
						<h4 class="m-0 fw7">MTs Al-Multazam</h4>
						</div>
					</div>
				</div>
				<div class="col-lg-3 justify-content-end">
					<div class="row">
						<div class="col-md-12">
							<h1 class="h3-sm mt-4" style="font-size: 60px; color: #D9D9D9"><b>PROGRAM</b></h1>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-8 mt-4">
					
                    <img class="img" src="{{asset('landing-page/images/slider/slide-2.jpg')}}" alt="contacts-icon" style="margin-bottom: 30px; width: 100%; border-radius: 15px">
					<section id="contacts-2" class="contacts-section division">
						<p>
							Usaha Kesehatan Sekolah disingkat UKS adalah program pemerintah untuk meningkatkan pelayanan 
							kesehatan, pendidikan kesehatan dan pembinaan lingkungan sekolah sehat atau kemampuan hidup sehat 
							bagi warga sekolah. Melalui Program UKS diharapkan dapat meningkatkan pertumbuhan dan perkembangan
							peserta didik yang harmonis dan optimal, agar menjadi sumber daya manusia yang berkualitas. Pada 
							tahun 1956 Usaha Kesehatan Sekolah mulai dirintis melalui project pilot di Jakarta dan Bekasi yang 
							merupakan kerjasama antara Departemen Kesehatan, Departemen Pendidikan dan Kebudayaan dan Departemen 
							Dalam Negeri. Proyek ini dilaksankan dalam dua bentuk yaitu UKS perkotaan di Jakarta dan UKS 
							pedesaan di Bekasi. 15 tahun kemudian, tepatnya pada tahun 1970 dibentuk Panitia Bersama UKS antara 
							Departemen Kesehatan dan Departemen Pendidikan dan Kebudayaan. 10 Tahun kemudian (1980) karena
							manfaat dan perkembangnnya yang dibutuhkan maka program UKS dikuatkan dengan Keputusan Bersama 
							Menteri Pendidikan dan Kebudayaan dan Menteri Kesehatan tentang pembentukan kelompok kerja UKS. Tahun
							1982 sampai 2003 Tahun 1982 ditandatangani Piagam Kerjasama antara Direktur Jenderal Pembinaan 
							Kesehatan Masyarakat Departemen Kesehatan dan Direktur Jenderal Pembinaan Kelembagaan Agama Islam 
							Departemen Agama, tentang Pembinaan Kesehatan Anak dan Perguruan Agama Islam. Guna memantapkan 
							pembinaan UKS secara terpadu, maka Tahun 1984 diterbitkanlah Surat Keputusan Bersama (SKB 4 Menteri) 
							antara Menteri Pendidikan Dan Kebudayaan, Menteri Kesehatan, Menteri Agama dan Menteri Dalam Negeri
							Republik Indonesia. Pada tahun 2003, seiring dengan perubahan system pemerintahan di Indonesia dari
							sentralisasi menjadi desentralisasi dan perkembangan di bidang pendidikan dan kesehatan, maka dilakuk </p>
					</section>
				</div>
							
				<div class="col-md-4 mt-4" style="padding-left: 30px;">
					<div class="row gradient">
						<div class="col-md-12 my-3">
							<h1>Pengumuman Guru</h1>
						</div>
					</div>
					<div class="row d-flex align-items-center">
						<div class="col-lg-12">
							<div class="contact-box">
								<div class="row">
									<div class="col-md-3 mtb-auto">
										<img class="img-80" src="{{asset('landing-page/images/pengumuman.png')}}" alt="contacts-icon">
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
										<img class="img-80" src="{{asset('landing-page/images/pengumuman.png')}}" alt="contacts-icon">
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
										<img class="img-80" src="{{asset('landing-page/images/pengumuman.png')}}" alt="contacts-icon">
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
										<img class="img-80" src="{{asset('landing-page/images/pengumuman.png')}}" alt="contacts-icon">
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
										<img class="img-80" src="{{asset('landing-page/images/pengumuman.png')}}" alt="contacts-icon">
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

