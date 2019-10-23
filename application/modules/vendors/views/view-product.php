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
											<a href="#product_sales" data-toggle="tab">
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
										<div class="tab-pane" id="product_sales">
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
				</div>
			</div>
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->