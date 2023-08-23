<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
	<div class="breadcrumb-title pe-3">{{$title}}</div>
	<div class="ps-3">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb mb-0 p-0">
				@if(Auth::User()->level == '1') <!-- Admin -->
					<li class="breadcrumb-item">
						<a href="{{route('dashboardAdmin')}}"><i class="bx bx-home-alt"></i></a>
					</li>
				@elseif(Auth::User()->level == '2') <!-- Petugas Sekolah -->
					<li class="breadcrumb-item">
						<a href="{{route('dashboardPetugas')}}"><i class="bx bx-home-alt"></i></a>
					</li>
				@elseif(Auth::User()->level == '3') <!-- Guru Pengajar -->
					<li class="breadcrumb-item">
						<a href="{{route('dashboardGuru')}}"><i class="bx bx-home-alt"></i></a>
					</li>
				@endif
				@if(isset($breadCrumb))
					@foreach($breadCrumb as $item)
						<li class="breadcrumb-item active" aria-current="page">{{$item}}</li>
					@endforeach
				@else
					<li class="breadcrumb-item active" aria-current="page">{{$title}}</li>
				@endif
			</ol>
		</nav>
	</div>
</div>