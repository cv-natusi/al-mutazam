<header id="header" class="header white-menu navbar-dark">
	<div class="header-wrapper">
		<!-- MOBILE HEADER -->
		<div class="wsmobileheader clearfix">	
			<a id="wsnavtoggle" class="wsanimated-arrow"><span></span></a>
			<span class="smllogo smllogo-black"><img src="{{asset('assets/images/logo-profile.png')}}" width="172" height="40" alt="mobile-logo"></span>
			<span class="smllogo smllogo-white"><img src="{{asset('landing-page/images/logo-white.png')}}" width="172" height="40" alt="mobile-logo"></span>
		</div>

		<div class="wsmainfull menu clearfix">
			<div class="wsmainwp clearfix">
				<nav class="wsmenu clearfix">
					<ul class="wsmenu-list">
						<li class="nl-simple" aria-haspopup="true"><a href="{{route('home.main')}}">HOME</a></li>
						<li class="nl-simple" aria-haspopup="true"><a href="{{route('amtv.main')}}">AMTV</a></li>
						<li aria-haspopup="true"><a href="javascript:void(0)">PROFIL<span class="wsarrow"></span></a>
							<ul class="sub-menu">
								<li aria-haspopup="true"><a href="{{route('profil.sejarah')}}">Sejarah</a></li>
								<li aria-haspopup="true"><a href="{{route('profil.visimisi')}}">Visi Misi</a></li>
								<li aria-haspopup="true"><a href="{{route('profil.sambutan')}}">Sambutan Kepala Madrasah</a></li>
								<li aria-haspopup="true"><a href="{{route('profil.struktur')}}">Struktur Organisasi</a></li>
								<li aria-haspopup="true"><a href="{{route('profil.struktural')}}">Profil Guru</a></li>
								<li aria-haspopup="true"><a href="{{route('profil.fasilitas')}}">Fasilitas Madrasah</a></li>
							</ul>
						</li>
						<li aria-haspopup="true"><a href="{{route('sim.main')}}">SIM</a></li>
						<li aria-haspopup="true"><a href="javascript:void(0)">PROGRAM<span class="wsarrow"></span></a>
							<ul class="sub-menu">
								<li aria-haspopup="true"><a href="{{route('program.ekskul')}}">Ekstrakulikuler</a></li>
								<li aria-haspopup="true"><a href="{{route('program.uks')}}">UKS</a></li>
								<li aria-haspopup="true"><a href="{{route('program.prestasi-siswa')}}">Prestasi Siswa</a></li>
								<li aria-haspopup="true"><a href="{{route('program.unggulan')}}">Program Unggulan</a></li>
							</ul>
						</li>
						<li class="nl-simple" aria-haspopup="true"><a href="{{route('galeri.galeri')}}">GALERI</a></li>
					</ul>
				</nav>

				<!-- For Retina Ready displays take a image with double the amount of pixels that your image will be displayed (e.g 344 x 80 pixels) -->
				<div class="desktoplogo">
					<div class="row m-0">
						<div class="col-md-4">
							<a href="javascript:void(0)" class="logo-black"><img src="{{asset('al-mutazam.png')}}" width="70" height="65" alt="header-logo"></a>
						</div>
						<div class="col-md-8 mtb-auto" style="line-height:1.2;">
								<span class="fw9" style="font-size: 15px;">MTs AL-MULTAZAM</span><br>
								<span class="fw4" style="font-size: 13px;">Kab. Mojokerto - Jawa Timur</span>
						</div>
					</div>
				</div>
				<div class="desktoplogo"><a href="javascript:void(0)" class="logo-white"><img src="{{asset('landing-page/images/logo-white.png')}}" width="172" height="40" alt="header-logo"></a></div>
			</div>
		</div>
	</div>
</header>