<!DOCTYPE html>
<html lang="en">
<head>

<!-- Meta -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />

<!-- Title -->
<title>Soup || Checkout your Orders</title>

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
                        <h1 class="mb-0">Checkout</h1>
                        <h4 class="text-muted mb-0">Some informations about our restaurant</h4>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section -->
        <section class="section bg-light">

            <div class="container">
              <form action="<?php echo base_url('shopping/checkout'); ?>" method="post">
                <div class="row">
                    <div class="col-xl-4 push-xl-8 col-lg-5 push-lg-7">
                        <?php if($this->cart->contents()){ ?> 
                        <div class="shadow bg-white stick-to-content mb-4">
                            <div class="bg-dark dark p-4"><h5 class="mb-0">You order</h5></div>
                            <table class="table-cart">
                                <div><?php echo $message; ?></div>
                                <?php if ($cart = $this->cart->contents()): ?>
                                <?php $grand_total = 0; $i = 1; ?>
                                <?php foreach($cart as $item): ?>
                                <?php echo form_open('shopping/update_cart'); ?>
                                <?php
                                  echo form_hidden('cart['. $item['id'] .'][id]', $item['id']);
                                  echo form_hidden('cart['. $item['id'] .'][rowid]', $item['rowid']);
                                  echo form_hidden('cart['. $item['id'] .'][price]', $item['price']);
                                  echo form_hidden('cart['. $item['id'] .'][qty]', $item['qty']);
                                ?>  
                                <tr>
                                    <td class="title">
                                        <span class="name"><a href="#productModal" data-toggle="modal"><?php echo $item['name']; ?></a></span>
                                        <span class="caption text-muted"><?php echo $item['type']; ?></span>
                                    </td>
                                    <td class="price">&#8358; <?php echo number_format($item['price']); ?></td>
                                    <td class="actions">
                                        <a href="#productModal" data-toggle="modal" class="action-icon"><i class="ti ti-pencil"></i></a>
                                        <a href="<?php echo base_url('shopping/remove/'.$item['rowid']); ?>" class="action-icon"><i class="ti ti-close"></i></a>
                                    </td>
                                </tr>
                                                
                                <!--<tr>
                                    <td class="title">
                                        <span class="name">Weekend 20% OFF</span>
                                    </td>
                                    <td class="price text-success">-$8.22</td>
                                    <td class="actions"></td>
                                </tr> -->
                                <?php echo form_close(); ?>
                                <?php endforeach; ?>
                                <?php endif; ?>
                            </table>
                            <div class="cart-summary">
                                <div class="row">
                                    <div class="col-7 text-right text-muted">Order total:</div>
                                    <div class="col-5"><strong>&#8358; <?php echo number_format($this->cart->total()); ?></strong></div>
                                </div>
                                <div class="row">
                                    <div class="col-7 text-right text-muted">Devliery:</div>
                                    <div class="col-5"><strong>&#8358; 500</strong></div>
                                </div>
                                <hr class="hr-sm">
                                <div class="row text-md">
                                    <div class="col-7 text-right text-muted">Total:</div>
                                    <div class="col-5"><strong>&#8358; <?php echo number_format($this->cart->total() + 500); ?></strong></div>
                                </div>
                            </div>
                        </div>
                        <?php } else{ ?>
                        <div><?php echo $message; ?></div>
                    <?php } ?> 
                    </div>

                    <?php if(!empty($checkout_details)){ foreach($checkout_details as $check_det){} ?>
                    <div class="col-xl-8 pull-xl-4 col-lg-7 pull-lg-5">
                        <div class="bg-white p-4 p-md-5 mb-4">
                            <h4 class="border-bottom pb-4"><i class="ti ti-user mr-3 text-primary"></i>Basic informations</h4>
                            <div class="row mb-5">
                                <div class="form-group col-sm-6">
                                    <label>First Name:</label>
                                    <input type="text" name="firstname" value="<?php echo $check_det->firstname; ?>" class="form-control">
                                    <span class="text-danger" style="color: red;"><?php echo form_error('firstname'); ?></span>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label>Sur Name:</label>
                                    <input type="text" name="surname" value="<?php echo $check_det->surname; ?>" class="form-control">
                                    <span class="text-danger" style="color: red;"><?php echo form_error('surname'); ?></span>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label>Delivery Address:</label>
                                    <input type="text" name="address" value="<?php echo $check_det->address; ?>" class="form-control">
                                    <span class="text-danger" style="color: red;"><?php echo form_error('address'); ?></span>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label>City:</label>
                                    <input type="text" name="city" value="<?php echo $check_det->state; ?>" class="form-control">
                                    <span class="text-danger" style="color: red;"><?php echo form_error('city'); ?></span>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label>Phone number:</label>
                                    <input type="text" name="telephone" value="<?php echo $check_det->telephone; ?>" class="form-control">
                                    <span class="text-danger" style="color: red;"><?php echo form_error('telephone'); ?></span>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label>E-mail address:</label>
                                    <input type="email" name="email" value="<?php echo $this->session->userdata('uemail'); ?>" class="form-control">
                                    <span class="text-danger" style="color: red;"><?php echo form_error('email'); ?></span>
                                </div>
                            </div>

                            <h4 class="border-bottom pb-4"><i class="ti ti-package mr-3 text-primary"></i>Delivery</h4>
                            <div class="row mb-5">
                                <div class="form-group col-sm-6">
                                    <label>Delivery time:</label>
                                    <div class="select-container">
                                        <select name="delivery_time" class="form-control">
                                            <option value="As Fast As Possible">As fast as possible</option>
                                            <option value="1 Hour">In one hour</option>
                                            <option value="2 Hours">In two hours</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <h4 class="border-bottom pb-4"><i class="ti ti-wallet mr-3 text-primary"></i>Payment</h4>
                            <div class="row text-lg">
                                <div class="col-md-4 col-sm-6 form-group">
                                    <label class="custom-control custom-radio">
                                        <input type="radio" name="payment_type" value="PayPal" class="custom-control-input">
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">PayPal</span>
                                    </label>
                                </div>
                                <div class="col-md-4 col-sm-6 form-group">
                                    <label class="custom-control custom-radio">
                                        <input type="radio" name="payment_type" value="Credit Card" class="custom-control-input">
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">Credit Card</span>
                                    </label>
                                </div>
                                <div class="col-md-4 col-sm-6 form-group">
                                    <label class="custom-control custom-radio">
                                        <input type="radio" name="payment_type" value="Cash" class="custom-control-input">
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">Cash</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" name="orderBtn" class="btn btn-primary btn-lg"><span>Order now!</span></button>
                        </div>
                    </div>
                <?php }else{ echo '<p><div class="alert alert-danger" role="alert">Please Create an Account or Login to make an Order</div></p>'; } ?>
                </div>
              </form>
            </div>

        </section>

    </div>
    <!-- Content / End -->

</body>

</html>
