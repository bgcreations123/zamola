@extends('layouts.master')

@section('title', '')

@section('content')

    <section class="section-area" id="home">

      @include('layouts._messages')

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
                  <div class="reviews__text">Zamola Entreprize Ltd is dedicated to developing customer, industry oriented supply chain solution by keeping its freight forwarding and contract logistics services empowered, and delivering with the best quality and service we promise and as our customers expect.</div>
                  <div class="reviews__author">
                    <span class="reviews__author-title">message by Operations Manager</span>
                    {{-- <img class="reviews__signature img-responsive" src="{{ asset('storage/home-theme/reviews/signature.png') }}" alt="signature"> --}}
                    Brayant Suchi
                  </div>
                </div>

                <div class="reviews">
                  <div class="reviews__text">We, at Zamola Entreprize Ltd, offer a convenient layout of standard freight management services, including all possible routes, i.e. Air, Sea, and Road to balance urgency and cost-effectiveness for your everyday shipments.</div>
                  <div class="reviews__author">
                    <span class="reviews__author-title">message by Operations Manager</span>
                    {{-- <img class="reviews__signature img-responsive" src="{{ asset('storage/home-theme/reviews/signature.png') }}" alt="signature"> --}}
                    Brayant Suchi
                  </div>
                </div>

                <div class="reviews">
                  <div class="reviews__text">Zamola Entreprizes Ltd works on to be a company that precisely satisfies our customers while efficiently responding and adapting to changing social and economic conditions. We devotedly and dedicatedly aim to contribute to the sustainable development of the market through our business.</div>
                  <div class="reviews__author">
                    <span class="reviews__author-title">message by Operations Manager</span>
                    {{-- <img class="reviews__signature img-responsive" src="{{ asset('storage/home-theme/reviews/signature.png') }}" alt="signature"> --}}
                    Brayant Suchi
                  </div>
                </div>

              </div><!-- end slider -->
            </div><!-- end col -->
          </div><!-- end row -->
        </div><!-- end container -->
      </section><!-- end section-default -->

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
                  <p>Like all logistics, we also operate under Non-Vessel Operating Common Carrier (NVOCC). Thus, we offer competitive rates, frequent sails, and customizable service across the globe. We link other services like air freight forwarding and multimodal transport, cross-border services and also customs house brokerage.</p>
                  <p>We make sure that we understand the customer's perspective to bring about a complete and beneficial package.</p>
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
                  <p>Utilizing our clear communication, insightful collaboration, and dedicated follow-through our road freight management team is skilled enough to comprehend your objectives and create efficient solutions that can make a difference.</p>
                  <p>We collaborate well, simple yet unique customizable options for your Road Freight products to achieve the balance of lead time, capacity, frequency, and cost. Our specialists know how to satisfy our customers. </p>
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
                  <p>You can be confident that our strategic alliances will allow you to choose from the range of air and ocean freight options. We make sure our services are highly tailored to your precise needs and complete with end-to-end visibility. Moreover, our partnership with world's premier air carriers makes us capable of delivering your shipment as per your desire.</p>
                  <p>We have complete access to prime capacities, including split and full charter options. Together we make sure your air cargo reaches its destination before your provided deadline. Our air freight professionals are always on-call in our major air-freight hubs, at any time of the day.</p>
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
                  <p>We manage different modes of transportation around the globe. Our Railway Cargo team is well equipped with the local and practical expertise to call on. Zamola Logistics Railway cargo team work closely with your people and build and manage the freight from step one to last i.e. delivery.</p>
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
                  <p>We help you manage your packaging and storage improving your overall shipping and distribution efficiencies. Our Supply Chain Management team can provide you with a comprehensive plan with eyes on the detail. Our skilled team will ensure your operations move smoothly.</p>
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
                  <p>Warehousing is an integral part of logistics management and our major also comes with this package as an added advantage. Feel free to talk to us about your warehousing problems.</p>
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
              <div class="ui-subtitle-block ui-subtitle-block_mod-a">Zamola Enterprize Ltd along with its highly efficient and professional work force provides vast logistics and transportation services to its valued customers.</div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-5 col-sm-7">
              <ul class="list-features list-features_mod-b list-unstyled">
                <li class="list-features__item">
                  <i class="list-features__icon flaticon-head39"></i>
                  <div class="list-features__inner">
                    <h3 class="list-features__title ui-title-inner">100% satisfied customers</h3>
                    <div class="list-features__description">Our customers have always made a good review towards us. We are always proud to be of service.</div>
                  </div>
                </li>
                <li class="list-features__item">
                  <i class="list-features__icon flaticon-delivery56"></i>
                  <div class="list-features__inner">
                    <h3 class="list-features__title ui-title-inner">quality service affordable price</h3>
                    <div class="list-features__description">Our prices are most competative and this goes together with the high quality of service.</div>
                  </div>
                </li>
                <li class="list-features__item">
                  <i class="list-features__icon flaticon-world77"></i>
                  <div class="list-features__inner">
                    <h3 class="list-features__title ui-title-inner">worldwide locations</h3>
                    <div class="list-features__description">There is no where we dont go and no borders we dont reach due to our good connections within and outside borders.</div>
                  </div>
                </li>
                <li class="list-features__item">
                  <i class="list-features__icon flaticon-transport643"></i>
                  <div class="list-features__inner">
                    <h3 class="list-features__title ui-title-inner">modern vehicles fleet</h3>
                    <div class="list-features__description">Our fleet of vehicles are the most reliable and we are glad to let you know that we service our vehicles more often to ensure smooth delivery.</div>
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

                {{-- <a class="carusel-clients__item" href="home.html">
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
                <a class="carusel-clients__item" href="home.html">
                  <img class="carusel-clients__img" src="{{ asset('storage/home-theme/clients/1.png') }}" alt="logo">
                  <span class="helper-2"></span>
                </a> --}}
                @foreach($clients as $client)
                  <a class="carusel-clients__item" href="{{$client->link}}">
                    <img class="carusel-clients__img" src="{{ asset('storage/home-theme/clients') }}/{{$client->logo}}" alt="{{$client->logo}}">
                    <span class="helper-2"></span>
                  </a>
                @endforeach

              </div><!-- end  -->
            </div><!-- end col -->
          </div><!-- end row -->
        </div><!-- end container -->
      </div><!-- end section-clients -->

@endsection