@extends('layouts.master')

@section('title', '')

@section('content')
    {{-- <div class="container" style="padding-top: 40px;">
        <div class="row justify-content-center align-items-center">
            // Make an shipment order
            <div class="col-md-10 border border-default rounded p-2 mb-2">
                <div class="row">
                    <div class="col-md-6 content border-right">
                        // <div class="col-12 mx-auto text-center" style="padding-left: 240px">
                        <div class="col-12 mx-auto text-center">
                          <img src="{{ Voyager::image( setting('site.logo') ) }}" style="width: 30%;">
                        </div>

                        <h1 class="text-center">{{ setting('site.title') }}</h1>

                        <p class="text-center">{{ setting('site.description') }}</p>
                    </div>
                    <div class="col-md-6 content my-auto">
                      <div class="card-title">
                        <div class="row justify-content-center align-items-center">
                          <div class="col-10 border-bottom">
                            <h4>Shipping Cost Calculator</h4>
                          </div>
                          <div class="col-2">
                            <div id="red-circle" class="circle-text float-right">
                              <div id="pricing-plan-price" class="pricing-plan-price inner-text center-align">
                                <sup><strong>$</strong></sup>0<span>.00</span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <form>
                        <div class="form-group">
                          <label for="classification">Parcel Type</label>
                          <select id="classification" class="form-control form-control-sm" name="classification">
                            <option value="0" selected>Choose...</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="weight">Weight (lbs)</label>
                          <input type="text" class="form-control form-control-sm" id="weight" placeholder="Enter weight">
                        </div>
                        <div class="form-group">
                          <label for="dimentions">Dimensions: Length x Width x Height (cm)</label>
                          <div class="form-row align-items-center">
                            <div class="col-sm-4 my-1">
                              <label class="sr-only" for="length">Length</label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <div class="input-group-text form-control-sm">L</div>
                                </div>
                                <input type="text" class="form-control form-control-sm" id="length" placeholder="Length">
                              </div>
                            </div>
                            <div class="col-sm-4 my-1">
                              <label class="sr-only" for="width">Width</label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <div class="input-group-text form-control-sm">W</div>
                                </div>
                                <input type="text" class="form-control form-control-sm" id="width" placeholder="Width">
                              </div>
                            </div>
                            <div class="col-sm-4 my-1">
                              <label class="sr-only" for="height">Height</label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <div class="input-group-text form-control-sm">H</div>
                                </div>
                                <input type="text" class="form-control form-control-sm" id="height" placeholder="Height">
                              </div>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                </div>
            </div>

            // Track Shipment
            <div class="col-md-10 border border-default rounded p-2 mt-2">
              <div class="border-bottom">
                <h4>Track Shipping</h4>
              </div>
              <form>
                <div class="form-group">
                  <label for="number"></label>
                  <input class="form-control form-control-sm" type="text" placeholder="Shipping No. Ej:(AWB-00-00000)">
                </div>
              </form>
            </div>
        </div>
    </div> --}}


    <section class="section-area">
        <div class="section-bg_mod-a section-title-block wow">
          <div class="container">
            <div class="row">
              <div class="col-xs-12">
                <h2 class="ui-title-block"><span class="ui-title-emphasis">international freight and</span>logistics services</h2>
                <div class="decor-1"><i class='icon flaticon-delivery36'></i></div>
              </div>
            </div>
          </div>
        </div>

        <div class="section-top-minus wow">
          <div class="container">
            <div class="row">
              <div class="col-xs-12">
                <div class="owl-carousel owl-theme enable-owl-carousel"
                    data-min480="1"
                    data-min768="2"
                    data-min992="3"
                    data-min1200="3"
                    data-pagination="false"
                    data-navigation="false"
                    data-auto-play="4000"
                    data-stop-on-hover="true">

                  <div class="block-services">
                    <h3 class="block-services__title ui-title-inner">Import Export Forwarding</h3>
                    <div class="block-services__description">Lorem ipsum dolor sit amet elit sed aiusmod tempor incididunt ut labore dolore magna aliqua sed ipsum ut enim ad minim veniam</div>
                    <div class="decor-3"></div>
                    <a class="block-services__link btn-link" href="blog-post.html">read more</a>
                  </div>

                  <div class="block-services">
                    <h3 class="block-services__title ui-title-inner">fastest delivery network</h3>
                    <div class="block-services__description">Lorem ipsum dolor sit amet elit sed aiusmod tempor incididunt ut labore dolore magna aliqua sed ipsum ut enim ad minim veniam</div>
                    <div class="decor-3"></div>
                    <a class="block-services__link btn-link" href="blog-post.html">read more</a>
                  </div>

                  <div class="block-services">
                    <h3 class="block-services__title ui-title-inner">solutions with technique</h3>
                    <div class="block-services__description">Lorem ipsum dolor sit amet elit sed aiusmod tempor incididunt ut labore dolore magna aliqua sed ipsum ut enim ad minim veniam</div>
                    <div class="decor-3"></div>
                    <a class="block-services__link btn-link" href="blog-post.html">read more</a>
                  </div>
                </div><!-- end slider -->
              </div>
            </div>
          </div><!-- end row -->
        </div><!-- end container -->
      </section><!-- end section-->


      <section class="section-default wow">
        <div class="container">
          <div class="row">
            <div class="col-xs-12">
              <h2 class="ui-title-block ui-title-block_mod-a">Our Business Mission <span class="decor-4 decor-4_mod-a"><i class="icon flaticon-logistics3 color-primary"></i></span> is Client’s Satisfaction</h2>

              <div class="owl-carousel owl-theme owl-theme_mod-b enable-owl-carousel"
                data-pagination="false"
                data-navigation="false"
                data-single-item="true"
                data-auto-play="7000"
                data-transition-style="fade"
                data-main-text-animation="true"
                data-after-init-delay="3000"
                data-after-move-delay="1000"
                data-stop-on-hover="true">

                <div class="reviews">
                  <div class="reviews__text">Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua enim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip exea commodo consequat duis aute dolor reprehenderit in voluptate</div>
                  <div class="reviews__author">
                    <span class="reviews__author-title">message by ceo</span>
                    <img class="reviews__signature img-responsive" src="{{ asset('storage/home-theme/reviews/signature.png') }}" alt="signature">
                  </div>
                </div>

                <div class="reviews">
                  <div class="reviews__text">Amet consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua enim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip exea commodo consequat duis aute dolor reprehenderit in voluptate</div>
                  <div class="reviews__author">
                    <span class="reviews__author-title">message by ceo</span>
                    <img class="reviews__signature img-responsive" src="{{ asset('storage/home-theme/reviews/signature.png') }}" alt="signature">
                  </div>
                </div>

              </div><!-- end slider -->
            </div><!-- end col -->
          </div><!-- end row -->
        </div><!-- end container -->
      </section><!-- end section-default -->


      {{-- <div class="container wow">
        <div class="row">
          <div class="col-xs-12">
            <div class="section-progress clearfix">
              <ul class="list-progress list-progress_mod-a list-progress_left list-unstyled">
                <li class="list-progress__item clearfix">
                  <div class="list-progress__inner">
                    <span class="list-progress__percent chart" data-percent="290"><span class="percent">290</span></span>
                    <span class="list-progress__name">Satisfied Clients</span>
                    <div class="decor-3"></div>
                  </div>
                </li>
                <li class="list-progress__item clearfix">
                  <div class="list-progress__inner">
                    <span class="list-progress__percent chart" data-percent="318"><span class="percent">318</span></span>
                    <span class="list-progress__name">Workers in Team</span>
                    <div class="decor-3"></div>
                  </div>
                </li>
                <li class="list-progress__item clearfix">
                  <div class="list-progress__inner">
                    <span class="list-progress__percent chart" data-percent="107"><span class="percent">107</span></span>
                    <span class="list-progress__name">Awards Won</span>
                    <div class="decor-3"></div>
                  </div>
                </li>
              </ul><!-- end list-progress -->

              <ul class="list-progress list-progress_mod-a list-progress_right list-unstyled">
                <li class="list-progress__item clearfix">
                  <div class="list-progress__inner">
                    <span class="list-progress__percent chart" data-percent="637"><span class="percent">637</span></span>
                    <span class="list-progress__name">Owned Vehicles</span>
                    <div class="decor-3"></div>
                  </div>
                </li>
                <li class="list-progress__item clearfix">
                  <div class="list-progress__inner">
                    <span class="list-progress__percent chart" data-percent="154"><span class="percent">154</span></span>
                    <span class="list-progress__name">Our Branches</span>
                    <div class="decor-3"></div>
                  </div>
                </li>
                <li class="list-progress__item clearfix">
                  <div class="list-progress__inner">
                    <span class="list-progress__percent chart" data-percent="2500"><span class="percent">2500</span></span>
                    <span class="list-progress__name">Items Delivered</span>
                    <div class="decor-3"></div>
                  </div>
                </li>
              </ul><!-- end list-progress -->

              <div class="progress-center">
                <img class="center-block img-responsive" src="{{ asset('storage/home-theme/bg/bg-1.jpg') }}" alt="background">
                <a class="progress-center__link prettyPhoto" href="https://www.youtube.com/watch?v=wh6lxMpffCo"><i class="icon fa fa-play"></i></a>
                <div class="progress-center__title ui-title-inner">watch the tour video</div>
              </div>
            </div><!-- end section-progress -->
          </div><!-- end col -->
        </div><!-- end row -->
      </div><!-- end container --> --}}


      <div class="slider-thumbnails wow">
        <div id="slider-product" class="flexslider slider-thumbnails-main">
          <ul class="slides">
            <li class="slider-thumbnails-main__item">
              <div class="slider-thumbnails-main__img">
                <img class="img-responsive" src="{{ asset('storage/home-theme/slider-thumbsnails/1.jpg') }}" alt="Foto">
              </div>
              <div class="slider-thumbnails-main__info">
                <i class="slider-thumbsnails-main__icon flaticon-ship3"></i>
                <div class="decor-2 decor-2_mod_white"></div>
                <div class="slider-thumbsnails-main__text">
                  <p>Tempor incididunt ut labore dolore magna aliqua sed ipsum en veniam dolor sit consectetur adipisicing elit sed ao eiusmod exercitation ullamco laboris nisi aliquip.</p>
                  <p>Mcaodo consequat duis aute irure dolor in reprehenderit voluptate velit sed esse cillum dolore.</p>
                </div>
              </div>
            </li>
            <li class="slider-thumbnails-main__item">
              <div class="slider-thumbnails-main__img">
                <img class="img-responsive" src="{{ asset('storage/home-theme/slider-thumbsnails/2.jpg') }}" alt="Foto">
              </div>
              <div class="slider-thumbnails-main__info">
                <i class="slider-thumbsnails-main__icon flaticon-transport325"></i>
                <div class="decor-2 decor-2_mod_white"></div>
                <div class="slider-thumbsnails-main__text">
                  <p>Tempor incididunt ut labore dolore magna aliqua sed ipsum en veniam dolor sit consectetur adipisicing elit sed ao eiusmod exercitation ullamco laboris nisi aliquip.</p>
                  <p>Mcaodo consequat duis aute irure dolor in reprehenderit voluptate velit sed esse cillum dolore.</p>
                </div>
              </div>
            </li>
            <li class="slider-thumbnails-main__item">
              <div class="slider-thumbnails-main__img">
                <img class="img-responsive" src="{{ asset('storage/home-theme/slider-thumbsnails/3.jpg') }}" alt="Foto">
              </div>
              <div class="slider-thumbnails-main__info">
                <i class="slider-thumbsnails-main__icon flaticon-airport7"></i>
                <div class="decor-2 decor-2_mod_white"></div>
                <div class="slider-thumbsnails-main__text">
                  <p>Tempor incididunt ut labore dolore magna aliqua sed ipsum en veniam dolor sit consectetur adipisicing elit sed ao eiusmod exercitation ullamco laboris nisi aliquip.</p>
                  <p>Mcaodo consequat duis aute irure dolor in reprehenderit voluptate velit sed esse cillum dolore.</p>
                </div>
              </div>
            </li>
            <li class="slider-thumbnails-main__item">
              <div class="slider-thumbnails-main__img">
                <img class="img-responsive" src="{{ asset('storage/home-theme/slider-thumbsnails/4.jpg') }}" alt="Foto">
              </div>
              <div class="slider-thumbnails-main__info">
                <i class="slider-thumbsnails-main__icon flaticon-metro3"></i>
                <div class="decor-2 decor-2_mod_white"></div>
                <div class="slider-thumbsnails-main__text">
                  <p>Tempor incididunt ut labore dolore magna aliqua sed ipsum en veniam dolor sit consectetur adipisicing elit sed ao eiusmod exercitation ullamco laboris nisi aliquip.</p>
                  <p>Mcaodo consequat duis aute irure dolor in reprehenderit voluptate velit sed esse cillum dolore.</p>
                </div>
              </div>
            </li>
            <li class="slider-thumbnails-main__item">
              <div class="slider-thumbnails-main__img">
                <img class="img-responsive" src="{{ asset('storage/home-theme/slider-thumbsnails/5.jpg') }}" alt="Foto">
              </div>
              <div class="slider-thumbnails-main__info">
                <i class="slider-thumbsnails-main__icon flaticon-package82"></i>
                <div class="decor-2 decor-2_mod_white"></div>
                <div class="slider-thumbsnails-main__text">
                  <p>Tempor incididunt ut labore dolore magna aliqua sed ipsum en veniam dolor sit consectetur adipisicing elit sed ao eiusmod exercitation ullamco laboris nisi aliquip.</p>
                  <p>Mcaodo consequat duis aute irure dolor in reprehenderit voluptate velit sed esse cillum dolore.</p>
                </div>
              </div>
            </li>
            <li class="slider-thumbnails-main__item">
              <div class="slider-thumbnails-main__img">
                <img class="img-responsive" src="{{ asset('storage/home-theme/slider-thumbsnails/6.jpg') }}" alt="Foto">
              </div>
              <div class="slider-thumbnails-main__info">
                <i class="slider-thumbsnails-main__icon flaticon-industrial2"></i>
                <div class="decor-2 decor-2_mod_white"></div>
                <div class="slider-thumbsnails-main__text">
                  <p>Tempor incididunt ut labore dolore magna aliqua sed ipsum en veniam dolor sit consectetur adipisicing elit sed ao eiusmod exercitation ullamco laboris nisi aliquip.</p>
                  <p>Mcaodo consequat duis aute irure dolor in reprehenderit voluptate velit sed esse cillum dolore.</p>
                </div>
              </div>
            </li>
          </ul>
        </div>

        <div id="carousel-product" class="flexslider slider-thumbnails-nav">
          <ul class="slides">
            <li class="slider-thumbnails-nav__item">
              <div class="slider-thumbnails-nav__text"><span class="decor-3 decor-3_mod-a"></span>sea freight</div>
              <span class="helper-2"></span>
            </li>
            <li class="slider-thumbnails-nav__item">
              <div class="slider-thumbnails-nav__text"><span class="decor-3 decor-3_mod-a"></span>road trasnsport</div>
              <span class="helper-2"></span>
            </li>
            <li class="slider-thumbnails-nav__item">
              <div class="slider-thumbnails-nav__text"><span class="decor-3 decor-3_mod-a"></span>air freight</div>
              <span class="helper-2"></span>
            </li>
            <li class="slider-thumbnails-nav__item">
              <div class="slider-thumbnails-nav__text"><span class="decor-3 decor-3_mod-a"></span>railway logistics</div>
              <span class="helper-2"></span>
            </li>
            <li class="slider-thumbnails-nav__item">
              <div class="slider-thumbnails-nav__text"><span class="decor-3 decor-3_mod-a"></span>packaging & storage</div>
              <span class="helper-2"></span>
            </li>
            <li class="slider-thumbnails-nav__item">
              <div class="slider-thumbnails-nav__text"><span class="decor-3 decor-3_mod-a"></span>warehousing</div>
              <span class="helper-2"></span>
            </li>
          </ul>
        </div>
      </div><!-- end slider-thumbnails -->


      <section class="section-default wow">
        <div class="container">
          <div class="row">
            <div class="col-xs-12">
              <h2 class="ui-title-block"><span class="ui-title-emphasis">why choose us</span>the main features</h2>
              <div class="decor-1"><i class='icon flaticon-delivery36'></i></div>
              <div class="ui-subtitle-block ui-subtitle-block_mod-a">Lorem ipsum dolor sit amet diial consectetur adipisicing elit sed eiusmod tempor incididunt ut labore et dolore magna cadso aliqua</div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-5 col-sm-7">
              <ul class="list-features list-features_mod-b list-unstyled">
                <li class="list-features__item">
                  <i class="list-features__icon flaticon-head39"></i>
                  <div class="list-features__inner">
                    <h3 class="list-features__title ui-title-inner">100% satisfied customers</h3>
                    <div class="list-features__description">Lorem ipsum dolor sit amet elit eiusmod tempor incididunt ut labore dolore magna aliqua</div>
                  </div>
                </li>
                <li class="list-features__item">
                  <i class="list-features__icon flaticon-delivery56"></i>
                  <div class="list-features__inner">
                    <h3 class="list-features__title ui-title-inner">quality service affordable price</h3>
                    <div class="list-features__description">Aorem ipsum dolor sit amet elit eiusmod tempor incididunt ut labore dolore magna aliqua</div>
                  </div>
                </li>
                <li class="list-features__item">
                  <i class="list-features__icon flaticon-world77"></i>
                  <div class="list-features__inner">
                    <h3 class="list-features__title ui-title-inner">worldwide locations</h3>
                    <div class="list-features__description">Dorem ipsum dolor sit amet elit eiusmod tempor incididunt ut labore dolore magna aliqua</div>
                  </div>
                </li>
                <li class="list-features__item">
                  <i class="list-features__icon flaticon-transport643"></i>
                  <div class="list-features__inner">
                    <h3 class="list-features__title ui-title-inner">modern vehicles fleet</h3>
                    <div class="list-features__description">Morem ipsum dolor sit amet elit eiusmod tempor incididunt ut labore dolore magna aliqua</div>
                  </div>
                </li>
              </ul>
            </div>
            <div class="col-md-7 col-sm-5">
              <img class="img-responsive" src="{{ asset('storage/home-theme/bg/bg-2.jpg') }}" alt="Foto">
            </div>
          </div>
        </div>
      </section><!-- end section -->


      <div class="section-bg_mod-b section_mod-a wow">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <section class="section-area">
                <h2 class="ui-title-block ui-title-block_w_bg ui-title-block_w_bg-first"><span class="ui-title-block__inner">request a quote</span></h2>

                <form class="form-request form-request_mod-a ui-form block_right_pad" action="#" method="post">
                  <div class="row">
                    <div class="col-xs-12">
                      <input class="form-control" type="text" placeholder="Full Name">
                    </div>
                    <div class="col-xs-12">
                      <input class="form-control" type="email" placeholder="Email address">
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <div class="select-control">
                        <select class="selectpicker">
                          <option>Destination From....</option>
                          <option>1</option>
                          <option>2</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="select-control">
                        <select class="selectpicker">
                          <option>Destinatin To....</option>
                          <option>1</option>
                          <option>2</option>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <div class="select-control">
                        <select class="selectpicker">
                          <option>Logistics Type</option>
                          <option>1</option>
                          <option>2</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <input class="form-control" type="email" placeholder="Subject">
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-xs-12">
                      <textarea class="form-control" rows="11" placeholder="message"></textarea>
                      <button class="ui-form__btn btn btn-sm btn_mod-a btn-effect"><span class="btn__inner">request quote</span></button>
                    </div>
                  </div>
                </form>
              </section>
              <div class="decor-4 decor-4_mod-b"><i class="icon flaticon-logistics3 color-primary"></i></div>
            </div>

            <div class="col-md-6">
              <section class="section-area">
                <h2 class="ui-title-block ui-title-block_w_bg ui-title-block_w_bg-last ui-title-block_w_bg-primary"><span class="ui-title-block__inner">general faq’s</span></h2>

                <div class="block_left_pad">
                  <div class="panel-group accordion" id="accordion-1">
                    <div class="panel">
                      <div class="panel-heading">
                        <a class="btn-collapse collapsed" data-toggle="collapse" data-parent="#accordion-1" href="#collapse-1"><i class="icon"></i><span class="helper-2"></span></a>
                        <h3 class="panel-title ui-title-inner">Lorem ipsum dolor sit amet consectetur</h3>
                        <div class="decor-2 decor-2_mod-b"></div>
                      </div>
                      <div id="collapse-1" class="panel-collapse collapse">
                        <div class="panel-body">
                          <p>Ncididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nos-trud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Due aute irure dolor in reprehenderit in voluptate velit esse cillum.</p>
                        </div>
                      </div>
                    </div><!-- end panel -->

                    <div class="panel">
                      <div class="panel-heading">
                        <a class="btn-collapse collapsed" data-toggle="collapse" data-parent="#accordion-1" href="#collapse-2"><i class="icon"></i><span class="helper-2"></span></a>
                        <h3 class="panel-title ui-title-inner">veniam quis nostrud exercitation ullamco</h3>
                        <div class="decor-2 decor-2_mod-b"></div>
                      </div>
                      <div id="collapse-2" class="panel-collapse collapse">
                        <div class="panel-body">
                          <p>Ncididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nos-trud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Due aute irure dolor in reprehenderit in oluptate velit esse cillum.</p>
                        </div>
                      </div>
                    </div><!-- end panel -->

                    <div class="panel">
                      <div class="panel-heading">
                        <a class="btn-collapse collapsed" data-toggle="collapse" data-parent="#accordion-1" href="#collapse-3"><i class="icon"></i><span class="helper-2"></span></a>
                        <h3 class="panel-title ui-title-inner">aute irure dolor in reprehenderit in</h3>
                        <div class="decor-2 decor-2_mod-b"></div>
                      </div>
                      <div id="collapse-3" class="panel-collapse collapse">
                        <div class="panel-body">
                          <p>Ncididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nos-trud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Due aute irure dolor in reprehenderit in voluptate velit esse cillum.</p>
                        </div>
                      </div>
                    </div><!-- end panel -->

                    <div class="panel">
                      <div class="panel-heading">
                        <a class="btn-collapse collapsed" data-toggle="collapse" data-parent="#accordion-1" href="#collapse-4"><i class="icon"></i><span class="helper-2"></span></a>
                        <h3 class="panel-title ui-title-inner">labore et dolore magna aliqua enim ad minim</h3>
                        <div class="decor-2 decor-2_mod-b"></div>
                      </div>
                      <div id="collapse-4" class="panel-collapse collapse">
                        <div class="panel-body">
                          <p>Ncididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nos-trud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Due aute irure dolor in reprehenderit in voluptate velit esse cillum.</p>
                        </div>
                      </div>
                    </div><!-- end panel -->
                  </div><!-- end accordion -->
                  <div class="note text-center">If you didn’t found the answer to your question here, Contact us <br>& our representative will reply you as soon as poossible, usually within 24 hours!</div>
                  <div class="decor-3 text-center"></div>
                  <div class="text-center"><a class="btn-link btn-link_lg" href="home.html">get in touch</a></div>

                </div>

              </section>
            </div>
          </div>
        </div>
      </div><!-- end section -->


      <div class="section-default parallax-bg parallax-dark wow">
        <ul class="bg-slideshow">
          <li>
            <div style="background-image:url({{ asset('storage/home-theme/bg/bg-4.jpg') }})" class="bg-slide"></div>
          </li>
        </ul>
        <div class="container">
          <div class="row">
            <div class="col-xs-12">
              <section class="section-reviews section__inner">
                <h2 class="ui-title-block ui-title-block_mod_color reviews-list__title">they trust us</h2>
                <div class="decor-2 decor-2_mod-b decor-2_mod_white"></div>
                <div class="owl-carousel owl-theme owl-theme_mod-a enable-owl-carousel"
                  data-pagination="true"
                  data-navigation="false"
                  data-single-item="true"
                  data-auto-play="700000"
                  data-transition-style="fade"
                  data-main-text-animation="true"
                  data-after-init-delay="3000"
                  data-after-move-delay="1000"
                  data-stop-on-hover="true">
                  <div class="reviews-list">
                    <div class="reviews-list__img"><img class="img-responsive" src="{{ asset('storage/home-theme/reviews/member-1.jpg') }}" alt="foto"></div>
                    <div class="reviews-list__inner">
                      <blockquote class="reviews-list__blockquote">
                        <header>
                          <cite>
                            <span class="reviews-list__autor">john matt</span>
                            <span class="reviews-list__company">CEO Trans globOl LTD.</span>
                          </cite>
                        </header>
                        <p>“ Lorem ipsum dolor sit amet consectetur adipisicing elit sed eiusmod tempor  incididunt ut labore etu dolore magna aliqua enim veniam quis nostrud exercitate ullamco laboris nisi aliquip exea commodo consequat duis aute dolor reprehenderit in lorem ipsum dolor sit ametas consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.”</p>
                      </blockquote>
                    </div>
                  </div><!-- end slider -->

                  <div class="reviews-list">
                    <div class="reviews-list__img"><img class="img-responsive" src="{{ asset('storage/home-theme/reviews/member-1.jpg') }}" alt="foto"></div>
                    <div class="reviews-list__inner">
                      <blockquote class="reviews-list__blockquote">
                        <header>
                          <cite>
                            <span class="reviews-list__autor">john matt</span>
                            <span class="reviews-list__company">CEO Trans globOl LTD.</span>
                          </cite>
                        </header>
                        <p>“ Lorem ipsum dolor sit amet consectetur adipisicing elit sed eiusmod tempor  incididunt ut labore etu dolore magna aliqua enim veniam quis nostrud exercitate ullamco laboris nisi aliquip exea commodo consequat duis aute dolor reprehenderit in lorem ipsum dolor sit ametas consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.”</p>
                      </blockquote>
                    </div>
                  </div><!-- end slider -->
                </div>
              </section>
            </div>
          </div>
        </div>
      </div><!-- end section -->


      <section class="section-area wow">
        <div class="section-bg_mod-a section-title-block">
          <div class="container">
            <div class="row">
              <div class="col-xs-12">
                <h2 class="ui-title-block"><span class="ui-title-emphasis">latest from the blog</span>company news</h2>
                <div class="decor-1"><i class='icon flaticon-delivery36'></i></div>
              </div>
            </div>
          </div>
        </div>

        <div class="section-top-minus section_mod-a">
          <div class="container">
            <div class="row">
              <div class="col-sm-4">
                <article class="post post_mod-a clearfix">
                  <div class="entry-media">
                    <img class="img-responsive" src="{{ asset('storage/home-theme/posts/360x272/1.jpg') }}" alt="Foto">
                    <div class="entry-date"><a href="blog-post.html"><span class="entry-date__inner">10 feb</span><i class="icon fa fa-video-camera"></i></a></div>
                  </div>
                  <div class="entry-meta">
                    <span class="entry-meta__item">In: <a class="entry-meta__link" href="blog-post.html">Trucking, Delivery</a></span>
                    <span class="entry-meta__item"><i class="icon fa fa-comment"></i>34</span>
                  </div>

                  <div class="entry-main">
                    <div class="entry-header">
                      <h2 class="entry-title ui-title-inner">Lorem ipsum dolor sit consectetur</h2>
                    </div>
                    <div class="entry-content">
                      <p>Lorem ipsum dolor sit amet consectetur dipisicing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam quis nostrud ...</p>
                    </div>
                    <div class="entry-footer">
                      <div class="decor-3"></div>
                      <a class="btn-link" href="blog-post.html">read more</a>
                    </div>
                  </div>
                </article>
              </div>

              <div class="col-sm-4">
                <article class="post post_mod-a clearfix">
                  <div class="entry-media">
                    <img class="img-responsive" src="{{ asset('storage/home-theme/posts/360x272/2.jpg') }}" alt="Foto">
                    <div class="entry-date"><a href="blog-post.html"><span class="entry-date__inner">10 feb</span><i class="icon fa fa-picture-o"></i></a></div>
                  </div>
                  <div class="entry-meta">
                    <span class="entry-meta__item">In: <a class="entry-meta__link" href="blog-post.html">cargo, warehouse</a></span>
                    <span class="entry-meta__item"><i class="icon fa fa-comment"></i>34</span>
                  </div>

                  <div class="entry-main">
                    <div class="entry-header">
                      <h2 class="entry-title ui-title-inner">incididunt ut labore et dolore magna</h2>
                    </div>
                    <div class="entry-content">
                      <p>Commodo consequat. Duis aute irure dolor in reprehen derit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat ...</p>
                    </div>
                    <div class="entry-footer">
                      <div class="decor-3"></div>
                      <a class="btn-link" href="blog-post.html">read more</a>
                    </div>
                  </div>
                </article>
              </div>

              <div class="col-sm-4">
                <article class="post post_mod-a clearfix">
                  <div class="entry-media">
                    <img class="img-responsive" src="{{ asset('storage/home-theme/posts/360x272/3.jpg') }}" alt="Foto">
                    <div class="entry-date"><a href="blog-post.html"><span class="entry-date__inner">10 feb</span><i class="icon fa fa-pencil"></i></a></div>
                  </div>
                  <div class="entry-meta">
                    <span class="entry-meta__item">In: <a class="entry-meta__link" href="blog-post.html">sea freight, air freight</a></span>
                    <span class="entry-meta__item"><i class="icon fa fa-comment"></i>34</span>
                  </div>

                  <div class="entry-main">
                    <div class="entry-header">
                      <h2 class="entry-title ui-title-inner">nostrud exercitation ullamco laboris</h2>
                    </div>
                    <div class="entry-content">
                      <p>Lorem ipsum dolor sit amet consectetur dipisicing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam quis nostrud ...</p>
                    </div>
                    <div class="entry-footer">
                      <div class="decor-3"></div>
                      <a class="btn-link" href="blog-post.html">read more</a>
                    </div>
                  </div>
                </article>
              </div>
            </div>
          </div>
        </div>
      </section><!-- end section -->


      <div class="section-clients section-bg_mod-a wow">
        <div class="container">
          <div class="row">
            <div class="col-xs-12">

              <div class="carusel-clients slider_mod-a owl-carousel owl-theme enable-owl-carousel"
                data-min480="1"
                data-min768="4"
                data-min992="4"
                data-min1200="4"
                data-pagination="false"
                data-navigation="false"
                data-auto-play="4000"
                data-stop-on-hover="true">

                <a class="carusel-clients__item" href="home.html">
                  <img class="carusel-clients__img" src="{{ asset('storage/home-theme/clients/1.png') }}" alt="logo">
                  <span class="helper-2"></span>
                </a>
                <a class="carusel-clients__item" href="home.html">
                  <img class="carusel-clients__img" src="{{ asset('storage/home-theme/clients/2.png') }}" alt="logo">
                  <span class="helper-2"></span>
                </a>
                <a class="carusel-clients__item" href="home.html">
                  <img class="carusel-clients__img" src="{{ asset('storage/home-theme/clients/3.png') }}" alt="logo">
                  <span class="helper-2"></span>
                </a>
                <a class="carusel-clients__item" href="home.html">
                  <img class="carusel-clients__img" src="{{ asset('storage/home-theme/clients/4.png') }}" alt="logo">
                  <span class="helper-2"></span>
                </a>

              </div><!-- end  -->
            </div><!-- end col -->
          </div><!-- end row -->
        </div><!-- end container -->
      </div><!-- end section-clients -->





@endsection