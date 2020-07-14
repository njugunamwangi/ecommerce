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
            <li><?php echo $this->lang->line('order_heading')?></li>
            <li class="active"><?php echo $my_order->order_id?></li>
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
                  <li class="list-group-item clearfix"><a href="<?php echo base_url()?>my-account/orders"><i class="fa fa-angle-right"></i><?php echo $this->lang->line('my_orders_heading')?></a></li>
                  <li class="list-group-item clearfix"><a href="<?php echo base_url()?>reset_password"><i class="fa fa-angle-right"></i> Reset Password</a></li>
                  <li class="list-group-item clearfix"><a href="<?php echo base_url()?>my-account/wishlist"><i class="fa fa-angle-right"></i> Wish list</a></li>
                  <!-- <li class="list-group-item clearfix"><a href="javascript:;"><i class="fa fa-angle-right"></i> Returns</a></li> -->
                  <li class="list-group-item clearfix"><a href="<?php echo base_url()?>newsletter"><i class="fa fa-angle-right"></i> Newsletter</a></li>
                  <li class="list-group-item clearfix"><a href="<?php echo base_url()?>logout"><i class="fa fa-angle-right"></i> Logout</a></li>
                </ul>
              </div>
              <!-- END SIDEBAR -->

              <!-- BEGIN CONTENT -->
              <div class="col-md-9 col-sm-7">      
                <div class="tab-pane active" id="tab_1">
                  <div class="row">
                    <div class="col-md-6 col-sm-12">
                      <div class="portlet yellow-crusta box">
                        <div class="portlet-title">
                          <div class="caption">
                            <i class="fa fa-user"></i>Order Details
                          </div>
                        </div>
                        <div class="portlet-body">
                          <div class="row static-info">
                            <div class="col-md-5 name">
                               Order #:
                            </div>
                            <div class="col-md-7 value">
                               <?php echo $my_order->order_id?> <span class="label label-info label-sm">
                              Email confirmation was sent </span>
                            </div>
                          </div>
                          <div class="row static-info">
                            <div class="col-md-5 name">
                               Order Date & Time:
                            </div>
                            <div class="col-md-7 value">
                               <?php echo date('jS M, Y', $my_order->order_id)?> at <?php echo date('H:i:s', $my_order->order_id)?> 
                            </div>
                          </div>
                          <div class="row static-info">
                            <div class="col-md-5 name">
                               Order Status:
                            </div>
                            <?php
                              if ($my_order->status == 0) {
                                ?>
                                  <div class="col-md-7 value">
                                    <span class="label label-danger">
                                    Not Processed </span>
                                  </div>
                                <?php
                              } elseif ($my_order->status == 1) {
                                ?>
                                  <div class="col-md-7 value">
                                    <span class="label label-info">
                                    Processed </span>
                                  </div>
                                <?php
                              } elseif ($my_order->status == 2) {
                                ?>
                                  <div class="col-md-7 value">
                                    <span class="label label-warning">
                                    In Transit </span>
                                  </div>
                                <?php
                              } elseif ($my_order->status == 3) {
                                ?>
                                  <div class="col-md-7 value">
                                    <span class="label label-default">
                                    Cancelled </span>
                                  </div>
                                <?php
                              } else {
                                ?>
                                  <div class="col-md-7 value">
                                    <span class="label label-success">
                                    Delivered & Closed </span>
                                  </div>
                                <?php
                              }
                            ?>
                          </div>
                          <div class="row static-info">
                            <div class="col-md-5 name">
                               Grand Total:
                            </div>
                            <div class="col-md-7 value">
                              <?php
                                $fee = $this->db->get_where('shipment', ['ship_to' => $my_order->subcounty])->row();
                                echo $store_currency;
                                $shipment_fee = $fee->fee;
                                $total_order_cost = $my_order->total_orders;
                                echo ' ', number_format($shipment_fee + $total_order_cost, 2);
                              ?>
                            </div>
                          </div>
                          <div class="row static-info">
                            <div class="col-md-5 name">
                               Payment Information:
                            </div>
                            <div class="col-md-7 value">
                              <?php echo $my_order->method_of_payment?>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                      <div class="portlet blue-hoki box">
                        <div class="portlet-title">
                          <div class="caption">
                            <i class="fa fa-info"></i>Customer Information
                          </div>
                        </div>
                        <div class="portlet-body">
                          <div class="row static-info">
                            <div class="col-md-5 name">
                               Customer Name:
                            </div>
                            <div class="col-md-7 value">
                              <?php echo $my_order->first_name?> <?php echo $my_order->last_name?>
                            </div>
                          </div>
                          <div class="row static-info">
                            <div class="col-md-5 name">
                               Email:
                            </div>
                            <div class="col-md-7 value">
                               <?php echo $my_order->email?>
                            </div>
                          </div>
                          <div class="row static-info">
                            <div class="col-md-5 name">
                               State:
                            </div>
                            <div class="col-md-7 value">
                              <?php echo $my_order->subcounty?>
                            </div>
                          </div>
                          <div class="row static-info">
                            <div class="col-md-5 name">
                               Phone Number:
                            </div>
                            <div class="col-md-7 value">
                              <?php echo $my_order->phone?>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 col-sm-12">
                      <div class="portlet red-sunglo box">
                        <div class="portlet-title">
                          <div class="caption">
                            <i class="fa fa-send"></i>Shipping Address
                          </div>
                        </div>
                        <div class="portlet-body">
                          <div class="row static-info">
                            <div class="col-md-12 value">
                              <?php echo $my_order->first_name?> <?php echo $my_order->last_name?><br>
                               <?php echo $my_order->address?><br>
                               <?php echo $my_order->county?><br>
                               <?php echo $my_order->subcounty?>, <?php echo $my_order->postal_code?> <?php echo $my_order->county?><br>
                               Kenya<br>
                               T: <?php echo $my_order->phone?><br>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 col-sm-12">
                      <div class="portlet grey-cascade box">
                        <div class="portlet-title">
                          <div class="caption">
                            <i class="fa fa-shopping-cart"></i>Shopping Cart
                          </div>
                        </div>
                        <div class="portlet-body">
                          <div class="table-responsive">
                            <table class="table table-hover table-bordered table-striped">
                              <thead>
                                <tr>
                                  <th>
                                     Product
                                  </th>
                                  <th>
                                     Item Status
                                  </th>
                                  <th>
                                     Price
                                  </th>
                                  <th>
                                     Quantity
                                  </th>
                                  <th>
                                     Total
                                  </th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                                  $arr = $this->db->get_where('orders_summary', ['order_id' => $my_order->id])->result();
                                  foreach ($arr as $cart_item) {
                                    ?>
                                      <tr>
                                        <td>
                                            <?php
                                                echo $this->db->get_where('products', ['id' => $cart_item->product_id])->row()->name;
                                            ?>
                                        </td>
                                        <td>
                                          <span class="label label-sm label-success">
                                          Available
                                        </td>
                                        <td>
                                          <?php echo $store_currency, ' ', number_format($cart_item->price, 2)?>
                                        </td>
                                        <td>
                                          <?php echo $cart_item->qty?>
                                        </td>
                                        <td>
                                          <?php echo $store_currency, ' ', number_format($cart_item->subtotal, 2)?>
                                        </td>
                                      </tr>
                                    <?php
                                  }
                                ?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                    </div>
                    <div class="col-md-6">
                      <div class="well">
                        <div class="row static-info align-reverse">
                          <div class="col-md-6 name">
                             Sub Total:
                          </div>
                          <div class="col-md-6 value">
                             <?php echo $store_currency?> <?php echo number_format($my_order->total_orders, 2)?>
                          </div>
                        </div>
                        <div class="row static-info align-reverse">
                          <div class="col-md-6 name">
                             Shipping Cost:
                          </div>
                          <div class="col-md-6 value">
                            <?php
                              $shipment_fee = $this->db->get_where('shipment', ['ship_to' => $my_order->subcounty])->row();
                              echo $store_currency;
                              echo ' ', number_format($shipment_fee->fee, 2);
                            ?>
                          </div>
                        </div>
                        <div class="row static-info align-reverse">
                          <div class="col-md-6 name">
                             Grand Total:
                          </div>
                          <div class="col-md-6 value">
                            <?php
                              $fee = $this->db->get_where('shipment', ['ship_to' => $my_order->subcounty])->row();
                              echo $store_currency;
                              $shipment_fee = $fee->fee;
                              $total_order_cost = $my_order->total_orders;
                              echo ' ', number_format($shipment_fee + $total_order_cost, 2);
                            ?>
                          </div>
                        </div>
                        <!-- <div class="row static-info align-reverse">
                          <div class="col-md-8 name">
                             Total Paid:
                          </div>
                          <div class="col-md-3 value">
                             $1,260.00
                          </div>
                        </div>
                        <div class="row static-info align-reverse">
                          <div class="col-md-8 name">
                             Total Refunded:
                          </div>
                          <div class="col-md-3 value">
                             $0.00
                          </div>
                        </div>
                        <div class="row static-info align-reverse">
                          <div class="col-md-8 name">
                             Total Due:
                          </div>
                          <div class="col-md-3 value">
                             $1,124.50
                          </div>
                        </div> -->
                      </div>
                    </div>
                  </div>
                </div>
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