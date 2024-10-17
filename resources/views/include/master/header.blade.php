<header>
	<div class="topbar d-flex align-items-center">
		<nav class="navbar navbar-expand">
			<div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
			</div>
			<div class="top-menu ms-auto">
				<ul class="navbar-nav align-items-center">
					<li class="nav-item dropdown dropdown-large">
						<div class="dropdown-menu dropdown-menu-end">
							<div class="header-notifications-list">
							</div>
						</div>
					</li>
					<li class="nav-item dropdown dropdown-large">
						<a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" onclick="notifklik('item1')" aria-expanded="false"> <span class="alert-count" name="item1"></span>
							<i class='bx bx-bell'></i>
						</a>
						<div class="dropdown-menu dropdown-menu-end">
							<a href="javascript:;">
								<div class="msg-header">
									<p class="msg-header-title">Notifikasi</p>
									<p class="msg-header-clear ms-auto"></p>
								</div>
							</a>
							<div class="header-message-list">
							</div>
						</div>
					</li>
				</ul>
			</div>
			<div class="user-box dropdown">
				<a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
					@php $img=Auth::User()->foto; @endphp
					@if(Auth::User()->level=='3' && asset('storage/uploads/pengguna/'.$img))
						<img src="{{asset('storage/uploads/pengguna/'.$img)}}" class="user-img" alt="user avatar">
					@else		
						<img src="{{ asset('assets/images/avatars/no-avatar.png')}}" class="user-img" alt="user avatar">
					@endif
					<div class="user-info ps-3">
						<p class="user-name mb-0">{{Auth::user()->name_user}}</p>
						<p class="designattion mb-0">
						@if (Auth::user()->level == 1)
							ADMIN
						@elseif (Auth::user()->level == 2)
							PETUGAS
						@elseif (Auth::user()->level == 3)
							GURU
						@endif
						</p>
					</div>
				</a>
				<ul class="dropdown-menu dropdown-menu-end">
					<li><a class="dropdown-item" href="{{route('logout')}}"><i class='bx bx-log-out-circle'></i><span>Logout</span></a>
					</li>
				</ul>
			</div>
		</nav>
	</div>
</header>