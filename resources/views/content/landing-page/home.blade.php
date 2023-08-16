@extends('layout.landing-page.main')
@section('content')
	<!-- HERO-1 ============================================= -->
	<section id="hero-1" class="hero-section division">
		<!-- SLIDER -->
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
		<!-- END SLIDER -->
	</section>
	<!-- END HERO-1 -->	

	<!-- ABOUT-1 ============================================= -->
	<section id="about-1" class="bg-05 about-section division">
		<div class="container white-color">
			<div class="row d-flex align-items-center">
				<!-- ABOUT BOX #1 -->		
				<div class="col-md-4">
					<div class="abox-1 icon-xs">
						<span class="flaticon-004-computer"></span>
						<div class="abox-1-txt">
							<h5 class="h5-md">2,769 online courses</h5>
							<p class="p-md">Explore a variety of fresh topics</p>
						</div>
					</div>
				</div>
				<!-- END ABOUT BOX #1 -->

				<!-- ABOUT BOX #2 -->
				<div class="col-md-4">
					<div class="abox-1 icon-xs">
						<span class="flaticon-028-learning-1"></span>
						<div class="abox-1-txt">
							<h5 class="h5-md">Expert instruction</h5>
							<p class="p-md">Find the right instructor for you</p>
						</div>
					</div>
				</div>
				<!-- END ABOUT BOX #2 -->

				<!-- ABOUT BOX #3 -->
				<div class="col-md-4">
					<div class="abox-1 icon-xs">
						<span class="flaticon-032-tablet"></span>
						<div class="abox-1-txt">
							<h5 class="h5-md">Lifetime access</h5>
							<p class="p-md">Learn on your schedule</p>
						</div>
					</div>
				</div>
				<!-- END ABOUT BOX #3 -->
			</div>
			<!-- End row -->
		</div>
		<!-- End container -->
	</section>
	<!-- End ABOUT-1 -->

	<!-- ABOUT-2 ============================================= -->
	<section id="about-2" class="wide-60 about-section division">
		<div class="container">
			<div class="row d-flex align-items-center">
				<!-- ABOUT IMAGE -->
				<div class="col-md-5 col-lg-6">
					<div class="img-block pc-25 mb-40">
						<img class="img-fluid" src="{{asset('landing-page/images/image-01.png')}}" alt="about-image">
						</div>
				</div>

				<!-- ABOUT TEXT -->
					<div class="col-md-7 col-lg-6">
						<div class="txt-block pc-25 mb-40">
						<h3 class="h3-sm">Transform your life through online education</h3>
						<p>
							An enim nullam tempor sapien gravida donec porta and blandit ipsum enim justo integer velna vitae 
							auctor integer congue magna and purus pretium risus ligula rutrum luctus ultrice 
						</p>
						<ul class="txt-list mb-15">
							<li>Nullam rutrum eget nunc varius etiam mollis risus undo</li>
							<li>Integer congue magna at pretium purus pretium ligula at rutrum risus luctus dolor auctor 
								ipsum blandit purus		
							</li>
							<li>Risus at congue etiam aliquam sapien egestas posuere</li>
							<li>At pretium purus integer congue magna pretium ligula at ipsum blandit purus	rutrum risus 
								luctus dolor auctor 	
							</li>
						</ul>
						</div>
					</div>
				<!-- END ABOUT TEXT -->
			</div>
			<!-- End row -->
		</div>
	</section>
	<!-- End ABOUT-2 -->

	<!-- COURSES-3 ============================================= -->
	<section id="courses-3" class="bg-lightgrey wide-60 courses-section division">
		<div class="container">
			<!-- SECTION TITLE -->
			<div class="row">	
				<div class="col-md-12">
					<div class="section-title mb-60">
						<h3 class="h3-sm">Most Popular Courses</h3>
						<p class="p-md">Aliquam a augue suscipit, luctus neque purus ipsum neque dolor primis libero tempus, blandit posuere and ligula varius magna a porta</p>
						<div class="title-btn"><a href="javascript:void(0)" class="btn btn-tra-grey rose-hover">View All Courses</a></div>
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
	</section>
	<!-- END COURSES-3 -->

	<!-- ABOUT-3 ============================================= -->
	<section id="about-3" class="pt-100 about-section division">
		<div class="container">
			<div class="row d-flex align-items-center">
				<!-- ABOUT TEXT -->
					<div class="col-md-7 col-lg-6">
						<div class="txt-block pc-25">
						<h3 class="h3-sm">Learn new personal & professional skills online</h3>
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
				<!-- END ABOUT TEXT -->

				<div class="col-md-5 col-lg-6">
					<div class="img-block">
						<img class="img-fluid" src="{{asset('landing-page/images/image-02.png')}}" alt="about-image">
						</div>
				</div>
			</div>
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