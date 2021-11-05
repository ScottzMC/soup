<!DOCTYPE html>
<html lang="en">
<head>

<!-- Meta -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />

<!-- Title -->
<title>Soup || All Menu Items and Food</title>

</head>

<body>

    <!-- Content -->
    <div id="content">

        <!-- Page Title -->
        <div class="page-title bg-dark dark">
            <!-- BG Image -->
            <div class="bg-image bg-parallax"><img src="<?php echo base_url('assets/img/photos/bg-croissant.jpg'); ?>" alt="Croissant"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 push-lg-4">
                        <h1 class="mb-0">Our Menu</h1>
                        <h4 class="text-muted mb-0">Eat healthy, Live more</h4>
                    </div>
                </div>
            </div>
        </div>

        <!-- Page Content -->
        <div class="page-content">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-md-3">
                        <!-- Menu Navigation -->
                        <nav id="menu-navigation" class="stick-to-content" data-local-scroll>
                            <ul class="nav nav-menu bg-dark dark">
                              <?php foreach($menu_link_type as $menu_link){ ?>
                                <li><a href="<?php echo site_url('menu/type/'.strtolower($menu_link->type)); ?>"><?php echo $menu_link->type; ?></a></li>
                              <?php } ?>
                            </ul>
                              <label>Sort:</label>
                                    <div class="select-container">
                                        <select class="form-control">
                                            <option>As fast as possible</option>
                                            <option>In one hour</option>
                                            <option>In two hours</option>
                                        </select>
                                    </div>
                        </nav>
                    <!-- Sort -->

                    </div>
                    <div class="col-md-9">
                        <!-- Menu Category / Burgers -->

                        <!-- Burgers -->
                        <div id="Burgers" class="menu-category">
                          <?php
                          if("Burgers"){
                          $sql = $this->db->query("SELECT * FROM menu_food_type WHERE type = 'Burgers' ")->result();
                          foreach($sql as $menu_sql){ ?>
                            <div class="menu-category-title">
                                <div class="bg-image"><img src="<?php echo base_url('uploads/menu/type/'.$menu_sql->banner); ?>" alt="<?php echo $menu_sql->type; ?>"></div>
                                <h2 class="title"><?php echo $menu_sql->type; ?></h2>
                            </div>
                          <?php } ?>

                          <?php
                          $query = $this->db->query("SELECT * FROM menu_food WHERE type = 'Burgers' ORDER BY created_date DESC LIMIT 6 ")->result();
                          if(!empty($query)){ ?>
                            <div class="menu-category-content padded">
                                <div class="row gutters-sm">
                                  <?php
                                  foreach($query as $menu_qry){ ?>
                                    <div class="col-lg-4 col-6">
                                        <!-- Menu Item -->
                                        <div class="menu-item menu-grid-item">
                                            <img class="mb-4" src="<?php echo base_url('uploads/menu/foods/'.$menu_qry->image); ?>" alt="<?php echo $menu_qry->title; ?>">
                                            <h6 class="mb-0"><?php echo $menu_qry->title; ?></h6>
                                            <span class="text-muted text-sm"><?php echo $menu_qry->type; ?></span>
                                            <div class="row align-items-center mt-4">
                                                <div class="col-sm-6"><span class="text-md mr-4">&#8358; <?php echo number_format($menu_qry->price); ?></span></div>
                                                <div class="col-sm-6 text-sm-right mt-2 mt-sm-0">
                                                  <form action="<?php echo base_url('shopping/add'); ?>" method="POST">
                                                    <input type="hidden" name="id" value="<?php echo $menu_qry->id; ?>">
                                                    <input type="hidden" name="title" value="<?php echo $menu_qry->title?>">
                                                    <input type="hidden" name="type" value="<?php echo $menu_qry->type; ?>">
                                                    <input type="hidden" name="price" value="<?php echo $menu_qry->price; ?>">
                                                   <button type="submit" class="btn btn-outline-secondary btn-sm" data-target="#productModal" data-toggle="modal">
                                                    <span>Add to cart</span>
                                                   </button>
                                                  </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                  <?php }  ?>
                                </div>
                            </div>
                          <?php } ?>
                        </div>
                      <?php }else{ echo ''; } ?>
                      <!-- End of Burgers -->

                      <!-- Desserts -->
                      <div id="Desserts" class="menu-category">
                        <?php
                        if("Desserts"){
                        $sql = $this->db->query("SELECT * FROM menu_food_type WHERE type = 'Desserts' ")->result();
                        foreach($sql as $menu_sql){ ?>
                          <div class="menu-category-title">
                              <div class="bg-image"><img src="<?php echo base_url('uploads/menu/type/'.$menu_sql->banner); ?>" alt="<?php echo $menu_sql->type; ?>"></div>
                              <h2 class="title"><?php echo $menu_sql->type; ?></h2>
                          </div>
                        <?php } ?>

                        <?php
                        $query = $this->db->query("SELECT * FROM menu_food WHERE type = 'Desserts' ORDER BY created_date DESC LIMIT 6 ")->result();
                        if(!empty($query)){ ?>
                          <div class="menu-category-content padded">
                              <div class="row gutters-sm">
                                <?php
                                foreach($query as $menu_qry){ ?>
                                  <div class="col-lg-4 col-6">
                                      <!-- Menu Item -->
                                      <div class="menu-item menu-grid-item">
                                          <img class="mb-4" src="<?php echo base_url('uploads/menu/foods/'.$menu_qry->image); ?>" alt="<?php echo $menu_qry->title; ?>">
                                          <h6 class="mb-0"><?php echo $menu_qry->title; ?></h6>
                                          <span class="text-muted text-sm"><?php echo $menu_qry->type; ?></span>
                                          <div class="row align-items-center mt-4">
                                              <div class="col-sm-6"><span class="text-md mr-4">&#8358; <?php echo number_format($menu_qry->price); ?></span></div>
                                              <div class="col-sm-6 text-sm-right mt-2 mt-sm-0">
                                                <button class="btn btn-outline-secondary btn-sm" data-target="#productModal" data-toggle="modal">
                                                  <span>Add to cart</span>
                                                </button>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                <?php }  ?>
                              </div>
                          </div>
                        <?php } ?>
                      </div>
                    <?php }else{ echo ''; } ?>
                    <!-- End of Desserts -->

                    <!-- Drinks -->
                    <div id="Drinks" class="menu-category">
                      <?php
                      if("Drinks"){
                      $sql = $this->db->query("SELECT * FROM menu_food_type WHERE type = 'Drinks' ")->result();
                      foreach($sql as $menu_sql){ ?>
                        <div class="menu-category-title">
                            <div class="bg-image"><img src="<?php echo base_url('uploads/menu/type/'.$menu_sql->banner); ?>" alt="<?php echo $menu_sql->type; ?>"></div>
                            <h2 class="title"><?php echo $menu_sql->type; ?></h2>
                        </div>
                      <?php } ?>

                      <?php
                      $query = $this->db->query("SELECT * FROM menu_food WHERE type = 'Drinks' ORDER BY created_date DESC LIMIT 6 ")->result();
                      if(!empty($query)){ ?>
                        <div class="menu-category-content padded">
                            <div class="row gutters-sm">
                              <?php
                              foreach($query as $menu_qry){ ?>
                                <div class="col-lg-4 col-6">
                                    <!-- Menu Item -->
                                    <div class="menu-item menu-grid-item">
                                        <img class="mb-4" src="<?php echo base_url('uploads/menu/foods/'.$menu_qry->image); ?>" alt="<?php echo $menu_qry->title; ?>">
                                        <h6 class="mb-0"><?php echo $menu_qry->title; ?></h6>
                                        <span class="text-muted text-sm"><?php echo $menu_qry->type; ?></span>
                                        <div class="row align-items-center mt-4">
                                            <div class="col-sm-6"><span class="text-md mr-4">&#8358; <?php echo number_format($menu_qry->price); ?></span></div>
                                            <div class="col-sm-6 text-sm-right mt-2 mt-sm-0">
                                              <button class="btn btn-outline-secondary btn-sm" data-target="#productModal" data-toggle="modal">
                                                <span>Add to cart</span>
                                              </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              <?php }  ?>
                            </div>
                        </div>
                      <?php } ?>
                    </div>
                  <?php }else{ echo ''; } ?>
                  <!-- End of Drinks -->

                  <!-- Pasta -->
                  <div id="Pasta" class="menu-category">
                    <?php
                    if("Pasta"){
                    $sql = $this->db->query("SELECT * FROM menu_food_type WHERE type = 'Pasta' ")->result();
                    foreach($sql as $menu_sql){ ?>
                      <div class="menu-category-title">
                          <div class="bg-image"><img src="<?php echo base_url('uploads/menu/type/'.$menu_sql->banner); ?>" alt="<?php echo $menu_sql->type; ?>"></div>
                          <h2 class="title"><?php echo $menu_sql->type; ?></h2>
                      </div>
                    <?php } ?>

                    <?php
                    $query = $this->db->query("SELECT * FROM menu_food WHERE type = 'Pasta' ORDER BY created_date DESC LIMIT 6 ")->result();
                    if(!empty($query)){ ?>
                      <div class="menu-category-content padded">
                          <div class="row gutters-sm">
                            <?php
                            foreach($query as $menu_qry){ ?>
                              <div class="col-lg-4 col-6">
                                  <!-- Menu Item -->
                                  <div class="menu-item menu-grid-item">
                                      <img class="mb-4" src="<?php echo base_url('uploads/menu/foods/'.$menu_qry->image); ?>" alt="<?php echo $menu_qry->title; ?>">
                                      <h6 class="mb-0"><?php echo $menu_qry->title; ?></h6>
                                      <span class="text-muted text-sm"><?php echo $menu_qry->type; ?></span>
                                      <div class="row align-items-center mt-4">
                                          <div class="col-sm-6"><span class="text-md mr-4">&#8358; <?php echo number_format($menu_qry->price); ?></span></div>
                                          <div class="col-sm-6 text-sm-right mt-2 mt-sm-0">
                                            <button class="btn btn-outline-secondary btn-sm" data-target="#productModal" data-toggle="modal">
                                              <span>Add to cart</span>
                                            </button>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                            <?php }  ?>
                          </div>
                      </div>
                    <?php } ?>
                  </div>
                <?php }else{ echo ''; } ?>
                <!-- End of Pasta -->

                <!-- Pizza -->
                <div id="Pizza" class="menu-category">
                  <?php
                  if("Pizza"){
                  $sql = $this->db->query("SELECT * FROM menu_food_type WHERE type = 'Pizza' ")->result();
                  foreach($sql as $menu_sql){ ?>
                    <div class="menu-category-title">
                        <div class="bg-image"><img src="<?php echo base_url('uploads/menu/type/'.$menu_sql->banner); ?>" alt="<?php echo $menu_sql->type; ?>"></div>
                        <h2 class="title"><?php echo $menu_sql->type; ?></h2>
                    </div>
                  <?php } ?>

                  <?php
                  $query = $this->db->query("SELECT * FROM menu_food WHERE type = 'Pizza' ORDER BY created_date DESC LIMIT 6 ")->result();
                  if(!empty($query)){ ?>
                    <div class="menu-category-content padded">
                        <div class="row gutters-sm">
                          <?php
                          foreach($query as $menu_qry){ ?>
                            <div class="col-lg-4 col-6">
                                <!-- Menu Item -->
                                <div class="menu-item menu-grid-item">
                                    <img class="mb-4" src="<?php echo base_url('uploads/menu/foods/'.$menu_qry->image); ?>" alt="<?php echo $menu_qry->title; ?>">
                                    <h6 class="mb-0"><?php echo $menu_qry->title; ?></h6>
                                    <span class="text-muted text-sm"><?php echo $menu_qry->type; ?></span>
                                    <div class="row align-items-center mt-4">
                                        <div class="col-sm-6"><span class="text-md mr-4">&#8358; <?php echo number_format($menu_qry->price); ?></span></div>
                                        <div class="col-sm-6 text-sm-right mt-2 mt-sm-0">
                                          <button class="btn btn-outline-secondary btn-sm" data-target="#productModal" data-toggle="modal">
                                            <span>Add to cart</span>
                                          </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          <?php }  ?>
                        </div>
                    </div>
                  <?php } ?>
                </div>
              <?php }else{ echo ''; } ?>
              <!-- End of Pizza -->

              <!-- Sushi -->
              <div id="Sushi" class="menu-category">
                <?php
                if("Sushi"){
                $sql = $this->db->query("SELECT * FROM menu_food_type WHERE type = 'Sushi' ")->result();
                foreach($sql as $menu_sql){ ?>
                  <div class="menu-category-title">
                      <div class="bg-image"><img src="<?php echo base_url('uploads/menu/type/'.$menu_sql->banner); ?>" alt="<?php echo $menu_sql->type; ?>"></div>
                      <h2 class="title"><?php echo $menu_sql->type; ?></h2>
                  </div>
                <?php } ?>

                <?php
                $query = $this->db->query("SELECT * FROM menu_food WHERE type = 'Sushi' ORDER BY created_date DESC LIMIT 6 ")->result();
                if(!empty($query)){ ?>
                  <div class="menu-category-content padded">
                      <div class="row gutters-sm">
                        <?php
                        foreach($query as $menu_qry){ ?>
                          <div class="col-lg-4 col-6">
                              <!-- Menu Item -->
                              <div class="menu-item menu-grid-item">
                                  <img class="mb-4" src="<?php echo base_url('uploads/menu/foods/'.$menu_qry->image); ?>" alt="<?php echo $menu_qry->title; ?>">
                                  <h6 class="mb-0"><?php echo $menu_qry->title; ?></h6>
                                  <span class="text-muted text-sm"><?php echo $menu_qry->type; ?></span>
                                  <div class="row align-items-center mt-4">
                                      <div class="col-sm-6"><span class="text-md mr-4">&#8358; <?php echo number_format($menu_qry->price); ?></span></div>
                                      <div class="col-sm-6 text-sm-right mt-2 mt-sm-0">
                                        <button class="btn btn-outline-secondary btn-sm" data-target="#productModal" data-toggle="modal">
                                          <span>Add to cart</span>
                                        </button>
                                      </div>
                                  </div>
                              </div>
                          </div>
                        <?php }  ?>
                      </div>
                  </div>
                <?php } ?>
              </div>
            <?php }else{ echo ''; } ?>
            <!-- End of Sushi -->

                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Content / End -->

</body>
</html>
