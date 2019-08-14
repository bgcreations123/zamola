<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
  <i id="menu-toggle" class="arrow" onclick="this.classList.toggle('active')"></i>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
      <!-- Authentication Links -->
      @guest
          <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
          </li>
          @if (Route::has('register'))
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
              </li>
          @endif
      @else
          <li class="nav-item">
              <a class="nav-link" href="#">Notifications</a>
          </li>
          @if(auth()->user()->hasRole('user'))
              <li class="nav-item">
                  <a class="nav-link" href="#">Shipment</a>
              </li>
          @elseif(auth()->user()->hasRole('driver'))
              <li class="nav-item">
                  <a class="nav-link" href="#">Payments</a>
              </li>
          @endif

          <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{ Auth::user()->name }} <span class="caret"></span>
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('user.profile', ['id'=>Auth::user()->id]) }}">My Profile</a>
                  <div class="dropdown-divider"></div>
                  @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('Editor'))
                      <a class="dropdown-item" href="{{ URL::to('/admin') }}">Back Office</a>
                      <div class="dropdown-divider"></div>
                  @endif
                  <a class="dropdown-item" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
              </div>
          </li>

      @endguest
    </ul>
  </div>
</nav>  
