	<?php $i=1;?>
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN PAGE HEAD -->
			<div class="page-head">
				<!-- BEGIN PAGE TITLE -->
				<div class="page-title">
					<h1> <?php echo $title ?> </h1>
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
                    <a href="<?php echo base_url(); ?>vendor">Home</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span class="active"> <?php echo $title ?></span>
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
														<th width="3%">
															#
														</th>
														<th width="10%">
															 Product
														</th>
														<th width="10%">
															 Customer
														</th>
														<th width="10%">
															 Purchase&nbsp;Price
														</th>
														<th width="25%">
															 Purchased&nbsp;On
														</th>
														<th width="10%">
															Items #
														</th>
														<th width="20%">
															Sub Total
														</th>
														<th width="10%">
															Item Status
														</th>
														<th width="5%">
															 Actions
														</th>
													</tr>
													<tr role="row" class="filter">
														<?php echo form_open('vendors/search_orders')?>
															<td>
															</td>
															<td>
															</td>
															<td>
																<select name="product" class="form-control select2me form-filter input-sm">
																	<option value="">Select Product</option>
																	<?php 
																		foreach ($products as $product) {
																			?>
																				<option value="<?php echo $product->id?>"><?php echo $product->name?></option>
																			<?php
																		}
																	?>
																</select>
															</td>
															<td>
																<select name="customer" class="form-control select2me form-filter input-sm">
																	<option value="">Select Customer</option>
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
																
															</td>
															<td></td>
															<td></td>
															<td></td>
															<td>
																<select name="status" class="form-control select2me form-filter input-sm">
																	<option value="">Select Status</option>
																	<option value="0">Pending</option>
																	<option value="1">Not Available</option>
																	<option value="2">Available</option>
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
													<?php
														foreach ($orders as $order) {
															?>
																<tr>
																	<td>
																		<input type="checkbox" class="group-checkable">
																	</td>
																	<td>
																		<?php echo $i++?>
																	</td>
																	<td>
																		<?php
																			$product = $this->db->get_where('products', ['id' => $order->product_id])->row();

																			echo $product->name;
																		?>
																	</td>
																	<td>
																		<?php
																			$user = $this->db->get_where('users', ['id' => $order->customer_id])->row();

																			echo $user->first_name, ' ', $user->last_name;
																		?>
																	</td>
																	<td>
																		<?php echo $currency, ' ', number_format($order->price, 2) ?>
																	</td>
																	<td>
																		<?php
																			$this->db->where('id', $order->order_id);
																			$date = $this->db->get('orders')->row()->order_id;
																			echo date('jS M, Y', $date), ' at ', date('H:i:s', $date);
																		?>
																	</td>
																	<td>
																		<?php 
																			if ($order->qty == 1) {
																				echo number_format($order->qty), ' item';
																			} else {
																				echo number_format($order->qty), ' items';
																			}
																		?>
																	</td>
																	<td>
																		<?php echo $currency, ' ', number_format($order->subtotal, 2) ?>
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
																		<div class="btn-group">
																			<a class="btn btn-circle grey-cararra btn-xs" href="javascript:;" data-toggle="dropdown">
																			<!-- <span class="hidden-480">
																			Tools </span> -->
																			<i class="fa fa-ellipsis-h"></i>
																			<i class="fa fa-angle-down"></i>
																			</a>
																			<?php
																				if ($order->status == 0) {
																					?>
																						<ul class="dropdown-menu pull-right">
																							<li>
																								<a href="order/not-available/<?php echo $order->id?>">
																								Not Available </a>
																							</li>
																							<li>
																								<a href="order/available/<?php echo $order->id?>">
																								Available </a>
																							</li>
																						</ul>
																					<?php
																				}
																			?>		
																		</div>
																	</td>
																</tr>
															<?php
														}
													?>
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