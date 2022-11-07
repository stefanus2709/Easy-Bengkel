<style>
    .nav-border {
        border-left: 2px solid #F1F1F1;
    }
</style>

<nav class="nav-border navbar navbar-expand-lg bg-white">
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
                <hr>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    <i class="icofont-logout text-danger"></i>{{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </ul>
        </div>
    </div>
</nav>
