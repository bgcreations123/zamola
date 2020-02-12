@extends('layouts.master')

@section('title', 'Comments')

@section('content')

{{-- {{dd($comments)}} --}}

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
              <h1 class="ui-title-page">Comments</h1>
              <div class="ui-subtitle-page">Commentaries</div>
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
				<h3 class="widget-title ui-title-inner">Commentaries</h3>
	            <div class="decor-2 decor-2_mod-b"></div>
					<div class="widget-content">
            @if($comments->isEmpty())
              No Comments at the moment!
            @else
              @foreach($comments as $comment)
    						<div class="post-social clearfix">
    						    <div class="post-social__media"><i class="icon far fa-comments color-primary"></i></div>
    					    	<div class="post-social__inner">
    					    		<a class="post-social__text" href="blog-main.html">{{$comment->comment}}</a>
                      <p>By {{$comment->sender}}</p>
    					    		<div class="post-social__meta">
                        <time datetime="2012-10-27 15:20">{{$comment->created_at}}</time>
                      </div>
    					  		</div>
    						</div><!-- end post-social -->
              @endforeach
            @endif
            <span class="float-right">{{ $comments->render() }}</span>
					</div>
          		</div>
              <div class="entry-meta">
        		{{-- <span class="entry-meta__item"><a class="entry-meta__link" href="blog-post.html"><time datetime="2012-10-27 15:20">{{ $page['created_at'] }}</time></a></span> --}}
      		  </div>

              <div class="entry-main">
                {{-- <div class="entry-header">
                  <h2 class="entry-title ui-title-inner">{{ $page['title'] }}</h2>
                </div> --}}

                <h2 class="entry-title ui-title-inner">Comment Herein</h2>

                <div class="entry-content">
                    <section class="section-form-request">
                      <form action="{{ route('comments.store') }}" method="POST" class="form-request">
                        {{ csrf_field() }}
                        <div class="row">
                          <div class="col-sm-6"> 
                            <input type="text" class="form-control" required="" placeholder="First Name" name="fname" />
                          </div><!-- end col -->
                          <div class="col-sm-6">
                            <input type="text" class="form-control" required="" placeholder="Last Name" name="lname" />
                          </div><!-- end col -->
                        </div><!-- end row -->
                        <div class="row">
                          <div class="col-xs-12">
                            <textarea class="form-control" required="" rows="19" placeholder="comment" name="comment"></textarea> 
                            <button class="btn btn_mod-a btn-sm btn-effect pull-right" type="submit">
                              <span class="btn__inner">Comment</span>
                            </button>
                          </div><!-- end col -->
                        </div><!-- end row -->
                      </form><!-- end form-request -->
                    </section>
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
              </div><!-- end widget-content -->
              <a class="post-social__btn btn btn_mod-a btn-sm btn-effect" href="contact.html"><span class="btn__inner">follow us</span></a>
            </section><!-- end widget -->
          </aside>
        </div>
      </div>
    </div>

@endsection