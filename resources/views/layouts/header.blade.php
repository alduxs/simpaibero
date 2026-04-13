<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Simpa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content=""">
    <meta name=" keywords" content="">
    <meta name="author" content="">

    <!-- App favicon -->
    <link rel="shortcut icon" href="/assets/images/favicon.ico">

    <!-- Theme Config Js -->
    <script src="/assets/js/config.js"></script>

    <!-- Vendor css -->
    <link href="/assets/css/vendors.min.css" rel="stylesheet" type="text/css">

    <!-- App css -->
    <link href="/assets/css/app.min.css" rel="stylesheet" type="text/css">

    <!-- Adicional css -->
    <link href="/assets/css/adicional.css" rel="stylesheet" type="text/css">
</head>

<body>
    <!-- Begin page -->
    <div class="wrapper">


        @include('layouts.navigation')

        <!-- Topbar Start -->
        <header class="app-topbar">
            <div class="container-fluid topbar-menu">
                <div class="d-flex align-items-center gap-2">
                    <!-- Topbar Brand Logo -->
                    <div class="logo-topbar">
                        <!-- Logo light -->
                        <a href="index.html" class="logo-light">
                            <span class="logo-lg">
                                <img src="/assets/images/logo.png" alt="logo">
                            </span>
                            <span class="logo-sm">
                                <img src="/assets/images/logo-sm.png" alt="small logo">
                            </span>
                        </a>


                    </div>

                    <!-- Sidebar Menu Toggle Button -->
                    <button class="sidenav-toggle-button btn btn-primary btn-icon">
                        <i class="ti ti-menu-4 fs-22"></i>
                    </button>

                    <!-- Horizontal Menu Toggle Button -->
                    <button class="topnav-toggle-button px-2" data-bs-toggle="collapse"
                        data-bs-target="#topnav-menu-content">
                        <i class="ti ti-menu-4 fs-22"></i>
                    </button>




                </div> <!-- .d-flex-->

                <div class="d-flex align-items-center gap-2">

                    <!-- User Dropdown -->
                    <div class="topbar-item nav-user">
                        <div class="dropdown">
                            <a class="topbar-link dropdown-toggle drop-arrow-none px-2" data-bs-toggle="dropdown"
                                data-bs-offset="0,16" href="#!" aria-haspopup="false" aria-expanded="false">
                                {{--img src="/assets/images/users/user-2.jpg" width="32" class="rounded-circle me-lg-2 d-flex" alt="user-image">--}}


                                    <img src="{{ auth()->user()->image ? asset('assets/images/users/'.auth()->user()->image) : asset('/assets/images/users/usernoimge.jpg') }}"
                 width="32" class="rounded-circle me-lg-2 d-flex" alt="user-image">


                                <div class="d-lg-flex align-items-center gap-1 d-none">
                                    <h5 class="my-0">{{ auth()->user()->name }}</h5>
                                    <i class="ti ti-chevron-down align-middle"></i>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">


                                <!-- My Profile -->
                                <a href="/user/{{ auth()->user()->id }}/profile/edit" class="dropdown-item">
                                    <i class="ti ti-user-circle me-2 fs-17 align-middle"></i>
                                    <span class="align-middle">Perfil</span>
                                </a>


                                <!-- Divider -->
                                <div class="dropdown-divider"></div>


                                <!-- Logout -->
                                <!--
                                <a href="{{ route('logout') }}" class="dropdown-item text-danger fw-semibold" >
                                    <i class="ti ti-logout-2 me-2 fs-17 align-middle"></i>
                                    <span class="align-middle">Cerrar sesión</span>
                                </a>
                            -->
                                <a class="dropdown-item text-danger fw-semibold" href="#" id="btn-logout-manual">
                                    <i class="ti ti-logout-2 me-2 fs-17 align-middle"></i>
                                    <span class="align-middle">Cerrar sesión</span>
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Topbar End -->



        <!-- ============================================================== -->
        <!-- Start Main Content -->
        <!-- ============================================================== -->

        <div class="content-page">
