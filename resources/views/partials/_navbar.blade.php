<nav class="navbar navbar-expand-md navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ route('guest.home') }}">Deliveboo</a>
        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId"
            aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavId">
            <ul class="navbar-nav mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'guest.home' ? 'active' : '' }}"
                        href="{{ route('guest.home') }}" aria-current="page">Home<span
                            class="visually-hidden">(current)</span></a>
                </li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() == 'login' ? 'active' : '' }}"
                            href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link {{ Route::currentRouteName() == 'register' ? 'active' : '' }}"
                                href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() == 'admin.restaurants.index' ? 'active' : '' }}"
                            href="{{ route('admin.restaurants.index') }}"> Your Restaurant</a>
                    </li>
                    @if (Auth::check() &&
                            Auth::user()->restaurant()->exists())
                        <li class="nav-item">
                            <a class="nav-link {{ Route::currentRouteName() == 'admin.dishes.index' ? 'active' : '' }}"
                                href="{{ route('admin.dishes.index') }}">Your Menu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Route::currentRouteName() == 'admin.dishes.index' ? 'active' : '' }}"
                                href="{{ route('admin.orders.index') }}">Your Orders</a>
                        </li>
                    @endif
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('admin.home') }}">Welcome</a>
                            {{-- <a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('Profile') }}</a> --}}
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
            {{-- <form class="d-flex my-2 my-lg-0">
        <input class="form-control me-sm-2" type="text" placeholder="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form> --}}
        </div>
    </div>
</nav>
