<!doctype html>
<html class="color-sidebar sidebarcolor1" lang="en">
<head>
	<!--requiredMetaTags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{csrf_token()}}"><!--csrfToken-->
	<title>{{ $title }} | MTS AL-MUTAZAM</title>
	@include('master.include.style')<!--importCSS-->
	<style>
		.sidebar-header {
			height: 80px !important;
			background: #CEE6F3 !important;
			/* margin-top: -50px !important; */
		}

		.sidebar-wrapper .metismenu {
			margin-top: 0px !important;
		}
		
		.wrapper {
			color: black;
		}

		.header-image {
			position: absolute;
			margin-top: 0px;	
		}

		.header-text {
			position: absolute;
			margin-top: 0px;
			margin-left: 70px;
		}

		.menu-title {
			color: #000;
		}

		.mm-active {
			background: #CEE6F3;
		}
		
		.sidebar-header-profile {
			margin-top: 70px;
		}
	</style>
</head>

<body>
	<!--startWrapper-->
	<div class="wrapper">
		@include('master.include.sidebar')<!--importSidebar-->

		@include('master.include.header')<!--importHeader-->

		<div class="page-wrapper">
			@yield('content')<!--includeContent-->
		</div>

		<div class="overlay toggle-icon"></div><!--overlay-->

		<a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a><!--backToTopButton-->

		@include('master.include.footer')<!--importFooter-->
	</div>
	<!--endWrapper-->

	@include('master.include.script') <!--importJavaScript-->
</body>

</html>