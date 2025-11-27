<?php
$this->load->view('frontend/header.php');
$page = $this->db->query("select *from pages where name='buyers'")->row();
?>    
<div class="banner-slider-wrapper overflow-hidden">
  <a href="#buyers" class="animate-scroll scroll-down">
      <img src="<?php echo base_url(); ?>asset/frontend_template/themes/real_estate/assets/img/icons/arrow-down.svg" alt="down arrow">
  </a>
  <div class="no-pad project-detail-info fullscreen-content general-page">
      <div class="overlay-layer" style="background-color: #231F20;"></div>
      <div class="container-fluid full-height full-height-sm">

          <div class="row  full-height text-center no-margin table-all">
              <div class="col-sm-12 project-short-info full-height full-height-sm table-cell-all table-cell-all-vertical">
                                    <h3 class="heading-fourth text-white mb-20 hover-line inline-block">
                    <?php echo $page->title; ?>                  </h3>
                  <h2 class="heading-primary text-white">
                    <?php echo $page->description; ?>                  </h2>
              </div>
          </div>
      </div>
  </div>

    <div id="layerslider" class="fitvidsignore" style="width:100%; height:100%;">
    	
    <div data-color="#006b5f" class="ls-slide banner-slider-item slider_topper" data-ls="slidedelay:5500;transition2d:12;">
        <img src="<?php echo base_url(); ?>asset/images/pages/<?php echo $page->banner; ?>" class="ls-bg" alt="Slide background">
    </div>
		
    </div>

</div>
<?php echo html_entity_decode($page->content); ?>


<section id="who-we-are" class="section-gap bg-dark-grey pb-40">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-10 col-md-8 center-block">
                <div class="mb-60">
                    <h2 class="heading-primary text-white">
                        explore the options                    </h2>
                </div>
                <div>
                  






		<form id="buyers-form" class="dynamic_form form-primary all-text-white custom-select" action="<?php echo base_url(); ?>contact/buyer_request" method="post" data-pjax="false">

					<div class="row">
			<div class="col-sm-5 mb-50">
			<input type="hidden" id="buyers-form" class="form-control" name="form_id" value="buyers-form">

			

<div class="form-message-container success_wrapper hide success_wrapper_buyers-form">
    <div class="form-message-body">
        <div class="cross-popup" data-msg-close>
            X
        </div>
        <span class="success_container_buyers-form"></span>
        <div>
            <div data-msg-close class="close-btn button button-outline button-outline-blackish mt-30 popup-ok-btn">Ok</div>
        </div>
    </div>
</div>
<div class="form-message-container error_wrapper hide error_wrapper_buyers-form">
    <div class="form-message-body">
        <div class="cross-popup" data-msg-close>
            X
        </div>
        <span class="error_container_buyers-form"></span>
        <div>
            <div data-msg-close class="close-btn button button-outline button-outline-blackish mt-30 popup-ok-btn">Ok</div>
        </div>
    </div>
</div>
									<div class="form-group pt-70 field-catagory buyer-interest">
<div>
	<label class="control-label" for="preferred_location">Preferred Location</label>
	<input type="text" id="preferred_location" class="form-control" name="preferred_location" placeholder="Enter your preferred location/neighbourhood" >
        <div class="hint-block"></div>
</div>
</div>
									<div class="form-group">
<div>
	<label class="control-label" for="preferred_size">Preferred Size</label>
	<input type="text" id="preferred_size" class="form-control" name="preferred_size" placeholder="Enter your preferred size of the unit in sft" >
        <div class="hint-block"></div>
</div>
</div>
									<div class="form-group">
<div>
	<label class="control-label" for="car_parking">Car Parking Requirement</label>
	<input type="text" id="car_parking" class="form-control" name="car_parking" placeholder="Enter your no. of parking required" >
        <div class="hint-block"></div>
</div>
</div>


									<div class="form-group">
<div>
	<label class="control-label" for="expected_handover_time">Expected Handover Date</label>
	<input type="text" id="expected_handover_time" class="form-control" name="expected_handover_time" placeholder="Enter your expected handover/move in date" >
        <div class="hint-block"></div>
</div>
</div>
									<div class="form-group pt-70 mt-70 field-catagory buyer-preferences">
<div>
	<label class="control-label" for="facing_the_apartment">Facing Of The Apartment</label>
	<input type="text" id="facing_the_apartment" class="form-control" name="facing_the_apartment" placeholder="Enter your preferred facing of the unit" >
        <div class="hint-block"></div>
</div>
</div>
									<div class="form-group">
<div>
	<label class="control-label" for="preferred_floor">Preferred Floor</label>
	<input type="text" id="preferred_floor" class="form-control" name="preferred_floor" placeholder="Enter your preferred floor" >
        <div class="hint-block"></div>
</div>
</div>
									<div class="form-group">
<div>
	<label class="control-label" for="minimum_bed_rooms">Minimum Number Of Bedrooms</label>
	<input type="text" id="minimum_bed_rooms" class="form-control" name="minimum_bed_rooms" placeholder="Enter the minimum no. of bedrooms" >
        <div class="hint-block"></div>
</div>
</div>
									<div class="form-group">
<div>
	<label class="control-label" for="minimum_bath_rooms">Minimum Number Of Bathrooms</label>
	<input type="text" id="minimum_bath_rooms" class="form-control" name="minimum_bath_rooms" placeholder="Enter the minimum no. of bathrooms" >
        <div class="hint-block"></div>
</div>
</div>
									<div class="form-group pt-70 field-catagory buyer-contact">
<div>
	<label class="control-label" for="name">Name*</label>
	<input type="text" id="name" class="form-control" name="name" placeholder="Enter your full name here" >
        <div class="hint-block"></div>
</div>
</div>
			


				</div>
				<div class="col-sm-offset-2 col-sm-5">
					<!-- <div class="form-group"> -->
									<div class="form-group">
<div>
	<label class="control-label" for="profession">Profession</label>
	<input type="text" id="profession" class="form-control" name="profession" placeholder="Enter your profession here" >
        <div class="hint-block"></div>
</div>
</div>
							<div class="form-group">
<div>
	<label class="control-label" for="mobile_number">Contact Number*</label>
	<input type="text" id="mobile_number" class="form-control" name="mobile_number" placeholder="Enter your contact number here" >
        <div class="hint-block"></div>
</div>
</div>
							<div class="form-group">
<div>
	<label class="control-label" for="email_id">Email ID</label>
	<input type="text" id="email_id" class="form-control" name="email_id" placeholder="Enter your email ID here" >
        <div class="hint-block"></div>
</div>
</div>
							<div class="form-group">
<div>
	<label class="control-label" for="mailing_address">Mailing Address</label>
	<input type="text" id="mailing_address" class="form-control" name="mailing_address" placeholder="Enter your mailing address here" >
        <div class="hint-block"></div>
</div>
</div>
		
			
			<div class="form-group no-border">
                                                <div>
                                                    <button type="submit" class="dynamic_submit_btn button button-outline button-outline-white mt-30">Submit</button>
                                                </div>
                                            </div>


						<!-- </div> -->
		</div>
	</div>
		
		</form>



                </div>
            </div>
        </div>
    </div>
</section>

<?php
$this->load->view('frontend/footer.php');
?>
