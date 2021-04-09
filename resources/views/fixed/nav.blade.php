<body>
<nav class="navbar navbar-light navbar-expand-md navigation-clean-button">
    <div class="container">
        <a class="navbar-brand" href="{{ route('recipes.index') }}">BASil</a>
        <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><i
                class="fas fa-bars" style="color: #fffbe6;padding: 5px;"></i></button>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="navbar-nav mr-auto">
                @if(session()->has('user'))
                    <li class="nav-item">
                        <a class="nav-link @if(request()->path() == 'profile/' . session()->get('user')->id) active @endif"
                           href="{{ route('profile.show', session()->get('user')->id) }}">Profile</a>
                    </li>
                @endif
                @foreach($menu as $m)
                    @if($m->role_id == 2)
                        <li class="nav-item">
                            <a class="nav-link @if(request()->routeIs($m->uri)) active @endif"
                               href="{{ route($m->uri) }}">{{ $m->name }}</a>
                        </li>
                    @endif
                @endforeach
                @if(session()->has('user') && session()->get('user')->id == 1)
                        <li class="nav-item">
                            <a class="nav-link"
                               href="{{ route('admin.recipes.index') }}">Admin</a>
                        </li>
                @endif
            </ul>
            <span class="navbar-text actions" style="padding-left: 18px;">
                @if(!session()->has('user'))
                    <a class="login" href="{{ route('login.showLoginForm') }}">Log In</a>
                    <a class="btn btn-light action-button" role="button"
                       href="{{ route('register.showRegistrationForm') }}">Sign Up</a>
                @else
                    <a class="btn btn-light action-button" role="button" href="{{ route('logout') }}"
                       id="logout">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="post" class="d-none">
                        @csrf
                    </form>
                @endif
            </span>
        </div>
    </div>
</nav>
