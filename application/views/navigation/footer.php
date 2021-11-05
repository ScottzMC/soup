<!-- Panel Cart -->
<div id="panel-cart">
    <div class="panel-cart-container">
        <div class="panel-cart-title">
            <h5 class="title">Your Cart</h5>
            <button class="close" data-toggle="panel-cart"><i class="ti ti-close"></i></button>
        </div>
        <div>
         
        <?php if($this->cart->contents()){ ?> 
        <div class="panel-cart-content">
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
                        <a href="<?php echo base_url('shopping/remove/'.$item['rowid']); ?>" class="action-icon"><i class="ti ti-close"></i></a>  
                        <span class="name"><a href="#productModal" data-toggle="modal"><?php echo $item['name']; ?></a></span>
                        <span class="caption text-muted"><?php echo $item['type']; ?></span>
                    </td>
                    <td class="price">&#8358; <?php echo number_format($item['price']); ?></td>  
                    <td class="actions" style="width: 10px;" width="10px;">
                        <a href="#" style="width: 10px;">
                            <?php echo form_input('cart['. $item['id'] .'][qty]', $item['qty']); ?>
                        </a>
                    </td>
                </tr>
                
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
                <div class="row text-lg">
                    <div class="col-7 text-right text-muted">Total:</div>
                    <div class="col-5"><strong>&#8358; <?php echo number_format($this->cart->total() + 500); ?></strong></div>
                </div>
            </div>
        </div>
        <?php } else{ ?>
            <div><?php echo $message; ?></div>
        <?php } ?> 
      </div>
   </div>
    <a href="<?php echo site_url('shopping/checkout'); ?>" class="panel-cart-action btn btn-secondary btn-block btn-lg"><span>Go to checkout</span></a>
</div>

<!-- Panel Mobile -->
<nav id="panel-mobile">
    <div class="module module-logo bg-dark dark">
        <a href="#">
            <img src="<?php echo base_url('assets/img/logo-light.svg'); ?>" alt="Logo" width="88">
        </a>
        <button class="close" data-toggle="panel-mobile"><i class="ti ti-close"></i></button>
    </div>
    <nav class="module module-navigation"></nav>
    <div class="module module-social">
        <h6 class="text-sm mb-3">Follow Us!</h6>
        <a href="#" class="icon icon-social icon-circle icon-sm icon-facebook"><i class="fa fa-facebook"></i></a>
        <a href="#" class="icon icon-social icon-circle icon-sm icon-google"><i class="fa fa-google"></i></a>
        <a href="#" class="icon icon-social icon-circle icon-sm icon-twitter"><i class="fa fa-twitter"></i></a>
        <a href="#" class="icon icon-social icon-circle icon-sm icon-youtube"><i class="fa fa-youtube"></i></a>
        <a href="#" class="icon icon-social icon-circle icon-sm icon-instagram"><i class="fa fa-instagram"></i></a>
    </div>
</nav>

<!-- Body Overlay -->
<div id="body-overlay"></div>

<!-- Footer -->
     <footer id="footer" class="bg-dark dark">

         <div class="container">
             <!-- Footer 1st Row -->
             <div class="footer-first-row row">
                 <div class="col-lg-3 text-center">
                    <h5>Navigation</h5>
                    <ul class="list-posts">
                      <li>
                        <a href="<?php echo site_url('home/about'); ?>" class="title">About</a>
                        <a href="<?php echo site_url('home/contact'); ?>" class="title">Contact</a>
                        <a href="<?php echo site_url('home/faq'); ?>" class="title">Faq</a>
                      </li>
                    </ul>
                 </div>
                 <div class="col-lg-4 col-md-6">
                     <h5 class="text-muted">Latest news</h5>
                     <ul class="list-posts">
                         <li>
                             <a href="#" class="title">How to create effective webdeisign?</a>
                             <span class="date">February 14, 2015</span>
                         </li>
                     </ul>
                 </div>
                 <div class="col-lg-5 col-md-6">
                     <h5 class="text-muted">Subscribe Us!</h5>
                     <!-- MailChimp Form -->
                     <form action="//suelo.us12.list-manage.com/subscribe/post-json?u=ed47dbfe167d906f2bc46a01b&amp;id=24ac8a22ad" id="sign-up-form" class="sign-up-form validate-form mb-3" method="POST">
                         <div class="input-group">
                             <input name="EMAIL" id="mce-EMAIL" type="email" class="form-control" placeholder="Tap your e-mail..." required>
                             <span class="input-group-btn">
                                 <button class="btn btn-primary btn-submit" type="submit">
                                     <span class="description">Subscribe</span>
                                     <span class="success">
                                         <svg x="0px" y="0px" viewBox="0 0 32 32"><path stroke-dasharray="19.79 19.79" stroke-dashoffset="19.79" fill="none" stroke="#FFFFFF" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" d="M9,17l3.9,3.9c0.1,0.1,0.2,0.1,0.3,0L23,11"/></svg>
                                     </span>
                                     <span class="error">Try again...</span>
                                 </button>
                             </span>
                         </div>
                     </form>
                     <h5 class="text-muted mb-3">Social Media</h5>
                     <a href="#" class="icon icon-social icon-circle icon-sm icon-facebook"><i class="fa fa-facebook"></i></a>
                     <a href="#" class="icon icon-social icon-circle icon-sm icon-google"><i class="fa fa-google"></i></a>
                     <a href="#" class="icon icon-social icon-circle icon-sm icon-twitter"><i class="fa fa-twitter"></i></a>
                     <a href="#" class="icon icon-social icon-circle icon-sm icon-youtube"><i class="fa fa-youtube"></i></a>
                     <a href="#" class="icon icon-social icon-circle icon-sm icon-instagram"><i class="fa fa-instagram"></i></a>
                 </div>
             </div>
             <!-- Footer 2nd Row -->
             <div class="footer-second-row">
                 <span class="text-muted">Copyright Soup 2018©. Made with love by Suelo.</span>
             </div>
         </div>

         <!-- Back To Top -->
         <a href="#" id="back-to-top"><i class="ti ti-angle-up"></i></a>

     </footer>
     <!-- Footer / End -->


<!-- JS Plugins -->
<script src="<?php echo base_url('assets/plugins/jquery/dist/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/tether/dist/js/tether.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/slick-carousel/slick/slick.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/jquery.appear/jquery.appear.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/jquery.scrollto/jquery.scrollTo.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/jquery.localscroll/jquery.localScroll.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/jquery-validation/dist/jquery.validate.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/jquery.mb.ytplayer/dist/jquery.mb.YTPlayer.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/twitter-fetcher/js/twitterFetcher_min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/skrollr/dist/skrollr.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/animsition/dist/js/animsition.min.js'); ?>"></script>

<!-- JS Core -->
<script src="<?php echo base_url('assets/js/core.js'); ?>"></script>
