<!-- EXTERNAL SCRIPTS ============================================= -->
<script src="{{asset('landing-page/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('landing-page/js/bootstrap.min.js')}}"></script>
<script src="{{asset('landing-page/js/modernizr.custom.js')}}"></script>
<script src="{{asset('landing-page/js/jquery.easing.js')}}"></script>
<script src="{{asset('landing-page/js/jquery.appear.js')}}"></script>
<script src="{{asset('landing-page/js/menu.js')}}"></script>
<script src="{{asset('landing-page/js/materialize.js')}}"></script>
<script src="{{asset('landing-page/js/jquery.scrollto.js')}}"></script>
<script src="{{asset('landing-page/js/jquery.countdown.min.js')}}"></script>
<script src="{{asset('landing-page/js/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('landing-page/js/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('landing-page/js/jquery.flexslider.js')}}"></script>
<script src="{{asset('landing-page/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('landing-page/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('landing-page/js/register-form.js')}}"></script>
<script src="{{asset('landing-page/js/comment-form.js')}}"></script>
<script src="{{asset('landing-page/js/jquery.validate.min.js')}}"></script>
<script src="{{asset('landing-page/js/jquery.ajaxchimp.min.js')}}"></script>

<!-- Custom Script -->
<script src="{{asset('landing-page/js/custom.js')}}"></script>
<script>
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	})
</script>
@stack('script')