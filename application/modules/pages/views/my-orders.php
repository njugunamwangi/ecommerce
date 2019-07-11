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
  <title><?php echo $title?> | <?php echo $name_of_store?></title>

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
  <!-- Fonts END -->

  <!-- Global styles START -->          
  <link href="<?php echo base_url()?>public/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo base_url()?>public/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Global styles END --> 
   
  <!-- Page level plugin styles START -->
  <link href="<?php echo base_url()?>public/assets/global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet">
  <link href="<?php echo base_url()?>public/assets/global/plugins/carousel-owl-carousel/owl-carousel/owl.carousel.css" rel="stylesheet">
  <!-- Page level plugin styles END -->

  <!-- Theme styles START -->
  <link href="<?php echo base_url()?>public/assets/global/css/components.css" rel="stylesheet">
  <link href="<?php echo base_url()?>public/assets/frontend/layout/css/style.css" rel="stylesheet">
  <link href="<?php echo base_url()?>public/assets/frontend/pages/css/style-shop.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url()?>public/assets/frontend/layout/css/style-responsive.css" rel="stylesheet">
  <link href="<?php echo base_url()?>public/assets/frontend/layout/css/themes/red.css" rel="stylesheet" id="style-color">
  <link href="<?php echo base_url()?>public/assets/frontend/layout/css/custom.css" rel="stylesheet">
  <!-- Theme styles END -->
