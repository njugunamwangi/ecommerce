	<title><?php echo $title, ' | ', $name_of_store?></title>
</head>
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
						<i class="fa fa-tags"></i> <?php echo $this->lang->line('publish_tag_heading')?> </a>
					</li>
					<li>
						<a href="javascript:;">
						<i class="icon-share"></i> Share </a>
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
					<!-- END TODO DROPDOWN -->
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
				<li class="active">
					<a href="javascript:;">
					<i class="fa fa-gift"></i>
					<span class="title">Products</span>
					<span class="arrow open"></span>
					</a>
					<ul class="sub-menu">
						<li class="active">
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
									<i class="fa fa-check-square-o"></i>
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
					<h1> Publish Product</h1>
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
					<a href="<?php echo base_url()?>admin/products">Products</a>
					<i class="fa fa-circle"></i>
				</li>
				<li class="active">
					Publish Product
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PORTLET-->
					<div class="portlet box blue">
						<div class="portlet-body form">
							<form method="post" enctype="multipart/form-data" action="<?php echo base_url('auth/publish_product')?>">
                                <div class="form-body">
                                	<div class="form-group">
                                       	<label class="control-label" for="image">Product Image <span class="required"> *</span></label>
                                    </div>
									<div class="form-group">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 150px; height: 150px;"> 
                                            </div>
                                            <div>
                                                <span class="btn red btn-outline btn-file">
                                                	<span class="fileinput-new">Select Image</span>
                                                	<span class="fileinput-exists">Change</span>
                                                    <input type="file" name="image" >
                                                </span>
                                                <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput">Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="name">Name of Product <span class="required"> *</span></label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-paragraph"></i>
                                            </span>
                                            <input type="text" name="name" style="text-transform: capitalize;" class="form-control" placeholder="Kenpoly Round Trolley" value="" id="name"> 
                                        </div>
                                        <div class="caption-subject" style="color: red;">
                                        	<?php echo form_error('name')?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="snippet">Short Description <span class="required"> *</span></label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-paragraph"></i>
                                            </span>
                                            <input type="text" name="snippet" style="text-transform: capitalize;" class="form-control" placeholder="" value="" id="snippet"> 
                                        </div>
                                        <div class="caption-subject" style="color: red;">
                                        	<?php echo form_error('snippet')?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="description">Description<span class="required"> *</span></label>
                                        <div class="input-group col-md-12">
                                        	<textarea class="ckeditor form-control" name="description" rows="6" value="<?php echo set_value('description')?>" id="description"></textarea>
                                        </div>
                                        <div class="caption-subject" style="color: red;">
                                        	<?php echo form_error('description')?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="categories">Categories <span class="required"> *</span></label>
                                        <div class="form-control height-auto">
											<div class="scroller" style="height:275px;" data-always-visible="1">
												<ul class="list-unstyled">
													<?php foreach ($categories as $category) {
														if ($category->parent_category == NULL) {
															?>
																<li>
																	<label><input type="checkbox" name="categories[]" value="<?php echo $category->category?>"><?php echo $category->category?></label>
																	<ul class="list-unstyled">
																		<?php
																			$this->db->order_by('categories.category');
																			$subcategories = $this->db->get_where('categories', ['parent_category' => $category->category])->result();

																			foreach ($subcategories as $subcategory) {
																				?>
																					<li>
																						<label>
																							<input type="checkbox" name="categories[]" value="<?php echo $subcategory->category?>"><?php echo $subcategory->category?>
																						</label>
																						<ul class="list-unstyled">
																							<?php
																								$this->db->order_by('categories.category');
																								$mini_categories = $this->db->get_where('categories', ['parent_category' => $subcategory->category])->result();

																								foreach ($mini_categories as $mini_category) {
																									?>
																										<li>
																											<label>
																												<input type="checkbox" name="categories[]" value="<?php echo $mini_category->category?>">
																												<?php echo $mini_category->category?>
																											</label>
																										</li>
																									<?php
																								}
																							?>
																						</ul>
																					</li>
																				<?php
																			}
																		?>
																	</ul>
																</li>
															<?php
														}?>		
														<?php
													}?>
												</ul>
											</div>
										</div>
										<span class="help-block">
										select one or more categories </span>
                                        <div class="caption-subject" style="color: red;">
                                        	<?php echo form_error('categories[]')?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="tags">Tags <span class="required"> *</span></label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-tags"></i>
                                            </span>
                                            <input type="text" name="tags[]" style="text-transform: capitalize;" class="form-control" placeholder="" value="" id="tags"> 
                                        </div>
                                        <div class="caption-subject" style="color: red;">
                                        	<?php echo form_error('tags[]')?>
                                        </div>
                                    </div>
                                    <div class="form-group" >
                                        <label class="control-label" for="colors">Colors</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-arrows-h"></i>
                                            </span>
                                            <input type="text" name="colors[]" style="text-transform: capitalize;" class="form-control" placeholder="Blue, Black..." value="" id="colors"> 
                                        </div>
                                        <div class="caption-subject" style="color: red;">
                                        	<?php echo form_error('colors[]')?>
                                        </div>
                                    </div>
									<div class="form-group" >
                                        <label class="control-label" for="sizes">Sizes</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-arrows-v"></i>
                                            </span>
                                            <input type="text" name="sizes[]" style="text-transform: capitalize;" class="form-control" placeholder="40, 41, 42..." value="" id="sizes"> 
                                        </div>
                                        <div class="caption-subject" style="color: red;">
                                        	<?php echo form_error('sizes[]')?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="regular_price">Regular Price <span class="required"> *</span></label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-money"></i>
                                            </span>
                                            <input type="text" name="regular_price" style="text-transform: capitalize;" class="form-control" placeholder="" value="" id="regular_price"> 
                                        </div>
                                        <div class="caption-subject" style="color: red;">
                                        	<?php echo form_error('regular_price')?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="sale_price">Sale Price <span class="required"> *</span></label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-money"></i>
                                            </span>
                                            <input type="text" name="sale_price" style="text-transform: capitalize;" class="form-control" placeholder="" value="" id="sale_price"> 
                                        </div>
                                        <div class="caption-subject" style="color: red;">
                                        	<?php echo form_error('sale_price')?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="wholesale_price">Wholesale Price <span class="required"> *</span></label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-money"></i>
                                            </span>
                                            <input type="text" name="wholesale_price" style="text-transform: capitalize;" class="form-control" placeholder="" value="" id="wholesale_price"> 
                                        </div>
                                        <div class="caption-subject" style="color: red;">
                                        	<?php echo form_error('wholesale_price')?>
                                        </div>
                                    </div>
                                    <div class="form-group">
	                                    <label for="status" class="control-label">Status</label>
	                                    <div class="input-group">
	                                    	<span class="input-group-addon">
	                                            <i class="fa fa-exclamation"></i>
	                                        </span>
	                                    	<select id="status" class="form-control select2me" name="status" >
	                                            <option value="">Select Status...</option>
	                                            <option value="1">Publish</option>
	                                            <option value="2">Draft</option>
	                                        </select> 
	                                    </div>
	                                    <div class="caption-subject" style="color: red;">
	                                        <?php echo form_error('status');?>
	                                    </div>
	                                </div>
                                </div>
                                <div class="form-actions">
                                    <div class="btn-set pull-right">
                                        <button type="cancel" class="btn default">Cancel</button>
                                        <button type="submit" class="btn blue"><i class="fa fa-check-square-o"></i>Publish Product</button>
                                    </div>
                                </div>
                            </form>
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
					</div>
					<!-- END PORTLET-->
				</div>
			</div>
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->