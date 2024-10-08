<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- General CSS Files -->

<!-- DataTables CSS -->
    <link rel="stylesheet" href="{{('https://cdn.datatables.net/2.1.7/css/dataTables.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{('https://cdn.datatables.net/buttons/3.1.2/css/buttons.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css') }}" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/select2/dist/css/select2.min.css') }}">

    <!-- General JS Scripts -->
    <script src="{{ asset('assets/modules/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/modules/popper.js') }}"></script>
    <script src="{{ asset('assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('assets/modules/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/stisla.js') }}"></script>
    
    @yield('script')

    <!-- Template JS File -->
    <script src="{{ asset('assets/js/scripts.js')}}"></script>
    <script src="{{ asset('assets/js/custom.js')}}"></script>

</head>
<body>
    <div>
        <nav class="navbar bg-primary navbar-expand">
            <div class="dropdown me-4 ms-auto">
                <h6 class="dropdown-toggle text-white fw-semibold text-decoration-none" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Session::get('username') }}
                </h6>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <form action="{{ route('logout') }}" method="POST" class="m-0">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger"> <i class="fas fa-sign-out-alt icons"></i>Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="main-sidebar sidebar-style-2">
            <aside id="sidebar-wrapper">
                <div class="sidebar-brand">
                    <a class="labeling"><img src="{{ asset('../assets/img/icon/prohukumm.png') }}" alt=""></a>
                </div>
                <div class="sidebar-brand sidebar-brand-sm">
                    <a>prohukum</a>
                </div>
                <ul class="sidebar-menu">

                    {{-- main --}}
                    <li class="menu-header">Main</li>
                    <li class="dropdown {{ request()->is('documentation*') ? 'active' : '' }}">
                        <a href="{{ route('documentation.home')}}" class="nav-link {{ request()->is('documentation*') ? 'active' : '' }}">
                            <i class="fa-solid fa-file"></i><span>Documentation</span>
                        </a>
                    </li>

                    {{-- connection setting --}}
                    <li class="menu-header">Connection setting</li>
                    <li class="dropdown {{ request()->is('connection*') ? 'active' : '' }}">
                        <a href="{{ route('connection.home')}}" class="nav-link {{ request()->is('connection*') ? 'active' : '' }}">
                            <i class="fa-solid fa-gear"></i><span>Connection setting</span>
                        </a>
                    </li>
                
                    {{-- product --}}
                    <li class="menu-header">Product</li>
                    <li class="dropdown {{ request()->is('prohukum*') ? 'active' : '' }}">
                        <a href="{{ route('prohukum.home')}}" class="nav-link {{ request()->is('prohukum*') ? 'active' : '' }}">
                            <i class="fa-solid fa-scale-balanced"></i><span>Prohukum</span>
                        </a>
                    </li>

                    <li class="dropdown {{ request()->is('proaccounting*') ? 'active' : '' }}">
                        <a href="{{ route('proaccounting.home')}}" class="nav-link {{ request()->is('proaccounting*') ? 'active' : '' }}">
                            <i class="fa-solid fa-money-bill"></i><span>Proaccounting</span>
                        </a>
                    </li>
                </ul>                
            </aside>
        </div>

        <div class="main-content">
            <section class="section">
                <div class="section-body  m-4">
                    @yield('content')
                </div>
            </section>
        </div>
    </div>
</body>
</html>

<style>
    .labeling {
        margin-bottom: 40px;
    }

    .dropdown-menu-end {
        right: 0;
        left: auto;
    }

    .sidebar-menu li a:hover,
    .sidebar-menu li a.active {
        background-color: white;
        color: #009AD0;
    }

    .icons{
        padding-right: 5px;
    }
</style>
