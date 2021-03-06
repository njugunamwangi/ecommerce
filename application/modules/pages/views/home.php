<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.2.0
Version: 3.4
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest (the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<!-- Head BEGIN -->
<head>
  <meta charset="utf-8">
  <title><?php echo $name_of_store?></title>

  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <meta content="Metronic Shop UI description" name="description">
  <meta content="Metronic Shop UI keywords" name="keywords">
  <meta content="keenthemes" name="author">

  <meta property="og:site_name" content="-CUSTOMER VALUE-">
  <meta property="og:title" content="-CUSTOMER VALUE-">
  <meta property="og:description" content="-CUSTOMER VALUE-">
  <meta property="og:type" content="website">
  <meta property="og:image" content="-CUSTOMER VALUE-"><!-- link to image for socio -->
  <meta property="og:url" content="-CUSTOMER VALUE-">

  <link rel="shortcut icon" href="favicon.ico">

  <!-- Fonts START -->
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|PT+Sans+Narrow|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css"><!--- fonts for slider on the index page -->  
  <!-- Fonts END -->

  <!-- Global styles START -->          
  <link href="<?php echo base_url()?>public/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo base_url()?>public/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Global styles END --> 
   
  <!-- Page level plugin styles START -->
  <link href="<?php echo base_url()?>public/assets/global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet">
  <link href="<?php echo base_url()?>public/assets/global/plugins/carousel-owl-carousel/owl-carousel/owl.carousel.css" rel="stylesheet">
  <link href="<?php echo base_url()?>public/assets/global/plugins/slider-layer-slider/css/layerslider.css" rel="stylesheet">
  <!-- Page level plugin styles END -->

  <!-- Theme styles START -->
  <link href="<?php echo base_url()?>public/assets/global/css/components.css" rel="stylesheet">
  <link href="<?php echo base_url()?>public/assets/frontend/layout/css/style.css" rel="stylesheet">
  <link href="<?php echo base_url()?>public/assets/frontend/pages/css/style-shop.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url()?>public/assets/frontend/pages/css/style-layer-slider.css" rel="stylesheet">
  <link href="<?php echo base_url()?>public/assets/frontend/layout/css/style-responsive.css" rel="stylesheet">
  <link href="<?php echo base_url()?>public/assets/frontend/layout/css/themes/red.css" rel="stylesheet" id="style-color">
  <link href="<?php echo base_url()?>public/assets/frontend/layout/css/custom.css" rel="stylesheet">
  <!-- Theme styles END -->

</head>
<!-- Head END -->

<!-- Body BEGIN -->
<body class="corporate">
    <!-- BEGIN STYLE CUSTOMIZER -->
    <!-- <div class="color-panel hidden-sm">
      <div class="color-mode-icons icon-color"></div>
      <div class="color-mode-icons icon-color-close"></div>
      <div class="color-mode">
        <p>THEME COLOR</p>
        <ul class="inline">
          <li class="color-red current color-default" data-style="red"></li>
          <li class="color-blue" data-style="blue"></li>
          <li class="color-green" data-style="green"></li>
          <li class="color-orange" data-style="orange"></li>
          <li class="color-gray" data-style="gray"></li>
          <li class="color-turquoise" data-style="turquoise"></li>
        </ul>
      </div>
    </div> -->
    <!-- END BEGIN STYLE CUSTOMIZER --> 

    <!-- BEGIN TOP BAR -->
    <div class="pre-header">
        <div class="container">
            <div class="row">
                <!-- BEGIN TOP BAR LEFT PART -->
                <div class="col-md-6 col-sm-6 additional-shop-info">
                    <ul class="list-unstyled list-inline">
                        <li><i class="fa fa-phone"></i><span><?php echo $store_phone_number?></span></li>
                        <!-- BEGIN CURRENCIES -->
                        <li class="shop-currencies">
                            <a href="javascript:void(0);" class="current"><?php echo $store_currency?></a>
                        </li>
                        <!-- END CURRENCIES -->
                        <li><a href="mailto:<?php echo $store_email?>"><i class="fa fa-envelope-o"></i><span><?php echo $store_email?></span></a></li>
                    </ul>
                </div>
                <!-- END TOP BAR LEFT PART -->
                <!-- BEGIN TOP BAR MENU -->
                <div class="col-md-6 col-sm-6 additional-nav">
                    <ul class="list-unstyled list-inline pull-right">
                      <?php
                        if (!$this->ion_auth->logged_in()) {
                          ?>
                            <li><a href="<?php echo base_url();?>checkout">Checkout</a></li>
                            <li><a href="<?php echo base_url();?>login">Log In</a></li>
                            <li><a href="<?php echo base_url();?>register">Register</a></li>
                          <?php
                        } else {
                          ?>
                            <?php
                                $this->db->where('customer_id', $user_account->id);
                                $my_wishlist = $this->db->get('wishlist')->num_rows();
                            ?>
                            <li><a href="<?php echo base_url();?>my-account/wishlist">My Wishlist (<?php echo $my_wishlist?>)</a></li>
                            <?php
                                $this->db->where('customer_id', $user_account->id);
                                $my_orders = $this->db->get('orders')->num_rows();
                            ?>
                            <li><a href="<?php echo base_url();?>my-account/orders">My Orders (<?php echo $my_orders?>)</a></li>
                            <li><a href="<?php echo base_url();?>checkout">Checkout</a></li>
                            <?php
                              if ($this->ion_auth->is_admin()) {
                                ?>
                                <li><a href="<?php echo base_url();?>admin" target="_blank"><?php echo $user_account->first_name?> <?php echo $user_account->last_name?></a></li>
                                <?php
                              } elseif ($this->ion_auth->is_vendor()) {
                                $baseurl = base_url();
                                $baseurlinfo = explode('//', $baseurl, 2);
                                $base = $baseurlinfo[1];
                                ?>
                                <li><a href="<?php echo prep_url($user_account->created_on.'.'.$base.'./vendor')?>" target="_blank"><?php echo $user_account->first_name?> <?php echo $user_account->last_name?></a></li>
                                <?php
                              } else {
                                ?>
                                  <li><a href="<?php echo base_url();?>my-account"><?php echo $user_account->first_name?> <?php echo $user_account->last_name?></a></li>
                                <?php
                              }
                            ?>
                            
                            <li><a href="<?php echo base_url();?>logout">Log Out</a></li>
                          <?php
                        }
                      ?>
                    </ul>
                </div>
                <!-- END TOP BAR MENU -->
            </div>
        </div>        
    </div>
    <!-- END TOP BAR -->

    <!-- BEGIN HEADER -->
    <div class="header">
      <div class="container">
        <!-- <a class="site-logo" href="<?php echo base_url()?>"><img src="<?php echo base_url()?>public/assets/frontend/layout/img/logos/logo-shop-red.png" alt="<?php echo lang('site_title');?>"></a> -->
        <a class="site-logo" style="text-decoration: none;" href="<?php echo base_url()?>" ><h2><strong><?php echo $name_of_store?></strong></h2></a>
        <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i></a>

        <!-- BEGIN CART -->
        <div class="top-cart-block">
          <div class="top-cart-info">
            <a href="javascript:void(0);" class="top-cart-info-count"><?php echo $this->cart->total_items()?> item(s)</a>
            <a href="javascript:void(0);" class="top-cart-info-value"><?php echo $store_currency?> <?php echo number_format($this->cart->total(), 2)?></a>
          </div>
          <i class="fa fa-shopping-cart"></i>
                        
          <div class="top-cart-content-wrapper">
            <div class="top-cart-content">
              <?php
                if (!empty($this->cart->contents())) {
                  ?>
                    <ul class="scroller" style="height: 200px;">
                      <?php foreach($cart_items as $cart_item):?>
                        <li>
                          <a href="<?php echo base_url($cart_item['slug'])?>"><img src="<?php echo base_url()?>public/attachments/products/<?php echo $cart_item['image']?>" alt="<?php echo $cart_item['name']?>" width="37" height="34"></a>
                          <span class="cart-content-count">x <?php echo $cart_item['qty']?></span>
                          <strong><a href="<?php echo $cart_item['slug']?>"><?php echo $cart_item['name']?></a></strong>
                          <em><?php echo $store_currency?> <?php echo number_format($cart_item['price'], 2)?></em>
                          <?php echo anchor('pages/removefromhome/'.$cart_item['rowid'], 'x')?>
                        </li>
                      <?php endforeach?>
                    </ul>
                    <div class="text-right">
                      <a href="<?php echo base_url()?>cart" class="btn btn-default">View Cart</a>
                      <a href="<?php echo base_url()?>pages/clearcart" class="btn btn-danger">Clear Cart</a>
                      <a href="<?php echo base_url()?>checkout" class="btn btn-primary">Checkout</a>
                    </div>
                  <?php
                } else {
                  ?>
                    <ul class="scroller" style="height: 50px;">
                      <p><?php echo $this->lang->line('empty_cart')?></p>
                    </ul>
                  <?php
                }
              ?>
            </div>
          </div>            
        </div>
        <!--END CART -->

        <!-- BEGIN NAVIGATION -->
        <div class="header-navigation">
          <ul>
            <li class="active"><a href="<?php echo base_url();?>">Shop</a></li>
            <li><a href="<?php echo base_url();?>cart">Cart</a></li>
            <li><a href="<?php echo base_url();?>checkout">Checkout</a></li>

            <li><a href="<?php echo base_url();?>my-account">My Account</a></li>

            <!-- BEGIN TOP SEARCH -->
            <li class="menu-search">
              <span class="sep"></span>
              <i class="fa fa-search search-btn"></i>
              <div class="search-box">
                <?php echo form_open('pages/search_product');?>
                  <div class="input-group">
                    <input type="text" placeholder="Search" name="product" class="form-control">
                    <span class="input-group-btn">
                      <button class="btn btn-primary" type="submit">Search</button>
                    </span>
                  </div>
                <?php echo form_close();?>
              </div> 
            </li>
            <!-- END TOP SEARCH -->
          </ul>
        </div>
        <!-- END NAVIGATION -->
      </div>
    </div>
    <!-- Header END -->
    <div class="main">
      <div class="container">
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40 ">
          <!-- BEGIN CONTENT -->
            <div class="row product-list">
              <div class="col-md-12">
                <?php
                  if ($this->session->flashdata('message')) {
                    ?>
                      <div class="alert alert-info">
                        <button type="button" class="close" data-dismiss="alert"></button>
                        <div id="infoMessage"> <?php echo '<strong>Info!</strong>', ' ', $message;?></div>
                      </div>
                    <?php
                  }
                ?>
                <?php
                  if ($this->session->flashdata('error')) {
                    ?>
                      <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert"></button>
                        <div id="infoMessage"> <?php echo '<strong>Info!</strong>', ' ', $error;?></div>
                      </div>
                    <?php
                  }
                ?>
              </div>
              <?php foreach($products as $product) {
                ?>
                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="product-item">
                      <?php echo form_open('pages/add')?>
                        <div class="pi-img-wrapper">
                            <img src="<?php echo base_url()?>public/attachments/products/<?php echo $product->image?>" class="img-responsive" alt="<?php echo $product->name?>">
                            <div>
                                <a href="<?php echo base_url()?>public/attachments/products/<?php echo $product->image?>" class="btn btn-default fancybox-button">Zoom</a>
                                <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                            </div>
                        </div>
                        <h3><a href="<?php echo base_url($product->slug)?>"><?php echo ucwords($product->name)?></a></h3>
                        <?php
                          if ($this->ion_auth->is_wholesaler()) {
                            ?>
                              <div class="pi-price"><?php echo $store_currency?> <?php echo number_format($product->wholesale_price)?></div>
                            <?php
                          } else {
                            ?>
                              <div class="pi-price"><?php echo $store_currency?> <?php echo number_format($product->sale_price)?></div>
                            <?php
                          }
                        ?>
                        <?php echo form_hidden('id', $product->id); ?>
                        <button type="submit" class="btn btn-default add2cart">Add to Cart</button>
                      <?php echo form_close()?>
                      <?php 
                        if ($this->ion_auth->logged_in()) {
                          ?>
                            <?php echo form_open('pages/add_to_wishlist');?>
                              <?php echo form_hidden('product_id', $product->id);?>
                              <?php echo form_hidden('customer_id', $this->ion_auth->user()->row()->id);?>
                              <?php echo form_hidden('wishlist_code', $this->ion_auth->user()->row()->id.$product->id)?>
                              <button type="submit" class="btn btn-default add2cart" title="Add to Wishlist"><i class="fa fa-heart"></i></button>
                            <?php echo form_close();?>
                          <?php
                        }
                      ?>
                    </div> 
                  </div>
                <?php
              }?>
            </div>
          <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->
      </div>
    </div>

    <!-- BEGIN BRANDS -->
    <!-- <div class="brands">
      <div class="container">
            <div class="owl-carousel owl-carousel6-brands">
              <a href="shop-product-list.html"><img src="<?php echo base_url()?>public/assets/frontend/pages/img/brands/canon.jpg" alt="canon" title="canon"></a>
              <a href="shop-product-list.html"><img src="<?php echo base_url()?>public/assets/frontend/pages/img/brands/esprit.jpg" alt="esprit" title="esprit"></a>
              <a href="shop-product-list.html"><img src="<?php echo base_url()?>public/assets/frontend/pages/img/brands/gap.jpg" alt="gap" title="gap"></a>
              <a href="shop-product-list.html"><img src="<?php echo base_url()?>public/assets/frontend/pages/img/brands/next.jpg" alt="next" title="next"></a>
              <a href="shop-product-list.html"><img src="<?php echo base_url()?>public/assets/frontend/pages/img/brands/puma.jpg" alt="puma" title="puma"></a>
              <a href="shop-product-list.html"><img src="<?php echo base_url()?>public/assets/frontend/pages/img/brands/zara.jpg" alt="zara" title="zara"></a>
              <a href="shop-product-list.html"><img src="<?php echo base_url()?>public/assets/frontend/pages/img/brands/canon.jpg" alt="canon" title="canon"></a>
              <a href="shop-product-list.html"><img src="<?php echo base_url()?>public/assets/frontend/pages/img/brands/esprit.jpg" alt="esprit" title="esprit"></a>
              <a href="shop-product-list.html"><img src="<?php echo base_url()?>public/assets/frontend/pages/img/brands/gap.jpg" alt="gap" title="gap"></a>
              <a href="shop-product-list.html"><img src="<?php echo base_url()?>public/assets/frontend/pages/img/brands/next.jpg" alt="next" title="next"></a>
              <a href="shop-product-list.html"><img src="<?php echo base_url()?>public/assets/frontend/pages/img/brands/puma.jpg" alt="puma" title="puma"></a>
              <a href="shop-product-list.html"><img src="<?php echo base_url()?>public/assets/frontend/pages/img/brands/zara.jpg" alt="zara" title="zara"></a>
            </div>
        </div>
    </div> -->
    <!-- END BRANDS -->

    <!-- BEGIN FOOTER -->
    <?php
      if (!empty($products)) {
        ?>
          <div class="pre-footer">
            <div class="container">
              <div class="row">
                <!-- BEGIN BOTTOM ABOUT BLOCK -->
                <div class="col-md-4 col-sm-6 pre-footer-col">
                  <h2>About us</h2>
                  
                </div>
                <!-- END BOTTOM ABOUT BLOCK -->
                <!-- BEGIN BOTTOM INFO BLOCK -->
                <div class="col-md-4 col-sm-6 pre-footer-col">
                  <h2>Information</h2>
                  <!-- <ul class="list-unstyled">
                    <li><i class="fa fa-angle-right"></i> <a href="javascript:;">Delivery Information</a></li>
                    <li><i class="fa fa-angle-right"></i> <a href="javascript:;">Customer Service</a></li>
                    <li><i class="fa fa-angle-right"></i> <a href="javascript:;">Order Tracking</a></li>
                    <li><i class="fa fa-angle-right"></i> <a href="javascript:;">Shipping &amp; Returns</a></li>
                    <li><i class="fa fa-angle-right"></i> <a href="contacts.html">Contact Us</a></li>
                    <li><i class="fa fa-angle-right"></i> <a href="javascript:;">Careers</a></li>
                    <li><i class="fa fa-angle-right"></i> <a href="javascript:;">Payment Methods</a></li>
                  </ul> -->
                </div>
                <!-- END INFO BLOCK -->

                <!-- BEGIN BOTTOM CONTACTS -->
                <div class="col-md-4 col-sm-6 pre-footer-col">
                  <h2>Our Contacts</h2>
                  <address class="margin-bottom-40">
                    <?php echo $store_location?>
                    Phone: <?php echo $store_phone_number?><br><br>
                    Email: <a href="mailto:<?php echo $store_email?>"><?php echo $store_email?></a><br>
                  </address>
                </div>
                <!-- END BOTTOM CONTACTS -->
              </div>
              <hr>
              <div class="row">
                <!-- BEGIN SOCIAL ICONS -->
                <div class="col-md-6 col-sm-6">
                  <!-- <ul class="social-icons">
                    <li><a class="rss" data-original-title="rss" href="javascript:;"></a></li>
                    <li><a class="facebook" data-original-title="facebook" href="javascript:;"></a></li>
                    <li><a class="twitter" data-original-title="twitter" href="javascript:;"></a></li>
                    <li><a class="googleplus" data-original-title="googleplus" href="javascript:;"></a></li>
                    <li><a class="linkedin" data-original-title="linkedin" href="javascript:;"></a></li>
                    <li><a class="youtube" data-original-title="youtube" href="javascript:;"></a></li>
                    <li><a class="vimeo" data-original-title="vimeo" href="javascript:;"></a></li>
                    <li><a class="skype" data-original-title="skype" href="javascript:;"></a></li>
                  </ul> -->
                </div>
                <!-- END SOCIAL ICONS -->
                <!-- BEGIN NEWLETTER -->
                <div class="col-md-6 col-sm-6">
                  <div class="pre-footer-subscribe-box pull-right">
                    <h2>Newsletter</h2>
                    <?php echo form_open('pages/newsletter');?>
                      <div class="input-group">
                        <input type="text" placeholder="youremail@mail.com" class="form-control" name="email" id="email">
                        <span class="input-group-btn">
                          <button class="btn btn-primary" type="submit">Subscribe</button>
                        </span>
                        <div class="caption-subject" style="color: red;">
                          <?php echo form_error('email')?>
                        </div>
                      </div>
                    <?php echo form_close();?>
                  </div> 
                </div>
                <!-- END NEWLETTER -->
              </div>
            </div>
          </div>

          <div class="footer">
            <div class="container">
              <div class="row">
                <!-- BEGIN COPYRIGHT -->
                <div class="col-md-6 col-sm-6 padding-top-10">
                  <?php echo date('Y')?> © <?php echo $name_of_store?> ALL Rights Reserved. 
                </div>
                <!-- <div class="scroll-to-top">
                    <i class="icon-arrow-up"></i>
                </div> -->
                <!-- END COPYRIGHT -->
                <!-- BEGIN PAYMENTS -->
                <div class="col-md-6 col-sm-6">
                  <!-- <ul class="list-unstyled list-inline pull-right">
                    <li><img src="<?php echo base_url()?>public/assets/frontend/layout/img/payments/western-union.jpg" alt="We accept Western Union" title="We accept Western Union"></li>
                    <li><img src="<?php echo base_url()?>public/assets/frontend/layout/img/payments/american-express.jpg" alt="We accept American Express" title="We accept American Express"></li>
                    <li><img src="<?php echo base_url()?>public/assets/frontend/layout/img/payments/MasterCard.jpg" alt="We accept MasterCard" title="We accept MasterCard"></li>
                    <li><img src="<?php echo base_url()?>public/assets/frontend/layout/img/payments/PayPal.jpg" alt="We accept PayPal" title="We accept PayPal"></li>
                    <li><img src="<?php echo base_url()?>public/assets/frontend/layout/img/payments/visa.jpg" alt="We accept Visa" title="We accept Visa"></li>
                  </ul> -->
                </div>
                <!-- END PAYMENTS -->
              </div>
            </div>
          </div>
        <?php
      }
    ?>
    <!-- END FOOTER -->

    <!-- BEGIN fast view of a product -->
    <!-- <div id="product-pop-up" style="display: none; width: 700px;">
      <div class="product-page product-pop-up">
        <div class="row">
          <div class="col-md-6 col-sm-6 col-xs-3">
            <div class="product-main-image">
              <img src="<?php echo base_url()?>public/attachments/products/<?php echo $product->image?>" alt="Cool green dress with red bell" class="img-responsive">
            </div>
            <div class="product-other-images">
              <a href="javascript:;" class="active"><img alt="Berry Lace Dress" src="<?php echo base_url()?>public/assets/frontend/pages/img/products/model3.jpg"></a>
              <a href="javascript:;"><img alt="Berry Lace Dress" src="<?php echo base_url()?>public/assets/frontend/pages/img/products/model4.jpg"></a>
              <a href="javascript:;"><img alt="Berry Lace Dress" src="<?php echo base_url()?>public/assets/frontend/pages/img/products/model5.jpg"></a>
            </div>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-9">
            <h2><?php echo $product->name?></h2>
            <div class="price-availability-block clearfix">
              <div class="price">
                <strong><span>Kes</span> <?php echo $product->sale_price?></strong>
                <em>Kes<span> <?php echo $product->regular_price?></span></em>
              </div>
              <div class="availability">
                Availability: <strong>In Stock</strong>
              </div>
            </div>
            <div class="description">
              <p><?php echo $product->description?>.</p>
            </div>
            <div class="product-page-options">
              <div class="pull-left">
                <label class="control-label">Size:</label>
                <select class="form-control input-sm">
                  <option>L</option>
                  <option>M</option>
                  <option>XL</option>
                </select>
              </div>
              <div class="pull-left">
                <label class="control-label">Color:</label>
                <select class="form-control input-sm">
                  <option>Red</option>
                  <option>Blue</option>
                  <option>Black</option>
                </select>
              </div>
            </div>
            <div class="product-page-cart">
              <div class="product-quantity">
                  <input id="product-quantity" type="text" value="1" readonly name="product-quantity" class="form-control input-sm">
              </div>
              <button class="btn btn-primary" type="submit">Add to cart</button>
              <a href="shop-item.html" class="btn btn-default">More details</a>
            </div>
          </div>

          <div class="sticker sticker-sale"></div>
        </div>
      </div>
    </div> -->
    <!-- END fast view of a product -->

    <!-- Load javascripts at bottom, this will reduce page load time -->
    <!-- BEGIN CORE PLUGINS (REQUIRED FOR ALL PAGES) -->
    <!--[if lt IE 9]>
    <script src="<?php echo base_url()?>public/assets/global/plugins/respond.min.js"></script>  
    <![endif]-->

    <script type="text/javascript" src="<?php echo base_url()?>public/custom/jquery-3.1.0.min.js"></script>
    <script src="<?php echo base_url()?>public/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>public/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>public/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>      
    <script src="<?php echo base_url()?>public/assets/frontend/layout/scripts/back-to-top.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>public/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->

    <!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
    <script src="<?php echo base_url()?>public/assets/global/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script><!-- pop up -->
    <script src="<?php echo base_url()?>public/assets/global/plugins/carousel-owl-carousel/owl-carousel/owl.carousel.min.js" type="text/javascript"></script><!-- slider for products -->
    <script src='<?php echo base_url()?>public/assets/global/plugins/zoom/jquery.zoom.min.js' type="text/javascript"></script><!-- product zoom -->
    <script src="<?php echo base_url()?>public/assets/global/plugins/bootstrap-touchspin/bootstrap.touchspin.js" type="text/javascript"></script><!-- Quantity -->

    <!-- BEGIN LayerSlider -->
    <script src="<?php echo base_url()?>public/assets/global/plugins/slider-layer-slider/js/greensock.js" type="text/javascript"></script><!-- External libraries: GreenSock -->
    <script src="<?php echo base_url()?>public/assets/global/plugins/slider-layer-slider/js/layerslider.transitions.js" type="text/javascript"></script><!-- LayerSlider script files -->
    <script src="<?php echo base_url()?>public/assets/global/plugins/slider-layer-slider/js/layerslider.kreaturamedia.jquery.js" type="text/javascript"></script><!-- LayerSlider script files -->
    <script src="<?php echo base_url()?>public/assets/frontend/pages/scripts/layerslider-init.js" type="text/javascript"></script>
    <!-- END LayerSlider -->



    <script src="<?php echo base_url()?>public/assets/frontend/layout/scripts/layout.js" type="text/javascript"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            Layout.init();    
            Layout.initOWL();
            LayersliderInit.initLayerSlider();
            Layout.initImageZoom();
            Layout.initTouchspin();
            Layout.initTwitter();
        });
    </script>
    <!-- END PAGE LEVEL JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>