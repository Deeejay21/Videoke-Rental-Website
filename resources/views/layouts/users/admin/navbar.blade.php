{{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="/admin">
            Videoke Rental Website
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->first_name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav> --}}

<nav class="layout-navbar navbar navbar-expand-lg align-items-lg-center bg-white container-p-x" id="layout-navbar">

    <a href="/admin" class="navbar-brand app-brand demo d-lg-none py-0 mr-4">
        <span class="app-brand-logo demo">
            <img src="{{ asset('assets/img/logo-mic-dark.png') }}" alt="Brand Logo" class="img-fluid">
        </span>
        <span class="app-brand-text demo font-weight-normal ml-2">Admin <strong>PANEL</strong></span>
    </a>

    <div class="layout-sidenav-toggle navbar-nav d-lg-none align-items-lg-center mr-auto">
        <a class="nav-item nav-link px-0 mr-lg-4" href="javascript:">
            <i class="ion ion-md-menu text-large align-middle"></i>
        </a>
    </div>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#layout-navbar-collapse">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse collapse" id="layout-navbar-collapse">
        <!-- Divider -->
        <hr class="d-lg-none w-100 my-2">

        <div class="navbar-nav align-items-lg-center ml-auto">
                @if (($whereHalf == True && $user->halfNotification() == true) || ($anotherWhereHalf == True && $user->anotherHalfNotification() == True))
                <div class="demo-navbar-notifications nav-item dropdown mr-lg-3">
                    <a class="nav-link hide-arrow" href="/admin/notification">
                        <i class="feather icon-bell navbar-icon align-middle"></i>
                        <span class="badge badge-danger badge-dot indicator"></span>
                        <span class="d-lg-none align-middle">&nbsp; Notifications</span>
                    </a>
                </div>
                @elseif (($wherePaid == True && $user->paidNotification() == true) || ($anotherWherePaid == True && $user->anotherPaidNotification() == True))
                <div class="demo-navbar-notifications nav-item dropdown mr-lg-3">
                    <a class="nav-link hide-arrow" href="/admin/notification">
                        <i class="feather icon-bell navbar-icon align-middle"></i>
                        <span class="badge badge-danger badge-dot indicator"></span>
                        <span class="d-lg-none align-middle">&nbsp; Notifications</span>    
                    </a>
                </div>
                @elseif (!$user->halfNotification() == true || !$user->paidNotification() == true)
                <div class="nav-item dropdown mr-lg-3">
                    <a class="nav-link dropdown-toggle hide-arrow" href="#" data-toggle="dropdown">
                        <i class="feather icon-bell navbar-icon align-middle"></i>
                        <span class="d-lg-none align-middle">&nbsp; Notification</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="list-group list-group-flush">
                            <div href="javascript:" class="text-muted pl-3">No Notification Yet</div>
                        </div>
                    </div>
                </div>
                @endif
                {{-- @foreach ($usersNotification as $user)
                @if (($user->is_paid == 'Paid') && ($user->videoke_return->is_return == 'Operating') && ($user->date_return_notification() == $currentTime->format('F d, Y')))
                <div class="demo-navbar-notifications nav-item dropdown mr-lg-3">
                    <a class="nav-link hide-arrow" href="/admin/notification">
                        <i class="feather icon-bell navbar-icon align-middle"></i>
                        <span class="badge badge-danger badge-dot indicator"></span>
                        <span class="d-lg-none align-middle">&nbsp; Notifications</span>
                    </a>
                </div>
                @elseif (($user->is_paid == 'Half Payment') && ($user->videoke_return->is_return == 'Operating') && $user->checked_in_at->format('F d, Y') == $currentTime->format('F d, Y'))
                <div class="demo-navbar-notifications nav-item dropdown mr-lg-3">
                    <a class="nav-link hide-arrow" href="/admin/notification">
                        <i class="feather icon-bell navbar-icon align-middle"></i>
                        <span class="badge badge-danger badge-dot indicator"></span>
                        <span class="d-lg-none align-middle">&nbsp; Notifications</span>
                    </a>
                </div>
                @else
                <div class="nav-item dropdown mr-lg-3">
                    <a class="nav-link dropdown-toggle hide-arrow" href="#" data-toggle="dropdown">
                        <i class="feather icon-bell navbar-icon align-middle"></i>
                        <span class="d-lg-none align-middle">&nbsp; Notification</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="list-group list-group-flush">
                            <div href="javascript:" class="text-muted pl-3">No Notification Yet</div>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach --}}
                
            <!-- Divider -->
            <div class="nav-item d-none d-lg-block text-big font-weight-light line-height-1 opacity-25 mr-3 ml-1">|</div>
            <div class="demo-navbar-user nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                    <span class="d-inline-flex flex-lg-row-reverse align-items-center align-middle">
                        <i class="feather icon-user navbar-icon align-middle"></i>
                        <span class="px-1 mr-lg-2 ml-2 ml-lg-0">{{ Auth::user()->first_name}}</span>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        <i class="feather icon-power text-danger"></i> &nbsp; {{ __('Logout') }}
                    </a>
                    
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</nav>