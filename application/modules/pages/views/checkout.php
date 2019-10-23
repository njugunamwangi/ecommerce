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
  <link href="<?php echo base_url();?>public/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>public/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Global styles END --> 
   
  <!-- Page level plugin styles START -->
  <link href="<?php echo base_url();?>public/assets/global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet">
  <link href="<?php echo base_url();?>public/assets/global/plugins/carousel-owl-carousel/owl-carousel/owl.carousel.css" rel="stylesheet">
  <link href="<?php echo base_url();?>public/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin styles END -->

  <!-- Theme styles START -->
  <link href="<?php echo base_url();?>public/assets/global/css/components.css" rel="stylesheet">
  <link href="<?php echo base_url();?>public/assets/frontend/layout/css/style.css" rel="stylesheet">
  <link href="<?php echo base_url();?>public/assets/frontend/pages/css/style-shop.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url();?>public/assets/frontend/layout/css/style-responsive.css" rel="stylesheet">
  <link href="<?php echo base_url();?>public/assets/frontend/layout/css/themes/red.css" rel="stylesheet" id="style-color">
  <link href="<?php echo base_url();?>public/assets/frontend/layout/css/custom.css" rel="stylesheet">
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
                                $query = $this->db->get('wishlist')->num_rows();
                              ?>
                              <li><a href="<?php echo base_url();?>my-account/wishlist">My Wishlist (<?php echo $query?>)</a></li>
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
        <!-- <a class="site-logo" href="<?php echo base_url(); ?>"><img src="<?php echo base_url();?>public/assets/frontend/layout/img/logos/logo-shop-red.png" alt="Metronic Shop UI"></a> -->
        <a class="site-logo" style="text-decoration: none;" href="<?php echo base_url()?>" ><h2><strong><?php echo $name_of_store?></strong></h2></a>
        <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i></a>

        <!-- BEGIN CART -->
        <div class="top-cart-block">
          <div class="top-cart-info">
            <a href="javascript:void(0);" class="top-cart-info-count"><?php echo $this->cart->total_items();?> item(s)</a>
            <a href="javascript:void(0);" class="top-cart-info-value"><?php echo $store_currency?> <?php echo number_format($this->cart->total(), 2);?></a>
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
            <li class="active"><a href="<?php echo base_url();?>checkout">Checkout</a></li>
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
        <ul class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>">Home</a></li>
            <li class="active">Checkout</li>
        </ul>
        <!-- BEGIN SIDEBAR & CONTENT -->
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
        <div class="row margin-bottom-40">
          <!-- BEGIN CONTENT -->
          <?php 
            if (!empty($cart_items)) {
              ?>
                <div class="col-md-12 col-sm-12">
                  <!-- BEGIN CHECKOUT PAGE -->
                  <div class="panel-group checkout-page accordion scrollable" id="checkout-page">
                    <?php
                      if (!$this->ion_auth->logged_in()) {
                        ?>
                          <!-- BEGIN CHECKOUT -->
                          <div id="checkout" class="panel panel-default">
                            <div class="panel-heading">
                              <h2 class="panel-title">
                                <a data-toggle="collapse" data-parent="#checkout-page" href="#checkout-content" class="accordion-toggle">
                                  Checkout Options
                                </a>
                              </h2>
                            </div>
                            <div id="checkout-content" class="panel-collapse collapse in">
                              <div class="panel-body row">
                                <div class="col-md-6 col-sm-6">
                                  <h3>New Customer</h3>
                                  <p>Create an account here</p>
                                  <?php echo form_open('auth/checkout_register');?>
                                    <div class="form-group">
                                      <label for="first_name">First Name</label>
                                      <input type="text" id="first_name" name="first_name" value="<?php echo set_value('first_name')?>" class="form-control">
                                    </div>
                                    <div class="form-group">
                                      <label for="last_name">Last Name</label>
                                      <input type="text" id="last_name" name="last_name" value="<?php echo set_value('last_name')?>" class="form-control">
                                    </div>
                                    <div class="form-group">
                                      <label for="email">E-Mail</label>
                                      <input type="text" id="email" name="email" value="<?php echo set_value('email')?>" class="form-control">
                                    </div>
                                    <div class="form-group">
                                      <label for="phone">Phone</label>
                                      <input type="text" id="phone" maxlength="10" name="phone" value="<?php echo set_value('phone')?>" class="form-control">
                                    </div>
                                    <h5>Your Password</h5>
                                    <div class="form-group">
                                      <label for="password">Password</label>
                                      <input type="password" id="password" name="password" value="<?php echo set_value('password')?>" class="form-control">
                                    </div>
                                    <div class="form-group">
                                      <label for="password_confirm">Confirm Password</label>
                                      <input type="password" id="password_confirm" name="password_confirm" value="<?php echo set_value('password_confirm')?>" class="form-control">
                                    </div>
                                    <p>By creating an account you will be able to shop faster, be up to date on an order's status, and keep track of the orders you have previously made.</p>
                                    <button class="btn btn-primary" type="submit" data-toggle="collapse" data-parent="#checkout-page" data-target="#payment-address-content">Continue</button>
                                  <?php echo form_close();?>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                  <h3>Returning Customer</h3>
                                  <p>I am a returning customer.</p>
                                  <?php echo form_open('auth/checkout_login');?>
                                    <div class="form-group">
                                      <label for="identity">E-Mail</label>
                                      <input type="text" id="identity" name="identity" value="<?php echo set_value('identity')?>" class="form-control">
                                    </div>
                                    <div class="form-group">
                                      <label for="password">Password</label>
                                      <input type="password" id="password" name="password" value="<?php echo set_value('password')?>" class="form-control">
                                    </div>
                                    <a href="javascript:;">Forgotten Password?</a>
                                    <div class="padding-top-20">                  
                                      <button class="btn btn-primary" type="submit">Login</button>
                                    </div>
                                  <?php echo form_close();?>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- END CHECKOUT -->
                        <?php
                      } else {
                        ?>
                          <?php echo form_open('pages/confirm_order');?>
                            <!-- BEGIN SHIPPING ADDRESS -->
                            <div id="checkout" class="panel panel-default">
                              <div class="panel-heading">
                                <h2 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#checkout-page" href="#checkout-content" class="accordion-toggle">
                                    Step 1: Delivery Details
                                    </a>
                                </h2>
                              </div>
                              <div id="checkout-content" class="panel-collapse collapse in">
                                <div class="panel-body row">
                                    <div class="col-md-6 col-sm-6">
                                      <div class="form-group">
                                          <label for="first_name">First Name <span class="require">*</span></label>
                                          <input type="text" id="first_name" class="form-control" name="first_name" value="<?php echo $user_account->first_name?>">
                                          <div class="caption-subject" style="color: red;">
                                            <?php echo form_error('first_name')?>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label for="last_name">Last Name <span class="require">*</span></label>
                                          <input type="text" id="last_name" class="form-control" name="last_name" value="<?php echo $user_account->last_name?>">
                                          <div class="caption-subject" style="color: red;">
                                            <?php echo form_error('last_name')?>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label for="email">Email <span class="require">*</span></label>
                                          <input type="text" id="email" class="form-control" name="email" value="<?php echo $user_account->email?>">
                                          <div class="caption-subject" style="color: red;">
                                            <?php echo form_error('email')?>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label for="phone">Phone Number <span class="require">*</span></label>
                                          <input type="text" id="phone" class="form-control" name="phone" value="<?php echo $user_account->phone?>">
                                          <div class="caption-subject" style="color: red;">
                                            <?php echo form_error('phone')?>
                                          </div>
                                      </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                      <div class="form-group">
                                          <label for="address">Address <span class="require">*</span></label>
                                          <input type="text" id="address" class="form-control" name="address" value="<?php echo set_value('address')?>">
                                          <div class="caption-subject" style="color: red;">
                                            <?php echo form_error('address')?>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label for="postal_code">Postal Code <span class="require">*</span></label>
                                          <input type="text" id="postal_code" class="form-control" name="postal_code" value="<?php echo set_value('postal_code')?>">
                                          <div class="caption-subject" style="color: red;">
                                            <?php echo form_error('postal_code')?>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label for="subcounty">Town <span class="require">*</span></label>
                                            <select class="form-control input-sm" id="subcounty" name="subcounty">
                                            <option value=""> --- Please Select Town--- </option>
                                            <?php foreach($shipments as $shipment):?>
                                              <option value="<?php echo $shipment->ship_to?>"><?php echo $shipment->ship_to?></option>
                                              <?php
                                                $shipment_fee = 0;
                                                if (isset($_POST[$shipment->ship_to]) && $_POST[$shipment->ship_to] != "") {
                                                  $shipment_fee = $shipment->fee;
                                                }
                                              ?>
                                          <?php endforeach;?>
                                          </select>
                                          <div class="caption-subject" style="color: red;">
                                            <?php echo form_error('subcounty')?>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                        <label for="county">County <span class="require">*</span></label>
                                        <select class="form-control input-sm" id="county" name="county">
                                          <option value=""> --- Please Select County--- </option>
                                          <?php foreach($counties as $county):?>
                                              <option value="<?php echo $county->county?>">County <?php echo $county->county_code?> - <?php echo $county->county?></option>
                                          <?php endforeach;?>
                                        </select>
                                          <div class="caption-subject" style="color: red;">
                                            <?php echo form_error('county')?>
                                          </div>
                                      </div>
                                    </div>
                                    <!-- <div class="col-md-12">
                                        <button class="btn btn-primary  pull-right"  id="button-shipping-method" data-toggle="collapse" data-parent="#checkout-page" data-target="#payment-method-content">Continue</button>
                                    </div> -->
                                </div>
                              </div>
                            </div>
                            <!-- END SHIPPING ADDRESS -->

                            <!-- BEGIN PAYMENT METHOD -->
                            <div id="payment-method" class="panel panel-default">
                              <div class="panel-heading">
                                <h2 class="panel-title">
                                  <a data-toggle="collapse" data-parent="#checkout-page" href="#payment-method-content" class="accordion-toggle">
                                    Step 2: Payment Method
                                  </a>
                                </h2>
                              </div>
                              <div id="payment-method-content" class="panel-collapse collapse">
                                <div class="panel-body row">
                                  <div class="col-md-12">
                                    <p>Please select the preferred payment method to use on this order.</p>
                                    <div class="radio-list">
                                      <label>
                                        <input type="radio" name="payment_method" value="Cash on Delivery"> Cash On Delivery
                                      </label>
                                      <label>
                                        <input type="radio" name="payment_method" value="Cheque Deposit"> Cheque Deposit
                                      </label>
                                      <div class="caption-subject" style="color: red;">
                                        <?php echo form_error('payment_method')?>
                                      </div>
                                    </div>
                                    <!-- <button class="btn btn-primary  pull-right" type="submit" id="button-payment-method" data-toggle="collapse" data-parent="#checkout-page" data-target="#confirm-content">Continue</button> -->
                                    <!-- <div class="checkbox pull-right">
                                      <label>
                                        <input type="checkbox"> I have read and agree to the <a title="Terms & Conditions" href="javascript:;">Terms & Conditions </a> &nbsp;&nbsp;&nbsp; 
                                      </label>
                                    </div>  --> 
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- END PAYMENT METHOD -->

                            <!-- BEGIN CONFIRM -->
                            <div id="confirm" class="panel panel-default">
                              <div class="panel-heading">
                                <h2 class="panel-title">
                                  <a data-toggle="collapse" data-parent="#checkout-page" href="#confirm-content" class="accordion-toggle">
                                    Step 3: Confirm Order
                                  </a>
                                </h2>
                              </div>
                              <div id="confirm-content" class="panel-collapse collapse">
                                <div class="panel-body row">
                                  <div class="col-md-12 clearfix">
                                    <div class="table-wrapper-responsive">
                                    <table>
                                      <tr>
                                        <th class="checkout-image">Image</th>
                                        <th class="checkout-description">Description</th>
                                        <th class="checkout-quantity">Quantity</th>
                                        <th class="checkout-price">Price</th>
                                        <th class="checkout-total">Total</th>
                                      </tr>
                                      <?php foreach ($cart_items as $cart_item): ?>
                                        <tr>
                                          <td class="checkout-image">
                                            <img src="<?php echo base_url();?>public/attachments/products/<?php echo $cart_item['image']?>" alt="<?php echo $cart_item['name']?>">
                                          </td>
                                          <td class="checkout-description">
                                            <h3><?php echo $cart_item['name']?></h3>
                                          </td>
                                          <td class="checkout-quantity"><?php echo $cart_item['qty']?></td>
                                          <td class="checkout-price"><strong><span><?php echo $store_currency?></span> <?php echo number_format($cart_item['price'], 2)?></strong></td>
                                          <td class="checkout-total"><strong><span><?php echo $store_currency?></span> <?php echo number_format($cart_item['subtotal'], 2)?></strong></td>
                                        </tr>
                                      <?php endforeach;?>
                                    </table>
                                    </div>
                                    <div class="checkout-total-block">
                                      <ul>
                                        <!-- <li>
                                          <em>Sub total</em>
                                          <strong class="price"><span><?php echo $store_currency?> </span><?php echo $this->cart->total()?></strong>
                                        </li>
                                        <li>
                                          <em>Shipping cost</em>
                                          <strong class="price"><span><?php echo $store_currency?> </span><?php echo $shipment_fee?></strong>
                                        </li> -->
                                        <li class="checkout-total-price">
                                          <em>Total</em>
                                          <strong class="price"><span><?php echo $store_currency?> <?php echo number_format($this->cart->total(), 2)?></span></strong>
                                        </li>
                                      </ul>
                                    </div>
                                    <div class="clearfix"></div>
                                    <button class="btn btn-primary pull-right" type="submit" id="button-confirm">Confirm Order</button>
                                    <button type="button" class="btn btn-default pull-right margin-right-20">Cancel</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- END CONFIRM -->
                          <?php echo form_close();?>
                        <?php
                      }
                    ?> 
                  </div>
                  <!-- END CHECKOUT PAGE -->
                </div>
              <?php
            } else {
              ?>
                <div class="col-md-12 col-sm-12">
                  <h1><?php echo $title?></h1>
                  <div class="shopping-cart-page">
                    <div class="shopping-cart-data clearfix">
                      <p><?php echo $this->lang->line('empty_cart')?></p>
                    </div>
                    <a href="<?php echo base_url()?>" class="btn btn-primary"><?php echo $this->lang->line('go_shop')?> <i class="fa fa-shopping-cart"></i></a>
                  </div>
                </div>
              <?php
            }
          ?>
            
          <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->
      </div>
    </div>

    <!-- BEGIN PRE-FOOTER -->
    <div class="pre-footer">
      <div class="container">
        <div class="row">
          <!-- BEGIN BOTTOM ABOUT BLOCK -->
          <div class="col-md-3 col-sm-6 pre-footer-col">
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
            <?php echo date('Y')?> © <?php echo $name_of_store?>. ALL Rights Reserved. 
          </div>
          <!-- END COPYRIGHT -->
          <!-- BEGIN PAYMENTS -->
          <div class="col-md-6 col-sm-6">
            <!-- <ul class="list-unstyled list-inline pull-right">
              <li><img src="<?php echo base_url();?>public/assets/frontend/layout/img/payments/western-union.jpg" alt="We accept Western Union" title="We accept Western Union"></li>
              <li><img src="<?php echo base_url();?>public/assets/frontend/layout/img/payments/american-express.jpg" alt="We accept American Express" title="We accept American Express"></li>
              <li><img src="<?php echo base_url();?>public/assets/frontend/layout/img/payments/MasterCard.jpg" alt="We accept MasterCard" title="We accept MasterCard"></li>
              <li><img src="<?php echo base_url();?>public/assets/frontend/layout/img/payments/PayPal.jpg" alt="We accept PayPal" title="We accept PayPal"></li>
              <li><img src="<?php echo base_url();?>public/assets/frontend/layout/img/payments/visa.jpg" alt="We accept Visa" title="We accept Visa"></li>
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
    <script src="<?php echo base_url();?>public/assets/global/plugins/respond.min.js"></script>  
    <![endif]-->
    <script src="<?php echo base_url();?>public/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>public/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>public/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>      
    <script src="<?php echo base_url();?>public/assets/frontend/layout/scripts/back-to-top.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>public/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->

    <!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
    <script src="<?php echo base_url();?>public/assets/global/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script><!-- pop up -->
    <script src="<?php echo base_url();?>public/assets/global/plugins/carousel-owl-carousel/owl-carousel/owl.carousel.min.js" type="text/javascript"></script><!-- slider for products -->
    <script src='<?php echo base_url();?>public/assets/global/plugins/zoom/jquery.zoom.min.js' type="text/javascript"></script><!-- product zoom -->
    <script src="<?php echo base_url();?>public/assets/global/plugins/bootstrap-touchspin/bootstrap.touchspin.js" type="text/javascript"></script><!-- Quantity -->
    <script src="<?php echo base_url();?>public/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>

    <script src="<?php echo base_url();?>public/assets/frontend/layout/scripts/layout.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>public/assets/frontend/pages/scripts/checkout.js" type="text/javascript"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            Layout.init();    
            Layout.initOWL();
            Layout.initTwitter();
            Layout.initImageZoom();
            Layout.initTouchspin();
            Layout.initUniform();
            Checkout.init();
        });
    </script>
    <!-- END PAGE LEVEL JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>