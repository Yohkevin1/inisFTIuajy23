<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{asset('images/logo.png')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/css/main.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('admin/assets/css/bootstrap-select.min.css')}}">
    <link rel="stylesheet" href="{{asset("admin/assets/css/bootstrap.min.css")}}"> --}}

    <!-- BOotstrap-->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    {{-- fontawesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    {{-- toastr --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

    {{-- data tables--}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">

    {{-- chart js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js" integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
</head>

<body id="body-pd" class="bg-light" style="padding-bottom: 10rem">
    <header class="header align-middle bg-light" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4 " style="width: 14px;">
            <li class="dropdown nav-item show">
                <a class="dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-user" style="color: #e27208;"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item"><?= session('nama') ?></a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="{{ route('admin.akun', ['id' => encrypt(session('npm') ?? session('email'))]) }}">Reset Password</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="{{route('admin.logout')}}">Logout</a></li>
                </ul>
            </li>
        </ul>
    </header>

    @php
    $route= Route::current()->getName();
    @endphp
    <div class="l-navbar " id="nav-bar">
        <nav class="nav" style="overflow-y:auto">
            <div>
                <ul class="nav_list">
                    <div style="padding: 1rem; display: flex; justify-content: center">
                        <img class="img-fluid" style=" z-index: 100; max-width: 5rem" src="{{asset('admin/assets/images/Logo-Inisiasi-FTI-2023.png')}}" alt="">
                    </div>
                    <?php if (session('table') == 'admin') : ?>
                        <li class="nav_link {{$route=="admin.dashboard" ? "active" : ""}}">
                            <div class="container-logo-name">
                                <i class='bx bx-grid-alt nav_icon'></i>
                                <ul class="nav_name">
                                    <a id="a-id" style="text-decoration: none" href="{{route('admin.dashboard')}}" class="nav_name {{$route=="admin.dashboard" ? "active" : ""}}">Dashboard</a>
                                </ul>
                                <style>
                                    #a-id:hover {
                                        transition: .2s ease-in-out;
                                        color: black
                                    }

                                    #a-id {
                                        color: rgb(99, 99, 99);
                                        transition: .2s ease-in-out;
                                    }
                                </style>
                            </div>
                        </li>
                    <?php endif ?>
                    <?php if (session('table') == 'admin' || session('role') == 'sekret') : ?>
                        <li class="nav_link {{$route=="admin.kelompok" ? "active" : ""}}">
                            <div class="container-logo-name">
                                <i class='bx bx-grid-alt nav_icon'></i>
                                <ul class="nav_name">
                                    <a id="a-tl" style="text-decoration: none" href="{{route('admin.kelompok')}}" class="nav_name {{$route=="admin.kelompok" ? "active" : ""}}">Kelompok</a>
                                </ul>
                                <style>
                                    #a-tl:hover {
                                        transition: .2s ease-in-out;
                                        color: black
                                    }

                                    #a-tl {
                                        color: rgb(99, 99, 99);
                                        transition: .2s ease-in-out;
                                    }
                                </style>
                            </div>
                        </li>
                    <?php endif ?>
                    <?php if (session('table') == 'admin' || session('role') == 'acara') : ?>
                        <li class="nav_link {{$route=="admin.timeline" ? "active" : ""}}">
                            <div class="container-logo-name">
                                <i class='bx bx-grid-alt nav_icon'></i>
                                <ul class="nav_name">
                                    <a id="a-tl" style="text-decoration: none" href="{{route('admin.timeline')}}" class="nav_name {{$route=="admin.timeline" ? "active" : ""}}">Timeline</a>
                                </ul>
                                <style>
                                    #a-tl:hover {
                                        transition: .2s ease-in-out;
                                        color: black
                                    }

                                    #a-tl {
                                        color: rgb(99, 99, 99);
                                        transition: .2s ease-in-out;
                                    }
                                </style>
                            </div>
                        </li>
                    <?php endif ?>
                    <?php if (session('table') == 'admin') : ?>
                        <li class="nav_link {{$route=="admin.bidang" ? "active" : ""}}">
                            <div class="container-logo-name">
                                <i class='bx bx-grid-alt nav_icon'></i>
                                <ul class="nav_name">
                                    <a id="a-tl" style="text-decoration: none" href="{{route('admin.bidang')}}" class="nav_name {{$route=="admin.bidang" ? "active" : ""}}">Bidang</a>
                                </ul>
                                <style>
                                    #a-tl:hover {
                                        transition: .2s ease-in-out;
                                        color: black
                                    }

                                    #a-tl {
                                        color: rgb(99, 99, 99);
                                        transition: .2s ease-in-out;
                                    }
                                </style>
                            </div>
                        </li>
                    <?php endif ?>
                    <?php if (session('table') == 'admin') : ?>
                        <li class="nav_link {{$route=="admin.sub_bidang" ? "active" : ""}}">
                            <div class="container-logo-name">
                                <i class='bx bx-grid-alt nav_icon'></i>
                                <ul class="nav_name">
                                    <a id="a-tl" style="text-decoration: none" href="{{route('admin.sub_bidang')}}" class="nav_name {{$route=="admin.sub_bidang" ? "active" : ""}}">Sub Bidang</a>
                                </ul>
                                <style>
                                    #a-tl:hover {
                                        transition: .2s ease-in-out;
                                        color: black
                                    }

                                    #a-tl {
                                        color: rgb(99, 99, 99);
                                        transition: .2s ease-in-out;
                                    }
                                </style>
                            </div>
                        </li>
                    <?php endif ?>
                    <?php if (session('table') == 'admin') : ?>
                        <li class="nav_link {{$route=="admin.panitia" ? "active" : ""}}">
                            <div class="container-logo-name">
                                <i class='bx bx-grid-alt nav_icon'></i>
                                <ul class="nav_name">
                                    <a id="a-tl" style="text-decoration: none" href="{{route('admin.panitia')}}" class="nav_name {{$route=="admin.panitia" ? "active" : ""}}">Kepanitiaan</a>
                                </ul>
                                <style>
                                    #a-tl:hover {
                                        transition: .2s ease-in-out;
                                        color: black
                                    }

                                    #a-tl {
                                        color: rgb(99, 99, 99);
                                        transition: .2s ease-in-out;
                                    }
                                </style>
                            </div>
                        </li>
                    <?php endif ?>
                    <?php if (session('table') == 'admin') : ?>
                        <li class="nav_link {{$route=="admin.account_user" ? "active" : ""}}">
                            <div class="container-logo-name">
                                <i class='bx bx-grid-alt nav_icon'></i>
                                <ul class="nav_name">
                                    <a id="a-tl" style="text-decoration: none" href="{{route('admin.account_user')}}" class="nav_name {{$route=="admin.account_user" ? "active" : ""}}">User</a>
                                </ul>
                                <style>
                                    #a-tl:hover {
                                        transition: .2s ease-in-out;
                                        color: black
                                    }

                                    #a-tl {
                                        color: rgb(99, 99, 99);
                                        transition: .2s ease-in-out;
                                    }
                                </style>
                            </div>
                        </li>
                    <?php endif ?>
                    <?php if (session('table') == 'admin' || session('role') == 'tugas') : ?>
                        <li class="nav_link {{$route=="admin.tugas" ? "active" : ""}}">
                            <div class="container-logo-name">
                                <i class='bx bx-grid-alt nav_icon'></i>
                                <ul class="nav_name">
                                    <a id="a-tl" style="text-decoration: none" href="{{route('admin.tugas')}}" class="nav_name {{$route=="admin.tugas" ? "active" : ""}}">Tugas</a>
                                </ul>
                                <style>
                                    #a-tl:hover {
                                        transition: .2s ease-in-out;
                                        color: black
                                    }

                                    #a-tl {
                                        color: rgb(99, 99, 99);
                                        transition: .2s ease-in-out;
                                    }
                                </style>
                            </div>
                        </li>
                    <?php endif ?>
                    <?php if (session('table') == 'admin' || session('role') == 'tugas' || session('role') == 'acara') : ?>
                        <li class="nav_link {{$route=="admin.atribut" ? "active" : ""}}">
                            <div class="container-logo-name">
                                <i class='bx bx-grid-alt nav_icon'></i>
                                <ul class="nav_name">
                                    <a id="a-tl" style="text-decoration: none" href="{{route('admin.atribut')}}" class="nav_name {{$route=="admin.atribut" ? "active" : ""}}">Atribut</a>
                                </ul>
                                <style>
                                    #a-tl:hover {
                                        transition: .2s ease-in-out;
                                        color: black
                                    }

                                    #a-tl {
                                        color: rgb(99, 99, 99);
                                        transition: .2s ease-in-out;
                                    }
                                </style>
                            </div>
                        </li>
                    <?php endif ?>
                </ul>
            </div>
        </nav>
    </div>
    <!--Container Main start-->
    <div class="height-100 bg-light" style="padding-top: 5rem; ">
        @yield('content')
    </div>
    <!--Container Main end-->
    <script src="{{asset('admin/assets/js/script.js')}}"></script>
    <script src="{{asset('js/app.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        @if(Session::has('message'))
        var type = "{{Session::get('alert-type', 'info')}}"
        switch (type) {
            case 'info':
                toastr.info("{{Session::get('message')}}");
                break;
            case 'success':
                toastr.success("{{Session::get('message')}}");
                break;
            case 'warning':
                toastr.warning("{{Session::get('message')}}");
                break;
            case 'error':
                toastr.error("{{Session::get('message')}}");
                break;
        }
        @endif
    </script>

</body>
<script>
    $(document).ready(function() {
        $('#table_id').DataTable();
        $('#table_id2').DataTable();
    });
</script>

</html>
