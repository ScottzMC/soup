<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">    
    <title>Soup || Upload Newsletter</title>
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
                        <h4 class="text-themecolor">Upload Newsletter</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Upload Newsletter</li>
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
                <!-- Row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header bg-info">
                                <h4 class="m-b-0 text-white">Other Sample form</h4>
                            </div>
                            <div class="card-body">
                                <form action="<?php echo base_url('admin/add_newsletter'); ?>" method="post" enctype="multipart/form-data">
                                    <div class="form-body">
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group has-success">
                                                    <label class="control-label">Newsletter Title</label>
                                                    <input type="text" name="title" id="firstName" class="form-control" placeholder="A Sweet Preserved Recipe">
                                                    <small class="form-control-feedback"> This is inline help </small> </div>
                                                    <span class="text-danger" style="color: red;"><?php echo form_error('title'); ?></span>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                            <div class="form-group">
                                                <label>Text area</label>
                                                <textarea class="form-control" name="body" rows="5"></textarea>
                                                <span class="text-danger" style="color: red;"><?php echo form_error('body'); ?></span>

                                            </div>
                                        </div>

                                        <!--<div class="col-lg-6 col-md-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h4 class="card-title">Upload Newsletter Image</h4>
                                                    <label for="input-file-now">Newsletter Image</label>
                                                    <input type="file" name="fileToUpload[]" id="input-file-now" class="dropify" />
                                                </div>
                                            </div>
                                        </div>-->
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" name="uploadBtn" class="btn btn-success"> <i class="fa fa-check"></i> Upload</button>
                                    </div>
                                </form>

                                <?php
                                if($this->form_validation->run() == TRUE){
                                  echo $this->session->flashdata('msgSuccess');
                                  echo $this->session->flashdata('msgError');
                                }
                              ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row -->
                
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