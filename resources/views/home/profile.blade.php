{{-- {{dd(auth()->user()->role->name)}} --}}
@extends((auth()->user()->role->name==='user')?'layouts.master':'layouts.office.master')

@section('title', 'Profile')

@section('content')

  @if(auth()->user()->role->name==='user')
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
                        <h1 class="ui-title-page">{{ $user->name }}</h1>
                        <div class="ui-subtitle-page">Edit as you deem neccessary</div>
                        <div class="decor-2 decor-2_mod-a decor-2_mod_white"></div>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end section__inner -->
    </div><!-- end section-title -->
  @endif


  <div class="section_mod-b">
      <div class="container">
          <div class="row">
              <div class="col-sm-10">
                  <h1>{{ $user->name }}</h1>
              </div>
              <div class="col-sm-2">
                  <a href="/users" class="pull-right"><img title="profile image" class="img-circle img-responsive rounded-circle img-thumbnail" src="{{ Voyager::image( $user->avatar ) }}"></a>
              </div>
          </div>
          <div class="row">
              <div class="col-sm-3">
                  <!--left col-->

                  <ul class="list-group mb-4">
                      <li class="list-group-item text-muted">Profile</li>
                      <li class="list-group-item text-right"><span class="pull-left"><strong>Joined</strong></span> {{ \Carbon\Carbon::parse($user->created_at)->diffForHumans() }}</li>
                      <li class="list-group-item text-right"><span class="pull-left"><strong>Last update</strong></span> {{ \Carbon\Carbon::parse($user->updated_at)->diffForHumans() }}</li>
                      <li class="list-group-item text-right"><span class="pull-left"><strong>Real name</strong></span> {{ $user->fname }} {{ $user->lname }}</li>
                  </ul>

                  <ul class="list-group mb-4">
                      <li class="list-group-item text-right">
                          <span class="pull-left">
                              <strong>
                                  Activity <i class="fa fa-dashboard fa-1x"></i>
                              </strong>
                          </span> 
                          <span style="font-size: 9px;">
                              (Comming soon)
                          </span>
                      </li>
                      <li class="list-group-item text-right"><span class="pull-left"><strong>Shares</strong></span> ...</li>
                      <li class="list-group-item text-right"><span class="pull-left"><strong>Likes</strong></span> ...</li>
                      <li class="list-group-item text-right"><span class="pull-left"><strong>Posts</strong></span> ...</li>
                      <li class="list-group-item text-right"><span class="pull-left"><strong>Followers</strong></span> ...</li>
                  </ul>

                  <div class="panel panel-default card mb-4 text-center">
                      <div class="panel-heading mt-3 text-center">Website <i class="fa fa-link fa-1x"></i></div>
                      <div class="panel-body card-body"><a href="https://bootdey.com">https://bootdey.com</a></div>
                  </div>

                  {{-- <div class="panel panel-default card mb-4 text-center">
                      <div class="panel-heading card-title mt-3">Social Media</div>
                      <div class="panel-body card-body">
                          <i class="fa fa-facebook fa-2x"></i> <i class="fa fa-github fa-2x"></i> <i class="fa fa-twitter fa-2x"></i> <i class="fa fa-pinterest fa-2x"></i> <i class="fa fa-google-plus fa-2x"></i>
                      </div>
                  </div> --}}

              </div><!--/col-3-->
              
              <div class="col-sm-9">

                  <ul class="nav nav-tabs" id="myTab">
                      <li class="active nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Settings</a></li>
                      <li class="nav-item"><a class="nav-link" href="#notices" data-toggle="tab">Notices</a></li>
                  </ul>

                  <div class="tab-content">

                      <div class="tab-pane active" id="settings">

                          <hr>
                          <form class="form" action="##" method="post" id="registrationForm">
                              <div class="form-group row">

                                  <div class="col-md-6">
                                      <label for="first_name">
                                          <h4>First name</h4></label>
                                      <input type="text" class="form-control" name="first_name" id="first_name" placeholder="{{ $user->fname }}" title="enter your first name." value="{{ $user->fname ? $user->fname : old($user->fname) }}">
                                  </div>

                                  <div class="col-md-6">
                                      <label for="last_name">
                                          <h4>Last name</h4></label>
                                      <input type="text" class="form-control" name="last_name" id="last_name" placeholder="{{ $user->lname }}" title="enter your last name." value="{{ $user->lname ? $user->lname : old($user->lname) }}">
                                  </div>
                              </div>

                              <div class="form-group row">

                                  <div class="col-md-6">
                                      <label for="email">
                                          <h4>Email</h4></label>
                                      <input type="email" class="form-control" name="email" id="email" placeholder="{{ $user->email }}" title="enter your email." value="{{ $user->email ? $user->email : old($user->email) }}">
                                  </div>

                                  <div class="col-md-6">
                                      <label for="mobile">
                                          <h4>Mobile</h4></label>
                                      <input type="text" class="form-control" name="mobile" id="mobile" placeholder="{{ $user->mobile }}" title="enter your mobile number." value="{{ $user->mobile ? $user->mobile : old($user->mobile) }}">
                                  </div>
                              </div>

                              {{-- <div class="form-group row">

                                  <div class="col-md-6">
                                      <label for="password">
                                          <h4>Password</h4></label>
                                      <input type="password" class="form-control" name="password" id="password" placeholder="password" title="enter your password.">
                                  </div>

                                  <div class="col-md-6">
                                      <label for="password2">
                                          <h4>Verify</h4></label>
                                      <input type="password" class="form-control" name="password2" id="password2" placeholder="password2" title="enter your password2.">
                                  </div>
                              </div> --}}

                              <div class="form-group row">
                                  <div class="col-md-12">
                                      <br>
                                      <button class="btn btn-sm btn-success pull-right" type="submit"><i class="fa fa-check-circle"></i> Save</button>
                                      <button class="btn btn-sm btn-default pull-left" type="reset"><i class="fa fa-repeat"></i> Reset</button>
                                  </div>
                              </div>

                          </form>

                      </div><!--/tab-pane-->

                      <div class="tab-pane" id="notices">
                          <h2></h2>
                          <ul class="list-group">
                              <li class="list-group-item text-muted">Inbox</li>
                              <li class="list-group-item text-right"><a href="#" class="pull-left">Here is your a link to the latest summary report from the..</a> 2.13.2014</li>
                              <li class="list-group-item text-right"><a href="#" class="pull-left">Hi Joe, There has been a request on your account since that was..</a> 2.11.2014</li>
                              <li class="list-group-item text-right"><a href="#" class="pull-left">Nullam sapien massaortor. A lobortis vitae, condimentum justo...</a> 2.11.2014</li>
                              <li class="list-group-item text-right"><a href="#" class="pull-left">Thllam sapien massaortor. A lobortis vitae, condimentum justo...</a> 2.11.2014</li>
                              <li class="list-group-item text-right"><a href="#" class="pull-left">Wesm sapien massaortor. A lobortis vitae, condimentum justo...</a> 2.11.2014</li>
                              <li class="list-group-item text-right"><a href="#" class="pull-left">For therepien massaortor. A lobortis vitae, condimentum justo...</a> 2.11.2014</li>
                              <li class="list-group-item text-right"><a href="#" class="pull-left">Also we, havesapien massaortor. A lobortis vitae, condimentum justo...</a> 2.11.2014</li>
                              <li class="list-group-item text-right"><a href="#" class="pull-left">Swedish chef is assaortor. A lobortis vitae, condimentum justo...</a> 2.11.2014</li>

                          </ul>

                      </div><!--/tab-pane-->

                  </div><!--/tab-content-->

              </div><!--/col-9-->
          
          </div><!--/row-->
      </div><!--/container-->
  </div><!--/section-->
@endsection