</head>
<!-- Head END -->
<?php $i = 1; ?>
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
                            <li><a href="<?php echo base_url();?>my-account/wishlist">My Wishlist</a></li>
                            <li><a href="<?php echo base_url();?>checkout">Checkout</a></li>
                            <?php
                              if ($this->ion_auth->is_admin()) {
                                ?>
                                <li><a href="<?php echo base_url();?>admin"><?php echo $user_account->first_name?> <?php echo $user_account->last_name?></a></li>
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
        <!-- <a class="site-logo" href="shop-index.html"><img src="<?php echo base_url()?>public/assets/frontend/layout/img/logos/logo-shop-red.png" alt="Metronic Shop UI"></a> -->
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
            <li><a href="<?php echo base_url();?>">Shop</a></li>
            <li><a href="<?php echo base_url();?>cart">Cart</a></li>
            <li><a href="<?php echo base_url();?>checkout">Checkout</a></li>
            <li class="active"><a href="<?php echo base_url();?>my-account">My Account</a></li>

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
        <ul class="breadcrumb">
            <li><a href="<?php echo base_url()?>">Home</a></li>
            <li><a href="<?php echo base_url()?>my-account"><?php echo $this->lang->line('my_account_heading')?></a></li>
            <li class="active"><?php echo $this->lang->line('my_orders_heading')?></li>
        </ul>
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">

          <?php
            if (!$this->ion_auth->logged_in()) {
              ?>
                <div class="col-md-12 col-sm-12">
                  <h1><?php echo $this->lang->line('shopping_cmy_account_headingart_heading')?></h1>
                  <div class="shopping-cart-page">
                    <h1><?php echo $title?></h1>
                    <div class="shopping-cart-data clearfix">
                      <p><?php echo $this->lang->line('my_account_login_message')?></p>
                    </div>
                    <a href="<?php echo base_url()?>login" class="btn btn-primary"><i class="fa fa-key"> Login </i></a>
                  </div>
                </div>
              <?php
            } else {
              ?>
                <!-- BEGIN SIDEBAR -->
              <div class="sidebar col-md-3 col-sm-3">
                <ul class="list-group margin-bottom-25 sidebar-menu">
                  <li class="list-group-item clearfix active"><a href="<?php echo base_url()?>my-account/orders"><i class="fa fa-angle-right"></i><?php echo $this->lang->line('my_orders_heading')?></a></li>
                  <li class="list-group-item clearfix"><a href="<?php echo base_url()?>my-account/reset-password"><i class="fa fa-angle-right"></i> Reset Password</a></li>
                  <li class="list-group-item clearfix"><a href="<?php echo base_url()?>my-account/wishlist"><i class="fa fa-angle-right"></i><?php echo $this->lang->line('wishlist_page_heading')?></a></li>
                  <!-- <li class="list-group-item clearfix"><a href="javascript:;"><i class="fa fa-angle-right"></i> Returns</a></li> -->
                  <li class="list-group-item clearfix"><a href="<?php echo base_url()?>newsletter"><i class="fa fa-angle-right"></i> Newsletter</a></li>
                  <li class="list-group-item clearfix"><a href="<?php echo base_url()?>logout"><i class="fa fa-angle-right"></i> Logout</a></li>
                </ul>
              </div>
              <!-- END SIDEBAR -->

              <!-- BEGIN CONTENT -->
              <div class="col-md-9 col-sm-7">
                <?php
                  if (!empty($my_orders)) {
                    ?>
                      <div class="portlet box green-haze">
                        <div class="portlet-title">
                          <div class="caption">
                            <i class="fa fa-shopping-cart"></i><?php echo $this->lang->line('my_orders_heading')?>
                          </div>
                        </div>
                        <div class="portlet-body">
                          <div class="table-scrollable">
                            <table class="table table-striped table-hover">
                              <thead>
                                <tr>
                                  <th>
                                     #
                                  </th>
                                  <th>
                                    Order ID
                                  </th>
                                  <th>
                                    Date
                                  </th>
                                  <th>
                                    Method of Payment
                                  </th>
                                  <th>
                                    Amount
                                  </th>
                                  <th>
                                    Status
                                  </th>
                                  <th>
                                    Actions
                                  </th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach($my_orders as $my_order) {
                                  ?>
                                    <tr>
                                      <?php $orderid = $my_order->order_id?>
                                      <td>
                                        <?php echo $i++;?>
                                      </td>
                                      <td>
                                        <?php echo $my_order->order_id;?>
                                      </td>
                                      <td>
                                        <?php echo date('jS M, Y', $my_order->order_id)?>
                                      </td>
                                      <td>
                                        <?php echo $my_order->method_of_payment;?>
                                      </td>
                                      <td>
                                        <?php 
                                          $fee = $this->db->get_where('shipment', ['ship_to' => $my_order->subcounty])->row();
                                          $shipment_fee = $fee->fee;
                                          echo $store_currency, ' ', number_format($shipment_fee+$my_order->total_orders, 2);
                                        ?>
                                      </td>
                                      <td>
                                        <?php
                                          if ($my_order->status == 0) {
                                            ?>
                                              <span class="label label-sm label-danger">Not Processed</span>
                                            <?php
                                          } elseif ($my_order->status == 1) {
                                            ?>
                                              <span class="label label-sm label-info">Processed</span>
                                            <?php
                                          } elseif ($my_order->status == 2) {
                                            ?>
                                              <span class="label label-sm label-warning">In Transit</span>
                                            <?php
                                          } elseif ($my_order->status == 3) {
                                            ?>
                                              <span class="label label-sm label-default">Cancelled</span>
                                            <?php
                                          } else {
                                            ?>
                                              <span class="label label-sm label-success">Delivered & Closed</span>
                                            <?php
                                          }
                                        ?>
                                      </td>
                                      <td>
                                        <span>
                                          <a href="<?php echo base_url('my-account/order/'.$my_order->order_id)?>" class="label label-sm label-success"><i class="fa fa-search"></i> View </a>
                                        </span>
                                        <?php
                                          if ($my_order->status == 0) {
                                            ?>
                                              <span>
                                                <a data-target="#basic" data-toggle="modal" class="label label-sm label-danger"><i class="fa fa-times"></i> Cancel </a>
                                              </span>
                                            <?php
                                          }
                                        ?>
                                      </td>
                                    </tr>
                                  <?php
                                }?>
                              </tbody>
                            </table>
                            <div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title">Cancel Order</h4>
                                  </div>
                                  <div class="modal-body">
                                     Are you sure you want to cancel order #<?php echo $orderid?>?
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn default" data-dismiss="modal">No</button>
                                    <button type="submit" class="btn red">Yes</button>
                                  </div>
                                </div>
                                <!-- /.modal-content -->
                              </div>
                              <!-- /.modal-dialog -->
                            </div>
                          </div>
                        </div>
                      </div>
                    <?php
                  } else {
                    ?>
                      <h1><?php echo $this->lang->line('shopping_cmy_account_headingart_heading')?></h1>
                      <div class="shopping-cart-page">
                        <h1><?php echo $title?></h1>
                        <div class="shopping-cart-data clearfix">
                          <p><?php echo $this->lang->line('no_orders')?></p>
                        </div>
                        <a href="<?php echo base_url()?>" class="btn btn-primary"><i class="fa fa-shopping-cart"> <?php echo $this->lang->line('go_shop')?> </i></a>
                      </div>
                    <?php
                  }
                ?>
                      
              </div>
              <!-- END CONTENT -->
              <?php
            }
          ?>
        </div>
        <!-- END SIDEBAR & CONTENT -->
      </div>
    </div>

    <!-- BEGIN PRE-FOOTER -->
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
              35, Lorem Lis Street, Park Ave<br>
              Kiambu, Kenya<br>
              Phone: <?php echo $store_phone_number?><br>
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
    <!-- END PRE-FOOTER -->

    <!-- BEGIN FOOTER -->
    <div class="footer">
      <div class="container">
        <div class="row">
          <!-- BEGIN COPYRIGHT -->
          <div class="col-md-6 col-sm-6 padding-top-10">
            <?php echo date('Y')?> © <?php echo $name_of_store?> ALL Rights Reserved. 
          </div>
          <div class="scroll-to-top">
              <i class="icon-arrow-up"></i>
          </div>
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
    <!-- END FOOTER -->

    <!-- Load javascripts at bottom, this will reduce page load time -->
    <!-- BEGIN CORE PLUGINS(REQUIRED FOR ALL PAGES) -->
    <!--[if lt IE 9]>
    <script src="<?php echo base_url()?>public/assets/global/plugins/respond.min.js"></script>  
    <![endif]-->  
    <script src="<?php echo base_url()?>public/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>public/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>public/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>      
    <script src="<?php echo base_url()?>public/assets/frontend/layout/scripts/back-to-top.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>public/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->

    <!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
    <script src="<?php echo base_url()?>public/assets/global/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script><!-- pop up -->
    <script src="<?php echo base_url()?>public/assets/global/plugins/carousel-owl-carousel/owl-carousel/owl.carousel.min.js" type="text/javascript"></script><!-- slider for products -->

    <script src="<?php echo base_url()?>public/assets/frontend/layout/scripts/layout.js" type="text/javascript"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            Layout.init();    
            Layout.initOWL();
            Layout.initTwitter();
        });
    </script>
    <!-- END PAGE LEVEL JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>