<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Soup || All Blog Post in Admin Dashboard</title>
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
                        <h4 class="text-themecolor">All Blog Post</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Blog</li>
                            </ol>
                            <a href="<?php echo site_url('admin/add_blog'); ?>" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Add New Blog</a>
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
                    <script>
                      function delete_blog(id){
                        var del_id = id;
                        if(confirm("Are you sure you want to delete this blog")){
                        $.post('<?php echo base_url('admin/delete_blog'); ?>', {"del_id": del_id}, function(data){
                          location.reload();
                          $('#cte').html(data)
                          });
                        }
                      }
                    </script>
                    <p id='cte'></p>

                    <?php foreach($all_blogs as $all_blg){ ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="product-img">
                                    <img src="<?php echo base_url('uploads/blog/'.$all_blg->image); ?>">
                                    <div class="pro-img-overlay"><a href="<?php echo site_url('admin/edit_blog/'.strtolower($all_blg->title)); ?>" class="bg-info"><i class="ti-marker-alt"></i></a> <a onclick="delete_blog(<?php echo $all_blg->id; ?>)" class="bg-danger"><i class="ti-trash"></i></a></div>
                                </div>
                                <div class="product-text">
                                    <h5 class="card-title m-b-0"><?php echo str_replace('-', ' ', $all_blg->title); ?></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
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
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->

</body>

</html>