<?php
$this->load->view('frontend/header.php');
$page = $this->db->query("select *from pages where name='landowners'")->row();
?>      
    
<div class="banner-slider-wrapper overflow-hidden">
  <a href="#landowners" class="animate-scroll scroll-down">
      <img src="<?php echo base_url(); ?>asset/frontend_template/themes/real_estate/assets/img/icons/arrow-down.svg" alt="down arrow">
  </a>
  <div class="no-pad project-detail-info fullscreen-content general-page">
      <div class="overlay-layer" style="background-color: #231F20;"></div>
      <div class="container-fluid full-height full-height-sm">

          <div class="row  full-height text-center no-margin table-all">
              <div class="col-sm-12 project-short-info full-height full-height-sm table-cell-all table-cell-all-vertical">
                                    <h3 class="heading-fourth text-white mb-20 hover-line inline-block">
                    <?php //echo $page->title; ?>                  </h3>
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
<?php
					$content1 = $this->db->query("select *from contents where section_code='Home1'")->row();
					?>
<section id="who-we-are" class="section-gap bg-dark-grey pb-40" style="background-color: rgb(25, 23, 24);">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-10 col-md-8 center-block">
                <div class="mb-60">
                    <h2 class="heading-primary text-white">
                        Submit Your Land Details                   </h2>
                </div>
                <div>
                  






		<form id="landowner-form" class="dynamic_form form-primary all-text-white custom-select" action="<?php echo base_url(); ?>contact/landowner_request" method="post" data-pjax="false">

					<div class="row">
			<div class="col-sm-5 mb-50">
			<input type="hidden" id="landowner-form" class="form-control" name="form_id" value="landowner-form">

			
									<div class="form-group pt-70 field-catagory land-info">
     <div>
           <label for="locality">Locality*</label>
           <input type="text" id="locality" name="locality" placeholder="Area/neighbourhood the land is located" class="">
           <div class="hint-block"></div>
     </div>
</div>
									<div class="form-group">
    <div>
        <label for="address_details">Address*</label>
        <input type="text" id="address_details" name="address_details" placeholder="Full address of the land" class="" required>
    </div>
</div>
									<div class="form-group">
    <div>
        <label for="plot">Size of the land</label>
        <input type="text" id="plot" name="plot" placeholder="Size of the land in kathas (rounded)" class="">
    </div>
</div>
									<div class="form-group">
    <div>
        <label for="road_width ">Width of the road in front</label>
        <input type="text" id="road_width " name="road_width" placeholder="In feet" class="">
    </div>
</div>
			
						<div class="form-group">
	<label class="control-label" for="land_category">Category of land</label>
	<select id="land_category" class="" name="land_category" data-placeholder="Select Option">
		<option value="select">Select option</option><option value="freehold">Freehold</option><option value="leasehold">Leasehold</option>
	</select>
        <div class="hint-block"></div>
</div>			
						<div class="form-group">
    <div>
        <label for="fcing">Facing</label>
        <select name="fcing" id="fcing"  data-placeholder="Select Option">
            <option value="east">East</option><option value="west">West</option><option value="north">North</option><option value="south">South</option>
        </select>
        <div class="hint-block"></div>
    </div>
</div>			
						<div class="form-group">
    <div>
        <label for="attractive_features">Attractive features (if any)</label>
        <select name="attractive_features" id="attractive_features"  data-placeholder="Select Option">
            <option value="select">Select</option><option value="lakeside">Lakeside</option><option value="corner plot">Corner Plot</option><option value="park front">Park View</option><option value="mainroad">Main Road</option><option value="others">Others</option>
        </select>
        <div class="hint-block"></div>
    </div>
</div>									<div class="form-group  pt-70 field-catagory land-profile">
    <div>
        <label for="landowner_name">Name of the landowner*</label>
        <input type="text" id="landowner_name" name="landowner_name" placeholder="Full name of the registered landowner" class="" required>
    </div>
</div>
			


				</div>
				<div class="col-sm-offset-2 col-sm-5">
					<!-- <div class="form-group"> -->
									<div class="form-group">
    <div>
        <label for="contact_person">Contact person</label>
        <input type="text" id="contact_person" name="contact_person" placeholder="Name (if different from the landowner)" class="" required >
    </div>
</div>
							<div class="form-group">
    <div>
        <label for="">Email Address</label>
        <input type="text" placeholder="Contact person's email address" id="email_id" name="email_id">
    </div>
</div>
							<div class="form-group">
    <div>
        <label for="cell_phone">Contact number*</label>
        <input type="text" id="cell_phone" name="cell_phone" placeholder="Contact person's number" class="" required >
    </div>
</div>
		
			
			<div class="form-group no-border">
                                                <div>
                                                    <button type="submit" class="dynamic_submit_btn button button-outline button-outline-white mt-30">Submit</button>
                                                </div>
                                            </div>

			

<div class="form-message-container success_wrapper hide success_wrapper_landowner-form">
    <div class="form-message-body">
        <div class="cross-popup" data-msg-close>
            X
        </div>
        <span class="success_container_landowner-form"></span>
        <div>
            <div data-msg-close class="close-btn button button-outline button-outline-blackish mt-30 popup-ok-btn">Ok</div>
        </div>
    </div>
</div>
<div class="form-message-container error_wrapper hide error_wrapper_landowner-form">
    <div class="form-message-body">
        <div class="cross-popup" data-msg-close>
            X
        </div>
        <span class="error_container_landowner-form"></span>
        <div>
            <div data-msg-close class="close-btn button button-outline button-outline-blackish mt-30 popup-ok-btn">Ok</div>
        </div>
    </div>
</div>			<!-- </div> -->
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
