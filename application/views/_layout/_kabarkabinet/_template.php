<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <?php echo @$_meta; ?>

    <title>KabarKabinet</title>

    <?php echo @$_css; ?>

</head>

<body>
    <!-- -------------------------------------------------------------- -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- -------------------------------------------------------------- -->
    <div class="preloader">
        <svg class="tea lds-ripple" width="37" height="48" viewbox="0 0 37 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M27.0819 17H3.02508C1.91076 17 1.01376 17.9059 1.0485 19.0197C1.15761 22.5177 1.49703 29.7374 2.5 34C4.07125 40.6778 7.18553 44.8868 8.44856 46.3845C8.79051 46.79 9.29799 47 9.82843 47H20.0218C20.639 47 21.2193 46.7159 21.5659 46.2052C22.6765 44.5687 25.2312 40.4282 27.5 34C28.9757 29.8188 29.084 22.4043 29.0441 18.9156C29.0319 17.8436 28.1539 17 27.0819 17Z" stroke="#20222a" stroke-width="2"></path>
            <path d="M29 23.5C29 23.5 34.5 20.5 35.5 25.4999C36.0986 28.4926 34.2033 31.5383 32 32.8713C29.4555 34.4108 28 34 28 34" stroke="#20222a" stroke-width="2"></path>
            <path id="teabag" fill="#20222a" fill-rule="evenodd" clip-rule="evenodd" d="M16 25V17H14V25H12C10.3431 25 9 26.3431 9 28V34C9 35.6569 10.3431 37 12 37H18C19.6569 37 21 35.6569 21 34V28C21 26.3431 19.6569 25 18 25H16ZM11 28C11 27.4477 11.4477 27 12 27H18C18.5523 27 19 27.4477 19 28V34C19 34.5523 18.5523 35 18 35H12C11.4477 35 11 34.5523 11 34V28Z"></path>
            <path id="steamL" d="M17 1C17 1 17 4.5 14 6.5C11 8.5 11 12 11 12" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke="#20222a"></path>
            <path id="steamR" d="M21 6C21 6 21 8.22727 19 9.5C17 10.7727 17 13 17 13" stroke="#20222a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg>
    </div>
    <!-- -------------------------------------------------------------- -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- -------------------------------------------------------------- -->
    <div id="main-wrapper">
        <!-- -------------------------------------------------------------- -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- -------------------------------------------------------------- -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header border-end">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    <a class="navbar-brand" href="#">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="<?php echo base_url(''); ?>src/assets/images/logos/logo-icon.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="<?php echo base_url(''); ?>src/assets/images/logos/logo-light-icon.png" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            <img src="<?php echo base_url(''); ?>src/assets/images/logos/logo-kabar-kabinet.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo text -->
                            <img src="<?php echo base_url(''); ?>src/assets/images/logos/logo-kabar-kabinet.png" class="light-logo" alt="homepage" />
                        </span>
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu fs-5"></i></a></li>
                        <!-- ============================================================== -->
                        <!-- Messages -->
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->
                        <!-- End Comment -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- mega menu -->
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->
                        <!-- End mega menu -->
                        <!-- ============================================================== -->
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav">
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">


                            <span class="ms-2 font-weight-medium"><?php echo $userdata->nama_pengguna;
                                                                    ?></span>


                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <?php echo @$_nav; ?>
        <!-- -------------------------------------------------------------- -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- -------------------------------------------------------------- -->
        <!-- -------------------------------------------------------------- -->
        <!-- Page wrapper  -->
        <!-- -------------------------------------------------------------- -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb border-bottom">

            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- -------------------------------------------------------------- -->
            <!-- Container fluid  -->
            <!-- -------------------------------------------------------------- -->
            <div class="container-fluid page-content">
                <!-- -------------------------------------------------------------- -->
                <!-- Start Page Content -->
                <!-- -------------------------------------------------------------- -->
                <!-- content -->
                <?php echo @$_content; ?>
                <!-- -------------------------------------------------------------- -->
                <!-- End PAge Content -->
                <!-- -------------------------------------------------------------- -->
            </div>
            <!-- -------------------------------------------------------------- -->
            <!-- End Container fluid  -->
            <!-- -------------------------------------------------------------- -->
            <!-- -------------------------------------------------------------- -->
            <!-- footer -->
            <!-- -------------------------------------------------------------- -->
            <footer class="footer text-center">
                All Rights Reserved by Ample admin.
            </footer>
            <!-- -------------------------------------------------------------- -->
            <!-- End footer -->
            <!-- -------------------------------------------------------------- -->
        </div>
        <!-- -------------------------------------------------------------- -->
        <!-- End Page wrapper  -->
        <!-- -------------------------------------------------------------- -->
    </div>
    <!-- -------------------------------------------------------------- -->
    <!-- End Wrapper -->
    <!-- -------------------------------------------------------------- -->
    <!-- -------------------------------------------------------------- -->
    <!-- customizer Panel -->
    <!-- -------------------------------------------------------------- -->

    <?php echo @$_js; ?>

</body>

</html>