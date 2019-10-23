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
			<?php
                if ($this->session->flashdata('message')) {
                ?>
                    <div class="alert alert-danger">
                        <div id="infoMessage"> <strong>Info!</strong><br/> <?php echo $message;?></div>
                    </div>
                    <?php
                }
            ?>
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
							<form method="post" enctype="multipart/form-data" action="<?php echo base_url('vendor/products/publish')?>">
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
                                            <?php
                                            	foreach ($tags as $tag) {
                                            		?>
                                            			<input type="text" name="tags[]"  class="form-control select2" placeholder="" value="" id="tags"> 
                                            		<?php
                                            	}
                                            ?>
                                            <!-- <input type="text" id="select2_sample5" class="form-control select2" value="red, blue"> -->
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
                                </div>
                                <div class="form-actions">
                                    <div class="btn-set pull-right">
                                        <button type="cancel" class="btn default">Cancel</button>
                                        <button type="submit" class="btn blue"><i class="fa fa-check-square-o"></i>Publish Product</button>
                                    </div>
                                </div>
                            </form>
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