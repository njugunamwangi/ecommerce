		<title><?php echo $title, ' | ', $name_of_store ?></title>
	</head>
	<!-- END HEAD -->
	<!-- BEGIN BODY -->
	<!-- DOC: Apply "page-header-fixed-mobile" and "page-footer-fixed-mobile" class to body element to force fixed header or footer in mobile devices -->
	<!-- DOC: Apply "page-sidebar-closed" class to the body and "page-sidebar-menu-closed" class to the sidebar menu element to hide the sidebar by default -->
	<!-- DOC: Apply "page-sidebar-hide" class to the body to make the sidebar completely hidden on toggle -->
	<!-- DOC: Apply "page-sidebar-closed-hide-logo" class to the body element to make the logo hidden on sidebar toggle -->
	<!-- DOC: Apply "page-sidebar-hide" class to body element to completely hide the sidebar on sidebar toggle -->
	<!-- DOC: Apply "page-sidebar-fixed" class to have fixed sidebar -->
	<!-- DOC: Apply "page-footer-fixed" class to the body element to have fixed footer -->
	<!-- DOC: Apply "page-sidebar-reversed" class to put the sidebar on the right side -->
	<!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->
	<body class="page-md page-header-fixed page-sidebar-closed page-sidebar-closed-hide-logo page-sidebar-fixed">
		<!-- BEGIN HEADER -->
		<div class="page-header md-shadow-z-1-i navbar navbar-fixed-top">
			<!-- BEGIN HEADER INNER -->
			<div class="page-header-inner">
				<!-- BEGIN LOGO -->
				<div class="page-logo">
					<!-- <a href="<?php echo base_url()?>vendor">
					<img src="<?php echo base_url('public/icon/logo-light.png'); ?>" alt="logo" class="logo-default"/>
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
							<!-- END TODO DROPDOWN -->
							<!-- BEGIN USER LOGIN DROPDOWN -->
							<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
							<li class="dropdown dropdown-user dropdown-dark">
								<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
								<span class="username username-hide-on-mobile">
								<?php echo $vendor_info->first_name; ?> <?php echo $vendor_info->last_name; ?> </span>
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
										<a href="<?php echo base_url()?>vendor/profile">
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
				<!-- BEGIN PAGE BREADCRUMB -->
				<ul class="page-breadcrumb breadcrumb">
					<li>
						<a href="<?php echo base_url()?>vendor">Home</a>
						<i class="fa fa-circle"></i>
					</li>
					<li>
						<span class="active"> <?php echo $title; ?></span>
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
	                      	<div id="infoMessage"> <?php echo '<strong>Info!</strong>', ' ', $message;?></div>
	                  	</div>
	                  <?php
	              	}
	            ?>
				<div class="row">
					<div class="col-md-12">
						<!-- BEGIN PROFILE SIDEBAR -->
						<div class="profile-sidebar" style="width: 250px;">
							<!-- PORTLET MAIN -->
							<div class="portlet light profile-sidebar-portlet">
								<!-- SIDEBAR USERPIC -->
								<div class="profile-userpic">
									<img src="<?php echo base_url()?>public/attachments/<?php echo $user_icon; ?>" class="img-responsive" alt="">
								</div>
								<!-- END SIDEBAR USERPIC -->
								<!-- SIDEBAR USER TITLE -->
								<div class="profile-usertitle">
									<div class="profile-usertitle-name">
										 <?php echo $vendor_info->first_name;?> <?php echo $vendor_info->last_name;?>
									</div>
									<div class="profile-usertitle-job">
										 <?php echo $vendor_info->company?>
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
									<ul class="nav">
										<li >
											<a href="<?php echo base_url()?>vendor/profile">
											<i class="fa fa-home"></i>
											Overview </a>
										</li>
										<li class="active">
											<a href="<?php echo base_url()?>vendor/account-settings">
											<i class="fa fa-cogs"></i>
											Account Settings </a>
										</li>
										<li>
											<a href="<?php echo base_url()?>vendor/tasks" >
											<i class="fa fa-check-square-o"></i>
											Tasks </a>
										</li>
									</ul>
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
											 37
										</div>
										<div class="uppercase profile-stat-text">
											 Projects
										</div>
									</div>
									<div class="col-md-4 col-sm-4 col-xs-6">
										<div class="uppercase profile-stat-title">
											 51
										</div>
										<div class="uppercase profile-stat-text">
											 Tasks
										</div>
									</div>
									<div class="col-md-4 col-sm-4 col-xs-6">
										<div class="uppercase profile-stat-title">
											 61
										</div>
										<div class="uppercase profile-stat-text">
											 Uploads
										</div>
									</div>
								</div>
								<!-- END STAT -->
								<div>
									<h4 class="profile-desc-title">About <?php echo $vendor_info->first_name?></h4>
									<span class="profile-desc-text"> Lorem ipsum dolor sit amet diam nonummy nibh dolore. </span>
									<div class="margin-top-20 profile-desc-link">
										<i class="fa fa-envelope"></i>
										<a href="mailto:<?php echo $vendor_info->email?>"><?php echo $vendor_info->email?></a>
									</div>
									<div class="margin-top-20 profile-desc-link">
										<i class="fa fa-phone"></i>
										<?php echo $vendor_info->phone?></a>
									</div>
									<div class="margin-top-20 profile-desc-link">
										<i class="fa fa-globe"></i>
										<a href="http://www.keenthemes.com">www.keenthemes.com</a>
									</div>
									<div class="margin-top-20 profile-desc-link">
										<i class="fa fa-twitter"></i>
										<a href="http://www.twitter.com/keenthemes/">@keenthemes</a>
									</div>
									<div class="margin-top-20 profile-desc-link">
										<i class="fa fa-facebook"></i>
										<a href="http://www.facebook.com/keenthemes/">keenthemes</a>
									</div>
								</div>
							</div>
							<!-- END PORTLET MAIN -->
						</div>
						<!-- END BEGIN PROFILE SIDEBAR -->
						<!-- BEGIN PROFILE CONTENT -->
						<div class="profile-content">
							<div class="row">
								<div class="col-md-12">
									<div class="portlet light">
										<div class="portlet-title tabbable-line">
											<div class="caption caption-md">
												<i class="icon-globe theme-font hide"></i>
												<span class="caption-subject font-blue-madison bold uppercase">Profile Account</span>
											</div>
											<ul class="nav nav-tabs">
												<li class="active">
													<a href="#personal_info" data-toggle="tab">Personal Info</a>
												</li>
												<li>
													<a href="#profile_picture" data-toggle="tab">Change Avatar</a>
												</li>
												<li>
													<a href="#tab_1_3" data-toggle="tab">Change Password</a>
												</li>
												<li>
													<a href="#tab_1_4" data-toggle="tab">Privacy Settings</a>
												</li>
											</ul>
										</div>
										<div class="portlet-body">
											<div class="tab-content">
												<!-- PERSONAL INFO TAB -->
												<div class="tab-pane active" id="personal_info">
													<form role="form" action="#">
														<div class="form-group">
															<label class="control-label">First Name</label>
															<input type="text" placeholder="John" value="<?php echo $vendor_info->first_name?>" class="form-control"/>
														</div>
														<div class="form-group">
															<label class="control-label">Last Name</label>
															<input type="text" placeholder="Doe" value="<?php echo $vendor_info->last_name?>" class="form-control"/>
														</div>
														<div class="form-group">
															<label class="control-label">Mobile Number</label>
															<input type="text" placeholder="+1 646 580 DEMO (6284)" value="<?php echo $vendor_info->phone?>" class="form-control"/>
														</div>
														<div class="form-group">
															<label class="control-label">Interests</label>
															<input type="text" placeholder="Design, Web etc." class="form-control"/>
														</div>
														<div class="form-group">
															<label class="control-label">Occupation</label>
															<input type="text" placeholder="Web Developer" class="form-control"/>
														</div>
														<div class="form-group">
															<label class="control-label">About</label>
															<textarea class="form-control" rows="3" placeholder="We are KeenThemes!!!"></textarea>
														</div>
														<div class="form-group">
															<label class="control-label">Website Url</label>
															<input type="text" placeholder="http://www.mywebsite.com" class="form-control"/>
														</div>
														<div class="margiv-top-10">
															<a href="javascript:;" class="btn green-haze">
															Save Changes </a>
															<a href="javascript:;" class="btn default">
															Cancel </a>
														</div>
													</form>
												</div>
												<!-- END PERSONAL INFO TAB -->
												<!-- CHANGE AVATAR TAB -->
												<div class="tab-pane" id="profile_picture">
													<p>
														 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
													</p>
													<form method="post" action="<?php echo base_url('vendors/upload_profile_picture')?>" enctype="multipart/form-data">
														<div class="form-group">
															<div class="fileinput fileinput-new" data-provides="fileinput">
					                                            <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 150px; height: 150px;"> 
					                                            	<img src="<?php echo base_url()?>public/attachments/<?php echo $user_icon; ?>" alt=""/>
					                                            </div>
					                                            <div>
					                                                <span class="btn red btn-outline btn-file">
					                                                	<span class="fileinput-new">Select Image</span>
					                                                	<span class="fileinput-exists">Change</span>
					                                                    <input type="file" name="profile_picture" value="<?php echo set_value('')?>">
					                                                </span>
					                                                <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput">Remove</a>
					                                            </div>
					                                        </div>
														</div>
														<div class="margin-top-10">
															<button type="cancel" class="btn default">Cancel</button>
                                        					<button type="submit" class="btn blue"><i class="fa fa-check-square-o"></i>Submit</button>
														</div>
													</form>
												</div>
												<!-- END CHANGE AVATAR TAB -->
												<!-- CHANGE PASSWORD TAB -->
												<div class="tab-pane" id="tab_1_3">
													<form action="#">
														<div class="form-group">
															<label class="control-label">Current Password</label>
															<input type="password" class="form-control"/>
														</div>
														<div class="form-group">
															<label class="control-label">New Password</label>
															<input type="password" class="form-control"/>
														</div>
														<div class="form-group">
															<label class="control-label">Re-type New Password</label>
															<input type="password" class="form-control"/>
														</div>
														<div class="margin-top-10">
															<a href="javascript:;" class="btn green-haze">
															Change Password </a>
															<a href="javascript:;" class="btn default">
															Cancel </a>
														</div>
													</form>
												</div>
												<!-- END CHANGE PASSWORD TAB -->
												<!-- PRIVACY SETTINGS TAB -->
												<div class="tab-pane" id="tab_1_4">
													<form action="#">
														<table class="table table-light table-hover">
														<tr>
															<td>
																 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus..
															</td>
															<td>
																<label class="uniform-inline">
																<input type="radio" name="optionsRadios1" value="option1"/>
																Yes </label>
																<label class="uniform-inline">
																<input type="radio" name="optionsRadios1" value="option2" checked/>
																No </label>
															</td>
														</tr>
														<tr>
															<td>
																 Enim eiusmod high life accusamus terry richardson ad squid wolf moon
															</td>
															<td>
																<label class="uniform-inline">
																<input type="checkbox" value=""/> Yes </label>
															</td>
														</tr>
														<tr>
															<td>
																 Enim eiusmod high life accusamus terry richardson ad squid wolf moon
															</td>
															<td>
																<label class="uniform-inline">
																<input type="checkbox" value=""/> Yes </label>
															</td>
														</tr>
														<tr>
															<td>
																 Enim eiusmod high life accusamus terry richardson ad squid wolf moon
															</td>
															<td>
																<label class="uniform-inline">
																<input type="checkbox" value=""/> Yes </label>
															</td>
														</tr>
														</table>
														<!--end profile-settings-->
														<div class="margin-top-10">
															<a href="javascript:;" class="btn green-haze">
															Save Changes </a>
															<a href="javascript:;" class="btn default">
															Cancel </a>
														</div>
													</form>
												</div>
												<!-- END PRIVACY SETTINGS TAB -->
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- END PROFILE CONTENT -->
					</div>
				</div>
				<!-- END PAGE CONTENT-->
			</div>
		</div>
		<!-- END CONTENT -->
	</div>
	<!-- END CONTAINER -->
