<!DOCTYPE html>
<html lang="en">
<head>

<!-- Meta -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />

<!-- Title -->
<?php foreach($detail as $det){} ?>
<title>Soup || <?php echo str_replace('-', ' ', $det->title); ?></title>

</head>

<body>

    <!-- Content -->
    <div id="content" class="bg-light">

        <!-- Post / Single -->
        <article class="post single">
            <div class="post-image bg-parallax"><img src="<?php echo base_url('uploads/blog/'.$det->image); ?>" alt="<?php echo $det->title; ?>"></div>
            <div class="container container-md">
                <div class="post-content">
                    <ul class="post-meta">
                        <li><?php echo date('j M Y', strtotime($det->created_date)); ?></li>
                        <li>by Admin</li>
                    </ul>
                    <h1 class="post-title"><?php echo str_replace('-', ' ', $det->title); ?></h1>
                    <hr>
                    <p class="lead"><?php echo $det->body; ?></p>
                    <hr>
                    <div class="post-comments post-module">
                        <h4><i class="ti ti-comments mr-3 text-primary"></i>Comments</h4>
                        <div class="content">
                            <ul class="comments">
                              <?php
                              if(!empty($detail_comment)){
                                foreach($detail_comment as $det_comm){
                              ?>
                                <li>
                                    <div class="avatar"><img src="<?php echo base_url('assets/img/avatars/original.jpg'); ?>" alt="<?php echo $det_comm->fullname; ?>"></div>
                                    <div class="content">
                                        <span class="details"><?php echo $det_comm->fullname; ?> on <?php echo date('j M Y', strtotime($det_comm->created_date)); ?></span>
                                        <p><?php echo $det_comm->comment; ?></p>
                                    </div>
                                </li>
                              <?php } }else{ echo ''; } ?>
                            </ul>
                        </div>
                    </div>
                    <hr>
                    <div class="post-add-comment post-module">
                        <h4><i class="ti ti-pencil mr-3 text-primary"></i>Write a comment</h4>
                        <div class="content">
                            <form action="<?php echo base_url('blog/detail/'.strtolower($det->title)); ?>" method="post" id="add-comment" class="validate-form">
                                <div class="row gutters-sm">
                                    <div class="col-md-6 form-group">
                                        <input type="text" class="form-control" placeholder="Full Name" name="fullname">
                                        <span class="text-danger" style="color: red;"><?php echo form_error('fullname'); ?></span>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <input type="email" class="form-control" placeholder="E-mail" name="email">
                                        <span class="text-danger" style="color: red;"><?php echo form_error('email'); ?></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <textarea id="comment" cols="30" rows="4" class="form-control" placeholder="Comment" name="comment"></textarea>
                                </div>
                                <div class="text-center">
                                    <button type="submit" name="commentBtn" class="btn btn-primary"><span>Send a comment</span></button>
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
        </article>

    </div>
    <!-- Content / End -->

</body>
</html>
