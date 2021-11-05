<!-- Favicons -->
<link rel="shortcut icon" href="<?php echo base_url('assets/img/favicon.png'); ?>">
<link rel="apple-touch-icon" href="<?php echo base_url('assets/img/favicon_60x60.png'); ?>">
<link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url('assets/img/favicon_76x76.png'); ?>">
<link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url('assets/img/favicon_120x120.png'); ?>">
<link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url('assets/img/favicon_152x152.png'); ?>">

<!-- CSS Plugins -->
<link rel="stylesheet" href="<?php echo base_url('assets/plugins/bootstrap/dist/css/bootstrap.min.css'); ?>" />
<link rel="stylesheet" href="<?php echo base_url('assets/plugins/slick-carousel/slick/slick.css'); ?>" />
<link rel="stylesheet" href="<?php echo base_url('assets/plugins/animate.css/animate.min.css'); ?>" />
<link rel="stylesheet" href="<?php echo base_url('assets/plugins/animsition/dist/css/animsition.min.css'); ?>" />

<!-- CSS Icons -->
<link rel="stylesheet" href="<?php echo base_url('assets/css/themify-icons.css'); ?>" />
<link rel="stylesheet" href="<?php echo base_url('assets/plugins/font-awesome/css/font-awesome.min.css'); ?>" />

<!-- CSS Theme -->
<link id="theme" rel="stylesheet" href="<?php echo base_url('assets/css/themes/theme-beige.min.css'); ?>" />

<body>

<!-- Body Wrapper -->
<div id="body-wrapper" class="animsition">

    <!-- Header -->
    <header id="header" class="light">

        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <!-- Logo -->
                    <div class="module module-logo light">
                        <a href="#">
                            <img src="<?php echo base_url('assets/img/logo-dark.svg'); ?>" alt="Logo" width="88">
                        </a>
                    </div>
                </div>
                <div class="col-md-7">
                    <!-- Navigation -->
                    <nav class="module module-navigation left mr-4">
                        <ul id="nav-main" class="nav nav-main">
                           <li><a href="<?php echo site_url('home'); ?>">Home</a></li>
                            <!--li class="has-dropdown">
                                <a href="#">About</a>
                                <div class="dropdown-container">
                                    <ul class="dropdown-mega">
                                        <li><a href="page-about.html">About Us</a></li>
                                        <li><a href="page-services.html">Services</a></li>
                                        <li><a href="page-gallery.html">Gallery</a></li>
                                        <li><a href="page-reviews.html">Reviews</a></li>
                                        <li><a href="page-faq.html">FAQ</a></li>
                                    </ul>
                                    <div class="dropdown-image">
                                        <img src="assets/img/photos/dropdown-about.jpg" alt="">
                                    </div>
                                </div>
                            </li-->
                              <li><a href="<?php echo site_url('menu'); ?>">Menu</a></li>
                            <li><a href="<?php echo site_url('offer'); ?>">Offers</a></li>
                           <!--  <li><a href="page-contact.html">Contact</a></li> -->
                           <li><a href="<?php echo site_url('blog'); ?>">Blog</a></li>
                           <?php if($this->session->userdata('login') && $this->session->userdata('ustatus') == "User"){ ?>
                           <li><a href="<?php echo site_url('home/logout'); ?>">Logout</a></li>
                         <?php }else if($this->session->userdata('ustatus') == "Food"){ ?>
                           <li><a href="<?php echo site_url('food/dashboard'); ?>">Food Panel</a></li>
                           <li><a href="<?php echo site_url('home/logout'); ?>">Logout</a></li>
                        <?php }else if($this->session->userdata('ustatus') == "Admin"){ ?>
                          <li><a href="<?php echo site_url('admin/dashboard'); ?>">Admin Panel</a></li>
                          <li><a href="<?php echo site_url('home/logout'); ?>">Logout</a></li>
                        <?php }else if($this->session->userdata('ustatus') == "Publishing"){ ?>
                          <li><a href="<?php echo site_url('publishing/dashboard'); ?>">Publishing Panel</a></li>
                          <li><a href="<?php echo site_url('home/logout'); ?>">Logout</a></li>
                        <?php }else{ ?>  
                          <li><a href="<?php echo site_url('login'); ?>">Login</a></li>
                          <li><a href="<?php echo site_url('register'); ?>">Register</a></li>
                        <?php } ?>
                        </ul>
                    </nav>
                    <div class="module left">
                        <a href="<?php echo site_url('shopping/my_orders'); ?>" class="btn btn-outline-secondary"><span>My Orders</span></a>
                    </div>
                </div>
                <div class="col-md-2">
                    <a href="#" class="module module-cart right" data-toggle="panel-cart">
                        <span class="cart-icon">
                            <i class="ti ti-shopping-cart"></i>
                            <span class="notification"><?php echo $this->cart->total_items(); ?></span>
                        </span>
                        <span class="cart-value">&#8358; <?php echo number_format($this->cart->total()); ?></span>
                    </a>
                </div>
            </div>
        </div>

    </header>
    <!-- Header / End -->

    <!-- Header -->
    <header id="header-mobile" class="light">

        <div class="module module-nav-toggle">
            <a href="#" id="nav-toggle" data-toggle="panel-mobile">
              <span></span>
              <span></span>
              <span></span>
              <span></span>
            </a>
        </div>

        <div class="module module-logo">
            <a href="<?php echo site_url('home'); ?>">
                <img src="<?php echo base_url('assets/img/logo-horizontal-dark.svg'); ?>" alt="Logo">
            </a>
        </div>

        <a href="#" class="module module-cart" data-toggle="panel-cart">
            <i class="ti ti-shopping-cart"></i>
            <span class="notification">2</span>
        </a>

    </header>
    <!-- Header / End -->
