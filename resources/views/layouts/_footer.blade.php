<div style="background-image:url({{ asset('storage/home-theme/bg/bg-5.jpg') }})" class="section-default section-bg_mod-c wow noprint">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="block-contacts">
					<div class="block-contacts__title-1">call us now on</div>
					<div class="block-contacts__title-2"><i class="icon flaticon-telephone114"></i><span class="color-primary">{{ setting('site.phone') }}</span></div>
					<div class="block-contacts__title-3">{{ setting('site.slogan') }}</div>
				</div>
			</div><!-- end col -->
		</div><!-- end row -->
	</div><!-- end container -->
</div><!-- end section-default -->


<div class="section-area parallax-bg parallax-dark wow noprint">
	<ul class="bg-slideshow">
		<li>
			<div style="background-image:url({{ asset('storage/home-theme/bg/bg-footer.jpg') }})" class="bg-slide"></div>
		</li>
	</ul>
	<div class="section__inner">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">

					<div class="section-subscribe clearfix">
						<div class="subscribe__inner">
							<h2 class="subscribe__title">register for newsletter</h2>
							<div class="subscribe__info">get latest company news</div>
						</div>
						<form class="form-subscribe" method="post">
							<input class="form-subscribe__input form-control" type="text" placeholder="enter your email address" required>
							<button class="form-subscribe__btn btn btn_mod-c btn-sm btn-effect"><span class="btn__inner">Subscribe</span></button>
						</form>
						<div class="subscribe__decor decor-4"><i class="subscribe__icon icon flaticon-envelope53"></i></div>
					</div><!-- end subscribe -->


					<footer class="footer" id="footer">
						<div class="footer-main">
							<div class="section__inner">
								<div class="row">
									<div class="col-lg-5 col-md-3">
										<div class="footer__section">

											<div class="col-md-12">
												<div class="col-md-2">
													<a class="" href="#"><img class="logo__img" src="{{ Voyager::image( setting('site.logo') ) }}" alt="Logo" height="40px"></a>
												</div>
												<div class="col-md-9">
													<h4>{{ setting('site.title') }}</h4>
												</div>
											</div>

											<div class="footer__info">
												{!! setting('site.summery') !!}
											</div>
											<ul class="social-links social-links_mod-a list-inline">
												<li><a target="_blank" href="{{ setting('social-link.twitter') }}"><i class="icons fa fa-twitter"></i></a></li>
												<li><a target="_blank" href="{{ setting('social-link.facebook') }}"><i class="icons fa fa-facebook"></i></a></li>
												<li><a target="_blank" href="{{ setting('social-link.linkedin') }}"><i class="icons fa fa-linkedin"></i></a></li>
												<li><a target="_blank" href="{{ setting('social-link.google') }}"><i class="icons fa fa-google"></i></a></li>
												<li><a target="_blank" href="{{ setting('social-link.vimeo') }}"><i class="icons fa fa-vimeo"></i></a></li>
												<li><a target="_blank" href="{{ setting('social-link.instagram') }}"><i class="icons fa fa-instagram"></i></a></li>
											</ul>
										</div>
									</div><!-- end col -->

									<div class="col-lg-2 col-md-3">
										<section class="footer__section">
											<h3 class="footer__title">services offered</h3>
											<div class="decor-2 decor-2_mod-b decor-2_mod_white"></div>
											{!! setting('site.services-offered') !!}
										</section>
									</div><!-- end col -->

									<div class="col-lg-2 col-md-3">
										<section class="footer__section">
											<h3 class="footer__title">Quick links</h3>
											<div class="decor-2 decor-2_mod-b decor-2_mod_white"></div>
											<ul class="footer-list list-unstyled">
												<li class="footer-list__item">
													<a class="footer-list__link" href="/home">Home Page</a>
												</li>
												<li class="footer-list__item">
													<a class="footer-list__link" href="/quote">Request a Free Quote</a>
												</li>
												<li class="footer-list__item">
													<a class="footer-list__link" href="/about">About the Company</a>
												</li>
												<li class="footer-list__item">
													<a class="footer-list__link" href="{{ route('trace.index') }}">Track Item(s)</a>
												</li>
												<li class="footer-list__item">
													<a class="footer-list__link" href="{{ route('comments') }}">Comments</a>
												</li>
											</ul>
										</section>
									</div><!-- end col -->

									<div class="col-md-3">
										<section class="footer__section">
											<h3 class="footer__title">Contact details</h3>
											<div class="decor-2 decor-2_mod-b decor-2_mod_white"></div>
											<div class="footer-contact">
												<div class="footer-contact__inner">
													<div class="footer-contact__title">{{ setting('site.slogan') }}</div>
													<div class="footer-contact__info">{{ setting('site.address') }}</div>
													<div class="footer-contact__info">Phone: {{ setting('site.phone') }}</div>
													<div class="footer-contact__info">Email: <a href="mailto:{{ setting('site.email') }}">{{ setting('site.email') }}</a></div>
													<select class="footer-contact__select selectpicker">
														<option>Select a branch</option>
														<option>{{ setting('site.branch') }}</option>
														<option>2</option>
													</select>
													<div class="footer-contact__note">You can also view our other branches address information by selecting branch above.</div>
												</div>
											</div><!-- end footer-contact -->
										</section>
									</div><!-- end col -->
								</div><!-- end row -->
							</div><!-- end section__inner -->
						</div><!-- end footer-main -->


						<div class="copyright clearfix">
							<div class="copyright__inner">© 2019 <a class="copyright__link" href="templines.com">{{ setting('site.title') }}</a> All rights reserved.</div>
							<ul class="copyright-list list-inline">
								<li class="copyright-list__item">
									<a class="copyright-list__link" href="#">Terms of Use</a>
								</li>
								<li class="copyright-list__item">
									<a class="copyright-list__link" href="#">Privacy Policy</a>
								</li>
							</ul>
						</div><!-- end copyright -->
					</footer><!-- end footer -->

				</div><!-- end col -->
			</div><!-- end row -->
		</div><!-- end container -->
	</div><!-- end section__inner -->
</div><!-- end section-area -->