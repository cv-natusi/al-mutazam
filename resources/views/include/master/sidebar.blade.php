<div class="sidebar-wrapper" data-simplebar="true">
	<div class="sidebar-header">
		<div>
			<img src="{{url('assets/images/logo-profile.png')}}" width="30" alt="logo icon">
		</div>
		<div>
			<h5 class="logo-text" style="font-size: 14px;">MTS AL-MUTAZAM</h5>
		</div>
		<div class="toggle-icon ms-auto"><i class='bx bx-chevron-left-circle'></i></div>
	</div>
	{{-- <div class="sidebar-header">
        <div>
            <img src="{{ url('assets/images/logo-profile.png') }}" width="60">
        </div>
        <div>
		  <div class="logo-text">
			<h5 class="text" style="font-size: 13px; margin-left: 0px; color: #000; ">MTS-ALMUTAZAM</h5>
			<h5 class="text" style="font-size: 11px; margin-left: 0px; color: #000; ">Mojokerto, Jawa Timur</h5>
		  </div>
        </div>
        <div class="toggle-icon ms-auto">
            <i style="color: #000" class='bx bx-arrow-to-left'></i>
        </div>
	</div> --}}
	<!--navigation-->
	<ul class="metismenu" id="menu">
		@if (Auth::User()->level=='1') <!-- Admin -->
		<li class="{{ ($title == 'Dashboard') ? 'mm-active' : ''}}">
			<a href="{{route('dashboardAdmin')}}">
				<div class="parent-icon">
					<i style="color: #000" class='bx bx-home-circle'></i>
				</div>
				<div class="menu-title">Dashboard</div>
			</a>
		</li>
		<li class="{{ ($title == 'Identitas') ? 'mm-active' : ''}}">
			<a href="{{route('identitas')}}">
				<div class="parent-icon">
					<i style="color: #000" class='bx bxs-institution'></i>
				</div>
				<div class="menu-title">Modul Identitas</div>
			</a>
		</li>
		<li class="{{ (in_array($title, ['Logo','Slider Gambar'])) ? 'mm-active' : ''}}">
			<a href="javascript:;" class="has-arrow">
			  <div class="parent-icon">
				<i style="color: #000" class='bx bxs-grid'></i>
			  </div>
			  <div class="menu-title">Modul Web</div>
			</a>
			<ul>
			  <li class="{{ ($title == 'Logo') ? 'mm-active' : ''}}">
				<a style="color: #000" href="{{ route('logo') }}"><i class="bx bx-right-arrow-alt"></i>Logo</a>
			  </li>
			  <li class="{{ ($title == 'Slider Gambar') ? 'mm-active' : ''}}">
				<a style="color: #000" href="{{ route('slider') }}"><i style="color: #000" class="bx bx-right-arrow-alt"></i>Slide Gambar</a>
			  </li>
			</ul>
		</li>
		<li class="{{ (in_array($title, ['Sejarah','Visi dan Misi','Sambutan Kepala Sekolah','Struktur Organisasi', 'Fasilitas Sekolah','Ekstra Kulikuler','UKS'])) ? 'mm-active' : ''}}">
			<a href="javascript:;" class="has-arrow">
			  <div class="parent-icon">
				<i style="color: #000" class='bx bx-category'></i>
			  </div>
			  <div class="menu-title">Modul Sekolah</div>
			</a>
			<ul>
				<li class="{{ ($title == 'Sejarah') ? 'mm-active' : ''}}">
				<a style="color: #000"  href="{{ route('sejarah') }}"><i style="color: #000"  class="bx bx-right-arrow-alt"></i>Sejarah</a>
			  </li>
			  <li class="{{ ($title == 'Visi dan Misi') ? 'mm-active' : ''}}">
				<a style="color: #000"  href="{{ route('visimisi') }}"><i style="color: #000" class="bx bx-right-arrow-alt"></i>Visi Misi</a>
			  </li>
			  <li class="{{ ($title == 'Sambutan Kepala Sekolah') ? 'mm-active' : ''}}">
				<a style="color: #000"  href="{{ route('kepsek') }}"><i style="color: #000" class="bx bx-right-arrow-alt"></i>Sambutan Kepala Madrasah</a>
			  </li>
			  <li class="{{ ($title == 'Struktur Organisasi') ? 'mm-active' : ''}}">
				<a style="color: #000"  href="{{ route('organisasi') }}"><i style="color: #000" class="bx bx-right-arrow-alt"></i>Struktur Organisasi</a>
			  </li>
			  <li class="{{ ($title == 'Fasilitas Sekolah') ? 'mm-active' : ''}}">
				<a style="color: #000"  href="{{ route('fasilitas') }}"><i style="color: #000" class="bx bx-right-arrow-alt"></i>Fasilitas Sekolah</a>
			  </li>
			  <li class="{{ ($title == 'Ekstra Kulikuler') ? 'mm-active' : ''}}">
				<a style="color: #000"  href="{{ route('ekskul') }}"><i style="color: #000" class="bx bx-right-arrow-alt"></i>Ekstrakurikuler</a>
			  </li>
			  <li class="{{ ($title == 'UKS') ? 'mm-active' : ''}}">
				<a style="color: #000" href="{{ route('uks') }}"><i style="color: #000" class="bx bx-right-arrow-alt"></i>UKS</a>
			  </li>
			</ul>
		</li>
		<li class="{{ (in_array($title, ['AMTV','Galeri'])) ? 'mm-active' : ''}}">
			<a href="javascript:;" class="has-arrow">
			  <div class="parent-icon"><i style="color: #000" class='bx bx-desktop'></i>
			  </div>
			  <div class="menu-title">Modul Media</div>
			</a>
			<ul>
				<li class="{{ ($title == 'AMTV') ? 'mm-active' : ''}}">
				<a style="color: #000" href="{{ route('amtv') }}"><i style="color: #000" class="bx bx-right-arrow-alt"></i>AMTV</a>
			  </li>
			  <li class="{{ ($title == 'Galeri') ? 'mm-active' : ''}}">
				<a style="color: #000" href="{{ route('galeri') }}"><i style="color: #000" class="bx bx-right-arrow-alt"></i>Galeri</a>
			  </li>
			</ul>
		</li>
		<li class="{{ (in_array($title, ['Berita Sekolah','Event','Pengumuman','Prestasi Siswa','Program Unggulan'])) ? 'mm-active' : ''}}">
			<a href="javascript:;" class="has-arrow">
			  <div class="parent-icon"><i style="color: #000" class='bx bx-news'></i>
			  </div>
			  <div class="menu-title">Modul Berita</div>
			</a>
			<ul>
			  <li class="{{ ($title == 'Berita Sekolah') ? 'mm-active' : ''}}">
				<a style="color: #000" href="{{ url('admin/berita/beritaSekolah/1') }}"><i style="color: #000" class="bx bx-right-arrow-alt"></i>Berita Sekolah</a>
			  </li>
			  <li class="{{ ($title == 'Event') ? 'mm-active' : ''}}">
				<a style="color: #000" href="{{ url('admin/berita/beritaSekolah/2') }}"><i style="color: #000" class="bx bx-right-arrow-alt"></i>Event</a>
			  </li>
			  <li class="{{ ($title == 'Pengumuman') ? 'mm-active' : ''}}">
				<a style="color: #000" href="{{ url('admin/berita/beritaSekolah/3') }}"><i style="color: #000" class="bx bx-right-arrow-alt"></i>Pengumuman</a>
			  </li>
			  <li class="{{ ($title == 'Prestasi Siswa') ? 'mm-active' : ''}}">
				<a style="color: #000" href="{{ url('admin/berita/beritaSekolah/4') }}"><i style="color: #000" class="bx bx-right-arrow-alt"></i>Prestasi Siswa</a>
			  </li>
			  <li class="{{ ($title == 'Program Unggulan') ? 'mm-active' : ''}}">
				<a style="color: #000" href="{{ url('admin/berita/beritaSekolah/5') }}"><i style="color: #000" class="bx bx-right-arrow-alt"></i>Program Unggulan</a>
			  </li>
			</ul>
		</li>
		@elseif(Auth::User()->level=='2') <!-- Petugas Sekolah -->
		<li class="{{ ($title == 'Dashboard Petugas') ? 'mm-active' : ''}}">
			<a href="{{route('dashboardPetugas')}}">
				<div class="parent-icon">
					<i style="color: #000" class='bx bx-home-circle'></i>
				</div>
				<div class="menu-title">Dashboard</div>
			</a>
		</li>
		<li class="{{ ($title == 'Data Guru') ? 'mm-active' : ''}}">
			<a href="{{route('dataGuru')}}">
				<div class="parent-icon">
					<i style="color: #000" class='bx bxs-user'></i>
				</div>
				<div class="menu-title">Data Guru</div>
			</a>
		</li>
		<li class="{{ ($title == 'Dashboard Petugas') ? 'mm-active' : ''}}">
			<a href="{{route('dataTugasPegawai')}}">
				<div class="parent-icon">
					<i style="color: #000" class='bx bx-data'></i>
				</div>
				<div class="menu-title">Data Tugas Pegawai</div>
			</a>
		</li>
		<li class="{{ ($title == 'Data Kelas') ? 'mm-active' : ''}}">
			<a href="{{route('dataKelas')}}">
				<div class="parent-icon">
					<i style="color: #000" class='bx bx-data'></i>
				</div>
				<div class="menu-title">Data Kelas</div>
			</a>
		</li>
		<li class="{{ ($title == 'Data Pelajaran') ? 'mm-active' : ''}}">
			<a href="{{route('dataPelajaran')}}">
				<div class="parent-icon">
					<i style="color: #000" class='bx bx-data'></i>
				</div>
				<div class="menu-title">Data Pelajaran</div>
			</a>
		</li>
		@elseif(Auth::User()->level=='3') <!-- Guru Pengajar -->
		<li class="{{ ($title == 'Dashboard Guru') ? 'mm-active' : ''}}">
			<a href="{{route('dashboardGuru')}}">
				<div class="parent-icon">
					<i style="color: #000" class='bx bx-data'></i>
				</div>
				<div class="menu-title">Dashboard</div>
			</a>
		</li>
		@endif
	</ul>
	<!--end navigation-->
</div>
