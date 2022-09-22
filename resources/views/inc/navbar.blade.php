<div class="row">
    <div class="col-9">
        <a href="/" title="IDEASERV">
            <img src="/images/ideaserv_systems_logo.png" alt="Ideaserv Systems Inc" style="height: 100px;width:150px;">
            <p class="digital-file-201">DIGITAL 201 FILE</p>
        </a>
    </div>
    <div class="col mt-3">

        <span id="date"></span><br>
        {{ Auth::user()->name }}  [{{ Auth::user()->user_level }}]
        <a class="nav-link" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
            Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
        <a href="#">
            <img src="/images/user_icon.png" class="float-end" alt="" style="margin-top: -80px;height:100px;width:100px;">
        </a>
    </div>
</div>

<div id="app">
    <nav class="navbar navbar-expand-sm navbar-dark" style="background-color:#0d1a80;">
        <div class="container-fluid">
          <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/">HOME</a>
                </li>
                @if(Auth::user()->user_level == 'ADMIN')
                    <li class="nav-item">
                        <a class="nav-link" href="/employees">EMPLOYEES MASTER FILE</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/memos">MEMOS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/evaluation">EVALUATION</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contracts">CONTRACTS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/users">USERS</a>
                    </li>
                @endif
          </ul>

    {{-- <nav class="navbar navbar-expand-md navbar-light shadow-sm" style="background-color:#0d1a80;">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul> --}}

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav mr-right">
                    <!-- Authentication Links -->
                    @guest
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li> --}}
                        {{-- @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif --}}
                    @else
                        {{-- <li class="nav-item">
                            {{-- <a id="navbarDropdown" class="nav-link" href="/home" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>
                        </li> --}}
                        {{-- <li class="nav-item"><a href="/home" class="nav-link"></a></li> --}}
                        {{-- <li class="nav-item">
                        {{-- <a class="nav-link" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li> --}}
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</div>