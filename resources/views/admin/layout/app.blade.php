<!DOCTYPE html>
<html lang="en">

<!-- basic-form.html  21 Nov 2019 03:54:41 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title> @yield('title') - Admin</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('frontend') }}/images/logo.png">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/css/app.min.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" />
    <!-- include summernote js-->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <link rel="stylesheet" href="{{ asset('admin') }}/assets/bundles/datatables/datatables.min.css">
    <link rel="stylesheet"
        href="{{ asset('admin') }}/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="{{ asset('admin') }}/assets/css/style.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/css/components.css">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/css/custom.css">
    <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.6.0/css/all.css">

    <style>
        #product-gallery {
            margin: 20px 0px !important;
            margin-bottom: 40px !important;
            border: 1px solid #afa6a6;
            border-radius: 10px;
            padding: 20px;
        }

        .dropzoneimg {
            /* margin: 20px 5px!important; */
            margin-bottom: 21px !important;
            border: 1px solid #afa6a6;
            border-radius: 10px;
            padding: 10px 20px;
        }

        .dropzoneimg .card-body {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 0px !important;
            padding-top: 8px !important;
        }

        .img-delte-btn {
            background: #ef020263;
            padding: 8px;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all .2s;
            cursor: pointer;
        }

        .img-delte-btn:hover {
            color: white !important;
            background-color: #f10017;
        }

        a {
            cursor: pointer;
            color: black;
        }

        .card-header {
            padding: 20px !important;
            display: flex;
            align-items: center;
            justify-content: space-between
        }

        .card-header .btn-primary {
            border-radius: 4px !important;
            padding: 5px 8px !important
        }

        .action-btns {
            text-align: center
        }

        .action-btns a,
        .action-btns a {
            display: inline-block !important;
            margin: 5px
        }

        .tick-icon {
            width: 50px !important;
        }

        .main-sidebar .sidebar-brand {
            margin-bottom: 25px;
        }

        .nav-link {
            text-transform: capitalize;
        }
    </style>
</head>

