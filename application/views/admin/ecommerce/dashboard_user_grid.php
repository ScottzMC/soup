<?php 
    
  function convertToAgoFormat($timestamp){
    $diffBtwCurrentTimeAndTimeStamp = (time() - $timestamp);
    $periodsString = ["sec", "min","hr","day","week","month","year","decade"];
    $periodNumbers = ["60" , "60" , "24" , "7" , "4.35" , "12" , "10"];
    for(@@$iterator = 0; $diffBtwCurrentTimeAndTimeStamp >= $periodNumbers[$iterator]; $iterator++)
        @@$diffBtwCurrentTimeAndTimeStamp /= $periodNumbers[$iterator];
        $diffBtwCurrentTimeAndTimeStamp = round($diffBtwCurrentTimeAndTimeStamp);

    if($diffBtwCurrentTimeAndTimeStamp != 1)  $periodsString[$iterator].="s";
        $output = "$diffBtwCurrentTimeAndTimeStamp $periodsString[$iterator]";
        echo "Registered " .$output. " ago";
}  

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Soup || User Grid</title>
</head>

<body class="skin-default fixed-layout">
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
                        <h4 class="text-themecolor">All Users</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">User Grid</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <!-- .left-right-aside-column-->
                            <div class="contact-page-aside">
                                <!-- .left-aside-column-->
                                <div class="left-aside bg-light-part">
                                    <ul class="list-style-none">
                                        <?php foreach($user_count as $userc){} ?>
                                        <li class="box-label"><a href="javascript:void(0)">All Users <span><?php echo $userc->total; ?></span></a></li>
                                        <li class="divider"></li>
                                        <?php foreach($user_status_count as $usersc){ ?>
                                        <li><a href="javascript:void(0)"><?php echo $usersc->status; ?> <span><?php echo $usersc->total_status; ?></span></a></li>  
                                        <?php } ?>     
                                    </ul>
                                </div>
                                <!-- /.left-aside-column-->
                                <div class="right-aside ">
                                    <div class="right-page-header">
                                        <div class="d-flex">
                                            <div class="align-self-center">
                                                <h4 class="card-title m-t-10">Contacts / Employee List </h4></div>
                                            <div class="ml-auto">
                                                <input type="text" id="demo-input-search2" placeholder="search contacts" class="form-control"> </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table id="demo-foo-addrow" class="table m-t-30 table-hover no-wrap contact-list" data-page-size="10">
                                            <thead>
                                                <tr>
                                                    <th>FullName</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Status</th>
                                                    <th>Time</th>
                                                    <th>Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if(!empty($user_grid)){ foreach($user_grid as $userg){ ?>
                                                <tr>
                                                    <td>
                                                        <a href="#" style="color: #000; "><img src="<?php echo base_url('uploads/profile/original.jpg'); ?>" alt="<?php echo $userg->firstname; ?> <?php echo $userg->surname; ?>" class="img-circle" /><?php echo $userg->firstname; ?> <?php echo $userg->surname; ?></a>
                                                    </td>
                                                    <td><?php echo $userg->email; ?></td>
                                                    <td><?php echo $userg->telephone; ?></td>
                                                    <?php if($userg->status == "Admin"){ ?>
                                                    <td><span class="label label-inverse"><?php echo $userg->status; ?></span> </td>
                                                    <?php }else if($userg->status == "Food"){ ?>
                                                    <td><span class="label label-warning"><?php echo $userg->status; ?></span> </td>    
                                                    <?php }else if($userg->status == "Blog"){ ?>
                                                    <td><span class="label label-danger"><?php echo $userg->status; ?></span> </td>    
                                                    <?php }else if($userg->status == "User"){ ?>
                                                    <td><span class="label label-success"><?php echo $userg->status; ?></span> </td>      
                                                    <?php } ?>    
                                                    <td><?php echo convertToAgoFormat($userg->created_time); ?></td>
                                                    <td><?php echo date("j M Y", strtotime($userg->created_date)); ?></td>
                                                    <td>
                                                        <button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></button>
                                                    </td>
                                                </tr>
                                                <?php } }else{ echo ''; } ?>
                                            </tbody>
                                        
                                        </table>
                                    </div>
                                    <!-- .left-aside-column-->
                                </div>
                                <!-- /.left-right-aside-column-->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
</body>

</html>