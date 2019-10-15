@extends('layouts.master')

@section('title', $page->title)

@section('content')

    <div class="section-title parallax-bg parallax-light">
      <ul class="bg-slideshow">
        <li>
          <div style="background-image:url({{ asset('storage/home-theme/bg/bg-title.jpg') }})" class="bg-slide"></div>
        </li>
      </ul>
      <div class="section__inner">
        <div class="container">
          <div class="row">
            <div class="col-xs-12">
              <h1 class="ui-title-page">{{ $page['title'] }}</h1>
              <div class="ui-subtitle-page">{{ $page['excerpt'] }}</div>
              <div class="decor-2 decor-2_mod-a decor-2_mod_white"></div>
            </div><!-- end col -->
          </div><!-- end row -->
        </div><!-- end container -->
      </div><!-- end section__inner -->
    </div><!-- end section-title -->


    <div class="container">
      <div class="row">
        <div class="col-md-9 col-sm-8">
          <div class="section-default section-posts">
            <article class="post post_mod-c post_main clearfix">
              <div class="entry-media">
                {!! (empty($page['image'])) ? '' : '<img class="img-responsive" src="'.asset('storage/'.$page['image']).'" alt="Foto">' !!}
              </div>
              <div class="entry-meta">
                {{-- <span class="entry-meta__item"><a class="entry-meta__link" href="blog-post.html"><time datetime="2012-10-27 15:20">{{ $page['created_at'] }}</time></a></span> --}}
              </div>

              <div class="entry-main">
                {{-- <div class="entry-header">
                  <h2 class="entry-title ui-title-inner">{{ $page['title'] }}</h2>
                </div> --}}

                <div class="entry-content">
                  {!! $page['body'] !!}
                </div>

              </div>
            </article>

          </div>
        </div>

        <div class="col-md-3 col-sm-4">
          <aside class="sidebar">

            <section class="widget">
              <h3 class="widget-title ui-title-inner">twitter feed</h3>
              <div class="decor-2 decor-2_mod-b"></div>
              <div class="widget-content">
                <div class="post-social clearfix">
                  <div class="post-social__media"><i class="icon fa fa-twitter color-primary"></i></div>
                  <div class="post-social__inner">
                    <a class="post-social__text" href="blog-main.html">Android How to: Take Screenshots on Android Auto http://dlvr.it/BL6PYf #Android #Google</a>
                    <div class="post-social__meta"><time datetime="2012-10-27 15:20">feb 10, 2016</time></div>
                  </div>
                </div><!-- end post-social -->
                <div class="post-social clearfix">
                  <div class="post-social__media"><i class="icon fa fa-twitter color-primary"></i></div>
                  <div class="post-social__inner">
                    <a class="post-social__text" href="blog-main.html">Exclusive iStock Promo Codes for WDL Readers #iStock #prvitae</a>
                    <div class="post-social__meta"><time datetime="2012-10-27 15:20">feb 10, 2016</time></div>
                  </div>
                </div><!-- end post-social -->
                <div class="post-social clearfix">
                  <div class="post-social__media"><i class="icon fa fa-twitter color-primary"></i></div>
                  <div class="post-social__inner">
                    <a class="post-social__text" href="blog-main.html">Recite the Quran with the intention to cure the diseases of your heart, so you can worship Allah with sincerity.</a>
                    <div class="post-social__meta"><time datetime="2012-10-27 15:20">feb 10, 2016</time></div>
                  </div>
                </div><!-- end post-social -->
              </div><!-- end widget-content -->
              <a class="post-social__btn btn btn_mod-a btn-sm btn-effect" href="contact.html"><span class="btn__inner">follow us</span></a>
            </section><!-- end widget -->
          </aside>
        </div>
      </div>
    </div>

@endsection
