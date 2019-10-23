<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.2
Version: 3.7.0
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
	<head>
		<meta charset="utf-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
		<meta content="" name="description"/>
		<meta content="" name="author"/>
		<!-- BEGIN GLOBAL MANDATORY STYLES -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css">
		<link href="<?php echo base_url('public/assets/global/plugins/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css">
		<link href="<?php echo base_url('public/assets/global/plugins/simple-line-icons/simple-line-icons.min.css'); ?>" rel="stylesheet" type="text/css">
		<link href="<?php echo base_url('public/assets/global/plugins/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css">
		<link href="<?php echo base_url('public/assets/global/plugins/uniform/css/uniform.default.css'); ?>" rel="stylesheet" type="text/css">
		<link href="<?php echo base_url('public/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css'); ?>" rel="stylesheet" type="text/css"/>
		<!-- END GLOBAL MANDATORY STYLES -->
		<!-- BEGIN PAGE LEVEL PLUGINS -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/assets/global/plugins/select2/select2.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/assets/global/plugins/bootstrap-datepicker/css/datepicker.css"/>
		<link  href="<?php echo base_url();?>public/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css"  rel="stylesheet" type="text/css"/>
		<link  href="<?php echo base_url();?>public/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css"/>
		<link  href="<?php echo base_url();?>public/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
		<link  href="<?php echo base_url();?>public/assets/global/plugins/jquery-tags-input/jquery.tagsinput.css" rel="stylesheet" type="text/css"/>
		<link  href="<?php echo base_url();?>public/assets/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css" rel="stylesheet" type="text/css"/>
		<link  href="<?php echo base_url();?>public/assets/global/plugins/typeahead/typeahead.css" rel="stylesheet" type="text/css"/>
		<link  href="<?php echo base_url();?>public/assets/global/plugins/bootstrap-toastr/toastr.min.css" rel="stylesheet" type="text/css"/>
		<link  href="<?php echo base_url();?>public/assets/global/plugins/select2/select2.css" rel="stylesheet" type="text/css"/>
		<link  href="<?php echo base_url();?>public/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" rel="stylesheet" type="text/css"/>
		<link  href="<?php echo base_url();?>public/assets/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css" rel="stylesheet" type="text/css"/>
		<link  href="<?php echo base_url();?>public/assets/global/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" type="text/css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/global/plugins/bootstrap-summernote/summernote.css">
		<link href="<?php echo base_url();?>public/assets/admin/pages/css/news.css" rel="stylesheet" type="text/css"/>
		<link href="<?php echo base_url();?>public/assets/admin/pages/css/profile.css" rel="stylesheet" type="text/css"/>
		<link href="<?php echo base_url();?>public/assets/admin/pages/css/tasks.css" rel="stylesheet" type="text/css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/global/plugins/select2/select2.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/global/plugins/clockface/css/clockface.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/global/plugins/bootstrap-datepicker/css/datepicker3.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/global/plugins/bootstrap-colorpicker/css/colorpicker.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/global/plugins/select2/select2.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/global/plugins/bootstrap-datepicker/css/datepicker.css"/>
		<!-- END PAGE LEVEL PLUGINS -->
		<!-- BEGIN THEME STYLES -->
		<link href="<?php echo base_url('public/assets/global/css/components-md.css'); ?>" id="style_components" rel="stylesheet" type="text/css"/>
		<link href="<?php echo base_url('public/assets/global/css/plugins-md.css'); ?>" rel="stylesheet" type="text/css"/>
		<link href="<?php echo base_url('public/assets/admin/layout4/css/layout.css'); ?>" rel="stylesheet" type="text/css"/>
		<link id="style_color" href="<?php echo base_url('public/assets/admin/layout4/css/themes/light.css'); ?>" rel="stylesheet" type="text/css"/>
		<link href="<?php echo base_url('public/assets/admin/layout4/css/custom.css'); ?>" rel="stylesheet" type="text/css"/>
		<!-- END THEME STYLES -->
		<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
		<link rel="apple-touch-icon-precomposed" href="<?php echo base_url('public/icon/logo57.png'); ?>" />
		<link rel="shortcut icon" sizes="16" href="<?php echo base_url('public/icon/logo16.png'); ?>" />
		<title><?php echo $title;?> | <?php echo $name_of_store?></title>
	</head>
	<body class="page-md page-header-fixed page-sidebar-closed-hide-logo page-sidebar-fixed page-sidebar-closed-hide-logo">
		<!-- BEGIN HEADER -->
		<div class="page-header md-shadow-z-1-i navbar navbar-fixed-top">
			<!-- BEGIN HEADER INNER -->
			<div class="page-header-inner">
				<!-- BEGIN LOGO -->
				<div class="page-logo">
					<!-- <a href="<?php echo base_url()?>vendor">
					<img src="<?php echo base_url()?>public/assets/admin/layout4/img/logo-light.png" alt="logo" class="logo-default"/>
					</a> -->
					<div class="menu-toggler sidebar-toggler">
						<!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
					</div>
				</div>
				<!-- END LOGO -->
				<!-- BEGIN RESPONSIVE MENU TOGGLER -->
				<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
				</a>
				<!-- END RESPONSIVE MENU TOGGLER -->
				<!-- BEGIN PAGE ACTIONS -->
				<!-- DOC: Remove "hide" class to enable the page header actions -->
				<div class="page-actions">
					<div class="btn-group">
						<button type="button" class="btn red-haze btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<span class="hidden-sm hidden-xs">Actions&nbsp;</span><i class="fa fa-angle-down"></i>
						</button>
						<ul class="dropdown-menu" role="menu">
							<li>
								<a data-target="#category" data-toggle="modal" href="#category">
								<i class="fa fa-check-square-o"></i> <?php echo $this->lang->line('publish_category_heading')?> </a>
							</li>
							<li>
								<a data-target="#stack3" data-toggle="modal" href="#stack3">
								<i class="fa fa-tag"></i> <?php echo $this->lang->line('publish_tag_heading')?> </a>
							</li>
							<li class="divider">
							</li>
						</ul>
					</div>
				</div>
				<!-- END PAGE ACTIONS -->
				<!-- BEGIN PAGE TOP -->
				<div class="page-top">
					<!-- BEGIN TOP NAVIGATION MENU -->
					<div class="top-menu">
						<ul class="nav navbar-nav pull-right">
							<li class="separator hide">
							</li>
							<?php 
								$baseurl = base_url();
								$base_url = explode('.', $baseurl, 3);
								$base = $base_url[1].'.'.$base_url[2];
							?>
							<li class="dropdown dropdown-extended dropdown-notification dropdown-dark">
								<a href="<?php echo prep_url($base)?>" class="dropdown-toggle" title="Go Shopping" target="_blank">
									<i class="fa fa-shopping-cart"></i>
									<?php echo $name_of_store?>
								</a>
							</li>
							<li class="separator hide">
							</li>
							<!-- BEGIN USER LOGIN DROPDOWN -->
							<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
							<li class="dropdown dropdown-user dropdown-dark">
								<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
								<span class="username username-hide-on-mobile">
								<?php echo $vendor_info->first_name, ' ', $vendor_info->last_name?> </span>
								<!-- DOC: Do not remove below empty space(&nbsp;) as its purposely used -->
								<?php
									$query = $vendor_info->image;
									if (empty($query)) {
										$user_icon = 'avatar.png';
									} else {
										$user_icon = 'users/'.$vendor_info->image;
									}
								?>
								<img alt="" class="img-circle" src="<?php echo base_url()?>public/attachments/<?php echo $user_icon?>"/>
								</a>
								<ul class="dropdown-menu dropdown-menu-default">
									<li>
										<a href="extra_profile.html">
										<i class="icon-user"></i> My Profile </a>
									</li>
									<li>
										<a href="page_calendar.html">
										<i class="icon-calendar"></i> My Calendar </a>
									</li>
									<li>
										<a href="inbox.html">
										<i class="icon-envelope-open"></i> My Inbox <span class="badge badge-danger">
										3 </span>
										</a>
									</li>
									<li>
										<a href="page_todo.html">
										<i class="icon-rocket"></i> My Tasks <span class="badge badge-success">
										7 </span>
										</a>
									</li>
									<li class="divider">
									</li>
									<li>
										<a href="extra_lock.html">
										<i class="icon-lock"></i> Lock Screen </a>
									</li>
									<li>
										<a href="<?php echo prep_url($base.'logout')?>">
										<i class="icon-key"></i> Log Out </a>
									</li>
								</ul>
							</li>
							<!-- END USER LOGIN DROPDOWN -->
						</ul>
					</div>
					<!-- END TOP NAVIGATION MENU -->
				</div>
				<!-- END PAGE TOP -->
			</div>
			<!-- END HEADER INNER -->
		</div>
		<!-- END HEADER -->
		<div class="clearfix">
		</div>
		<!-- BEGIN CONTAINER -->
		<div class="page-container">
			<!-- BEGIN SIDEBAR -->
			<div class="page-sidebar-wrapper">
				<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
				<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
				<div class="page-sidebar md-shadow-z-2-i  navbar-collapse collapse">
					<!-- BEGIN SIDEBAR MENU -->
					<!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
					<!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
					<!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
					<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
					<!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
					<!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
					<?php
						if ($page_id == 1) {
							?>
								<ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
									<li class="start active">
										<a href="<?php echo base_url()?>vendor">
										<i class="fa fa-home"></i>
										<span class="title">Dashboard</span>
										</a>
									</li>
									<li>
										<a href="javascript:;">
										<i class="fa fa-gift"></i>
										<span class="title">Products</span>
										<span class="arrow "></span>
										</a>
										<ul class="sub-menu">
											<li >
												<a href="<?php echo base_url()?>vendor/products/publish">
												<i class="fa fa-check-square-o"></i>
												Publish Product</a>
											</li>
											<li>
												<a href="<?php echo base_url()?>vendor/products">
												<i class="fa fa-list"></i>
												List Products</a>
											</li>
											<li>
												<a href="javascript:;">
												<i class="fa fa-bookmark-o"></i>
												<span class="title">Categories</span>
												<span class="arrow "></span>
												</a>
												<ul class="sub-menu">
													<li >
														<a href="<?php echo base_url()?>vendor/products/categories/add">
														<i class="fa fa-check-square-o"></i>
														Publish Category</a>
													</li>
													<li>
														<a href="<?php echo base_url()?>vendor/products/categories">
														<i class="fa fa-list"></i>
														List Categories</a>
													</li>
												</ul>
											</li>
											<li>
												<a href="javascript:;">
												<i class="fa fa-tags"></i>
												<span class="title">Tags</span>
												<span class="arrow "></span>
												</a>
												<ul class="sub-menu">
													<li >
														<a href="<?php echo base_url()?>vendor/products/tags/add">
														<i class="fa fa-tag"></i>
														Publish Tag</a>
													</li>
													<li>
														<a href="<?php echo base_url()?>vendor/products/tags">
														<i class="fa fa-list"></i>
														List Tags</a>
													</li>
												</ul>
											</li>
										</ul>
									</li>
									<li>
										<a href="javascript:;">
										<i class="fa fa-shopping-cart"></i>
										<span class="title">Orders</span>
										<span class="arrow "></span>
										</a>
										<ul class="sub-menu">
											<li >
												<a href="<?php echo base_url()?>vendor/orders/new">
												<i class="fa fa-check-square-o"></i>
												New Order </a>
											</li>
											<li>
												<a href="<?php echo base_url()?>vendor/orders">
												<i class="fa fa-list"></i>
												List Orders</a>
											</li>
										</ul>
									</li>
									<li>
										<a href="javascript:;">
										<i class="fa fa-cog"></i>
										<span class="title">Settings</span>
										<span class="arrow "></span>
										</a>
										<ul class="sub-menu">
											<li>
												<a href="javascript:;">
												<i class="fa fa-user-secret"></i>
												<span class="title">Vendor Profile</span>
												<span class="arrow "></span>
												</a>
												<ul class="sub-menu">
													<li >
														<a href="<?php echo base_url()?>vendor/profile">
														<i class="fa fa-home"></i>
														Profile</a>
													</li>
													<li>
														<a href="<?php echo base_url()?>vendor/account-settings">
														<i class="fa fa-cogs"></i>
														Account Settings</a>
													</li>
												</ul>
											</li>
										</ul>
									</li>
								</ul>
							<?php
						} elseif ($page_id == 2) {
							?>
								<ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
									<li class="start ">
										<a href="<?php echo base_url()?>vendor">
										<i class="fa fa-home"></i>
										<span class="title">Dashboard</span>
										</a>
									</li>
									<li>
										<a href="javascript:;">
										<i class="fa fa-gift"></i>
										<span class="title">Products</span>
										<span class="arrow "></span>
										</a>
										<ul class="sub-menu">
											<li >
												<a href="<?php echo base_url()?>vendor/products/publish">
												<i class="fa fa-check-square-o"></i>
												Publish Product</a>
											</li>
											<li>
												<a href="<?php echo base_url()?>vendor/products">
												<i class="fa fa-list"></i>
												List Products</a>
											</li>
											<li>
												<a href="javascript:;">
												<i class="fa fa-bookmark-o"></i>
												<span class="title">Categories</span>
												<span class="arrow "></span>
												</a>
												<ul class="sub-menu">
													<li >
														<a href="<?php echo base_url()?>vendor/products/categories/add">
														<i class="fa fa-check-square-o"></i>
														Publish Category</a>
													</li>
													<li>
														<a href="<?php echo base_url()?>vendor/products/categories">
														<i class="fa fa-list"></i>
														List Categories</a>
													</li>
												</ul>
											</li>
											<li>
												<a href="javascript:;">
												<i class="fa fa-tags"></i>
												<span class="title">Tags</span>
												<span class="arrow "></span>
												</a>
												<ul class="sub-menu">
													<li >
														<a href="<?php echo base_url()?>vendor/products/tags/add">
														<i class="fa fa-tag"></i>
														Publish Tag</a>
													</li>
													<li>
														<a href="<?php echo base_url()?>vendor/products/tags">
														<i class="fa fa-list"></i>
														List Tags</a>
													</li>
												</ul>
											</li>
										</ul>
									</li>
									<li class="active">
										<a href="javascript:;">
										<i class="fa fa-shopping-cart"></i>
										<span class="title">Orders</span>
										<span class="arrow open"></span>
										</a>
										<ul class="sub-menu">
											<li >
												<a href="<?php echo base_url()?>vendor/orders/new">
												<i class="fa fa-check-square-o"></i>
												New Order </a>
											</li>
											<li class="active">
												<a href="<?php echo base_url()?>vendor/orders">
												<i class="fa fa-list"></i>
												List Orders</a>
											</li>
										</ul>
									</li>
									<li>
										<a href="javascript:;">
										<i class="fa fa-cog"></i>
										<span class="title">Settings</span>
										<span class="arrow "></span>
										</a>
										<ul class="sub-menu">
											<li>
												<a href="javascript:;">
												<i class="fa fa-user-secret"></i>
												<span class="title">Vendor Profile</span>
												<span class="arrow "></span>
												</a>
												<ul class="sub-menu">
													<li >
														<a href="<?php echo base_url()?>vendor/profile">
														<i class="fa fa-home"></i>
														Profile</a>
													</li>
													<li>
														<a href="<?php echo base_url()?>vendor/account-settings">
														<i class="fa fa-cogs"></i>
														Account Settings</a>
													</li>
												</ul>
											</li>
										</ul>
									</li>
								</ul>
							<?php
						} elseif ($page_id == 3) {
							?>
								<ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
									<li class="start ">
										<a href="<?php echo base_url()?>vendor">
										<i class="fa fa-home"></i>
										<span class="title">Dashboard</span>
										</a>
									</li>
									<li class="active">
										<a href="javascript:;">
										<i class="fa fa-gift"></i>
										<span class="title">Products</span>
										<span class="arrow open"></span>
										</a>
										<ul class="sub-menu">
											<li >
												<a href="<?php echo base_url()?>vendor/products/publish">
												<i class="fa fa-check-square-o"></i>
												Publish Product</a>
											</li>
											<li>
												<a href="<?php echo base_url()?>vendor/products">
												<i class="fa fa-list"></i>
												List Products</a>
											</li>
											<li>
												<a href="javascript:;">
												<i class="fa fa-bookmark-o"></i>
												<span class="title">Categories</span>
												<span class="arrow "></span>
												</a>
												<ul class="sub-menu">
													<li >
														<a href="<?php echo base_url()?>vendor/products/categories/add">
														<i class="fa fa-check-square-o"></i>
														Publish Category</a>
													</li>
													<li>
														<a href="<?php echo base_url()?>vendor/products/categories">
														<i class="fa fa-list"></i>
														List Categories</a>
													</li>
												</ul>
											</li>
											<li>
												<a href="javascript:;">
												<i class="fa fa-tags"></i>
												<span class="title">Tags</span>
												<span class="arrow "></span>
												</a>
												<ul class="sub-menu">
													<li >
														<a href="<?php echo base_url()?>vendor/products/tags/add">
														<i class="fa fa-tag"></i>
														Publish Tag</a>
													</li>
													<li>
														<a href="<?php echo base_url()?>vendor/products/tags">
														<i class="fa fa-list"></i>
														List Tags</a>
													</li>
												</ul>
											</li>
										</ul>
									</li>
									<li >
										<a href="javascript:;">
										<i class="fa fa-shopping-cart"></i>
										<span class="title">Orders</span>
										<span class="arrow "></span>
										</a>
										<ul class="sub-menu">
											<li >
												<a href="<?php echo base_url()?>vendor/orders/new">
												<i class="fa fa-check-square-o"></i>
												New Order </a>
											</li>
											<li >
												<a href="<?php echo base_url()?>vendor/orders">
												<i class="fa fa-list"></i>
												List Orders</a>
											</li>
										</ul>
									</li>
									<li>
										<a href="javascript:;">
										<i class="fa fa-cog"></i>
										<span class="title">Settings</span>
										<span class="arrow "></span>
										</a>
										<ul class="sub-menu">
											<li>
												<a href="javascript:;">
												<i class="fa fa-user-secret"></i>
												<span class="title">Vendor Profile</span>
												<span class="arrow "></span>
												</a>
												<ul class="sub-menu">
													<li >
														<a href="<?php echo base_url()?>vendor/profile">
														<i class="fa fa-home"></i>
														Profile</a>
													</li>
													<li>
														<a href="<?php echo base_url()?>vendor/account-settings">
														<i class="fa fa-cogs"></i>
														Account Settings</a>
													</li>
												</ul>
											</li>
										</ul>
									</li>
								</ul>
							<?php
						} elseif ($page_id == 4) {
							?>
								<ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
									<li class="start ">
										<a href="<?php echo base_url()?>vendor">
										<i class="fa fa-home"></i>
										<span class="title">Dashboard</span>
										</a>
									</li>
									<li class="active">
										<a href="javascript:;">
										<i class="fa fa-gift"></i>
										<span class="title">Products</span>
										<span class="arrow open"></span>
										</a>
										<ul class="sub-menu">
											<li >
												<a href="<?php echo base_url()?>vendor/products/publish">
												<i class="fa fa-check-square-o"></i>
												Publish Product</a>
											</li>
											<li class="active">
												<a href="<?php echo base_url()?>vendor/products">
												<i class="fa fa-list"></i>
												List Products</a>
											</li>
											<li>
												<a href="javascript:;">
												<i class="fa fa-bookmark-o"></i>
												<span class="title">Categories</span>
												<span class="arrow "></span>
												</a>
												<ul class="sub-menu">
													<li >
														<a href="<?php echo base_url()?>vendor/products/categories/add">
														<i class="fa fa-check-square-o"></i>
														Publish Category</a>
													</li>
													<li>
														<a href="<?php echo base_url()?>vendor/products/categories">
														<i class="fa fa-list"></i>
														List Categories</a>
													</li>
												</ul>
											</li>
											<li>
												<a href="javascript:;">
												<i class="fa fa-tags"></i>
												<span class="title">Tags</span>
												<span class="arrow "></span>
												</a>
												<ul class="sub-menu">
													<li >
														<a href="<?php echo base_url()?>vendor/products/tags/add">
														<i class="fa fa-tag"></i>
														Publish Tag</a>
													</li>
													<li>
														<a href="<?php echo base_url()?>vendor/products/tags">
														<i class="fa fa-list"></i>
														List Tags</a>
													</li>
												</ul>
											</li>
										</ul>
									</li>
									<li >
										<a href="javascript:;">
										<i class="fa fa-shopping-cart"></i>
										<span class="title">Orders</span>
										<span class="arrow "></span>
										</a>
										<ul class="sub-menu">
											<li >
												<a href="<?php echo base_url()?>vendor/orders/new">
												<i class="fa fa-check-square-o"></i>
												New Order </a>
											</li>
											<li >
												<a href="<?php echo base_url()?>vendor/orders">
												<i class="fa fa-list"></i>
												List Orders</a>
											</li>
										</ul>
									</li>
									<li>
										<a href="javascript:;">
										<i class="fa fa-cog"></i>
										<span class="title">Settings</span>
										<span class="arrow "></span>
										</a>
										<ul class="sub-menu">
											<li>
												<a href="javascript:;">
												<i class="fa fa-user-secret"></i>
												<span class="title">Vendor Profile</span>
												<span class="arrow "></span>
												</a>
												<ul class="sub-menu">
													<li >
														<a href="<?php echo base_url()?>vendor/profile">
														<i class="fa fa-home"></i>
														Profile</a>
													</li>
													<li>
														<a href="<?php echo base_url()?>vendor/account-settings">
														<i class="fa fa-cogs"></i>
														Account Settings</a>
													</li>
												</ul>
											</li>
										</ul>
									</li>
								</ul>
							<?php
						} elseif ($page_id == 5) {
							?>
								<ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
									<li class="start ">
										<a href="<?php echo base_url()?>vendor">
										<i class="fa fa-home"></i>
										<span class="title">Dashboard</span>
										</a>
									</li>
									<li class="active">
										<a href="javascript:;">
										<i class="fa fa-gift"></i>
										<span class="title">Products</span>
										<span class="arrow open"></span>
										</a>
										<ul class="sub-menu">
											<li >
												<a href="<?php echo base_url()?>vendor/products/publish">
												<i class="fa fa-check-square-o"></i>
												Publish Product</a>
											</li>
											<li>
												<a href="<?php echo base_url()?>vendor/products">
												<i class="fa fa-list"></i>
												List Products</a>
											</li>
											<li class="active">
												<a href="javascript:;">
												<i class="fa fa-bookmark-o"></i>
												<span class="title">Categories</span>
												<span class="arrow open"></span>
												</a>
												<ul class="sub-menu">
													<li >
														<a href="<?php echo base_url()?>vendor/products/categories/add">
														<i class="fa fa-check-square-o"></i>
														Publish Category</a>
													</li>
													<li class="active">
														<a href="<?php echo base_url()?>vendor/products/categories">
														<i class="fa fa-list"></i>
														List Categories</a>
													</li>
												</ul>
											</li>
											<li>
												<a href="javascript:;">
												<i class="fa fa-tags"></i>
												<span class="title">Tags</span>
												<span class="arrow "></span>
												</a>
												<ul class="sub-menu">
													<li >
														<a href="<?php echo base_url()?>vendor/products/tags/add">
														<i class="fa fa-tag"></i>
														Publish Tag</a>
													</li>
													<li>
														<a href="<?php echo base_url()?>vendor/products/tags">
														<i class="fa fa-list"></i>
														List Tags</a>
													</li>
												</ul>
											</li>
										</ul>
									</li>
									<li >
										<a href="javascript:;">
										<i class="fa fa-shopping-cart"></i>
										<span class="title">Orders</span>
										<span class="arrow "></span>
										</a>
										<ul class="sub-menu">
											<li >
												<a href="<?php echo base_url()?>vendor/orders/new">
												<i class="fa fa-check-square-o"></i>
												New Order </a>
											</li>
											<li >
												<a href="<?php echo base_url()?>vendor/orders">
												<i class="fa fa-list"></i>
												List Orders</a>
											</li>
										</ul>
									</li>
									<li>
										<a href="javascript:;">
										<i class="fa fa-cog"></i>
										<span class="title">Settings</span>
										<span class="arrow "></span>
										</a>
										<ul class="sub-menu">
											<li>
												<a href="javascript:;">
												<i class="fa fa-user-secret"></i>
												<span class="title">Vendor Profile</span>
												<span class="arrow "></span>
												</a>
												<ul class="sub-menu">
													<li >
														<a href="<?php echo base_url()?>vendor/profile">
														<i class="fa fa-home"></i>
														Profile</a>
													</li>
													<li>
														<a href="<?php echo base_url()?>vendor/account-settings">
														<i class="fa fa-cogs"></i>
														Account Settings</a>
													</li>
												</ul>
											</li>
										</ul>
									</li>
								</ul>
							<?php
						} elseif ($page_id == 6) {
							?>
								<ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
									<li class="start ">
										<a href="<?php echo base_url()?>vendor">
										<i class="fa fa-home"></i>
										<span class="title">Dashboard</span>
										</a>
									</li>
									<li class="active">
										<a href="javascript:;">
										<i class="fa fa-gift"></i>
										<span class="title">Products</span>
										<span class="arrow open"></span>
										</a>
										<ul class="sub-menu">
											<li >
												<a href="<?php echo base_url()?>vendor/products/publish">
												<i class="fa fa-check-square-o"></i>
												Publish Product</a>
											</li>
											<li>
												<a href="<?php echo base_url()?>vendor/products">
												<i class="fa fa-list"></i>
												List Products</a>
											</li>
											<li>
												<a href="javascript:;">
												<i class="fa fa-bookmark-o"></i>
												<span class="title">Categories</span>
												<span class="arrow "></span>
												</a>
												<ul class="sub-menu">
													<li >
														<a href="<?php echo base_url()?>vendor/products/categories/add">
														<i class="fa fa-check-square-o"></i>
														Publish Category</a>
													</li>
													<li>
														<a href="<?php echo base_url()?>vendor/products/categories">
														<i class="fa fa-list"></i>
														List Categories</a>
													</li>
												</ul>
											</li>
											<li class="active">
												<a href="javascript:;">
												<i class="fa fa-tags"></i>
												<span class="title">Tags</span>
												<span class="arrow open"></span>
												</a>
												<ul class="sub-menu">
													<li >
														<a href="<?php echo base_url()?>vendor/products/tags/add">
														<i class="fa fa-tag"></i>
														Publish Tag</a>
													</li>
													<li class="active">
														<a href="<?php echo base_url()?>vendor/products/tags">
														<i class="fa fa-list"></i>
														List Tags</a>
													</li>
												</ul>
											</li>
										</ul>
									</li>
									<li >
										<a href="javascript:;">
										<i class="fa fa-shopping-cart"></i>
										<span class="title">Orders</span>
										<span class="arrow "></span>
										</a>
										<ul class="sub-menu">
											<li >
												<a href="<?php echo base_url()?>vendor/orders/new">
												<i class="fa fa-check-square-o"></i>
												New Order </a>
											</li>
											<li >
												<a href="<?php echo base_url()?>vendor/orders">
												<i class="fa fa-list"></i>
												List Orders</a>
											</li>
										</ul>
									</li>
									<li>
										<a href="javascript:;">
										<i class="fa fa-cog"></i>
										<span class="title">Settings</span>
										<span class="arrow "></span>
										</a>
										<ul class="sub-menu">
											<li>
												<a href="javascript:;">
												<i class="fa fa-user-secret"></i>
												<span class="title">Vendor Profile</span>
												<span class="arrow "></span>
												</a>
												<ul class="sub-menu">
													<li >
														<a href="<?php echo base_url()?>vendor/profile">
														<i class="fa fa-home"></i>
														Profile</a>
													</li>
													<li>
														<a href="<?php echo base_url()?>vendor/account-settings">
														<i class="fa fa-cogs"></i>
														Account Settings</a>
													</li>
												</ul>
											</li>
										</ul>
									</li>
								</ul>
							<?php
						} elseif ($page_id == 7) {
							?>
								<ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
									<li class="start ">
										<a href="<?php echo base_url()?>vendor">
										<i class="fa fa-home"></i>
										<span class="title">Dashboard</span>
										</a>
									</li>
									<li class="active">
										<a href="javascript:;">
										<i class="fa fa-gift"></i>
										<span class="title">Products</span>
										<span class="arrow open"></span>
										</a>
										<ul class="sub-menu">
											<li class="active">
												<a href="<?php echo base_url()?>vendor/products/publish">
												<i class="fa fa-check-square-o"></i>
												Publish Product</a>
											</li>
											<li>
												<a href="<?php echo base_url()?>vendor/products">
												<i class="fa fa-list"></i>
												List Products</a>
											</li>
											<li>
												<a href="javascript:;">
												<i class="fa fa-bookmark-o"></i>
												<span class="title">Categories</span>
												<span class="arrow "></span>
												</a>
												<ul class="sub-menu">
													<li >
														<a href="<?php echo base_url()?>vendor/products/categories/add">
														<i class="fa fa-check-square-o"></i>
														Publish Category</a>
													</li>
													<li>
														<a href="<?php echo base_url()?>vendor/products/categories">
														<i class="fa fa-list"></i>
														List Categories</a>
													</li>
												</ul>
											</li>
											<li >
												<a href="javascript:;">
												<i class="fa fa-tags"></i>
												<span class="title">Tags</span>
												<span class="arrow "></span>
												</a>
												<ul class="sub-menu">
													<li >
														<a href="<?php echo base_url()?>vendor/products/tags/add">
														<i class="fa fa-tag"></i>
														Publish Tag</a>
													</li>
													<li>
														<a href="<?php echo base_url()?>vendor/products/tags">
														<i class="fa fa-list"></i>
														List Tags</a>
													</li>
												</ul>
											</li>
										</ul>
									</li>
									<li >
										<a href="javascript:;">
										<i class="fa fa-shopping-cart"></i>
										<span class="title">Orders</span>
										<span class="arrow "></span>
										</a>
										<ul class="sub-menu">
											<li >
												<a href="<?php echo base_url()?>vendor/orders/new">
												<i class="fa fa-check-square-o"></i>
												New Order </a>
											</li>
											<li >
												<a href="<?php echo base_url()?>vendor/orders">
												<i class="fa fa-list"></i>
												List Orders</a>
											</li>
										</ul>
									</li>
									<li>
										<a href="javascript:;">
										<i class="fa fa-cog"></i>
										<span class="title">Settings</span>
										<span class="arrow "></span>
										</a>
										<ul class="sub-menu">
											<li>
												<a href="javascript:;">
												<i class="fa fa-user-secret"></i>
												<span class="title">Vendor Profile</span>
												<span class="arrow "></span>
												</a>
												<ul class="sub-menu">
													<li >
														<a href="<?php echo base_url()?>vendor/profile">
														<i class="fa fa-home"></i>
														Profile</a>
													</li>
													<li>
														<a href="<?php echo base_url()?>vendor/account-settings">
														<i class="fa fa-cogs"></i>
														Account Settings</a>
													</li>
												</ul>
											</li>
										</ul>
									</li>
								</ul>
							<?php
						} elseif ($page_id == 8) {
							?>
								<ul class="page-sidebar-menu page-sidebar-menu-closed" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
									<li class="start ">
										<a href="<?php echo base_url()?>vendor">
										<i class="fa fa-home"></i>
										<span class="title">Dashboard</span>
										</a>
									</li>
									<li>
										<a href="javascript:;">
										<i class="fa fa-gift"></i>
										<span class="title">Products</span>
										<span class="arrow "></span>
										</a>
										<ul class="sub-menu">
											<li>
												<a href="<?php echo base_url()?>vendor/products/publish">
												<i class="fa fa-check-square-o"></i>
												Publish Product</a>
											</li>
											<li>
												<a href="<?php echo base_url()?>vendor/products">
												<i class="fa fa-list"></i>
												List Products</a>
											</li>
											<li>
												<a href="javascript:;">
												<i class="fa fa-bookmark-o"></i>
												<span class="title">Categories</span>
												<span class="arrow "></span>
												</a>
												<ul class="sub-menu">
													<li >
														<a href="<?php echo base_url()?>vendor/products/categories/add">
														<i class="fa fa-check-square-o"></i>
														Publish Category</a>
													</li>
													<li>
														<a href="<?php echo base_url()?>vendor/products/categories">
														<i class="fa fa-list"></i>
														List Categories</a>
													</li>
												</ul>
											</li>
											<li >
												<a href="javascript:;">
												<i class="fa fa-tags"></i>
												<span class="title">Tags</span>
												<span class="arrow "></span>
												</a>
												<ul class="sub-menu">
													<li >
														<a href="<?php echo base_url()?>vendor/products/tags/add">
														<i class="fa fa-tag"></i>
														Publish Tag</a>
													</li>
													<li>
														<a href="<?php echo base_url()?>vendor/products/tags">
														<i class="fa fa-list"></i>
														List Tags</a>
													</li>
												</ul>
											</li>
										</ul>
									</li>
									<li >
										<a href="javascript:;">
										<i class="fa fa-shopping-cart"></i>
										<span class="title">Orders</span>
										<span class="arrow "></span>
										</a>
										<ul class="sub-menu">
											<li >
												<a href="<?php echo base_url()?>vendor/orders/new">
												<i class="fa fa-check-square-o"></i>
												New Order </a>
											</li>
											<li >
												<a href="<?php echo base_url()?>vendor/orders">
												<i class="fa fa-list"></i>
												List Orders</a>
											</li>
										</ul>
									</li>
									<li class="active">
										<a href="javascript:;">
										<i class="fa fa-cog"></i>
										<span class="title">Settings</span>
										<span class="arrow open"></span>
										</a>
										<ul class="sub-menu">
											<li class="active">
												<a href="javascript:;">
												<i class="fa fa-user-secret"></i>
												<span class="title">Vendor Profile</span>
												<span class="arrow open"></span>
												</a>
												<ul class="sub-menu">
													<li >
														<a href="<?php echo base_url()?>vendor/profile">
														<i class="fa fa-home"></i>
														Profile</a>
													</li>
													<li class="active">
														<a href="<?php echo base_url()?>vendor/account-settings">
														<i class="fa fa-cogs"></i>
														Account Settings</a>
													</li>
												</ul>
											</li>
										</ul>
									</li>
								</ul>
							<?php
						}
					?>
					<!-- END SIDEBAR MENU -->
				</div>
			</div>
			<!-- END SIDEBAR -->