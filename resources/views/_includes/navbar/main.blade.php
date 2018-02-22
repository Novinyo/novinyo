<nav class="navbar has-shadow">
    <div class="navbar-brand">
      <a class="navbar-item" href="{{route('home')}}">
        <img src="{{asset('images/logo.png')}}" alt="novinyo" width="112" height="28">
      </a>
      <div class="navbar-burger burger" data-target="myMenu">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>

    <div id="myMenu" class="navbar-menu">
      <div class="navbar-start">
        <a class="navbar-item is-tab m-l-10" href="#">
          Learn
        </a>
        <a class="navbar-item is-tab" href="#">
          Discuss
        </a>
        <a class="navbar-item is-tab" href="#">
          Share
        </a>
      </div>
      <div class="navbar-end">
        @guest
        <a class="navbar-item is-tab" href="{{route('login')}}">
          Login
        </a>
        <a class="navbar-item is-tab" href="{{route('register')}}">
          Join Us
        </a>
        @else
        <div class="navbar-item has-dropdown is-hoverable">
          <span class="navbar-link">
            <i class="fa fa-user-circle-o"></i>&nbsp; {{ Auth::user()->name }}
          </span>
          <div class="navbar-dropdown is-boxed">
            <a class="navbar-item" href="#">
              Profile
            </a>
            <a class="navbar-item" href="#">
              Notifications
            </a>
            <a class="navbar-item" href="{{route('manage.dashboard')}}">
              Settings
            </a>
            <hr class="navbar-divider">
            <a class="navbar-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
              Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </div>
        </div>
        @endguest
      </div>
</nav>