<body>
    <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar sticky">
                <div class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn">
                                <i data-feather="align-justify"></i></a></li>
                        <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                                <i data-feather="maximize"></i>
                            </a></li>

                    </ul>
                </div>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
                            class="nav-link nav-link-lg message-toggle"><i data-feather="mail"></i>
                            <span class="badge headerBadge1">
                                6 </span> </a>
                        <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
                            <div class="dropdown-header">
                                Messages
                                <div class="float-right">
                                    <a href="#">Mark All As Read</a>
                                </div>
                            </div>
                            <div class="dropdown-list-content dropdown-list-message">
                                <a href="#" class="dropdown-item"> <span
                                        class="dropdown-item-avatar
											text-white"> <img alt="image"
                                            src="{{ asset('admin') }}/assets/img/users/user-1.png"
                                            class="rounded-circle">
                                    </span> <span class="dropdown-item-desc"> <span class="message-user">John
                                            Deo</span>
                                        <span class="time messege-text">Please check your mail !!</span>
                                        <span class="time">2 Min Ago</span>
                                    </span>
                                </a> <a href="#" class="dropdown-item"> <span
                                        class="dropdown-item-avatar text-white">
                                        <img alt="image" src="{{ asset('admin') }}/assets/img/users/user-2.png"
                                            class="rounded-circle">
                                    </span> <span class="dropdown-item-desc"> <span class="message-user">Sarah
                                            Smith</span> <span class="time messege-text">Request for leave
                                            application</span>
                                        <span class="time">5 Min Ago</span>
                                    </span>
                                </a> <a href="#" class="dropdown-item"> <span
                                        class="dropdown-item-avatar text-white">
                                        <img alt="image" src="{{ asset('admin') }}/assets/img/users/user-5.png"
                                            class="rounded-circle">
                                    </span> <span class="dropdown-item-desc"> <span class="message-user">Jacob
                                            Ryan</span> <span class="time messege-text">Your payment invoice is
                                            generated.</span> <span class="time">12 Min Ago</span>
                                    </span>
                                </a> <a href="#" class="dropdown-item"> <span
                                        class="dropdown-item-avatar text-white">
                                        <img alt="image" src="{{ asset('admin') }}/assets/img/users/user-4.png"
                                            class="rounded-circle">
                                    </span> <span class="dropdown-item-desc"> <span class="message-user">Lina
                                            Smith</span> <span class="time messege-text">hii John, I have upload
                                            doc
                                            related to task.</span> <span class="time">30
                                            Min Ago</span>
                                    </span>
                                </a> <a href="#" class="dropdown-item"> <span
                                        class="dropdown-item-avatar text-white">
                                        <img alt="image" src="{{ asset('admin') }}/assets/img/users/user-3.png"
                                            class="rounded-circle">
                                    </span> <span class="dropdown-item-desc"> <span class="message-user">Jalpa
                                            Joshi</span> <span class="time messege-text">Please do as specify.
                                            Let me
                                            know if you have any query.</span> <span class="time">1
                                            Days Ago</span>
                                    </span>
                                </a> <a href="#" class="dropdown-item"> <span
                                        class="dropdown-item-avatar text-white">
                                        <img alt="image" src="{{ asset('admin') }}/assets/img/users/user-2.png"
                                            class="rounded-circle">
                                    </span> <span class="dropdown-item-desc"> <span class="message-user">Sarah
                                            Smith</span> <span class="time messege-text">Client Requirements</span>
                                        <span class="time">2 Days Ago</span>
                                    </span>
                                </a>
                            </div>
                            <div class="dropdown-footer text-center">
                                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
                            class="nav-link notification-toggle nav-link-lg"><i data-feather="bell"
                                class="bell"></i>
                        </a>
                        <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
                            <div class="dropdown-header">
                                Notifications
                                <div class="float-right">
                                    <a href="#">Mark All As Read</a>
                                </div>
                            </div>
                            <div class="dropdown-list-content dropdown-list-icons">
                                <a href="#" class="dropdown-item dropdown-item-unread"> <span
                                        class="dropdown-item-icon bg-primary text-white"> <i
                                            class="fas
												fa-code"></i>
                                    </span> <span class="dropdown-item-desc"> Template update is
                                        available now! <span class="time">2 Min
                                            Ago</span>
                                    </span>
                                </a> <a href="#" class="dropdown-item"> <span
                                        class="dropdown-item-icon bg-info text-white"> <i
                                            class="far
												fa-user"></i>
                                    </span> <span class="dropdown-item-desc"> <b>You</b> and <b>Dedik
                                            Sugiharto</b> are now friends <span class="time">10 Hours
                                            Ago</span>
                                    </span>
                                </a> <a href="#" class="dropdown-item"> <span
                                        class="dropdown-item-icon bg-success text-white"> <i
                                            class="fas
												fa-check"></i>
                                    </span> <span class="dropdown-item-desc"> <b>Kusnaedi</b> has
                                        moved task <b>Fix bug header</b> to <b>Done</b> <span class="time">12
                                            Hours
                                            Ago</span>
                                    </span>
                                </a> <a href="#" class="dropdown-item"> <span
                                        class="dropdown-item-icon bg-danger text-white"> <i
                                            class="fas fa-exclamation-triangle"></i>
                                    </span> <span class="dropdown-item-desc"> Low disk space. Let's
                                        clean it! <span class="time">17 Hours Ago</span>
                                    </span>
                                </a> <a href="#" class="dropdown-item"> <span
                                        class="dropdown-item-icon bg-info text-white"> <i
                                            class="fas
												fa-bell"></i>
                                    </span> <span class="dropdown-item-desc"> Welcome to Otika
                                        template! <span class="time">Yesterday</span>
                                    </span>
                                </a>
                            </div>
                            <div class="dropdown-footer text-center">
                                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image"
                                src="{{ asset('admin') }}/assets/img/user.png" class="user-img-radious-style"> <span
                                class="d-sm-none d-lg-inline-block"></span></a>
                        <div class="dropdown-menu dropdown-menu-right pullDown">
                            <div class="dropdown-title">{{ Auth::user()->name }}</div>
                            <a href="/profile" class="dropdown-item has-icon"> <i class="far
										fa-user"></i>
                                Profile
                            </a>

                            <div class="dropdown-divider"></div>
                            <a href="#"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>

                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="index.html"> <img width="120" src="{{ asset('frontend') }}/images/logo.png"
                                alt="">
                            {{-- <span
                class="logo-name">Otika</span> --}}
                        </a>
                    </div>
                    <ul class="sidebar-menu">


                        <!--<li class="dropdown {{ request()->routeIs('admin.dasboard.index') ? 'active' : '' }}">-->
                        <!--    <a href="{{ route('admin.banners.index') }}" class="nav-link" ><i data-feather="monitor"></i><span>Dashboard</span></a>-->
                        <!--</li>-->

                        <!--<li class="dropdown {{ request()->routeIs('admin.autoparts.index', 'admin.autoparts.create', 'admin.autoparts.edit') ? 'active' : '' }}">-->
                        <!--    <a href="{{ route('admin.autoparts.index') }}" class="nav-link "><i data-feather="layers"></i><span>AutoParts</span></a>-->
                        <!--</li>-->

                        <li class="dropdown {{ request()->routeIs('admin.companies.edit') ? 'active' : '' }}">
                            <a href="{{ route('admin.companies.edit', 1) }}" class="nav-link "><i
                                    data-feather="user"></i><span>company Detail</span></a>
                        </li>

                        <li
                            class="dropdown {{ request()->routeIs('admin.cars.index', 'admin.cars.create', 'admin.cars.edit', 'admin.make.index', 'admin.make.create', 'admin.make.edit', 'admin.model.index', 'admin.model.create', 'admin.model.edit', 'admin.bodyType.index', 'admin.bodyType.create', 'admin.bodyType.edit') ? 'active' : '' }}">

                            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                    class="fa-regular fa-car-garage fai-1"></i><span>Manage Car</span></a>
                            <ul class="dropdown-menu">

                                <li
                                    class="nav-link {{ request()->routeIs('admin.cars.index', 'admin.cars.create', 'admin.cars.edit') ? 'active' : '' }}">
                                    <a href="{{ route('admin.cars.index') }}" class="nav-link "><span>Cars</span></a>
                                </li>

                                <li
                                    class="nav-link  {{ request()->routeIs('admin.bodyType.index', 'admin.bodyType.create', 'admin.bodyType.edit') ? 'active' : '' }}">
                                    <a href="{{ route('admin.bodyType.index') }}" class="nav-link"> <span>Body
                                            Type</span></a>
                                </li>


                                <li
                                    class="nav-link {{ request()->routeIs('admin.model.index', 'admin.model.create', 'admin.model.edit') ? 'active' : '' }}">
                                    <a href="{{ route('admin.model.index') }}" class="nav-link ">
                                        <span>Model</span></a>
                                </li>


                                <li
                                    class="nav-link {{ request()->routeIs('admin.make.index', 'admin.make.create', 'admin.make.edit') ? 'active' : '' }}">
                                    <a href="{{ route('admin.make.index') }}" class="nav-link ">
                                        <span>Make</span></a>
                                </li>
                            </ul>
                        </li>

                        <li class="dropdown {{ request()->routeIs('admin.inquiries.index') ? 'active' : '' }}">
                            <a href="{{ route('admin.inquiries.index') }}" class="nav-link "><i
                                    data-feather="clipboard"></i><span>Inquiries</span></a>
                        </li>

                        <li class="dropdown {{ request()->routeIs('admin.homepage_banners.index') ? 'active' : '' }}">
                            <a href="{{ route('admin.homepage_banners.index') }}" class="nav-link "><i
                                    data-feather="image"></i><span>Home Page Banners</span></a>
                        </li>
                        <li
                            class="dropdown {{ request()->routeIs('admin.autoparts.index', 'admin.autoparts.edit', 'admin.autoparts.create') ? 'active' : '' }}">
                            <a href="{{ route('admin.autoparts.index') }}" class="nav-link "><i
                                    data-feather="share-2"></i><span>Auto Part</span></a>
                        </li>
                        <li
                            class="dropdown {{ request()->routeIs('admin.banners.index', 'admin.banners.create', 'admin.banners.edit') ? 'active' : '' }}">
                            <a href="{{ route('admin.banners.index') }}" class="nav-link "><i
                                    data-feather="image"></i><span>Auto Part Sliders</span></a>
                        </li>
                        <li
                            class="dropdown {{ request()->routeIs('admin.autoparts.editDesc') ? 'active' : '' }}">
                            <a href="{{ route('admin.autoparts.editDesc') }}" class="nav-link "><i
                                    data-feather="image"></i><span>Auto Part page descrtoin</span></a>
                        </li>
                        {{-- <li class="dropdown {{ request()->routeIs('admin.faqs.sliders.index') ? 'active' : '' }}">
                            <a href="{{ route('admin.faqs.sliders.index') }}" class="nav-link "><i
                                    data-feather="sliders"></i><span>Faq Sliders</span></a>
                        </li> --}}

                        <li class="dropdown {{ request()->routeIs('admin.users.index') ? 'active' : '' }}">
                            <a href="{{ route('admin.users.index') }}" class="nav-link "><i
                                    data-feather="user"></i><span>Users</span></a>
                        </li>


                        <!--<li class="dropdown {{ request()->routeIs('admin.fob.index', 'admin.fob.create', 'admin.fob.edit') ? 'active' : '' }}">-->
                        <!--  <a href="{{ route('admin.fob.index') }}" class="nav-link "><i data-feather="dollar-sign"></i><span>FOB</span></a>-->
                        <!--</li>-->


                        <li
                            class="dropdown {{ request()->routeIs('admin.exchange_rates.index', 'admin.exchange_rates.create', 'admin.exchange_rates.edit') ? 'active' : '' }}">
                            <a href="{{ route('admin.exchange_rates.index') }}" class="nav-link "><i
                                    data-feather="percent"></i><span>Exchange Rates</span></a>
                        </li>


                        <li
                            class="dropdown {{ request()->routeIs('admin.shipping.index', 'admin.shipping.create', 'admin.shipping.edit') ? 'active' : '' }}">
                            <a href="{{ route('admin.shipping.index') }}" class="nav-link "><i
                                    data-feather="truck"></i><span>Shipping</span></a>
                        </li>
                        <li
                            class="dropdown {{ request()->routeIs('admin.transmission.index', 'admin.shipping.create', 'admin.shipping.edit') ? 'active' : '' }}">
                            <a href="{{ route('admin.transmission.index') }}" class="nav-link "><i
                                    data-feather="sliders"></i><span>Transmission</span></a>
                        </li>
                    </ul>
                </aside>
            </div>

            <!-- Main Content -->
            <div class="main-content">

                @yield('content')
                <div class="settingSidebar">
                    <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
                    </a>
                    <div class="settingSidebar-body ps-container ps-theme-default">
                        <div class=" fade show active">
                            <div class="setting-panel-header">Setting Panel
                            </div>
                            <div class="p-15 border-bottom">
                                <h6 class="font-medium m-b-10">Select Layout</h6>
                                <div class="selectgroup layout-color w-50">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="value" value="1"
                                            class="selectgroup-input-radio select-layout" checked>
                                        <span class="selectgroup-button">Light</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="value" value="2"
                                            class="selectgroup-input-radio select-layout">
                                        <span class="selectgroup-button">Dark</span>
                                    </label>
                                </div>
                            </div>
                            <div class="p-15 border-bottom">
                                <h6 class="font-medium m-b-10">Sidebar Color</h6>
                                <div class="selectgroup selectgroup-pills sidebar-color">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="icon-input" value="1"
                                            class="selectgroup-input select-sidebar">
                                        <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                                            data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="icon-input" value="2"
                                            class="selectgroup-input select-sidebar" checked>
                                        <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                                            data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
                                    </label>
                                </div>
                            </div>
                            <div class="p-15 border-bottom">
                                <h6 class="font-medium m-b-10">Color Theme</h6>
                                <div class="theme-setting-options">
                                    <ul class="choose-theme list-unstyled mb-0">
                                        <li title="white" class="active">
                                            <div class="white"></div>
                                        </li>
                                        <li title="cyan">
                                            <div class="cyan"></div>
                                        </li>
                                        <li title="black">
                                            <div class="black"></div>
                                        </li>
                                        <li title="purple">
                                            <div class="purple"></div>
                                        </li>
                                        <li title="orange">
                                            <div class="orange"></div>
                                        </li>
                                        <li title="green">
                                            <div class="green"></div>
                                        </li>
                                        <li title="red">
                                            <div class="red"></div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="p-15 border-bottom">
                                <div class="theme-setting-options">
                                    <label class="m-b-0">
                                        <input type="checkbox" name="custom-switch-checkbox"
                                            class="custom-switch-input" id="mini_sidebar_setting">
                                        <span class="custom-switch-indicator"></span>
                                        <span class="control-label p-l-10">Mini Sidebar</span>
                                    </label>
                                </div>
                            </div>
                            <div class="p-15 border-bottom">
                                <div class="theme-setting-options">
                                    <label class="m-b-0">
                                        <input type="checkbox" name="custom-switch-checkbox"
                                            class="custom-switch-input" id="sticky_header_setting">
                                        <span class="custom-switch-indicator"></span>
                                        <span class="control-label p-l-10">Sticky Header</span>
                                    </label>
                                </div>
                            </div>
                            <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
                                <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
                                    <i class="fas fa-undo"></i> Restore Default
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="main-footer">
                <div class="footer-left">
                    <a href="templateshub.net">Miraipod</a></a>
                </div>
                <div class="footer-right">
                </div>
            </footer>


        </div>
    </div>
    <!-- General JS Scripts -->
    <script src="{{ asset('admin') }}/assets/js/app.min.js"></script>
    <!-- JS Libraies -->

    <script src="{{ asset('admin') }}/assets/bundles/datatables/datatables.min.js"></script>
    <script src="{{ asset('admin') }}/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js">
    </script>
    <!-- Page Specific JS File -->
    <!-- Template JS File -->
    <script src="{{ asset('admin') }}/assets/bundles/jquery-ui/jquery-ui.min.js"></script>

    <script src="{{ asset('admin') }}/assets/js/page/datatables.js"></script>
    <script src="{{ asset('admin') }}/assets/js/scripts.js"></script>


    <script src="{{ asset('admin/assets/bundles/summernote/summernote-bs4.js') }}"></script>
    <!-- Custom JS File -->
    <script src="{{ asset('admin') }}/assets/js/custom.js"></script>




    @yield('customJs')
</body>


<!-- basic-form.html  21 Nov 2019 03:54:41 GMT -->

</html>
