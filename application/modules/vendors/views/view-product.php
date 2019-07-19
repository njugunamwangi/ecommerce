	<title><?php echo $title?> | <?php echo $name_of_store?></title>
</head>
<?php $i = 1;?>
<body class="page-md page-header-fixed page-sidebar-closed-hide-logo page-sidebar-fixed page-sidebar-closed-hide-logo">
<!-- BEGIN HEADER -->
<div class="page-header md-shadow-z-1-i navbar navbar-fixed-top">
	<!-- BEGIN HEADER INNER -->
	<div class="page-header-inner">
		<!-- BEGIN LOGO -->
		<div class="page-logo">
			<a href="index.html">
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
						<?php echo $vendor_info->first_name?> <?php echo $vendor_info->last_name?> </span>
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
								<li >
									<a href="<?php echo base_url()?>vendor/products/subcategories/add">
									<i class="fa fa-check-square"></i>
									Publish Sub Category</a>
								</li>
								<li>
									<a href="<?php echo base_url()?>vendor/products/categories">
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
									<a href="<?php echo base_url()?>vendor/products/tags/add">
									<i class="fa fa-check-square-o"></i>
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
					<h1><?php echo $product->name?> <small>view product</small></h1>
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
					<a href="<?php echo base_url()?>vendor">Home</a>
					<i class="fa fa-circle"></i>
				</li>
				<li>
					<a href="<?php echo base_url()?>vendor/products">Products</a>
					<i class="fa fa-circle"></i>
				</li>
				<li class="active">
					<?php echo $product->name?>
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
					<form class="form-horizontal form-row-seperated" action="#">
						<div class="portlet light">
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-shopping-cart font-green-sharp"></i>
									<span class="caption-subject font-green-sharp bold uppercase">
									View Product </span>
									<span class="caption-helper"><?php echo $product->name?></span>
								</div>
							</div>
							<div class="portlet-body">
								<div class="tabbable">
									<ul class="nav nav-tabs">
										<li class="active">
											<a href="#tab_general" data-toggle="tab">
											General </a>
										</li>
										<li>
											<a href="#tab_reviews" data-toggle="tab">
											Reviews <span class="badge badge-success">
											<?php 
												$this->db->where('product_id', $product->id);
												$reviews = $this->db->get('reviews')->num_rows();
											?>
											<?php echo $reviews?> </span>
											</a>
										</li>
										<li>
											<a href="#tab_history" data-toggle="tab">
											History </a>
										</li>
									</ul>
									<div class="tab-content no-space">
										<div class="tab-pane active" id="tab_general">
											<div class="row">
												<div class="col-md-6 col-sm-12">
													<div class="portlet yellow-crusta box">
														<div class="portlet-title">
															<div class="caption">
																<i class="fa fa-info"></i>Product Details
															</div>
														</div>
														<div class="portlet-body">
															<div class="row static-info">
																<div class="col-md-5 name">
																	 Product #:
																</div>
																<div class="col-md-7 value">
																	 <?php echo $product->date_created?> 
																</div>
															</div>
															<div class="row static-info">
																<div class="col-md-5 name">
																	Date & Time added:
																</div>
																<div class="col-md-7 value">
																	 <?php echo date('jS M, Y', $product->date_created)?> at <?php echo date('H:i:s', $product->date_created)?> 
																</div>
															</div>
															<div class="row static-info">
																<div class="col-md-5 name">
																	Product Name:
																</div>
																<div class="col-md-7 value">
																	<?php echo $product->name?>
																</div>
															</div>
															<div class="row static-info">
																<div class="col-md-5 name">
																	Vendor:
																</div>
																<div class="col-md-7 value">
																	<?php
																		$this->db->where('created_on', $product->vendor_id);
																		$vendor_info = $this->db->get('users')->row();
																		echo $vendor_info->first_name, ' ', $vendor_info->last_name;
																	?>
																</div>
															</div>
															<div class="row static-info">
																<div class="col-md-5 name">
																	Status:
																</div>
																<?php 
																	if ($product->status == 1) {
																		?>
																			<div class="col-md-7 value">
							                                              		<span class="label label-sm label-info"><i class="fa fa-check"></i> Published</span>
							                                            	</div>
																		<?php
																	} else {
																		?>
																			<div class="col-md-7 value">
							                                              		<span class="label label-sm label-warning"><i class="fa fa-exclamation"></i> Draft</span>
							                                            	</div>
																		<?php
																	}
																?>
															</div>
														</div>
													</div>
												</div>
												<div class="col-md-6 col-sm-12">
													<div class="portlet blue-hoki box">
														<div class="portlet-title">
															<div class="caption">
																<i class="fa fa-list"></i>Product Description
															</div>
														</div>
														<div class="portlet-body">
															<div class="row static-info">
																<div class="col-md-12">
																	<?php echo $product->description?>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6 col-sm-12">
													<div class="portlet red-sunglo box">
														<div class="portlet-title">
															<div class="caption">
																<i class="fa fa-money"></i>Product Prices
															</div>
														</div>
														<div class="portlet-body">
															<div class="row static-info">
																<div class="col-md-5 name">
																	Regular Price:
																</div>
																<div class="col-md-7 value">
																	 <?php echo $currency, ' ', number_format($product->regular_price, 2)?> 
																</div>
															</div>
															<div class="row static-info">
																<div class="col-md-5 name">
																	Sale Price:
																</div>
																<div class="col-md-7 value">
																	<?php echo $currency, ' ', number_format($product->sale_price, 2)?>
																</div>
															</div>
															<div class="row static-info">
																<div class="col-md-5 name">
																	Wholesale Price:
																</div>
																<div class="col-md-7 value">
																	<?php echo $currency, ' ', number_format($product->wholesale_price, 2)?>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="tab-pane" id="tab_reviews">
											<?php
												if ($reviews < 1) {
													?>
														no reviews
													<?php
												} else {
													?>
														<div class="table-container">
															<table class="table table-striped table-bordered table-hover" id="datatable_reviews">
																<thead>
																	<tr role="row" class="heading">
																		<th width="5%">
																			 Review&nbsp;#
																		</th>
																		<th width="15%">
																			 Review&nbsp;Date
																		</th>
																		<th width="10%">
																			 Customer
																		</th>
																		<th width="20%">
																			 Review&nbsp;Content
																		</th>
																		<th width="5%">
																			 Rating
																		</th>
																		<th width="10%">
																			 Status
																		</th>
																		<th width="15%">
																			 Actions
																		</th>
																	</tr>
																	<tr role="row" class="filter">
																		<td>
																			<input type="text" class="form-control form-filter input-sm" name="product_review_no">
																		</td>
																		<td>
																			<div class="input-group date date-picker margin-bottom-5" data-date-format="dd/mm/yyyy">
																				<input type="text" class="form-control form-filter input-sm" readonly name="product_review_date_from" placeholder="From">
																				<span class="input-group-btn">
																				<button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
																				</span>
																			</div>
																			<div class="input-group date date-picker" data-date-format="dd/mm/yyyy">
																				<input type="text" class="form-control form-filter input-sm" readonly name="product_review_date_to" placeholder="To">
																				<span class="input-group-btn">
																				<button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
																				</span>
																			</div>
																		</td>
																		<td>
																			<input type="text" class="form-control form-filter input-sm" name="product_review_customer">
																		</td>
																		<td>
																			<input type="text" class="form-control form-filter input-sm" name="product_review_content">
																		</td>
																		<td>
																			<input type="text" class="form-control form-filter input-sm" name="product_review_rating">
																		</td>
																		<td>
																			<select name="product_review_status" class="form-control form-filter input-sm">
																				<option value="">Select...</option>
																				<option value="pending">Pending</option>
																				<option value="approved">Approved</option>
																				<option value="rejected">Rejected</option>
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
																	<?php
																		$this->db->where('product_id', $product->id);
																		$reviews = $this->db->get('reviews')->result();

																		foreach ($reviews as $product_review) {
																			?>
																				<tr>
																					<td>
																						<?php echo $i++?>
																					</td>
																					<td>
																						<?php echo date('jS M, Y', $product_review->date_created)?> at <?php echo date('H:i:s', $product_review->date_created)?>
																					</td>
																					<td>
																						<?php
																							$this->db->where('email', $product_review->email);
																							$user_info = $this->db->get('users')->row();
																							echo $user_info->first_name, ' ', $user_info->last_name;
																						?>
																					</td>
																					<td>
																						<?php echo $product_review->review;?>
																					</td>
																					<td>
																						<?php echo $product_review->ratings?>
																					</td>
																					<td>
																						<?php
																							if ($product_review->status == 0) {
																								?>
																								<span class="label label-sm label-warning">Pending</span>
																								<?php
																							} elseif ($product_review->status == 1) {
																								?>
																								<span class="label label-sm label-info">Approved</span>
																								<?php
																							} else {
																								?>
																								<span class="label label-sm label-danger">Rejected</span>
																								<?php
																							}
																						?>
																					</td>
																					<td>
																						<?php
																							if ($product_review->status == 0) {
																								?>
																									<span >
											                                                            <a href="<?php echo base_url('vendor/product_review/approve/'. $product_review->id)?>" class="label label-sm label-success"><i class="fa fa-check"></i> Approve</a>
											                                                        </span>
											                                                        <span >
											                                                            <a href="<?php echo base_url('vendor/product_review/reject/'. $product_review->id)?>" class="label label-sm label-danger"><i class="fa fa-times"></i> Reject</a>
											                                                        </span>
																								<?php
																							} elseif ($product_review->status == 1) {
																								?>
																									<span >
											                                                            <a href="<?php echo base_url('vendor/product_review/reject/'. $product_review->id)?>" class="label label-sm label-danger"><i class="fa fa-times"></i> Reject</a>
											                                                        </span>
																								<?php
																							} else {
																								?>
																									<span >
											                                                            <a href="<?php echo base_url('vendor/product_review/reject/'. $product_review->id)?>" class="label label-sm label-danger"><i class="fa fa-times"></i> Reject</a>
											                                                        </span>
																								<?php
																							}
																						?>
																					</td>
																				</tr>
																			<?php
																		}
																	?>
																</tbody>
															</table>
														</div>
													<?php
												}
											?>			
										</div>
										<div class="tab-pane" id="tab_history">
											<div class="table-container">
												<table class="table table-striped table-bordered table-hover" id="datatable_history">
												<thead>
												<tr role="row" class="heading">
													<th width="15%">
														 Datetime
													</th>
													<th width="10%">
														Customer Name
													</th>
													<th width="5%">
														Amount of Products
													</th>
													<th width="10%">
														Price
													</th>
													<th width="20%">
														 Description
													</th>
													<th width="10%">
														 Notification
													</th>
												</tr>
												<tr role="row" class="filter">
													<td>
														<div class="input-group date datetime-picker margin-bottom-5" data-date-format="dd/mm/yyyy hh:ii">
															<input type="text" class="form-control form-filter input-sm" readonly name="product_history_date_from" placeholder="From">
															<span class="input-group-btn">
															<button class="btn btn-sm default date-set" type="button"><i class="fa fa-calendar"></i></button>
															</span>
														</div>
														<div class="input-group date datetime-picker" data-date-format="dd/mm/yyyy hh:ii">
															<input type="text" class="form-control form-filter input-sm" readonly name="product_history_date_to" placeholder="To">
															<span class="input-group-btn">
															<button class="btn btn-sm default date-set" type="button"><i class="fa fa-calendar"></i></button>
															</span>
														</div>
													</td>
													<td>
														<input type="text" class="form-control form-filter input-sm" name="product_history_desc" placeholder="To"/>
													</td>
													<td>
														<input type="text" class="form-control form-filter input-sm" name="product_history_desc" placeholder="To"/>
													</td>
													<td>
														<input type="text" class="form-control form-filter input-sm" name="product_history_desc" placeholder="To"/>
													</td>
													<td>
														<input type="text" class="form-control form-filter input-sm" name="product_history_desc" placeholder="To"/>
													</td>
													<td>
														<select name="product_history_notification" class="form-control form-filter input-sm">
															<option value="">Select...</option>
															<option value="pending">Pending</option>
															<option value="notified">Notified</option>
															<option value="failed">Failed</option>
														</select>
													</td>
												</tr>
												</thead>
												<tbody>
													<?php
														$orders = $this->db->get('orders')->result();
														foreach ($orders as $order) {
															$cart_items = json_decode($order->orders);
															foreach ($cart_items as $cart_item) {
																if ($cart_item->id == $product->id) {
																	?>
																		<tr>
																			<td>
																				<?php echo date('jS M, Y', $order->order_id)?> at <?php echo date('H:i:s', $order->order_id)?>
																			</td>
																			<td>
																				<?php
																					$this->db->where('id', $order->customer_id);
																					$customer_info = $this->db->get('users')->row();
																					echo $customer_info->first_name, ' ', $customer_info->last_name;
																				?>
																			</td>
																			<td>
																				<?php 
																					if ($cart_item->qty == 1) {
																						echo number_format($cart_item->qty), ' item';
																					} else {
																						echo number_format($cart_item->qty), ' items';
																					}
																				?>
																			</td>
																			<td>
																				<?php echo $currency, ' ', number_format($cart_item->subtotal, 2)?>
																			</td>
																			<td>
																				<?php
										                                          if ($order->status == 0) {
										                                            echo $this->lang->line('purchased_product'), '. ', $this->lang->line('pending_processing');
										                                          } elseif ($order->status == 1) {
										                                            echo $this->lang->line('purchased_product'), '. ', $this->lang->line('processed');
										                                          } elseif ($order->status == 2) {
										                                            echo $this->lang->line('purchased_product'), '. ', $this->lang->line('pending_delivery');
										                                          } elseif ($order->status == 3) {
										                                            echo $this->lang->line('order_cancelled');
										                                          } else {
										                                            echo $this->lang->line('purchased_product'), '. ', $this->lang->line('delivery_closed');
										                                          }
										                                        ?>
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
																		</tr>
																	<?php
																}
															}
														}
													?>
												</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>

						</div>
					</form>
					<div id="stack1" class="modal fade" tabindex="-1" data-width="400">
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
	                                                    <label class="control-label" for="pd_category">Category <span class="required"> *</span></label>
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
	                                            </div>
	                                            <div class="modal-footer">
													<button type="button" data-dismiss="modal" class="btn">Close</button>
													<button type="submit" class="btn blue">Add Category</button>
												</div>
											<?php echo form_close();?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div id="stack2" class="modal fade" tabindex="-1" data-width="400">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
									<h4 class="modal-title">Add Sub Category</h4>
								</div>
								<div class="modal-body">
									<div class="row">
										<div class="col-md-12">
                                            <?php echo form_open('auth/add_subcategory'); ?>
	                                            <div class="form-body">
	                                                <div class="form-group">
	                                                    <label class="control-label" for="pd_subcategory">Sub Category <span class="required"> *</span></label>
	                                                    <div class="input-group">
	                                                        <span class="input-group-addon">
	                                                            <i class="fa fa-paragraph"></i>
	                                                        </span>
	                                                        <input type="text" name="pd_subcategory" style="text-transform: capitalize;" class="form-control" placeholder="Tecno" value="" id="pd_subcategory"> 
	                                                    </div>
	                                                    <div class="caption-subject" style="color: red;">
	                                                    	<?php echo form_error('pd_subcategory')?>
	                                                    </div>
	                                                </div>
	                                                <div class="form-group">
														<label class="control-label" for="pd_category">Category <span class="required"> *</span></label>
		                                                <div class="input-group">
		                                                    <span class="input-group-addon">
		                                                        <i class="fa fa-institution"></i>
		                                                    </span>
	                                                        <select id="pd_category" class="form-control select2me" name="pd_category" >
	                                                        	<option value="" >Select parent category...</option>
	                                                            <?php foreach ($categories as $category ):  ?>
	                                                                <option value="<?php echo $category->category?>"><?php echo $category->category?></option>
	                                                            <?php endforeach; ?>
	                                                        </select>
		                                                </div>
		                                                <div class="caption-subject" style="color: red;">
	                                                    	<?php echo form_error('pd_category')?>
	                                                    </div>
													</div>
	                                            </div>
	                                            <div class="modal-footer">
													<button type="button" data-dismiss="modal" class="btn">Close</button>
													<button type="submit" class="btn blue"><?php echo $this->lang->line('publish_subcategory_heading')?></button>
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
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->