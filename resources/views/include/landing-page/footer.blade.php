
{{-- <section id="courses-5" class="courses-section division" style="padding: 75px 0"> --}}
<section class="courses-section division padding-section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				{{-- <div class="section-title title-centered mb-60"> --}}
				<div class="section-title" style="padding: 0 35% 0 0;">
					<a href="javascript:void(0)" class="color-a fw7">Hubungi Kami</a>
					<h3 class="h3-sm">Ada pertanyaan? Hubungi kami dengan bebas dan kami akan segera merespon Anda</h3>
				</div>
			</div>
			<div class="col-md-12">
				<a class="image-container" href="{{$identity->fb}}" target="_blank">
					<img src="{{asset('landing-page/images/sosmed/facebook.png')}}" alt="Facebook Profile" width="50">
				</a>
				<a class="image-container" href="{{$identity->instagram}}" target="_blank">
					<img src="{{asset('landing-page/images/sosmed/instagram.png')}}" alt="Instagram Profile" width="50">
				</a>
				<a class="image-container" href="{{$identity->twitter}}" target="_blank">
					<img src="{{asset('landing-page/images/sosmed/twitter.png')}}" alt="Twitter Profile" width="50">
				</a>
				<a class="image-container" href="{{$identity->youtube}}" target="_blank">
					<img src="{{asset('landing-page/images/sosmed/youtube.png')}}" alt="Youtube Profile" width="50">
				</a>
				<a class="image-container" href="{{$identity->gplus}}" target="_blank">
					<img src="{{asset('landing-page/images/sosmed/google.png')}}" alt="Google+ Profile" width="50">
				</a>
				{{-- <a class="image-container" href="{{$identity->fb}}" target="_blank">
					<img src="{{asset('landing-page/images/sosmed/tiktok.png')}}" alt="Tiktok Profile" width="50">
				</a> --}}
			</div>
		</div>
	</div>
</section>
{{-- <footer id="footer-2" class="footer division"> --}}
<footer id="footer-2" class="division">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				{{-- <section id="contacts-2" class="wide-100 contacts-section division"> --}}
				<section id="contacts-2" class="contacts-section division">
					{{-- <div class="container"> --}}
						<div class="contacts-2-holder mb-20">
							<div class="row d-flex align-items-center">
								<div class="col-lg-12">
									{{-- <div class="contact-box b-right"> --}}
									<div class="contact-box">
										<div class="row">
											<div class="col-md-4 mtb-auto">
												<img class="img-40" src="{{asset('landing-page/images/icons/location.png')}}" alt="contacts-icon">
												<br>
												<span class="fw8" style="font-size: 20px;">Alamat</span>
											</div>
											<div class="col-md-8 mtb-auto text-left">
												<span class="fw5">Sekolah:</span><br>
												<span class="fw4 f-color">Jalan Raya Kepuhanyar No. 24 Mojoanyar Mojokerto</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="contacts-2-holder mb-20">
							<div class="row d-flex align-items-center">
								<div class="col-lg-12">
									<div class="contact-box">
										<div class="row">
											<div class="col-md-4 mtb-auto">
												<img class="img-40" src="{{asset('landing-page/images/icons/phone.png')}}" alt="contacts-icon"><br>
												<span class="fw8" style="font-size: 20px;">Telepon</span>
											</div>
											<div class="col-md-8 mtb-auto f-color text-left">
												<span class="fw4">Mobile: 03215885002</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="contacts-2-holder">
							<div class="row d-flex align-items-center">
								<div class="col-lg-12">
									<div class="contact-box">
										<div class="row">
											<div class="col-md-4 mtb-auto">
												<img class="img-40" src="{{asset('landing-page/images/icons/mail.png')}}" alt="contacts-icon"><br>
												<span class="fw8" style="font-size: 20px;">Email</span>
											</div>
											<div class="col-md-8 mtb-auto f-color text-left">
												<span class="fw4">mtsalmutazam@gmail.com</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					{{-- </div> --}}
				</section>
			</div>
			<div class="col-md-8">
				<div id="gmap" class="map-section division">
					<div class="container">
						<div class="row">	
							<div class="col-md-12">
								<div class="google-map">
									<!-- Embedded Google Map using an iframe - to select your location find it on Google maps and paste the link as the iframe src. If you want to use the Google Maps API instead then have at it! -->					
									{{-- <iframe src="https://www.google.com/maps?q=mts%20al%20mutazam&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed"></iframe> --}}
									{!! $identity->lokasi !!}
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="bottom-footer">
		<div class="row">
			<div class="col-md-12 text-center">
				<p><b>- Berilmu yang berguna bagi agama, bangsa dan negara serta bermanfaat bagi masyarakat -</b></p>
				<p>© 2022 | Mts Al-Multazam - Mojokerto</p>
			</div>
		</div>
	</div>
</footer>