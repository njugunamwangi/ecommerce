	<!-- BEGIN CONTENT -->
	<?php $i=1;?>
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
			<?php
                if ($this->session->flashdata('message')) {
                ?>
                    <div class="alert alert-info">
                        <button type="button" class="close" data-dismiss="alert"></button>
                        <div id="infoMessage"> <strong>Info!</strong><br/> <?php echo $message;?></div>
                    </div>
                    <?php
                }
            ?>
			<div class="page-head">
				<!-- BEGIN PAGE TITLE -->
				<div class="page-title">
					<h1> <?php echo $title?> </h1>
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
					<?php echo $title?>
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<?php
            	if (empty($categories)) {
            		?>
	            		<div class="alert alert-danger">
	                        <div id="infoMessage"> No <?php echo $title?> added yet</div>
	                    </div>
                    <?php
            	} else {
            		?>
		                <div class="row">
							<div class="col-md-12">
								<!-- Begin: life time stats -->
								<div class="portlet light">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-gift font-green-sharp"></i>
											<span class="caption-subject font-green-sharp bold uppercase"><?php echo $title?></span>
											<span class="caption-helper">manage <?php echo $title?>...</span>
										</div>
										<div class="actions">
											<div class="btn-group">
												<a class="btn btn-default btn-circle" href="javascript:;" data-toggle="dropdown">
												<i class="fa fa-share"></i> Tools <i class="fa fa-angle-down"></i>
												</a>
												<ul class="dropdown-menu pull-right">
													<li>
														<a href="<?php echo base_url()?>admin/products/export_to_excel">
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
													<option value="publish">Publish</option>
													<option value="unpublished">Un-publish</option>
													<option value="delete">Delete</option>
												</select>
												<button class="btn btn-sm yellow table-group-action-submit"><i class="fa fa-check"></i> Submit</button>
											</div>
											<table class="table table-striped table-bordered table-hover" id="datatable_products">
												<thead>
													<tr role="row" class="heading">
														<th width="1%">
															<input type="checkbox" class="group-checkable">
														</th>
														<th width="1%">
															 ID
														</th>
														<th width="15%">
															 Category
														</th>
														<th width="15%">
															Parent&nbsp;Category
														</th>
														<th width="10%">
															Products
														</th>
														<th width="15%">
															 Actions
														</th>
													</tr>
													<tr role="row" class="filter">
														<?php echo form_open('auth/search_categories')?>
															<td>
															</td>
															<td>
															</td>
															<td>
																<select name="category" class="form-control select2me form-filter input-sm">
																	<option value="">Select...</option>
																	<?php foreach ($categories as $category) {
																		if ($category->parent_category == null) {
																			?>
																				<option value="<?php echo $category->category?>"><?php echo $category->category?></option>
																				<?php
																					$this->db->order_by('categories.category');
																					$subcategories = $this->db->get_where('categories', ['parent_category' => $category->category])->result();

																					foreach ($subcategories as $subcategory) {
																						?>
																							<option value="<?php echo $subcategory->category;?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $subcategory->category;?></option>
																							<?php
																								$this->db->order_by('categories.category');
																								$mini_categories = $this->db->get_where('categories', ['parent_category' => $subcategory->category])->result();

																								foreach ($mini_categories as $mini_category) {
																									?>
																										<option value="<?php echo $mini_category->category;?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $mini_category->category;?></option>
																									<?php
																								}
																							?>
																						<?php
																					}
																				?>
																			<?php
																		}?>
																		<?php
																	}?>	
																</select>
															</td>
															<td>
																<select name="category" class="form-control select2me form-filter input-sm">
																	<option value="">Select...</option>
																	<?php foreach ($categories as $category) {
																		if ($category->parent_category == null) {
																			?>
																				<option value="<?php echo $category->category?>"><?php echo $category->category?></option>
																				<?php
																					$this->db->order_by('categories.category');
																					$subcategories = $this->db->get_where('categories', ['parent_category' => $category->category])->result();

																					foreach ($subcategories as $subcategory) {
																						?>
																							<option value="<?php echo $subcategory->category;?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $subcategory->category;?></option>
																						<?php
																					}
																				?>
																			<?php
																		}?>
																		<?php
																	}?>	
																</select>
															</td>
															<td>
																<div class="margin-bottom-5">
																	<input type="text" class="form-control form-filter input-sm" name="product_price_from" placeholder="From"/>
																</div>
																<input type="text" class="form-control form-filter input-sm" name="product_price_to" placeholder="To"/>
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
														foreach ($categories as $category) {
															?>
																<tr>
																	<td>
																		<input type="checkbox" class="group-checkable">
																	</td>
																	<td>
				                                                        <?php
				                                                            echo $i++;
				                                                        ?>                                       
				                                                    </td>
														            <td><?php echo $category->category;?> </td>
														            <td>
														            	<?php 
															            	if ($category->parent_category == null) {
															            		echo '-';
															            	} else {
															            		echo $category->parent_category;
															            	}
														            	?>
														            </td>
				                                                    <td>
				                                                        
				                                                    </td>
																	<td>
																		<span >
				                                                            <a href="<?php echo base_url('vendor/category/edit/'. $category->slug)?>" class="label label-sm label-warning"><i class="fa fa-edit"></i> Edit</a>
				                                                        </span>
				                                                        <span >
					                                                        <a href="<?php echo base_url('vendor/category/'.$category->slug)?>" class="label label-sm label-info"><i class="fa fa-search"></i> View</a>
					                                                    </span>
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
								<!-- End: life time stats -->
							</div>
						</div>
		            <?php
            	}
            ?>
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->