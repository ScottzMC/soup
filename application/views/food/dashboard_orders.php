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
        echo "Ordered " .$output. " ago";
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
    <title>Soup || All Food Orders</title>
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
                        <h4 class="text-themecolor">All Food Orders</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Food Orders</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Info box Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table product-overview" id="myTable">
                                        <thead>
                                            <tr>
                                                <th>Order ID</th>
                                                <th>Photo</th>
                                                <th>Title</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                                <th>Customer Name</th>
                                                <th>Customer Mobile</th>
                                                <th>Customer Address</th>
                                                <th>Delivery</th>
                                                <th>Payment</th>
                                                <th>Status</th>
                                                <th>Time</th>
                                                <th>Date</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <script>
                                          function deliver_food(id){
                                            var delv_id = id;
                                            if(confirm("Are you sure this food was delivered")){
                                            $.post('<?php echo base_url('food/deliver_food'); ?>', {"delv_id": delv_id}, function(data){
                                              location.reload();
                                              $('#ctv').html(data)
                                              });
                                            }
                                          }
                                        </script>
                                        <p id='ctv'></p>

                                        <script>
                                          function cancel_food(id){
                                            var can_id = id;
                                            if(confirm("Are you sure you want to cancel this order")){
                                            $.post('<?php echo base_url('food/cancel_food'); ?>', {"can_id": can_id}, function(data){
                                              location.reload();
                                              $('#ctc').html(data)
                                              });
                                            }
                                          }
                                        </script>
                                        <p id='ctc'></p>

                                        <script>
                                          function delete_order(id){
                                            var del_id = id;
                                            if(confirm("Are you sure you want to delete this order")){
                                            $.post('<?php echo base_url('food/delete_order'); ?>', {"del_id": del_id}, function(data){
                                              location.reload();
                                              $('#ctd').html(data)
                                              });
                                            }
                                          }
                                        </script>
                                        <p id='ctd'></p>

                                        <tbody>
                                            <?php if(!empty($order_details)){ foreach($order_details as $order_det){ ?>
                                            <tr>
                                                <td>#<?php echo $order_det->order_id; ?></td>
                                                <td> <img src="<?php echo base_url('uploads/menu/foods/'.$order_det->image); ?>" alt="<?php echo $order_det->title; ?>" width="80"> </td>
                                                <td><?php echo str_replace('-',' ',$order_det->title); ?></td>
                                                <td><?php echo number_format($order_det->quantity); ?></td>
                                                <td>&#8358; <?php echo number_format($order_det->price); ?></td>
                                                <td><?php echo $order_det->firstname; ?> <?php echo $order_det->surname; ?></td>
                                                <td><?php echo $order_det->telephone; ?></td>
                                                <td><?php echo $order_det->address; ?></td>
                                                <td><?php echo $order_det->delivery_time; ?></td>
                                                <td><?php echo $order_det->payment_type; ?></td>
                                                <?php if($order_det->status == "Delivering"){ ?>
                                                <td> <span class="label label-warning font-weight-100"><?php echo $order_det->status; ?></span> </td>
                                                <?php }else if($order_det->status == "Delivered"){ ?>
                                                <td> <span class="label label-success font-weight-100"><?php echo $order_det->status; ?></span> </td>
                                                <?php }else if($order_det->status == "Cancelled"){ ?>
                                                <td> <span class="label label-danger font-weight-100"><?php echo $order_det->status; ?></span> </td>
                                                <?php } ?>
                                                <td><?php echo convertToAgoFormat($order_det->created_time); ?></td>
                                                <td><?php echo date("j M Y", strtotime($order_det->created_date)); ?></td>
                                                <td><a onclick="deliver_food(<?php echo $order_det->id; ?>)" class="text-inverse p-r-10" data-toggle="tooltip" title="Delivered"><i class="ti-marker-alt"></i></a>
                                                <a onclick="cancel_food(<?php echo $order_det->id; ?>)" class="text-inverse p-r-10" data-toggle="tooltip" title="Cancel"><i class="ti-marker-alt"></i></a> 
                                                <a onclick="delete_order(<?php echo $order_det->id; ?>)" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="ti-trash"></i></a></td>
                                            </tr>
                                        <?php } }else{ echo '';} ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
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