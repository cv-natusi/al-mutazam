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
        @if (Auth::User()->level == '1')
            <!-- Admin -->
            <li class="{{ $title == 'Dashboard' ? 'mm-active' : '' }}">
                <a href="{{ route('dashboardAdmin') }}">
                    <div class="parent-icon">
                        <i style="color: #000" class='bx bx-home-circle'></i>
                    </div>
                    <div class="menu-title">Dashboard</div>
                </a>
            </li>
            <li class="{{ $title == 'identitas' ? 'mm-active' : '' }}">
                <a href="{{ route('identitas') }}">
                    <div class="parent-icon">
                        <i style="color: #000" class='bx bxs-institution'></i>
                    </div>
                    <div class="menu-title">Modul Identitas</div>
                </a>
            </li>
            <li class="">
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon">
                        <i style="color: #000" class='bx bxs-grid'></i>
                    </div>
                    <div class="menu-title">Modul Web</div>
                </a>
                <ul>
                    <li class="">
                        <a style="color: #000" href="#"><i class="bx bx-right-arrow-alt"></i>Logo</a>
                    </li>
                    <li class="">
                        <a style="color: #000" href="#"><i style="color: #000"
                                class="bx bx-right-arrow-alt"></i>Slide Gambar</a>
                    </li>
                </ul>
            </li>
            <li class="">
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon">
                        <i style="color: #000" class='bx bx-category'></i>
                    </div>
                    <div class="menu-title">Modul Sekolah</div>
                </a>
                <ul>
                    <li class="">
                        <a style="color: #000" href="#"><i style="color: #000"
                                class="bx bx-right-arrow-alt"></i>Sejarah</a>
                    </li>
                    <li class="">
                        <a style="color: #000" href="#"><i style="color: #000"
                                class="bx bx-right-arrow-alt"></i>Visi Misi</a>
                    </li>
                    <li class="">
                        <a style="color: #000" href="#"><i style="color: #000"
                                class="bx bx-right-arrow-alt"></i>Sambutan Kepala Madrasah</a>
                    </li>
                    <li class="">
                        <a style="color: #000" href="#"><i style="color: #000"
                                class="bx bx-right-arrow-alt"></i>Struktur Organisasi</a>
                    </li>
                    <li class="">
                        <a style="color: #000" href="#"><i style="color: #000"
                                class="bx bx-right-arrow-alt"></i>Fasilitas Sekolah</a>
                    </li>
                    <li class="">
                        <a style="color: #000" href="#"><i style="color: #000"
                                class="bx bx-right-arrow-alt"></i>Ekstrakurikuler</a>
                    </li>
                    <li class="">
                        <a style="color: #000" href="#"><i style="color: #000"
                                class="bx bx-right-arrow-alt"></i>UKS</a>
                    </li>
                </ul>
            </li>
            <li class="">
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i style="color: #000" class='bx bx-desktop'></i>
                    </div>
                    <div class="menu-title">Modul Media</div>
                </a>
                <ul>
                    <li class="">
                        <a style="color: #000" href="#"><i style="color: #000"
                                class="bx bx-right-arrow-alt"></i>AMTV</a>
                    </li>
                    <li class="">
                        <a style="color: #000" href="#"><i style="color: #000"
                                class="bx bx-right-arrow-alt"></i>Galeri</a>
                    </li>
                </ul>
            </li>
            <li class="">
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i style="color: #000" class='bx bx-news'></i>
                    </div>
                    <div class="menu-title">Modul Berita</div>
                </a>
                <ul>
                    <li class="">
                        <a style="color: #000" href="#"><i style="color: #000"
                                class="bx bx-right-arrow-alt"></i>Berita Sekolah</a>
                    </li>
                    <li class="">
                        <a style="color: #000" href="#"><i style="color: #000"
                                class="bx bx-right-arrow-alt"></i>Event</a>
                    </li>
                    <li class="">
                        <a style="color: #000" href="#"><i style="color: #000"
                                class="bx bx-right-arrow-alt"></i>Pengumuman</a>
                    </li>
                    <li class="">
                        <a style="color: #000" href="#"><i style="color: #000"
                                class="bx bx-right-arrow-alt"></i>Prestasi Siswa</a>
                    </li>
                    <li class="">
                        <a style="color: #000" href="#"><i style="color: #000"
                                class="bx bx-right-arrow-alt"></i>Program Unggulan</a>
                    </li>
                </ul>
            </li>
        @elseif(Auth::User()->level == '2')
            <!-- Petugas Sekolah -->
            <li class="{{ $title == 'Dashboard' ? 'mm-active' : '' }}">
                <a href="{{ route('dashboardPetugas') }}">
                    <div class="parent-icon">
                        <i style="color: #000" class='bx bx-grid-alt'></i>
                    </div>
                    <div class="menu-title">Dashboard</div>
                </a>
            </li>
            <li>
                <a href="{{ route('dataGuru') }}">
                    <div class="parent-icon">
                        <i style="color: #000" class='bx bx-user'></i>
                    </div>
                    <div class="menu-title">Data Guru</div>
                </a>
            </li>
            <li>
                <a href="{{ route('dataTugasPegawai') }}">
                    <div class="parent-icon">
                        <i style="color: #000" class='bx bx-receipt'></i>
                    </div>
                    <div class="menu-title">Data Tugas Pegawai</div>
                </a>
            </li>
            <li>
                <a href="{{ route('dataKelas') }}">
                    <div class="parent-icon">
                        <i style="color: #000000" class='bx bx-receipt'></i>
                    </div>
                    <div class="menu-title">Data Kelas</div>
                </a>
            </li>
            <li>
                <a href="{{ route('dataPelajaran') }}">
                    <div class="parent-icon">
                        <i style="color: #000000" class='bx bx-receipt'></i>
                    </div>
                    <div class="menu-title">Data Pelajaran</div>
                </a>
            </li>
            <li>
                <button class="dropdown-btn"><i style="color: #000000; font-size:24.5px;" class='bx bx-folder-open'></i>
                    Bank Data
                    <i class='bx bx-chevron-right'></i>
                </button>
                <div class="dropdown-container">
                    <a href="{{ route('dataPrimer') }}">
                        <div class="parent-icon">
                            <i style="color: #000000" class='bx bx-radio-circle-marked'></i>
                        </div>
                        <div class="menu-title">Data Primer</div>
                    </a>
                    <a href="{{ route('dataSekunder') }}">
                        <div class="parent-icon">
                            <i style="color: #000000" class='bx bx-radio-circle-marked'></i>
                        </div>
                        <div class="menu-title">Data Sekunder</div>
                    </a>
                </div>
            </li>
            <li>
                <button class="dropdown-btn"><i style="color: #000000; font-size:24.5px;" class='bx bx-cog' ></i>
                    Pengaturan
                    <i class='bx bx-chevron-right'></i>
                </button>
                <div class="dropdown-container">
                    <a href="{{ route('ubahPassword') }}">
                        <div class="parent-icon">
                            <i style="color: #000" class='bx bx-radio-circle-marked'></i>
                        </div>
                        <div class="menu-title">Ubah Password</div>
                    </a>
                    <a href="{{ route('resetPassword') }}">
                        <div class="parent-icon">
                            <i style="color: #000" class='bx bx-radio-circle-marked'></i>
                        </div>
                        <div class="menu-title">Reset Password</div>
                    </a>
                </div>
            </li>
        @elseif(Auth::User()->level == '3')
            <!-- Guru Pengajar -->
            <li class="{{ $title == 'Dashboard' ? 'mm-active' : '' }}">
                <a href="{{ route('dashboardGuru') }}">
                    <div class="parent-icon">
                        <i style="color: #000" class='bx bx-home-circle'></i>
                    </div>
                    <div class="menu-title">Dashboard</div>
                </a>
                <a href="{{route('profilGuru')}}">
                  <div class="parent-icon">
                     <i style="color: #000" class='bx bx-user'></i>
                  </div>
                  <div class="menu-title">Profil Guru</div>
               </a>
               <a href="{{route('dashboardGuru')}}">
                  <div class="parent-icon">
                     <i style="color: #000" class='bx bx-folder'></i>
                  </div>
                  <div class="menu-title">Data Primer</div>
               </a>
               <a href="{{route('dashboardGuru')}}">
                  <div class="parent-icon">
                     <i style="color: #000" class='bx bx-folder'></i>
                  </div>
                  <div class="menu-title">Data Sekunder</div>
               </a>
               <a href="{{route('dashboardGuru')}}">
                  <div class="parent-icon">
                     <i style="color: #000" class='bx bx-cog'></i>
                  </div>
                  <div class="menu-title">Pengaturan</div>
               </a>
            </li>
        @endif
    </ul>
    <!--end navigation-->
</div>
