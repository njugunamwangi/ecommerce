	<title><?php echo $title;?> | <?php echo $name_of_store?></title>
</head>
<body class="page-md page-header-fixed page-sidebar-closed-hide-logo ">
<!-- BEGIN HEADER -->
<div class="page-header md-shadow-z-1-i navbar navbar-fixed-top">
	<!-- BEGIN HEADER INNER -->
	<div class="page-header-inner">
		<!-- BEGIN LOGO -->
		<div class="page-logo">
			<a href="<?php echo base_url()?>admin">
			<img src="<?php echo base_url()?>public/assets/admin/layout4/img/logo-light.png" alt="logo" class="logo-default"/>
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
						<a href="javascript:;">
						<i class="icon-docs"></i> New Post </a>
					</li>
					<li>
						<a href="javascript:;">
						<i class="icon-tag"></i> New Comment </a>
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
			<!-- BEGIN HEADER SEARCH BOX -->
			<!-- DOC: Apply "search-form-expanded" right after the "search-form" class to have half expanded search box -->
			<form class="search-form" action="extra_search.html" method="GET">
				<div class="input-group">
					<input type="text" class="form-control input-sm" placeholder="Search..." name="query">
					<span class="input-group-btn">
					<a href="javascript:;" class="btn submit"><i class="icon-magnifier"></i></a>
					</span>
				</div>
			</form>
			<!-- END HEADER SEARCH BOX -->
			<!-- BEGIN TOP NAVIGATION MENU -->
			<div class="top-menu">
				<ul class="nav navbar-nav pull-right">
					<li class="separator hide">
					</li>
					<!-- BEGIN NOTIFICATION DROPDOWN -->
					<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
					<li class="dropdown dropdown-extended dropdown-notification dropdown-dark" id="header_notification_bar">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<i class="icon-bell"></i>
						<span class="badge badge-success">
						7 </span>
						</a>
						<ul class="dropdown-menu">
							<li class="external">
								<h3><span class="bold">12 pending</span> notifications</h3>
								<a href="extra_profile.html">view all</a>
							</li>
							<li>
								<ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
									<li>
										<a href="javascript:;">
										<span class="time">just now</span>
										<span class="details">
										<span class="label label-sm label-icon label-success">
										<i class="fa fa-plus"></i>
										</span>
										New user registered. </span>
										</a>
									</li>
									<li>
										<a href="javascript:;">
										<span class="time">3 mins</span>
										<span class="details">
										<span class="label label-sm label-icon label-danger">
										<i class="fa fa-bolt"></i>
										</span>
										Server #12 overloaded. </span>
										</a>
									</li>
									<li>
										<a href="javascript:;">
										<span class="time">10 mins</span>
										<span class="details">
										<span class="label label-sm label-icon label-warning">
										<i class="fa fa-bell-o"></i>
										</span>
										Server #2 not responding. </span>
										</a>
									</li>
									<li>
										<a href="javascript:;">
										<span class="time">14 hrs</span>
										<span class="details">
										<span class="label label-sm label-icon label-info">
										<i class="fa fa-bullhorn"></i>
										</span>
										Application error. </span>
										</a>
									</li>
									<li>
										<a href="javascript:;">
										<span class="time">2 days</span>
										<span class="details">
										<span class="label label-sm label-icon label-danger">
										<i class="fa fa-bolt"></i>
										</span>
										Database overloaded 68%. </span>
										</a>
									</li>
									<li>
										<a href="javascript:;">
										<span class="time">3 days</span>
										<span class="details">
										<span class="label label-sm label-icon label-danger">
										<i class="fa fa-bolt"></i>
										</span>
										A user IP blocked. </span>
										</a>
									</li>
									<li>
										<a href="javascript:;">
										<span class="time">4 days</span>
										<span class="details">
										<span class="label label-sm label-icon label-warning">
										<i class="fa fa-bell-o"></i>
										</span>
										Storage Server #4 not responding dfdfdfd. </span>
										</a>
									</li>
									<li>
										<a href="javascript:;">
										<span class="time">5 days</span>
										<span class="details">
										<span class="label label-sm label-icon label-info">
										<i class="fa fa-bullhorn"></i>
										</span>
										System Error. </span>
										</a>
									</li>
									<li>
										<a href="javascript:;">
										<span class="time">9 days</span>
										<span class="details">
										<span class="label label-sm label-icon label-danger">
										<i class="fa fa-bolt"></i>
										</span>
										Storage server failed. </span>
										</a>
									</li>
								</ul>
							</li>
						</ul>
					</li>
					<!-- END NOTIFICATION DROPDOWN -->
					<li class="separator hide">
					</li>
					<!-- BEGIN INBOX DROPDOWN -->
					<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
					<li class="dropdown dropdown-extended dropdown-inbox dropdown-dark" id="header_inbox_bar">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<i class="icon-envelope-open"></i>
						<span class="badge badge-danger">
						4 </span>
						</a>
						<ul class="dropdown-menu">
							<li class="external">
								<h3>You have <span class="bold">7 New</span> Messages</h3>
								<a href="inbox.html">view all</a>
							</li>
							<li>
								<ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
									<li>
										<a href="inbox.html?a=view">
										<span class="photo">
										<img src="<?php echo base_url()?>public/assets/admin/layout3/img/avatar2.jpg" class="img-circle" alt="">
										</span>
										<span class="subject">
										<span class="from">
										Lisa Wong </span>
										<span class="time">Just Now </span>
										</span>
										<span class="message">
										Vivamus sed auctor nibh congue nibh. auctor nibh auctor nibh... </span>
										</a>
									</li>
									<li>
										<a href="inbox.html?a=view">
										<span class="photo">
										<img src="<?php echo base_url()?>public/assets/admin/layout3/img/avatar3.jpg" class="img-circle" alt="">
										</span>
										<span class="subject">
										<span class="from">
										Richard Doe </span>
										<span class="time">16 mins </span>
										</span>
										<span class="message">
										Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
										</a>
									</li>
									<li>
										<a href="inbox.html?a=view">
										<span class="photo">
										<img src="<?php echo base_url()?>public/assets/admin/layout3/img/avatar1.jpg" class="img-circle" alt="">
										</span>
										<span class="subject">
										<span class="from">
										Bob Nilson </span>
										<span class="time">2 hrs </span>
										</span>
										<span class="message">
										Vivamus sed nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
										</a>
									</li>
									<li>
										<a href="inbox.html?a=view">
										<span class="photo">
										<img src="<?php echo base_url()?>public/assets/admin/layout3/img/avatar2.jpg" class="img-circle" alt="">
										</span>
										<span class="subject">
										<span class="from">
										Lisa Wong </span>
										<span class="time">40 mins </span>
										</span>
										<span class="message">
										Vivamus sed auctor 40% nibh congue nibh... </span>
										</a>
									</li>
									<li>
										<a href="inbox.html?a=view">
										<span class="photo">
										<img src="<?php echo base_url()?>public/assets/admin/layout3/img/avatar3.jpg" class="img-circle" alt="">
										</span>
										<span class="subject">
										<span class="from">
										Richard Doe </span>
										<span class="time">46 mins </span>
										</span>
										<span class="message">
										Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
										</a>
									</li>
								</ul>
							</li>
						</ul>
					</li>
					<!-- END INBOX DROPDOWN -->
					<li class="separator hide">
					</li>
					<!-- BEGIN TODO DROPDOWN -->
					<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
					<li class="dropdown dropdown-extended dropdown-tasks dropdown-dark" id="header_task_bar">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<i class="icon-calendar"></i>
						<span class="badge badge-primary">
						3 </span>
						</a>
						<ul class="dropdown-menu extended tasks">
							<li class="external">
								<h3>You have <span class="bold">12 pending</span> tasks</h3>
								<a href="page_todo.html">view all</a>
							</li>
							<li>
								<ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
									<li>
										<a href="javascript:;">
										<span class="task">
										<span class="desc">New release v1.2 </span>
										<span class="percent">30%</span>
										</span>
										<span class="progress">
										<span style="width: 40%;" class="progress-bar progress-bar-success" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">40% Complete</span></span>
										</span>
										</a>
									</li>
									<li>
										<a href="javascript:;">
										<span class="task">
										<span class="desc">Application deployment</span>
										<span class="percent">65%</span>
										</span>
										<span class="progress">
										<span style="width: 65%;" class="progress-bar progress-bar-danger" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">65% Complete</span></span>
										</span>
										</a>
									</li>
									<li>
										<a href="javascript:;">
										<span class="task">
										<span class="desc">Mobile app release</span>
										<span class="percent">98%</span>
										</span>
										<span class="progress">
										<span style="width: 98%;" class="progress-bar progress-bar-success" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">98% Complete</span></span>
										</span>
										</a>
									</li>
									<li>
										<a href="javascript:;">
										<span class="task">
										<span class="desc">Database migration</span>
										<span class="percent">10%</span>
										</span>
										<span class="progress">
										<span style="width: 10%;" class="progress-bar progress-bar-warning" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">10% Complete</span></span>
										</span>
										</a>
									</li>
									<li>
										<a href="javascript:;">
										<span class="task">
										<span class="desc">Web server upgrade</span>
										<span class="percent">58%</span>
										</span>
										<span class="progress">
										<span style="width: 58%;" class="progress-bar progress-bar-info" aria-valuenow="58" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">58% Complete</span></span>
										</span>
										</a>
									</li>
									<li>
										<a href="javascript:;">
										<span class="task">
										<span class="desc">Mobile development</span>
										<span class="percent">85%</span>
										</span>
										<span class="progress">
										<span style="width: 85%;" class="progress-bar progress-bar-success" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">85% Complete</span></span>
										</span>
										</a>
									</li>
									<li>
										<a href="javascript:;">
										<span class="task">
										<span class="desc">New UI release</span>
										<span class="percent">38%</span>
										</span>
										<span class="progress progress-striped">
										<span style="width: 38%;" class="progress-bar progress-bar-important" aria-valuenow="18" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">38% Complete</span></span>
										</span>
										</a>
									</li>
								</ul>
							</li>
						</ul>
					</li>
					<!-- END TODO DROPDOWN -->
					<!-- BEGIN USER LOGIN DROPDOWN -->
					<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
					<li class="dropdown dropdown-user dropdown-dark">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<span class="username username-hide-on-mobile">
						<?php echo $user_account->first_name?> <?php echo $user_account->last_name?> </span>
						<!-- DOC: Do not remove below empty space(&nbsp;) as its purposely used -->
						<img alt="" class="img-circle" src="<?php echo base_url()?>public/assets/admin/layout4/img/avatar9.jpg"/>
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
								<a href="logout">
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
				<li class="start active">
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
								<li >
									<a href="<?php echo base_url()?>admin/products/subcategories/add">
									<i class="fa fa-check-square"></i>
									Publish Sub Category</a>
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
							<i class="fa fa-bookmark"></i>
							<span class="title">Tags</span>
							<span class="arrow "></span>
							</a>
							<ul class="sub-menu">
								<li >
									<a href="<?php echo base_url()?>admin/products/tags/add">
									<i class="fa fa-check-square-o"></i>
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
					<i class="icon-basket"></i>
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
				<li >
					<a href="<?php echo base_url()?>">
					<i class="fa fa-check-square-o"></i>
					<?php echo $name_of_store?> </a>
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
					<h1>Dashboard <small>dashboard & statistics</small></h1>
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
					<a href="#">Dashboard</a>
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 margin-bottom-10">
					<div class="dashboard-stat2">
						<div class="display">
							<div class="number">
								</small><h3 class="font-green-sharp"><small class="font-green-sharp"><?php echo $currency?> 168,492</h3>
								<small>TOTAL SALES</small>
							</div>
							<div class="icon">
								<i class="icon-pie-chart"></i>
							</div>
						</div>
						<!-- <div class="progress-info">
							<div class="progress">
								<span style="width: 76%;" class="progress-bar progress-bar-success green-sharp">
								<span class="sr-only">76% progress</span>
								</span>
							</div>
							<div class="status">
								<div class="status-title">
									 progress
								</div>
								<div class="status-number">
									 76%
								</div>
							</div>
						</div> -->
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
					<div class="dashboard-stat2">
						<div class="display">
							<div class="number">
								<h3 class="font-red-haze"><?php echo $total_orders?></h3>
								<small>TOTAL ORDERS</small>
							</div>
							<div class="icon">
								<i class="icon-like"></i>
							</div>
						</div>
						<!-- <div class="progress-info">
							<div class="progress">
								<span style="width: 85%;" class="progress-bar progress-bar-success red-haze">
								<span class="sr-only">85% change</span>
								</span>
							</div>
							<div class="status">
								<div class="status-title">
									 change
								</div>
								<div class="status-number">
									<?php 
										$percent = $total_orders/$this->config->item('order_target');
										echo $percentage =  $percent*100;
										echo '%';
									?>
								</div>
							</div>
						</div> -->
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
					<div class="dashboard-stat2">
						<div class="display">
							<div class="number">
								<h3 class="font-blue-sharp">670.54<small class="font-blue-sharp">$</small></h3>
								<small>AVERAGE ORDER</small>
							</div>
							<div class="icon">
								<i class="icon-basket"></i>
							</div>
						</div>
						<!-- <div class="progress-info">
							<div class="progress">
								<span style="width: 45%;" class="progress-bar progress-bar-success blue-sharp">
								<span class="sr-only">45% grow</span>
								</span>
							</div>
							<div class="status">
								<div class="status-title">
									 grow
								</div>
								<div class="status-number">
									 45%
								</div>
							</div>
						</div> -->
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<!-- Begin: life time stats -->
					<div class="portlet light">
						<div class="portlet-title">
							<div class="caption">
								<i class="icon-bar-chart font-green-sharp"></i>
								<span class="caption-subject font-green-sharp bold uppercase">Overview</span>
								<span class="caption-helper">weekly stats...</span>
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="#portlet-config" data-toggle="modal" class="config">
								</a>
								<a href="javascript:;" class="reload">
								</a>
								<a href="javascript:;" class="fullscreen">
								</a>
							</div>
						</div>
						<div class="portlet-body">
							<div class="tabbable-line">
								<ul class="nav nav-tabs">
									<li class="active">
										<a href="#overview_1" data-toggle="tab">
										Top Selling </a>
									</li>
									<li>
										<a href="#overview_2" data-toggle="tab">
										Most Viewed </a>
									</li>
									<li>
										<a href="#overview_3" data-toggle="tab">
										Customers </a>
									</li>
									<li class="dropdown">
										<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
										Orders <i class="fa fa-angle-down"></i>
										</a>
										<ul class="dropdown-menu" role="menu">
											<li>
												<a href="#overview_4" tabindex="-1" data-toggle="tab">
												Latest 10 Orders </a>
											</li>
											<li>
												<a href="#overview_4" tabindex="-1" data-toggle="tab">
												Pending Orders </a>
											</li>
											<li>
												<a href="#overview_4" tabindex="-1" data-toggle="tab">
												Completed Orders </a>
											</li>
											<li>
												<a href="#overview_4" tabindex="-1" data-toggle="tab">
												Rejected Orders </a>
											</li>
										</ul>
									</li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane active" id="overview_1">
										<div class="table-responsive">
											<table class="table table-striped table-hover table-bordered">
											<thead>
											<tr>
												<th>
													 Product Name
												</th>
												<th>
													 Price
												</th>
												<th>
													 Sold
												</th>
												<th>
												</th>
											</tr>
											</thead>
											<tbody>
											<tr>
												<td>
													<a href="javascript:;">
													Apple iPhone 4s - 16GB - Black </a>
												</td>
												<td>
													 $625.50
												</td>
												<td>
													 809
												</td>
												<td>
													<a href="javascript:;" class="btn default btn-xs green-stripe">
													View </a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="javascript:;">
													Samsung Galaxy S III SGH-I747 - 16GB </a>
												</td>
												<td>
													 $915.50
												</td>
												<td>
													 6709
												</td>
												<td>
													<a href="javascript:;" class="btn default btn-xs green-stripe">
													View </a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="javascript:;">
													Motorola Droid 4 XT894 - 16GB - Black </a>
												</td>
												<td>
													 $878.50
												</td>
												<td>
													 784
												</td>
												<td>
													<a href="javascript:;" class="btn default btn-xs green-stripe">
													View </a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="javascript:;">
													Regatta Luca 3 in 1 Jacket </a>
												</td>
												<td>
													 $25.50
												</td>
												<td>
													 1245
												</td>
												<td>
													<a href="javascript:;" class="btn default btn-xs green-stripe">
													View </a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="javascript:;">
													Samsung Galaxy Note 3 </a>
												</td>
												<td>
													 $925.50
												</td>
												<td>
													 21245
												</td>
												<td>
													<a href="javascript:;" class="btn default btn-xs green-stripe">
													View </a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="javascript:;">
													Inoval Digital Pen </a>
												</td>
												<td>
													 $125.50
												</td>
												<td>
													 1245
												</td>
												<td>
													<a href="javascript:;" class="btn default btn-xs green-stripe">
													View </a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="javascript:;">
													Metronic - Responsive Admin + Frontend Theme </a>
												</td>
												<td>
													 $20.00
												</td>
												<td>
													 11190
												</td>
												<td>
													<a href="javascript:;" class="btn default btn-xs green-stripe">
													View </a>
												</td>
											</tr>
											</tbody>
											</table>
										</div>
									</div>
									<div class="tab-pane" id="overview_2">
										<div class="table-responsive">
											<table class="table table-striped table-hover table-bordered">
											<thead>
											<tr>
												<th>
													 Product Name
												</th>
												<th>
													 Price
												</th>
												<th>
													 Views
												</th>
												<th>
												</th>
											</tr>
											</thead>
											<tbody>
											<tr>
												<td>
													<a href="javascript:;">
													Metronic - Responsive Admin + Frontend Theme </a>
												</td>
												<td>
													 $20.00
												</td>
												<td>
													 11190
												</td>
												<td>
													<a href="javascript:;" class="btn default btn-xs green-stripe">
													View </a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="javascript:;">
													Regatta Luca 3 in 1 Jacket </a>
												</td>
												<td>
													 $25.50
												</td>
												<td>
													 1245
												</td>
												<td>
													<a href="javascript:;" class="btn default btn-xs green-stripe">
													View </a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="javascript:;">
													Apple iPhone 4s - 16GB - Black </a>
												</td>
												<td>
													 $625.50
												</td>
												<td>
													 809
												</td>
												<td>
													<a href="javascript:;" class="btn default btn-xs green-stripe">
													View </a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="javascript:;">
													Samsung Galaxy S III SGH-I747 - 16GB </a>
												</td>
												<td>
													 $915.50
												</td>
												<td>
													 6709
												</td>
												<td>
													<a href="javascript:;" class="btn default btn-xs green-stripe">
													View </a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="javascript:;">
													Motorola Droid 4 XT894 - 16GB - Black </a>
												</td>
												<td>
													 $878.50
												</td>
												<td>
													 784
												</td>
												<td>
													<a href="javascript:;" class="btn default btn-xs green-stripe">
													View </a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="javascript:;">
													Samsung Galaxy Note 3 </a>
												</td>
												<td>
													 $925.50
												</td>
												<td>
													 21245
												</td>
												<td>
													<a href="javascript:;" class="btn default btn-xs green-stripe">
													View </a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="javascript:;">
													Inoval Digital Pen </a>
												</td>
												<td>
													 $125.50
												</td>
												<td>
													 1245
												</td>
												<td>
													<a href="javascript:;" class="btn default btn-xs green-stripe">
													View </a>
												</td>
											</tr>
											</tbody>
											</table>
										</div>
									</div>
									<div class="tab-pane" id="overview_3">
										<div class="table-responsive">
											<table class="table table-striped table-hover table-bordered">
											<thead>
											<tr>
												<th>
													 Customer Name
												</th>
												<th>
													 Total Orders
												</th>
												<th>
													 Total Amount
												</th>
												<th>
												</th>
											</tr>
											</thead>
											<tbody>
											<tr>
												<td>
													<a href="javascript:;">
													David Wilson </a>
												</td>
												<td>
													 3
												</td>
												<td>
													 $625.50
												</td>
												<td>
													<a href="javascript:;" class="btn default btn-xs green-stripe">
													View </a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="javascript:;">
													Amanda Nilson </a>
												</td>
												<td>
													 4
												</td>
												<td>
													 $12625.50
												</td>
												<td>
													<a href="javascript:;" class="btn default btn-xs green-stripe">
													View </a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="javascript:;">
													Jhon Doe </a>
												</td>
												<td>
													 2
												</td>
												<td>
													 $125.00
												</td>
												<td>
													<a href="javascript:;" class="btn default btn-xs green-stripe">
													View </a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="javascript:;">
													Bill Chang </a>
												</td>
												<td>
													 45
												</td>
												<td>
													 $12,125.70
												</td>
												<td>
													<a href="javascript:;" class="btn default btn-xs green-stripe">
													View </a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="javascript:;">
													Paul Strong </a>
												</td>
												<td>
													 1
												</td>
												<td>
													 $890.85
												</td>
												<td>
													<a href="javascript:;" class="btn default btn-xs green-stripe">
													View </a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="javascript:;">
													Jane Hilson </a>
												</td>
												<td>
													 5
												</td>
												<td>
													 $239.85
												</td>
												<td>
													<a href="javascript:;" class="btn default btn-xs green-stripe">
													View </a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="javascript:;">
													Patrick Walker </a>
												</td>
												<td>
													 2
												</td>
												<td>
													 $1239.85
												</td>
												<td>
													<a href="javascript:;" class="btn default btn-xs green-stripe">
													View </a>
												</td>
											</tr>
											</tbody>
											</table>
										</div>
									</div>
									<div class="tab-pane" id="overview_4">
										<div class="table-responsive">
											<table class="table table-striped table-hover table-bordered">
											<thead>
											<tr>
												<th>
													 Customer Name
												</th>
												<th>
													 Date
												</th>
												<th>
													 Amount
												</th>
												<th>
													 Status
												</th>
												<th>
												</th>
											</tr>
											</thead>
											<tbody>
											<tr>
												<td>
													<a href="javascript:;">
													David Wilson </a>
												</td>
												<td>
													 3 Jan, 2013
												</td>
												<td>
													 $625.50
												</td>
												<td>
													<span class="label label-sm label-warning">
													Pending </span>
												</td>
												<td>
													<a href="javascript:;" class="btn default btn-xs green-stripe">
													View </a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="javascript:;">
													Amanda Nilson </a>
												</td>
												<td>
													 13 Feb, 2013
												</td>
												<td>
													 $12625.50
												</td>
												<td>
													<span class="label label-sm label-warning">
													Pending </span>
												</td>
												<td>
													<a href="javascript:;" class="btn default btn-xs green-stripe">
													View </a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="javascript:;">
													Jhon Doe </a>
												</td>
												<td>
													 20 Mar, 2013
												</td>
												<td>
													 $125.00
												</td>
												<td>
													<span class="label label-sm label-success">
													Success </span>
												</td>
												<td>
													<a href="javascript:;" class="btn default btn-xs green-stripe">
													View </a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="javascript:;">
													Bill Chang </a>
												</td>
												<td>
													 29 May, 2013
												</td>
												<td>
													 $12,125.70
												</td>
												<td>
													<span class="label label-sm label-info">
													In Process </span>
												</td>
												<td>
													<a href="javascript:;" class="btn default btn-xs green-stripe">
													View </a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="javascript:;">
													Paul Strong </a>
												</td>
												<td>
													 1 Jun, 2013
												</td>
												<td>
													 $890.85
												</td>
												<td>
													<span class="label label-sm label-success">
													Success </span>
												</td>
												<td>
													<a href="javascript:;" class="btn default btn-xs green-stripe">
													View </a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="javascript:;">
													Jane Hilson </a>
												</td>
												<td>
													 5 Aug, 2013
												</td>
												<td>
													 $239.85
												</td>
												<td>
													<span class="label label-sm label-danger">
													Canceled </span>
												</td>
												<td>
													<a href="javascript:;" class="btn default btn-xs green-stripe">
													View </a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="javascript:;">
													Patrick Walker </a>
												</td>
												<td>
													 6 Aug, 2013
												</td>
												<td>
													 $1239.85
												</td>
												<td>
													<span class="label label-sm label-success">
													Success </span>
												</td>
												<td>
													<a href="javascript:;" class="btn default btn-xs green-stripe">
													View </a>
												</td>
											</tr>
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
				<div class="col-md-6">
					<!-- Begin: life time stats -->
					<div class="portlet light">
						<div class="portlet-title tabbable-line">
							<div class="caption">
								<i class="icon-share font-red-sunglo"></i>
								<span class="caption-subject font-red-sunglo bold uppercase">Revenue</span>
								<span class="caption-helper">weekly stats...</span>
							</div>
							<ul class="nav nav-tabs">
								<li>
									<a href="#portlet_tab2" data-toggle="tab" id="statistics_amounts_tab">
									Amounts </a>
								</li>
								<li class="active">
									<a href="#portlet_tab1" data-toggle="tab">
									Orders </a>
								</li>
							</ul>
						</div>
						<div class="portlet-body">
							<div class="tab-content">
								<div class="tab-pane active" id="portlet_tab1">
									<div id="statistics_1" class="chart">
									</div>
								</div>
								<div class="tab-pane" id="portlet_tab2">
									<div id="statistics_2" class="chart">
									</div>
								</div>
							</div>
							<div class="well margin-top-10 no-margin no-border">
								<div class="row">
									<div class="col-md-3 col-sm-3 col-xs-6 text-stat">
										<span class="label label-success">
										Revenue: </span>
										<h3>$111K</h3>
									</div>
									<div class="col-md-3 col-sm-3 col-xs-6 text-stat">
										<span class="label label-info">
										Tax: </span>
										<h3>$14K</h3>
									</div>
									<div class="col-md-3 col-sm-3 col-xs-6 text-stat">
										<span class="label label-danger">
										Shipment: </span>
										<h3>$10K</h3>
									</div>
									<div class="col-md-3 col-sm-3 col-xs-6 text-stat">
										<span class="label label-warning">
										Orders: </span>
										<h3>2350</h3>
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