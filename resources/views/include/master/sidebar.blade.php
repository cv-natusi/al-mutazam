<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ url('assets/images/logo-profile.png') }}" width="60">
        </div>
        <div>
            <div class="logo-text" style="margin-top: 15px">
                <h5 class="text" style="font-size: 13px; margin-left: 0px; color: #000; ">MTS-ALMUTAZAM</h5>
                <h5 class="text" style="font-size: 11px; margin-left: 0px; color: #000; ">Mojokerto, Jawa Timur</h5>
            </div>
        </div>
        <div class="toggle-icon ms-auto">
            <i style="color: #000" class='bx bx-arrow-to-left'></i>
        </div>
	</div>
	<div class="sidebar-header-profile text-center">
		<div class="header-profile">	
			<hr>
		</div>
	</div>
	<!--navigation-->
	<ul class="metismenu" id="menu">
		@if (Auth::User()->level=='1') <!-- Admin -->
		<li class="{{ ($menuActive == 'dashboard') ? 'mm-active' : ''}}">
			<a href="{{route('dashboardAdmin')}}">
				<div class="parent-icon">
					<i style="color: #000" class='bx bx-home-circle'></i>
				</div>
				<div class="menu-title">Dashboard</div>
			</a>
		</li>
		<li class="@if($menuActive == 'identitas') mm-active @endif">
			<a href="{{route('identitas')}}">
				<div class="parent-icon">
					<i style="color: #000" class='bx bxs-institution'></i>
				</div>
				<div class="menu-title">Modul Identitas</div>
			</a>
		</li>
		<li class="{{ ($menuActive == 'modulWeb') ? 'mm-active' : ''}}">
			<a href="javascript:;" class="has-arrow">
			  <div class="parent-icon">
				<i style="color: #000" class='bx bxs-grid'></i>
			  </div>
			  <div class="menu-title">Modul Web</div>
			</a>
			<ul>
			  <li class="{{ ($subMenuActive == 'logo') ? 'mm-active' : ''}}">
				<a style="color: #000" href="{{ route('logo') }}"><i class="bx bx-right-arrow-alt"></i>Logo</a>
			  </li>
			  <li class="{{ ($subMenuActive == 'slider') ? 'mm-active' : ''}}">
				<a style="color: #000" href="{{ route('slider') }}"><i style="color: #000" class="bx bx-right-arrow-alt"></i>Slide Gambar</a>
			  </li>
			</ul>
		</li>
		<li class="@if($menuActive == 'modulSekolah') mm-active @endif">
			<a href="javascript:;" class="has-arrow">
			  <div class="parent-icon">
				<i style="color: #000" class='bx bx-category'></i>
			  </div>
			  <div class="menu-title">Modul Sekolah</div>
			</a>
			<ul>
			  <li class="{{ ($subMenuActive == 'sejarah') ? 'mm-active' : ''}}">
				<a style="color: #000"  href="{{ route('sejarah') }}"><i style="color: #000"  class="bx bx-right-arrow-alt"></i>Sejarah</a>
			  </li>
			  <li class="{{ ($subMenuActive == 'visimisi') ? 'mm-active' : ''}}">
				<a style="color: #000"  href="{{ route('visimisi') }}"><i style="color: #000" class="bx bx-right-arrow-alt"></i>Visi Misi</a>
			  </li>
			  <li class="{{ ($subMenuActive == 'sambutan') ? 'mm-active' : ''}}">
				<a style="color: #000"  href="{{ route('kepsek') }}"><i style="color: #000" class="bx bx-right-arrow-alt"></i>Sambutan Kepala Madrasah</a>
			  </li>
			  <li class="{{ ($subMenuActive == 'organisasi') ? 'mm-active' : ''}}">
				<a style="color: #000"  href="{{ route('organisasi') }}"><i style="color: #000" class="bx bx-right-arrow-alt"></i>Struktur Organisasi</a>
			  </li>
			  <li class="{{ ($subMenuActive == 'fasilitas') ? 'mm-active' : ''}}">
				<a style="color: #000"  href="{{ route('fasilitas') }}"><i style="color: #000" class="bx bx-right-arrow-alt"></i>Fasilitas Sekolah</a>
			  </li>
			  <li class="{{ ($subMenuActive == 'ekstrakurikuler') ? 'mm-active' : ''}}">
				<a style="color: #000"  href="{{ route('ekskul') }}"><i style="color: #000" class="bx bx-right-arrow-alt"></i>Ekstrakurikuler</a>
			  </li>
			  <li class="{{ ($subMenuActive == 'uks') ? 'mm-active' : ''}}">
				<a style="color: #000" href="{{ route('uks') }}"><i style="color: #000" class="bx bx-right-arrow-alt"></i>UKS</a>
			  </li>
			</ul>
		</li>
		<li class="{{ ($menuActive == 'modulMedia') ? 'mm-active' : ''}}">
			<a href="javascript:;" class="has-arrow">
			  <div class="parent-icon"><i style="color: #000" class='bx bx-desktop'></i>
			  </div>
			  <div class="menu-title">Modul Media</div>
			</a>
			<ul>
			  <li class="{{ ($subMenuActive == 'amtv') ? 'mm-active' : ''}}">
				<a style="color: #000" href="{{ route('amtv') }}"><i style="color: #000" class="bx bx-right-arrow-alt"></i>AMTV</a>
			  </li>
			  <li class="{{ ($subMenuActive == 'galeri') ? 'mm-active' : ''}}">
				<a style="color: #000" href="{{ route('galeri') }}"><i style="color: #000" class="bx bx-right-arrow-alt"></i>Galeri</a>
			  </li>
			</ul>
		</li>
		<li class="{{ ($subMenuActive == 'modulBerita') ? 'mm-active' : ''}}">
			<a href="javascript:;" class="has-arrow">
			  <div class="parent-icon"><i style="color: #000" class='bx bx-news'></i>
			  </div>
			  <div class="menu-title">Modul Berita</div>
			</a>
			<ul>
			  <li class="{{ ($subMenuActive == 'beritaSekolah') ? 'mm-active' : ''}}">
				<a style="color: #000" href="{{ url('admin/berita/beritaSekolah/1') }}"><i style="color: #000" class="bx bx-right-arrow-alt"></i>Berita Sekolah</a>
			  </li>
			  <li class="{{ ($subMenuActive == 'event') ? 'mm-active' : ''}}">
				<a style="color: #000" href="{{ url('admin/berita/beritaSekolah/2') }}"><i style="color: #000" class="bx bx-right-arrow-alt"></i>Event</a>
			  </li>
			  <li class="{{ ($subMenuActive == 'pengumuman') ? 'mm-active' : ''}}">
				<a style="color: #000" href="{{ url('admin/berita/beritaSekolah/3') }}"><i style="color: #000" class="bx bx-right-arrow-alt"></i>Pengumuman</a>
			  </li>
			  <li class="{{ ($subMenuActive == 'prestasiSiswa') ? 'mm-active' : ''}}">
				<a style="color: #000" href="{{ url('admin/berita/beritaSekolah/4') }}"><i style="color: #000" class="bx bx-right-arrow-alt"></i>Prestasi Siswa</a>
			  </li>
			  <li class="{{ ($subMenuActive == 'programUnggulan') ? 'mm-active' : ''}}">
				<a style="color: #000" href="{{ url('admin/berita/beritaSekolah/5') }}"><i style="color: #000" class="bx bx-right-arrow-alt"></i>Program Unggulan</a>
			  </li>
			</ul>
		</li>
		@elseif(Auth::User()->level=='2') <!-- Petugas Sekolah -->
		<li class="{{ ($title == 'Dashboard') ? 'mm-active' : ''}}">
			<a href="{{route('dashboardPetugas')}}">
				<div class="parent-icon">
					<i style="color: #000" class='bx bx-home-circle'></i>
				</div>
				<div class="menu-title">Dashboard</div>
			</a>
		</li>
		@elseif(Auth::User()->level=='3') <!-- Guru Pengajar -->
		<li class="{{ ($title == 'Dashboard') ? 'mm-active' : ''}}">
			<a href="{{route('dashboardGuru')}}">
				<div class="parent-icon">
					<i style="color: #000" class='bx bx-home-circle'></i>
				</div>
				<div class="menu-title">Dashboard</div>
			</a>
		</li>
		@endif
	</ul>
	<!--end navigation-->
</div>
