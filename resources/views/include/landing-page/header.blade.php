<header id="header" class="header white-menu navbar-dark">
	<div class="header-wrapper">
		<!-- MOBILE HEADER -->
		<div class="wsmobileheader clearfix">	
			<a id="wsnavtoggle" class="wsanimated-arrow"><span></span></a>
			<span class="smllogo smllogo-black"><img src="{{asset('landing-page/images/logo.png')}}" width="172" height="40" alt="mobile-logo"></span>
			<span class="smllogo smllogo-white"><img src="{{asset('landing-page/images/logo-white.png')}}" width="172" height="40" alt="mobile-logo"></span>
		</div>

		<div class="wsmainfull menu clearfix">
			<div class="wsmainwp clearfix">
				<nav class="wsmenu clearfix">
					<ul class="wsmenu-list">
						<li class="nl-simple" aria-haspopup="true"><a href="{{route('home.main')}}">HOME</a></li>
						<li class="nl-simple" aria-haspopup="true"><a href="javascript:void(0)">AMTV</a></li>
						<li aria-haspopup="true"><a href="javascript:void(0)">PROFIL<span class="wsarrow"></span></a>
							<ul class="sub-menu">
								<li aria-haspopup="true"><a href="javascript:void(0)">Sejarah</a></li>
								<li aria-haspopup="true"><a href="javascript:void(0)">Visi Misi</a></li>
								<li aria-haspopup="true"><a href="javascript:void(0)">Sambutan Kepala Sekolah</a></li>
								<li aria-haspopup="true"><a href="javascript:void(0)">Struktur Organisasi</a></li>
								<li aria-haspopup="true"><a href="javascript:void(0)">Profil Struktural</a></li>
								<li aria-haspopup="true"><a href="javascript:void(0)">Fasilitas Sekolah</a></li>
							</ul>
						</li>
						<li aria-haspopup="true"><a href="javascript:void(0)">SIM<span class="wsarrow"></span></a>
							<ul class="sub-menu">
								<li aria-haspopup="true"><a href="javascript:void(0)">Link Eksternal</a></li>
							</ul>
						</li>
						<li aria-haspopup="true"><a href="javascript:void(0)">PROGRAM<span class="wsarrow"></span></a>
							<ul class="sub-menu">
								<li aria-haspopup="true"><a href="javascript:void(0)">Ekstrakulikuler</a></li>
								<li aria-haspopup="true"><a href="javascript:void(0)">UKS</a></li>
								<li aria-haspopup="true"><a href="javascript:void(0)">Prestasi Siswa</a></li>
								<li aria-haspopup="true"><a href="javascript:void(0)">Program Unggulan</a></li>
							</ul>
						</li>
						<li class="nl-simple" aria-haspopup="true"><a href="javascript:void(0)">GALERI</a></li>
						<li aria-haspopup="true"><a href="javascript:void(0)">APLIKASI<span class="wsarrow"></span></a>
							<ul class="sub-menu">
								<li aria-haspopup="true"><a href="javascript:void(0)">RDM</a></li>
								<li aria-haspopup="true"><a href="javascript:void(0)">E-Learning</a></li>
							</ul>
						</li>
					</ul>
				</nav>

				<!-- For Retina Ready displays take a image with double the amount of pixels that your image will be displayed (e.g 344 x 80 pixels) -->
				{{-- <div class="desktoplogo"><a href="javascript:void(0)" class="logo-black"><img src="{{asset('landing-page/images/logo.png')}}" width="172" height="40" alt="header-logo"></a></div> --}}
				<div class="desktoplogo">
					<div class="row m-0">
						<div class="col-md-4">
							<a href="javascript:void(0)" class="logo-black"><img src="{{asset('al-mutazam.png')}}" width="70" height="65" alt="header-logo"></a>
						</div>
						{{-- <div class="col-md-8" style="text-align: center;"> --}}
						<div class="col-md-8 mtb-auto" style="line-height:1.2;">
							{{-- <span class="m-0 fw9" style="font-size: 20px; display: inline-block !important; line-height: normal !important; vertical-align:middle !important;">MTs AL-MUTAZAM</span> --}}
								<span class="fw9" style="font-size: 15px;">MTs AL-MUTAZAM</span><br>
								<span class="fw4" style="font-size: 13px;">Kab. Mojokerto - Jawa Timur</span>
							{{-- <span class="m-0 fw5" style="font-size: 14px;">Kab. Mojokerto - Jawa Timur</span> --}}
						</div>
					</div>
				</div>
				<div class="desktoplogo"><a href="javascript:void(0)" class="logo-white"><img src="{{asset('landing-page/images/logo-white.png')}}" width="172" height="40" alt="header-logo"></a></div>
			</div>
		</div>
	</div>
</header>