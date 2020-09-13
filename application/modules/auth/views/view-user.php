	<title><?php echo $user->first_name, ' ', $user->last_name. ' | ', $name_of_store?></title>
</head>
<!-- <?php $i=1?>
<body class="page-md page-header-fixed page-sidebar-closed-hide-logo page-sidebar-fixed page-sidebar-closed-hide-logo"> -->
<body class="page-md page-header-fixed page-sidebar-closed page-sidebar-closed-hide-logo page-sidebar-fixed page-sidebar-closed-hide-logo">
<!-- BEGIN HEADER -->
<div class="page-header md-shadow-z-1-i navbar navbar-fixed-top">
	<!-- BEGIN HEADER INNER -->
	<div class="page-header-inner">
		<!-- BEGIN LOGO -->
		<div class="page-logo">
			<a href="<?php echo base_url()?>admin">
			<img src="../../assets/admin/layout4/img/logo-light.png" alt="logo" class="logo-default"/>
			</a>
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
			<!-- BEGIN HEADER SEARCH BOX -->
			<!-- DOC: Apply "search-form-expanded" right after the "search-form" class to have half expanded search box -->
			<!-- <form class="search-form" action="extra_search.html" method="GET">
				<div class="input-group">
					<input type="text" class="form-control input-sm" placeholder="Search..." name="query">
					<span class="input-group-btn">
					<a href="javascript:;" class="btn submit"><i class="icon-magnifier"></i></a>
					</span>
				</div>
			</form> -->
			<!-- END HEADER SEARCH BOX -->
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
						<?php echo $user_account->first_name?> <?php echo $user_account->last_name?></span>
						<!-- DOC: Do not remove below empty space(&nbsp;) as its purposely used -->
						<?php
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
								<a href="login.html">
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
			<ul class="page-sidebar-menu page-sidebar-menu-closed" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
				<li class="start ">
					<a href="<?php echo base_url()?>admin">
					<i class="fa fa-home"></i>
					<span class="title">Dashboard</span>
					</a>
				</li>
				<li class="active">
					<a href="javascript:;">
					<i class="fa fa-users"></i>
					<span class="title">Users</span>
					<span class="arrow open"></span>
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
				<li>
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
						<li>
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
									List Category</a>
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
									Publish Tag</a>
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
				<li>
					<a href="javascript:;">
					<i class="fa fa-shopping-cart"></i>
					<span class="title">Orders</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li >
							<a href="<?php echo base_url()?>admin/orders/new">
							<i class="fa fa-check-square-o"></i>
							New Order </a>
						</li>
						<li>
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
							<a href="<?php echo base_url()?>admin/shipments">
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
							<a href="<?php echo base_url()?>admin/settings/general">
							<i class="fa fa-cog"></i>
							<?php echo $this->lang->line('general_settings_heading')?>  </a>
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
					<h1>User Profile <small><?php echo lang('view_user_heading')?></small></h1>
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
				<li>
					<a href="<?php echo base_url()?>admin/users">Users</a>
					<i class="fa fa-circle"></i>
				</li>
				<li>
					<?php echo $user->first_name?> <?php echo $user->last_name?>
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PROFILE SIDEBAR -->
					<div class="profile-sidebar" style="width: 250px;">
						<!-- PORTLET MAIN -->
						<div class="portlet light profile-sidebar-portlet">
							<!-- SIDEBAR USERPIC -->
							<div class="profile-userpic">
								<?php
									$query = $user->image;
									if (empty($query)) {
										$icon = 'avatar.png';
									} else {
										$icon = 'users/'.$user->image;
									}
								?>
								<img src="<?php echo base_url()?>public/attachments/<?php echo $icon?>" class="img-responsive" alt="">
							</div>
							<!-- END SIDEBAR USERPIC -->
							<!-- SIDEBAR USER TITLE -->
							<div class="profile-usertitle">
								<div class="profile-usertitle-name">
									<?php echo $user->first_name?> <?php echo $user->last_name?>
								</div>
								<div class="profile-usertitle-job">
									<?php
										foreach ($user_groups as $user_group) {
											echo $user_group->name;
										}
									?>
								</div>
							</div>
							<!-- END SIDEBAR USER TITLE -->
							<!-- SIDEBAR BUTTONS -->
							<div class="profile-userbuttons">
								<button type="button" class="btn btn-circle green-haze btn-sm">Follow</button>
								<button type="button" class="btn btn-circle btn-danger btn-sm">Message</button>
							</div>
							<!-- END SIDEBAR BUTTONS -->
							<!-- SIDEBAR MENU -->
							<div class="profile-usermenu">
								<!-- <ul class="nav">
									<li class="active">
										<a href="extra_profile.html">
										<i class="icon-home"></i>
										Overview </a>
									</li>
									<li>
										<a href="extra_profile_account.html">
										<i class="icon-settings"></i>
										Account Settings </a>
									</li>
									<li>
										<a href="page_todo.html" target="_blank">
										<i class="icon-check"></i>
										Tasks </a>
									</li>
									<li>
										<a href="extra_profile_help.html">
										<i class="icon-info"></i>
										Help </a>
									</li>
								</ul> -->
							</div>
							<!-- END MENU -->
						</div>
						<!-- END PORTLET MAIN -->
						<!-- PORTLET MAIN -->
						<div class="portlet light">
							<!-- STAT -->
							<div class="row list-separated profile-stat">
								<div class="col-md-4 col-sm-4 col-xs-6">
									<div class="uppercase profile-stat-title">
										<?php
											$this->db->where('customer_id', $user->id);
											$orders = $this->db->get('orders')->num_rows();
											echo $orders
										?>
									</div>
									<div class="uppercase profile-stat-text">
										Orders
									</div>
								</div>
								<div class="col-md-4 col-sm-4 col-xs-6">
									<div class="uppercase profile-stat-title">
										<?php
											$this->db->where('customer_id', $user->id);
											$logins = $this->db->get('logins')->num_rows();
											echo $logins
										?>
									</div>
									<div class="uppercase profile-stat-text">
										Logins
									</div>
								</div>
								<div class="col-md-4 col-sm-4 col-xs-6">
									<div class="uppercase profile-stat-title">
										<?php
											$this->db->where('customer_id', $user->id);
											$this->db->select_sum('qty');
											$result =  $this->db->get('orders_summary')->row();
											echo $result->qty;
										?>
									</div>
									<div class="uppercase profile-stat-text">
										Goods
									</div>
								</div>
							</div>
							<!-- END STAT -->
							<div>
								<h4 class="profile-desc-title">About <?php echo $user->first_name?> <?php echo $user->last_name?></h4>
								<!-- <span class="profile-desc-text"> Lorem ipsum dolor sit amet diam nonummy nibh dolore. </span> -->
								<div class="margin-top-20 profile-desc-link">
									<i class="fa fa-envelope"></i>
									<a href="mailto:<?php echo $user->email?>"><?php echo $user->email?></a>
								</div>
								<div class="margin-top-20 profile-desc-link">
									<i class="fa fa-phone"></i>
									<?php echo $user->phone?>
								</div>
								<div class="margin-top-20 profile-desc-link">
									<i class="fa fa-user"></i>
									Account Status:
									<?php
										if ($user->active == 1) {
											?>
												<span class="label label-sm label-primary">
                                                    <?= lang('index_active_link'); ?>
                                                </span> 
											<?php
										} else {
											?>
												<span class="label label-sm label-success">
                                                    <?= lang('index_active_link'); ?>
                                                </span> 
                                            <?php
										}
									?>
								</div>
							</div>
						</div>
						<!-- END PORTLET MAIN -->
					</div>
					<!-- END BEGIN PROFILE SIDEBAR -->
					<!-- BEGIN PROFILE CONTENT -->
					<div class="profile-content">
						<div class="row">
							<div class="col-md-6">
								<!-- BEGIN PORTLET -->
								<div class="portlet light">
									<div class="portlet-title">
										<div class="caption caption-md">
											<i class="icon-bar-chart theme-font hide"></i>
											<span class="caption-subject font-blue-madison bold uppercase"><i class="fa fa-shopping-cart"></i> Order History</span>
											<span class="caption-helper hide">stats...</span>
										</div>
									</div>
									<div class="portlet-body">
										<div class="row number-stats margin-bottom-30">
											<div class="col-md-6 col-sm-6 col-xs-6">
												<div class="stat-left">
													<div class="stat-chart">
														<!-- do not line break "sparkline_bar" div. sparkline chart has an issue when the container div has line break -->
														<div id="sparkline_bar"></div>
													</div>
													<div class="stat-number">
														<div class="title">
															 Total Orders
														</div>
														<div class="number">
															<?php
																echo $orders
															?>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-6 col-sm-6 col-xs-6">
												<div class="stat-right">
													<div class="stat-chart">
														<!-- do not line break "sparkline_bar" div. sparkline chart has an issue when the container div has line break -->
														<div id="sparkline_bar2"></div>
													</div>
													<div class="stat-number">
														<div class="title">
															Total Orders Amount
														</div>
														<div class="number">
															<?php
																$this->db->where('customer_id', $user->id);
																$this->db->select_sum('total_orders');
																$result =  $this->db->get('orders')->row();
																echo $currency, ' ', number_format($result->total_orders, 2);
															?>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="scroller" style="height: 252px;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
											<?php
												$orders = $this->db->get_where('orders', ['customer_id' => $user->id])->result();
												if (empty($orders)) {
													echo 'no orders';
												} else {
													?>
														<div class="table-scrollable table-scrollable-borderless">
															<table class="table table-hover table-light">
																<thead>
																	<tr class="uppercase">
																		<th>
																			 Order ID
																		</th>
																		<th>
																			Order Date
																		</th>
																		<th>
																			Ship to
																		</th>
																		<th>
																			Order Status
																		</th>
																		<th>
																			Actions
																		</th>
																	</tr>
																</thead>
																<?php
																	foreach ($orders as $order) {
																		?>
																			<tr>
																				<td>
																					<?php echo $order->order_id ?> 
																				</td>
																				<td>
																					<?php echo date('jS M, Y', $order->order_id) ?>
																				</td>
																				<td>
																					<?php echo $order->subcounty ?>
																				</td>
																				<td>
																					<?php
											                                          if ($order->status == 0) {
											                                            ?>
											                                              <span class="label label-sm label-danger">Not Processed</span>
											                                            <?php
											                                          } elseif ($order->status == 1) {
											                                            ?>
											                                              <span class="label label-sm label-info">Processed</span>
											                                            <?php
											                                          } elseif ($order->status == 2) {
											                                            ?>
											                                              <span class="label label-sm label-warning">In Transit</span>
											                                            <?php
											                                          } elseif ($order->status == 3) {
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
																					<a href="<?php echo base_url('admin/order/'.$order->order_id)?>" class="btn default btn-xs green-stripe">
																					View </a>
																				</td>
																			</tr>
																		<?php
																	}
																?>
																
															</table>
														</div>
													<?php
												}
											?>
											
										</div>
									</div>
								</div>
								<!-- END PORTLET -->
							</div>
							<div class="col-md-6">
								<!-- BEGIN PORTLET -->
								<div class="portlet light">
									<div class="portlet-title tabbable-line">
										<div class="caption caption-md">
											<i class="icon-globe theme-font hide"></i>
											<span class="caption-subject font-blue-madison bold uppercase"><i class="fa fa-terminal"></i> Activity</span>
										</div>
										<ul class="nav nav-tabs">
											<li class="active">
												<a href="#tab_1_1" data-toggle="tab">
												Wishlist </a>
											</li>
											<li>
												<a href="#tab_1_2" data-toggle="tab">
												Login History </a>
											</li>
											<li>
												<a href="#tab_1_3" data-toggle="tab">
												Reviews </a>
											</li>
										</ul>
									</div>
									<div class="portlet-body">
										<!--BEGIN TABS-->
										<div class="tab-content">
											<div class="tab-pane active" id="tab_1_1">
												<div class="scroller" style="height: 337px;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
													<ul class="feeds">
														<?php
															$this->db->where('customer_id', $user->id);
															$this->db->order_by('wishlist.time', 'desc');
															$wishlists = $this->db->get('wishlist')->result();

															if (empty($wishlists)) {
																echo 'no products in wishlist';
															} else {
																foreach ($wishlists as $wishlist) {
																	?>
																		<li>
																			<div class="col1">
																				<div class="cont">
																					<div class="cont-col1">
																						<div class="label label-sm label-primary">
																							<i class="fa fa-gift"></i>
																						</div>
																					</div>
																					<div class="cont-col2">
																						<div class="desc">
																							<?php
																								$this->db->from('products')->where('id', $wishlist->product_id);
																								$product_info = $this->db->get()->row();
																								echo $product_info->name;
																							?>
																						</div>
																					</div>
																				</div>
																			</div>
																			<div class="col1">
																				<div class="date">
																					<!-- <?php echo date('jS M, Y', $wishlist->time)?> at <?php echo date('H:i:s', $wishlist->time)?> -->
																				</div>
																			</div>
																		</li>
																	<?php
																}
															}
														?>
													</ul>
												</div>
											</div>
											<div class="tab-pane" id="tab_1_2">
												<div class="scroller" style="height: 337px;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
													<ul class="feeds">
														<?php
															$this->db->where('customer_id', $user->id);
															$this->db->order_by('logins.time', 'desc');
															$logins = $this->db->get('logins')->result();
															if (empty($logins)) {
																echo lang('user_never_logged_in');
															} else {
																foreach ($logins as $login) {
																	?>
																		<li>
																			<a href="javascript:;">
																			<div class="col1">
																				<div class="cont">
																					<div class="cont-col1">
																						<div class="label label-sm label-primary">
																							<i class="fa fa-unlock"></i>
																						</div>
																					</div>
																					<div class="cont-col2">
																						<div class="desc">
																							<?php echo date('jS M, Y', $login->time)?> at <?php echo date('H:i:s', $login->time)?>
																						</div>
																					</div>
																				</div>
																			</div>
																			<!-- <div class="col2">
																				<div class="date">
																					 Just now
																				</div>
																			</div> -->
																			</a>
																		</li>
																	<?php
																}
															}
														?>
														
													</ul>
												</div>
											</div>
											<div class="tab-pane" id="tab_1_3">
												<div class="scroller" style="height: 337px;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
													<div class="general-item-list">
														<?php
															$this->db->where('customer_id', $user->id);
															$this->db->order_by('reviews.date_created', 'desc');
															$reviews = $this->db->get('reviews')->result();
															if (empty($reviews)) {
																echo 'user has not reviewed any product';
															} else {
																foreach ($reviews as $review) {
																	?>
																		<div class="item">
																			<div class="item-head">
																				<div class="item-details">
																					<?php
																						$this->db->from('products')->where('id', $review->product_id);
																						$reviewed_product_info = $this->db->get()->row();
																					?>
																					<img class="item-pic" src="<?php echo base_url()?>public/attachments/products/<?php echo $reviewed_product_info->image?>">
																					<a href="<?php echo base_url('admin/product/'.$reviewed_product_info->id)?>" class="item-name primary-link">
																						<?php echo $reviewed_product_info->name?>
																					</a>
																					<span class="item-label">
																						<?php echo date('jS M, Y', $login->time)?> at <?php echo date('H:i:s', $login->time)?>
																					</span>
																				</div>
																				<span class="item-status">
																					<?php 
																						if ($review->status == 1) {
																							?>
																								<span class="badge badge-empty badge-primary"></span> Approved
																							<?php
																						} else {
																							?>
																								<span class="badge badge-empty badge-warning"></span> Not Approved
																							<?php
																						}
																					?>
																				</span>
																			</div>
																			<div class="item-body">
																				<?php echo $review->review?>
																			</div>
																		</div>
																	<?php
																}
															}
														?>
													</div>
												</div>
											</div>
										</div>
										<!--END TABS-->
									</div>
								</div>
								<!-- END PORTLET -->
							</div>
						</div>
						<?php
							foreach ($user_groups as $user_group) {
								$group_name = $user_group->name;
								if ($group_name == 'admin') {
									?>
										<div class="row">
											<div class="col-md-6">
												<!-- BEGIN PORTLET -->
												<div class="portlet light">
													<div class="portlet-title">
														<div class="caption caption-md">
															<i class="icon-bar-chart theme-font hide"></i>
															<span class="caption-subject font-blue-madison bold uppercase"><i class="fa fa-gift"></i> My Products</span>
															<span class="caption-helper hide">stats...</span>
														</div>
													</div>
													<div class="portlet-body">
														<div class="row number-stats margin-bottom-30">
															<div class="col-md-6 col-sm-6 col-xs-6">
																<div class="stat-left">
																	<div class="stat-chart">
																		<!-- do not line break "sparkline_bar" div. sparkline chart has an issue when the container div has line break -->
																		<div id="sparkline_bar"></div>
																	</div>
																	<div class="stat-number">
																		<div class="title">
																			 Total Products
																		</div>
																		<div class="number">
																			<?php
																				$this->db->where('vendor_id', $user->created_on);
																				$my_products = $this->db->get('products')->num_rows();
																				echo $my_products;
																			?>
																		</div>
																	</div>
																</div>
															</div>
															<div class="col-md-6 col-sm-6 col-xs-6">
																<div class="stat-right">
																	<div class="stat-chart">
																		<!-- do not line break "sparkline_bar" div. sparkline chart has an issue when the container div has line break -->
																		<div id="sparkline_bar2"></div>
																	</div>
																	<div class="stat-number">
																		<div class="title">
																			Average
																		</div>
																		<div class="number">
																			<?php
																				$this->db->select_sum('sale_price');
																				$result =  $this->db->get_where('products', ['vendor_id' => $user->created_on])->row()->sale_price;
																				echo $currency, ' ', number_format($result/$my_products, 2);
																			?>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="scroller" style="height: 337px;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
															<div class="general-item-list">
																<?php
																	$this->db->where('vendor_id', $user->created_on);
																	$this->db->order_by('products.name', 'asc');
																	$admin_products = $this->db->get('products')->result();
																	if (empty($admin_products)) {
																		echo 'user has no products';
																	} else {
																		foreach ($admin_products as $admin_product) {
																			?>
																				<div class="item">
																					<div class="item-head">
																						<div class="item-details">
																							<img class="item-pic" src="<?php echo base_url()?>public/attachments/products/<?php echo $admin_product->image?>">
																							<a href="<?php echo base_url('admin/product/'.$admin_product->id)?>" class="item-name primary-link">
																								<?php echo $admin_product->name?>
																							</a>
																							<span class="item-label">
																								<?php echo date('jS M, Y', $admin_product->date_created)?> at <?php echo date('H:i:s', $admin_product->date_created)?>
																							</span>
																						</div>
																						<span class="item-status">
																							<?php 
																								if ($admin_product->status == 1) {
																									?>
																										<span class="badge badge-empty badge-primary"></span> Published
																									<?php
																								} else {
																									?>
																										<span class="badge badge-empty badge-warning"></span> Draft
																									<?php
																								}
																							?>
																						</span>
																					</div>
																					<div class="item-body">
																						<?php echo $admin_product->description?>
																					</div>
																				</div>
																			<?php
																		}
																	}
																?>
															</div>
														</div>
													</div>
												</div>
												<!-- END PORTLET -->
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<!-- BEGIN PORTLET -->
												<div class="portlet light">
													<div class="portlet-title">
														<div class="caption caption-md">
															<i class="icon-bar-chart theme-font hide"></i>
															<span class="caption-subject font-blue-madison bold uppercase"><i class="fa fa-money"></i> Sales History</span>
															<span class="caption-helper hide">stats...</span>
														</div>
													</div>
													<div class="portlet-body">
														<div class="row number-stats margin-bottom-30">
															<div class="col-md-6 col-sm-6 col-xs-6">
																<div class="stat-left">
																	<div class="stat-chart">
																		<!-- do not line break "sparkline_bar" div. sparkline chart has an issue when the container div has line break -->
																		<div id="sparkline_bar"></div>
																	</div>
																	<div class="stat-number">
																		<div class="title">
																			 Total Products Sold
																		</div>
																		<div class="number">
																			<?php
																				$this->db->where('vendor_id', $user->created_on);
																				$this->db->select_sum('qty');
																				$result =  $this->db->get('orders_summary')->row();
																				echo number_format($result->qty);
																			?>
																		</div>
																	</div>
																</div>
															</div>
															<div class="col-md-6 col-sm-6 col-xs-6">
																<div class="stat-right">
																	<div class="stat-chart">
																		<!-- do not line break "sparkline_bar" div. sparkline chart has an issue when the container div has line break -->
																		<div id="sparkline_bar2"></div>
																	</div>
																	<div class="stat-number">
																		<div class="title">
																			Total Sales Amount
																		</div>
																		<div class="number">
																			<?php
																				$this->db->where('vendor_id', $user->created_on);
																				$this->db->select_sum('subtotal');
																				$result =  $this->db->get('orders_summary')->row();
																				echo $currency, ' ', number_format($result->subtotal, 2);
																			?>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="scroller" style="height: 337px;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
															<div class="table-scrollable table-scrollable-borderless">
																<table class="table table-hover table-light">
																	<thead>
																		<tr class="uppercase">
																			<th>
																				 Order Date
																			</th>
																			<th>
																				Customer
																			</th>
																			<th>
																				Product
																			</th>
																			<th>
																				Qty
																			</th>
																			<th>
																				Order Status
																			</th>
																		</tr>
																	</thead>
																	<?php
																		$this->db->where('vendor_id', $user_account->created_on);
																		$my_product_orders = $this->db->get('orders_summary')->result();

																		foreach ($my_product_orders as $my_product_order) {
																			?>
																				<tr>
																					<td>
																						<?php
																							$order_date = $this->db->get_where('orders', ['id' => $my_product_order->order_id])->row();

																							echo date('jS M, Y', $order_date->order_id), ' at ', date('H:i:s', $order_date->order_id)
																						?>
																					</td>
																					<td>
																						<?php
																							$customer = $this->db->get_where('users', ['id' => $my_product_order->customer_id])->row();

																							echo $customer->first_name, ' ', $customer->last_name;
																						?>
																					</td>
																					<td>
																						<?php
																							$product = $this->db->get_where('products', ['id' => $my_product_order->product_id])->row();

																							echo $product->name;
																						?>
																					</td>
																					<td>
																						<?php echo $my_product_order->qty ?>
																					</td>
																					<td>
																						<?php echo $my_product_order->status ?>
																					</td>
																				</tr>
																			<?php
																		}
																	?>
																</table>
															</div>
														</div>
													</div>
												</div>
												<!-- END PORTLET -->
											</div>
										</div>
									<?php
								} elseif($group_name == 'vendor') {
									?>
										<div class="row">
											<div class="col-md-6">
												<!-- BEGIN PORTLET -->
												<div class="portlet light">
													<div class="portlet-title">
														<div class="caption caption-md">
															<i class="icon-bar-chart theme-font hide"></i>
															<span class="caption-subject font-blue-madison bold uppercase"><i class="fa fa-gift"></i> My Products</span>
															<span class="caption-helper hide">stats...</span>
														</div>
													</div>
													<div class="portlet-body">
														<div class="row number-stats margin-bottom-30">
															<div class="col-md-6 col-sm-6 col-xs-6">
																<div class="stat-left">
																	<div class="stat-chart">
																		<!-- do not line break "sparkline_bar" div. sparkline chart has an issue when the container div has line break -->
																		<div id="sparkline_bar"></div>
																	</div>
																	<div class="stat-number">
																		<div class="title">
																			 Total Products
																		</div>
																		<div class="number">
																			<?php
																				$this->db->where('vendor_id', $user->created_on);
																				$vendor_products = $this->db->get('products')->num_rows();
																				echo $vendor_products;
																			?>
																		</div>
																	</div>
																</div>
															</div>
															<div class="col-md-6 col-sm-6 col-xs-6">
																<div class="stat-right">
																	<div class="stat-chart">
																		<!-- do not line break "sparkline_bar" div. sparkline chart has an issue when the container div has line break -->
																		<div id="sparkline_bar2"></div>
																	</div>
																	<div class="stat-number">
																		<div class="title">
																			Average
																		</div>
																		<div class="number">
																			<?php
																				$this->db->select_sum('sale_price');
																				$result =  $this->db->get_where('products', ['vendor_id' => $user->created_on])->row()->sale_price;
																				echo $currency, ' ', number_format($result/$vendor_products, 2);
																			?>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="scroller" style="height: 337px;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
															<div class="general-item-list">
																<?php
																	$this->db->where('vendor_id', $user->created_on);
																	$this->db->order_by('products.name', 'asc');
																	$vendor_products = $this->db->get('products')->result();
																	if (empty($vendor_products)) {
																		echo 'user has no products';
																	} else {
																		foreach ($vendor_products as $vendor_product) {
																			?>
																				<div class="item">
																					<div class="item-head">
																						<div class="item-details">
																							<img class="item-pic" src="<?php echo base_url()?>public/attachments/products/<?php echo $vendor_product->image?>">
																							<a href="<?php echo base_url('admin/product/'.$vendor_product->id)?>" class="item-name primary-link">
																								<?php echo $vendor_product->name?>
																							</a>
																							<span class="item-label">
																								<?php echo date('jS M, Y', $vendor_product->date_created)?> at <?php echo date('H:i:s', $vendor_product->date_created)?>
																							</span>
																						</div>
																						<span class="item-status">
																							<?php 
																								if ($vendor_product->status == 1) {
																									?>
																										<span class="badge badge-empty badge-primary"></span> Published
																									<?php
																								} else {
																									?>
																										<span class="badge badge-empty badge-warning"></span> Draft
																									<?php
																								}
																							?>
																						</span>
																					</div>
																					<div class="item-body">
																						<?php echo $vendor_product->description?>
																					</div>
																				</div>
																			<?php
																		}
																	}
																?>
															</div>
														</div>
													</div>
												</div>
												<!-- END PORTLET -->
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<!-- BEGIN PORTLET -->
												<div class="portlet light">
													<div class="portlet-title">
														<div class="caption caption-md">
															<i class="icon-bar-chart theme-font hide"></i>
															<span class="caption-subject font-blue-madison bold uppercase"><i class="fa fa-money"></i> Sales History</span>
															<span class="caption-helper hide">stats...</span>
														</div>
													</div>
													<div class="portlet-body">
														<div class="row number-stats margin-bottom-30">
															<div class="col-md-6 col-sm-6 col-xs-6">
																<div class="stat-left">
																	<div class="stat-chart">
																		<!-- do not line break "sparkline_bar" div. sparkline chart has an issue when the container div has line break -->
																		<div id="sparkline_bar"></div>
																	</div>
																	<div class="stat-number">
																		<div class="title">
																			 Total Products Sold
																		</div>
																		<div class="number">
																			<?php
																				$this->db->where('vendor_id', $user->created_on);
																				$this->db->select_sum('qty');
																				$result =  $this->db->get('orders_summary')->row();
																				echo number_format($result->qty);
																			?>
																		</div>
																	</div>
																</div>
															</div>
															<div class="col-md-6 col-sm-6 col-xs-6">
																<div class="stat-right">
																	<div class="stat-chart">
																		<!-- do not line break "sparkline_bar" div. sparkline chart has an issue when the container div has line break -->
																		<div id="sparkline_bar2"></div>
																	</div>
																	<div class="stat-number">
																		<div class="title">
																			Total Sales Amount
																		</div>
																		<div class="number">
																			<?php
																				$this->db->where('vendor_id', $user->created_on);
																				$this->db->select_sum('subtotal');
																				$result =  $this->db->get('orders_summary')->row();
																				echo $currency, ' ', number_format($result->subtotal, 2);
																			?>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="scroller" style="height: 337px;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
															<div class="table-scrollable table-scrollable-borderless">
																<table class="table table-hover table-light">
																	<thead>
																		<tr class="uppercase">
																			<th>
																				 Order Date
																			</th>
																			<th>
																				Customer
																			</th>
																			<th>
																				Product
																			</th>
																			<th>
																				Qty
																			</th>
																			<th>
																				Order Status
																			</th>
																		</tr>
																	</thead>
																	<?php
																		$my_product_orders = $this->db->get('orders')->result();
																		foreach ($my_product_orders as $my_product_order) {
																			$cart_items = json_decode($my_product_order->orders);
																			foreach ($cart_items as $cart_item) {
																				if ($cart_item->vendor_id == $user->created_on) {
																					?>
																						<tr>
																							<td>
																								<?php echo date('jS M, Y', $my_product_order->order_id) ?> at <?php echo date('H:i:s', $my_product_order->order_id) ?>
																							</td>
																							<td>
																								<?php echo $my_product_order->first_name?> <?php echo $my_product_order->last_name?>
																							</td>
																							<td>
																								<?php echo $cart_item->name ?>
																							</td>
																							<td>
																								<?php echo $cart_item->qty ?>
																							</td>
																							<td>
																								<?php
														                                          if ($my_product_order->status == 0) {
														                                            ?>
														                                              <span class="label label-sm label-danger">Not Processed</span>
														                                            <?php
														                                          } elseif ($my_product_order->status == 1) {
														                                            ?>
														                                              <span class="label label-sm label-info">Processed</span>
														                                            <?php
														                                          } elseif ($my_product_order->status == 2) {
														                                            ?>
														                                              <span class="label label-sm label-warning">In Transit</span>
														                                            <?php
														                                          } elseif ($my_product_order->status == 3) {
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
																						</tr>
																					<?php
																				}
																			}
																		}
																	?>
																	
																</table>
															</div>
														</div>
													</div>
												</div>
												<!-- END PORTLET -->
											</div>
										</div>
									<?php
								}
							}
						?>
					</div>
					<!-- END PROFILE CONTENT -->
				</div>
			</div>
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->
</div>