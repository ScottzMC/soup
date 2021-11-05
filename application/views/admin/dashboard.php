<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>Soup || Admin Dashboard</title>

</head>

<body class="skin-default fixed-layout">
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Dashboard</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Back to Shop</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Info box -->
                <!-- ============================================================== -->
                <div class="card-group">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex no-block align-items-center">
                                        <div>
                                            <h3><i class="icon-screen-desktop"></i></h3>
                                            <p class="text-muted">USERS</p>
                                        </div>
                                        <?php foreach($user_count as $userc){} ?>
                                        <div class="ml-auto">
                                            <h2 class="counter text-primary"><?php echo $userc->total; ?></h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="progress">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: <?php echo $userc->total; ?>%; height: 6px;" aria-valuenow="<?php echo $userc->total; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex no-block align-items-center">
                                        <div>
                                            <h3><i class="icon-note"></i></h3>
                                            <p class="text-muted">FOOD</p>
                                        </div>
                                        <?php foreach($food_count as $foodc){} ?>
                                        <div class="ml-auto">
                                            <h2 class="counter text-cyan"><?php echo $foodc->total_food; ?></h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="progress">
                                        <div class="progress-bar bg-cyan" role="progressbar" style="width: <?php echo $foodc->total_food; ?>%; height: 6px;" aria-valuenow="<?php echo $foodc->total_food; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex no-block align-items-center">
                                        <div>
                                            <h3><i class="icon-doc"></i></h3>
                                            <p class="text-muted">ORDERS</p>
                                        </div>
                                        <?php foreach($order_count as $orderc){} ?>
                                        <div class="ml-auto">
                                            <h2 class="counter text-purple"><?php echo $orderc->total_order; ?></h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="progress">
                                        <div class="progress-bar bg-purple" role="progressbar" style="width: <?php echo $orderc->total_order; ?>%; height: 6px;" aria-valuenow="<?php echo $orderc->total_order; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex no-block align-items-center">
                                        <div>
                                            <h3><i class="icon-bag"></i></h3>
                                            <p class="text-muted">BLOG</p>
                                        </div>
                                        <?php foreach($blog_count as $blogc){} ?>
                                        <div class="ml-auto">
                                            <h2 class="counter text-success"><?php echo $blogc->total_blog; ?></h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $blogc->total_blog; ?>%; height: 6px;" aria-valuenow="<?php echo $blogc->total_blog; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Info box -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Over Visitor, Our income , slaes different and  sales prediction -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-8 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex m-b-40 align-items-center no-block">
                                    <h5 class="card-title ">YEARLY SALES</h5>
                                    <div class="ml-auto">
                                        <ul class="list-inline font-12">
                                            <li><i class="fa fa-circle text-cyan"></i> Iphone</li>
                                            <li><i class="fa fa-circle text-primary"></i> Ipad</li>
                                            <li><i class="fa fa-circle text-purple"></i> Ipod</li>
                                        </ul>
                                    </div>
                                </div>
                                <div id="morris-area-chart" style="height: 340px;"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-lg-4 col-md-12">
                        <div class="row">
                            <!-- Column -->
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">ORDER STATS</h5>
                                        <div id="morris-donut-chart" class="ecomm-donute"></div>
                                        <ul class="list-inline m-t-30 text-center">
                                            <?php foreach($order_count_status as $ordercs){} ?>
                                            <li class="p-r-20">
                                                <h5 class="text-muted"><i class="fa fa-circle" style="color: #fb9678;"></i> Order</h5>
                                                <h4 class="m-b-0"><?php echo $ordercs->total_orders; ?></h4>
                                            </li>
                                            <?php foreach($order_count_delivering as $ordercd){} ?>
                                            <li class="p-r-20">
                                                <h5 class="text-muted"><i class="fa fa-circle" style="color: #01c0c8;"></i> Delivering</h5>
                                                <h4 class="m-b-0"><?php echo $ordercd->total_delivering; ?></h4>
                                            </li>
                                            <?php foreach($order_count_delivered as $ordercdd){} ?>
                                            <li>
                                                <h5 class="text-muted"> <i class="fa fa-circle" style="color: #4F5467;"></i> Delivered</h5>
                                                <h4 class="m-b-0"><?php echo $ordercdd->total_delivered; ?></h4>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>

                <!-- ============================================================== -->
                <!-- Comment - table -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- ============================================================== -->
                    <!-- Comment widgets -->
                    <!-- ============================================================== -->
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Recent Comments</h5>
                            </div>
                            <!-- ============================================================== -->
                            <!-- Comment widgets -->
                            <!-- ============================================================== -->
                            <div class="comment-widgets">
                                <!-- Comment Row -->
                                <?php foreach($blog_comment as $blogc){ ?>
                                <div class="d-flex no-block comment-row">
                                    <div class="p-2"><span class="round"><img src="<?php echo base_url('uploads/profile/original.jpg'); ?>" alt="user" width="50"></span></div>
                                    <div class="comment-text w-100">
                                        <h5 class="font-medium"><?php echo $blogc->fullname; ?></h5>
                                        <p class="m-b-10 text-muted"><?php echo $blogc->comment; ?></p>
                                        <div class="comment-footer">
                                            <span class="text-muted pull-right"><?php echo date("j M Y", strtotime($blogc->created_date)); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                                <!-- Comment Row -->
                            
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- Table -->
                    <!-- ============================================================== -->
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div>
                                        <h5 class="card-title">Sales Overview</h5>
                                        <h6 class="card-subtitle">Check the monthly sales </h6>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Email</th>
                                            <th>STATUS</th>
                                            <th>DATE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(!empty($all_subscribe)){ foreach($all_subscribe as $subscr){ ?>
                                        <tr>
                                            <td class="txt-oflo"><?php echo $subscr->email; ?></td>
                                            <?php if($subscr->status == "Admin"){ ?>
                                            <td><span class="label label-inverse"><?php echo $subscr->status; ?></span> </td>
                                            <?php }else if($subscr->status == "Food"){ ?>
                                            <td><span class="label label-warning"><?php echo $subscr->status; ?></span> </td>    
                                            <?php }else if($subscr->status == "Blog"){ ?>
                                            <td><span class="label label-danger"><?php echo $subscr->status; ?></span> </td>    
                                            <?php }else if($subscr->status == "User"){ ?>
                                            <td><span class="label label-success"><?php echo $subscr->status; ?></span> </td>      
                                            <?php } ?> 
                                            <td><?php echo date("j M Y", strtotime($subscr->created_date)); ?></td>
                                        </tr>
                                        <?php } }else{ echo 'No Subscribed Users'; } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Comment - chats -->
                <!-- ============================================================== -->

                <!-- ============================================================== -->
                <!-- End Page Content -->
                <!-- ============================================================== -->

                
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
                
</body>

</html>