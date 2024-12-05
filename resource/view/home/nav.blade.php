<nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
    <div class="container">

        <a class="navbar-brand logo-image no-underline" href="/">Mynetwork</a>

        <!-- Mobile Menu Toggle Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <input type="checkbox" id="checkbox">
            <label for="checkbox" class="toggle">
                <div class="bars" id="bar1"></div>
                <div class="bars" id="bar2"></div>
                <div class="bars" id="bar3"></div>
            </label>
        </button>
        <!-- end of mobile menu toggle button -->

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="{{ Auth::check() ? '/problem' : route('login') }}">PROBLEMS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="{{ Auth::check() ? '/mycompiler' : route('login') }}">COMPILER</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="{{ Auth::check() ? '/track' : route('login') }}">Progress</a>
                </li>

                @if(Auth::check())
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#pricing">PRICING</a>
                    </li>
                @endif
            </ul>
    
            @if (Route::has('login'))
                @auth
                    <span class="nav-item">
                        <a href="/user/profile" class="btn-outline-sm">{{ Auth::user()->name }}</a>
                    </span>
                    <span class="nav-item">
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf
                            <button type="submit" class="btn-outline-sm">LOG OUT</button>
                        </form>
                    </span>
                @else
                    <span class="nav-item">
                        <a href="{{ route('login') }}" class="btn-outline-sm">LOG IN</a>
                    </span>
                    <span class="nav-item">
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn-outline-sm">SIGN UP</a>
                        </span>
                        @endif
                @endauth
            @endif
        </div>

    </div>
</nav>
