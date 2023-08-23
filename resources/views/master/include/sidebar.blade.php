<div class="sidebar-wrapper" data-simplebar="true">
	<div class="sidebar-header">
		<div class="header-image">
			<img src="{{ url('assets/images/logo-profile.png')}}" width="70">
		</div>
		<div class="header-text">
			<div class="logo-text">
				<h5 style="color: #000; font-size: 10pt"><b>MTS AL-MUTAZAM</b></h5>
				<h5 style="color: #000; font-size: 8pt;">Kab. Mojokerto</h5>
			</div>
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
		<li class="{{ ($title == 'Dashboard') ? 'mm-active' : ''}}">
			<a href="{{route('dashboardAdmin')}}">
				<div class="parent-icon">
					<i style="color: #000" class='bx bx-home-circle'></i>
				</div>
				<div class="menu-title">Dashboard</div>
			</a>
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