	<title><?php echo $title;?> | <?php echo $name_of_store?></title>
</head>
<?php $i=1?>
<body class="page-md page-header-fixed page-sidebar-closed-hide-logo page-sidebar-fixed page-sidebar-closed-hide-logo">
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
						<a data-target="#stack1" data-toggle="modal" href="#stack1">
						<i class="fa fa-check-square-o"></i> <?php echo $this->lang->line('publish_category_heading')?> </a>
					</li>
					<li>
						<a data-target="#stack2" data-toggle="modal" href="#stack2">
						<i class="fa fa-check-square"></i> <?php echo $this->lang->line('publish_subcategory_heading')?> </a>
					</li>
					<li>
						<a data-target="#stack3" data-toggle="modal" href="#stack3">
						<i class="fa fa-bookmark"></i> <?php echo $this->lang->line('publish_tag_heading')?> </a>
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
					<li class="dropdown dropdown-extended dropdown-notification dropdown-dark">
						<a href="<?php echo base_url()?>" class="dropdown-toggle" title="Go Shopping" target="_blank">
						<i class="fa fa-shopping-cart"></i>
						<?php echo $name_of_store?>
						</a>
					</li>
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
						<li>
							<a href="javascript:;">
							<i class="fa fa-user"></i>
							<span class="title">Vendors</span>
							<span class="arrow "></span>
							</a>
							<ul class="sub-menu">
								<li>
									<a href="<?php echo base_url()?>admin/vendors/create">
									<i class="fa fa-cogs"></i>
									Create Vendor</a>
								</li>
								<li>
									<a href="<?php echo base_url()?>admin/vendors">
									<i class="fa fa-check-square-o"></i>
									List Vendors</a>
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
					<h1><?php echo $this->lang->line('users')?> <small><?php echo $this->lang->line('list_users_heading')?></small></h1>
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
					<a><?php echo $this->lang->line('users')?></a>
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<?php
                if ($this->session->flashdata('message')) {
                    ?>
                    <div class="alert alert-info">
                        <div id="infoMessage"> <?php echo $message;?></div>
                    </div>
                    <?php
                }
            ?>
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN SAMPLE TABLE PORTLET-->
                    <div class="portlet box blue-madison">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-globe"></i>Responsive Table With Expandable details
							</div>
							<div class="tools">
								<a href="javascript:;" class="reload">
								</a>
								<a href="javascript:;" class="remove">
								</a>
							</div>
						</div>
						<div class="portlet-body">
							<table class="table table-striped table-bordered table-hover" id="sample_3">
							<thead>
							<tr>
								<th>
									 Rendering engine
								</th>
								<th>
									 Browser
								</th>
								<th>
									 Platform(s)
								</th>
								<th>
									 Engine version
								</th>
								<th>
									 CSS grade
								</th>
							</tr>
							</thead>
							<tbody>
							<tr>
								<td>
									 Trident
								</td>
								<td>
									 Internet Explorer 4.0
								</td>
								<td>
									 Win 95+
								</td>
								<td>
									 4
								</td>
								<td>
									 X
								</td>
							</tr>
							<tr>
								<td>
									 Trident
								</td>
								<td>
									 Internet Explorer 5.0
								</td>
								<td>
									 Win 95+
								</td>
								<td>
									 5
								</td>
								<td>
									 C
								</td>
							</tr>
							<tr>
								<td>
									 Trident
								</td>
								<td>
									 Internet Explorer 5.5
								</td>
								<td>
									 Win 95+
								</td>
								<td>
									 5.5
								</td>
								<td>
									 A
								</td>
							</tr>
							<tr>
								<td>
									 Trident
								</td>
								<td>
									 Internet Explorer 6
								</td>
								<td>
									 Win 98+
								</td>
								<td>
									 6
								</td>
								<td>
									 A
								</td>
							</tr>
							<tr>
								<td>
									 Trident
								</td>
								<td>
									 Internet Explorer 7
								</td>
								<td>
									 Win XP SP2+
								</td>
								<td>
									 7
								</td>
								<td>
									 A
								</td>
							</tr>
							<tr>
								<td>
									 Trident
								</td>
								<td>
									 AOL browser (AOL desktop)
								</td>
								<td>
									 Win XP
								</td>
								<td>
									 6
								</td>
								<td>
									 A
								</td>
							</tr>
							<tr>
								<td>
									 Gecko
								</td>
								<td>
									 Firefox 1.0
								</td>
								<td>
									 Win 98+ / OSX.2+
								</td>
								<td>
									 1.7
								</td>
								<td>
									 A
								</td>
							</tr>
							<tr>
								<td>
									 Gecko
								</td>
								<td>
									 Firefox 1.5
								</td>
								<td>
									 Win 98+ / OSX.2+
								</td>
								<td>
									 1.8
								</td>
								<td>
									 A
								</td>
							</tr>
							<tr>
								<td>
									 Gecko
								</td>
								<td>
									 Firefox 2.0
								</td>
								<td>
									 Win 98+ / OSX.2+
								</td>
								<td>
									 1.8
								</td>
								<td>
									 A
								</td>
							</tr>
							<tr>
								<td>
									 Gecko
								</td>
								<td>
									 Firefox 3.0
								</td>
								<td>
									 Win 2k+ / OSX.3+
								</td>
								<td>
									 1.9
								</td>
								<td>
									 A
								</td>
							</tr>
							<tr>
								<td>
									 Gecko
								</td>
								<td>
									 Camino 1.0
								</td>
								<td>
									 OSX.2+
								</td>
								<td>
									 1.8
								</td>
								<td>
									 A
								</td>
							</tr>
							<tr>
								<td>
									 Gecko
								</td>
								<td>
									 Camino 1.5
								</td>
								<td>
									 OSX.3+
								</td>
								<td>
									 1.8
								</td>
								<td>
									 A
								</td>
							</tr>
							<tr>
								<td>
									 Gecko
								</td>
								<td>
									 Netscape 7.2
								</td>
								<td>
									 Win 95+ / Mac OS 8.6-9.2
								</td>
								<td>
									 1.7
								</td>
								<td>
									 A
								</td>
							</tr>
							<tr>
								<td>
									 Gecko
								</td>
								<td>
									 Netscape Browser 8
								</td>
								<td>
									 Win 98SE+
								</td>
								<td>
									 1.7
								</td>
								<td>
									 A
								</td>
							</tr>
							<tr>
								<td>
									 Gecko
								</td>
								<td>
									 Netscape Navigator 9
								</td>
								<td>
									 Win 98+ / OSX.2+
								</td>
								<td>
									 1.8
								</td>
								<td>
									 A
								</td>
							</tr>
							<tr>
								<td>
									 Gecko
								</td>
								<td>
									 Mozilla 1.0
								</td>
								<td>
									 Win 95+ / OSX.1+
								</td>
								<td>
									 1
								</td>
								<td>
									 A
								</td>
							</tr>
							<tr>
								<td>
									 Gecko
								</td>
								<td>
									 Mozilla 1.1
								</td>
								<td>
									 Win 95+ / OSX.1+
								</td>
								<td>
									 1.1
								</td>
								<td>
									 A
								</td>
							</tr>
							<tr>
								<td>
									 Gecko
								</td>
								<td>
									 Mozilla 1.2
								</td>
								<td>
									 Win 95+ / OSX.1+
								</td>
								<td>
									 1.2
								</td>
								<td>
									 A
								</td>
							</tr>
							<tr>
								<td>
									 Gecko
								</td>
								<td>
									 Mozilla 1.3
								</td>
								<td>
									 Win 95+ / OSX.1+
								</td>
								<td>
									 1.3
								</td>
								<td>
									 A
								</td>
							</tr>
							<tr>
								<td>
									 Gecko
								</td>
								<td>
									 Mozilla 1.4
								</td>
								<td>
									 Win 95+ / OSX.1+
								</td>
								<td>
									 1.4
								</td>
								<td>
									 A
								</td>
							</tr>
							<tr>
								<td>
									 Gecko
								</td>
								<td>
									 Mozilla 1.5
								</td>
								<td>
									 Win 95+ / OSX.1+
								</td>
								<td>
									 1.5
								</td>
								<td>
									 A
								</td>
							</tr>
							<tr>
								<td>
									 Gecko
								</td>
								<td>
									 Mozilla 1.6
								</td>
								<td>
									 Win 95+ / OSX.1+
								</td>
								<td>
									 1.6
								</td>
								<td>
									 A
								</td>
							</tr>
							<tr>
								<td>
									 Gecko
								</td>
								<td>
									 Mozilla 1.7
								</td>
								<td>
									 Win 98+ / OSX.1+
								</td>
								<td>
									 1.7
								</td>
								<td>
									 A
								</td>
							</tr>
							<tr>
								<td>
									 Gecko
								</td>
								<td>
									 Mozilla 1.8
								</td>
								<td>
									 Win 98+ / OSX.1+
								</td>
								<td>
									 1.8
								</td>
								<td>
									 A
								</td>
							</tr>
							<tr>
								<td>
									 Gecko
								</td>
								<td>
									 Seamonkey 1.1
								</td>
								<td>
									 Win 98+ / OSX.2+
								</td>
								<td>
									 1.8
								</td>
								<td>
									 A
								</td>
							</tr>
							<tr>
								<td>
									 Gecko
								</td>
								<td>
									 Epiphany 2.20
								</td>
								<td>
									 Gnome
								</td>
								<td>
									 1.8
								</td>
								<td>
									 A
								</td>
							</tr>
							<tr>
								<td>
									 Webkit
								</td>
								<td>
									 Safari 1.2
								</td>
								<td>
									 OSX.3
								</td>
								<td>
									 125.5
								</td>
								<td>
									 A
								</td>
							</tr>
							<tr>
								<td>
									 Webkit
								</td>
								<td>
									 Safari 1.3
								</td>
								<td>
									 OSX.3
								</td>
								<td>
									 312.8
								</td>
								<td>
									 A
								</td>
							</tr>
							<tr>
								<td>
									 Webkit
								</td>
								<td>
									 Safari 2.0
								</td>
								<td>
									 OSX.4+
								</td>
								<td>
									 419.3
								</td>
								<td>
									 A
								</td>
							</tr>
							<tr>
								<td>
									 Webkit
								</td>
								<td>
									 Safari 3.0
								</td>
								<td>
									 OSX.4+
								</td>
								<td>
									 522.1
								</td>
								<td>
									 A
								</td>
							</tr>
							<tr>
								<td>
									 Webkit
								</td>
								<td>
									 OmniWeb 5.5
								</td>
								<td>
									 OSX.4+
								</td>
								<td>
									 420
								</td>
								<td>
									 A
								</td>
							</tr>
							<tr>
								<td>
									 Webkit
								</td>
								<td>
									 iPod Touch / iPhone
								</td>
								<td>
									 iPod
								</td>
								<td>
									 420.1
								</td>
								<td>
									 A
								</td>
							</tr>
							<tr>
								<td>
									 Webkit
								</td>
								<td>
									 S60
								</td>
								<td>
									 S60
								</td>
								<td>
									 413
								</td>
								<td>
									 A
								</td>
							</tr>
							<tr>
								<td>
									 Presto
								</td>
								<td>
									 Opera 7.0
								</td>
								<td>
									 Win 95+ / OSX.1+
								</td>
								<td>
									 -
								</td>
								<td>
									 A
								</td>
							</tr>
							<tr>
								<td>
									 Presto
								</td>
								<td>
									 Opera 7.5
								</td>
								<td>
									 Win 95+ / OSX.2+
								</td>
								<td>
									 -
								</td>
								<td>
									 A
								</td>
							</tr>
							<tr>
								<td>
									 Presto
								</td>
								<td>
									 Opera 8.0
								</td>
								<td>
									 Win 95+ / OSX.2+
								</td>
								<td>
									 -
								</td>
								<td>
									 A
								</td>
							</tr>
							<tr>
								<td>
									 Presto
								</td>
								<td>
									 Opera 8.5
								</td>
								<td>
									 Win 95+ / OSX.2+
								</td>
								<td>
									 -
								</td>
								<td>
									 A
								</td>
							</tr>
							<tr>
								<td>
									 Presto
								</td>
								<td>
									 Opera 9.0
								</td>
								<td>
									 Win 95+ / OSX.3+
								</td>
								<td>
									 -
								</td>
								<td>
									 A
								</td>
							</tr>
							<tr>
								<td>
									 Presto
								</td>
								<td>
									 Opera 9.2
								</td>
								<td>
									 Win 88+ / OSX.3+
								</td>
								<td>
									 -
								</td>
								<td>
									 A
								</td>
							</tr>
							<tr>
								<td>
									 Presto
								</td>
								<td>
									 Opera 9.5
								</td>
								<td>
									 Win 88+ / OSX.3+
								</td>
								<td>
									 -
								</td>
								<td>
									 A
								</td>
							</tr>
							<tr>
								<td>
									 Presto
								</td>
								<td>
									 Opera for Wii
								</td>
								<td>
									 Wii
								</td>
								<td>
									 -
								</td>
								<td>
									 A
								</td>
							</tr>
							<tr>
								<td>
									 Presto
								</td>
								<td>
									 Nokia N800
								</td>
								<td>
									 N800
								</td>
								<td>
									 -
								</td>
								<td>
									 A
								</td>
							</tr>
							<tr>
								<td>
									 Presto
								</td>
								<td>
									 Nintendo DS browser
								</td>
								<td>
									 Nintendo DS
								</td>
								<td>
									 8.5
								</td>
								<td>
									 C/A<sup>1</sup>
								</td>
							</tr>
							</tbody>
							</table>
						</div>
					</div>
                    <!-- END SAMPLE TABLE PORTLET-->
                </div>
            </div>
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
					