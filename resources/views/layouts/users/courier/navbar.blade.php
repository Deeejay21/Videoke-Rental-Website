<nav class="layout-navbar navbar navbar-expand-lg align-items-lg-center bg-white container-p-x" id="layout-navbar">

    <a href="index.html" class="navbar-brand app-brand demo d-lg-none py-0 mr-4">
        <span class="app-brand-logo demo">
            <img src="{{ asset('assets/img/logo-mic-dark.png') }}" alt="Brand Logo" class="img-fluid">
        </span>
        <span class="app-brand-text demo font-weight-normal ml-2">Courier <strong>PANEL</strong></span>
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
                @foreach ($usersNotification as $user)
                @if (($user->is_paid == 'Paid') && ($user->is_return == 'Operating') && ($user->date_return_notification() == $currentTime->format('F d, Y')))
                <div class="demo-navbar-notifications nav-item dropdown mr-lg-3">
                    <a class="nav-link hide-arrow" href="/courier/notification">
                        <i class="feather icon-bell navbar-icon align-middle"></i>
                        <span class="badge badge-danger badge-dot indicator"></span>
                        <span class="d-lg-none align-middle">&nbsp; Notifications</span>
                    </a>
                </div>
                @elseif (($user->is_paid == 'Half Payment') && ($user->is_return == 'Operating') && $user->checked_in_at->format('F d, Y') == $currentTime->format('F d, Y'))
                <div class="demo-navbar-notifications nav-item dropdown mr-lg-3">
                    <a class="nav-link hide-arrow" href="/courier/notification">
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
                @endforeach
                
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