<nav class="navbar navbar-expand-md navbar-dark fixed-top" style="background-color: #057d00;">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'bezahltesPraktikum') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Startseite</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/jobs">Praktika</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Tips</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/company">Für Arbeitgeber</a>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @if (!Auth::guard('user')->user())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('loginUser') }}">{{ __('Login') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('registerUser') }}">{{ __('Registrieren') }}</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::guard('user')->user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/favourites">Merkliste</a>
                            <a class="dropdown-item" href="/searchagents">Suchagenten</a>
                            <a class="dropdown-item" href="{{ route('logoutUser') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logoutUser') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>


