	<title><?php echo 'Order #', $title, ' | ', $name_of_store?></title>
</head>
<?php $i=0?>
<body class="page-md page-header-fixed page-sidebar-closed-hide-logo page-sidebar-fixed page-sidebar-closed-hide-logo">
<!-- BEGIN HEADER -->
<div class="page-header md-shadow-z-1-i navbar navbar-fixed-top">
	<!-- BEGIN HEADER INNER -->
	<div class="page-header-inner">
		<!-- BEGIN LOGO -->
		<div class="page-logo">
			<!-- <a href="<?php echo base_url()?>admin">
			<img src="../../assets/admin/layout4/img/logo-light.png" alt="logo" class="logo-default"/>
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
						<a data-target="#stack1" data-toggle="modal" href="#stack1">
						<i class="fa fa-check-square-o"></i> <?php echo $this->lang->line('publish_category_heading')?> </a>
					</li>
					<li>
						<a data-target="#stack3" data-toggle="modal" href="#stack3">
						<i class="fa fa-tag"></i> <?php echo $this->lang->line('publish_tag_heading')?> </a>
					</li>
					<li class="divider">
					</li>
					<li>
						<a href="javascript:;">
						<i class="icon-flag"></i> Comments <span class="badge badge-success">4</span>
						</a>
					</li>
					<li>
						<a href="javascript:;">
						<i class="icon-users"></i> Feedbacks <span class="badge badge-danger">2</span>
						</a>
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
					<li class="dropdown dropdown-extended dropdown-notification dropdown-dark">
						<a href="<?php echo base_url()?>" class="dropdown-toggle" title="Go Shopping" target="_blank">
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
						<?php echo $user_account->first_name?> <?php echo $user_account->last_name?> </span>
						<!-- DOC: Do not remove below empty space(&nbsp;) as its purposely used --><?php
							$query = $user_account->image;
							if (empty($query)) {
								$user_icon = 'avatar.png';
							} else {
								$user_icon = 'attachments/users/'.$user_account->image;
							}
						?>
						<img alt="" class="img-circle" src="<?php echo base_url()?>public/<?php echo $user_icon?>"/>
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
								<a href="<?php echo base_url()?>logout">
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
			<ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
				<li class="start ">
					<a href="<?php echo base_url()?>admin">
					<i class="fa fa-home"></i>
					<span class="title">Dashboard</span>
					</a>
				</li>
				<li>
					<a href="javascript:;">
					<i class="fa fa-users"></i>
					<span class="title">Users</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="<?php echo base_url()?>admin/users/create">
							<i class="fa fa-plus"></i>
							Create User</a>
						</li>
						<li>
							<a href="<?php echo base_url()?>admin/users">
							<i class="fa fa-list"></i>
							List Users</a>
						</li>
						<li>
							<a href="javascript:;">
							<i class="fa fa-user"></i>
							<span class="title">User Profile</span>
							<span class="arrow "></span>
							</a>
							<ul class="sub-menu">
								<li>
									<a href="<?php echo base_url()?>admin/profile">
									<i class="fa fa-home"></i>
									Profile</a>
								</li>
								<li>
									<a href="<?php echo base_url()?>admin/account">
									<i class="fa fa-cogs"></i>
									Account Settings</a>
								</li>
								<li>
									<a href="<?php echo base_url()?>admin/tasks">
									<i class="fa fa-check-square-o"></i>
									Tasks</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="javascript:;">
							<i class="fa fa-users"></i>
							<span class="title">User Groups</span>
							<span class="arrow "></span>
							</a>
							<ul class="sub-menu">
								<li>
									<a href="<?php echo base_url()?>admin/groups/create">
									<i class="fa fa-plus"></i>
									Create User Group</a>
								</li>
								<li>
									<a href="<?php echo base_url()?>admin/groups">
									<i class="fa fa-list"></i>
									List User Group</a>
								</li>
							</ul>
						</li>
					</ul>
				</li>
				<li >
					<a href="javascript:;">
					<i class="fa fa-gift"></i>
					<span class="title">Products</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li >
							<a href="<?php echo base_url()?>admin/products/publish">
							<i class="fa fa-check-square-o"></i>
							Publish Product</a>
						</li>
						<li>
							<a href="<?php echo base_url()?>admin/products">
							<i class="fa fa-list"></i>
							List Products</a>
						</li>
						<li >
							<a href="javascript:;">
							<i class="fa fa-bookmark-o"></i>
							<span class="title">Categories</span>
							<span class="arrow "></span>
							</a>
							<ul class="sub-menu">
								<li >
									<a href="<?php echo base_url()?>admin/products/categories/add">
									<i class="fa fa-check-square-o"></i>
									Publish Category</a>
								</li>
								<li>
									<a href="<?php echo base_url()?>admin/products/categories">
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
									<a href="<?php echo base_url()?>admin/products/tags/add">
									<i class="fa fa-tag"></i>
									Publish Tags</a>
								</li>
								<li>
									<a href="<?php echo base_url()?>admin/products/tags">
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
						<li  >
							<a href="<?php echo base_url()?>admin/orders/new">
							<i class="fa fa-check-square-o"></i>
							New Order </a>
						</li>
						<li >
							<a href="<?php echo base_url()?>admin/orders">
							<i class="fa fa-list"></i>
							List Orders</a>
						</li>
						<li>
							<a href="javascript:;">
							<i class="fa fa-star-half-o"></i>
							<span class="title">Order Status</span>
							<span class="arrow "></span>
							</a>
							<ul class="sub-menu">
								<li>
									<a href="<?php echo base_url()?>admin/orders/status/add">
									<i class="fa fa-plus"></i>
									Add Status</a>
								</li>
								<li>
									<a href="<?php echo base_url()?>admin/orders/statuses">
									<i class="fa fa-list"></i>
									List Statuses</a>
								</li>
							</ul>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;">
					<i class="fa fa-money"></i>
					<span class="title">Payments</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li >
							<a href="<?php echo base_url()?>admin/payments/new">
							<i class="fa fa-check-square-o"></i>
							New Payment </a>
						</li>
						<li>
							<a href="<?php echo base_url()?>admin/payments">
							<i class="fa fa-list"></i>
							List Payment</a>
						</li>
						<li>
							<a href="javascript:;">
							<i class="fa fa-money"></i>
							<span class="title">Modes of Payment</span>
							<span class="arrow "></span>
							</a>
							<ul class="sub-menu">
								<li >
									<a href="<?php echo base_url()?>admin/payments/add-mode">
									<i class="fa fa-check-square-o"></i>
									Add Mode of Payment</a>
								</li>
								<li>
									<a href="<?php echo base_url()?>admin/payments/modes">
									<i class="fa fa-list"></i>
									Modes of Payment</a>
								</li>
								
							</ul>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;">
					<i class="fa fa-paper-plane-o"></i>
					<span class="title">Shipments</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li >
							<a href="<?php echo base_url()?>admin/shipments/add">
							<i class="fa fa-check-square-o"></i>
							Add Shipment </a>
						</li>
						<li>
							<a href="<?php echo base_url()?>admin/payments">
							<i class="fa fa-list"></i>
							List Shipments</a>
						</li>
					</ul>
				</li>
				<li class="last">
					<a href="javascript:;">
					<i class="fa fa-cogs"></i>
					<span class="title">Settings</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li >
							<a href="<?php echo base_url()?>admin/orders/new">
							<i class="fa fa-cog"></i>
							<?php echo lang('general_settings_heading')?> </a>
						</li>
						<li>
							<a href="<?php echo base_url()?>admin/settings/m-pesa-credentials">
							<i class="fa fa-money"></i>
							<?php echo $this->lang->line('m_pesa_credentials_heading')?>  </a>
						</li>
						<li>
							<a href="<?php echo base_url()?>admin/settings/stripe-credentials">
							<i class="fa fa-money"></i>
							<?php echo $this->lang->line('stripe_credentials_heading')?>  </a>
						</li>
					</ul>
				</li>
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 class="modal-title">Modal title</h4>
						</div>
						<div class="modal-body">
							 Widget settings form goes here
						</div>
						<div class="modal-footer">
							<button type="button" class="btn blue">Save changes</button>
							<button type="button" class="btn default" data-dismiss="modal">Close</button>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN PAGE HEADER-->
			<!-- BEGIN PAGE HEAD -->
			<div class="page-head">
				<!-- BEGIN PAGE TITLE -->
				<div class="page-title">
					<h1>Order View <small>view order details</small></h1>
				</div>
				<!-- END PAGE TITLE -->
				<!-- BEGIN PAGE TOOLBAR -->
				<div class="page-toolbar">
					<!-- BEGIN THEME PANEL -->
					<div class="btn-group btn-theme-panel">
						<a href="javascript:;" class="btn dropdown-toggle" data-toggle="dropdown">
						<i class="icon-settings"></i>
						</a>
						<div class="dropdown-menu theme-panel pull-right dropdown-custom hold-on-click">
							<div class="row">
								<div class="col-md-4 col-sm-4 col-xs-12">
									<h3>THEME</h3>
									<ul class="theme-colors">
										<li class="theme-color theme-color-default active" data-theme="default">
											<span class="theme-color-view"></span>
											<span class="theme-color-name">Dark Header</span>
										</li>
										<li class="theme-color theme-color-light" data-theme="light">
											<span class="theme-color-view"></span>
											<span class="theme-color-name">Light Header</span>
										</li>
									</ul>
								</div>
								<div class="col-md-8 col-sm-8 col-xs-12 seperator">
									<h3>LAYOUT</h3>
									<ul class="theme-settings">
										<li>
											 Theme Style
											<select class="layout-style-option form-control input-small input-sm">
												<option value="square" selected="selected">Square corners</option>
												<option value="rounded">Rounded corners</option>
											</select>
										</li>
										<li>
											 Layout
											<select class="layout-option form-control input-small input-sm">
												<option value="fluid" selected="selected">Fluid</option>
												<option value="boxed">Boxed</option>
											</select>
										</li>
										<li>
											 Header
											<select class="page-header-option form-control input-small input-sm">
												<option value="fixed" selected="selected">Fixed</option>
												<option value="default">Default</option>
											</select>
										</li>
										<li>
											 Top Dropdowns
											<select class="page-header-top-dropdown-style-option form-control input-small input-sm">
												<option value="light">Light</option>
												<option value="dark" selected="selected">Dark</option>
											</select>
										</li>
										<li>
											 Sidebar Mode
											<select class="sidebar-option form-control input-small input-sm">
												<option value="fixed">Fixed</option>
												<option value="default" selected="selected">Default</option>
											</select>
										</li>
										<li>
											 Sidebar Menu
											<select class="sidebar-menu-option form-control input-small input-sm">
												<option value="accordion" selected="selected">Accordion</option>
												<option value="hover">Hover</option>
											</select>
										</li>
										<li>
											 Sidebar Position
											<select class="sidebar-pos-option form-control input-small input-sm">
												<option value="left" selected="selected">Left</option>
												<option value="right">Right</option>
											</select>
										</li>
										<li>
											 Footer
											<select class="page-footer-option form-control input-small input-sm">
												<option value="fixed">Fixed</option>
												<option value="default" selected="selected">Default</option>
											</select>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<!-- END THEME PANEL -->
				</div>
				<!-- END PAGE TOOLBAR -->
			</div>
			<!-- END PAGE HEAD -->
			<!-- BEGIN PAGE BREADCRUMB -->
			<ul class="page-breadcrumb breadcrumb">
				<li>
					<a href="<?php echo base_url()?>admin">Home</a>
					<i class="fa fa-circle"></i>
				</li>
				<li class="active">
					Order View
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->		
			<?php
		        if ($this->session->flashdata('message')) {
		        	?>
			            <div class="alert alert-info">
			                <button type="button" class="close" data-dismiss="alert"></button>
			                <div id="infoMessage"> <?php echo '<strong>Info! </strong>', $message?> </div>
			            </div>
		            <?php
		        }
		    ?>
			<div class="row">
				<div class="col-md-12">
					<!-- Begin: life time stats -->
					<div class="portlet light">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-shopping-cart font-green-sharp"></i>
								<span class="caption-subject font-green-sharp bold uppercase">
								Order #<?php echo $order->order_id?> </span>
								<span class="caption-helper"><?php echo date('jS M, Y', $order->order_id)?> at <?php echo date('H:i:s', $order->order_id)?> </span>
							</div>
							<div class="actions">
								<a href="javascript:;" class="btn btn-default btn-circle">
								<i class="fa fa-angle-left"></i>
								<span class="hidden-480">
								Back </span>
								</a>
								<div class="btn-group">
									<a class="btn btn-default btn-circle" href="javascript:;" data-toggle="dropdown">
									<i class="fa fa-cog"></i>
									<span class="hidden-480">
									Tools </span>
									<i class="fa fa-angle-down"></i>
									</a>
									<ul class="dropdown-menu pull-right">
										<li>
											<a href="javascript:;">
											Export to Excel </a>
										</li>
										<li>
											<a href="javascript:;">
											Export to CSV </a>
										</li>
										<li>
											<a href="javascript:;">
											Export to XML </a>
										</li>
										<li class="divider">
										</li>
										<li>
											<a href="javascript:;">
											Print Invoice </a>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="portlet-body">
							<div class="tabbable">
								<ul class="nav nav-tabs nav-tabs-lg">
									<li class="active">
										<a href="#tab_1" data-toggle="tab">
										Details </a>
									</li>
									<li>
										<a href="#tab_2" data-toggle="tab">
										Invoices <span class="badge badge-success">
										4 </span>
										</a>
									</li>
									<li>
										<a href="#tab_3" data-toggle="tab">
										Credit Memos </a>
									</li>
									<li>
										<a href="#tab_4" data-toggle="tab">
										Shipments <span class="badge badge-danger">
										2 </span>
										</a>
									</li>
									<li>
										<a href="#tab_5" data-toggle="tab">
										History </a>
									</li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane active" id="tab_1">
										<div class="row">
											<div class="col-md-6 col-sm-12">
												<div class="portlet yellow-crusta box">
													<div class="portlet-title">
														<div class="caption">
															<i class="fa fa-cogs"></i>Order Details
														</div>
														<div class="actions">
															<a href="javascript:;" class="btn btn-default btn-sm">
															<i class="fa fa-pencil"></i> Edit </a>
														</div>
													</div>
													<div class="portlet-body">
														<div class="row static-info">
															<div class="col-md-5 name">
																 Order #:
															</div>
															<div class="col-md-7 value">
																 <?php echo $order->order_id?> <span class="label label-info label-sm">
																Email confirmation was sent </span>
															</div>
														</div>
														<div class="row static-info">
															<div class="col-md-5 name">
																 Order Date & Time:
															</div>
															<div class="col-md-7 value">
																 <?php echo date('jS M, Y', $order->order_id)?> at <?php echo date('H:i:s', $order->order_id)?> 
															</div>
														</div>
														<div class="row static-info">
															<div class="col-md-5 name">
																 Order Status:
															</div>
															<?php
					                                          if ($order->status == 0) {
					                                            ?>
					                                            	<div class="col-md-7 value">
					                                              		<span class="label label-sm label-danger">Pending</span>
					                                            	</div>
					                                            <?php
					                                          } elseif ($order->status == 1) {
					                                            ?>
						                                            <div class="col-md-7 value">
						                                            	<span class="label label-sm label-info">Processed</span>
						                                            </div>  
					                                            <?php
					                                          } elseif ($order->status == 2) {
					                                            ?>
					                                            	<div class="col-md-7 value">
					                                              		<span class="label label-sm label-warning">In Transit</span>
					                                              	</div>
					                                            <?php
					                                          } elseif ($order->status == 3) {
					                                            ?>
					                                            	<div class="col-md-7 value">
					                                            		<span class="label label-sm label-default">Cancelled</span>
					                                            	</div>
					                                            <?php
					                                          } else {
					                                            ?>
					                                            	<div class="col-md-7 value">
					                                            		<span class="label label-sm label-success">Delivered & Closed</span>
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
																	$fee = $this->db->get_where('shipment', ['ship_to' => $order->subcounty])->row();
																	$shipment_fee = $fee->fee;
																	$total_order_cost = $order->total_orders;
																	echo $store_currency, ' ',number_format($shipment_fee + $total_order_cost, 2) ;
																?>
															</div>
														</div>
														<div class="row static-info">
															<div class="col-md-5 name">
																 Payment Information:
															</div>
															<div class="col-md-7 value">
																<?php echo $order->method_of_payment?>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-6 col-sm-12">
												<div class="portlet blue-hoki box">
													<div class="portlet-title">
														<div class="caption">
															<i class="fa fa-cogs"></i>Customer Information
														</div>
														<div class="actions">
															<a href="javascript:;" class="btn btn-default btn-sm">
															<i class="fa fa-pencil"></i> Edit </a>
														</div>
													</div>
													<div class="portlet-body">
														<div class="row static-info">
															<div class="col-md-5 name">
																 Customer Name:
															</div>
															<div class="col-md-7 value">
																<?php echo $order->first_name?> <?php echo $order->last_name?>
															</div>
														</div>
														<div class="row static-info">
															<div class="col-md-5 name">
																 Email:
															</div>
															<div class="col-md-7 value">
																 <?php echo $order->email?>
															</div>
														</div>
														<div class="row static-info">
															<div class="col-md-5 name">
																 State:
															</div>
															<div class="col-md-7 value">
																<?php echo $order->subcounty?>
															</div>
														</div>
														<div class="row static-info">
															<div class="col-md-5 name">
																 Phone Number:
															</div>
															<div class="col-md-7 value">
																<?php echo $order->phone?>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<!-- <div class="col-md-6 col-sm-12">
												<div class="portlet green-meadow box">
													<div class="portlet-title">
														<div class="caption">
															<i class="fa fa-cogs"></i>Billing Address
														</div>
														<div class="actions">
															<a href="javascript:;" class="btn btn-default btn-sm">
															<i class="fa fa-pencil"></i> Edit </a>
														</div>
													</div>
													<div class="portlet-body">
														<div class="row static-info">
															<div class="col-md-12 value">
																 Jhon Done<br>
																 #24 Park Avenue Str<br>
																 New York<br>
																 Connecticut, 23456 New York<br>
																 United States<br>
																 T: 123123232<br>
																 F: 231231232<br>
															</div>
														</div>
													</div>
												</div>
											</div> -->
											<div class="col-md-6 col-sm-12">
												<div class="portlet red-sunglo box">
													<div class="portlet-title">
														<div class="caption">
															<i class="fa fa-cogs"></i>Shipping Address
														</div>
														<div class="actions">
															<a href="javascript:;" class="btn btn-default btn-sm">
															<i class="fa fa-pencil"></i> Edit </a>
														</div>
													</div>
													<div class="portlet-body">
														<div class="row static-info">
															<div class="col-md-12 value">
																<?php echo $order->first_name?> <?php echo $order->last_name?><br>
																 <?php echo $order->address?><br>
																 <?php echo $order->county?><br>
																 <?php echo $order->subcounty?>, <?php echo $order->postal_code?> <?php echo $order->county?><br>
																 Kenya<br>
																 T: <?php echo $order->phone?><br>
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
														<div class="actions">
															<a href="javascript:;" class="btn btn-default btn-sm">
															<i class="fa fa-pencil"></i> Edit </a>
														</div>
													</div>
													<div class="portlet-body">
														<?php echo form_open('admin/order/available/'.$order->order_id)?>
															<div class="table-responsive">
																<table class="table table-hover table-bordered table-striped">
																	<thead>
																		<tr>
																			<th width="2%">
																				<input type="checkbox" class="group-checkable" >
																			</th>
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
																			foreach ($order_details as $order_detail) {
																				?>
																					<tr>
																						<td>
																							<input type="checkbox" class="group-checkable" name="status" value="<?php echo $order_detail->id?>">
																						</td>
																						<td>
																							<?php
																								$product = $this->db->get_where('products', ['id' => $order_detail->product_id])->row();

																								echo $product->name;
																							?>
																						</td>
																						<td>
																							<?php
																								if ($order_detail->status == 0) {
																									?>
																										<span class="label label-sm label-danger">Pending</span>
																										<div class="btn-group">
																											<a class="btn btn-circle grey-cararra btn-xs" href="javascript:;" data-toggle="dropdown">
																											<!-- <span class="hidden-480">
																											Tools </span> -->
																											<i class="fa fa-ellipsis-h"></i>
																											<i class="fa fa-angle-down"></i>
																											</a>
																											<ul class="dropdown-menu pull-right">
																												<li>
																													<a href="<?php echo base_url('admin/order/not-available/'.$order_detail->id)?>">
																													Not Available </a>
																												</li>
																												<li>
																													<a href="<?php echo base_url('admin/order/available/'.$order_detail->id)?>">
																													Available </a>
																												</li>
																											</ul>		
																										</div>
																									<?php
																								} elseif ($order_detail->status == 1) {
																									?>
																										<span class="label label-sm label-warning">Not Available</span>
																										<div class="btn-group">
																											<a class="btn btn-circle grey-cararra btn-xs" href="javascript:;" data-toggle="dropdown">
																											<!-- <span class="hidden-480">
																											Tools </span> -->
																											<i class="fa fa-ellipsis-h"></i>
																											<i class="fa fa-angle-down"></i>
																											</a>
																											<ul class="dropdown-menu pull-right">
																												<li>
																													<a href="<?php echo base_url('admin/order/available/'.$order_detail->id)?>">
																													Available </a>
																												</li>
																											</ul>		
																										</div>
																									<?php
																								} elseif ($order_detail->status == 2) {
																									?>
																										<span class="label label-sm label-info">Available</span>
																									<?php
																								}
																							?>
																						</td>
																						<td>
																							<?php echo $store_currency, ' ', number_format($order_detail->price, 2) ?>
																						</td>
																						<td>
																							<?php echo number_format($order_detail->qty) ?>
																						</td>
																						<td>
																							<?php echo $store_currency, ' ', number_format($order_detail->subtotal, 2) ?>
																						</td>
																					</tr>
																				<?php
																			}
																		?>
																	</tbody>
																</table>
															</div>
															<div class="btn-group">
																<a class="btn btn-default btn-circle blue-madison" href="javascript:;" data-toggle="dropdown">
																<i class="fa fa-edit"></i>
																<span class="hidden-480">
																Actions </span>
																<i class="fa fa-angle-down"></i>
																</a>
																<ul class="dropdown-menu pull-left">
																	<li>
																		<a  href="<?php echo base_url('admin/order/not-available/'.$order->slug)?>">
																		Not Available </a>
																	</li>
																	<li>
																		<a type="submit" href="<?php echo base_url('admin/order/available/'.$order->slug)?>">
																		Available </a>
																	</li>
																</ul>
															</div>
														<?php echo form_close()?>
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
														<div class="col-md-8 name">
															 Sub Total:
														</div>
														<div class="col-md-4 value">
															 <?php echo $store_currency?> <?php echo number_format($order->total_orders, 2) ?>
														</div>
													</div>
													<div class="row static-info align-reverse">
														<div class="col-md-8 name">
															 Shipping Cost:
														</div>
														<div class="col-md-4 value">
															<?php
																$shipment_fee = $this->db->get_where('shipment', ['ship_to' => $order->subcounty])->row();
																echo $store_currency;
																echo ' ', number_format($shipment_fee->fee, 2);
															?>
														</div>
													</div>
													<div class="row static-info align-reverse">
														<div class="col-md-8 name">
															 Grand Total:
														</div>
														<div class="col-md-4 value">
															<?php
																$fee = $this->db->get_where('shipment', ['ship_to' => $order->subcounty])->row();
																echo $store_currency;
																$shipment_fee = $fee->fee;
																$total_order_cost = $order->total_orders;
																echo ' ',number_format($shipment_fee + $total_order_cost, 2) ;
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
									<div class="tab-pane" id="tab_2">
										<div class="table-container">
											<div class="table-actions-wrapper">
												<span>
												</span>
												<select class="table-group-action-input form-control input-inline input-small input-sm">
													<option value="">Select...</option>
													<option value="pending">Pending</option>
													<option value="paid">Paid</option>
													<option value="canceled">Canceled</option>
												</select>
												<button class="btn btn-sm yellow table-group-action-submit"><i class="fa fa-check"></i> Submit</button>
											</div>
											<table class="table table-striped table-bordered table-hover" id="datatable_invoices">
											<thead>
											<tr role="row" class="heading">
												<th width="5%">
													<input type="checkbox" class="group-checkable">
												</th>
												<th width="5%">
													 Invoice&nbsp;#
												</th>
												<th width="15%">
													 Bill To
												</th>
												<th width="15%">
													 Invoice&nbsp;Date
												</th>
												<th width="10%">
													 Amount
												</th>
												<th width="10%">
													 Status
												</th>
												<th width="10%">
													 Actions
												</th>
											</tr>
											<tr role="row" class="filter">
												<td>
												</td>
												<td>
													<input type="text" class="form-control form-filter input-sm" name="order_invoice_no">
												</td>
												<td>
													<input type="text" class="form-control form-filter input-sm" name="order_invoice_bill_to">
												</td>
												<td>
													<div class="input-group date date-picker margin-bottom-5" data-date-format="dd/mm/yyyy">
														<input type="text" class="form-control form-filter input-sm" readonly name="order_invoice_date_from" placeholder="From">
														<span class="input-group-btn">
														<button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
														</span>
													</div>
													<div class="input-group date date-picker" data-date-format="dd/mm/yyyy">
														<input type="text" class="form-control form-filter input-sm" readonly name="order_invoice_date_to" placeholder="To">
														<span class="input-group-btn">
														<button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
														</span>
													</div>
												</td>
												<td>
													<div class="margin-bottom-5">
														<input type="text" class="form-control form-filter input-sm" name="order_invoice_amount_from" placeholder="From"/>
													</div>
													<input type="text" class="form-control form-filter input-sm" name="order_invoice_amount_to" placeholder="To"/>
												</td>
												<td>
													<select name="order_invoice_status" class="form-control form-filter input-sm">
														<option value="">Select...</option>
														<option value="pending">Pending</option>
														<option value="paid">Paid</option>
														<option value="canceled">Canceled</option>
													</select>
												</td>
												<td>
													<div class="margin-bottom-5">
														<button class="btn btn-sm yellow filter-submit margin-bottom"><i class="fa fa-search"></i> Search</button>
													</div>
													<button class="btn btn-sm red filter-cancel"><i class="fa fa-times"></i> Reset</button>
												</td>
											</tr>
											</thead>
											<tbody>
											</tbody>
											</table>
										</div>
									</div>
									<div class="tab-pane" id="tab_3">
										<div class="table-container">
											<table class="table table-striped table-bordered table-hover" id="datatable_credit_memos">
											<thead>
											<tr role="row" class="heading">
												<th width="5%">
													 Credit&nbsp;Memo&nbsp;#
												</th>
												<th width="15%">
													 Bill To
												</th>
												<th width="15%">
													 Created&nbsp;Date
												</th>
												<th width="10%">
													 Status
												</th>
												<th width="10%">
													 Actions
												</th>
											</tr>
											</thead>
											<tbody>
											</tbody>
											</table>
										</div>
									</div>
									<div class="tab-pane" id="tab_4">
										<div class="table-container">
											<table class="table table-striped table-bordered table-hover" id="datatable_shipment">
											<thead>
											<tr role="row" class="heading">
												<th width="5%">
													 Shipment&nbsp;#
												</th>
												<th width="15%">
													 Ship&nbsp;To
												</th>
												<th width="15%">
													 Shipped&nbsp;Date
												</th>
												<th width="10%">
													 Quantity
												</th>
												<th width="10%">
													 Actions
												</th>
											</tr>
											<tr role="row" class="filter">
												<td>
													<input type="text" class="form-control form-filter input-sm" name="order_shipment_no">
												</td>
												<td>
													<input type="text" class="form-control form-filter input-sm" name="order_shipment_ship_to">
												</td>
												<td>
													<div class="input-group date date-picker margin-bottom-5" data-date-format="dd/mm/yyyy">
														<input type="text" class="form-control form-filter input-sm" readonly name="order_shipment_date_from" placeholder="From">
														<span class="input-group-btn">
														<button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
														</span>
													</div>
													<div class="input-group date date-picker" data-date-format="dd/mm/yyyy">
														<input type="text" class="form-control form-filter input-sm" readonly name="order_shipment_date_to" placeholder="To">
														<span class="input-group-btn">
														<button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
														</span>
													</div>
												</td>
												<td>
													<div class="margin-bottom-5">
														<input type="text" class="form-control form-filter input-sm" name="order_shipment_quantity_from" placeholder="From"/>
													</div>
													<input type="text" class="form-control form-filter input-sm" name="order_shipment_quantity_to" placeholder="To"/>
												</td>
												<td>
													<div class="margin-bottom-5">
														<button class="btn btn-sm yellow filter-submit margin-bottom"><i class="fa fa-search"></i> Search</button>
													</div>
													<button class="btn btn-sm red filter-cancel"><i class="fa fa-times"></i> Reset</button>
												</td>
											</tr>
											</thead>
											<tbody>
											</tbody>
											</table>
										</div>
									</div>
									<div class="tab-pane" id="tab_5">
										<div class="table-container">
											<table class="table table-striped table-bordered table-hover" id="datatable_history">
											<thead>
											<tr role="row" class="heading">
												<th width="25%">
													 Datetime
												</th>
												<th width="55%">
													 Description
												</th>
												<th width="10%">
													 Notification
												</th>
												<th width="10%">
													 Actions
												</th>
											</tr>
											<tr role="row" class="filter">
												<td>
													<div class="input-group date datetime-picker margin-bottom-5" data-date-format="dd/mm/yyyy hh:ii">
														<input type="text" class="form-control form-filter input-sm" readonly name="order_history_date_from" placeholder="From">
														<span class="input-group-btn">
														<button class="btn btn-sm default date-set" type="button"><i class="fa fa-calendar"></i></button>
														</span>
													</div>
													<div class="input-group date datetime-picker" data-date-format="dd/mm/yyyy hh:ii">
														<input type="text" class="form-control form-filter input-sm" readonly name="order_history_date_to" placeholder="To">
														<span class="input-group-btn">
														<button class="btn btn-sm default date-set" type="button"><i class="fa fa-calendar"></i></button>
														</span>
													</div>
												</td>
												<td>
													<input type="text" class="form-control form-filter input-sm" name="order_history_desc" placeholder="To"/>
												</td>
												<td>
													<select name="order_history_notification" class="form-control form-filter input-sm">
														<option value="">Select...</option>
														<option value="pending">Pending</option>
														<option value="notified">Notified</option>
														<option value="failed">Failed</option>
													</select>
												</td>
												<td>
													<div class="margin-bottom-5">
														<button class="btn btn-sm yellow filter-submit margin-bottom"><i class="fa fa-search"></i> Search</button>
													</div>
													<button class="btn btn-sm red filter-cancel"><i class="fa fa-times"></i> Reset</button>
												</td>
											</tr>
											</thead>
											<tbody>
											</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End: life time stats -->
				</div>
			</div>
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->