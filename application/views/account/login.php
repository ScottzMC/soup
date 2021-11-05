<!DOCTYPE html>
<html lang="en">
<head>

<!-- Meta -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />

<!-- Title -->
<title>Soup || Login to your Account</title>

</head>

<body>
    <!-- Content -->
    <div id="content">

        <!-- Page Title -->
        <div class="page-title bg-dark dark">
            <!-- BG Image -->
            <div class="bg-image bg-parallax"><img src="<?php echo base_url('assets/img/photos/bg-croissant.jpg'); ?>" alt="Crossiants"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 push-lg-4">
                        <h1 class="mb-0">Login</h1>
                        <h4 class="text-muted mb-0">Some informations about our restaurant</h4>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section -->
        <section class="section bg-light">

            <div class="container">
                <div class="row">
                    <div class="col-xl-4 push-xl-8 col-lg-5 push-lg-7"></div>
                    <div class="col-xl-8 pull-xl-4 col-lg-7 pull-lg-5">
                      <form action="<?php echo base_url('login'); ?>" method="post">
                        <div class="bg-white p-4 p-md-5 mb-4">
                            <h4 class="border-bottom pb-4"><i class="ti ti-user mr-3 text-primary"></i>Login</h4>
                            <div class="row mb-5">
                                <div class="form-group col-sm-6">
                                    <label>E-mail address:</label>
                                    <input type="email" name="email" class="form-control">
                                    <span class="text-danger" style="color: red;"><?php echo form_error('email'); ?></span>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label>Password:</label>
                                    <input type="password" name="password" class="form-control">
                                    <span class="text-danger" style="color: red;"><?php echo form_error('password'); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" name="loginBtn" class="btn btn-primary btn-lg"><span>Login!</span></button>
                        </div>
                        </form>
                        <?php
                          if($this->form_validation->run() == TRUE){
                            echo $this->session->flashdata('msgError');
                          }
                        ?>
                    </div>
                </div>
            </div>

        </section>

    </div>
    <!-- Content / End -->

</body>
</html>
