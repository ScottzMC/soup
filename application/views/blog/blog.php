<!DOCTYPE html>
<html lang="en">
<head>

<!-- Meta -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />

<!-- Title -->
<title>Soup || Latest News and Post about Food Culture</title>

</head>

<body>
    <!-- Content -->
    <div id="content">

        <!-- Page Title -->
        <div class="page-title bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 push-lg-4">
                        <h1 class="mb-0">Blog</h1>
                        <h4 class="text-muted mb-0">Some informations about our restaurant</h4>
                    </div>
                </div>
            </div>
        </div>

        <!-- Page Content -->
        <div class="page-content bg-light">

            <div class="container clearfix">
                <div class="main left">
                    <!-- Post / Item -->
                <?php
                 if(!empty($blog_post)){
                  foreach($blog_post as $blogpt){ ?>
                    <article class="post post-wide animated" data-animation="fadeIn">
                        <div class="post-image"><img height="250" width="250" src="<?php echo base_url('uploads/blog/'.$blogpt->image); ?>" alt="<?php echo $blogpt->title; ?>"></div>
                        <div class="post-content">
                            <ul class="post-meta">
                                <li><?php echo date('j M Y', strtotime($blogpt->created_date)); ?></li>
                                <li>by Admin</li>
                            </ul>
                            <h4><a href="<?php echo site_url('blog/detail/'.strtolower($blogpt->title)); ?>"><?php echo str_replace('-', ' ', $blogpt->title); ?></a></h4>
                            <p><?php echo character_limiter($blogpt->body, 100); ?></p>
                        </div>
                    </article>
                  <?php } ?>

                    <!-- Pagination -->
                    <nav aria-label="Page navigation" class="mt-5">
                      <?php echo $page_links; ?>
                        <!--<ul class="pagination justify-content-center">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <i class="ti-arrow-left"></i>
                                    <span class="sr-only">Previous</span>
                              </a>
                            </li>
                            <li class="page-item"><a class="page-link active" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <i class="ti-arrow-right"></i>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>-->
                    </nav>
                  <?php }else{ echo ''; } ?>
                </div>

            </div>

        </div>


    </div>
    <!-- Content / End -->

</body>
</html>
