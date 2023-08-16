<header id="header" class="header white-menu navbar-dark">
	<div class="header-wrapper">
		<!-- MOBILE HEADER -->
		<div class="wsmobileheader clearfix">	
			<a id="wsnavtoggle" class="wsanimated-arrow"><span></span></a>
			<span class="smllogo smllogo-black"><img src="{{asset('landing-page/images/logo.png')}}" width="172" height="40" alt="mobile-logo"></span>
			<span class="smllogo smllogo-white"><img src="{{asset('landing-page/images/logo-white.png')}}" width="172" height="40" alt="mobile-logo"></span>
		</div>

		<!-- NAVIGATION MENU -->
		<div class="wsmainfull menu clearfix">
			<div class="wsmainwp clearfix">
				<!-- LOGO IMAGE -->
				<!-- For Retina Ready displays take a image with double the amount of pixels that your image will be displayed (e.g 344 x 80 pixels) -->
				<div class="desktoplogo"><a href="#hero-1" class="logo-black"><img src="{{asset('landing-page/images/logo.png')}}" width="172" height="40" alt="header-logo"></a></div>
				<div class="desktoplogo"><a href="#hero-1" class="logo-white"><img src="{{asset('landing-page/images/logo-white.png')}}" width="172" height="40" alt="header-logo"></a></div>

				<!-- MAIN MENU -->
				<nav class="wsmenu clearfix">
					<ul class="wsmenu-list">
						<!-- SIMPLE NAVIGATION LINK -->
						<li class="nl-simple" aria-haspopup="true"><a href="javascript:void(0)">HOME</a></li>
						<li class="nl-simple" aria-haspopup="true"><a href="javascript:void(0)">AMTV</a></li>
						<li aria-haspopup="true"><a href="javascript:void(0)">PROFIL<span class="wsarrow"></span></a>
							<ul class="sub-menu">
								<li aria-haspopup="true"><a href="javascript:void(0)">Sejarah</a></li>
								<li aria-haspopup="true"><a href="javascript:void(0)">Visi Misi</a></li>
								<li aria-haspopup="true"><a href="javascript:void(0)">Sambutan Kepala Sekolah</a></li>
								<li aria-haspopup="true"><a href="javascript:void(0)">Struktur Organisasi</a></li>
								<li aria-haspopup="true"><a href="javascript:void(0)">Profil Struktural</a></li>
								<li aria-haspopup="true"><a href="javascript:void(0)">Fasilitas Sekolah</a></li>
							</ul>
						</li>
						<li aria-haspopup="true"><a href="javascript:void(0)">SIM<span class="wsarrow"></span></a>
							<ul class="sub-menu">
								<li aria-haspopup="true"><a href="javascript:void(0)">Link Eksternal</a></li>
							</ul>
						</li>
						<li aria-haspopup="true"><a href="javascript:void(0)">PROGRAM<span class="wsarrow"></span></a>
							<ul class="sub-menu">
								<li aria-haspopup="true"><a href="javascript:void(0)">Ekstrakulikuler</a></li>
								<li aria-haspopup="true"><a href="javascript:void(0)">UKS</a></li>
								<li aria-haspopup="true"><a href="javascript:void(0)">Prestasi Siswa</a></li>
								<li aria-haspopup="true"><a href="javascript:void(0)">Program Unggulan</a></li>
							</ul>
						</li>
						<li class="nl-simple" aria-haspopup="true"><a href="javascript:void(0)">GALERI</a></li>
						<li aria-haspopup="true"><a href="javascript:void(0)">APLIKASI<span class="wsarrow"></span></a>
							<ul class="sub-menu">
								<li aria-haspopup="true"><a href="javascript:void(0)">RDM</a></li>
								<li aria-haspopup="true"><a href="javascript:void(0)">E-Learning</a></li>
							</ul>
						</li>

						<!-- DROPDOWN MENU -->
						{{-- <li aria-haspopup="true">
							<a href="javascript:void(0)">PROFIL<span class="wsarrow"></span></a>
							<div class="wsmegamenu clearfix halfmenu">
								<div class="container-fluid">
									<div class="row">
										<ul class="col-lg-6 col-md-12 col-xs-12 link-list left-link-list">
											<li><a href="about.html">AMTV</a></li>
											<li><a href="categories-list.html">Categories Listing</a></li>
											<li><a href="category-details.html">Category Details</a></li>
											<li><a href="javascript:void(0)">Courses Listing</a></li>
											<li><a href="course-details.html">Course Details</a></li>
											<li><a href="teachers-list.html">Teachers Listing</a></li>
											<li><a href="teacher-profile.html">Teacher Profile</a></li>
										</ul>
										<ul class="col-lg-6 col-md-12 col-xs-12 link-list">
											<li><a href="become-a-teacher.html">Become A Teacher</a></li>
											<li><a href="pricing.html">Pricing Plans Page</a></li>
											<li><a href="reviews.html">Reviews Page</a></li>
											<li><a href="faqs.html">FAQs Page</a></li>
											<li><a href="blog-listing.html">Blog Listing</a></li>
											<li><a href="single-post.html">Single Post</a></li>
											<li><a href="contacts.html">Contacts Page</a></li>
										</ul>
									</div>
								</div>
							</div>
						</li> --}}
						<!-- END DROPDOWN MENU -->

						{{-- <li aria-haspopup="true"><a href="javascript:void(0)">Mega Menu <span class="wsarrow"></span></a>
							<div class="wsmegamenu clearfix">
								<div class="container">
									<div class="row">
										<!-- MEGAMENU QUICK LINKS -->
										<div class="col-md-12 col-lg-3">
											<h3 class="title">Top 5 Online Courses:</h3> <!-- Title -->
											<ul class="link-list clearfix">
												<li><a href="course-details.html">English for Tourism</a></li>
												<li><a href="course-details.html">Python Programming - Working with Lists and Files</a></li>
												<li><a href="course-details.html">Computer Networking - Wired and Wireless Networks</a></li>
												<li><a href="course-details.html">Digital Marketing: The Ultimate Guide to Strategic</a></li>
												<li><a href="course-details.html">The Complete iOS 10 & Swift 3 Developer Course</a></li>	
											</ul>
										</div>
										<!-- END MEGAMENU QUICK LINKS -->

										<!-- MEGAMENU FEATURED NEWS -->
										<div class="col-md-12 col-lg-5">
											<h3 class="title">Featured News:</h3> <!-- Title -->
											<div class="fluid-width-video-wrapper mb-15"><img src="{{asset('landing-page/images/blog/featured-news.jpg')}}" alt="featured-news"></div> <!-- Image -->
											<!-- Text -->
											<h5 class="h5-md">
												<a href="single-post.html">Study smart and save time with these 5 tips</a>
											</h5>
											<p class="wsmwnutxt">
												Porta semper lacus cursus, feugiat primis ultrice in ligula risus auctor tempus feugiat dolor impedit magna...
											</p>
										</div>
										<!-- END MEGAMENU FEATURED NEWS -->

										<!-- MEGAMENU LATEST NEWS -->
										<div class="col-md-12 col-lg-4">
											<h3 class="title">Latest News:</h3>
											<ul class="latest-news">
												<!-- Post #1 -->
												<li class="clearfix d-flex align-items-center">
													<img class="img-fluid" src="{{asset('landing-page/images/blog/latest-post-1.jpg')}}" alt="blog-post-preview">
													<div class="post-summary">
														<a href="single-post.html">Etiam sapien risus ante auctor tempus an accumsan...</a>
														<p>18 hours ago</p>
													</div>
												</li>

												<!-- Post #2 -->
												<li class="clearfix d-flex align-items-center">
													<img class="img-fluid" src="{{asset('landing-page/images/blog/latest-post-2.jpg')}}" alt="blog-post-preview">
													<div class="post-summary">
														<a href="single-post.html">Blandit tempor sapien ipsum, porta risus auctor justo...</a>
														<p>Feb 17, 2020</p>
													</div>
												</li>

												<!-- Post #3 -->
												<li class="clearfix d-flex align-items-center">
													<img class="img-fluid" src="{{asset('landing-page/images/blog/latest-post-3.jpg')}}" alt="blog-post-preview">
													<div class="post-summary">
														<a href="single-post.html">Cursus risus an auctor risus laoreet undo auctor varius...</a>
														<p>Feb 07, 2020</p>
													</div>
												</li>
											</ul>
										</div>
										<!-- END MEGAMENU LATEST NEWS -->
									</div>
								</div>
							</div>
						</li> --}}
						{{-- <li aria-haspopup="true">
							<a href="javascript:void(0)" class="lang-select">
								<img src="{{asset('landing-page/images/icons/flags/uk.png')}}" alt="flag-icon"> En <span class="wsarrow"></span>
							</a>
							<ul class="sub-menu last-sub-menu">
								<li aria-haspopup="true"><a href="javascript:void(0)"><img src="{{asset('landing-page/images/icons/flags/germany.png')}}" alt="flag-icon"> Deutch</a></li>
								<li aria-haspopup="true"><a href="javascript:void(0)"><img src="{{asset('landing-page/images/icons/flags/spain.png')}}" alt="flag-icon"> Español</a></li>
								<li aria-haspopup="true"><a href="javascript:void(0)"><img src="{{asset('landing-page/images/icons/flags/france.png')}}" alt="flag-icon"> Français</a></li>
								<li aria-haspopup="true"><a href="javascript:void(0)"><img src="{{asset('landing-page/images/icons/flags/italy.png')}}" alt="flag-icon"> Italiano</a></li>
								<li aria-haspopup="true"><a href="javascript:void(0)"><img src="{{asset('landing-page/images/icons/flags/russia.png')}}" alt="flag-icon"> Русский</a></li>
								<li aria-haspopup="true"><a href="javascript:void(0)"><img src="{{asset('landing-page/images/icons/flags/china.png')}}" alt="flag-icon"> 简体中文</a></li>
							</ul>
						</li> --}}

						{{-- <!--HEADER BUTTON  -->
						<li class="nl-simple" aria-haspopup="true">
							<a href="javascript:void(0)" class="btn btn-rose tra-black-hover last-link">Get Started</a>
						</li> --}}
					</ul>
				</nav>
				<!-- END MAIN MENU -->
			</div>
		</div>
		<!-- END NAVIGATION MENU -->
	</div>
</header>