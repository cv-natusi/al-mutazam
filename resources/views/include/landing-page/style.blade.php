<!-- FAVICON AND TOUCH ICONS  -->
{{-- <link rel="shortcut icon" href="{{asset('landing-page/images/favicon.ico')}}" type="image/x-icon">
<link rel="icon" href="{{asset('landing-page/images/favicon.ico')}}" type="image/x-icon"> --}}
<link rel="shortcut icon" href="{{asset('al-mutazam.png')}}" type="image/x-icon">
<link rel="icon" href="{{asset('al-mutazam.png')}}" type="image/x-icon">

<link rel="apple-touch-icon" sizes="152x152" href="{{asset('landing-page/images/apple-touch-icon-152x152.png')}}">
<link rel="apple-touch-icon" sizes="120x120" href="{{asset('landing-page/images/apple-touch-icon-120x120.png')}}">
<link rel="apple-touch-icon" sizes="76x76" href="{{asset('landing-page/images/apple-touch-icon-76x76.png')}}">
<link rel="apple-touch-icon" href="{{asset('landing-page/images/apple-touch-icon.png')}}">

{{-- <link rel="icon" href="{{asset('landing-page/images/apple-touch-icon.png')}}" type="image/x-icon"> --}}
<link rel="icon" href="{{asset('al-mutazam.png')}}" type="image/x-icon">

<!-- GOOGLE FONTS -->
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Muli:400,600,700,800,900&display=swap" rel="stylesheet">

<link href="{{asset('landing-page/css/bootstrap.min.css')}}" rel="stylesheet"> <!-- BOOTSTRAP CSS -->

<!-- FONT ICONS -->
<link href="https://use.fontawesome.com/releases/v5.11.0/css/all.css" rel="stylesheet" crossorigin="anonymous">
<link href="{{asset('landing-page/css/flaticon.css')}}" rel="stylesheet">

<!-- PLUGINS STYLESHEET -->
<link href="{{asset('landing-page/css/menu.css')}}" rel="stylesheet">
<link id="effect" href="{{asset('landing-page/css/dropdown-effects/fade-down.css')}}" media="all" rel="stylesheet">
<link href="{{asset('landing-page/css/magnific-popup.css')}}" rel="stylesheet">	
<link href="{{asset('landing-page/css/flexslider.css')}}" rel="stylesheet">
<link href="{{asset('landing-page/css/owl.carousel.min.css')}}" rel="stylesheet">
<link href="{{asset('landing-page/css/owl.theme.default.min.css')}}" rel="stylesheet">

<link href="{{asset('landing-page/css/animate.css')}}" rel="stylesheet"> <!-- ON SCROLL ANIMATION -->
<link href="{{asset('landing-page/css/style.css')}}" rel="stylesheet"> <!-- TEMPLATE CSS -->
<link href="{{asset('landing-page/css/responsive.css')}}" rel="stylesheet"> <!-- RESPONSIVE CSS -->

<style>
	:root{
		--text-color: #7b7b7b;
		--custom-bg-section: #E6F5E0;
      --color-menu: #5A79CB!important;
	}
	.fw3{
		font-weight: 300;
	}
	.fw4{
		font-weight: 400;
	}
	.fw5{
		font-weight: 500;
	}
	.fw6{
		font-weight: 600;
	}
	.fw7{
		font-weight: 700;
	}
	.fw8{
		font-weight: 800;
	}
	.fw9{
		font-weight: 900;
	}
	
	.mtb-auto{
		margin-top: auto;
		margin-bottom: auto;
	}

	.color-a{
		color: #307cc1;
	}
	.color-a:hover{
		color: #0F4C81;
	}
	/* .white-menu .wsmainfull{
		padding: 5px 0;
	}
	#header {
		width: 100%;
		display: block;
		z-index: 99999;
		overflow: hidden;
		padding: 5px 0;
		position:absolute;
		left:0;
		right:0;
		margin-left:auto;
		margin-right:auto;
	} */

	/* @media (min-width:576px){
		.container{
			max-width:540px
		}
	}
	@media (min-width:768px){
		.container{
			max-width:720px
		}
	} */

	.clearfix{
		height: auto;
	}
	.container {
		max-width: 1346px;
	}
	.fwhite{
		color: white;
	}

	/* Header start */
	.white-menu .wsmainfull{
		background-color: #5A79CB!important;
	}
	.tra-menu .wsmainfull.scroll, .white-menu .wsmainfull.scroll, .dark-menu.dark-scroll .wsmainfull.scroll{
		background-color: #5A79CB!important;
	}
	.navbar-dark .wsmenu > .wsmenu-list > li > a{
		color: white;
	}
	.white-menu .wsmenu > .wsmenu-list > li:hover > a{
		color:#ffb585;
	}
	.wsmobileheader{
		background-color: #5A79CB !important;
	}
	.wsmenu{
		float: left;
	}
	.desktoplogo{
		float: right;
	}
	.wsmainwp {
		margin: 0 auto;
		max-width: 1300px;
		padding: 0 15px;
		position: relative;
	}
	.desktoplogo {
		/* line-height: 70px; */
		color: white !important;
		line-height: 25px;
	}
	/* Header end */

	.padding-section{
		padding: 50px 0;
	}

	/* Footer start */
	.img-40{
		width: 40px;
		height: 40px;
	}
	.bottom-footer{
		color: white;
		margin-top: 70px;
		padding: 15px 10px;
		background-color: #5A79CB;
	}
	.contact-box {
		text-align: center;
		/* line-height: 1; */
		padding: 20px 0px;
	}
	.footer{
		padding-bottom: 0;
	}
	.f-color{
		color: var(--text-color);
	}
	/* Footer end */

	#scrollUp{
		border-radius: 15px;
		width: 30px;
		height: 30px;
		bottom: 70px;
		right: 20px;
	}
	/* .ptb-16{
		padding: 16px 0;
	} */
</style>
@stack('style')