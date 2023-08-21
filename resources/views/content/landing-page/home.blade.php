@extends('layout.landing-page.main')
@push('style')
	<style>
	/* Slider start */
		.slider-clink{
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

	/* Section 2 start */
		.color-a{
			color: #307cc1;
		}
		.color-a:hover{
			color: #0F4C81;
		}
	/* Section 2 end */
	.img-shadow{
		box-shadow: 3px 3px 10px #ccc;
		border-radius: 10px;
	}


	.overlay {
		position: absolute; 
		background: rgba(57, 57, 57, 0.5);
		/* background: rgb(178,182,218);
		background: linear-gradient(0deg, rgba(178,182,218,1) 0%, rgba(255,255,255,1) 100%); */
		/* #B2B6DA */
		display: flex;
		align-items: center;
		justify-content: center;
	}
	.overlay_1 {
		left: 20px;
		right: 20px;
		margin-bottom: 30px;
		bottom: 0;
		border-radius: 0px 0px 5px 5px;
		padding: 10px;
	}
	</style>
@endpush
@section('content')
	<!-- HERO-1 ============================================= -->
	<section id="hero-1" class="hero-section division">
		<div class="row">
			<div class="col-md-4 mtb-auto" style="line-height: 1;">
				<div class="row">
					<div class="col-md-12">
						<div class="slider-card b-bottom" style="margin: 9px -1px 0px -1px;">
							<div class="row">
								<div class="col-sm-12 cbox-5-txt">
									<h5 class="h5-xs fwhite fw8">Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum</h5>
									<p class="fwhite fw3 mb-3">Lorem ipsum, atau ringkasnya lipsum, adalah teks standar yang ditempatkan untuk mendemostrasikan el...</p>
									<a href="javascript:void(0)" class="slider-clink m-0">[baca]</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="slider-card b-bottom" style="margin: 9px -1px 0px -1px;">
							<div class="row">
								<div class="col-sm-12 cbox-5-txt">
									<h5 class="h5-xs fwhite fw8">Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum</h5>
									<p class="fwhite fw3 mb-3">Lorem ipsum, atau ringkasnya lipsum, adalah teks standar yang ditempatkan untuk mendemostrasikan el...</p>
									<a href="javascript:void(0)" class="slider-clink m-0">[baca]</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="slider-card b-bottom" style="margin: 9px -1px 0px -1px;">
							<div class="row">
								<div class="col-sm-12 cbox-5-txt">
									<h5 class="h5-xs fwhite fw8">Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum</h5>
									<p class="fwhite fw3 mb-3">Lorem ipsum, atau ringkasnya lipsum, adalah teks standar yang ditempatkan untuk mendemostrasikan el...</p>
									<a href="javascript:void(0)" class="slider-clink m-0">[baca]</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-8 p-0">
				<div class="slider">
					<ul class="slides">
						<!-- SLIDE #1 -->
						<li id="slide-1">
							<img src="{{asset('landing-page/images/slider/slide-1.jpg')}}" alt="slide-background"> <!-- Background Image -->
							<!-- Image Caption -->
							<div class="caption d-flex align-items-center left-align">
								<div class="container">
									<div class="row">
										<div class="col-md-8 col-lg-7">
											<div class="caption-txt">
												<h2 class="h2-sm">25K+ students trust our online courses</h2> <!-- Title -->
												<!-- Text -->
												<p class="p-lg">
													Feugiat primis ligula gravida auctor egestas augue viverra mauri 
													tortor in iaculis placerat an eugiat mauris ipsum undo viverra tortor gravida 
													purus lorem in tortor a viverr
												</p>
												<a href="#categories-3" class="btn btn-md btn-rose tra-black-hover">View Popular Courses</a> <!-- Button -->
											</div>
										</div>
									</div>
									<!-- End row -->
								</div>
								<!-- End container -->
							</div>
							<!-- End Image Caption -->
						</li>
						<!-- END SLIDE #1 -->
		
						<!-- SLIDE #2 -->
						<li id="slide-2">
							<img src="{{asset('landing-page/images/slider/slide-2.jpg')}}" alt="slide-background">
								<div class="caption d-flex align-items-center right-align">
									<div class="container">
									<div class="row">
										<div class="col-md-8 col-lg-7">
											<div class="caption-txt white-color">
												<h2 class="h2-sm">2,769 online courses from the best tutors</h2>
												<form class="hero-form" action="categories-list.html">
													<div class="input-group">
														<input type="text" class="form-control" placeholder="What do you want to learn?" aria-label="Search">
														<span class="input-group-btn"><button type="submit" class="btn"><i class="fa fa-search" aria-hidden="true"></i></button></span>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
							</li>
						<!-- END SLIDE #2 -->
		
						<!-- SLIDE #3 -->
						<li id="slide-3">
								<img src="{{asset('landing-page/images/slider/slide-3.jpg')}}" alt="slide-background">
							<div class="caption d-flex align-items-center right-align">
									<div class="container">
									<div class="row">
										<div class="col-md-8 col-lg-7">
											<div class="caption-txt">
												<h2 class="h2-sm">High quality courses from the leading experts</h2>
												<p class="p-lg">Feugiat primis ligula gravida auctor egestas augue viverra mauri 
													tortor in iaculis placerat an eugiat mauris ipsum undo viverra tortor gravida 
													purus lorem in tortor a viverr
												</p>
												<a href="#courses-4" class="btn btn-md btn-rose tra-black-hover">View Popular Courses</a>
											</div>
											</div>
									</div>
									<!-- End row -->
								</div>
								<!-- End container -->
							</div>
							<!-- End Image Caption -->
							</li>
						<!-- END SLIDE #3 -->
					</ul>
				</div>
			</div>
		</div>
	</section>
	<!-- END HERO-1 -->

	<!-- ABOUT-2 ============================================= -->
	<section id="about-2" class="bg-second-section wide-60 about-section division">
		<div class="container">
			<div class="row d-flex align-items-center">
				<div class="col-md-5">
					<div class="txt-block pc-25 mb-40">
						<p class="h3-sm fw7 m-0" style="font-size: 14px; color: #0F4C81;">MTs AL-MUTAZAM</p>
						<h3 class="h3-sm" style="line-height: 1">Sambutan<br>Kepala Madrasah</h3>
						<p class="text-justify">
							Puji syukur kehadirat Allah SWT, karena kita masih diberikan kesempatan, kekuatan, dan kesehatan untuk melanjutkan ibadah kita, karya kita, serta tugas dan pengabdian kita dalam upaya mencerdaskan kehidupan bangsa dan negara yang tercinta. Rasa syukur ini juga saya panjatkan dalam rangka peluncuran situs website resmi MTs Al-Multazam Mojokerto sebagai sarana informasi dan komunikasi.
							<a href="javascript:void(0)" class="color-a fw4">[Baca Selengkapnya]</a>
						</p>
						<div class="row">
							<div class="col-md-3">TTD</div>
							<div class="col-md-9 text-left">
								<h5>Nama Kepala Madrasah</h5>
								<p>Kepala Sekolah</p>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-7">
					<div class="embed-responsive embed-responsive-16by9" style="height:100%">
						<div id="playerId"></div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End ABOUT-2 -->

	<section id="team-3" class="pt-50 pb-50 team-section division">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h3>Berita Terbaru</h3>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					{{-- <div class="team-3-photo"> --}}
						<div class="t-3-photo mb-25">
							<img class="img-shadow mx-auto d-block responsive img-thumbnail img-fluid" src="https://www.quipper.com/id/blog/wp-content/uploads/2023/03/Apa-Itu-Peringkat-Sekolah-Ini-Penjelasannya-Lengkap-dengan-Cara-Melihat-Peringkat-Sekolah.webp" alt="team-member-foto">
							<h4 class="mt-3">Judul</h4>
							<p class="text-color">Lorem ipsum, atau ringkasnya lipsum, adalah teks standar yang ditempatkan untuk mendemostrasikan elemen grafis atau <a href="javascript:void(0)" class="color-a">[selengkapnya]</a></p>
						</div>
						{{-- <div class="tm-3-social clearfix">
							<ul class="text-center clearfix">																			
								<li><a href="#" class="ico-facebook"><i class="fab fa-facebook-f"></i></a></li>
								<li><a href="#" class="ico-twitter"><i class="fab fa-twitter"></i></a></li>
								<li><a href="#" class="ico-google-plus"><i class="fab fa-google-plus-g"></i></a></li>	
								<li><a href="#" class="ico-linkedin"><i class="fab fa-linkedin-in"></i></a></li>
							</ul>
						</div>
						<div class="t-3-links">
							<a href="#" class="btn btn-md btn-tra-grey rose-hover">Website</a>
							<a href="mailto:yourdomain@mail.com" class="btn btn-md btn-tra-grey rose-hover">hello@yourdomain.com</a>
						</div> --}}
					{{-- </div> --}}
				</div>
				<div class="col-md-4">
						<div class="t-3-photo mb-25">
							<img class="img-shadow mx-auto d-block responsive img-thumbnail img-fluid" src="https://www.quipper.com/id/blog/wp-content/uploads/2023/03/Apa-Itu-Peringkat-Sekolah-Ini-Penjelasannya-Lengkap-dengan-Cara-Melihat-Peringkat-Sekolah.webp" alt="team-member-foto">
							<h4 class="mt-3">Judul</h4>
							<p class="text-color">Lorem ipsum, atau ringkasnya lipsum, adalah teks standar yang ditempatkan untuk mendemostrasikan elemen grafis atau <a href="javascript:void(0)" class="color-a">[selengkapnya]</a></p>
						</div>
				</div>
				<div class="col-md-4">
						<div class="t-3-photo mb-25">
							<img class="img-shadow mx-auto d-block responsive img-thumbnail img-fluid" src="https://www.quipper.com/id/blog/wp-content/uploads/2023/03/Apa-Itu-Peringkat-Sekolah-Ini-Penjelasannya-Lengkap-dengan-Cara-Melihat-Peringkat-Sekolah.webp" alt="team-member-foto">
							<h4 class="mt-3">Judul</h4>
							<p class="text-color">Lorem ipsum, atau ringkasnya lipsum, adalah teks standar yang ditempatkan untuk mendemostrasikan elemen grafis atau <a href="javascript:void(0)" class="color-a">[selengkapnya]</a></p>
						</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<a href="javascript:void(0)" class="color-a fw6"><i>LIHAT BERITA TERBARU LAINNYA >></i></a>
				</div>
			</div>
		</div>
	</section>


	<!-- COURSES-3 ============================================= -->
	{{-- <section id="courses-3" class="bg-lightgrey wide-60 courses-section division">
		<div class="container">
			<!-- SECTION TITLE -->
			<div class="row">	
				<div class="col-md-12">
					<div class="section-title mb-10">
						<h3 class="h3-sm">Berita Terbaru</h3>
					</div>	
				</div>
			</div>

			<!-- COURSES HOLDER -->
			<div class="row courses-grid">
				<!-- COURSE #1 -->
				<div class="col-md-6 col-lg-4 col-xl-3">
					<div class="cbox-1">
						<a href="course-details.html">
							<img class="img-fluid" src="{{asset('landing-page/images/courses/course-1-img.jpg')}}" alt="course-preview">
							<div class="cbox-4-txt">
								<p class="course-tags">
									<span>Languages</span>
									<span>English</span>
								</p>
								<h5 class="h5-xs">Beginner Level English - Foundations</h5>
								<div class="course-rating clearfix">
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star-half-alt"></i>
									<span>4.5 (26 Ratings)</span>
								</div>
								<span class="course-price"><span class="old-price">$149.99</span> $138.99</span>
							</div>
						</a>
					</div>
				</div>
				<!-- END COURSE #1 -->

				<!-- COURSE #2 -->
				<div class="col-md-6 col-lg-4 col-xl-3">
					<div class="cbox-1">
						<a href="course-details.html">
							<img class="img-fluid" src="{{asset('landing-page/images/courses/course-2-img.jpg')}}" alt="course-preview">
							<div class="cbox-4-txt">
								<p class="course-tags">
									<span>Languages</span>
									<span>English</span>
								</p>
								<h5 class="h5-xs">Diploma in Basic English Grammar - Revised 2019</h5>
								<div class="course-rating clearfix">
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<span>5 (118 Ratings)</span>
								</div>
								<span class="course-price"><span class="old-price">$174.99</span> $59.99</span>
							</div>
						</a>
					</div>
				</div>
				<!-- END COURSE #2 -->

				<!-- COURSE #3 -->
				<div class="col-md-6 col-lg-4 col-xl-3">
					<div class="cbox-1">
						<a href="course-details.html">
							<img class="img-fluid" src="{{asset('landing-page/images/courses/course-3-img.jpg')}}" alt="course-preview">
							<div class="cbox-4-txt">
								<p class="course-tags"><span>IT Managment</span></p>
								<h5 class="h5-xs">Diploma in Information Technology Management</h5>
								<div class="course-rating clearfix">
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star-half-alt"></i>
									<span>4.5 (72 Ratings)</span>
								</div>
								<span class="course-price"><span class="old-price">$119.99</span> $34.99</span>
							</div>
						</a>
					</div>
				</div>
				<!-- END COURSE #3 -->

				<!-- COURSE #4 -->
				<div class="col-md-6 col-lg-4 col-xl-3">
					<div class="cbox-1">
						<a href="course-details.html">
							<img class="img-fluid" src="{{asset('landing-page/images/courses/course-4-img.jpg')}}" alt="course-preview">
							<div class="cbox-4-txt">
								<p class="course-tags">
									<span>SEO</span>
									<span>Marketing</span>
								</p>
								<h5 class="h5-xs">Google AdWords for Beginners 2020</h5>
								<div class="course-rating clearfix">
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<span>5 (281 Ratings)</span>
								</div>
								<span class="course-price">Free Course</span>
							</div>
						</a>
					</div>
				</div>
				<!-- END COURSE #4 -->
			</div>
			<!-- END COURSES HOLDER -->
		</div>
		<!-- End container -->
	</section> --}}
	<!-- END COURSES-3 -->

	<!-- ABOUT-3 ============================================= -->
	<section id="about-3" class="bg-second-section pt-50 pb-50 about-section division">
		<div class="container">
			<div class="row mb-2">
				<div class="col-md-12">
					<h3>Event Terbaru<br>MTs Al-Mutazam</h3>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="t-3-photo mb-25">
						<img class="img-shadow mx-auto d-block responsive img-thumbnail img-fluid" src="https://www.quipper.com/id/blog/wp-content/uploads/2023/03/Apa-Itu-Peringkat-Sekolah-Ini-Penjelasannya-Lengkap-dengan-Cara-Melihat-Peringkat-Sekolah.webp" alt="team-member-foto">
						<div class="overlay overlay_1">
						  <h3>Image title</h3> 
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="t-3-photo mb-25">
						<img class="img-shadow mx-auto d-block responsive img-thumbnail img-fluid" src="https://www.quipper.com/id/blog/wp-content/uploads/2023/03/Apa-Itu-Peringkat-Sekolah-Ini-Penjelasannya-Lengkap-dengan-Cara-Melihat-Peringkat-Sekolah.webp" alt="team-member-foto">
					</div>
				</div>
				<div class="col-md-4">
					<div class="t-3-photo mb-25">
						<img class="img-shadow mx-auto d-block responsive img-thumbnail img-fluid" src="https://www.quipper.com/id/blog/wp-content/uploads/2023/03/Apa-Itu-Peringkat-Sekolah-Ini-Penjelasannya-Lengkap-dengan-Cara-Melihat-Peringkat-Sekolah.webp" alt="team-member-foto">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<a href="javascript:void(0)" class="color-a fw6"><i>LIHAT EVENT LAINNYA >></i></a>
				</div>
			</div>
			{{-- <div class="row d-flex align-items-center">
				<div class="col-md-7 col-lg-6">
					<div class="txt-block pc-25">
					<h3 class="h3-sm">Event Mendatang<br>MTs Al-Mutazam</h3>
					<p>
						An enim nullam tempor sapien gravida donec porta and blandit ipsum enim justo integer velna vitae 
						auctor integer congue magna and purus pretium risus ligula rutrum luctus ultrice 
					</p>
					<ul class="txt-list mb-15">
						<li>Nullam rutrum eget nunc varius etiam mollis risus undo</li>
						<li>Integer congue magna at pretium purus pretium ligula at rutrum risus luctus dolor auctor ipsum blandit purus</li>
						<li>Risus at congue etiam aliquam sapien egestas posuere</li>
					</ul>
					<a href="categories-list.html" class="btn btn-md btn-rose tra-black-hover">Start Learning Now</a>
					</div>
				</div>
				<div class="col-md-5 col-lg-6">
					<div class="img-block">
						<img class="img-fluid" src="{{asset('landing-page/images/image-02.png')}}" alt="about-image">
					</div>
				</div>
			</div> --}}
		</div>
	</section>
	<!-- End ABOUT-3 -->

	<!-- SERVICES-6 ============================================= -->
	<section id="services-6" class="bg-03 wide-60 services-section division">
		<div class="container white-color">
			<!-- SERVICES TEXT -->
			<div class="row">
				<div class="col-lg-10 offset-lg-1 text-center">
					<div class="services-6-txt">
						<h3 class="h3-md">Get Quality Education with eTreeks</h3>
						<p class="p-md">Integer congue magna at pretium purus pretium ligula at rutrum luctus risus eros dolor auctor ipsum blandit luctus purus vehicula magna a tempor laoreet</p>
						<a href="javascript:void(0)" class="btn btn-md btn-rose tra-white-hover">Start Learning Now!</a>
					</div>
				</div>
			</div>
			<!-- END SERVICES TEXT -->

			<!-- SERVICE BOXES -->
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="row">
						<!-- SERVICE BOX #1 -->
						<div class="sbox-6 icon-xl">
							<span class="flaticon-031-select"></span>
							<h5 class="h5-xs">Trending Courses</h5>
						</div>

						<!-- SERVICE BOX #2 -->
						<div class="sbox-6 icon-xl">
							<span class="flaticon-028-learning-1"></span>
							<h5 class="h5-xs">Certified Teachers</h5>
						</div>

						<!-- SERVICE BOX #3 -->
						<div class="sbox-6 icon-xl">
							<span class="flaticon-006-diploma"></span>
							<h5 class="h5-xs">Graduation Certificate</h5>
						</div>

						<!-- SERVICE BOX #4 -->
						<div class="sbox-6 icon-xl">
							<span class="flaticon-013-elearning-5"></span>
							<h5 class="h5-xs">Online Course Facilities</h5>
						</div>

						<!-- SERVICE BOX #5 -->
						<div class="sbox-6 icon-xl">
							<span class="flaticon-001-book"></span>
							<h5 class="h5-xs">Free Books & Library</h5>
						</div>
					</div>
				</div>
			</div>
			<!-- END SERVICE BOXES -->
		</div>
	</section>
	<!-- End SERVICES-6 -->

	<!-- CATEGORIES-3 ============================================= -->
	<section id="categories-3" class="wide-100 categories-section division">
		<div class="container">
			<!-- SECTION TITLE -->
			<div class="row">
				<div class="col-md-12">
					<div class="section-title mb-60">
						<h3 class="h3-sm">Top Trending Categories</h3>
						<p class="p-md">Aliquam a augue suscipit, luctus neque purus ipsum neque dolor primis libero tempus, blandit posuere and ligula varius magna a porta</p>
						<div class="title-btn"><a href="categories-list.html" class="btn btn-tra-grey rose-hover">View All Categories</a></div>
					</div>
				</div>
			</div>

			<!-- CATEGORIE BOXES CAROUSEL -->
			<div class="row">
				<div class="col-lg-12">
					<div class="owl-carousel owl-theme owl-loaded categories-carousel">
						<!-- CATEGORIE BOX #1 -->
						<div class="bg-blue c3-box text-center icon-md white-color">
							<a href="category-details.html">
								<div class="c3-box-icon"><img src="{{asset('landing-page/images/icons/categories/development.png')}}" alt="category-icon"></div>
								<div class="cbox-3-txt">
									<h5 class="h5-md">Development</h5>
									<p>36 Courses</p>
								</div>
							</a>
						</div>
						<!-- END CATEGORIE BOX #1 -->


						<!-- CATEGORIE BOX #2 -->
						<div class="bg-green c3-box text-center icon-md white-color">
							<a href="category-details.html">
								<div class="c3-box-icon">
									<img src="{{asset('landing-page/images/icons/categories/money.png')}}" alt="category-icon">
								</div>
								<div class="cbox-3-txt">
									<h5 class="h5-md">Finance</h5>
									<p>28 Courses</p>	
								</div>
							</a>
						</div>
						<!-- END CATEGORIE BOX #2 -->


						<!-- CATEGORIE BOX #3 -->
						<div class="bg-red c3-box text-center icon-md white-color">
							<a href="category-details.html">
								<div class="c3-box-icon"><img src="{{asset('landing-page/images/icons/categories/chip.png')}}" alt="category-icon"></div>
								<div class="cbox-3-txt">
									<h5 class="h5-md">IT & Software</h5>
									<p>54 Courses</p>
								</div>
							</a>
						</div>
						<!-- END CATEGORIE BOX #3 -->

						<!-- CATEGORIE BOX #4 -->
						<div class="bg-teal c3-box text-center white-color">
							<a href="category-details.html">
								<div class="c3-box-icon">
									<img src="{{asset('landing-page/images/icons/categories/gear.png')}}" alt="category-icon">
								</div>
								<div class="cbox-3-txt">
									<h5 class="h5-md">Engineering</h5>
									<p>68 Courses</p>	
								</div>
							</a>
						</div>
						<!-- END CATEGORIE BOX #4 -->

						<!-- CATEGORIE BOX #5 -->
						<div class="bg-yellow c3-box text-center icon-md white-color">
							<a href="category-details.html">
								<div class="c3-box-icon"> 
									<img src="{{asset('landing-page/images/icons/categories/science.png')}}" alt="category-icon">
								</div>
								<div class="cbox-3-txt">
									<h5 class="h5-md">Science</h5>
								<p>59 Courses</p>	
								</div>
							</a>
						</div>
						<!-- END CATEGORIE BOX #5 -->

						<!-- CATEGORIE BOX #6 -->
						<div class="bg-violet c3-box text-center icon-md white-color">
							<a href="category-details.html">
								<div class="c3-box-icon">
									<img src="{{asset('landing-page/images/icons/categories/marketing.png')}}" alt="category-icon">
								</div>
								<div class="cbox-3-txt">
									<h5 class="h5-md">Marketing</h5>
									<p>28 Courses</p>	
								</div>
							</a>
						</div>
						<!-- END CATEGORIE BOX #6 -->

						<!-- CATEGORIE BOX #7 -->
						<div class="bg-orange c3-box text-center icon-md white-color">
							<a href="category-details.html">
								<div class="c3-box-icon"><img src="{{asset('landing-page/images/icons/categories/translation.png')}}" alt="category-icon"></div>
								<div class="cbox-3-txt">
									<h5 class="h5-md">Languages</h5>
									<p>137 Courses</p>	
								</div>
							</a>
						</div>
						<!-- END CATEGORIE BOX #7 -->

						<!-- CATEGORIE BOX #8 -->
						<div class="bg-lightgreen c3-box text-center icon-md white-color">
							<a href="category-details.html">
								<div class="c3-box-icon"><img src="{{asset('landing-page/images/icons/categories/heartbeat.png')}}" alt="category-icon"></div>
								<div class="cbox-3-txt">
									<h5 class="h5-md">Health & Fitness</h5>
									<p>94 Courses</p>	
								</div>
							</a>
						</div>
						<!-- END CATEGORIE BOX #8 -->

						<!-- CATEGORIE BOX #9 -->
						<div class="bg-skyblue c3-box text-center icon-md white-color">
							<a href="category-details.html">
								<div class="c3-box-icon"><img src="{{asset('landing-page/images/icons/categories/design.png')}}" alt="category-icon"></div>
								<div class="cbox-3-txt">
									<h5 class="h5-md">Design & Arts</h5>
									<p>72 Courses</p>
								</div>
							</a>
						</div>
						<!-- END CATEGORIE BOX #9 -->

						<!-- CATEGORIE BOX #10 -->
						<div class="bg-yellow c3-box text-center icon-md white-color">
							<a href="category-details.html">
								<div class="c3-box-icon">
									<img src="{{asset('landing-page/images/icons/categories/human-mind')}}.png" alt="category-icon">
								</div>
								<div class="cbox-3-txt">
									<h5 class="h5-md">Life Science</h5>
									<p>72 Courses</p>	
								</div>
							</a>
						</div>
						<!-- END CATEGORIE BOX #10 -->

						<!-- CATEGORIE BOX #11 -->
						<div class="bg-red c3-box text-center icon-md white-color">
							<a href="category-details.html">
								<div class="c3-box-icon"><img src="{{asset('landing-page/images/icons/categories/calculator.png')}}" alt="category-icon"></div>
								<div class="cbox-3-txt">
									<h5 class="h5-md">Mathematics</h5>
									<p>63 Courses</p>
								</div>
							</a>
						</div>
						<!-- END CATEGORIE BOX #11 -->

						<!-- CATEGORIE BOX #12 -->
						<div class="bg-olive c3-box text-center icon-md white-color">
							<a href="category-details.html">
								<div class="c3-box-icon"><img src="{{asset('landing-page/images/icons/categories/photo.png')}}" alt="category-icon"></div>
								<div class="cbox-3-txt">
									<h5 class="h5-md">Photography</h5>
									<p>106 Courses</p>	
								</div>
							</a>
						</div>
						<!-- END CATEGORIE BOX #13 -->
					</div>
				</div>
			</div>
			<!-- END CATEGORIE BOXES CAROUSEL -->
		</div>
	</section>
	<!-- END CATEGORIES-3 -->

	<!-- COURSES-5 ============================================= -->
	<section id="courses-5" class="bg-lightgrey courses-section division">
		<div class="container">
			<!-- SECTION TITLE -->
			<div class="row">
				<div class="col-md-12">
					<div class="section-title mb-60">
						<h3 class="h3-sm">Best Online Courses of 2019</h3>
						<p class="p-md">Aliquam a augue suscipit, luctus neque purus ipsum neque dolor primis libero tempus, blandit posuere and ligula varius magna a porta</p>
					</div>
				</div>
			</div>

			<div class="row">
				<!-- COURSES LIST -->
				<div class="col-lg-6">
					<!-- COURSE #1 -->
					<div class="cbox-5 b-bottom">
						<a href="course-details.html">
							<div class="row">
								<div class="col-sm-7 cbox-5-txt">
									<h5 class="h5-xs">English for Beginners: Intensive English Speaking Course</h5>
									<p class="p-sm grey-color">54 Total Hours - Updated 2/2020</p>
									<div class="course-rating">
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<span class="cr-rating">4.89 (331 Reviews)</span>
									</div>
								</div>
								<div class="col-sm-3 cbox-5-data text-center clearfix">
									<p class="grey-color"><i class="fas fa-users"></i> 7348</p>
								</div>
								<div class="col-sm-2 cbox-5-price text-right clearfix">
									<span class="course-price">$34.99</span>
									<span class="old-price">$64.99</span>
								</div>
							</div>
						</a>
					</div>
					<!-- END COURSE #1 -->
				</div>
				<!-- END COURSES LIST -->

				<!-- COURSES LIST -->
				<div class="col-lg-6">
					<!-- COURSE #4 -->
					<div class="cbox-5 b-bottom">
						<a href="course-details.html">
							<div class="row">
								<div class="col-sm-7 cbox-5-txt">
									<h5 class="h5-xs">IT Management - Building Information Systems</h5>
									<p class="p-sm grey-color">48 Total Hours - Updated 2/2020</p>
									<div class="course-rating">
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star-half-alt"></i>
										<span class="cr-rating">4.08 (264 Reviews)</span>
									</div>
								</div>
								<div class="col-sm-3 cbox-5-data text-center clearfix"><p class="grey-color"><i class="fas fa-users"></i> 15491</p></div>
								<div class="col-sm-2 cbox-5-price text-right clearfix">
									<span class="course-price">$22.99</span>
									<span class="old-price">$44.99</span>
								</div>
							</div>
						</a>
					</div>
					<!-- END COURSE #4 -->
				</div>
				<!-- END COURSES LIST -->
			</div>
			<!-- End row -->
		</div>
		<!-- End container -->
	</section>
	<!-- END COURSES-5 -->

	<!-- TESTIMONIALS-3 ============================================= -->
	<section id="reviews-3" class="bg-01 reviews-section division">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<!-- TESTIMONIAL TEXT -->
					<div class="review-3">
						<div class="quote-ico"><img src="{{asset('landing-page/images/left-quote.png')}}" alt="quote-image"></div>
						<p>
							An enim nullam tempor sapien gravida donec eTreeks - enim ipsum porta justo integer at odio velna and vitae 
							auctor integer congue magna at pretium purus pretium ligula rutrum luctus risus ultrice luctus blandit congue 
							magna. Sagittis congue augue egestas volutpat egestas magna consequat posuere nunc, eu porttitor neque 
						</p>
						<div class="review-3-author">
							<div class="tst-rating clearfix">
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<i class="fas fa-star-half-alt"></i>
							</div>
							<h5 class="h5-md">Jennifer S.</h5>	
							<span>Online Student (Public Relations)</span>
						</div>
					</div>
					<!-- END TESTIMONIAL TEXT -->
				</div>
			</div>
			<!-- End row -->
		</div>
		<!-- End container -->
	</section>
	<!-- END TESTIMONIALS-3 -->

	<!-- COURSES-1 ============================================= -->
	<section id="courses-1" class="wide-100 courses-section division">
		<div class="container">
			<!-- SECTION TITLE -->
			<div class="row">
				<div class="col-md-12">
					<div class="section-title mb-60">
						<h3 class="h3-sm">Best Courses of All-Time</h3>
						<p class="p-md">Aliquam a augue suscipit, luctus neque purus ipsum neque dolor primis libero tempus, blandit posuere and ligula varius magna a porta</p>
						<div class="title-btn">
							<a href="javascript:void(0)" class="btn btn-tra-grey rose-hover">View All Courses</a>
						</div>
					</div>
				</div>
			</div>

			<!-- COURSE BOXES CAROUSEL -->
			<div class="row">
				<div class="col-lg-12">
					<div class="owl-carousel owl-theme owl-loaded courses-carousel">
						<!-- COURSE #1 -->
						<div class="cbox-1">
							<a href="course-details.html">
								<img class="img-fluid" src="{{asset('landing-page/images/courses/course-1-img.jpg')}}" alt="course-preview">
								<div class="cbox-1-txt">
									<p class="course-tags">
										<span>Languages</span>
										<span>English</span>
									</p>
									<h5 class="h5-xs">Beginner Level English - Foundations</h5>
									<div class="course-rating clearfix">
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star-half-alt"></i>
										<span>4.5 (26 Ratings)</span>
									</div>
									<span class="course-price"><span class="old-price">$149.99</span> $138.99</span>
								</div>
							</a>
						</div>
						<!-- END COURSE #1 -->

						<!-- COURSE #2 -->
						<div class="cbox-1">
							<a href="course-details.html">
								<img class="img-fluid" src="{{asset('landing-page/images/courses/course-2-img.jpg')}}" alt="course-preview">
								<div class="cbox-1-txt">
									<p class="course-tags">
										<span>Languages</span>
										<span>English</span>
									</p>
									<h5 class="h5-xs">Diploma in Basic English Grammar - Revised 2019</h5>
									<div class="course-rating clearfix">
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<span>5 (118 Ratings)</span>
									</div>
									<span class="course-price"><span class="old-price">$174.99</span> $59.99</span>
								</div>
							</a>
						</div>
						<!-- END COURSE #2 -->

						<!-- COURSE #3 -->
						<div class="cbox-1">
							<a href="course-details.html">
								<img class="img-fluid" src="{{asset('landing-page/images/courses/course-3-img.jpg')}}" alt="course-preview">
								<div class="cbox-1-txt">
									<p class="course-tags"><span>Network Security</span></p>
									<h5 class="h5-xs">The Complete Cyber Security Course : End Point Protection!</h5>
									<div class="course-rating clearfix">
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star-half-alt"></i>
										<span>4.5 (72 Ratings)</span>
									</div>
									<span class="course-price"><span class="old-price">$119.99</span> $34.99</span>
								</div>
							</a>
						</div>
						<!-- END COURSE #3 -->

						<!-- COURSE #4 -->
						<div class="cbox-1">
							<a href="course-details.html">
								<img class="img-fluid" src="{{asset('landing-page/images/courses/course-4-img.jpg')}}" alt="course-preview">
								<div class="cbox-1-txt">
									<p class="course-tags">
										<span>SEO</span>
										<span>Marketing</span>
									</p>
									<h5 class="h5-xs">Google AdWords for Beginners 2020</h5>
									<!-- Course Rating -->
									<div class="course-rating clearfix">
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<span>5 (281 Ratings)</span>
									</div>
									<span class="course-price">Free Course</span>
								</div>
							</a>
						</div>
						<!-- END COURSE #4 -->

						<!-- COURSE #5 -->
						<div class="cbox-1">
							<a href="course-details.html">
								<img class="img-fluid" src="{{asset('landing-page/images/courses/course-5-img.jpg')}}" alt="course-preview">
								<div class="cbox-1-txt">
									<!-- Course Tags -->
									<p class="course-tags">
										<span>Design</span>
										<span>WordPress</span>
									</p>
									<h5 class="h5-xs">Wordpress for Beginners - Master Wordpress Quickly</h5>
									<!-- Course Rating -->
									<div class="course-rating clearfix">
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<span>4.15 (58 Ratings)</span>
									</div>
									<span class="course-price"><span class="old-price">$194.99</span> $62.99</span>
								</div>
							</a>
						</div>
						<!-- END COURSE #5 -->

						<!-- COURSE #6 -->
						<div class="cbox-1">
							<a href="course-details.html">
								<img class="img-fluid" src="{{asset('landing-page/images/courses/course-6-img.jpg')}}" alt="course-preview">
								<div class="cbox-1-txt">
									<!-- Course Tags -->
									<p class="course-tags">
										<span>Sowtware</span>
										<span>Productivity</span>
									</p>
									<h5 class="h5-xs">Excel Essentials: The Complete Excel Series - Level 1 & 2</h5>
									<!-- Course Rating -->
									<div class="course-rating clearfix">
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<span>5 (31 Ratings)</span>
									</div>
									<span class="course-price"><span class="old-price">$149.99</span> $45.99</span>
								</div>
							</a>
						</div>
						<!-- END COURSE #6 -->

						<!-- COURSE #7 -->
						<div class="cbox-1">
							<a href="course-details.html">
								<img class="img-fluid" src="{{asset('landing-page/images/courses/course-7-img.jpg')}}" alt="course-preview">
								<div class="cbox-1-txt">
									<!-- Course Tags -->
									<p class="course-tags">
										<span>Web Design</span>
										<span>HTML 5</span>
									</p>
									<h5 class="h5-xs">Landing Page Design & Conversion Rate Optimization 2020</h5>
									<!-- Course Rating -->
									<div class="course-rating clearfix">
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star-half-alt"></i>
										<span>4.8 (74 Ratings)</span>
									</div>
									<span class="course-price"><span class="old-price">$109.99</span> $23.99</span>
								</div>
							</a>
						</div>
						<!-- END COURSE #7 -->

						<!-- COURSE #8 -->
						<div class="cbox-1">
							<a href="course-details.html">
								<img class="img-fluid" src="{{asset('landing-page/images/courses/course-8-img.jpg')}}" alt="course-preview">
								<div class="cbox-1-txt">
									<!-- Course Tags -->
									<p class="course-tags">
										<span>Internet</span>
										<span>Marketing</span>
									</p>
									<h5 class="h5-xs">Instagram Marketing 2020: A Step-By-Step to 10,000 Followers</h5>
									<!-- Course Rating -->
									<div class="course-rating clearfix">
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<span>5 (374 Ratings)</span>
									</div>
									<span class="course-price"><span class="old-price">$169.99</span> $33.99</span>
								</div>
							</a>
						</div>
						<!-- END COURSE #8 -->
					</div>
				</div>
			</div>
			<!-- END COURSES BOXES CAROUSEL -->
		</div>
	</section>
	<!-- END COURSES-1 -->

	<!-- BANNER-5 ============================================= -->
	<section id="banner-5" class="bg-whitesmoke wide-60 banner-section division">
		<div class="container">
			<div class="row">
				<!-- BANNER TEXT -->
				<div class="col-md-6">
					<div class="banner-5-txt">
						<img src="{{asset('landing-page/images/image-04.png')}}" alt="banner-icon">
						<div class="b5-txt">
							<h4 class="h4-xs">Become a Teacher</h4>
							<p>Feugiat primis ligula a risus auctor egestas an augue mauri and viverra tortor iaculis an eugiat viverra</p>
							<a href="become-a-teacher.html" class="btn btn-rose tra-black-hover">Find Out More</a>
						</div>
					</div>
				</div>
				<!-- END BANNER TEXT -->

				<!-- BANNER TEXT -->
				<div class="col-md-6">
					<div class="banner-5-txt">
						<img src="{{asset('landing-page/images/image-05.png')}}" alt="banner-icon">
						<div class="b5-txt">
							<h4 class="h4-xs">eTreeks for Business</h4>
							<p>Feugiat primis ligula a risus auctor egestas an augue mauri and viverra tortor iaculis an eugiat viverra</p>
							<a href="javascript:void(0)" class="btn btn-rose tra-black-hover">Find Out More</a>
						</div>
					</div>
				</div>
				<!-- END BANNER TEXT -->
			</div>
			<!-- End row -->
		</div>
		<!-- End container -->
	</section>
	<!-- END BANNER-5 -->

	<!-- SERVICES-5 ============================================= -->
	<section id="services-5" class="bg-lightgrey wide-60 services-section division">
		<div class="container">
			<!-- SECTION TITLE -->
			<div class="row">
				<div class="col-md-12">
					<div class="section-title title-centered mb-60">
						<h3 class="h3-sm">Best Learning Opportunities</h3>
						<p class="p-md">Aliquam a augue suscipit, luctus neque purus ipsum neque dolor primis libero tempus, blandit posuere and ligula varius magna a porta</p>
					</div>
				</div>
			</div>

			<div class="row">
				<!-- SERVICE BOX #1 -->
				<div class="col-md-6 col-lg-4">
					<div class="sbox-5">
						<img class="img-70" src="{{asset('landing-page/images/icons/education.png')}}" alt="service-icon"> <!-- Icon -->
						<div class="sbox-5-txt">
							<h5 class="h5-md">Trending Courses</h5>
							<p class="grey-color">Augue luctus egestas luctus neque purus an ipsum neque dolor primis libero tempus at blandit massa</p>
						</div>
					</div>
				</div>
				<!-- END SERVICE BOX #1 -->

				<!-- SERVICE BOX #2 -->
				<div class="col-md-6 col-lg-4">
					<div class="sbox-5">
						<img class="img-70" src="{{asset('landing-page/images/icons/presentation.png')}}" alt="service-icon"> <!-- Icon -->
						<div class="sbox-5-txt">
							<h5 class="h5-md">Certified Teachers</h5>
							<p class="grey-color">Augue luctus egestas luctus neque purus an ipsum neque dolor primis libero tempus at blandit massa</p>
						</div>
					</div>
				</div>
				<!-- END SERVICE BOX #2 -->

				<!-- SERVICE BOX #3 -->
				<div class="col-md-6 col-lg-4">
					<div class="sbox-5">
						<img class="img-70" src="{{asset('landing-page/images/icons/certificate.png')}}" alt="service-icon"><!-- Icon -->
						<div class="sbox-5-txt">
							<h5 class="h5-md">Graduation Certificate</h5>
							<p class="grey-color">Augue luctus egestas luctus neque purus an ipsum neque dolor primis libero tempus at blandit massa</p>
						</div>
					</div>
				</div>
				<!-- END SERVICE BOX #3 -->

				<!-- SERVICE BOX #4 -->
				<div class="col-md-6 col-lg-4">
					<div class="sbox-5">
						<img class="img-70" src="{{asset('landing-page/images/icons/elearning-1.png')}}" alt="service-icon"> <!-- Icon -->
						<div class="sbox-5-txt">
							<h5 class="h5-md">Online Course Facilities</h5>
							<p class="grey-color">Augue luctus egestas luctus neque purus an ipsum neque dolor primis libero tempus at blandit massa</p>
						</div>
					</div>
				</div>
				<!-- END SERVICE BOX #4 -->

				<!-- SERVICE BOX #5 -->
				<div class="col-md-6 col-lg-4">
					<div class="sbox-5">
						<img class="img-70" src="{{asset('landing-page/images/icons/reading.png')}}" alt="service-icon"> <!-- Icon -->
						<div class="sbox-5-txt">
							<h5 class="h5-md">Free Books & Library</h5>
							<p class="grey-color">Augue luctus egestas luctus neque purus an ipsum neque dolor primis libero tempus at blandit massa</p>
						</div>
					</div>
				</div>
				<!-- END SERVICE BOX #5 -->

				<!-- SERVICE BOX #6 -->
				<div class="col-md-6 col-lg-4">
					<div class="sbox-5">
						<img class="img-70" src="{{asset('landing-page/images/icons/bookshelf.png')}}" alt="service-icon">
						<div class="sbox-5-txt">
							<h5 class="h5-md">Free Study Materials</h5>
							<p class="grey-color">Augue luctus egestas luctus neque purus an ipsum neque dolor primis libero tempus at blandit massa</p>
						</div>
					</div>
				</div>
				<!-- END SERVICE BOX #6 -->
			</div>
			<!-- End row -->
		</div>
		<!-- End container -->
	</section>
	<!-- End SERVICES-5 -->
@endsection
@push('script')
<script type='text/javascript' src='http://www.youtube.com/iframe_api'></script>
<script type="text/javascript">
// https://youtu.be/ysNDDrG9PtI
	var player;
	// function onYouTubeIframeAPIReady(){
	// 	player = new YT.Player('playerId',{
	// 		videoId: 'ysNDDrG9PtI', // Video id
	// 		playerVars: {
	// 			'autoplay': 1,
	// 			'controls': 1,
	// 			'showinfo': 0,
	// 			'modestbranding': 0,
	// 			'loop': 1,
	// 			'fs': 0,
	// 			'cc_load_policty': 0,
	// 			'iv_load_policy': 3
	// 		},
	// 		events:{
	// 			onReady: function(event){
	// 				// event.target.mute();
	// 				event.target.setVolume(2);
	// 				event.target.playVideo();
	// 			},
	// 			onStateChange: function(e){
	// 				if(e.data === YT.PlayerState.ENDED){
	// 					e.target.playVideo();
	// 				}
	// 			}
	// 		}
	// 	})
	// }
</script>
@endpush