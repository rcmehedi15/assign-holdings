
        <footer class="site-main-footer">
					             <!-- Landing footer
								<?php /*?>
                          				<div class="footer-top parallax-container" data-stellar-background-ratio="0.1" style="background-image: url(<?php echo base_url(); ?>asset/frontend_template/themes/real_estate/assets/img/images/footer.jpg);">
					<div class="container-fluid">
							<div class="box-parent three-items">
																				<div class="box ">
													<a href="<?php echo base_url(); ?>contact/landowners" class="assign-footer-circle">
															<div class="inner assign-footer-circle-inner">
																	<h3 class="title">Landowners</h3>
																	<p>Meet the professionals</p>
															</div>
													</a>
											</div>
																				<div class="box ">
													<a href="<?php echo base_url(); ?>contact/buyers" class="assign-footer-circle">
															<div class="inner assign-footer-circle-inner">
																	<h3 class="title">Buyers</h3>
																	<p>Explore the options</p>
															</div>
													</a>
											</div>
																				<div class="box ">
													<a href="<?php echo base_url(); ?>contact/customers" class="assign-footer-circle">
															<div class="inner assign-footer-circle-inner">
																	<h3 class="title">Customers</h3>
																	<p>Share your feedback</p>
															</div>
													</a>
											</div>
									
							</div>
					</div>
			</div>
	            <?php */?>					 -->
 
            <div class="footer-bottom" style="background-color: #aeee58;">
    <div class="container-fluid">
        <div class="row" style="display: flex; align-items: center;">
        
            <div class="col-sm-4">
                <div class="copyright">
                    <p>&copy; <script>document.write(new Date().getFullYear());</script> Assign Holdings Ltd.</p>
                </div>
            </div>

            <div class="col-sm-4" style="text-align: center;">
                <div class="copyright">
                    <p>
                        <a href="#" target="_blank" title="Rehab">
                            <img class="vc_single_image-img" src="<?php echo base_url(); ?>asset/images/logo.jpg" alt="Membership No. : 0000/0000" title="REHAB" width="240" height="24">
                        </a>
                    </p>
                </div>
            </div>

            <div class="col-sm-4" style="text-align: right;">
                <div class="copyright">
                    <p style="font-size: 32px !important;">
                        <a href="https://www.youtube.com/channel/UCyXL7BnzZ6pOnCqCfEaXXow" target="_blank" class="youtube">
                            <i class="fa fa-youtube" style="color: #FF0000;"></i>
                        </a>
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>

        </footer>

    </div>

    <form id="w0" action="http://localhost/assign/" method="post" role="form">
<input type="hidden" name="_csrf-frontend" value="TlhwNGw1LWoIFRJkJQdrBS0JAVonWE8pYzUKUSAGfVMpPxhdFUJjJA==">
        </form>










<script src="<?php echo base_url(); ?>asset/frontend_template/assets/15e49a10/yii7559.js?v=1498127404"></script>
<script src="<?php echo base_url(); ?>asset/frontend_template/assets/15e49a10/yii.activeForm7559.js?v=1498127404"></script>
<script src="<?php echo base_url(); ?>asset/frontend_template/themes/real_estate/assets/js/upload_files.js"></script>
<script src="<?php echo base_url(); ?>asset/frontend_template/themes/real_estate/assets/js/min/layerslider.transitions.min.js"></script>
<script src="<?php echo base_url(); ?>asset/frontend_template/themes/real_estate/assets/js/min/layerslider.kreaturamedia.jquery.min.js"></script>
<script src="<?php echo base_url(); ?>asset/frontend_template/themes/real_estate/assets/js/min/script.min.js"></script>
<script type="text/javascript">jQuery(document).ready(function () {
jQuery('#question-general').yiiActiveForm([], []);
jQuery('#w0').yiiActiveForm([], []);


        $(document).delegate('.dynamic_submit_btn', 'click', function(event, jqXHR, settings) {

            var form = $(this).closest('form');
            var form_id = form.attr('id');

            if(form.find('.has-error').length) {
                return false;
            }

            $.ajax({
                    url: form.attr('action'),
                    type: 'post',
                    data: form.serialize(),
                    beforeSend : function( request ){
                        $('.success_wrapper_'+form_id).addClass('hide');
                        $('.error_wrapper_'+form_id).addClass('hide');
                    },
                    success: function(response) {
						data = JSON.parse(response);
                        if(data.result=='success'){
                            form[0].reset();
                            $('.success_wrapper_'+form_id).removeClass('hide');
                            $('.error_wrapper_'+form_id).addClass('hide');

                            $('.success_container_'+form_id).html(data.msg);
                            $('.error_container_'+form_id).html('');

                            // setTimeout(function() {
                            //   $('.success_wrapper_'+form_id).addClass('hide');
                            // }, 8000);
                        }else{
							
                            $('.error_container_'+form_id).html(data.msg);
                            $('.success_container_'+form_id).html('');

                            $('.success_wrapper_'+form_id).addClass('hide');
                            $('.error_wrapper_'+form_id).removeClass('hide');

                            // setTimeout(function() {
                            //   $('.error_wrapper_'+form_id).addClass('hide');
                            // }, 15000);

                        }
                    }
            });

            return false;
        });

    
});</script></body>
</html>