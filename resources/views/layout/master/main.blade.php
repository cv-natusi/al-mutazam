<!doctype html>
<html class="color-sidebar sidebarcolor1" lang="en">
<head>
	<!--requiredMetaTags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{csrf_token()}}"><!--csrfToken-->
	<title>{{ $title }} | MTS AL-MUTAZAM</title>
	@include('include.master.style')<!--importCSS-->
	<style>
		.sidebar-header {
			background: #32762C80 !important;
		}
		.wrapper {
			color: black;
		}
		.menu-title {
			color: #000;
		}
		.bg-card{
			background: #32762C80 !important;
		}
		.text-card{
			color: #ffffff;
		}
		.button-custome{
			background: #32762C80 !important;
			color: #ffffff !important;
		}
		.button-custome:hover{
			background: #18391680 !important;
		}
	</style>
</head>

<body>
	<!--startWrapper-->
	<div class="wrapper">
		@include('include.master.sidebar')<!--importSidebar-->

		@include('include.master.header')<!--importHeader-->

		<div class="page-wrapper">
			@yield('content')<!--includeContent-->
		</div>

		<div class="overlay toggle-icon"></div><!--overlay-->

		<a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a><!--backToTopButton-->

		@include('include.master.footer')<!--importFooter-->
	</div>
	<!--endWrapper-->

	@include('include.master.script') <!--importJavaScript-->
</body>

</html>