<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="author" content="Jthemes">
		<meta name="description" content="eTreeks - Education & Courses Landing Page Template">
		<meta name="keywords" content="Responsive, HTML5 Template, Jthemes, Courses, Education, Learning, Online Education, Study">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="csrf-token" content="{{csrf_token()}}">

		<title>MTs Al-Multazam</title>
		@include('include.landing-page.style')
		<style>
			.btnLogin{
				background: rgba(68, 148, 39, 1) !important;
				color: #ffffff !important;
			}
			.btnLogin:hover{
				background: rgb(43, 75, 32) !important;
			}
		</style>
	</head>
	<body>
		<!-- PRELOADER SPINNER ============================================= -->
		{{-- <div id="loader-wrapper">
			<div id="loading">
				<div id="loading-center">
					<div class="cssload-loading"><i></i><i></i><i></i><i></i></div>
				</div>
			</div>
		</div> --}}

		<div id="page" class="page">
			@include('include.landing-page.header')

			@yield('content')

			@include('include.landing-page.footer')
		</div>

		@include('include.landing-page.script')
	</body>
</html>	