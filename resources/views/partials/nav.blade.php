<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            {{-- Collapsed Hamburger --}}
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">{!! trans('titles.toggleNav') !!}</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            {{-- Branding Image --}}
            {{-- <a class="navbar-brand" href="{{ url('/') }}">
                {!! config('app.name', Lang::get('titles.app')) !!}
            </a>--}}
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            {{-- Left Side Of Navbar --}}
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        El pollo pelado <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                        <li {{ Request::is('clientes') ? 'class=active' : null }}>{!! HTML::link(url('/cliente'), Lang::get('titles.clientes')) !!}</li>
                        <li {{ Request::is('pedidos') ? 'class=active' : null }}>{!! HTML::link(url('/pedido'), Lang::get('titles.pedidos')) !!}</li>
                        <li {{ Request::is('productos') ? 'class=active' : null }}>{!! HTML::link(url('/producto'), Lang::get('titles.productos')) !!}</li>
                        <li class="divider"></li>
                        <li class="dropdown-submenu">
                            <a tabindex="-1" href="#">{!! Lang::get('titles.referencias') !!}</a>
                            <ul class="dropdown-submenu">
                                <li {{ Request::is('categorias') ? 'class=active' : null }}>{!! HTML::link(url('/categoria'), Lang::get('titles.categorias')) !!}</li>
                                <li {{ Request::is('descuentos') ? 'class=active' : null }}>{!! HTML::link(url('/descuento'), Lang::get('titles.descuentos')) !!}</li>
                                <li {{ Request::is('localidades') ? 'class=active' : null }}>{!! HTML::link(url('/localidad'), Lang::get('titles.localidades')) !!}</li>
                                <li {{ Request::is('monedas') ? 'class=active' : null }}>{!! HTML::link(url('/moneda'), Lang::get('titles.monedas')) !!}</li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>

            {{-- Right Side Of Navbar --}}
            <ul class="nav navbar-nav navbar-right">
                {{-- Authentication Links --}}
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}">{!! trans('titles.login') !!}</a></li>
                    <li><a href="{{ route('register') }}">{!! trans('titles.register') !!}</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">

                            @if ((Auth::User()->profile) && Auth::user()->profile->avatar_status == 1)
                                <img src="{{ Auth::user()->profile->avatar }}" alt="{{ Auth::user()->name }}" class="user-avatar-nav">
                            @else
                                <div class="user-avatar-nav"></div>
                            @endif

                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li {{ Request::is('profile/'.Auth::user()->name, 'profile/'.Auth::user()->name . '/edit') ? 'class=active' : null }}>
                                {!! HTML::link(url('/profile/'.Auth::user()->name), trans('titles.profile')) !!}
                            </li>
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    {!! trans('titles.logout') !!}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                    @role('admin')
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Admin <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li {{ Request::is('users', 'users/' . Auth::user()->id, 'users/' . Auth::user()->id . '/edit') ? 'class=active' : null }}>{!! HTML::link(url('/users'), Lang::get('titles.adminUserList')) !!}</li>
                                <li {{ Request::is('users/create') ? 'class=active' : null }}>{!! HTML::link(url('/users/create'), Lang::get('titles.adminNewUser')) !!}</li>
                                <li {{ Request::is('themes','themes/create') ? 'class=active' : null }}>{!! HTML::link(url('/themes'), Lang::get('titles.adminThemesList')) !!}</li>
                                <li {{ Request::is('logs') ? 'class=active' : null }}>{!! HTML::link(url('/logs'), Lang::get('titles.adminLogs')) !!}</li>
                                <li {{ Request::is('php') ? 'class=active' : null }}>{!! HTML::link(url('/php'), Lang::get('titles.adminPHP')) !!}</li>
                                <li {{ Request::is('routes') ? 'class=active' : null }}>{!! HTML::link(url('/routes'), Lang::get('titles.adminRoutes')) !!}</li>
                            </ul>
                        </li>
                    @endrole
                @endif
            </ul>
        </div>
    </div>
</nav>
