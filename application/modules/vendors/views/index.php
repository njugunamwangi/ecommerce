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
					<a href="<?php echo base_url()?>vendor">Home</a>
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
								</small><h3 class="font-green-sharp"><small class="font-green-sharp"><?php echo $currency?> <?php echo number_format($total_sales_amount, 2) ?></h3>
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
								<h3 class="font-red-haze"><?php echo $total_products?></h3>
								<small>TOTAL PRODUCTS</small>
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
								<h3 class="font-blue-sharp"><small class="font-blue-sharp"><?php $average = $total_sales_amount/$total_products; echo $currency, ' ', number_format($average, 2) ?></small></h3>
								<small>AVERAGE ORDER PER PRODUCT</small>
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
									<!-- <li>
										<a href="#overview_2" data-toggle="tab">
										Most Viewed </a>
									</li> -->
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
												<a href="#overview_5" tabindex="-1" data-toggle="tab">
												Pending Orders </a>
											</li>
											<li>
												<a href="#overview_6" tabindex="-1" data-toggle="tab">
												Completed Orders </a>
											</li>
											<li>
												<a href="#overview_7" tabindex="-1" data-toggle="tab">
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
													<?php
														foreach ($products as $product) {
															?>
																<tr>
																	<td>
																		<a href="<?php echo base_url('vendor/product/'.$product->slug)?>">
																		<?php echo $product->name?> </a>
																	</td>
																	<td>
																		<?php echo $currency, ' ', number_format($product->sale_price, 2) ?>
																	</td>
																	<td>
																		<?php
																			$this->db->where('product_id', $product->id);
																			$this->db->select_sum('qty');
																			$result =  $this->db->get('orders_summary')->row();
																			echo $result->qty;
																		?>
																	</td>
																	<td>
																		<a href="<?php echo base_url('vendor/product/'.$product->slug.'#product_sales')?>" class="btn default btn-xs green-stripe">
																		View </a>
																	</td>
																</tr>
															<?php
														}
													?>		
												</tbody>
											</table>
										</div>
									</div>
									<!-- <div class="tab-pane" id="overview_2">
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
												</tbody>
											</table>
										</div>
									</div> -->
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
													<?php 
														foreach($users as $user) {
															// if (condition) {
															// 	# code...
															// }
															?>
																<tr>
																	<td>
																		<a href="<?php echo base_url('vendor/user/'.$user->id)?>">
																		<?php echo $user->first_name, ' ', $user->last_name?> </a>
																	</td>
																	<td>
																		<?php
																			$this->db->where('vendor_id', $vendor_info->created_on);
																			$this->db->where('customer_id', $user->id);
																			echo $query = $this->db->get('orders_summary')->num_rows()
																		?>
																	</td>
																	<td>
																		<?php 
																			$this->db->where('vendor_id', $vendor_info->created_on);
																			$this->db->where('customer_id', $user->id);
																			$this->db->select_sum('subtotal');
																			$query = $this->db->get('orders_summary')->row();
																			echo $currency, ' ',number_format($query->subtotal, 2);
																		?>
																	</td>
																	<td>
																		<a href="<?php echo base_url('vendor/user/'.$user->id)?>" class="btn default btn-xs green-stripe">
																		View </a>
																	</td>
																</tr>
															<?php
														}
													?>
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
													<?php foreach($last_ten_orders as $order) {
														?>
															<tr>
																<td>
																	<?php $this->db->from('users')->where('id', $order->customer_id);
																		$customer_info = $this->db->get()->row();?>
																	<a href="<?php echo base_url('vendor/user/'.$customer_info->id)?>">
																		<?php
																			echo $customer_info->first_name, ' ', $customer_info->last_name;
																		?> 
																	</a>
																</td>
																<td>
																	<?php
																		$this->db->where('id', $order->order_id);
																		$date = $this->db->get('orders')->row()->order_id;
																		echo date('jS M, Y', $date), ' at ', date('H:i:s', $date);
																	?> 
																</td>
																<td>
																	<?php echo $currency, ' ',number_format($order->subtotal, 2) ?>
																</td>
																<td>
																	<?php
							                                          if ($order->status == 0) {
							                                            ?>
							                                              <span class="label label-sm label-danger">Pending</span>
							                                            <?php
							                                          } elseif ($order->status == 1) {
							                                            ?>
							                                              <span class="label label-sm label-warning">Not Available</span>
							                                            <?php
							                                          } elseif ($order->status == 2) {
							                                            ?>
							                                              <span class="label label-sm label-info">Available</span>
							                                            <?php
							                                          } 
							                                        ?>
																</td>
																<td>
																	<a href="<?php echo base_url('vendor/order/'.$order->order_id)?>" class="btn default btn-xs green-stripe">
																	View </a>
																</td>
															</tr>
														<?php
													}?>
												</tbody>
											</table>
										</div>
									</div>
									<div class="tab-pane" id="overview_5">
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
												</tbody>
											</table>
										</div>
									</div>
									<div class="tab-pane" id="overview_6">
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
												</tbody>
											</table>
										</div>
									</div>
									<div class="tab-pane" id="overview_7">
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