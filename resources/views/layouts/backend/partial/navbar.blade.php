<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      @if (session('locale') == 'en')
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Home Page</a>
        </li>
      @endif

      @if (session('locale') == 'hi')
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">मुख्य पृष्ठ</a>
        </li>
      @endif

    </ul>

    <!-- SEARCH FORM -->
    {{-- <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form> --}}

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Language Dropdown Menu -->
        <li class="nav-item dropdown lang-dropdown">
            @if (Session::has('locale'))
                @if(session('locale') == 'hi')
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="flag-icon flag-icon-in" style="margin-right: 8px!important"></i>{{ 'Language/भाषा :- हिंदी' }}
                    </a>
                @else
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="flag-icon flag-icon-us" style="margin-right: 8px!important"></i>{{ 'Language/भाषा : English' }}
                    </a>
                @endif
            @else
                {{Config::get('app.locale')}}
            @endif

            <div class="dropdown-menu dropdown-menu-right p-0">
                <a href="{{url('language/en')}}" class="dropdown-item {{session('locale') == 'en' ? 'active' : ''}}">
                    <i class="flag-icon flag-icon-us mr-2"></i> English
                </a>
                <a href="{{url('language/hi')}}" class="dropdown-item {{session('locale') == 'hi' ? 'active' : ''}}">
                    <i class="flag-icon flag-icon-in mr-2"></i> हिंदी
                </a>
            </div>
        </li>

        @if (session('locale') == 'en')
            <li class="nav-item dropdown user-menu">
                @if (Auth::user()->role_id == '1')
                    @if (Auth::user()->image)
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                            <img src="{{asset('public/storage/profile/'.Auth::user()->image)}}" class="user-image img-circle elevation-2" alt="User Image">
                            <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <!-- User image -->
                            <li class="user-header bg-primary bg-darkorange">
                            <img src="{{asset('public/storage/profile/'.Auth::user()->image)}}" class="img-circle elevation-2" alt="User Image">

                            <p>
                                {{ Auth::user()->name }}
                                <small>{{ Auth::user()->profession }}</small>
                            </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <a href="{{route('admin.profile')}}" class="btn btn-success"><i class="nav-icon fas fa-id-badge" style="margin-right: 8px;"></i>Profile</a>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn  btn-danger float-right">
                                    <i class="nav-icon fas fa-sign-out-alt" style="margin-right: 8px;"></i>Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    @else
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                            <img src="{{asset('public/storage/profile/avatar.jpg')}}" class="user-image img-circle elevation-2" alt="User Image">
                            <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <!-- User image -->
                            <li class="user-header bg-primary bg-darkorange">
                            <img src="{{asset('public/storage/profile/avatar.jpg')}}" class="img-circle elevation-2" alt="User Image">

                            <p>
                                {{ Auth::user()->name }}
                                <small>{{ Auth::user()->profession }}</small>
                            </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <a href="{{route('admin.profile')}}" class="btn btn-success"><i class="nav-icon fas fa-id-badge" style="margin-right: 8px;"></i>Profile</a>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn  btn-danger float-right">
                                    <i class="nav-icon fas fa-sign-out-alt" style="margin-right: 8px;"></i>Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    @endif
                @elseif (Auth::user()->role_id == '2')
                    @if (Auth::user()->image)
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                            <img src="{{asset('public/storage/profile/'.Auth::user()->image)}}" class="user-image img-circle elevation-2" alt="User Image">
                            <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <!-- User image -->
                            <li class="user-header bg-primary bg-darkorange">
                            <img src="{{asset('public/storage/profile/'.Auth::user()->image)}}" class="img-circle elevation-2" alt="User Image">

                            <p>
                                {{ Auth::user()->name }}
                                <small>{{ Auth::user()->profession }}</small>
                            </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <a href="{{route('author.profile')}}" class="btn btn-success"><i class="nav-icon fas fa-id-badge" style="margin-right: 8px;"></i>Profile</a>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn  btn-danger float-right">
                                    <i class="nav-icon fas fa-sign-out-alt" style="margin-right: 8px;"></i>Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    @else
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                            <img src="{{asset('public/storage/profile/avatar.jpg')}}" class="user-image img-circle elevation-2" alt="User Image">
                            <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <!-- User image -->
                            <li class="user-header bg-primary bg-darkorange">
                            <img src="{{asset('public/storage/profile/avatar.jpg')}}" class="img-circle elevation-2" alt="User Image">

                            <p>
                                {{ Auth::user()->name }}
                                <small>{{ Auth::user()->profession }}</small>
                            </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <a href="{{route('author.profile')}}" class="btn btn-success"><i class="nav-icon fas fa-id-badge" style="margin-right: 8px;"></i>Profile</a>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn  btn-danger float-right">
                                    <i class="nav-icon fas fa-sign-out-alt" style="margin-right: 8px;"></i>Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    @endif
                @else
                    @if (Auth::user()->image)
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                            <img src="{{asset('public/storage/profile/'.Auth::user()->image)}}" class="user-image img-circle elevation-2" alt="User Image">
                            <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <!-- User image -->
                            <li class="user-header bg-primary bg-darkorange">
                            <img src="{{asset('public/storage/profile/'.Auth::user()->image)}}" class="img-circle elevation-2" alt="User Image">

                            <p>
                                {{ Auth::user()->name }}
                                <small>{{ Auth::user()->profession }}</small>
                            </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <a href="{{route('user.profile')}}" class="btn btn-success"><i class="nav-icon fas fa-id-badge" style="margin-right: 8px;"></i>Profile</a>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn  btn-danger float-right">
                                    <i class="nav-icon fas fa-sign-out-alt" style="margin-right: 8px;"></i>Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    @else
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                            <img src="{{asset('public/storage/profile/avatar.jpg')}}" class="user-image img-circle elevation-2" alt="User Image">
                            <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <!-- User image -->
                            <li class="user-header bg-primary bg-darkorange">
                            <img src="{{asset('public/storage/profile/avatar.jpg')}}" class="img-circle elevation-2" alt="User Image">

                            <p>
                                {{ Auth::user()->name }}
                                <small>{{ Auth::user()->profession }}</small>
                            </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <a href="{{route('user.profile')}}" class="btn btn-success"><i class="nav-icon fas fa-id-badge" style="margin-right: 8px;"></i>Profile</a>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn  btn-danger float-right">
                                    <i class="nav-icon fas fa-sign-out-alt" style="margin-right: 8px;"></i>Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    @endif
                @endif
            </li>
        @endif

        @if (session('locale') == 'hi')
            <li class="nav-item dropdown user-menu">
                @if (Auth::user()->role_id == '1')
                    @if (Auth::user()->image)
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                            <img src="{{asset('public/storage/profile/'.Auth::user()->image)}}" class="user-image img-circle elevation-2" alt="User Image">
                            <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <!-- User image -->
                            <li class="user-header bg-primary bg-darkorange">
                            <img src="{{asset('public/storage/profile/'.Auth::user()->image)}}" class="img-circle elevation-2" alt="User Image">

                            <p>
                                {{ Auth::user()->name }}
                                <small>{{ Auth::user()->profession }}</small>
                            </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <a href="{{route('admin.profile')}}" class="btn btn-success"><i class="nav-icon fas fa-id-badge" style="margin-right: 8px;"></i>प्रोफाइल</a>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn  btn-danger float-right">
                                    <i class="nav-icon fas fa-sign-out-alt" style="margin-right: 8px;"></i>लॉगआउट
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    @else
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                            <img src="{{asset('public/storage/profile/avatar.jpg')}}" class="user-image img-circle elevation-2" alt="User Image">
                            <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <!-- User image -->
                            <li class="user-header bg-primary bg-darkorange">
                            <img src="{{asset('public/storage/profile/avatar.jpg')}}" class="img-circle elevation-2" alt="User Image">

                            <p>
                                {{ Auth::user()->name }}
                                <small>{{ Auth::user()->profession }}</small>
                            </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <a href="{{route('admin.profile')}}" class="btn btn-success"><i class="nav-icon fas fa-id-badge" style="margin-right: 8px;"></i>प्रोफाइल</a>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn  btn-danger float-right">
                                    <i class="nav-icon fas fa-sign-out-alt" style="margin-right: 8px;"></i>लॉगआउट
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    @endif
                @elseif (Auth::user()->role_id == '2')
                    @if (Auth::user()->image)
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                            <img src="{{asset('public/storage/profile/'.Auth::user()->image)}}" class="user-image img-circle elevation-2" alt="User Image">
                            <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <!-- User image -->
                            <li class="user-header bg-primary bg-darkorange">
                            <img src="{{asset('public/storage/profile/'.Auth::user()->image)}}" class="img-circle elevation-2" alt="User Image">

                            <p>
                                {{ Auth::user()->name }}
                                <small>{{ Auth::user()->profession }}</small>
                            </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <a href="{{route('author.profile')}}" class="btn btn-success"><i class="nav-icon fas fa-id-badge" style="margin-right: 8px;"></i>प्रोफाइल</a>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn  btn-danger float-right">
                                    <i class="nav-icon fas fa-sign-out-alt" style="margin-right: 8px;"></i>लॉगआउट
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    @else
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                            <img src="{{asset('public/storage/profile/avatar.jpg')}}" class="user-image img-circle elevation-2" alt="User Image">
                            <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <!-- User image -->
                            <li class="user-header bg-primary bg-darkorange">
                            <img src="{{asset('public/storage/profile/avatar.jpg')}}" class="img-circle elevation-2" alt="User Image">

                            <p>
                                {{ Auth::user()->name }}
                                <small>{{ Auth::user()->profession }}</small>
                            </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <a href="{{route('author.profile')}}" class="btn btn-success"><i class="nav-icon fas fa-id-badge" style="margin-right: 8px;"></i>प्रोफाइल</a>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn  btn-danger float-right">
                                    <i class="nav-icon fas fa-sign-out-alt" style="margin-right: 8px;"></i>लॉगआउट
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    @endif
                @else
                    @if (Auth::user()->image)
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                            <img src="{{asset('public/storage/profile/'.Auth::user()->image)}}" class="user-image img-circle elevation-2" alt="User Image">
                            <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <!-- User image -->
                            <li class="user-header bg-primary bg-darkorange">
                            <img src="{{asset('public/storage/profile/'.Auth::user()->image)}}" class="img-circle elevation-2" alt="User Image">

                            <p>
                                {{ Auth::user()->name }}
                                <small>{{ Auth::user()->profession }}</small>
                            </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <a href="{{route('user.profile')}}" class="btn btn-success"><i class="nav-icon fas fa-id-badge" style="margin-right: 8px;"></i>प्रोफाइल</a>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn  btn-danger float-right">
                                    <i class="nav-icon fas fa-sign-out-alt" style="margin-right: 8px;"></i>लॉगआउट
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    @else
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                            <img src="{{asset('public/storage/profile/avatar.jpg')}}" class="user-image img-circle elevation-2" alt="User Image">
                            <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <!-- User image -->
                            <li class="user-header bg-primary bg-darkorange">
                            <img src="{{asset('public/storage/profile/avatar.jpg')}}" class="img-circle elevation-2" alt="User Image">

                            <p>
                                {{ Auth::user()->name }}
                                <small>{{ Auth::user()->profession }}</small>
                            </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <a href="{{route('user.profile')}}" class="btn btn-success"><i class="nav-icon fas fa-id-badge" style="margin-right: 8px;"></i>प्रोफाइल</a>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn  btn-danger float-right">
                                    <i class="nav-icon fas fa-sign-out-alt" style="margin-right: 8px;"></i>लॉगआउट
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    @endif
                @endif
            </li>
        @endif

    </ul>
</nav>
<!-- /.navbar -->
