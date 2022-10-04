<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">
            <i class="icofont-dashboard"></i>
            <i class="icofont-rounded-right"></i>
            <span class="fs-16px">@yield('page-title')</s>
        </a>
        <!-- Large button groups (default and split) -->
        <div class="btn-group">
            <button type="button" class="btn dropdown-toggle fs-16px" data-bs-toggle="dropdown" data-bs-display="static"
                aria-expanded="false">
                <i class="icofont-user"></i> {{ Auth::user()->name }}
            </button>
            <ul class="dropdown-menu dropdown-menu-lg-end">
                <li><button class="dropdown-item" type="button">Settings</button></li>
                <li><button class="dropdown-item" type="button">Another action?</button></li>
                <hr>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </ul>
        </div>
    </div>
</nav>
