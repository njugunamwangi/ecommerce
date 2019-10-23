		<div id="category" class="modal fade" tabindex="-1" data-width="400">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
						<h4 class="modal-title">Add Category</h4>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12">
                                <?php echo form_open('vendor/categories/add'); ?>
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
										<button type="submit" class="btn blue"><i class="fa fa-check-square-o"></i>Publish Category</button>
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
                                <?php echo form_open('vendor/tags/add'); ?>
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
										<button type="submit" class="btn blue"><i class="fa fa-check-square-o"></i>Add Tag</button>
									</div>
								<?php echo form_close();?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
        <!-- BEGIN FOOTER -->
        <div class="page-footer">
            <div class="page-footer-inner" value="fixed"> <?php echo date('Y')?> &copy; <?php echo $name_of_store?>
            </div>
            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>
        </div>
        <!-- END FOOTER -->
        <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
	<!-- BEGIN CORE PLUGINS -->
	<!--[if lt IE 9]>
	<script src="<?php echo base_url('public/assets/global/plugins/respond.min.js'); ?>"></script>
	<script src="<?php echo base_url('public/assets/global/plugins/excanvas.min.js'); ?>"></script> 
	<![endif]-->
	<script src="<?php echo base_url('public/assets/global/plugins/jquery.min.js'); ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('public/assets/global/plugins/jquery-migrate.min.js'); ?>" type="text/javascript"></script>
	<!-- IMPORTANT! Load jquery-ui.min.js'); ?> before bootstrap.min.js'); ?> to fix bootstrap tooltip conflict with jquery ui tooltip -->
	<script src="<?php echo base_url('public/assets/global/plugins/jquery-ui/jquery-ui.min.js'); ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('public/assets/global/plugins/bootstrap/js/bootstrap.min.js'); ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('public/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js'); ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('public/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js'); ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('public/assets/global/plugins/jquery.blockui.min.js'); ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('public/assets/global/plugins/jquery.cokie.min.js'); ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('public/assets/global/plugins/uniform/jquery.uniform.min.js'); ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('public/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js'); ?>" type="text/javascript"></script>
	<!-- END CORE PLUGINS -->
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<script type="text/javascript" src="<?php echo base_url()?>public/assets/global/plugins/select2/select2.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>public/assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>public/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>public/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>public/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>public/assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>public/assets/global/plugins/clockface/js/clockface.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>public/assets/global/plugins/bootstrap-daterangepicker/moment.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>public/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>public/assets/global/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>public/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>public/assets/global/plugins/select2/select2.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>public/assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>public/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>public/assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>public/assets/global/plugins/jquery-validation/js/additional-methods.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>public/assets/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
	<script src="<?php echo base_url();?>public/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>public/assets/global/plugins/fuelux/js/spinner.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>public/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>public/assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>public/assets/global/plugins/jquery.input-ip-address-control-1.0.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>public/assets/global/plugins/bootstrap-pwstrength/pwstrength-bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>public/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>public/assets/global/plugins/jquery-tags-input/jquery.tagsinput.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>public/assets/global/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>public/assets/global/plugins/bootstrap-touchspin/bootstrap.touchspin.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>public/assets/global/plugins/typeahead/handlebars.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>public/assets/global/plugins/typeahead/typeahead.bundle.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>public/assets/global/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>public/assets/global/plugins/bootstrap-toastr/toastr.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>public/assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>public/assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>public/assets/global/plugins/select2/select2.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>public/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>public/assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>public/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>public/assets/global/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>public/assets/global/plugins/bootstrap-markdown/js/bootstrap-markdown.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>public/assets/global/plugins/bootstrap-markdown/lib/markdown.js" type="text/javascript"></script>
	<script type="text/javascript" src="<?php echo base_url();?>public/assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>public/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
	<script src="<?php echo base_url();?>public/assets/global/plugins/bootstrap-markdown/lib/markdown.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>public/assets/global/plugins/bootstrap-markdown/js/bootstrap-markdown.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>public/assets/global/plugins/bootstrap-summernote/summernote.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>public/assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="<?php echo base_url();?>public/assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>public/assets/global/plugins/jquery-validation/js/additional-methods.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>public/assets/global/plugins/select2/select2.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>public/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>public/assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>public/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>public/assets/global/plugins/ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>public/assets/global/plugins/bootstrap-markdown/js/bootstrap-markdown.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>public/assets/global/plugins/bootstrap-markdown/lib/markdown.js"></script>
	<!-- END PAGE LEVEL PLUGINS -->
	<script src="<?php echo base_url();?>public/assets/admin/pages/scripts/ui-toastr.js"></script>
	<script src="<?php echo base_url('public/assets/global/scripts/metronic.js'); ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('public/assets/admin/layout4/scripts/layout.js'); ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('public/assets/admin/layout4/scripts/demo.js'); ?>" type="text/javascript"></script>
	<script>
	jQuery(document).ready(function() {       
	   	Metronic.init(); // init metronic core components
		Layout.init(); // init current layout
		Demo.init(); // init demo features
		UIToastr.init();
	});
	</script>
	<!-- END JAVASCRIPTS -->
	</body>
	<!-- END BODY -->
</html>