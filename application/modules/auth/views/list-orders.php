	<title><?php echo $title, ' | ', $name_of_store?></title>
</head>
<?php $i=1?>
<body class="page-md page-header-fixed page-sidebar-closed-hide-logo page-sidebar-fixed page-sidebar-closed-hide-logo">
<!-- BEGIN HEADER -->
<div class="page-header md-shadow-z-1-i navbar navbar-fixed-top">
	<!-- BEGIN HEADER INNER -->
	<div class="page-header-inner">
		<!-- BEGIN LOGO -->
		<div class="page-logo">
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
						<?php echo $user_account->first_name?> <?php echo $user_account->last_name?> </span>
						<!-- DOC: Do not remove below empty space(&nbsp;) as its purposely used -->
						<?php
			              $query = $user_account->image;
			              if (empty($query)) {
			                $user_icon = 'avatar.png';
			              } else {
			                $user_icon = 'users/'.$user_account->image;
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
						<li class="active">
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
						</li>s
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
			<!-- BEGIN PAGE HEAD -->
			<div class="page-head">
				<!-- BEGIN PAGE TITLE -->
				<div class="page-title">
					<h1> Orders Listing </h1>
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
                    <a href="<?php echo base_url(); ?>admin">Home</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span class="active"> <?php echo lang('orders_heading'); ?></span>
                </li>
            </ul>
            <!-- END PAGE BREADCRUMB -->
            <!-- BEGIN PAGE BASE CONTENT -->
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
            <?php
            	if (empty($orders)) {
            		?>
	            		<div class="alert alert-danger">
	                        <div id="infoMessage"> No orders yet</div>
	                    </div>
                    <?php
            	} else {
            		?>
		            	<div class="row">
		                    <div class="col-md-12">
		                        <div class="portlet light">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-shopping-cart font-green-sharp"></i>
											<span class="caption-subject font-green-sharp bold uppercase">Order Listing</span>
											<span class="caption-helper">manage orders...</span>
										</div>
										<div class="actions">
											<a href="javascript:;" class="btn btn-circle btn-default">
											<i class="fa fa-plus"></i>
											<span class="hidden-480">
											New Order </span>
											</a>
											<div class="btn-group">
												<a class="btn btn-default btn-circle" href="javascript:;" data-toggle="dropdown">
												<i class="fa fa-share"></i>
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
														Print Invoices </a>
													</li>
												</ul>
											</div>
										</div>
									</div>
									<div class="portlet-body">
										<div class="table-container">
											<div class="table-actions-wrapper">
												<span>
												</span>
												<select class="table-group-action-input form-control input-inline input-small input-sm">
													<option value="">Select...</option>
													<option value="Cancel">Cancel</option>
													<option value="Cancel">Hold</option>
													<option value="Cancel">On Hold</option>
													<option value="Close">Close</option>
												</select>
												<button class="btn btn-sm yellow table-group-action-submit"><i class="fa fa-check"></i> Submit</button>
											</div>
											<table class="table table-striped table-bordered table-hover" id="datatable_orders">
												<thead>
													<tr role="row" class="heading">
														<th width="2%">
															<input type="checkbox" class="group-checkable">
														</th>
														<th width="5%">
															 Order&nbsp;#
														</th>
														<th width="5%">
															 Order&nbsp;ID
														</th>
														<th width="15%">
															 Purchased&nbsp;On
														</th>
														<th width="15%">
															 Customer
														</th>
														<th width="10%">
															 Ship&nbsp;To
														</th>
														<th width="10%">
															 Purchased&nbsp;Price
														</th>
														<th width="10%">
															 Status
														</th>
														<th width="15%">
															 Actions
														</th>
													</tr>
													<tr role="row" class="filter">
														<?php echo form_open('auth/search_orders')?>
															<td>
															</td>
															<td>
															</td>
															<td>
																<input type="text" class="form-control form-filter input-sm" name="order_id">
															</td>
															<td>
																
															</td>
															<td>
																<select name="customer" class="form-control select2me form-filter input-sm">
																	<option value="">---Select Customer---</option>
																	<?php 
																		foreach ($customers as $customer) {
																			?>
																				<option value="<?php echo $customer->id?>"><?php echo $customer->first_name, ' ', $customer->last_name ?></option>
																			<?php
																		}
																	?>
																</select>
															</td>
															<td>
																<select name="ship_to" class="form-control select2me form-filter input-sm">
																	<option value="">---Select---</option>
																	<?php 
																		foreach ($shipments as $shipment) {
																			?>
																				<option value="<?php echo $shipment->ship_to?>"><?php echo $shipment->ship_to?></option>
																			<?php
																		}
																	?>
																</select>
															</td>
															<td>
																<div class="margin-bottom-5">
																	<input type="text" class="form-control form-filter input-sm margin-bottom-5 clearfix" name="order_purchase_price_from" placeholder="From"/>
																</div>
																<input type="text" class="form-control form-filter input-sm" name="order_purchase_price_to" placeholder="To"/>
															</td>
															<td>
																<select name="status" class="form-control select2me form-filter input-sm">
																	<option value="">---Select Status---</option>
																	<option value="0">Pending</option>
																	<option value="1">Processed</option>
																	<option value="2">In Transit</option>
																	<option value="3">Cancelled</option>
																	<option value="4">Delivered & Closed</option>
																</select>
															</td>
															<td>
																<div class="margin-bottom-5">
																	<button type="submit" class="btn btn-sm yellow filter-submit margin-bottom"><i class="fa fa-search"></i> Search</button>
																</div>
																<button class="btn btn-sm red filter-cancel"><i class="fa fa-times"></i> Reset</button>
															</td>
														<?php echo form_close()?>
													</tr>
												</thead>
												<tbody>
													<?php foreach($orders as $order):?>
														<tr>
															<td>
																<input type="checkbox" class="group-checkable">
															</td>
															<td><?php echo $i++;?></td>
															<td>
																<?php echo $order->order_id;?>
															</td>
															<td>
																<?php echo htmlspecialchars(date('jS M, Y', $order->order_id),ENT_QUOTES,'UTF-8');?> at <?php echo htmlspecialchars(date('H:i:s', $order->order_id),ENT_QUOTES,'UTF-8');?>
															</td>
															<td>
																<?php echo htmlspecialchars($order->first_name,ENT_QUOTES,'UTF-8');?> <?php echo htmlspecialchars($order->last_name,ENT_QUOTES,'UTF-8');?>
															</td>
															<td>
																<?php echo htmlspecialchars($order->subcounty,ENT_QUOTES,'UTF-8');?>
															</td>
															<td>
																<?php echo $store_currency?> <?php echo htmlspecialchars(number_format($order->total_orders, 2),ENT_QUOTES,'UTF-8');?>
															</td>
															<td>
																<?php
						                                          if ($order->status == 0) {
						                                            ?>
						                                              <span class="label label-sm label-danger">Pending</span>
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
																<span >
			                                                        <a href="<?php echo base_url('admin/order/'.$order->slug)?>" class="btn btn-circle blue-madison btn-xs"><i class="fa fa-search"></i> View</a>
			                                                    </span>
			                                                    <?php 
			                                                    	if ($order->status == 0) {
			                                                    		?>
			                                                    			<div class="btn-group">
																				<a class="btn btn-circle grey-cararra btn-xs" href="javascript:;" data-toggle="dropdown">
																				<!-- <span class="hidden-480">
																				Tools </span> -->
																				<i class="fa fa-ellipsis-h"></i>
																				<i class="fa fa-angle-down"></i>
																				</a>
																				<ul class="dropdown-menu pull-right">
																					<li>
																						<a href="order/cancel/<?php echo $order->id?>">
																						Cancel Order </a>
																					</li>
																					<li>
																						<a href="order/in-transit/<?php echo $order->id?>">
																						Order in Transit </a>
																					</li>
																					<li>
																						<a href="order/process/<?php echo $order->id?>">
																						Process Order </a>
																					</li>
																					<li>
																						<a href="order/deliver/<?php echo $order->id?>">
																						Deliver Order </a>
																					</li>
																				</ul>
																			</div>
			                                                    		<?php
			                                                    	} elseif ($order->status == 1) {
			                                                    		?>
			                                                    			<div class="btn-group">
																				<a class="btn btn-circle grey-cararra btn-xs" href="javascript:;" data-toggle="dropdown">
																				<!-- <span class="hidden-480">
																				Tools </span> -->
																				<i class="fa fa-ellipsis-h"></i>
																				<i class="fa fa-angle-down"></i>
																				</a>
																				<ul class="dropdown-menu pull-right">
																					<li>
																						<a href="order/pending/<?php echo $order->id?>">
																						Order Pending </a>
																					</li>
																					<li>
																						<a href="order/cancel/<?php echo $order->id?>">
																						Cancel Order </a>
																					</li>
																					<li>
																						<a href="order/in-transit/<?php echo $order->id?>">
																						Order in Transit </a>
																					</li>
																					<li>
																						<a href="order/deliver/<?php echo $order->id?>">
																						Deliver Order </a>
																					</li>
																				</ul>
																			</div>
			                                                    		<?php
			                                                    	} elseif ($order->status == 2) {
			                                                    		?>
			                                                    			<div class="btn-group">
																				<a class="btn btn-circle grey-cararra btn-xs" href="javascript:;" data-toggle="dropdown">
																				<!-- <span class="hidden-480">
																				Tools </span> -->
																				<i class="fa fa-ellipsis-h"></i>
																				<i class="fa fa-angle-down"></i>
																				</a>
																				<ul class="dropdown-menu pull-right">
																					<li>
																						<a href="order/pending/<?php echo $order->id?>">
																						Order Pending </a>
																					</li>
																					<li>
																						<a href="order/cancel/<?php echo $order->id?>">
																						Cancel Order </a>
																					</li>
																					<li>
																						<a href="order/process/<?php echo $order->id?>">
																						Process Order </a>
																					</li>
																					<li>
																						<a href="order/deliver/<?php echo $order->id?>">
																						Deliver Order  </a>
																					</li>
																				</ul>
																			</div>
			                                                    		<?php
			                                                    	} elseif ($order->status == 3) {
			                                                    		?>
			                                                    			<div class="btn-group">
																				<a class="btn btn-circle grey-cararra btn-xs" href="javascript:;" data-toggle="dropdown">
																				<!-- <span class="hidden-480">
																				Tools </span> -->
																				<i class="fa fa-ellipsis-h"></i>
																				<i class="fa fa-angle-down"></i>
																				</a>
																				<ul class="dropdown-menu pull-right">
																					<li>
																						<a href="order/pending/<?php echo $order->id?>">
																						Order Pending </a>
																					</li>
																					<li>
																						<a href="order/process/<?php echo $order->id?>">
																						Process Order </a>
																					</li>
																					<li>
																						<a href="order/in-transit/<?php echo $order->id?>">
																						Order in Transit </a>
																					</li>
																					<li>
																						<a href="order/deliver/<?php echo $order->id?>">
																						Deliver Order </a>
																					</li>
																				</ul>
																			</div>
			                                                    		<?php
			                                                    	}
			                                                    ?>
															</td>
														</tr>
													<?php endforeach;?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
		                    </div>  
		                </div>
		            <?php
            	}
            ?>
                
                <!-- END PAGE BASE CONTENT -->
		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->