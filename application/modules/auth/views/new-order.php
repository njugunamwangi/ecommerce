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
						<a data-target="#stack2" data-toggle="modal" href="#stack2">
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
						<li class="active">
							<a href="<?php echo base_url()?>admin/orders/new">
							<i class="fa fa-check-square-o"></i>
							New Order </a>
						</li>
						<li>
							<a href="<?php echo base_url()?>admin/orders">
							<i class="fa fa-list"></i>
							List Orders</a>
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
							<a href="<?php echo base_url()?>admin/settings/general">
							<i class="fa fa-cog"></i>
							<?php echo lang('general_settings_heading')?> </a>
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
			<!-- BEGIN PAGE HEAD -->
			<div class="page-head">
				<!-- BEGIN PAGE TITLE -->
				<div class="page-title">
					<h1> Create New Order </h1>
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
                    <a href="<?php echo base_url(); ?>admin/orders"><?php echo lang('orders_heading'); ?></a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span class="active"><?php echo $title?></span>
                </li>
            </ul>
            <!-- END PAGE BREADCRUMB -->
            <!-- BEGIN PAGE BASE CONTENT -->
            <!-- <?php
                if ($this->session->flashdata('message')) {
                    ?>
                    <div class="alert alert-success">
                        <div id="infoMessage"> <?php echo $message;?></div>
                    </div>
                    <?php
                }
            ?> -->
            <div class="row">
            	<div class="col-md-6">
            		<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i>Products
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="#portlet-config" data-toggle="modal" class="config">
								</a>
							</div>
						</div>
						<div class="portlet-body">
							<div class="row">
								<?php
									foreach ($products as $product) {
										?>
											<div class="col-sm-12 col-md-4">
												<div class="thumbnail">
													<?php echo form_open('auth/add_to_cart');?>
														<img src="<?php echo base_url()?>public/attachments/products/<?php echo $product->image?>" alt="<?php echo $product->name?>" class="img-responsive">
														<div class="caption">
															<p><?php echo ucwords($product->name)?></p>
															<p>
																<div class="pi-price">
																	<?php echo $store_currency?> <?php echo number_format($product->sale_price,2)?>
																</div>
																<div class="form-group form-md-line-input">
																	<input type="text" name="qty" class="form-control" id="form_control_1" placeholder="Enter quantity" value="1">
																</div>
															</p>
															<p>
																<?php echo form_hidden('id', $product->id); ?>
																<button type="submit" class="btn btn-info">Add to Cart</button>
															</p>
														</div>
													<?php echo form_close()?>
												</div>
											</div>
										<?php
									}
								?>
							</div>
						</div>
					</div>
            	</div>
            	<div class="col-md-6">
            		<div class="portlet box green-jungle">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-shopping-cart"></i>Shopping Cart
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="#portlet-config" data-toggle="modal" class="config">
								</a>
							</div>
						</div>
						<div class="portlet-body">
							<?php
								if (empty($cart_items)) {
									?>
										<div >
											<button type="button" class="btn btn-circle blue ">Your cart is empty</button>
										</div>
									<?php
								} else {
									?>
										<div class="table-scrollable">
											<table class="table table-striped table-bordered table-advance table-hover">
												<thead>
													<tr>
														<th>
														</th>
														<th>
															Image
														</th>
														<th class="hidden-xs">
															Description
														</th>
														<th>
															Price
														</th>
														<th>
															Qty
														</th>
														<th>
															</i> Sub Total
														</th>
													</tr>
												</thead>
												<tbody>
													<?php
														foreach ($cart_items as $cart_item) {
															?>
															<tr>
																<td>
																	<?php echo anchor('auth/remove/'.$cart_item['rowid'], 'X')?>
																</td>
																<td>
																	<a href="javascript:;"><img  src="<?php echo base_url()?>public/attachments/products/<?php echo $cart_item['image']?>" style="width: 50px; height: 50px;" alt="<?php echo $cart_item['name']?>" ></a>
																</td>
																<td class="hidden-xs">
																	<?php echo $cart_item['name']?>
																</td>
																<td class="hidden-xs">
																	<?php echo $store_currency, ' ', number_format($cart_item['price'] ,2)?>
																</td>
																<td>
																	 <?php echo $cart_item['qty']?>
																</td>
																<td>
																	<?php echo $store_currency, ' ', number_format($cart_item['subtotal'], 2)?>
																</td>
															</tr>
															<?php
														}
													?>
													
												</tbody>
											</table>
										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="pull-right">
													<h4>
														TOTAL: <?php echo $store_currency, ' ', number_format($this->cart->total(), 2) ?>
													</h4>
												</div>
											</div>
											<div class="col-md-12">
												<div class="pull-right">
													<a href="<?php echo base_url()?>auth/clearcart" class="btn btn-danger ">Clear Cart</a>
	                      							<a href="#checkout" data-toggle="modal" class="btn btn-primary">Checkout <i class="fa fa-check"></i></a>
												</div>
											</div>
										</div>
									<?php
								}
							?>		
						</div>
					</div>
            	</div>
            	<div id="checkout" class="modal fade" tabindex="0" data-width="400">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
								<h4 class="modal-title">Checkout</h4>
							</div>
							<div class="modal-body">
								<div class="row">
									<div class="col-md-12">
										<?php echo form_open('auth/confirm_order'); ?>
                                            <div class="form-body">
                                                <div class="form-group">
													<label class="control-label" for="customer_id"> Customer <span class="require" style="color: red;">*</span> </label>
	                                                <div class="input-group">
	                                                    <span class="input-group-addon">
	                                                        <i class="fa fa-user"></i>
	                                                    </span>
                                                        <select id="customer_id" class="form-control select2me" name="customer_id" >
                                                        	<option value="" >--- Select customer ---</option>
                                                            <?php foreach ($customers as $customer) {
                                                            	?>
                                                            		<option value="<?php echo $customer->id?>" ><?php echo $customer->first_name, ' ', $customer->last_name?></option>
                                                            	<?php
                                                            }?>
                                                        </select>
	                                                </div>
	                                                <div class="caption-subject" style="color: red;">
                                                    	<?php echo form_error('customer_id')?>
                                                    </div>
												</div>
												<hr>
												<h3>Shipping Address</h3>
												<div class="form-group">
													<label class="control-label" for="address"> Address <span class="require" style="color: red;">*</span> </label>
													<div class="input-group">
														<span class="input-group-addon">
															<i class="fa fa-paper-plane"></i>
														</span>
														<input type="text" id="address" style="text-transform: capitalize;" name="address" class="form-control" placeholder="200 Thika" value="">
													</div>
													<div class="caption-subject" style="color: red;">
                                                    	<?php echo form_error('address')?>
                                                    </div>
												</div>
												<div class="form-group">
													<label class="control-label" for="postal_code"> Postal Code <span class="require" style="color: red;">*</span> </label>
													<div class="input-group">
														<span class="input-group-addon">
															<i class="fa fa-paper-plane-o"></i>
														</span>
														<input type="text" id="postal_code" style="text-transform: capitalize;" name="postal_code" class="form-control" placeholder="01020" value="">
													</div>
													<div class="caption-subject" style="color: red;">
                                                    	<?php echo form_error('postal_code')?>
                                                    </div>
												</div>
												<div class="form-group">
													<label class="control-label" for="subcounty"> Town <span class="require" style="color: red;">*</span> </label>
													<div class="input-group">
														<span class="input-group-addon">
															<i class="fa fa-map-marker"></i>
														</span>
														<select id="subcounty" class="form-control select2me" name="subcounty" >
                                                        	<option value="" >--- Select Town ---</option>
                                                            <?php foreach ($subcounties as $subcounty) {
                                                            	?>
                                                            		<option value="<?php echo $subcounty->ship_to?>" ><?php echo $subcounty->ship_to?></option>
                                                            	<?php
                                                            }?>
                                                        </select>
													</div>
													<div class="caption-subject" style="color: red;">
                                                    	<?php echo form_error('subcounty')?>
                                                    </div>
												</div>
												<div class="form-group">
													<label class="control-label" for="county"> County <span class="require" style="color: red;">*</span> </label>
													<div class="input-group">
														<span class="input-group-addon">
															<i class="fa fa-plane"></i>
														</span>
														<select id="county" class="form-control select2me" name="county" >
                                                        	<option value="" >--- Select County ---</option>
                                                            <?php foreach ($counties as $county) {
                                                            	?>
                                                            		<option value="<?php echo $county->county?>" >County <?php echo $county->county_code?> - <?php echo $county->county?></option>
                                                            	<?php
                                                            }?>
                                                        </select>
													</div>
													<div class="caption-subject" style="color: red;">
                                                    	<?php echo form_error('county')?>
                                                    </div>
												</div>
												<hr>
												<div class="form-group">
													<label class="control-label" for="method_of_payment"> Method of Payment <span class="require" style="color: red;">*</span> </label>
													<div class="md-radio-list">
														<div class="md-radio">
															<input type="radio" id="cash_on_delovery" name="method_of_payment" class="md-radiobtn" value="Cash on Delivery">
															<label for="cash_on_delovery">
															<span></span>
															<span class="check"></span>
															<span class="box"></span>
															Cash on Delivery </label>
														</div>
														<div class="md-radio">
															<input type="radio" id="cheque_deposit" name="method_of_payment" class="md-radiobtn" value="Cheque Deposit" checked>
															<label for="cheque_deposit">
															<span></span>
															<span class="check"></span>
															<span class="box"></span>
															Cheque Deposit </label>
														</div>
													</div>
													<div class="caption-subject" style="color: red;">
                                                    	<?php echo form_error('method_of_payment')?>
                                                    </div>
												</div>
												<h3><i class="fa fa-shopping-cart"></i> Shopping Cart</h3>
												<div class="row">
													<div class="col-xs-12">
														<table class="table table-striped table-hover">
															<thead>
																<tr>
																	<th>
																		 #
																	</th>
																	<th>
																		 Image
																	</th>
																	<th class="hidden-480">
																		 Description
																	</th>
																	<th class="hidden-480">
																		 Quantity
																	</th>
																	<th class="hidden-480">
																		 Unit Cost
																	</th>
																	<th>
																		 Total
																	</th>
																</tr>
															</thead>
															<tbody>
																<?php
																	foreach ($cart_items as $cart_item) {
																		?>
																			<tr>
																				<td>
																					<?php echo $i++?>
																				</td>
																				<td>
																					<a href="javascript:;"><img  src="<?php echo base_url()?>public/attachments/products/<?php echo $cart_item['image']?>" style="width: 25px; height: 25px;" alt="<?php echo $cart_item['name']?>" ></a>
																				</td>
																				<td class="hidden-480">
																					<?php echo $cart_item['name']?>
																				</td>
																				<td class="hidden-480">
																					<?php echo $cart_item['qty']?>
																				</td>
																				<td class="hidden-480">
																					<?php echo $store_currency, ' ', number_format($cart_item['price'] ,2) ?>
																				</td>
																				<td>
																					<?php echo $store_currency, ' ', number_format($cart_item['subtotal'] ,2) ?>
																				</td>
																			</tr>
																		<?php
																	}
																?>			
															</tbody>
														</table>
													</div>
													<div class="col-md-6">
														<div class="pull-left">
															<strong style="color: red;">NOTE!</strong> Fields marked with <span class="required" style="color: red;">*</span> are mandatory
														</div>
													</div>
													<div class="col-md-6">
														<div class="pull-right">
															<h4>Total: <?php echo $store_currency, ' ', number_format($this->cart->total(), 2)?></h4> 
														</div>
													</div>
												</div>
                                            </div>
											<div class="modal-footer">
												<button type="button" data-dismiss="modal" class="btn">Close</button>
												<button type="submit" class="btn blue"><i class="fa fa-check"></i> Confirm Order</button>
											</div>
										<?php echo form_close();?>
									</div>
								</div>
								<a class="btn green" data-toggle="modal" href="#register">
								<i class="ison-user-follow"></i> Register New Customer </a>
							</div>
						</div>
					</div>
				</div>
				<div id="register" class="modal fade" tabindex="-1">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
								<h4 class="modal-title">Register New Customer</h4>
							</div>
							<?php echo form_open('auth/register_customer')?>
								<div class="modal-body">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label" for="first_name"> First Name <span class="require" style="color: red;">*</span> </label>
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-user"></i>
													</span>
													<input type="text" id="first_name" style="text-transform: capitalize;" name="first_name" class="form-control" placeholder="Desmond" value="">
												</div>
												<div class="caption-subject" style="color: red;">
	                                            	<?php echo form_error('first_name')?>
	                                            </div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label" for="last_name"> Last Name <span class="require" style="color: red;">*</span> </label>
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-user"></i>
													</span>
													<input type="text" id="last_name" style="text-transform: capitalize;" name="last_name" class="form-control" placeholder="Njuguna" value="">
												</div>
												<div class="caption-subject" style="color: red;">
	                                            	<?php echo form_error('last_name')?>
	                                            </div>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<label class="control-label" for="email"> Email <span class="require" style="color: red;">*</span> </label>
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-envelope"></i>
													</span>
													<input type="email" id="email" name="email" class="form-control" placeholder="user@user.com" value="">
												</div>
												<div class="caption-subject" style="color: red;">
		                                        	<?php echo form_error('email')?>
		                                        </div>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<label class="control-label" for="phone"> Phone </label>
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-phone"></i>
													</span>
													<input type="text" id="phone" style="text-transform: capitalize;" name="phone" class="form-control" placeholder="+254704220220" value="">
												</div>
												<div class="caption-subject" style="color: red;">
		                                        	<?php echo form_error('phone')?>
		                                        </div>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<label class="control-label" for="password"> Password <span class="require" style="color: red;">*</span> </label>
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-user-secret"></i>
													</span>
													<input type="password" id="password" name="password" class="form-control" placeholder="password" value="">
												</div>
												<div class="caption-subject" style="color: red;">
		                                        	<?php echo form_error('password')?>
		                                        </div>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<label class="control-label" for="password_confirm"> Confirm Password <span class="require" style="color: red;">*</span> </label>
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-user-secret"></i>
													</span>
													<input type="password" id="password_confirm" name="password_confirm" class="form-control" placeholder="confirm password" value="">
												</div>
												<div class="caption-subject" style="color: red;">
		                                        	<?php echo form_error('password_confirm')?>
		                                        </div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="pull-left">
												<strong style="color: red;">NOTE!</strong> Fields marked with <span class="required" style="color: red;">*</span> are mandatory
											</div>
										</div>
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" data-dismiss="modal" class="btn">Close</button>
									<button type="submit" class="btn blue"><i class="fa fa-check"></i> Register Customer </button>
								</div>
							<?php echo form_close()?>
						</div>
					</div>
				</div>
				<div id="stack2" class="modal fade" tabindex="-1" data-width="400">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
								<h4 class="modal-title">Add Category</h4>
							</div>
							<div class="modal-body">
								<div class="row">
									<div class="col-md-12">
                                        <?php echo form_open('auth/add_category'); ?>
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label class="control-label" for="pd_category"> Category <span class="required"> *</span></label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-paragraph"></i>
                                                        </span>
                                                        <input type="text" name="pd_category" style="text-transform: capitalize;" class="form-control" placeholder="Tecno" value="" id="pd_category"> 
                                                    </div>
                                                    <div class="caption-subject" style="color: red;">
                                                    	<?php echo form_error('pd_category')?>
                                                    </div>
                                                </div>
                                                <div class="form-group">
													<label class="control-label" for="pd_parent_category">Parent Category </label>
	                                                <div class="input-group">
	                                                    <span class="input-group-addon">
	                                                        <i class="fa fa-institution"></i>
	                                                    </span>
                                                        <select id="pd_parent_category" class="form-control select2me" name="pd_parent_category" >
                                                        	<option value="" >Select parent category...</option>
                                                            <?php foreach ($categories as $category ) {
                                                            	if ($category->parent_category == null) {
                                                            		?>
                                                            			<option value="<?php echo $category->category?>"><?php echo $category->category?></option>

                                                            			<?php
                                                            				$this->db->order_by('categories.category', 'asc');
                                                            				$subcategories = $this->db->get_where('categories', ['parent_category' => $category->category])->result();

                                                            				foreach ($subcategories as $subcategory) {
                                                            					?>
                                                            						<option value="<?php echo $subcategory->category?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $subcategory->category?></option>
                                                            					<?php
                                                            				}
                                                            			?>
                                                            		<?php
                                                            	}
                                                            }?>
                                                        </select>
	                                                </div>
	                                                <div class="caption-subject" style="color: red;">
                                                    	<?php echo form_error('pd_parent_category')?>
                                                    </div>
												</div>
                                            </div>
                                            <div class="modal-footer">
												<button type="button" data-dismiss="modal" class="btn">Close</button>
												<button type="submit" class="btn blue"><?php echo $this->lang->line('publish_category_heading')?></button>
											</div>
										<?php echo form_close();?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div id="stack3" class="modal fade" tabindex="-1">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
								<h4 class="modal-title">Add Tag</h4>
							</div>
							<div class="modal-body">
								<div class="row">
									<div class="col-md-12">
                                        <?php echo form_open('auth/add_tag'); ?>
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label class="control-label" for="pd_tag">Tag <span class="required"> *</span></label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-paragraph"></i>
                                                        </span>
                                                        <input type="text" name="pd_tag" style="text-transform: capitalize;" class="form-control" placeholder="Tecno" value="" id="pd_tag"> 
                                                    </div>
                                                    <div class="caption-subject" style="color: red;">
                                                    	<?php echo form_error('pd_tag')?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
												<button type="button" data-dismiss="modal" class="btn">Close</button>
												<button type="submit" class="btn blue">Add Tag</button>
											</div>
										<?php echo form_close();?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
            </div>
            <!-- END PAGE BASE CONTENT -->
		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->