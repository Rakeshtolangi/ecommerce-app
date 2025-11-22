<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Ecommerce Nepal</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="icon" href="assets/img/kaiadmin/favicon.ico" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="{{ asset('assets/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
        WebFont.load({
            google: { families: ["Public Sans:300,400,500,600,700"] },
            custom: {
                families: ["Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
                urls: ["{{ asset('assets/css/fonts.min.css') }}"],
            },
            active: function() { sessionStorage.fonts = true; },
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/plugins.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/kaiadmin.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/customCss.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        .form-control { border-color: #d0d0d0e3 !important; }
        .sub-item::before {
            font-family: 'FontAwesome';
            content: "\f178" !important;
            display: inline-block;
            top: 0 !important;
            background: none !important;
        }
        .sidebar .nav-collapse li a { padding: 1px 25px !important; }
        .sidebar .nav-collapse, .sidebar[data-background-color=white] .nav-collapse {
            margin-top: 0; margin-bottom: 5px; padding: 5px 0 5px 40px !important;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <div class="sidebar" data-background-color="dark">
            <div class="sidebar-logo">
                <div class="logo-header" data-background-color="dark">
                    <a href="{{ url('/') }}" class="logo">
                        <p class="text-white">Ecom</p>
                    </a>
                    <div class="nav-toggle">
                        <button class="btn btn-toggle toggle-sidebar"><i class="gg-menu-right"></i></button>
                        <button class="btn btn-toggle sidenav-toggler"><i class="gg-menu-left"></i></button>
                    </div>
                    <button class="topbar-toggler more"><i class="gg-more-vertical-alt"></i></button>
                </div>
            </div>

            <div class="sidebar-wrapper scrollbar scrollbar-inner">
                <div class="sidebar-content">
                    <ul class="nav nav-secondary">
                        <li class="nav-item active">
                            <a href="{{ route('admin.home') }}" class="collapsed" aria-expanded="false">
                                <i class="fas fa-home"></i><p>Dashboard</p>
                            </a>
                        </li>

                        <!-- Manage Products -->
                        <li class="nav-item">
                            <a data-bs-toggle="collapse" href="#productsMenu">
                                <i class="far fa-lightbulb"></i><p>Manage Products</p><span class="caret"></span>
                            </a>
                            <div class="collapse" id="productsMenu">
                                <ul class="nav nav-collapse">
                                    <li><a href="{{ route('admin.products') }}"><span class="sub-item">List Products</span></a></li>
                                    <li><a href="{{ route('create.product') }}"><span class="sub-item">Add Products</span></a></li>
                                </ul>
                            </div>
                        </li>

                        <!-- Product Categories -->
                        <li class="nav-item">
                            <a data-bs-toggle="collapse" href="#categoriesMenu">
                                <i class="far fa-lightbulb"></i><p>Products Category</p><span class="caret"></span>
                            </a>
                            <div class="collapse" id="categoriesMenu">
                                <ul class="nav nav-collapse">
                                    <li><a href="{{ route('categories.index') }}"><span class="sub-item">List Categories</span></a></li>
                                    <li><a href="{{ route('categories.create') }}"><span class="sub-item">Add Category</span></a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Sidebar -->

        <!-- Main Panel -->
        <div class="main-panel">
            <!-- Navbar Header -->
            <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom" style="box-shadow: rgba(0,0,0,0.16) 0px 1px 4px;">
                <div class="container-fluid">
                    <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                        <!-- Notifications -->
                        <li class="nav-item topbar-icon dropdown hidden-caret">
                            <a class="nav-link dropdown-toggle" href="#" id="notifDropdown" data-bs-toggle="dropdown">
                                <i class="fa fa-bell"></i><span class="notification">4</span>
                            </a>
                            <ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
                                <li><div class="dropdown-title">You have 4 new notifications</div></li>
                                <li>
                                    <div class="notif-scroll scrollbar-outer">
                                        <div class="notif-center">
                                            <a href="#"><div class="notif-icon notif-primary"><i class="fa fa-user-plus"></i></div><div class="notif-content"><span class="block">New user registered</span><span class="time">5 minutes ago</span></div></a>
                                            <a href="#"><div class="notif-icon notif-success"><i class="fa fa-comment"></i></div><div class="notif-content"><span class="block">Rahmad commented on Admin</span><span class="time">12 minutes ago</span></div></a>
                                            <a href="#"><div class="notif-img"><img src="assets/img/profile2.jpg" alt="Img Profile" /></div><div class="notif-content"><span class="block">Reza sent message</span><span class="time">12 minutes ago</span></div></a>
                                            <a href="#"><div class="notif-icon notif-danger"><i class="fa fa-heart"></i></div><div class="notif-content"><span class="block">Farrah liked Admin</span><span class="time">17 minutes ago</span></div></a>
                                        </div>
                                    </div>
                                </li>
                                <li><a class="see-all" href="javascript:void(0);">See all notifications<i class="fa fa-angle-right"></i></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <div class="main-content" style="padding: 20px; margin-top: 20px;">
                @yield('content')
            </div>

            <!-- Footer -->
            <footer class="footer">
                <div class="container-fluid d-flex justify-content-between">
                    <nav class="pull-left">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/') }}">© 2024 Dev Surkhet | All Rights Reserved.</a>
                            </li>
                        </ul>
                    </nav>
                    <div class="copyright">
                        Designed & Developed By <a href="http://creativecanvas.info" target="_blank">Dev Surkhet Company Pvt. Ltd.</a>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- Core JS Files -->
    <script src="{{ asset('assets/js/core/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugin/chart.js/chart.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugin/chart-circle/circles.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugin/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugin/jsvectormap/jsvectormap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugin/jsvectormap/world.js') }}"></script>
    <script src="{{ asset('assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/js/kaiadmin.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $(".datatables").DataTable();
        });

        document.addEventListener('DOMContentLoaded', function() {
            const input = document.getElementById('productImageInput');
            const preview = document.getElementById('productImagePreview');
            if (!input || !preview) return;

            input.addEventListener('change', function(event) {
                const file = event.target.files[0];
                if (file) {
                    preview.src = URL.createObjectURL(file);
                    preview.style.display = 'block';
                } else {
                    preview.src = '';
                    preview.style.display = 'none';
                }
            });
        });
    </script>
</body>
</html>
