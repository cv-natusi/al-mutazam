<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
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
	.image-container{
		margin-right: 1rem;
	}.slider-clink{
			text-decoration: none;
			color: white;
		}
		.slider-clink:hover{
			color: #a2b9ff;
		}
		.slider-card {
			background: rgb(172,197,19);
			background: linear-gradient(180deg, rgba(172,197,19,1) 0%, rgba(41,105,161,1) 100%);
			border: 1px solid #ddd;
			padding: 25px;
			margin-bottom: 16px;
			-webkit-transition: all 450ms ease-in-out;
			-moz-transition: all 450ms ease-in-out;
			-o-transition: all 450ms ease-in-out;
			-ms-transition: all 450ms ease-in-out;
			transition: all 450ms ease-in-out;
		}
		.hero-section{
			margin-top: 80px;
		}
		.slider {
			position: relative;
			max-width: 100%;
			height: 600px;
			margin-top: 10px;
		}
		.slider .slides li img {
			background-position: center;
		}
	/* Slider end */

	.bg-second-section{
		background-color: var(--custom-bg-section);
	}

	.text-color{
		color: var(--text-color)
	}

	.gradient{
		background-image: linear-gradient(to right, #97E2A8, #ffffff);
		border-radius: 5px;
	}

	/* Section 2 start */
	/* Section 2 end */
	.img-shadow{
		box-shadow: 3px 3px 10px #ccc;
		border-radius: 10px;
	}


	.overlay-content{
		position: absolute; 
		background: rgb(255,255,255);
		background: linear-gradient(180deg, rgba(255,255,255,0) 0%, rgba(160,166,227,1) 100%);
		display: flex;
		align-items: center;
		justify-content: center;
	}
	.overlay-card{
		left: 20px;
		right: 20px;
		margin-bottom: 30px;
		bottom: 0;
		border-radius: 0px 0px 5px 5px;
		padding: 80px 0px 30px 0px;
	}

	.text-overlay{
		color: white;
		margin-bottom: -25px;
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
    
 /*   @media (min-width: 10px) and (max-width: 610px) {*/
	/*	.navbar-dark .wsmenu > .wsmenu-list > li > a{*/
	/*		color: #000 !important;*/
	/*	}*/
	/*	.white-menu .wsmenu > .wsmenu-list > li:hover > a{*/
	/*		color:#000 !important;*/
	/*	}*/
	/*	.wsmenu > .wsmenu-list > li > ul.sub-menu > li > a, .wsmenu > .wsmenu-list > li > .wsmegamenu .link-list li a{*/
	/*		color:#000 !important;*/
	/*	}*/
	/*}*/
	/* Header start */
	.white-menu .wsmainfull{
		background-color: #5A79CB!important;
	}
	.tra-menu .wsmainfull.scroll, .white-menu .wsmainfull.scroll, .dark-menu.dark-scroll .wsmainfull.scroll{
		background-color: #5A79CB!important;
	}
	.navbar-dark .wsmenu > .wsmenu-list > li > a{
		color: #000 !important;
	}
	.white-menu .wsmenu > .wsmenu-list > li:hover > a{
		color:#000 !important;
	}
	.wsmenu > .wsmenu-list > li > ul.sub-menu > li > a, .wsmenu > .wsmenu-list > li > .wsmegamenu .link-list li a{
		color:#000 !important;
	}
	/*.navbar-dark .wsmenu > .wsmenu-list > li > a{*/
	/*	color: white;*/
	/*}*/
	/*.white-menu .wsmenu > .wsmenu-list > li:hover > a{*/
	/*	color:#ffb585;*/
	/*}*/
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
	
	.btn-x {
		background: transparent !important;
		border: 0;
		opacity: .5;
	}

	.modal-header {
		background-color: var(--color-menu);
	}
	
	.modal-body {
        max-height: calc(100vh - 210px) !important;
        overflow-y: auto !important;
    }

</style>
@stack('style')