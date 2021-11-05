    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('assets/images/favicon.png'); ?>">
    <!-- This page CSS -->
    <!-- chartist CSS -->
    <link href="<?php echo base_url('assets/node_modules/morrisjs/morris.css'); ?>" rel="stylesheet">
    <!--Toaster Popup message CSS -->
    <link href="<?php echo base_url('assets/node_modules/toast-master/css/jquery.toast.css'); ?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url('dist/css/style.min.css'); ?>" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <link href="<?php echo base_url('dist/css/pages/dashboard1.css'); ?>" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="<?php echo base_url('dist/css/pages/ecommerce.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/node_modules/datatables/jquery.dataTables.min.css'); ?>" rel="stylesheet" type="text/css" />

    <!-- Page CSS -->
    <link href="<?php echo base_url('dist/css/pages/contact-app-page.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('dist/css/pages/footable-page.css'); ?>" rel="stylesheet">

    <link href="<?php echo base_url('assets/node_modules/footable/css/footable.core.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/node_modules/bootstrap-select/bootstrap-select.min.css'); ?>" rel="stylesheet" />

    <link rel="stylesheet" href="<?php echo base_url('assets/node_modules/dropify/dist/css/dropify.min.css'); ?>">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Soup</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?php echo site_url('food/dashboard'); ?>">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="<?php echo base_url('assets/images/logo-icon.png'); ?>" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="<?php echo base_url('assets/images/logo-light-icon.png'); ?>" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text --><span>
                         <!-- dark Logo text -->
                         <img src="<?php echo base_url('assets/images/logo-text.png'); ?>" alt="homepage" class="dark-logo" />
                         <!-- Light Logo text -->    
                         <img src="<?php echo base_url('assets/images/logo-light-text.png'); ?>" class="light-logo" alt="homepage" /></span> </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler d-block d-sm-none waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <li class="nav-item"> <a class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark" href="javascript:void(0)"><i class="icon-menu"></i></a> </li>

                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="#">
                                <i class="ti-email"></i>
                                <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                            </a>
                            
                        </li>
                        <!-- ============================================================== -->
                        <!-- End Comment -->
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
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- User Profile-->
                <div class="user-profile">
                    <div class="user-pro-body">
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li>
                            <div class="hide-menu text-center">
                                <div id="eco-spark"></div>
                                <small>TOTAL EARNINGS</small>
                                <?php if(!empty($order_sales)){ foreach($order_sales as $orders){} ?>
                                <h4>&#8358; <?php echo number_format($orders->total); ?></h4>
                                <?php }else{ echo '&#8358 0'; } ?>
                            </div>
                        </li>

                        <li> <a class="waves-effect waves-dark" href="<?php echo site_url('home'); ?>" aria-expanded="false"><i class="icon-menu"></i><span class="hide-menu">Back to Shop</span></a></li>
                        <li> <a class="waves-effect waves-dark" href="<?php echo site_url('food/dashboard'); ?>" aria-expanded="false"><i class="fa fa-user-o text-success"></i><span class="hide-menu">Dashboard</span></a></li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-speedometer"></i><span class="hide-menu">Ecommerce </a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo site_url('food/upload'); ?>">Food Upload</a></li>
                                <li><a href="<?php echo site_url('food/orders'); ?>">Food Orders</a></li>
                            </ul>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="<?php echo site_url('home/logout'); ?>" aria-expanded="false"><i class="fa fa-circle-o text-success"></i><span class="hide-menu">Log Out</span></a></li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->